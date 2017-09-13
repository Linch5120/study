<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>博文列表</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/shop/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/shop/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
     <div class="col-md-1" style="margin-top: 8px;">
		<a href="<?php echo U('/Admin/Blog/add_blog');?>">
		<button type="button" class="btn btn-success">添加博文</button>
		</a>
	</div>
	<div class="col-md-1" style="margin-top: 8px;">
	 <a href="<?php echo U('/Admin/Blog/index');?>">
	  	<button type="button" class="btn btn-success">博文列表</button>
	  </a>
	</div>
	<div class="col-md-5">
		<form class="navbar-form" role="search">
            <div class="form-group">
               <input type="text" class="form-control" placeholder="搜索">
            </div>
            <button type="submit" class="btn btn-default">
               <span class="glyphicon glyphicon-search"></span>
            </button>
	    </form>
    </div>
</div>
<div class="list">
	<form action="<?php echo U('/Admin/Blog/index');?>" method="POST">
	    <table class="table table-hover">
	        <thead>
	        <tr class="active">
	            <th>编号</th>
	            <th>博文标题</th>
	            <th>博文内容</th>
	            <th>添加时间</th>
	            <th>修改时间</th>
	            <th>操作</th>
	        </tr>
	        </thead>
	        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tbody>
	        <tr>
	            <td><?php echo ($v["id"]); ?></td>
	            <td><?php echo ($v["title"]); ?></td>
				<td><?php echo (msubstr($v["content"],0,20,'utf-8',true)); ?></td>
	            <td><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></td>
	            <td>
                    <?php if($v['update_time'] > 0): echo (date("Y-m-d H:i:s",$v["update_time"])); ?>
                    	<?php else: ?>
                    	未修改<?php endif; ?>
	            </td>
	            <td class="operation">
	            <a href="<?php echo U('/Admin/Blog/edit_blog/id/'.$v['id']);?>">
	            <button type="button" class="btn btn-default btn-xs btn-primary">
	            <span class="glyphicon glyphicon-pencil"></span>
	            编辑
	            </button>
	            </a>
	            <a href="<?php echo U('/Admin/Blog/del_blog/id/'.$v['id']);?>">
	            <button type="button" class="btn btn-default btn-xs btn-danger">
	            <span class="glyphicon glyphicon-trash"></span>
	            删除</button>
	            </a>
	            </td>
	        </tr>
	        </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
	    </table>
	</form>
	<?php echo ($show); ?>
</div>
</div>
</body>
</html>