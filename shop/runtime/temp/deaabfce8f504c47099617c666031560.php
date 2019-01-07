<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp\www\shop\public/../application/admin\view\goods\edit.html";i:1546751968;s:56:"D:\wamp\www\shop\application\admin\view\public\base.html";i:1545993573;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/static/admin/css/pintuer.css">
<link rel="stylesheet" href="/static/admin/css/admin.css">
<link rel="stylesheet" href="/static/lib/validform/css/style.css">
<script src="/static/admin/js/jquery.js"></script>
<script src="/static/lib/validform/js/Validform_v5.3.2_min.js"></script>
<script src="/static/lib/layer/layer.js"></script>
<script src="/static/admin/js/pintuer.js"></script>
</head>
<body>

    
<link rel="stylesheet" type="text/css" href="/static/lib/webuploader-0.1.5/webuploader.css">
<script type="text/javascript" src="/static/lib/webuploader-0.1.5/webuploader.js"></script>

<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/goods/<?php echo $goods['id']; ?>"> 
      <input type="hidden" name="_method" value="put">
      <div class="form-group">
        <div class="label">
          <label>商品名称：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $goods['goods_name']; ?>" name="goods_name" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
          <div class="label">
            <label>商品分类：</label>
          </div>
          <div class="field">
            <select name="cat_id" class="input w50">
              <option value="">请选择分类</option>
              <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $val['id']; ?>" <?php echo $goods['cat_id']==$val['id']?'selected':''; ?>><?php echo $val['cat_name']; ?></option>  
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <div class="tips"></div>
          </div>
        </div>

      <div class="form-group">
        <div class="label">
          <label>商品原价：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $goods['origin_price']; ?>" name="origin_price" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>

      <div class="form-group">
        <div class="label">
          <label>商品促销价格：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $goods['pro_price']; ?>" name="pro_price" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div> 
      
        <div class="form-group">
        <div class="label">
          <label>商品图片：</label>
        </div>
        <div class="field">
         <!--dom结构部分-->
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker1">选择图片</div>
                <span id="tip1" style="position: absolute; margin-left: 400px; margin-top: -300px;">
                   <img style="width:200px; height: 200px;" src="/<?php echo $goods['goods_img']; ?>">
                  <input type="hidden" name="goods_img" value='<?php echo $goods['goods_img']; ?>'>
                  <!--
                  <img style="width:200px; height: 200px;" src="http://img14.360buyimg.com/n1/s350x449_jfs/t25414/290/2767919437/153103/9cebcf9a/5bed2a16N49fa19ed.jpg!cc_350x449.jpg">
                  -->
                </span>
            </div>
        </div>
      </div>  

   
        <div class="form-group">
        <div class="label">
          <label>商品颜色：</label>
        </div>
        <div class="field">
         <!--dom结构部分-->
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker2">选择图片</div>
                <span id="tip2" style="position: absolute; margin-left: 400px; margin-top: -150px;">
                  <?php if(is_array($goods['goods_color']) || $goods['goods_color'] instanceof \think\Collection || $goods['goods_color'] instanceof \think\Paginator): $i = 0; $__LIST__ = $goods['goods_color'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>  
                  <img style="width:100px; height: 100px;" src="/<?php echo $val; ?>">
                  <input type="hidden" name="goods_color[]" value='<?php echo $val; ?>'>
                  <!--
               <img style="width:200px; height: 200px;" src="http://img14.360buyimg.com/n1/s350x449_jfs/t25414/290/2767919437/153103/9cebcf9a/5bed2a16N49fa19ed.jpg!cc_350x449.jpg">
                -->
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </span>
            </div>
        </div>
      </div> 

        <div class="form-group">
          <div class="label">
            <label>是否上架</label>
          </div>
          <div class="field" style="padding-top:8px;"> 
            是 <input name="is_on" <?php echo $goods['is_on']==1?'checked':''; ?> value="1"  type="radio" checked="checked" />
            否 <input name="is_on" value="0"  type="radio" <?php echo $goods['is_on']==0?'checked':''; ?>/>
         
          </div>
        </div>

      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>商品类型：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?php echo $goods['goods_type']; ?>" name="goods_type" placeholder="商品型号请用 | 隔开" />
        </div>
      </div>

       <div class="form-group">
        <div class="label">
          <label>商品详情：</label>
        </div>
        <div class="field">
         <!--dom结构部分-->
            <div id="uploader-demo">
                <!--用来存放item-->
                <div id="fileList" class="uploader-list"></div>
                <div id="filePicker3">选择图片</div>
                <span id="tip3" style="position: absolute; margin-left: 400px; margin-top: -200px;">
                 <img style="width:500px; height: 300px;" src="/<?php echo $goods['goods_desc']; ?>">
                 <input type="hidden" name="goods_desc" value='<?php echo $goods['goods_desc']; ?>'>
                  <!--
                 <img style="width:200px; height: 200px;" src="http://img14.360buyimg.com/n1/s350x449_jfs/t25414/290/2767919437/153103/9cebcf9a/5bed2a16N49fa19ed.jpg!cc_350x449.jpg">
                -->
                </span>
            </div>
        </div>
      </div> 

      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">

   // 初始化Web Uploader
    var uploader1 = WebUploader.create({

    // 选完文件后，是否自动上传。
    auto: true,

    // swf文件路径
    swf: '/static/lib/webuploader-0.1.5/',

    // 文件接收服务端。
    server: '/goods/image/upload',

    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker1',

    // 只允许选择图片文件。
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    }
});

  // 文件上传成功，给item添加成功class, 用样式标记上传成功。
  uploader1.on( 'uploadSuccess', function( file,data) {
      if(data.status=='success'){
        $("#tip1").html('<img style="width:200px; height: 200px;" src=/'+data.msg+'>');
        $("#tip1").append('<input type="hidden" name="goods_img" value='+data.msg+'>');
      }else{
        $("#tip1").html('<span style="color:red;">'+data.msg+'</span>');
      }
  })
  //--------------------

     // 初始化Web Uploader
