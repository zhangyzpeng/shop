<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
    //
    public function getUsers(){
    	return $this->order('id desc')->paginate(6);
    }
    //实现冻结用户已
    public function frozeUser($id){
    	return $this->where('id',$id)->update(['if_froze'=>1]);
    }
    //实现解冻用户
    public function unfrozeUser($id){
    	return $this->where('id',$id)->update(['if_froze'=>0]);
    }
}
