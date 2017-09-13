<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body style="background: #eee;">
<!-- 头部导航栏 -->
<div id="header">
    <nav class="navbar navbar-fixed-top" role="navigation" style="background: #fff;">
      <div class="container-fluid">
		 <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="<?php echo U('/Home/Upload/index');?>">你说我听</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">PHP<span class="sr-only">(current)</span></a></li>
		        <li><a href="#">MYSQL</a></li>
		        <li><a href="#">JAVASCRIPT</a></li>
		        <li><a href="#">关于</a></li>
		      </ul>
		      <form class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="请输入你要搜索的内容">
		        </div>
		        <button type="submit" class="btn btn-default">搜索</button>
		      </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li>
			      <a href="<?php echo U('/Home/Upload/login');?>">登录</a>
		        </li>
		        <li>
		       		<a href="<?php echo U('/Home/Upload/register');?>">注册</a>
		        </li>
		        <?php if(!empty($_SESSION['user_name'])): ?><li style="width: 46px;height: 50px;">
	                	<img id="userimg" src="/thinkphp/blog/Public/<?php echo ($user_img); ?>">
	                </li>
	           		<li class="dropdown">
	                	<a href="#" class="dropdown-toggle" id="aa" data-toggle="dropdown">
	                    	<?php echo (session('user_name')); ?>
	               		<span class="caret"></span>
	                	</a>
		                <ul id="mg_menu" class="dropdown-menu" role="menu">
			                <li>
			                <a href="<?php echo U('/Home/Upload/logout');?>"><span class="glyphicon glyphicon-off"></span>
			                &nbsp;&nbsp;&nbsp;注销</a>
					        </li>
				            <li>
		                	<a href="javascript:;" _link="<?php echo U('/Admin/Manager/edit_pwd');?>"><span class="glyphicon glyphicon-user"></span>
		                     &nbsp;&nbsp;&nbsp;个人中心</a>
		           			 </li>
		                </ul>
		            </li>
	                <?php else: ?>
	                <li id="login_state">未登录，请登录！</li><?php endif; ?>       
		      </ul>
		    </div><!-- /.navbar-collapse -->
      </div>
    </nav>
