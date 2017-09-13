<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>编辑博文</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
   <div class="col-md-1" style="margin-top: 8px;">
    <a href="<?php echo U('/Admin/Manager/add_mg');?>">
    <button type="button" class="btn btn-success">添加管理员</button>
    </a>
  </div>
  <div class="col-md-1" style="margin-top: 8px;">
   <a href="<?php echo U('/Admin/Manager/index');?>">
      <button type="button" class="btn btn-success">管理员列表</button>
    </a>
  </div>
</div>
<div class="list" style="margin-top: 10px;">
  <form action="<?php echo U('/Admin/Manager/edit_pwd');?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
     <div class="form-group">
      <label for="mg_name" class="col-md-1 control-label">管理员</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="mg_name" id="mg_name" placeholder="请输入管理员名称" value="<?php echo (session('mg_name')); ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="mg_pwd" class="col-md-1 control-label">密码</label>
      <div class="col-md-6">
        <input type="password" class="form-control" name="mg_pwd" id="mg_pwd" placeholder="请输入管理员密码" value="<?php echo (session('mg_pwd')); ?>">
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-md-10"> 
      <input type="hidden" name="mg_id" value="<?php echo (session('mg_id')); ?>">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
  </div>
  </form>
</div>
</div>
</div>
</div>
</body>
</html>