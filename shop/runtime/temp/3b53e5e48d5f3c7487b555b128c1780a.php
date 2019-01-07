<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:64:"D:\wamp\www\shop\public/../application/admin\view\user\list.html";i:1546418082;s:56:"D:\wamp\www\shop\application\admin\view\public\base.html";i:1545993573;}*/ ?>
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

    
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>其他</th>
        <!--<th width="25%">内容</th>-->
         <th width="120">留言时间</th>
        <th>操作</th>       
      </tr>  
      <?php foreach($users as $val): ?>    
        <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            1</td>
          <td>xxx</td>
          <td>17611025910</td>
          <td><?php echo $val->number; ?></td>  
           <td></td>         
          <!--<td>这是一套后台UI，喜欢的朋友请多多支持谢谢。</td>-->  
          <td><?php echo $val['create_time']; ?></td>

          <?php if(($val['if_froze']==0)): ?>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return froze(<?php echo $val['id']; ?>)"><span class="icon-trash-o"></span> 冻结</a> </div></td>
          </tr>
          <?php else: ?>
            <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return unfroze(<?php echo $val['id']; ?>)"><span class="icon-trash-o"></span> 解冻</a> </div></td>
          </tr>
          <?php endif; endforeach; ?>
        <!--
          <tr>
          <td><input type="checkbox" name="id[]" value="1" />
            1</td>
          <td>神夜</td>
          <td>13420925611</td>
          <td>564379992@qq.com</td>  
           <td>深圳市民治街道</td>         
          <td>这是一套后台UI，喜欢的朋友请多多支持谢谢。</td>
          <td>2016-07-01</td>
          <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
        </tr>
      <tr>
      -->
      <!--
        <td colspan="8"><div class="pagelist"> 
        <ul class="pagination">
          <li><a href="?page=1">&laquo;</a></li>
          <li><a href="?page=1">1</a></li>
          <li class="active"><span>2</span></li>
          <li class="disabled"><span>&raquo;</span></li>
        </ul>
      -->
          <!--
          <a href="">上一页</a> <span class="current">1</span><a href="">2</a><a href="">3</a><a href="">下一页</a><a href="">尾页</a>
        -->
           </div></td>
      </tr>
    </table>  
  </div>
</form>
<script type="text/javascript">
//冻结用户
function froze(id){
	 layer.confirm('您确定要冻结这个用户吗',function(){
      $.post('/admin/user/forze',{id:id},function(res){
        if(res.status=="success"){
            layer.msg(res.msg,{icon:1});
        }else{
           layer.msg(res.msg,{icon:2});
        }
        location.reload();
      });
   })
}

//解冻结用户
function unfroze(id){
   layer.confirm('您确定要解冻这个用户吗',function(){
      $.post('/admin/user/unforze',{id:id},function(res){
        if(res.status=="success"){
            layer.msg(res.msg,{icon:1});
        }else{
           layer.msg(res.msg,{icon:2});
        }
        location.reload();
      });
   })
}



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
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>

</body>
</html>