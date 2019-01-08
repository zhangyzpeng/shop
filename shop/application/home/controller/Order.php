<?php

namespace app\home\controller;
use think\Controller;
use think\Request;
//使用Cookie
use think\Cookie;
class Order extends Base
{
    public function cart(){
    	return $this->fetch('cart');
    }
    //支付
    public function topay(){
    	return $this->fetch('topay');
    }
    //去付款
    public function pay(){
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
    }
    //删除购物车信息(清除cookie)
    public function delCart(){
        Cookie::set('goods_list',null);
    }
}