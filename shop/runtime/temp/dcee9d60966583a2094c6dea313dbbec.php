<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\wamp\www\shop\public/../application/home\view\order\topay.html";i:1547082981;s:57:"D:\wamp\www\shop\application\home\view\public\header.html";i:1545994529;s:57:"D:\wamp\www\shop\application\home\view\public\footer.html";i:1545967252;}*/ ?>
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
  <title>确认订单</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
  <meta name="copyright" content="mogujie.com" /> 

  <link href="/static/home/css/index.css-709a8a6f.css" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/index.css-d38b80d2.css" rel="stylesheet" type="text/css" /> 

  <script type="text/javascript" src="/static/home/js/pkg-pc-base.js"></script> 

 </head> 
 <body class="media_screen_1200"> 
  


  <div id="body_wrap"> 
   <div id="process_bar"> 
    <div class="g-header clearfix"> 
     <div class="g-header-in wrap clearfix"> 
      <div class="process-bar"> 
       <div class="md_process md_process_len4"> 
        <div class="md_process_wrap md_process_step2_5"> 
         <div class="md_process_sd"></div> 
         <i class="md_process_i md_process_i1"> 1 <span class="md_process_tip">购物车</span> </i> 
         <i class="md_process_i md_process_i2"> 2 <span class="md_process_tip">确认订单</span> </i> 
         <i class="md_process_i md_process_i3"> 3 <span class="md_process_tip">支付</span> </i> 
         <i class="md_process_i md_process_i4"> <img src="static/picture/171012_12eba941iia4fajf729ked218cd8k_23x23.png" alt="" width="23" height="23" /> <span class="md_process_tip">完成</span> </i> 
        </div> 
       </div> 
      </div> 
      <a title="蘑菇街|我的买手街" href="//www.mogujie.com" target="_blank">
       <div class="logo logo-generate"></div> </a> 
     </div> 
    </div>
   </div> 
    <form action="/Order/pay" id="orderForm" method="POST"> 
   <div id="pay_info"> 
    <div class="g-wrap wrap"> 
     <div class="cart_wrap"> 
      <!-- 页面内容 --> 
      <div class="cart_page_wrap pt0"> 
       <h2 class="cart_stit">选择收货地址</h2> 
       <div class="cart_address_wrap" id="cartAddress"> 
        <!-- 选择收获地址list --> 

        <ul class="cart_address_list clearfix" style="height:160px" id="cartAddressList"> 
          
          <?php if(is_array($address) || $address instanceof \think\Collection || $address instanceof \think\Paginator): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;if(($key)==0): ?>
            <li data-aid="570781677"  class="cart_address_card addressCard   selected"> 
          <?php else: ?>
              <li data-aid="570781677" class="cart_address_card addressCard"> 
          <?php endif; ?>
          <a href="javascript:;" data-aid="570781677"> 
            <h5 class="cart_address_tit"><?php echo $val['name']; ?></h5> 
            <p class="cart_address_street"><?php echo $val['street']; ?></p> 
            <p class="cart_address_zipinfo" data-postcode="" data-province="<?php echo $val['pro']; ?>" data-city="<?php echo $val['city']; ?>" data-area="<?php echo $val['dis']; ?>"><?php echo $val['pro']; ?><?php echo $val['city']; ?><?php echo $val['dis']; ?></p> 
            <p class="cart_address_mobile"><?php echo $val['mobile']; ?></p> 
          </a> 
         </li> 
          <?php endforeach; endif; else: echo "" ;endif; ?>
          <input type="hidden" id="name" name="name" value="<?php echo $address['0']['name']; ?>">
          <input type="hidden" id="mobile" name="mobile" value="<?php echo $address['0']['mobile']; ?>">
          <input type="hidden" id="address" name="address" value="<?php echo $address['0']['pro']; ?><?php echo $address['0']['city']; ?><?php echo $address['0']['dis']; ?><?php echo $address['0']['street']; ?>">
        </ul> 
       
        <script type="text/javascript">
          $(".cart_address_card").click(function(){
            //alert('ss');
            //选中地址
            $(this).addClass('selected').siblings().removeClass('selected');

            name =$(".selected .cart_address_tit").text();
            mobile = $(".selected .cart_address_mobile").text();
            address =$(".selected .cart_address_zipinfo").text()+$(".selected .cart_address_street").text();

            $("#name").val(name);
            $("#mobile").val(mobile);
            $("#address").val(address);
            //alert(name);
          })
        </script>
        <!-- 管理收获地址 --> 
        <ul class="cart_address_ctrl clearfix" id="addressCtrl"> 
         
         <li> <a href="/user/address" target="_blank">管理收货地址</a> </li> 
         <li> <a href="/user/address" class="addOtherAddress">使用新地址</a> </li> 
        </ul> 
        <div id="J_otherAddrWrap"></div> 
       </div> 
       <h2 class="cart_stit pt10">确认商品信息</h2> 
       <!-- 身份认证 --> 
       <!-- 身份认证end --> 
      
        <!-- orderForm --> 
        <!-- 表格 --> 
        <table class="cart_table" id="orderTable"> 
         <thead> 
          <tr> 
           <th class="cart_table_goods_wrap">商品</th> 
           <th class="cart_table_goodsinfo_wrap">商品信息</th> 
           <th width="80">单价(元)</th> 
           <th width="80">数量</th> 
           <th class="cart_table_goodsctrl_wrap">小计(元)</th> 
          </tr> 
         </thead> 
         <tbody> 

          <!--商品 遍历-->
          <?php if(is_array($goods_list['goods']) || $goods_list['goods'] instanceof \think\Collection || $goods_list['goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods_list['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
          <tr class="tr_checked item4shop1ou69i"> 
           <td class="cart_table_goods_wrap">
             <a href="/goods/detail/id/<?php echo $val['goods_id']; ?>" target="_blank" class="cart_goods_img"> 
			       <img class="cartImgTip" src="/<?php echo $val['goods_img']; ?>" alt="<?php echo $val['goods_name']; ?>" width="78" height="78" /> 
              </a> 
              <!--
              <a href="//shop.mogujie.com/detail/1khz1xo" target="_blank" class="cart_goods_t cart_hoverline" title="早秋新款好质感三色入宽松百搭V领套头毛衣女显瘦针织衫打底上衣潮">早秋新款好质感三色入宽松百搭V领套头毛衣女显瘦针织衫打底上衣潮</a> 
            -->
            <div class="J_cannotBuyReason"> 
            </div> 
            <div class="J_otherTips"> 
            </div> </td> 
           <td> <p class="cart_lh20">颜色：<?php echo $val['goods_color']; ?></p> <p class="cart_lh20">大小：<?php echo $val['goods_type']; ?></p> </td> 
           <td class="cart_alcenter">
            <!-- 单价 --> <p class="cart_bold cart_itemUnit"><?php echo $val['pro_price']; ?></p> </td> 
           <td class="cart_alcenter">
            <!-- 数量 --> <p class="cart_itemNum"><?php echo $val['goods_num']; ?></p> </td> 
           
           <td class="cart_alcenter">
            <!-- 小计 --> <p class="cart_font16 item_sum itemSum" data-price="59.90"><?php echo $val['total_price']; ?></p> </td> 
          </tr> 
          <input type="text" name="goods[]" value="<?php echo $val['goods_id']; ?>=<?php echo $val['goods_name']; ?>=<?php echo $val['goods_color']; ?>=<?php echo $val['goods_type']; ?>=<?php echo $val['pro_price']; ?>=<?php echo $val['total_price']; ?>=<?php echo $val['goods_num']; ?>" />
          <?php endforeach; endif; else: echo "" ;endif; ?>
          <!--备注：--> 
                      <!--
          <tr class="tr_checked J_invoiceBox"> 
           <td colspan="1" class="pl10 cart_largepding"> 
            <label for="">备注：</label> 
            <input class="cart_table_note cart_text cart_vm  placeholder" name="comment20169841-102087869-8-0" id="" placeholder="补充填写其他信息，如有快递不到也请留言备注" style="color: rgb(204, 204, 204);" type="text" /> 
          </td> 
           <td colspan="3" class="pl10 cart_largepding"> </td> 
           <td colspan="2" class="pr15 cart_largepding"> 
             店铺优惠

            <div class="cart_table_discount shopPromo pt5 clearfix" > 
            </div>
             店铺优惠end 

            <div class="cart_table_discount shopLogi pt5 pr10 clearfix" > 
             <label>快递公司：</label> 
             <select name="" class="postage cart_vm" > <option value="nationalfreepostage" selected="selected">全国包邮</option> </select> 
             <span class="ml20 fr">快递运费：<strong class="J_ShipExpense" data-groupid="111144483_893829821_pt">&yen; 0.00</strong></span> 
            </div> </td> 
          </tr> 
        -->
          <!--合计--> 
          <tr class="tr_checked"> 
           <td colspan="6" class="pl10 pr20 cart_largepding"> 
            <div class="cart_table_disduce cart_lightgray cart_font16 fr">
              合计： 
             <span class="cart_red cart_bold cart_money shopSum" data-groupid="111144483_893829821_pt"><?php echo $goods_list['total_price']; ?></span> 
             <input class="shoppro" value="-1" name="" type="hidden" /> 
             <div class=""> 
             </div> 
            </div> </td> 
          </tr> 

         </tbody> 
        </table> 


      </div> 
     </div> 

     <div> 
      <div class="cart_paybar"> 
       <!--<a href="/Order/pay" class="cart_surebtn fr">确认并付款 &gt;</a> -->
       <!--选择付款方式-->

       <button class="cart_surebtn fr">确认并付款 &gt;</button>
       <span class="cart_paybar_info_cost cart_red cart_bold cart_font26 cart_money fr goodsSum" finalprice="59.90">&yen;<?php echo $goods_list['total_price']; ?></span> 
       <div class="cart_paybar_info cart_pregray fr">
        <!-- 这里的商品不会变动，后端自己算出来就好了 --> 共有 
        <span class="cart_red goodsNum"><?php echo $goods_list['num']; ?></span> 件商品，总计：
        <!--所用商品总价-->
        <input type="text" name="total_price" value="<?php echo $goods_list['total_price']; ?>">
       </div> 
       <a href="/Order/cart" class="cart_back cart_hoverline cart_pregray">返回购物车</a>
       <span>&nbsp;&nbsp;</span>
          <input type="radio" name="pay_type" value="wx" checked="checked">微信支付
          &nbsp;
          <input type="radio" name="pay_type" value="zfb">支付宝
      </div> 
     </div> 
    </div>
   </div> 

       </form>

   
  </div> 

  </div> 
  
    <!---footer开始-->
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
  <!---footer结束--> 

 </body>
</html>