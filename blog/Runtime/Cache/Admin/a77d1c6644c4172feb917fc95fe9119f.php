<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>数据列表</title>
</head>
<style type="text/css">
*{
	margin: 0 auto;
}
#head{
	width: 98%;
	height: 50px;
	text-align: center;
}	
.div-a{
	width: 80px;
	height: 30px;
	background-color: #EF62C0;
	float: left;
	margin: 10px 10px 10px 0;
	font-size: 14px;
	color: #fff;
	border-radius: 5px;
	font-family: "微软雅黑";
	line-height: 30px;
}
#list{
	width: 98%;
}
a{
	text-decoration: none;
	color: #000;
}
#list div{
	margin: 5px 0;
}
#list div a{
	display: block;
	float: left;
	width: 30px;
	text-align: center;
	background-color: #9F9F9F;
	color: #FFFFFF;
	border-radius: 5px;
	padding: 1px;
	margin-left: 3px;
}
#list div span{
	display: block;
	float: left;
	width: 30px;
	text-align: center;
	background-color: #EF62C0;
	color: #FFFFFF;
	border-radius: 5px;
	padding: 1px;
	margin-left: 3px;
}
</style>
<body>
<div id="head">
	<a href="<?php echo U('/Admin/Upload/add_list');?>"><div class="div-a">添加数据</div></a>
</div>
<div id="list">
	<form action="<?php echo U('/Admin/Upload');?>" method="POST">
	    <table border="1" cellspacing="0" width="100%" style="margin: 0 auto;text-align: center;">
	        <thead>
	        <tr>
	            <th>编号</th>
	            <th>学号</th>
	            <th>名字</th>
	            <th>性别</th>
	            <th>年龄</th>
	            <th>添加时间</th>
	            <th>操作</th>
	        </tr>
	        </thead>
	        <?php foreach($info as $k => $v):?>
	        <tbody>
	        <tr>
	            <td><?php echo ($v["id"]); ?></td>
	            <td><?php echo ($v["number"]); ?></td>
	            <td><?php echo ($v["name"]); ?></td>
	            <td><?php echo ($v["sex"]); ?></td>
	            <td><?php echo ($v["age"]); ?></td>
	            <td><?php echo (date('Y-m-d H:i:s',$v["add_time"])); ?></td>
	            <td><a href="<?php echo U('/Admin/Upload/edit_list/id/'.$v['id']);?>">编辑</a>|<a href="<?php echo U('/Admin/Upload/del_list/id/'.$v['id']);?>">删除</a></td>
	        </tr>
	        </tbody>
	        <?php endforeach;?>
	    </table>
	</form>
	<?php echo ($show); ?>
</div>
</body>
</html>