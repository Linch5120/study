<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加博文</title>
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
</div>
<div class="list" style="margin-top: 10px;">
  <form action="<?php echo U('/Admin/Blog/save_blog');?>" method="post" class="form-horizontal" role="form">
     <div class="form-group">
      <label for="title" class="col-md-1 control-label">博文标题</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="title" id="title" placeholder="请输入标题号">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-1 control-label">博文内容</label>
      <div class="col-md-6">
        <textarea class="form-control" name="content" rows="4" placeholder="请输入内容"></textarea>
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-md-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
  </form>
</div>
</div>
</body>
</html>