<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>博文分类</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/shop/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/shop/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
     <div class="col-md-1" style="margin-top: 8px;">
		<a href="<?php echo U('/Admin/Manager/add_list');?>">
		<button type="button" class="btn btn-success">添加分类</button>
		</a>
	</div>
	<div class="col-md-10">
		<form class="navbar-form" role="search">
	            <div class="form-group">
	              <input type="text" class="form-control" placeholder="搜索">
	            </div>
	            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
	    </form>
    </div>
</div>
<div class="list">
	<form action="<?php echo U('/Admin/Manager/index');?>" method="POST">
	    <table class="table table-hover">
	        <thead>
	        <tr class="active">
	            <th>编号</th>
	            <th>分类名称</th>
	            <th>操作</th>
	        </tr>
	        </thead>
	        <?php foreach($info as $k => $v):?>
	        <tbody>
	        <tr>
	            <td><?php echo ($v["id"]); ?></td>
	            <td><?php echo ($v["name"]); ?></td>
	            <td class="operation">
	            <a href="<?php echo U('/Admin/Manager/edit_list/id/'.$v['id']);?>">
	            <button type="button" class="btn btn-default btn-xs btn-primary">
	            <span class="glyphicon glyphicon-pencil"></span>
	            编辑
	            </button>
	            </a>
	            <a href="<?php echo U('/Admin/Manager/del_list/id/'.$v['id']);?>">
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
	<?php echo ($show); ?>
</div>
</div>
</body>
</html>