<?php

namespace app\home\model;

use think\Model;
use think\Db;
class Goods extends Model
{
    //
    public function getCatGoods($id){
    	return $this->where('cat_id',$id)->where('is_on',1)
    				->field(['goods_name','goods_img','origin_price','id','pro_price'])
    				->select();
    }
    public function getCatname($id){
    	return Db::name('category')->where('id',$id)->value('cat_name');
    }
    //点击商品获取详情
    public function getGoodsDetail($id){
    	return $this->where('id',$id)->find();
    }
    //获取要显示的商品详情
    public function getIndexGoods($id){
       $res = $this->where('cat_id',$id)->where('is_on',1)
                    ->field(['id','goods_name','goods_img','pro_price'])
                    ->limit(6)
                    ->order('id desc')
                    ->select();
                    return $res;
    }
    //获取热销产品
    public function getHotGoods($id){
          $res = $this->where('cat_id',$id)->where('is_on',1)->where('is_hot',1)
                    ->field(['id','goods_name','goods_img','pro_price'])
                    ->limit(6)
                    ->order('id desc')
                    ->select();
                    return $res;
    }
}
