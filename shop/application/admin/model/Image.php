<?php

namespace app\admin\model;

use think\Model;

class Image extends Model
{
    public function addimage($data){
    	//添加数据
    	return $this->insert($data);
    }
    //查询图片
    public function getimage(){
    	return $this->select();
    	//return $data->data;
    }
    //查询处一条记录信息
    public function getImages($id){
    	$res=$this->find($id);
    	return $res->data;
    }
    //对单条数局的修改
    public function updateimage($data,$id){
    	return $this->where('id',$id)->update($data);
    }
    //删除记录
    public function delimage($id){
    	return $this->where('id',$id)->delete();
    }
}
