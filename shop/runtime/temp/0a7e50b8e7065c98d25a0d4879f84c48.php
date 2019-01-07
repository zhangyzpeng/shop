<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp\www\shop\public/../application/admin\view\image\list.html";i:1545987149;s:56:"D:\wamp\www\shop\application\admin\view\public\base.html";i:1545993573;}*/ ?>
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
  <button type="button" class="button border-yellow" onclick="window.location.href='/admin/add'"><span class="icon-plus-square-o"></span> 添加内容</button>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="10%">ID</th>
      <th width="20%">图片</th>
      <th width="15%">名称</th>
      <th width="20%">描述</th>
      <th width="15%">操作</th>
    </tr>
    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo $i; ?></td>     
      <td><img src="/<?php echo $val['img_url']; ?>" alt="" width="120" height="50" /></td>     
      <td><?php echo $val['title']; ?></td>
      <!--<td><?php echo $val['type']; ?></td>-->
      <?php if($val['type']==1): ?>
        <td>logo</td>
      <?php endif; if($val['type']==2): ?>
        <td>幻灯片</td>
      <?php endif; ?>
      <td><div class="button-group">
      <a class="button border-main" href="/admin/image/<?php echo $val['id']; ?>/edit"><span class="icon-edit"></span> 修改</a>
      <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $val['id']; ?>)"><span class="icon-trash-o"></span> 删除</a>
      </div></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </table>
</div>
<script type="text/javascript">
function del(id){
    layer.confirm('你确定要删除吗?',function(){
        $.ajax({
          type:'delete',
          url:'/admin/image/'+id,
          datatype:'json',
          success:function(data,b){
            //alert('--->'+data+'---'+b);
            if(data.statu=='success'){
              layer.msg(data.msg,{icon:1});
            }else{
              layer.msg(data.msg,{icon:2});
            }
            location.reload();
            //location.href="/admin/image";
          }
        })
  })
}
</script>

</body>
</html>