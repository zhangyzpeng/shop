<?php

namespace app\admin\model;

use think\Model;

class System extends Model
{
    //
    public function getSys(){
    	
    	$res=$this->find();
    	$data=$res->data;
		//exit();
    	return $data;
    	//return $this;
    }
    //修改
    public function updates($data,$id){
    	//接收数据并修改
    	return $this->where('id',$id)->update($data);
    }
}
