<?php

namespace app\admin\controller;

use think\Controller;

class Error extends Controller
{
    //
    public function index(){
    	return $this->redirect('/admin/login');
    }
  
}
