<?php
namespace app\admin\controller;
//use think\Controller;

//继承base控制器 

class Index extends Base
{
    public function index()
    {
        return $this->fetch('index');
    }
}
