<?php

namespace app\admin\model;

use think\Model;

class Category extends Model
{
    //商品添加
    public function addCategory($data){
    	return $this->insert($data);
    }
    //获取顶级数据
    public function getTopcateroty(){
    	return $this->where('pid',0)->select();
    }
    //获取商品数据
    public function getCats(){
    	return $this->select();
    }
    //获取要修改的商品详情
    public function getcat($id){
    	return $this->where('id',$id)->find();
    }
    //实现修改
    public function upCat($data,$id){
    	return $this->where('id',$id)->update($data);
    }
    //实现删除
    public function delCat($id){
    	//查询此分类下是否有其他子分类
    	$cat = $this->where('pid',$id)->find();
    	if($cat){
    		return json(['status'=>'fail','msg'=>'此分类下还有子分类不能删除']);
    	}
    	$res = $this->where('id',$id)->delete();
    	if($res){
			return json(['status'=>'success','msg'=>'删除成功']);
    	}else{
    		return json(['status'=>'fail','msg'=>'删除失败']);
    	}
    }
    //获取子分类的商品类型
    public function getSubCats(){
        return $this->where('pid','<>',0)->select();
    }
}
