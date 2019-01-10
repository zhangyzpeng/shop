<?php

namespace app\home\model;

use think\Model;

class Order extends Model
{
    //用户订单添加
    public function addOrder($Order){
    	return $this->insertAll($Order);
    }
}
