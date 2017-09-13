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
  <form action="<?php echo U('/Admin/Blog/save_blog');?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="cat" class="col-md-1 control-label">博文分类</label>
        <div class="col-md-6">
          <select name="cat" id="cat" class="form-control">
            <option value="">请选择</option>
               <?php if(is_array($cat_info)): $i = 0; $__LIST__ = $cat_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>" <?php if($vo['name'] == $edit_info['cat']): ?>selected="selected"<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
          </select>
        </div>
     </div>  
     <div class="form-group">
      <label for="mg_img" class="col-md-1 control-label">封面</label>
      <div class="col-md-6">
         <input type="file" name="blog_img" id="blog_img" accept="image/*">
         当前封面：<img src="/thinkphp/blog/Public/<?php echo ($edit_info["blog_small_img"]); ?>">
         <p class="help-block">推荐图像大小：150*120 ~ 350*320  不限制图像格式</p>
      </div>
    </div>
     <div class="form-group">
      <label for="title" class="col-md-1 control-label">博文标题</label>
      <div class="col-md-6">
        <input type="text" class="form-control" name="title" id="title" placeholder="请输入标题号" value="<?php echo ($edit_info["title"]); ?>">
      </div>
    </div>
    <div class="form-group">
      <label for="content" class="col-md-1 control-label">博文内容</label>
      <div class="col-md-6">
        <textarea class="form-control" name="content" rows="4" placeholder="请输入内容"><?php echo ($edit_info["content"]); ?></textarea>
      </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-md-10"> 
      <input type="hidden" name="id" value="<?php echo ($edit_info["bolg_id"]); ?>">
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