<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>访客记录</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
	<div class="col-md-1" style="margin: 15px 15px 15px 0;">
		<a href="<?php echo U('/Admin/Usermessage/index');?>">
		<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-user"></span>&nbsp;博客列表</button>
		</a>
	</div>
	<div class="col-md-1" style="margin: 15px 0;">
		<a href="<?php echo U('/Admin/usermessage/messagebook');?>">
		<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-book"></span>&nbsp;留言板</button>
		</a>
	</div>
</div>
<div class="list">
	<form action="<?php echo U('/Admin/Usermessage/visitor');?>" method="POST">
	    <table class="table table-bordered">
	        <thead>
	        <tr class="active">
	            <th>编号</th>
	            <th>头像</th>
	            <th>博客</th>
	            <th>性别</th>
	            <th>第几次登陆</th>
	            <th>登陆IP</th>
	            <th>登录时间</th>
	            <th>操作</th>
	        </tr>
	        </thead>
	        <?php foreach($visitor_info as $k => $v):?>
	        <tbody>
	        <tr>
	            <td><?php echo ($v["id"]); ?></td>
	            <td><img src="/thinkphp/blog/Public/<?php echo ($v["visitor_img"]); ?>" width="25px" height="25px"></td>
	            <td><?php echo ($v["visitor_name"]); ?></td>
	            <td><?php echo ($v["visitor_sex"]); ?></td>
	            <td><?php echo ($v["login_count"]); ?></td>
	            <td><?php echo ($v["visitor_ip"]); ?></td>
	            <td><?php echo (date("Y-m-d H:i:s",$v["login_time"])); ?></td>
	            <td class="operation">
	            <a href="<?php echo U('/Admin/Usermessage/del_visitor/id/'.$v['id']);?>">
	            <button type="button" class="btn btn-default btn-xs btn-danger">
	            <span class="glyphicon glyphicon-trash"></span>
	            删除</button>
	            </a>
	            </td>
	        </tr>
	        </tbody>
	        <?php endforeach;?>
	    </table>
	</form>
	<div class="page"><?php echo ($show); ?></div>
</div>
</div>
</body>
</html>