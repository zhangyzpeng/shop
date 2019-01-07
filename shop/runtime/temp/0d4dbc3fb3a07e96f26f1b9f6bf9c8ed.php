<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:67:"D:\wamp\www\shop\public/../application/home\view\user\user_pic.html";i:1546248010;s:57:"D:\wamp\www\shop\application\home\view\public\header.html";i:1545994529;s:54:"D:\wamp\www\shop\application\home\view\public\nav.html";i:1546248309;s:55:"D:\wamp\www\shop\application\home\view\public\side.html";i:1545799269;}*/ ?>
﻿<html>
 <head> 
  <meta charset="UTF-8" /> 
  <meta http-equiv="Cache-Control" content="no-transform" /> 
  <meta name="renderer" content="webkit" /> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
  <title><?php echo $sys['title']; ?></title> 
  <meta name="description" content="<?php echo $sys['desc']; ?>}" /> 
  <meta name="keywords" content="<?php echo $sys['keywords']; ?>" /> 
  <script src="/static/admin/js/jquery.js"></script>
  <script src="/static/lib/layer/layer.js"></script>
  <link href="/static/home/css/index.css-ccfdf3f4.css" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/index.css-a267bc7f.css" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" href="/static/home/css/index-2.css" />
 </head> 
 <body class="media_screen_960 media_screen_1200"> 
<!-- 顶部导航开始-->
  <div id="header" class="site-top-nav " data-ptp="_head">
   <div class="wrap"> 
    <a href="/" rel="nofollow" class="home fl">首页</a> 
    <ul class="header-top"> 
      <!--判断用户是否登录-->
    <?php if((\think\Session::get('user_name')==null)): ?>
       <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/User/login">登录</a></li> 
  	   <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/User/register">注册</a></li>
    <?php else: ?>
        <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/User/user_pic">欢迎：<?php echo \think\Session::get('user_name'); ?></a></li> 
       <li class="s1 show-nologin"> <a rel="nofollow" class="J_nav_btn_login" href="/User/logout">退出</a></li>
    <?php endif; ?>
     <li class="s1 myorder has-line"> <a href="order_Goods/list" target="_blank" class="text display_u" rel="nofollow">我的订单</a> </li> 
     <li class="s1 has-line shopping-cart-v2"> <a class="cart-info-wrap" href="/order/cart" target="_blank" rel="nofollow"> <span class="cart-info">购物车</span> </a> <i class="icon-delta"></i> <span class="shopping-cart-loading"></span> </li> 
    </ul>
   </div>
  </div>
<!-- 顶部导航结束-->


<!-- 中间logo以及搜索区域开始 --> 
  <div class="header_mid clearfix"> 
   <div class="wrap clearfix"> 
    <a rel="nofollow"  class="logo" title="蘑菇街首页" style="background-image: none;">
	<img src="/<?php echo $logo_img['img_url']; ?>" alt="蘑菇街，我的买手街" />
	</a> 
    <div class="normal-search-content"> 
     <div class="top_nav_search" id="nav_search_form"> 
      <!--搜索框 --> 
      <div class="search_inner_box clearfix"> 
       <div class="selectbox" data-v="1"> 
        <span class="selected">搜商品</span> 
       </div> 
       <form action="/search/" method="get" id="top_nav_form"> 
        <input data-tel="search_book" name="q" class="ts_txt fl" data-def="牛仔裤" value="" autocomplete="off" def-v="牛仔裤"  type="text" /> 
        <input value="搜  索" class="ts_btn" type="submit" /> 
        <input name="t" value="bao" id="select_type" type="hidden" /> 
       </form> 
       <div class="top_search_hint is-not-ie8-hack"></div> 
      </div> 
     </div>
    </div> 
   </div> 
  </div> 
 <!-- 中间logo以及搜索区域结束 -->  
 
  <div id="body_wrap"> 
   <div id="body_content_wrap"> 
    <div id="body" class="fm970"> 
     <div class="per_wrap clearfix" id="per_wrap"> 
      <div id="navListWrap">
       <div class="mu_nav_wrap"> 
	   
	       <!---左侧导航开始-->
        <div class="mu_nav_info"> 
         <div class="mu_nav_info_avatar"> 
          <div class="mu_nav_info_avatar_mk"></div> 
          <img src="/static/home/images/touxiang.jpg" width="100" height="100" /> 
         </div> 
         <p class="mu_nav_info_uname">15588608866</p> 
        </div> 
        <div class="mu_nav"> 
		 <a href="/user/user_pic"><div class="mu_title">头像管理</div> </a>
        </div> 
		<div class="mu_nav"> 
		 <a href="/user/address"><div class="mu_title">地址管理</div> </a>
        </div> 
		
		<div class="mu_nav"> 
		 <a href="/user/order_list"><div class="mu_title">订单列表</div> </a>
        </div> 
		<div class="mu_nav"> 
		 <a href="/user/wait_pay"><div class="mu_title">待付款</div> </a>
        </div> 
		<div class="mu_nav"> 
		 <a href="/user/back_pay"><div class="mu_title">退款</div> </a>
        </div> 

       </div>
	  
	  
      <div class="per_content_wrap" id="per_content_wrap">
       <div class="main_content"> 
        <div class="content_header">
         设置头像
        </div> 
        <div class="content_form"> 
         <div class="avatar_form"> 
          <form class="ui-form" method="post" enctype="multipart/form-data"> 
           <img id="nickPic" class="ui-pic" src="/static/home/images/touxiang.jpg" alt="" /> 
           <div class="ui-tip"> 
            <span class="ui-change">更换头像</span> 
            <div class="ui-bg"></div> 
           </div> 
           <input id="uploadAvartar" class="ui-file" name="image" type="file" /> 
          </form> 
         </div> 
         <span id="pic-tip" class="ui-pic-tip"></span> 
         <div class="subbox clearfix"> 
          <a href="javascript:;" id="btn_submit" class="btn_check">完成</a> 
         </div> 
        </div>
       </div>
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 


 
 </body>
</html>