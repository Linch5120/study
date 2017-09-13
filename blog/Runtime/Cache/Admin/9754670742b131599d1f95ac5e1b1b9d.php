<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>情感说后台管理</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/blog/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/blog/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/blog/Public/js/bootstrap.js"></script>
</head>
<body>
<div id="bodymain">
<!-- 侧边功能 -->
   <div id="leftmain" class="collapse in">
   <div id="logo">
       <span id="logotitle"><a href="">情感说后台管理</a></span>
   </div>
     <ul class="nav slider_nav">
        <li>
          <a href="#sub1" data-toggle="collapse" class="gl_active">
            <span class="glyphicon glyphicon-list-alt"></span>&nbsp;
            <span class="menutitle">&nbsp;&nbsp;博文管理</span>
            <span class="glyphicon glyphicon-plus pull-right menu_icon2"></span>
          </a>
          <ul id="sub1" class="nav collapse in">
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Blog/index');?>">
                <span class="glyphicon glyphicon-th menu_icon1" data-toggle="tooltip" data-placement="right" title="博文列表"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;博文列表</span>
              </a>
            </li>
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Blog/add_blog');?>">
                <span class="glyphicon glyphicon-plus-sign menu_icon1" data-toggle="tooltip" data-placement="right" title="添加博文"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;添加博文</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#sub2" data-toggle="collapse" class="gl_active">
            <span class="glyphicon glyphicon-align-justify"></span>&nbsp;
            <span class="menutitle">&nbsp;&nbsp;分类管理</span>
            <span class="glyphicon glyphicon-plus pull-right menu_icon2"></span>
          </a>
          <ul id="sub2" class="nav collapse in">
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Cat/index');?>">
                <span class="glyphicon glyphicon-th menu_icon1" data-toggle="tooltip" data-placement="right" title="分类列表"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;分类列表</span>
              </a>
            </li>
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Cat/add_cat');?>">
                <span class="glyphicon glyphicon-plus-sign menu_icon1" data-toggle="tooltip" data-placement="right" title="添加分类"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;添加分类</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#sub3" data-toggle="collapse" class="gl_active">
            <span class="glyphicon glyphicon-user"></span>&nbsp;
            <span class="menutitle">&nbsp;&nbsp;博客管理</span>
            <span class="glyphicon glyphicon-plus pull-right menu_icon2"></span>
          </a>
          <ul id="sub3" class="nav collapse in">
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Usermessage/index');?>">
                <span class="glyphicon glyphicon-th menu_icon1" data-toggle="tooltip" data-placement="right" title="管理员列表"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;博客列表</span>
              </a>
            </li>
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Usermessage/visitor');?>">
                <span class="glyphicon glyphicon-blackboard menu_icon1" data-toggle="tooltip" data-placement="right" title="访客记录"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;访客记录</span>
              </a>
            </li>
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Usermessage/messagebook');?>">
                <span class="glyphicon glyphicon-book menu_icon1" data-toggle="tooltip" data-placement="right" title="留言板"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;留言板</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#sub4" data-toggle="collapse" class="gl_active">
            <span class="glyphicon glyphicon-king"></span>&nbsp;
            <span class="menutitle">&nbsp;&nbsp;管理员</span>
            <span class="glyphicon glyphicon-plus pull-right menu_icon2"></span>
          </a>
          <ul id="sub4" class="nav collapse in">
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Manager/index');?>">
                <span class="glyphicon glyphicon-th menu_icon1" data-toggle="tooltip" data-placement="right" title="管理员列表"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;管理员列表</span>
              </a>
            </li>
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Manager/add_mg');?>">
                <span class="glyphicon glyphicon-plus-sign menu_icon1" data-toggle="tooltip" data-placement="right" title="添加管理员"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;添加管理员</span>
              </a>
            </li> 
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Manager/edit_pwd');?>">
                <span class="glyphicon glyphicon-pencil menu_icon1" data-toggle="tooltip" data-placement="right" title="修改密码"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;修改密码</span>
              </a>
            </li> 
          </ul>
        </li>

     </ul>
   </div> <!-- /#leftmain -->
