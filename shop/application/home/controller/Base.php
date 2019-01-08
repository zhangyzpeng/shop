<?php
namespace app\home\controller;
use think\Controller;
//使用Sys模型填充header footer ..
use app\home\model\System as SysModel;
//填充logo
use app\home\model\Image as ImgModel;
class Base extends Controller
{
	//负责渲染前台的一些内容
    public function _initialize(){
    	//title footer ..
    	$SysModel = new SysModel;
    	$sys = $SysModel->getSys();

    	$ImgModel = new ImgModel;
    	$logo_img = $ImgModel->getLogo();

    	//dump($sys);
    	//title footer 内容填充
    	\think\View::share('sys',$sys);
    	//logo图片填充
    	\think\View::share('logo_img',$logo_img);
    }
}
