<?php

namespace app\home\model;

use think\Model;

class System extends Model
{
    public function getSys(){
    	$res=$this->find();
    	return $res->data;
    }
}
