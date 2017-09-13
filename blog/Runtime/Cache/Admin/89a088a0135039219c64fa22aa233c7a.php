<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>后台管理</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/thinkphp/shop/Public/css/style.css">
<script type="text/javascript" src="/thinkphp/shop/Public/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/thinkphp/shop/Public/js/bootstrap.js"></script>
</head>
<body>
<div id="bodymain">
<!-- 侧边功能 -->
   <div id="leftmain" class="collapse in">
   <div id="logo">
       <span id="logotitle"><a href="#">博客管理</a></span>
   </div>
     <ul class="nav slider_nav">
        <li>
          <a href="#sub1" data-toggle="collapse" class="gl_active">
            <span class="glyphicon glyphicon-asterisk"></span>&nbsp;
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
                <span class="glyphicon glyphicon-list menu_icon1" data-toggle="tooltip" data-placement="right" title="分类列表"></span>&nbsp;
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
            <span class="menutitle">&nbsp;&nbsp;管理员</span>
            <span class="glyphicon glyphicon-plus pull-right menu_icon2"></span>
          </a>
          <ul id="sub3" class="nav collapse in">
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Manager/index');?>">
                <span class="glyphicon glyphicon-th-list menu_icon1" data-toggle="tooltip" data-placement="right" title="管理员列表"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;管理员列表</span>
              </a>
            </li>
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Manager/index');?>">
                <span class="glyphicon glyphicon-plus-sign menu_icon1" data-toggle="tooltip" data-placement="right" title="添加管理员"></span>&nbsp;
                <span class="menu_list">&nbsp;&nbsp;添加管理员</span>
              </a>
            </li> 
            <li>
              <a href="javascript:;" _link="<?php echo U('/Admin/Manager/index');?>">
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
            <li class="active"><a href="#">主页</a></li>
            <li><a href="#">消息 <span class="badge badge-danger">4</span></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="CurrentTime">
            <span class="glyphicon glyphicon-time"></span>
            <span id="now"></span>
            <!-- &nbsp;<?php echo (date("Y-m-d H:i:s",$CurrentTime)); ?> -->
            </li>
            <li style="width: 46px;height: 52px;">
            <img id="userimg" src="/thinkphp/shop/Public/img/userimg.jpg">
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" id="aa" data-toggle="dropdown">
               <?php echo (session('mg_name')); ?>
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                <a href="<?php echo U('/Admin/Manager/logout');?>"><span class="glyphicon glyphicon-off"></span>
                &nbsp;&nbsp;&nbsp;注销</a>
                </li>
                <li>
                <a href="#"><span class="glyphicon glyphicon-user"></span>
                &nbsp;&nbsp;&nbsp;修改信息</a>
                </li>
                <li>
                <a href="#"><span class="glyphicon glyphicon-pencil"></span>
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