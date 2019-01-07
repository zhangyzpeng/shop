<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"D:\wamp\www\shop\public/../application/home\view\user\order_list.html";i:1545965560;s:57:"D:\wamp\www\shop\application\home\view\public\header.html";i:1545994529;s:54:"D:\wamp\www\shop\application\home\view\public\nav.html";i:1546248309;s:55:"D:\wamp\www\shop\application\home\view\public\side.html";i:1546328944;}*/ ?>
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
  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/index.css-a2f37bbc.css" rel="stylesheet" type="text/css" /> 

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
	
	
    <div class="mu_content_wrap"> 
   
     <div class="order-title"> 
      <ul class="order-title-column clearfix"> 
       <li class="goods">商品</li> 
       <li class="price">单价(元)</li> 
       <li class="quantity">数量</li> 
       <li class="aftersale">售后</li> 
       <li class="total">实付款(元)</li> 
       <li class="status">交易状态</li> 
       <li class="other">操作</li> 
      </ul> 
     </div> 
     <div id="orderWrap">
      <div class="order-list"> 
       <div class="order-section finished" data-payid="79563824145946"> 
        <table class="order-table"> 
         <tbody> 
          <tr class="order-table-header"> 
           <td colspan="7"> 
            <div class="order-info fl"> 
             <span class="no"> 订单编号： <span class="order_num"> 79563824155946 </span> </span> 
             <span class="deal-time"> 成交时间：2018-09-12 11:32:18 </span> 
          </tr> 
          <tr class="order-table-item last"> 
           <td class="goods"> <a class="pic" href="//shop.mogujie.com/detail/1khz1xo" title="查看宝贝详情" hidefocus="true" target="_blank"> <img src="/static/home/images/ad25.jpg" alt="查看宝贝详情" width="70" /> </a> 
            <div class="desc"> 
             <p> <a href="//shop.mogujie.com/detail/1khz1xo" target="_blank">早秋新款好质感三色入宽松百搭V领套头毛衣女显瘦针织衫打底上衣潮</a> <a class="snapshot" href="//order.mogujie.com/trade/snap?orderId=11kem8d9gh8" target="_blank">[交易快照]</a> </p> 
             <p>颜色：白色</p> 
             <p>尺码：均码</p> 
        
            </div> </td> 
           <td class="price"> <p class="price-old">95.00</p> <p>59.90</p> </td> 
           <td class="quantity">1</td> 
           <td class="aftersale"> </td> 
           <td class="total" rowspan="1"> <p class="total-price">￥ 59.90</p> <p> <span>(全国包邮)</span> </p> </td> 
           <td class="status" rowspan="1"> <p class=""> 交易取消 </p> <a href="/order/detail4buyer?orderId=79563824155946" class="order-link go-detail-link" target="_blank">订单详情</a> </td> 
           <td class="other" rowspan="1"> 
            <ul> 
             <li><a class="order-link order-remove" href="javascript:;" data-shopid="79563824155946">删除订单</a></li> 
            </ul> </td> 
          </tr> 
         </tbody> 
        </table> 
       </div> 
      
       
       
       
       
      </div>

     </div> 
    </div> 
   </div> 
  </div> 




 </body>
</html>