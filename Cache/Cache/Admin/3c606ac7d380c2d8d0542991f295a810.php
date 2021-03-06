<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/admin/lib/html5.js"></script>
<script type="text/javascript" src="/Public/admin/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/admin/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/Public/admin/lib/icheck/jquery.icheck.min.js" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]--><title>奖品列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 抽奖管理 <span class="c-gray en">&gt;</span> 奖品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"><a class="btn btn-primary radius" href="javascript:;" onclick="admin_award_add('添加奖品','<?php echo U('Award/add');?>','800')"><i class="Hui-iconfont">&#xe600;</i> 添加奖品</a> </span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">奖品列表</th>
			</tr>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="300">奖品名称</th>
				<th width="100">中奖几率</th>
				<th>描述</th>
				<th width="50">状态</th>
				<th width="120">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr class="text-c">
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["title"]); ?></td>
				<td><?php echo ($v["odds"]); ?></td>
				<td><?php echo ($v["intro"]); ?></td>
				<td><?php echo ($v['status'] ? '正常':'禁用'); ?></td>
				<td class="f-14">
					<a title="编辑" href="javascript:;" onclick="admin_award_edit('奖品编辑','<?php echo U('Award/edit',array('id'=>$v['id']));?>')" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6df;</i>
					</a>
					<a title="删除" href="javascript:;" onclick="admin_award_del(this,'<?php echo ($v["id"]); ?>')" class="ml-5" style="text-decoration:none">
						<i class="Hui-iconfont">&#xe6e2;</i>
					</a>
				</td>
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*-添加*/
function admin_award_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*编辑*/
function admin_award_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_award_del(obj,id){
	layer.confirm('奖品删除须谨慎，确认要删除吗？',function(index){
        var url = "<?php echo U('Award/delete');?>";
		//此处请求后台程序，下方是成功后的前台处理……
		$.get(url,{id:id},function(data){
			if(data.status == 1){
				$(obj).parents("tr").remove();
				layer.msg(data.info,{icon:1,time:1000});
			}else{
				layer.msg(data.info,{icon:2,time:1000});
			}

		});
		


	});
}
</script>

<!-- JavaScript -->
</body>
</html>