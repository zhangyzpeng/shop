<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"D:\wamp\www\shop\public/../application/home\view\goods\list.html";i:1546769070;s:57:"D:\wamp\www\shop\application\home\view\public\header.html";i:1545994529;s:54:"D:\wamp\www\shop\application\home\view\public\nav.html";i:1546248309;s:57:"D:\wamp\www\shop\application\home\view\public\footer.html";i:1545967252;}*/ ?>
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
  <link rel="stylesheet" href="/static/home/css/nav-mogu-act.css" />
  <link rel="stylesheet" href="/static/home/css/pc_selection_wall.css" />
  <link rel="stylesheet" href="/static/home/css/index.css" /> 
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
  
  
  <!--页面内容 new pagani project-->
  <div id="body_wrap">
   <div class="wrap"> 
    <!--隐藏域不要了,用来拼接_b_key的前一位.的--> 
    <!--<input type="hidden" id="pagani_log_partc" value="jiadian_0" />--> 
    <div id="condition_box">

     <h3 class="sub_title" id="category_all"><?php echo $cat_name; ?></h3>
    </div> 
    <!--图墙导航: 排序和价格筛选等--> 
    <div class="wall_nav_box" id="wall_nav_box"> 
     <div class="sort_container fl"></div>
     <div class="price_input fl">
      <div class="txt">
       <span class="rmb">￥</span>
       <input class="min_price from" value="" name="minPrice" type="text" />
      </div>
      <span class="divid">-</span>
      <div class="txt">
       <span class="rmb">￥</span>
       <input class="max_price to" value="" name="maxPrice" type="text" />
      </div>
      <a class="sbt confirm_btn" href="javascript:;">确定</a>
     </div>
     <div class="price_choice fl"></div>
    </div> 
	
	
	
    <!-- 图墙list部分 --> 
    <div class="wall_goods_box" id="wall_goods_box"> 
   
     <div class="J_scroll_wallbox clearfix" id="J_scroll_wallbox" style="height: auto;">
      <div class="goods_list_mod clearfix J_mod_hidebox J_mod_show">
	  
	  
   <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
       <div class="iwf goods_item ratio3x4">
        <a rel="nofollow" href="/Goods/detail/id/<?php echo $val['id']; ?>" class="img pagani_log_link J_dynamic_imagebox loading_bg_120 J_loading_success" target="_blank"  >

    <img class="J_dynamic_img fill_img" src="/<?php echo $val['goods_img']; ?>" alt="<?php echo $val['goods_img']; ?>" />
    </a>
        <a rel="nofollow" target="_blank" href="#" class="pagani_log_link goods_info_container" >
    <p class="title yahei fl" style="height:40px;margin-bottom:3px"><?php echo $val['goods_name']; ?></p>
         <div class="goods_info fl">
          <b class="price_info yahei">&yen;<?php echo $val['pro_price']; ?></b>
          <p class="org_price fl yahei">&yen;&nbsp;<span><?php echo $val['origin_price']; ?></span></p>

         </div>
     </a>
       </div>
     <?php endforeach; endif; else: echo "" ;endif; ?>
	   
	   
      </div>
     </div> 
    </div>
   </div>
   <!--图墙相关输出完成--> 
  </div>

 

  <!---footer开始-->
  <div class="foot J_siteFooter" data-ptp="_foot" style="background: rgb(245, 245, 245) none repeat scroll 0% 0%;">
   <div class="mgj_copyright">
    <div class="mgj_footer_helper"></div>
    <div class="mgj_footer_otherlink">
     <p class="mgj_footer_otherlink_container"></p>
    </div>

    <div class="mgj_footer_copyright">
     <p class="mgj_footer_copyright_container">
	 <a rel="nofollow" target="_blank" class="mgj_footer_a color_999" href="#"><?php echo $sys['footer']; ?></a>
	 
	 </p>
   </div>
  </div> 
  <!---footer结束--> 



 </body>
</html>