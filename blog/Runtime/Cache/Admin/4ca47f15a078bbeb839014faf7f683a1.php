<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>博文列表</title>
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="opicon row">
    <div class="col-md-1" style="margin: 15px 50px 15px 0;">
    <a href="<?php echo U('/Admin/Blog/add_blog');?>">
    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;添加博文</button>
    </a>
    </div>
	<div class="col-md-9" style="margin: 8px 0;">
		<form action="<?php echo U('/Admin/Blog/index');?>" method="post" class="navbar-form" role="search">
			<div class="form-group">
		      <label for="cat" class="control-label">分类</label>
		        <select name="cat" id="cat" class="form-control">
		          <option value="">全部</option>
		             <?php if(is_array($cat_info)): $i = 0; $__LIST__ = $cat_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		        </select> 
            </div>
            <div class="form-group col-md-offset-1">
            <label for="keywords" class="control-label">关键词</label>
               <input type="text" class="form-control" name="keywords" placeholder="请输入关键词">
               <input type="submit" class="btn btn-default" value="查询">
            </div>
	    </form>
    </div>
</div>
<div class="list">
	<form>
	    <table class="table table-bordered">
	        <thead>
	        <tr class="active">
	            <th>编号</th>
	            <th>封面</th>
	            <th>博文标题</th>
	            <!-- <th>博文内容</th> -->
	            <th>所属分类</th>
	            <th>头像</th>
	            <th>发布人</th>
	            <th>评论数</th>
	            <th>阅读数</th>
	            <th>添加时间</th>
	            <th>修改时间</th>
	            <th>操作</th>
	        </tr>
	        </thead>
	        <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tbody>
	        <tr>
	            <td><?php echo ($v["blog_id"]); ?></td> 
	            <td><img src="/thinkphp/blog/Public/<?php echo ($v["blog_small_img"]); ?>" width="25px" height="25px"></td>
	            <td><?php echo ($v["title"]); ?></td>
				<!-- <td><?php echo (msubstr($v["content"],0,10,'utf-8',true)); ?></td> -->
				<td><?php echo ($v["cat"]); ?></td>
				<td><img src="/thinkphp/blog/Public/<?php echo ($v["author_img"]); ?>" width="25px" height="25px"></td>
				<td><?php echo ($v["author"]); ?></td>
				<td><?php echo ($v["com_count"]); ?></td>
				<td><?php echo ($v["visit_count"]); ?></td>
	            <td><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></td>
	            <td>
                    <?php if($v['update_time'] > 0): echo (date("Y-m-d H:i:s",$v["update_time"])); ?>
                    	<?php else: ?>
                    	未修改<?php endif; ?>
	            </td>
	            <td class="operation">
	            <a href="<?php echo U('/Admin/Blog/edit_blog/blog_id/'.$v['blog_id']);?>">
	            <button type="button" class="btn btn-default btn-xs btn-primary">
	            <span class="glyphicon glyphicon-edit"></span>
	            编辑
	            </button>
	            </a>
	            <a href="<?php echo U('/Admin/Blog/del_blog/blog_id/'.$v['blog_id']);?>">
	            <button type="button" class="btn btn-default btn-xs btn-danger">
	            <span class="glyphicon glyphicon-trash"></span>
	            删除</button>
	            </a>
	            </td>
	        </tr>
	        </tbody><?php endforeach; endif; else: echo "" ;endif; ?>
	    </table>
	</form>
	<div class="page"><?php echo ($show); ?></div>
</div>
</div>
</body>
</html>