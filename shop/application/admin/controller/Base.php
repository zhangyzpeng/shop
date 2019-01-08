<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    //基础控制器负责方便其他控制器继承 验证用户是否登录

    //初始化方法
    public function _initialize(){

    	//dump(session('admin_name'));
    	if(!session('admin_name')){
    		$this->redirect('/admin/login');
    	}
    }
    
}
