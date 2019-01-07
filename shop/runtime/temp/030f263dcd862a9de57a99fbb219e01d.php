<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\wamp\www\shop\public/../application/home\view\user\address.html";i:1545965546;s:57:"D:\wamp\www\shop\application\home\view\public\header.html";i:1545994529;s:54:"D:\wamp\www\shop\application\home\view\public\nav.html";i:1546248309;s:55:"D:\wamp\www\shop\application\home\view\public\side.html";i:1546328944;}*/ ?>
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
  <link href="/static/home/css/index_1.css" rel="stylesheet" type="text/css" /> 
  <link href="/static/home/css/index.css-93c948fe.css" rel="stylesheet" type="text/css" /> 
  <script src="/static/home/js/jquery.js"></script>
  <script src="/static/home/js/distpicker.js" > </script>

 </head> 
 <body class="media_screen_1200"> 

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
   <div class="mu_wrap wrap clearfix"> 
    <div id="navListWrap">
     <div class="mu_nav_wrap"> 
            <!---左侧导航开始-->
        <div class="mu_nav_info"> 
         <div class="mu_nav_info_avatar"> 
          <div class="mu_nav_info_avatar_mk"></div> 
          <img src="<?php echo !empty($img)?'/'.$img:'/static/home/images/touxiang.jpg'; ?>" width="100" height="100" /> 
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
      </div> 
    <div id="address_wrap">
     <div class="addr_right topay" isaddress="true"> 
      <h2 class="addr_title">地址管理</h2> 
      <div class="addr_edit" id="J_s_addr_edit"> 
       <div class="add_new_addr clearfix">
        <span id="J_saddAddress">+添加地址</span>
       </div> 
       <div class="addressbox_warp"> 
        <div class="addressbox" id="J_sAddrWrap"></div> 
        <div class="address_wrapper">
         <div class="__addressPop"> 
          <dl class="address_pop"> 
           <input class="J_addressid" name="addressId" value="" type="hidden" /> 
           <input class="J_isdefault" name="addressId" value="false" type="hidden" /> 
           <dt>
            省：
           </dt> 
           <dd class="pt_ie6hack"> 
            <i class="needicon">*</i> 
           
		     <div data-toggle="distpicker">
  <select ></select>
  <select></select>
  <select></select>
</div>
		   
           </dd> 
           <dt>
            邮政编码：
           </dt> 
           <dd> 
            <i class="needicon">*</i> 
            <input data-type="c" data-errormsg="请填写正确的邮政编码" data-normal="" class="text formsize_normal J_postcode J_form vm" name="postcode" value="" type="text" /> 
            <span class="prompt mail_select"></span> 
           </dd> 
           <dt>
            街道地址：
           </dt> 
           <dd> 
            <i class="needicon">*</i> 
            <textarea data-type="*" data-min="5" data-max="100" data-normal="请填写街道地址，最少5个字，最多不能超过100个字" data-errormsg="请填写街道地址，最少5个字，最多不能超过100个字" class="textarea formsize_large J_street J_form" name="street" cols="30" rows="3"></textarea> 
            <span class="prompt breakline">请填写街道地址，最少5个字，最多不能超过100个字</span> 
           </dd> 
           <dt>
            收货人姓名：
           </dt> 
           <dd> 
            <i class="needicon">*</i> 
            <input data-type="*" data-errormsg="请填写收货人" data-normal="" class="text formsize_normal J_name J_form vm" name="name" value="" type="text" /> 
            <span class="prompt name_select"></span> 
           </dd> 
           <dt>
            手机：
           </dt> 
           <dd> 
            <i class="needicon">*</i> 
            <input data-type="phone" data-errormsg="请填写正确的联系号码" data-normal="" class="text formsize_normal J_mobile J_form vm" name="mobile" value="" type="text" /> 
            <span class="prompt mobile_select"></span> 
           </dd> 
           <dt></dt> 
           <dd class="pt10 oper_btn"> 
            <a href="javascript:;" class="confirm_btn J_okbtn mr10">确认地址</a> 
            <a href="javascript:;" class="cancel_btn J_cancelbtn">取消</a> 
           </dd> 
          </dl>
         </div>
        </div> 
        <!-- <div class="addressbox addressfirst addresslist" action="/trade/address/addfororder"> </div> --> 
       </div> 
       <div class="addr_section " aid="570781677"> 
        <ul class="clearfix"> 
         <li class="name">刘波</li> 
         <li class="addr" data-province="山东省" data-city="青岛市" data-area="黄岛区" data-street="胶南市青岛路麟瑞商务广场1511"> 山东省青岛市黄岛区胶南市青岛路麟瑞商务广场1511 </li> 
         <li class="zcode"></li> 
         <li class="mobile">155****8866</li> 
         <li class="oper"> <a href="javascript:;" class="J_default" aid="570781677">设为默认</a> <a href="javascript:;" class="edit" aid="570781677">编辑</a> <a href="javascript:;" class="del nobd" aid="570781677">删除</a> </li> 
         <li class="enaddr"></li> 
        </ul> 
       </div> 
      </div>
     </div>
    </div> 
   </div> 
  </div> 
 </body>
</html>