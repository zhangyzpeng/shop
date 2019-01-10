<?php

namespace app\home\controller;
use think\Controller;
use think\Request;
use app\home\model\Goods as GoodsModel; 
//使用Cookie
use think\Cookie;
use app\home\model\User as UserModel;
use think\Db;
use app\home\model\Order as OrderModel;
class Order extends Base
{
    public function cart(){
        //判断购物车是否有关记录
        if(Cookie::has('goods_list')){
        $goods_list = Cookie::get('goods_list');
        //转化维数组
        $goods_list = explode('===',$goods_list);

        $goodsModel = new GoodsModel;
        //halt($goodsModel);
        //声明数组存放购物车商品信息
        $goods_cart = [];
        foreach ($goods_list as $key => $value) {
            # code...
            //将字符串转化为一个数组 不带true是对象
            $value =json_decode($value,true);

            //dump($value);
            $goods_info = $goodsModel->getCartGoods($value['goods_id']);
            //数据库查询

            $goods_cart[$key]['goods_name']=$goods_info['goods_name'];
            $goods_cart[$key]['goods_img']=$goods_info['goods_img'];
            $goods_cart[$key]['pro_price']=$goods_info['pro_price'];
            $goods_cart[$key]['origin_price']=$goods_info['origin_price'];

            //从cookie获取
            $goods_cart[$key]['goods_type']=$value['goods_type'];
            $goods_cart[$key]['goods_color']=$value['goods_color'];
            $goods_cart[$key]['goods_num']=$value['goods_num'];

            //商品总价格
            $goods_cart[$key]['total_price']=$value['goods_num']*$goods_cart[$key]['pro_price'];

            //商品差价
            $goods_cart[$key]['diff_price']=$goods_cart[$key]['origin_price']-$goods_cart[$key]['pro_price'];

            //设置购物车商品的编号(从0开始计数)
            $goods_cart[$key]['cart_id']=$key;
        }
        //dump($goods_cart);

        $this->assign('goods_cart',$goods_cart);
        }else{

        }
    	return $this->fetch('cart');
    }
    //支付
    public function topay(Request $request){
        //判断用户是否登录
        //没有登录禁止购买商品
        if(session('user_name')==null){
            return $this->redirect('/user/login');
        }
        //根据用户登录的信息查询用户的地址
        $UserModel = new UserModel;
        $userid = $UserModel->getUserId(Session('user_name'));

        $address = DB::name('address')->where('user_id',$userid)->select();
        if(!$address){
            return $this->redirect('/user/address');
        }
        $type=$request->param('type');

        $GoodsModel = new GoodsModel;
        //定义数组将获取的数据存入数组
        $goods_list = [];
        //判断用户是从购物车提交的商品还是直接购买的上皮康

        //用户直接购买商品
        if($type=='buy'){
            $goods_id = $request->param('goods_id');
            $goods = $GoodsModel->getCartGoods($goods_id);
            //商品总价格
            $goods_list['total_price'] = $request->param('goods_num')*$goods['pro_price'];
            //商品数量
            $goods_list['num'] = $request->param('goods_num');
            //商品类型
            $goods['goods_type'] = $request->param('goods_type');
            //商品颜色
            $goods['goods_color'] = $request->param('goods_color');
            //购买商品数量
            $goods['goods_num'] = $request->param('goods_num');
            //商品id
            $goods['goods_id'] = $goods_id;
            //商品总计
            $goods['total_price'] = $request->param('goods_num')*$goods['pro_price'];
            //
            $goods_list['goods'][] = $goods;
        }

        //用户从购物车购买商品
        if($type=="cart"){
            $cart_id = $request->param('cart_id');
            //dump($cart_id);
            $cart_id = substr($cart_id,0,strlen($cart_id)-1);
            //dump($cart_id);
            //将字符串转化为数组
            $cart_id = explode('_',$cart_id);
           // halt($cart_id);
            //获取商品
            //halt(Cookie::get('goods_list'));
            $cart_goods = explode('===',Cookie::get('goods_list'));
            //商品总价格
            $goods_list['total_price'] = 0;
             //商品总数量
            $goods_list['num'] = 0;
            foreach ($cart_id as $v) {
                # code...
                //halt($v);
                $cart_good = json_decode($cart_goods[$v],true);
                //dump($cart_good);
                $goods = $GoodsModel->getCartGoods($cart_good['goods_id']);
                //halt($goods);
               
                //商品类型
                $goods['goods_type'] = $cart_good['goods_type'];
                //商品颜色
                $goods['goods_color'] = $cart_good['goods_color'];
                //购买商品数量
                $goods['goods_num'] = $cart_good['goods_num'];
                //商品id
                $goods['goods_id'] = $cart_good['goods_id'];
                //商品总计
                $goods['total_price'] = $cart_good['goods_num']*$goods['pro_price'];
                //
                $goods_list['goods'][] = $goods;

                //特殊 接收的必须是商品的总价格
                //商品总价格
                $goods_list['total_price'] += $goods['pro_price'];
                //商品数量
                $goods_list['num'] +=  $goods['goods_num'];
                }
                //dump($goods_list);
               // exit;
        }

        //dump($goods_list);

        $this->assign('goods_list',$goods_list);
        //exit;
        $this->assign('address',$address);
    	return $this->fetch('topay');
    }
    //去付款
    public function pay(Request $request){
        $data = $request->param();
        $pay = $data['pay_type'];
        //halt($pay);
        //声明一个商品单号
        $trade_no = date('ymdhis').mt_rand(10000,99999);
        //dump($data);

        //获取用户id
        $UserModel = new UserModel;
        $userid = $UserModel->getUserId(Session('user_name'));

        foreach ($data['goods'] as $key => $value) {
            # code...
            //商品信息

            list($goods_id,$goods_name,$goods_color,$goods_type,$goods_price,$fee,$goods_num) = explode('=',$value);
            //halt($goods_num);
            //单条商品id
            $sub_trade_no = (time()*5).mt_rand(10000,99999);
            $order[$key]['goods_id'] = $goods_id;
            $order[$key]['goods_name'] = $goods_name;
            $order[$key]['goods_color'] = $goods_color;
            $order[$key]['goods_type'] = $goods_type;
            //单个商品的价格
            $order[$key]['goods_price'] = $goods_price;
            //商品小计
            $order[$key]['fee'] = $fee;
            $order[$key]['goods_num'] = $goods_num;
            //单个商品的id号
            $order[$key]['sub_trade_no'] = $sub_trade_no;
            //商品的总订单号
            $order[$key]['trade_no'] = $trade_no;
            //记录商品支付方式
            $order[$key]['pay_type'] = $pay;

            //
            $order[$key]['name'] = $data['name'];
            $order[$key]['mobile'] = $data['mobile'];
            $order[$key]['address'] = $data['address'];
            $order[$key]['user_id'] =  $userid;
            //订单创建时间
            $order[$key]['create_time'] = time();


        }
        //dump($order);
        $OrderModel = new OrderModel;
        $res = $OrderModel->addOrder($order);
        $this->assign('order',$order);
    	return $this->fetch('pay');
    }
    //储存用户的购物信息
    public function addCart(Request $request){
        //获取用户选中的数据
        $data = $request->param();
        //转化为json格式
        //将购物信息存入cookie
        if(Cookie::has('goods_list')){
            //判断cookie里面的商品属性是否添加过
            $goods_list = explode('===',Cookie::get('goods_list'));

            foreach ($goods_list as $k => $v) {
                //halt($v);
                # code...
                //将json格式的东西转化为数组
                $v = json_decode($v,true);
                //判断数据是否一样
                if($v['goods_type']==$data['goods_type']&&$v['goods_color']==$data['goods_color']&&$v['goods_id']==$data['goods_id']){
                    //将数据想加起来
                    $v['goods_num']=$v['goods_num']+$data['goods_num'];

                    $goods_list[$k]=json_encode($v);

                    //如果用户添加的商品没有添加过
                    $on = true;
                }

            }
            //dump($goods_list);
            //将数组转化为字符串
            $goods_list = implode('===',$goods_list);

            if(isset($on)){
                Cookie::set('goods_list',$goods_list);
            }else{
                Cookie::set('goods_list',$goods_list.'==='.json_encode($data));
            }
            //exit;
            //处理cookie覆盖
            //$data = Cookie::get('goods_list').'==='.json_encode($data);
            //Cookie::set('goods_list',$data);
        }else{
            Cookie::set('goods_list',json_encode($data));
        }
        return true;
    }
    //删除购物车信息(清除cookie)
    public function delCart(Request $request){
        $id = $request->param('id');
        //dump($id);
        //先获取商品详情

        //将获取到的东西转化为数组
        $goods_list= explode('===',Cookie::get('goods_list'));

        //dump($goods_list);
        //删除这个商品的id达到删除购物车物品的效果
        unset($goods_list[$id]);

        $goods_list=implode('===',$goods_list);

        Cookie::set('goods_list',$goods_list);
        return true;
    }
}