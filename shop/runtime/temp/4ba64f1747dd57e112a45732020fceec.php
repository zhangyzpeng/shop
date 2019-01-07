<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\wamp\www\shop\public/../application/home\view\user\login.html";i:1546312642;s:57:"D:\wamp\www\shop\application\home\view\public\header.html";i:1545994529;}*/ ?>
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

  <link rel="stylesheet" type="text/css" href="/static/home/css/bottom.css" media="all" /> 
  <link href="/static/home/css/index.css-944b1a6d.css" rel="stylesheet" type="text/css" /> 

  <link rel="stylesheet" href="/static/lib/validform/css/style.css">
  <script src="/static/lib/validform/js/Validform_v5.3.2_min.js"></script>
  <script src="/static/home/js/jquery.cookie.js"></script>

 </head> 
 <body class="media_screen_1200"> 
  
  <div id="body_wrap"> 
   <div class="login_wrap"> 
    <div class="logo_wrap"> 
     <div class="logo"> 
      <a title="蘑菇街" href="/" class="mainlogo logo_mgj_img"></a> 
      <!-- 新增登陆页绑定手机提示 --> 
      <span class="login-logo-tip">依《网络安全法》相关要求，即日起蘑菇街会员登陆需绑定手机。为保障您的账户安全及正常使用，如您尚未绑定，请尽快完成绑定，感谢您的理解和支持!</span> 
     </div> 
    </div> 
    <div class="content clearfix" style="background:url(/static/home/images/login.jpg) no-repeat center center;"> 
     <div class="lg_banner"> 
     </div> 
     <div class="lg_left ui-option-main-box" id="lg_content"> 
      <!-- 登录方式tab --> 
      <div class="toggle-qrcode"></div> 

      <div class="login_mod_tab"> 
       <div class="fl mod"> 
        <a class="lo_mod tab_on" lo-mod="normal" href="javascript:;" title="普通登入">登录</a> 
       </div> 

      </div> 
      <div id="signform" class="formbox"> 
       <p class="error_tip" style="display: block;">请输入邮箱</p> 
       <div class="lg_form"> 
        <form id='form' method="post" action="/user/login"> 
         <!-- 正常登录 start --> 
         <div class="mod_box lo_mod_box" data-isshow="0"> 
          <div class="ui-sign-item ui-name-item lg_item lg_name"> 
           <input maxlength="32" class="ui-input pwd_text" datatype="e" name="email" id='email' placeholder="邮箱" style="border-color:#CFCFCF;" type="text" />
          </div> 
          <div class="ui-sign-item ui-sign-common-item lg_item lg_pass"> 
           <input maxlength="32" class="ui-input pwd_text" datatype="s6-10" name="password" value="" placeholder="密码" style="border-color:#CFCFCF;" type="password" /> 
          </div>

            <div class="lg_item lg_getcode"> 
            <!--<a href="javascript:;" class="get_tel_code" id="get_tel_code">获取动态码</a> -->
            <input type="button" value="免费获取验证码" class="get_tel_code" id="get_tel_code">
            <input maxlength="32" class="ui-input pwd_text width_180" name="telcode" placeholder="动态码" style="border-color:#CFCFCF;" type="text" /> 
           </div> 		  
         </div> 


         <div class="lg_login clearfix"> 
          <input value="登录" class="sub" type="submit" /> 
         </div> 
 
         <div class="lg_reg"> 
          <a class="findpwd" href="/user/findpwd">忘记密码</a> 
         </div> 

        </form> 
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 

  <script type="text/javascript">

    //获取验证码
     var countdown = 60;
     //$.cookie('countdown',60);
   $("#get_tel_code").click(function(){
      //接收验证码的值
      email = $("#email").val();
        //判断验证码
       //如果邮箱格式不正确就不可以让他发送验证码
       if(!$(".lg_name span").hasClass('Validform_right')){
          return false;
       }
       if(!$(".lg_pass span").hasClass('Validform_right')){
          return false;
       }
       var obj = $("#get_tel_code");
          settime(obj);

          function settime(obj) { //发送验证码倒计时
            if(countdown == 0) {
                obj.attr('disabled', false);
                 obj.attr('value',"免费获取验证码");
                //obj.removeattr("disabled");
                countdown = 60;
                return;
            }else {
                    obj.attr('disabled', true);
                    obj.attr('value',"重新发送(" + countdown + ")");  
                    //var countdown =$.cookie('countdown');
                      countdown--;
                     // $.cookie('countdown',countdown);
                  }
                  setTimeout(function(){
                    settime(obj)
                   }
                , 1000)
          }
      $.post('/user/send',{email:email},function(res){
        //alert(res);
      })
   })
    //验证表单是否正确
    $("#form").Validform({
        tiptype:4,
        ajaxPost:true,
        //自己定义手机号
        /*
        datatype:{
          //手机验证规则
          mobile:/^1[3|5|6|7|8|9]\d{9}$/
        },
        */
        callback:function(res){
            if(res.status=='success'){
                layer.msg(res.msg,{icon:1});
                location.href="/user/user_pic";
            }else{
                layer.msg(res.msg,{icon:2});
            }
        }
    });

</script>
 </body>
</html>