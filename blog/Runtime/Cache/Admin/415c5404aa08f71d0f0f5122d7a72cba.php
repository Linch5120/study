<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>用户列表</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/shop/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/shop/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
	<div class="col-md-1" style="margin: 8px 0;">
		<a href="<?php echo U('/Admin/usermessage/index');?>">
		<button type="button" class="btn btn-success">用户列表</button>
		</a>
	</div>
	<div class="col-md-1" style="margin: 8px 0;">
		<a href="<?php echo U('/Admin/Usermessage/visitor');?>">
		<button type="button" class="btn btn-success">访客记录</button>
		</a>
	</div>
</div>
<div class="list">
	<form action="<?php echo U('/Admin/Usermessage/messagebook');?>" method="POST">
	    <table class="table table-hover">
	        <thead>
	        <tr class="active">
	            <th>编号</th>
	            <th>用户名</th>
	            <th>头像</th>
	            <th>留言</th>
	            <th>添加时间</th>
	            <th>操作</th>
	        </tr>
	        </thead>
	        <?php foreach($messageinfo as $k => $v):?>
	        <tbody>
	        <tr>
	            <td><?php echo ($v["id"]); ?></td>
	            <td><?php echo ($v["user_name"]); ?></td>
	            <td><img src="/thinkphp/shop/Public/<?php echo ($v["user_img"]); ?>" width="25px" height="25px"></td>
	            <td><?php echo ($v["message"]); ?></td>
	            <td><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></td>
	            <td class="operation">
	            <a href="<?php echo U('/Admin/Usermessage/del_message/id/'.$v['id']);?>">
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