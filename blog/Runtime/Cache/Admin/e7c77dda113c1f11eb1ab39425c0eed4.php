<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>编辑博文</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/shop/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/shop/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
   <div class="col-md-1" style="margin-top: 8px;">
    <a href="<?php echo U('/Admin/Cat/add_blog');?>">
    <button type="button" class="btn btn-success">添加分类</button>
    </a>
  </div>
  <div class="col-md-1" style="margin-top: 8px;">
   <a href="<?php echo U('/Admin/Cat/index');?>">
      <button type="button" class="btn btn-success">分类列表</button>
    </a>
  </div>
</div>
<div class="list" style="margin-top: 10px;">
  <form action="<?php echo U('/Admin/Cat/save_cat');?>" method="post" class="form-horizontal" role="form">
     <div class="form-group">
      <label for="title" class="col-md-1 control-label">分类名称</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="name" id="name" placeholder="请输入分类名称" value="<?php echo ($cat_info["name"]); ?>">
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-md-10"> 
      <input type="hidden" name="id" value="<?php echo ($cat_info["id"]); ?>">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
  </form>
</div>
</div>
</div>
</div>
</body>
</html>