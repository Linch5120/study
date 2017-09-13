<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>用户注册</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="col-md-12">
 <p style="font-family: 幼圆; color: #278B2D;font-size: 35px;margin: 10px 0 0 50px;">情感说<span style="font-size: 25px;color: #000;">&nbsp;用户注册</span></p>
</div>
<div class="col-md-6 col-md-offset-3" style="margin-top: 30px;">
  <h4 style="text-align: center;font-weight: bold;margin: 20px 0;">用户注册</h4>
  <form action="<?php echo U('/Home/Upload/add_user');?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
     <div class="form-group">
      <label for="user_name" class="col-md-2 control-label">用户名</label>
      <div class="col-md-10">
        <input type="username" class="form-control" name="user_name" id="user_name" placeholder="请输入长度为3-7位的用户名称">
      </div>
    </div>
    <div class="form-group">
      <label for="user_img" class="col-md-2 control-label">头像</label>
      <div class="col-md-10">
        <input type="file" name="user_img" id="user_img" accept="image/*">
         <p class="help-block">推荐图像大小：25*25 ~ 150*150  不限制图像格式</p>
      </div>
    </div>
    <div class="form-group">
      <label for="user_pwd" class="col-md-2 control-label">密码</label>
      <div class="col-md-10">
        <input type="password" class="form-control" name="user_pwd" id="user_pwd" placeholder="请输入长度为6-22位包含字母数字的用户密码">
      </div>
    </div>
    <div class="form-group">
        <label for="user_sex" class="col-md-2 control-label">性别</label>
        <div class="col-md-10">
	        <label class="radio-inline">
	        	<input type="radio" name="user_sex" id="user_sex" value="男" checked> 男
		    </label>
	    	<label class="radio-inline">
		    	<input type="radio" name="user_sex" id="user_sex" value="女"> 女
		    </label>
        </div>
    </div>
    <div class="form-group">
      <label for="user_phone" class="col-md-2 control-label">手机号码</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="user_phone" id="user_phone" placeholder="请输入用户手机号码">
      </div>
    </div>
    <div class="form-group">
      <label for="user_email" class="col-md-2 control-label">邮箱</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="user_email" id="user_email" placeholder="请输入用户邮箱">
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-2 col-md-10">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
  </form>
</div>
</div>
</body>
</html>