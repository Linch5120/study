<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>用户登陆</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="col-md-6 col-md-offset-3">
<form class="form-signin" action="<?php echo U('/Home/Upload/login');?>" method="post">
  <h4 style="text-align: center;font-weight: bold;margin: 20px 0;">用户登录</h4>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="user_name" placeholder="用户名" autofocus>
            </div>
            <div class="col-md-12">
                <input type="password" class="form-control" name="user_pwd" placeholder="密码">
            </div>
            <div class="col-md-6">
                <input id="captcha" type="text" class="form-control" name="captcha" placeholder="验证码">
            </div>
            <div class="col-md-6">
                <img src="<?php echo U('/Admin/Manager/verifyimg');?>">
            </div>
            <div class="col-md-12">
                <button class="btn btn-login btn-block" style="font-size: 22px;" type="submit">
                  登陆
                </button>
            </div>
          </div>
        </div>     
    </form>
</div>
</div>
</body>
</html>