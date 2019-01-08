<?php

namespace app\home\model;

use think\Model;

class Image extends Model
{
    //获取Logo图片
    public function getLogo(){
    	$res=$this->where('type',1)->field('img_url')->find();
    	//halt($res);
    	return $res->data;
    }
    //获取轮播图
    public function getImg(){
    	$res=$this->where('type',2)->field('img_url')->find();
    	//halt($res);
    	return $res->data;
    }
}
