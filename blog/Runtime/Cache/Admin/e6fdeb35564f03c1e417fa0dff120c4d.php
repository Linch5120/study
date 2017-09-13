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
<!-- <div class="container-fluid">
<div class="opicon">
  <a href="<?php echo U('/Admin/Manager/index');?>">
  <button type="button" class="btn btn-success">博文列表</button>
  </a>
</div>
<div class="list">
  <form action="<?php echo U('/Admin/Manager/save_list');?>" method="post">
      <table class="table">	
        <tr>
        	<td>学号</td>
        	<td><input type="text" name="number" value="<?php echo ($info["number"]); ?>"></td>
        </tr>	
        <tr>
        	<td>姓名</td>
        	<td><input type="text" name="name" value="<?php echo ($info["name"]); ?>"></td>
        </tr>	
        <tr>
        	<td>性别</td>
        	<td><input type="text" name="sex" value="<?php echo ($info["sex"]); ?>"></td>
        </tr>	
        <tr>
          <td>年龄</td>
          <td><input type="text" name="age" value="<?php echo ($info["age"]); ?>"></td>
        </tr> 
        <tr>
        	<td>操作</td>
          <td>
          <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
          <input type="submit" value="修改">
          <input type="reset" value="重置">
          </td>
        </tr>
      </table>
  </form> -->
<div class="container-fluid">
<div class="opicon row">
   <div class="col-md-1" style="margin-top: 8px;">
    <a href="<?php echo U('/Admin/Manager/add_list');?>">
    <button type="button" class="btn btn-success">添加博文</button>
    </a>
  </div>
  <div class="col-md-1" style="margin-top: 8px;">
   <a href="<?php echo U('/Admin/Manager/index');?>">
      <button type="button" class="btn btn-success">博文列表</button>
    </a>
  </div>
</div>
<div class="list" style="margin-top: 10px;">
  <form action="<?php echo U('/Admin/Manager/save_list');?>" method="post" class="form-horizontal" role="form">
     <div class="form-group">
      <label for="title" class="col-md-1 control-label">博文标题</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="title" id="title" placeholder="请输入标题号" value="<?php echo ($info["title"]); ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-1 control-label">博文内容</label>
      <div class="col-md-6">
        <textarea class="form-control" name="content" rows="4" placeholder="请输入内容"><?php echo ($info["content"]); ?></textarea>
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-md-10"> 
      <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
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