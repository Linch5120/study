<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>博文分类</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
     <div class="col-md-1" style="margin: 15px 0;">
		<a href="<?php echo U('/Admin/Cat/add_cat');?>">
		<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;添加分类</button>
		</a>
	</div>
</div>
<div class="list">
	<form action="<?php echo U('/Admin/Cat/index');?>" method="POST">
	    <table class="table table-bordered">
	        <thead>
	        <tr class="active">
	            <th>编号</th>
	            <th>分类名称</th>
	            <th>添加时间</th>
	            <th>修改时间</th>
	            <th>操作</th>
	        </tr>
	        </thead>
	        <?php foreach($cat_info as $k => $v):?>
	        <tbody>
	        <tr>
	            <td><?php echo ($v["id"]); ?></td>
	            <td><?php echo ($v["name"]); ?></td>
	            <td><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></td>
	            <td>
                    <?php if($v['update_time'] > 0): echo (date("Y-m-d H:i:s",$v["update_time"])); ?>
                    	<?php else: ?>
                    	未修改<?php endif; ?>
	            </td>
	            <td class="operation">
	            <a href="<?php echo U('/Admin/Cat/edit_cat/id/'.$v['id']);?>">
	            <button type="button" class="btn btn-default btn-xs btn-primary">
	            <span class="glyphicon glyphicon-edit"></span>
	            编辑
	            </button>
	            </a>
	            <a href="<?php echo U('/Admin/Cat/del_cat/name/'.$v['name']);?>">
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