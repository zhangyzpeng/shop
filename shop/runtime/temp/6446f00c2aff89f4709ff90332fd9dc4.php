<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"D:\wamp\www\shop\public/../application/admin\view\goods\list.html";i:1546926287;s:56:"D:\wamp\www\shop\application\admin\view\public\base.html";i:1546830079;}*/ ?>
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
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <form action="/goods/search" method="post">
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="/admin/goods/create"> 添加内容</a> </li>
        <li>搜索：</li>
        
          <li>
          
	            <select name="cat_id" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
	            <option value="">请选择分类</option>
	            <?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
	              <option value="<?php echo $val['id']; ?>"><?php echo $val['cat_name']; ?></option>
	            <?php endforeach; endif; else: echo "" ;endif; ?>
	            </select>
	          </li>
		
        <li>
          <!--<input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
          -->
          <button href="javascript:void(0)" class="button border-main icon-search" onclick="changesearch()" > 搜索</button></li>
      </ul>
    </form>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>图片</th>
        <th>商品名称</th>
        <th>商品价格</th>
        <th>分类名称</th>
        <th>是否上架</th>
        <th>是否热销</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
      <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
        <tr>

          <td><input type="text" name="sort[1]" value="1" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;" /></td>
          <td width="10%"><img src="/<?php echo $val['goods_img']; ?>" alt="" width="70" height="50" /></td>
          <td><?php echo $val['goods_name']; ?></td>
          <td><font color="#00CC99"><?php echo $val['pro_price']; ?></font></td>
          <td><?php echo $val['cat_name']; ?></td>
          <td><?php echo $val['is_on']==1?'已上架':'已下架'; ?></td>
          <td><?php echo $val['is_hot']==1?'热销':'非热销'; ?></td>
          <td><?php echo date("Y-m-d H:i:s",$val['create_time']); ?></td>

          <td><div class="button-group"> <a class="button border-main" href="/admin/goods/<?php echo $val['id']; ?>/edit"><span class="icon-edit"></span> 修改</a> 
          	<?php if(($val['is_on'])==1): ?>
          	<a class="button border-red" href="javascript:void(0)" onclick="return soldOut(<?php echo $val['id']; ?>)"><span class="icon-trash-o"></span> 下架</a> </div></td>
          	<?php else: ?>
          	<a class="button border-red" href="javascript:void(0)" onclick="return soldUp(<?php echo $val['id']; ?>)"><span class="icon-trash-o"></span> 上架</a> </div></td>
          	<?php endif; ?>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <!--
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
      </td>
  -->
      <tr>
        <td colspan="8">
        	<div class="pagelist"><?php echo $data->render(); ?></div>
        </td>
      </tr>
    </table>
  </div>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个商品下架
function soldOut(id){
	layer.confirm('您确定要下架此商品吗?',function(){
		$.ajax({
			type:'DELETE',
			url:'/admin/goods/'+id,
			success:function(res){
				if(res.status=='success'){
					layer.msg(res.msg,{icon:1});
				}else{
					layer.msg(res.msg,{icon:2});
				}
					location.reload();
			}
		});
	})
}

//单个商品上架
function soldUp(id){
	layer.confirm('您确定要上架此商品吗?',function(){
		$.ajax({
			type:'post',
			url:'/admin/goods/UpGoods',
			data:{id:id},
			success:function(res){
				if(res.status=='success'){
					layer.msg(res.msg,{icon:1});
				}else{
					layer.msg(res.msg,{icon:2});
				}
				location.reload();
			}
		});
	})
}

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>

</body>
</html>