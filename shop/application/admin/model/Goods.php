<?php

namespace app\admin\model;

use think\Model;
use think\Db;
class Goods extends Model
{
    //商品添加
    public function addGoods($data){
    	return $this->insert($data);
    }
    //查询商品
    public function getAllGoods(){
    	$res = Db::name('goods g')->join('category c','g.cat_id=c.id')
    							->order('g.id desc')
    							->field(
    									[
    										'g.goods_name',
    										'g.goods_img',
    										'g.pro_price',
    										'g.is_on',
    										'g.create_time',
    										'g.id',
    										'c.cat_name',
                                            'g.is_hot'
    									]
    								)
    							->paginate(1);
    							return $res;
    }
    //获取要修改商品的记录
    public function getOneGoods($id){
    	return $this->where('id',$id)->find();
    }
    //修改商品
    public function upGoods($id,$data){
    	return $this->where('id',$id)->update($data);
    }
    //商品下架
    public function delGoods($id){
        return $this->where('id',$id)->update(['is_on'=>0]);
    }
    //商品上架
    public function updGoods($id){
        return $this->where('id',$id)->update(['is_on'=>1]);
    }
    //商品查询
    public function getGoods($cat_id){
        return Db::name('goods g')->join('category c','g.cat_id=c.id')
                                ->order('g.id desc')
                                ->where('g.cat_id',$cat_id)
                                ->field(
                                        [
                                            'g.goods_name',
                                            'g.goods_img',
                                            'g.pro_price',
                                            'g.is_on',
                                            'g.create_time',
                                            'g.id',
                                            'c.cat_name',
                                            'g.is_hot'
                                        ]
                                    )
                                ->paginate(1,false,['query'=>['cat_id'=>$cat_id]]);
    }
}