var uploader2 = WebUploader.create({

    // 选完文件后，是否自动上传。
    auto: true,

    // swf文件路径
    swf: '/static/lib/webuploader-0.1.5/',

    // 文件接收服务端。
    server: '/goods/image/upload',

    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker2',

    // 只允许选择图片文件。
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    }
});

  uploader2.on('fileQueued', function(){
      $("#tip2").html('');
  });
  // 文件上传成功，给item添加成功class, 用样式标记上传成功。
  uploader2.on( 'uploadSuccess', function( file,data) {
      if(data.status=='success'){
        $("#tip2").append('<img style="width:100px; height: 100px;" src=/'+data.msg+'>');
        $("#tip2").append('<input type="hidden" name="goods_color[]" value='+data.msg+'>');
      }else{
        $("#tip2").html('<span style="color:red;">'+data.msg+'</span>');
      }
  })

//-----------------------

   // 初始化Web Uploader
var uploader3 = WebUploader.create({

    // 选完文件后，是否自动上传。
    auto: true,

    // swf文件路径
    swf: '/static/lib/webuploader-0.1.5/',

    // 文件接收服务端。
    server: '/goods/image/upload',

    // 选择文件的按钮。可选。
    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
    pick: '#filePicker3',

    // 只允许选择图片文件。
    accept: {
        title: 'Images',
        extensions: 'gif,jpg,jpeg,bmp,png',
        mimeTypes: 'image/*'
    }
});

  // 文件上传成功，给item添加成功class, 用样式标记上传成功。
  uploader3.on( 'uploadSuccess', function( file,data) {
      if(data.status=='success'){
        $("#tip3").html('<img style="width:500px; height: 300px;" src=/'+data.msg+'>');
        $("#tip3").append('<input type="hidden" name="goods_desc" value='+data.msg+'>');
      }else{
        $("#tip3").html('<span style="color:red;">'+data.msg+'</span>');
      }
  })
</script>

</body>
</html>