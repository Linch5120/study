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
  <form action="<?php echo U('/Admin/Manager/save_mg');?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
     <div class="form-group">
      <label for="mg_name" class="col-md-1 control-label">管理员</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="mg_name" id="mg_name" placeholder="请输入管理员名称" value="<?php echo ($mg_info["mg_name"]); ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="mg_img" class="col-md-1 control-label">头像</label>
      <div class="col-md-6">
        <input type="file" name="mg_img" id="mg_img" accept="image/*">
        当前头像：<img src="/thinkphp/shop/Public/<?php echo ($mg_info["mg_small_img"]); ?>">
         <p class="help-block">推荐图像大小：25*25 ~ 150*150  不限制图像格式</p>
      </div>
    </div>
     <div class="form-group">
      <label for="mg_phone" class="col-md-1 control-label">手机号码</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="mg_phone" id="mg_phone" placeholder="请输入管理员手机号码" value="<?php echo ($mg_info["mg_phone"]); ?>">
      </div>
    </div>
     <div class="form-group">
      <label for="mg_address" class="col-md-1 control-label">邮箱</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="mg_email" id="mg_email" placeholder="请输入管理员联系方式" value="<?php echo ($mg_info["mg_email"]); ?>">
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-md-10"> 
      <input type="hidden" name="mg_id" value="<?php echo ($mg_info["mg_id"]); ?>">
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