<!-- 头部导航栏 -->
<div id="rightmain">
  <div id="header">
    <nav class="navbar" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div id="yc">
            <span class="glyphicon glyphicon-align-justify"></span>
          </div>
        </div>
          <ul class="nav navbar-nav">
            <li class="active" onclick="JavaScript:location.reload(true)"><a href="">主页</a></li>
          <!--   <li><a href="#">消息 <span class="badge badge-danger">4</span></a></li> -->
            <li class="btn-group btn-group-sm btn_css" role="group" aria-label="...">
              <button type="button" class="btn btn-default" onclick="JavaScript:history.go(-1);"/>
              <span class="glyphicon glyphicon-chevron-left"></span>
              </button>
              <button type="button" class="btn btn-default" onclick="JavaScript:window.history.forward();">
                <span class="glyphicon glyphicon-chevron-right"></span>
              </button>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="CurrentTime">
            <span class="glyphicon glyphicon-time"></span>
            <span id="now"></span>
            </li>
            <li style="width: 46px;height: 52px;">
            <img id="userimg" src="/thinkphp/blog/Public/<?php echo ($manager_img); ?>">
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" id="aa" data-toggle="dropdown">
               <?php echo (session('mg_name')); ?>
              <span class="caret"></span>
              </a>
              <ul id="mg_menu" class="dropdown-menu" role="menu">
                <li>
                <a href="<?php echo U('/Admin/Manager/logout');?>"><span class="glyphicon glyphicon-off"></span>
                &nbsp;&nbsp;&nbsp;注销</a>
                </li>
                <li>
                <a href="javascript:;" _link="<?php echo U('/Admin/Manager/edit_pwd');?>"><span class="glyphicon glyphicon-pencil"></span>
                &nbsp;&nbsp;&nbsp;修改密码</a>
                </li>
              </ul>
            </li>         
          </ul>
        </div>
    <!-- /.container-fluid -->
    </nav>  
   </div><!-- /#header -->
   <div id="rightcontent">
   <div id="index">
    <!-- 各项数据总数展示 -->
     <div class="col-md-12" style="margin-top: 20px;">
      <div class="col-md-3">
        <div class="col-md-12 info_div">
        <div class="col-md-5 info_left">
           <div class="col-md-10 col-md-offset-1 info_icon icon1">
              <div class="info_img"><span class="glyphicon glyphicon-list-alt"></span></div>
           </div>
        </div>
          <div class="col-md-7 info_right">
            <div class="info_count"><?php echo ($info["blog_count"]); ?></div>
            <div class="info_title">博文总数</div> 
          </div>
        </div>
      </div>
      <div class="col-md-3">
      <div class="col-md-12 info_div">
        <div class="col-md-5 info_left">
           <div class="col-md-10 col-md-offset-1 info_icon icon2">
              <div class="info_img"><span class="glyphicon glyphicon-eye-open"></span></div>
           </div>
        </div>
          <div class="col-md-7 info_right">
            <div class="info_count"><?php echo ($info["comment_count"]); ?></div>
            <div class="info_title">阅读总数</div> 
          </div>
        </div>
      </div>
      <div class="col-md-3">
      <div class="col-md-12 info_div">
        <div class="col-md-5 info_left">
           <div class="col-md-10 col-md-offset-1 info_icon icon3">
              <div class="info_img"><span class="glyphicon glyphicon-user"></span></div>
           </div>
        </div>
          <div class="col-md-7 info_right">
            <div class="info_count"><?php echo ($info["user_count"]); ?></div>
            <div class="info_title">博客总数</div> 
          </div>
        </div>
      </div>
      <div class="col-md-3">
      <div class="col-md-12 info_div">
        <div class="col-md-5 info_left">
           <div class="col-md-10 col-md-offset-1 info_icon icon4">
              <div class="info_img"><span class="glyphicon glyphicon-blackboard"></span></div>
           </div>
        </div>
          <div class="col-md-7 info_right">
            <div class="info_count"><?php echo ($info["visitor_count"]); ?></div>
            <div class="info_title">登陆次数</div> 
          </div>
        </div>
      </div>
     </div>
     <!-- 各项数据内容展示 -->
     <div class="col-md-12">
      <div class="col-md-4">
        <div class="col-md-12 Messagebook">
          <h4>留言板</h4>
          <div id="messagelist2">
          <?php if(is_array($messageinfo)): $i = 0; $__LIST__ = $messageinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><img src="/thinkphp/blog/Public/<?php echo ($v["user_img"]); ?>" width="25px" height="25px">&nbsp;&nbsp;<b><?php echo ($v["user_name"]); ?></b></p>
            <p style="color: #6C6C6C"><?php echo ($v["message"]); ?></p>
            <p style="color: #6C6C6C"><?php echo (date("Y-m-d H:i:s",$v["add_time"])); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
          </div>
        </div>
      </div> 
      <div class="col-md-4">
        <div class="col-md-12 Messagebook">
          <h4>最热博文</h4>
         <?php if(is_array($blog_info)): $i = 0; $__LIST__ = $blog_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div style="height: 30px; margin-bottom: 10px;"><b><?php echo ($v["title"]); ?></b><span style="color: #6C6C6C"></span>&nbsp;&nbsp;<span class="badge"><?php echo ($v["visit_count"]); ?></span>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
      <div class="col-md-4">
         <div class="col-md-12 Messagebook">
          <h4>活跃博客</h4>
          <?php if(is_array($user_info)): $i = 0; $__LIST__ = $user_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><img src="/thinkphp/blog/Public/<?php echo ($v["user_img"]); ?>" width="30px" height="30px">
          <b><?php echo ($v["user_name"]); ?></b>&nbsp;&nbsp;<span class="badge"><?php echo ($v["login_count"]); ?></span></p><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
      </div>
      </div>
   </div>
      <iframe id="iframemain" name="iframemain" frameborder="0" scrolling="yes" src=""></iframe>
   </div><!-- /#rightcontent -->
</div><!-- /#rightmain -->
</div><!-- /#bodymain -->

<script type="text/javascript">
  $(document).ready(function(){
    // 点击隐藏菜单
    $('#yc').on('click',function(){
      $('.menu_list,.menutitle,.menu_icon2,#logotitle').fadeToggle(200);
    })
    $('.slider_nav > li > a').on('click',function(){
        $(this).children('.menu_icon2').toggleClass('glyphicon-minus');
    })
    $('.menu_icon1').tooltip();

    //左侧菜单栏切换
    $('.slider_nav li a').on('click',function(){
      var _link = $(this).attr('_link');
      $('#index').hide();
    $('#iframemain').attr('src',_link);
    })
    //头部导航栏切换
    $('#mg_menu li a').on('click',function(){
      var _link = $(this).attr('_link');
    $('#iframemain').attr('src',_link);
    })

    //动态显示当前时间
    setInterval(function() {
      var now = (new Date()).toLocaleString();
      $('#now').text(now);
    }, 1000);
  })
</script>
</body>
</html>