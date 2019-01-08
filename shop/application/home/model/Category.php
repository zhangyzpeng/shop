<?php

namespace app\home\model;

use think\Model;

class Category extends Model
{
    //获取所有商品种类
    public function getCate(){
    	return $this->where('is_index',1)->select();
    }
    //获取商品列表
    public function getParName($id){
    	return $this->where('id',$id)->value('cat_name');
    }
}
