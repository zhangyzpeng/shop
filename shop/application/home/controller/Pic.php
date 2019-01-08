<?php

namespace app\home\controller;

use app\home\controller\Ubase;

use app\home\model\User as UserModel;
//用户头像管理
use think\request;
class Pic extends Ubase
{
    public function index(){
    	return $this->fetch('index');
    }
    //用户头像上传
    public function upload(Request $request){
    	 $file=$request->file('file');

       //首先在配置文件定义图片路径
       //获取图片的格式
       $validate=config('VALIDATE');
       //获取图片的上传路径
       $path=config('USER_PATH');
       //halt($path);
       //验证并上传
       $res=$file->validate($validate)->move($path);
       //halt($res);
       if($res){
            $file_path = $res->getPathName();
            //halt($file_path);
            return json(['status'=>'success','msg'=>$file_path]);
       }else{
            return json(['status'=>"fail",'msg'=>$file->getError()]);
       }
    }
    //接收用户上传的用户头像路径
    public function updateImg(Request $request){
    	$img_url = $request->param('img_url','','trim');
    	//halt($img_url);
    	//获取用户的邮箱
    	$email = session('user_name');
    	//dump($email);

    	//调用模型实现更新
    	$UserModel = new UserModel;
    	$res=$UserModel::where('number',$email)
            ->update(['img_url'=>$img_url]);
    	//$res = $UserModel->updateImg($img_url,$email);
    	if($res){
    		return json(['status'=>'success','msg'=>'更新成功']);
    	}else{
    		return json(['status'=>'fail','msg'=>'更新失败']);
    	}
    }
}
