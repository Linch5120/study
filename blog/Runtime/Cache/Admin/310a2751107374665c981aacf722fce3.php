<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>用户登陆</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/shop/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/shop/Public/js/bootstrap.js"></script>
</head>
<body class="login-body">
<div class="container">
    <form class="form-signin" action="<?php echo U('/Admin/Manager/index');?>" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">用户登录</h1>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" name="name" placeholder="用户名" autofocus>
            </div>
            <div class="col-md-12">
                <input type="password" class="form-control" name="password" placeholder="密码">
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
            <div class="col-md-12 registration">
                 <a href="#">
                    修改密码 |
                 </a>
                 <a href="#">
                    注册
                 </a>
            </div>
          </div>
        </div>     
    </form>
</div>
</body>
</html>