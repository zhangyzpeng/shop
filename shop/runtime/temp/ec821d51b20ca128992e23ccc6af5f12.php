<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\wamp\www\shop\public/../application/admin\view\category\list.html";i:1546864178;s:56:"D:\wamp\www\shop\application\admin\view\public\base.html";i:1546830079;}*/ ?>
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

    
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <a type="button" class="button border-yellow" href='/admin/Category/create'><span class="icon-plus-square-o"></span> 添加分类</a>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">分类名称</th>
      <th width="15%">是否在首页展示</th>
      <th width="10%">操作</th>
    </tr>
    <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo str_repeat('--',$val['level']); ?><?php echo $val['cat_name']; ?></td>
      <td><?php echo $val['is_index']==1?'是':'否'; ?></td>
      <td>
          <div class="button-group"> 
            <a class="button border-main" href="/admin/Category/<?php echo $val['id']; ?>/edit"><span class="icon-edit"></span> 修改</a><a class="button border-red" href="javascript:void(0)" onclick="return delCat(<?php echo $val['id']; ?>)"><span class="icon-trash-o"></span> 删除</a>
           </div>
      </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script type="text/javascript">
function delCat(id){
	layer.confirm('你确定要删除此分类?',function(){
    $.ajax({
      type:'delete',
      url:'/admin/Category/'+id,
      dateType:'json',
      success:function(res){
          if(res.status=='success'){
              layer.msg(res.msg,{icon:1});
          }else{
            layer.msg(res.msg,{icon:2});
          }
          location.reload();
      }
    });
  });
}
</script>

</body>
</html>