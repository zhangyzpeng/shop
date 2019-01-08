<?php

namespace app\home\controller;

use app\home\controller\Base;
//引入用户模型
use app\home\model\User as UserModel;

class Ubase extends Base
{
    //用来判断用户是否登录
    public function _initialize(){
    	//获取用户头像
    	if(session('user_name')==null){
    		return $this->redirect('/user/login');
    	}
    	//继承父类的初始化方法
    	parent:: _initialize();

    	//用户登录后获取用户信息

    	$UserModel = new UserModel;
    	$img = $UserModel->getImg(session('user_name'));
    	//halt($img);
    	\think\View::share('img',$img);
    }
}
