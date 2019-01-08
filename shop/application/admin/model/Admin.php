<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    public function checkAdmin($user_name,$password){
    	//dump($user_name);
    	$user=$this->where('user_name',$user_name)->find();
    	//halt($user);
    	if(!$user){
    		return ['status'=>'fail','msg'=>'用户名不存在'];
    	}

    	$pass=md5($password.$user['salt']);
    	if($pass==$user['password']){
    		return ['status'=>'success','msg'=>'登录成功'];
    	}else{
    		return ['status'=>'fail','msg'=>'用户密码不正确'];
    	}
    }
}
