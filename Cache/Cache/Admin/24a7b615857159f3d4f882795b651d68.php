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
<![endif]--><title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称或邮箱" value="<?php echo ($key); ?>" id="username">
		<button type="button" class="btn btn-success" onclick="btn_search()" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="admin_add('添加管理员','<?php echo U('Member/add');?>','1000','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr class="text-c">
				<th width="40">ID</th>
				<th width="150">登录名</th>
				<th width="90">角色</th>
				<th width="190">邮箱</th>
				<th width="130">加入时间</th>
				<th width="130">上次登陆</th>
				<th width="100">登陆IP</th>
				<th width="60">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($member)): foreach($member as $key=>$v): ?><tr class="text-c">
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["username"]); ?></td>
				<td><?php echo ($role[$v['role_id']]['name']); ?></td>
				<td><?php echo ($v["email"]); ?></td>
				<td><?php echo (date("Y/m/d H:i:s",$v["create_at"])); ?></td>
				<td><?php echo (date("Y/m/d H:i:s",$v["update_at"])); ?></td>
				<td><?php echo ($v["login_ip"]); ?></td>
				<td class="td-status<?php echo ($v["id"]); ?>">
                    <?php if($v["status"] == 1): ?><span class="label label-success radius">已启用</span>
                        <?php else: ?>
                        <span style="color:red">
                            <span class="label radius">已停用</span>
                        </span><?php endif; ?>
                </td>
				<td class="td-manage<?php echo ($v["id"]); ?>">
                    <?php if($v["status"] == 1): ?><a style="text-decoration:none" onClick="admin_stop(this,'<?php echo ($v["id"]); ?>',1)" title="停用">
                        <i class="Hui-iconfont">&#xe631;</i>
                    </a>
                        <?php else: ?>
                        <a style="text-decoration:none" onClick="admin_stop(this,'<?php echo ($v["id"]); ?>',0)" title="启用">
                            <i class="Hui-iconfont">&#xe615;</i>
                        </a><?php endif; ?>
                    <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo U("Member/update",array("id"=>$v["id"]));?>','1000','500')" class="ml-5" style="text-decoration:none">
                        <i class="Hui-iconfont">&#xe6df;</i>
                    </a>
                    <!--<a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo ($v["id"]); ?>')" class="ml-5" style="text-decoration:none">-->
                        <!--<i class="Hui-iconfont">&#xe6e2;</i>-->
                    <!--</a>-->
                </td>
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
</div>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/laypage/1.2/laypage.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="/Public/admin/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}
function btn_search(){
    var username = $("#username").val();
    window.location.href="<?php echo U('Member/index');?>?key="+username;
}
/*管理员-删除*/
//function admin_del(obj,id){
//	layer.confirm('确认要删除吗？',function(index){
//		//此处请求后台程序，下方是成功后的前台处理……
//        var URL = "<?php echo U('member/delete');?>";
//        $.get(URL,{id:id},function(data){
//            if(data.status == 1){
//                $(obj).parents("tr").remove();
//                layer.msg('已删除!',{icon:1,time:1000});
//            }else{
//                layer.msg(data.info,{icon:1,time:1000});
//            }
//        });
//	});
//}
/*管理员-编辑*/
function admin_edit(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id,status){
	if(status == 1){
		var msg = '确认要停用吗？';
	}else{
		var msg = '确认要启用吗？';
	}
	layer.confirm(msg,function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		var url = "<?php echo U('member/delete');?>";
        $.get(url,{id:id},function(data){
            if(data.status == 1){
                if(status == 1){
                    $(obj).remove();
                    $(".td-manage"+id+"").prepend('<a onClick="admin_stop(this,'+id+',0)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                    $(".td-status"+id+"").html('<span class="label radius">已停用</span>');
                    layer.msg('已停用!',{icon: 5,time:1000});
                }else{
                    $(obj).remove();
                    $('.td-manage'+id+'').prepend('<a onClick="admin_stop(this,'+id+',1)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(".td-status"+id+"").html('<span class="label label-success radius">已启用</span>');
                    layer.msg('已启用!', {icon: 6,time:1000});
                }
            }else{
                layer.msg(data.info,{icon: 5,time:1000});
            }
        });

	});
}

</script>

<!-- JavaScript -->
</body>
</html>