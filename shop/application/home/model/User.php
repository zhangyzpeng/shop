<?php

namespace app\home\model;

use think\Model;

class User extends Model
{
    //用户注册
    public function insertUser($data){
    	return $this->insert($data);
    }
    //验证用户是否注册过
    public function checkuser($email){
    	$res=$this->where('number',$email)->find();
    	return $res;
    }
    //用户登录验证
    public function tologin($email,$password){
    	$user= $this->where('number',$email)->find();
    	if($user){
    		$pass = md5($password.$user['salt']);
    		if($pass==$user['password']){
                if($user['if_froze']==1){
                    return ['status'=>'fail','msg'=>'用户已冻结,请联系管理员'];
                }
    			session('user_name',$email);
    			return ['status'=>'success','msg'=>'登录成功'];
    		}else{
    			return ['status'=>'fail','msg'=>'用户名或密码不正确'];
    		}
    	}else{
    		return ['status'=>'fail','msg'=>'用户名或密码不正确'];
    	}
    }
    //接收用户信息并且更新用户头像
    public function updateImg($img_url,$email){
        return $this->where('number',$email)->update(['img_url'=>$img_url]);
    }
    //获取用户登录用户的头像
    public function getImg($email){
        return $this->where('number',$email)->value('img_url');
    }
    //获取登录用户的ID
    public function getUserId($email){
        return $this->where('number',$email)->value('id');
    }
}