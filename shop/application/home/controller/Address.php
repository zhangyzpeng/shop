<?php

namespace app\home\controller;

use app\home\model\User as userModel;
use think\Controller;
use think\Request;
use think\Db;

//引用
class Address extends Ubase
{
    //调出地址页面
    public function index(Request $request){
        $userModel = new userModel;
        //得到登录用户的email
        $email   =  session('user_name');
       //获取用户得到的Id
       $user_id = $userModel->getUserId($email);
       //运用用户ID获取手机号
       $address = Db::name('address')->where('user_id',$user_id)->select();
       $this->assign('addresses',$address);
        return $this->fetch('index');
    }
    //用户添加地址
    public function add(Request $request){
        //接收前台传来的值
       $data  =  $request->param();
       $email   =  session('user_name');
       $userModel  =  new userModel;
       //获取用户得到的Id
       $user_id     =   $userModel->getUserId($email);
       $data['user_id'] = $user_id;
       //print_r($data);
       $res=Db::name('address')->insert($data);
       if($res){
            return json(['status'=>'success','msg'=>'添加地址成功']);
        }else{
            return json(['status'=>'fail','msg'=>'添加地址失败']);
        }
    }
    //删除地址
    public function del(Request $request){
        $id=$request->param('id');
        $res=Db::name('address')->delete($id);
        if($res){
            return json(['status'=>'success','msg'=>'删除成功']);
        }else{
            return json(['status'=>'fail','msg'=>'删除失败']);
        }
    }
}
