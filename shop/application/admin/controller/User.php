<?php

namespace app\admin\controller;

use app\admin\Controller\Base;
use app\admin\model\User as userModel;
use think\Db;
use think\Request;
class User extends Base
{
    //
    public function index(){
    	$userModel = new userModel;
    	$users = $userModel->getUsers();
    	$this->assign('users',$users);
    	return $this->fetch('list');
    }
    //冻结用户
    public function forze(Request $request){
    	$id = $request->param('id');
		$userModel = new userModel;
    	$res = $userModel->frozeUser($id);
    	if($res){
    		return json(['status'=>'success','msg'=>'冻结成功']);
    	}else{
    		return json(['status'=>'fail','msg'=>'冻结失败']);
    	}
    }
    //解冻用户
    public function unforze(Request $request){
    	$id = $request->param('id');
		$userModel = new userModel;
    	$res = $userModel->unfrozeUser($id);
    	if($res){
    		return json(['status'=>'success','msg'=>'冻结成功']);
    	}else{
    		return json(['status'=>'fail','msg'=>'冻结失败']);
    	}
    }
}
