<?php

namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
use think\Request;
use think\Validate;
use app\admin\model\Admin as adminModel;
class Admin extends Controller
{
    //
    public function index(){
    	return $this->fetch('login');
    }
    //获取验证码
    public function captcha(){
    	$captcha = new Captcha(['length'=>4]);
		return $captcha->entry();
    }
    //获取表带数据
    public function tologin(Request $request){
    	//dump($request->param());
    	$data=$request->only(['code','__token__']);
    	//dump($data);
    	$rule=['code|验证码'=>'captcha|token'];
    	$validate=new Validate();
    	if(!$validate->check($data,$rule)){
    		return json(['status'=>'fail','msg'=>$validate->getError()]);
    	}
    	//接收前台传来的值
    	$user_name=$request->param('user_name','','trim');
    	$password=$request->param('password','','trim');

    	//调用模型
    	$adminModel=new adminModel;

    	//将值传入模型进行验证
    	$res=$adminModel->checkAdmin($user_name,$password);

    	if($res['status']=='success'){
    		session('admin_name',$user_name);
    	}

    	return json($res);
    }

    //用户退出
    public function logout(){
    	//清空session
    	session('admin_name',null);
    	//将页面重定向到登录页面
    	return $this->redirect('/admin/login');
    }
}
