<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\wamp\www\shop\public/../application/home\view\goods\detail.html";i:1546769813;s:57:"D:\wamp\www\shop\application\home\view\public\header.html";i:1545994529;s:54:"D:\wamp\www\shop\application\home\view\public\nav.html";i:1546248309;}*/ ?>
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
  <link href="/static/home/css/index.css-2b71aaa8.css" rel="stylesheet" type="text/css" /> 
  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/index.css-e7d1fc05.css" rel="stylesheet" type="text/css" />
<link href="/static/home/css/icon.css" rel="stylesheet" type="text/css" />  
  <script type="text/javascript" src="/static/home/js/mwp.all.js"></script> 
  <link rel="stylesheet" type="text/css" href="/static/home/css/shopheader.css" /> 
 </head> 
 <body class="media_screen_1200 is-pintuan"> 
  <script type="text/javascript">

	MOGUPROFILE = {};
   
</script> 

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

  <div class="J-shop-top-nav">

  <div id="body_wrap"> 
  
  <div class="shop-detail"> 
   
    <div class="detail-primary clearfix"> 
     <div class="primary-goods"> 
      <div class="clearfix"> 
       <div class="fl goods-info goods-info-dacu" id="J_GoodsInfo"> 
        <div class="info-box"> 
         <h1 class="goods-title"><span itemprop="name">春秋装新款百搭波浪喇叭袖针织打底衫一字领修身上衣套头毛衣女士</span></h1> 
         <div class="goods-prowrap goods-main"> 

          <div class="clearfix main-box"> 
           <dl class="clearfix property-box J_NowPrice_Wrap"> 
            <dt class="property-type property-type-now">
             现价：
            </dt> 
            <dd class="property-cont property-cont-now fl"> 
             <span id="J_NowPrice" class="price">&yen;34.88</span> 
             <span id="J_OriginPrice" class="price">&yen;49.84</span> 
             <em class="pre-price-desc">（9.15价&yen;29.90）</em> 
            </dd> 
            <dd class="property-extra fr"> 
             <span class="mr10">评价： <span class="num"> 447 </span> </span> 
             <span>累计销量： <span class="num J_SaleNum"> 170 </span> </span> 
            </dd> 
           </dl> 
		   

		   
           <dl id="J_ModuleModou" style="display:none" class="clearfix property-box"></dl> 
           <div id="J_ModulePromotions">
            
            <div class="promotions-occupying"></div>
           </div> 
           <dl id="J_ModuleCustomProperty" style="display:none" class="clearfix property-box"></dl> 
          </div> 
         </div> 

         <div class="goods-prowrap goods-sku" id="J_GoodsSku"> 
          <div class="content"> 
           <div class="pannel-title"> 
            <span class="choose-goods-info">选择商品信息</span> 
            <b class="J_PannelClose pannel-close"></b> 
           </div> 
           <div class="box"> 
            <dl class="style clearfix" style="display: block;"> 
             <dt>
              颜色：
             </dt> 
             <dd> 
              <ol class="J_StyleList style-list clearfix">
               <li class="img"  ><img src="/static/home/images/ad11.jpg" /><b></b></li>
               <li class="img"  ><img src="/static/home/images/ad12.jpg" /><b></b></li>
              </ol> 
             </dd> 
            </dl> 
            <dl class="size clearfix" style="display: block;"> 
             <dt>
              尺码：
             </dt> 
             <dd> 
              <ol class="J_SizeList size-list clearfix">
               <li class=" c" data-id="100" title="均码">均码</li>
              </ol> 
             </dd> 
            </dl> 
            <dl class="clearfix"> 
             <dt>
              数量：
             </dt> 
             <dd class="num clearfix"> 
              <div id="J_GoodsNum" class="goods-num fl" data-stock="1921"> 
               <span class="num-reduce num-disable"></span> 
               <input autocomplete="off" class="num-input" value="1" type="text" /> 
               <span class="num-add "></span> 
              </div> 
              <div class="J_GoodsStock goods-stock fl">
               库存1921件
              </div> 
              <div class="J_GoodsStockTip goods-stock-tip fl">
               您所填写的商品数量超过库存！
              </div> 
              <div class="J_EventDesc"></div> 
             </dd> 
            </dl> 
           </div> 
           <div class="pannel-action"> 
            <a href="javascript:;" class="J_PannelOK pannel-ok">确认</a> 
           </div> 
          </div> 
          <div class="goods-buy clearfix"> 
           <a href="/Order/topay" id="J_PinTuanBuy" class="fl mr10 buy-btn buy-now">购买</a> 
           <a href="/Order/cart" id="J_BuyCart" class="fl mr10 buy-cart buy-btn"><i class="m-icon m-icon-shopping-cart"></i></a> 

          </div> 
         </div> 

         <div class="goods-extra clearfix"> 
          <div class="extra-services"> 
           <div class="fl clearfix label">
            服务承诺：
           </div> 
           <ul class="fl clearfix list"> 
            <li class="item">  <img src="/static/home/images/ad13.png" width="24" height="24" /> 全国包邮 </a> </li> 
            <li class="item">  <img src="/static/home/images/ad14.png" width="24" height="24" /> 7天无理由退货 </a> </li> 
            <li class="item">  <img src="/static/home/images/ad15.png" width="24" height="24" /> 72小时发货 </a> </li> 
            <li class="item"> <span class="link"> <img src="/static/home/images/ad16.png" width="24" height="24" /> 延误必赔 </span> </li> 
            <li class="item">  <img src="/static/home/images/ad17.png" width="24" height="24" /> 退货补运费 </a> </li> 
           </ul> 
          </div> 
          <div class="extra-pay"> 
           <div class="fl clearfix label">
            支付方式：
           </div> 
           <div class="fl list list-nomaibei"></div> 
          </div> 
         </div> 
        </div> 
       </div> 
       <div class="fl goods-topimg" id="J_GoodsImg"> 
        <div class="big-img"> 
         <img id="J_BigImg" src="/static/home/images/ad18.jpg" alt="" width="400" /> 
        </div> 
        <div id="J_SmallImgs" class="small-img" style="display: none;"> 
         <div class="box"> 
          <div class="list"> 
           <ul class="clearfix" style="text-align: center;"></ul> 
          </div> 
         </div> 

        </div> 
       </div> 
      </div> 
     </div> 
    </div> 
	

    <div id="J_ModulePintuan">

     <div class="modal-mask"></div>

    </div> 
    <div class="detail-content "> 

     <!-- 主体 --> 
     <div class="col-main"> 
      <!-- 模块标签页 --> 
      <div class="module-tabpanel" id="J_ModuleTabpanel"> 
       <!-- 选项栏 --> 
       <div class="tabbar-box"> 
        <ul class="tabbar-list clearfix"> 
         <li data-panels="graphic,recommend" data-hasnav="true" class="tab-graphic selected"> <a href="javascript:;">商品详情</a> </li> 
         <li data-panels="rates" data-hasnav="false"> <a href="javascript:;">累计评价<em>447</em></a> </li> 
        
         <!-- 购物车模块 --> 
         <li class="module-cart" id="J_ModuleCart"> 
          <div class="cart-info"> 
           <div class="ui-hd cart-hd"> 
            <div class="cart-name" href="javascript:;"> 
             <span><i></i>加入购物车</span> 
            </div> 
           </div> 
           <div class="cart-occupying ui-hide"></div> 
          </div> </li> 
        </ul> 
       </div> 
       <div class="tabbar-bg ui-hide"> 
        <div class="bg-right"></div> 
        <div class="bg-left"></div> 
       </div> 
       <div class="tabbar-occupying ui-hide"></div> 
       <!-- 选项页 --> 
       <div class="panel-box"> 
        <!-- 图文详情 --> 
        <div class="module-panel module-graphic" id="J_ModuleGraphic">
         <!-- 图文详情 -->
         <!--     注：PHP模板走的是本地模板文件：views/modules/module-graphic.php-->
         <!-- 商品描述 --> 
         <div id="J_Graphic_desc"> 
          <div class="panel-title"> 
           <h1>商品描述</h1> 
          </div> 
          <!-- 描述 --> 
          <div class="graphic-text">
           每天5点前下单，基本都是可以当天发货的哦。 还有7天时间无理由包退换，我们是免费送运费险的。让亲们可以无忧无虑的购买。（谢谢支持）
          </div> 
         </div>
         <!-- 产品参数 --> 
         <div id="J_Graphic_产品参数"> 
          <div class="panel-title"> 
           <h1>产品参数</h1> 
          </div> 
          <!-- 产品参数 --> 
          <div class="graphic-block"> 
           <!-- 描述 --> 
           <!-- 表格 --> 
           <table class="parameter-table" id="J_ParameterTable"> 
            <tbody> 
             <tr class=""> 
              <td>图案: 纯色</td> 
              <td>厚薄: 普通</td> 
              <td>颜色: 黑色,白色</td> 
             </tr> 
             <tr class=""> 
              <td>袖型: 喇叭袖</td> 
              <td>衣门襟: 套头</td> 
              <td>尺码: 均码</td> 
             </tr> 
             <tr class=""> 
              <td>衣长: 常规款（51-65cm）</td> 
              <td>版型: 收腰</td> 
              <td>季节: 春秋</td> 
             </tr> 
             <tr class=""> 
              <td>材质: 针织</td> 
              <td>领型: 一字领</td> 
              <td>袖长: 长袖</td> 
             </tr> 
             <tr class=""> 
              <td>风格: 简约</td> 
             </tr> 
            </tbody> 
           </table> 
          </div> 
         </div>

         <!-- 尺码说明 --> 
         <div id="J_Graphic_尺码说明"> 
          <div class="panel-title"> 
           <h1>尺码说明</h1> 
          </div> 
          <!-- 尺码说明 --> 
          <div class="graphic-block"> 
           <!-- 描述 --> 
           <!-- 表格 --> 
           <table class="size-table"> 
            <thead> 
             <tr> 
              <td>尺码</td> 
              <td>胸围</td> 
              <td>袖长</td> 
              <td>肩宽</td> 
              <td>衣长</td> 
             </tr> 
            </thead> 
            <tbody> 
             <tr> 
              <td>均码</td> 
              <td>80-110</td> 
              <td>59</td> 
              <td>40</td> 
              <td>52</td> 
             </tr> 
            </tbody> 
           </table> 
           <!-- 提醒 --> 
           <div class="size-text">
            ※ 以上尺寸为实物人工测量，因测量当时不同会有1-2cm误差，相关数据仅作参考，以收到实物为准。
           </div> 
          </div> 
         </div>
        </div> 
        <!-- 累计评价 --> 
        <div class="module-panel module-rates ui-none" id="J_ModuleRates">
         <div id="J_RatesBuyer"> 
          <div class="rates-buyer"> 
           <div class="comment-content"> 
            <div class="nav clearfix"> 
             <a href="javascript:;" data-type="all" class="c">全部评价（447）</a> 
            </div> 

            <div id="J_RatesBuyerList" class="comments">

			
			
             <div class="item clearfix" data-id="1166rdcs"> 
              <div class="info"> 
               <div class="info-w"> 
     
                <div class="info-t clearfix"> 
                 <span class="name">往***4</span> 
                 <span class="date">2018年09月11日</span> 
                </div> 

                <div class="info-m">
                 刚收到货，配衣服穿，真心不错，大爱，而且和图片一样，款式真心喜欢，值得购买
                </div> 

                <div class="info-b clearfix"> 
                 <p> <span class="sku-choose">颜色:黑色 尺码:均码 </span> </p> 
                 <p> </p> 
                </div>  
               </div> 
              </div> 
              <div class="face"> 
               <img src="/static/home/images/ad21.jpg" /> 
              </div> 
             </div> 
			 
			  <div class="item clearfix" data-id="1166rdcs"> 
              <div class="info"> 
               <div class="info-w"> 
     
                <div class="info-t clearfix"> 
                 <span class="name">往***4</span> 
                 <span class="date">2018年09月11日</span> 
                </div> 

                <div class="info-m">
                 刚收到货，配衣服穿，真心不错，大爱，而且和图片一样，款式真心喜欢，值得购买
                </div> 

                <div class="info-b clearfix"> 
                 <p> <span class="sku-choose">颜色:黑色 尺码:均码 </span> </p> 
                 <p> </p> 
                </div>  
               </div> 
              </div> 
              <div class="face"> 
               <img src="/static/home/images/ad21.jpg" /> 
              </div> 
             </div> 
			 
			  <div class="item clearfix" data-id="1166rdcs"> 
              <div class="info"> 
               <div class="info-w"> 
     
                <div class="info-t clearfix"> 
                 <span class="name">往***4</span> 
                 <span class="date">2018年09月11日</span> 
                </div> 

                <div class="info-m">
                 刚收到货，配衣服穿，真心不错，大爱，而且和图片一样，款式真心喜欢，值得购买
                </div> 

                <div class="info-b clearfix"> 
                 <p> <span class="sku-choose">颜色:黑色 尺码:均码 </span> </p> 
                 <p> </p> 
                </div>  
               </div> 
              </div> 
              <div class="face"> 
               <img src="/static/home/images/ad21.jpg" /> 
              </div> 
             </div> 
			 
			 
			 
			 
            

            </div> 
           </div> 
          </div>
         </div>
         <!-- 成交记录 -->
         <div id="J_RatesOrder"> 
          <div class="panel-title rates-title"> 
           <h1>成交记录</h1> 
          </div> 
          <!-- 成交记录 --> 
          <div class="rates-order"> 
           <!-- 列表 --> 
           <div class="sale-list" id="J_RatesOrderList"></div> 
          </div>
         </div>
        </div> 
       </div> 
      </div> 
     </div> 
     <!-- 侧边栏 --> 
     <div class="col-sidebar"> 
      <!-- 店铺模块 --> 
      <div class="module-shop" id="J_ModuleShop"> 


      <!-- 看了又看模块 --> 
      <div class="module-repeat" id="J_ModuleRepeat">
       <!-- 看了又看 -->
       <!--     注：PHP模板走的是本地模板文件：views/modules/module-repeat.php-->
       <!-- 看了又看信息 -->
       <div class="ui-box repeat-info"> 
        <h3 class="ui-hd">看了又看</h3> 
        <div class="ui-bd"> 
         <!-- 列表 --> 
         <ul class="repeat-list"> 
          <li data-id="1lj1nhy"> 
		  <a class="pic" href="detail.html" target="_blank"> 
		  <img class="lazy loggered" src="/static/home/images/ad20.jpg"  style="display: block;" /> </a>
		  <a class="title" href="detail.html" target="_blank">时尚金丝绒套装女2018秋冬新款韩版刺绣加绒运动休闲卫衣两件套潮</a> 
           <div class="info"> 
            <div class="price"> 
             <em class="price-u">&yen;</em> 
             <span class="price-n">84.9</span> 
            </div> 
            <div class="fav"> 
             <em class="fav-i"></em> 
             <span class="fav-n">758</span> 
            </div> 
           </div> </li> 
            <li data-id="1lj1nhy"> 
		  <a class="pic" href="detail.html" target="_blank"> 
		  <img class="lazy loggered" src="/static/home/images/ad20.jpg"  style="display: block;" /> </a>
		  <a class="title" href="detail.html" target="_blank">时尚金丝绒套装女2018秋冬新款韩版刺绣加绒运动休闲卫衣两件套潮</a> 
           <div class="info"> 
            <div class="price"> 
             <em class="price-u">&yen;</em> 
             <span class="price-n">84.9</span> 
            </div> 
            <div class="fav"> 
             <em class="fav-i"></em> 
             <span class="fav-n">758</span> 
            </div> 
           </div> </li> 
           <li data-id="1lj1nhy"> 
		  <a class="pic" href="detail.html" target="_blank"> 
		  <img class="lazy loggered" src="/static/home/images/ad20.jpg"  style="display: block;" /> </a>
		  <a class="title" href="detail.html" target="_blank">时尚金丝绒套装女2018秋冬新款韩版刺绣加绒运动休闲卫衣两件套潮</a> 
           <div class="info"> 
            <div class="price"> 
             <em class="price-u">&yen;</em> 
             <span class="price-n">84.9</span> 
            </div> 
            <div class="fav"> 
             <em class="fav-i"></em> 
             <span class="fav-n">758</span> 
            </div> 
           </div> </li> 
          


         </ul> 
        </div>
       </div>
      </div> 
     </div> 

	 
	 
   
   <script type="text/javascript">


        var detailInfo = {


      saleStartTime: '',
      state: Number('0') || 0,
      rushState: Number('') || 0,
      detailType: 'item',
      main: {
        originPrice: '¥49.84',
        nowPrice: '¥34.88',
        topImages:  ["https://s11.mogucdn.com/p2/161118/107632225_04030kehk9h0glgfk3b7423ag9744_640x960.jpg"]       },
      attribute:  [] ,
      listBanner:  {} ,
      redPacketsSwitch:  false ,
      loginUserId:  "1bc06ng" ,
      isLogin:  true ,
      isMoguer:  false ,
      isNewPriceItem:  false ,
	 
	  skuInfo:  {} ,
   

   itemInfo:  {} ,
      priceRuleImg:  '' ,
      threeDModel:  ''     };

	  
	  </script> 
  </div> 

  <script type="text/javascript" src="/static/home/js/index-1.js"></script> 

 </body>
</html>