<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//后台
//ajax用户登录
Route::post('admin/tologin','admin/Admin/tologin');
Route::get('admin/logout','admin/Admin/logout');
//上传图片的路由
Route::post('admin/image/upload','admin/Image/upload');
//冻结用户路由
Route::post('admin/user/forze','admin/User/forze');
//解冻用户路由
Route::post('admin/user/unforze','admin/User/unforze');
//添加商品资源路由
Route::resource('admin/Category','admin/Category');
//图片上传
Route::resource('admin/goods','admin/Goods');
//进行图片查询
Route::any('goods/search','admin/Goods/search',['method'=>'get|post']);
//后台商品图片上传
Route::post('goods/image/upload','admin/Goods/upload');





//前台
//发送邮件的路由
Route::post('user/send','home/User/send_email');
//注册用户的路由
Route::any('User/register','home/User/register',['method'=>'get|post']);
//用户登录的路由
Route::any('User/login','home/User/login',['method'=>'get|post']);
//实施验证用户是否注册过
Route::post('User/check_user','home/User/checkuser');
//用户退出登录
Route::get('User/logout','home/User/logout');

//用户头像路由
Route::get('User/user_pic','home/Pic/index');
//用户头像更换
Route::post('User/image/upload','home/Pic/upload');
//对用户上传头像接收
Route::post('User/image/update','home/Pic/updateImg');


//收货地址
Route::get('user/address','home/Address/index');
Route::post('address/add','home/Address/add');
Route::post('address/del','home/Address/del');
//购物车
Route::get('Order/cart','home/Order/cart');
//存储购物车数据
Route::post('cart/add','home/Order/addCart');
Route::post('cart/del','home/Order/delCart');
//删除购物车

return [
	
 //前台路由
    //首页
    '/'=>'home/index/index',
    //加载列表
    'Goods/list'=>'home/Goods/index',
    //展示商品
    'Goods/detail'=>'home/Goods/detail',


    //购物车
    //'Order/cart'=>'home/Order/cart',
    //支付
     'Order/topay'=>'home/Order/topay',
     //付款
 	'Order/pay'=>'home/Order/pay',


 	//用户头像
 	//'User/user_pic'=>'home/User/userPic',
 	//'User/address'=>'home/User/address',
 	'User/order_list'=>'home/User/orderList',
 	'User/wait_pay'=>'home/User/waitPay',
 	'User/back_pay'=>'home/User/backPay',
 	//用户登录
 	'User/login'=>'home/User/login',
 	//用户注册
 	//'User/register'=>'home/User/register',


//后台路由
 	'admin/login'=>'admin/Admin/index',
 	//ajax发送信息post请求
 	//'admin/tologin'=>'admin/Admin/tologin',
 	'admin/index'=>'admin/Index/index',
 	//'admin/system'=>'admin/System/index',
 	//资源路由
 	 '__rest__'=>[
        // 指向index模块的blog控制器
        'admin/system'=>'admin/system',
        //图片资源路由
        'admin/image'=>'admin/Image',


    ],
 	//'admin/image'=>'admin/Image/index',
 	'admin/add'=>'admin/Image/create',
 	'admin/user'=>'admin/User/index',
 	//'admin/category'=>'admin/Category/index',
 	//'admin/category/create'=>'admin/Category/create',
 	'admin/order'=>'admin/Order/index',
 	'admin/captcha'=>'admin/Admin/captcha',

];