</div>
<!-- 博客导航图片 -->
<div id="blogimg">
</div>
<div class="container" style="background: #eee;">
  <div class="row">
    <!-- 左边内容 博文内容展示区 -->
  	<div class="col-md-9" id="blogcontent"> 
  	    <?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="bloglist row">
	  			<div class="col-md-12 title">
		  		   <h4 class="col-md-10">
		  		   <span class="label label-danger"><?php echo ($v["cat"]); ?></span>
		  		     <b><?php echo ($v["title"]); ?></b>
		  		   </h4>
		  		   <div class="col-md-2">
		  		   <div class="blog_down" style="line-height: 35px;text-decoration: none;color: #6C6C6C;text-align: right;">
		  		   <a href="<?php echo U('/Home/Upload/read_blog/blog_id/'.$v['blog_id']);?>">阅读全文</a></div>
		  		   </div>
	  			</div>
	  			<div class="col-md-12">
		  			<div class="col-md-3">
			  			<img src="/thinkphp/blog/Public/<?php echo ($v["blog_small_img"]); ?>" width="150px" height="120px">
		  			</div>
		  			<div class="col-md-9 blog_content" style="color: #6C6C6C"><?php echo ($v["content"]); ?>
		  			</div>
	  			</div>
	  			<div class="col-md-12" style="margin: 5px 0;color: #6C6C6C">
	  				<div class="col-md-3">
	  				    <img src="/thinkphp/blog/Public/<?php echo ($v["author_img"]); ?>" width="25px" height="25px">&nbsp;&nbsp;<?php echo ($v["author"]); ?>
	  				</div>
	  				<div class="col-md-3">
	  					<span class="glyphicon glyphicon-time"></span>
	  					<?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?>
	  				</div>
	  				<div class="col-md-3">	
	  					 <?php if($v['update_time'] > 0): ?><span class="glyphicon glyphicon-pencil"></span>
                    	<?php echo (date("Y-m-d H:i:s",$v["update_time"])); ?>
                    	<?php else: ?>
                    	<span class="glyphicon glyphicon-pencil"></span>
                    	未修改<?php endif; ?>
	  				</div>
	  				<div class="col-md-3">
	  					<span class="glyphicon glyphicon-comment"></span>
	  					评论
	  					<?php echo ($v["com_count"]); ?>
	  					<span class="glyphicon glyphicon-eye-open"></span>
	  					阅读
	  					<?php echo ($v["visit_count"]); ?>
	  				</div>
	  			</div>
	  		</div><?php endforeach; endif; else: echo "" ;endif; ?>
        
        <!-- 分页 -->
        <div class="page"><?php echo ($show); ?></div>
        
  	</div>
  	<!-- 右边内容 -->
  	<div class="col-md-3" style="margin: 10px 0;">
  	    <div class="row" style="margin: 15px 0 0 0;"><a class="btn btn-success btn-lg" href="<?php echo U('/Home/Upload/add_blog');?>" role="button" style="width: 100%;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;你说</a></div>
        <div class="col-md-12 Messagebook">
        	<h4>留言板</h4>
        	<div id="messagelist">
        	<?php if(is_array($messageinfo)): $i = 0; $__LIST__ = $messageinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><img src="/thinkphp/blog/Public/<?php echo ($v["user_img"]); ?>" width="25px" height="25px">&nbsp;&nbsp;<b><?php echo ($v["user_name"]); ?></b></p>
        		<p style="color: #6C6C6C"><?php echo ($v["message"]); ?></p>
        		<p style="color: #6C6C6C"><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
        	</div>
        	<form action="<?php echo U('/Home/Upload/message_book');?>" method="post" class="form-horizontal" role="form">
        	<textarea class="form-control" name="message" rows="2" placeholder="请输入留言" style="margin-top: 10px;"></textarea>
        	<input type="submit" class="btn btn-default" value="留言" id="messagesubmit">
        	</form>
        </div>
        <div class="col-md-12 Messagebook">
        	<h4>活跃访客</h4>
        	<?php if(is_array($user_info)): $i = 0; $__LIST__ = $user_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><img src="/thinkphp/blog/Public/<?php echo ($v["user_img"]); ?>" width="30px" height="30px">
        	<b><?php echo ($v["user_name"]); ?></b>&nbsp;&nbsp;<span class="badge"><?php echo ($v["login_count"]); ?></span></p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="col-md-12 Messagebook">
        	<h4>最热博文</h4>
        	<?php if(is_array($blog_info)): $i = 0; $__LIST__ = $blog_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><b><?php echo ($v["title"]); ?></b><span style="color: #6C6C6C">[<?php echo ($v["cat"]); ?>]</span>&nbsp;&nbsp;<span class="badge"><?php echo ($v["visit_count"]); ?></span></p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
  </div>
</div>
<div id="footer">
	dddd
</div>
<!-- 登录框 -->
<!-- <div id="login">
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
</div> -->

<script type="text/javascript">
    $(document).ready(function(){
    	//留言板
        $('#messagesubmit').click(function(){
            if($('textarea').val()==""){
	           alert("留言内容不能为空");
			   return false;
			}else{
			   return true;
			};
        });
        //博文评论
        $('#commentsubmit').click(function(){
            if($('textarea').val()==""){
	           alert("评论内容不能为空");
			   return false;
			}else{
			   return true;
			};
        });
        //阅读全文
        // $('.blog_up').hide();
        // $('.blog_down').click(function(){   	
        //      $('.blog_content').css("height","auto");
        //      $('.blog_down').hide();
        //      $('.blog_up').show();
        // });
        //   $('.blog_up').click(function(){   	
        //      $('.blog_content').css("height","120px");
        //      $('.blog_down').show();
        //      $('.blog_up').hide();
        // });

    })
</script>

</body>
</html>