<?php
namespace app\home\controller;
//加载admin模块下的Base控制器
use app\home\controller\Base;
//加载image模型
use app\home\model\Image as ImgModel;
use think\Db;
//使用商品分类模型
use app\home\model\Category as CategoryModel;
//查找商品
use app\home\model\Goods as GoodsModel;
class Index extends Base
{
    public function index()
    {
        $ImgModel = new ImgModel;
        //调用模型img的getImg方法
        $img=$ImgModel->getImg();
        //halt($img);
        //前台商品导航栏

        $top_cat = Db::name('category')->where('pid',0)->select();
        //dump($top_cat);
        $cats = [];
        foreach($top_cat as $k=>$v){
            $sub_cats = Db::name('category')->where('pid',$v['id'])->select();
            $cats[$k] = $v;
            $cats[$k]['sub_cats'] = $sub_cats;
        }
        //dump($cats);

        //前台页面商品展示
        //goods [
                //[
                    //'name'=>'小米&手机',
                    //'index_goods'=>[]
                    //'hot_goods'=>[]
                //],
        //]
        //找出所有在前台显示的物品并且拼接成3维数组
        $GoodsModel = new GoodsModel;
        $Category = new CategoryModel;

        $index_cats = $Category->getCate();
        //dump( $index_cats);
        $goods = [];
        foreach ($index_cats as $k => $v) {
            # code...
            //查找父pid获取中种类
            $par_name = $Category->getParName($v['pid']);
            //将现显示的商品名称列出来
            $goods[$k]['name'] = $par_name."&".$v['cat_name'];
            //根据ID查找要显示的6条商品
            $index_goods = $GoodsModel->getIndexGoods($v['id']);
            $goods[$k]['index_goods'] = $index_goods;
            //获取热销产品
            $hot_goods = $GoodsModel->getHotGoods($v['id']);
            $goods[$k]['hot_goods'] = $hot_goods;

        }
        //halt($goods);
        $this->assign('goods',$goods);


        $this->assign('cats',$cats);
        $this->assign('img',$img);
        return $this->fetch('index');
    }
    public function dates(){
        //return date('2018-12-26 00:00:00',time()+60*60*24);
        $str="2018-12-26 00:00:10";
        $data=strtotime($str)-3600*24*26;
       // halt($data);
        echo date('Y-m-d H:i:s',$data);
    }
}
