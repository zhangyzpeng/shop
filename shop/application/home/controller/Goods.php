<?php

namespace app\home\controller;

use think\Controller;

//使用商品模型
use app\home\model\Goods as GoodsModel;
class Goods extends Base
{
	//商品列表
    public function index($id){
    	$GoodsModel = new GoodsModel;
    	$goods = $GoodsModel->getCatGoods($id);
    	$cat_name = $GoodsModel->getCatname($id);
    	$this->assign('goods',$goods);
    	$this->assign('cat_name',$cat_name);
    	return $this->fetch('list');
    }
    //商品详情
    public function detail($id){
    	$GoodsModel = new GoodsModel;
    	$goods = $GoodsModel->getGoodsDetail($id);
        //dump($goods);
        //exit;
    	$goods['goods_color'] = explode('|',$goods['goods_color']);
        $goods['goods_color_desc'] = explode('|',$goods['goods_color_desc']);
    	$goods['goods_type'] = explode('|',$goods['goods_type']);
    	$this->assign('goods',$goods);
    	return $this->fetch('detail');
    }
}
