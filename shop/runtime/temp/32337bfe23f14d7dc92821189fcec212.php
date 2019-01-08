<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\wamp\www\shop\public/../application/admin\view\category\edit.html";i:1546858790;s:56:"D:\wamp\www\shop\application\admin\view\public\base.html";i:1546830079;}*/ ?>
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

    

<div class="panel admin-panel margin-top">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="/admin/Category/<?php echo $cat['id']; ?>">
      <input type="hidden" name="_method" value="put">
      <div class="form-group">
        <div class="label">
          <label>上级分类：</label>
        </div>
        <div class="field">
          <select name="pid" class="input w50">
            <?php if(($cat['pid'])==0): ?>
              <option value="0">顶级分类</option>
            <?php else: if(is_array($top_cats) || $top_cats instanceof \think\Collection || $top_cats instanceof \think\Paginator): $i = 0; $__LIST__ = $top_cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;if(($val['id']==$cat['pid'])): ?>
                   <option <?php echo $val['id']==$cat['pid']?'selected':''; ?> value="<?php echo $val['id']; ?>"><?php echo $val['cat_name']; ?></option> 
                   <?php else: endif; endforeach; endif; else: echo "" ;endif; endif; ?>
          </select>
          <div class="tips">不选择上级分类默认为一级分类</div>
        </div>
      </div>
      <?php if(($cat['pid'])!=0): ?>
         <div class="form-group" id="sel">
          <div class="label">
            <label>是否上架</label>
          </div>
          <div class="field" style="padding-top:8px;"> 
            是 <input name="is_index" value="1"  type="radio" <?php echo $cat['is_index']==1?'checked':''; ?> />
            否 <input name="is_index" value="0"  type="radio" <?php echo $cat['is_index']==0?'checked':''; ?> />
         
          </div>
        </div>
        <?php endif; ?>
      <div class="form-group">
        <div class="label">
          <label>分类名称</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="cat_name" value="<?php echo $cat['cat_name']; ?>" />
          <div class="tips"></div>
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

</body>
</html>