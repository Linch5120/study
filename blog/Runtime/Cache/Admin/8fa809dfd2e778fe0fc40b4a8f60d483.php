<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>列表信息</title>
</head>
<body>
	<form action="<?php echo U('/Admin/Upload/save_list');?>" method="POST">
		<table border="1" cellspacing="0" width="100%" style="margin: 0 auto;text-align: center;">
			<thead>
			   <tr>
					<th>编号</th>
					<th>学号</th>
					<th>名字</th>
					<th>性别</th>
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
					<td><a href="<?php echo U('/Admin/Upload/edit_list',$v['id']);?>">修改</a>
					|<a href="<?php echo U('/Admin/Upload/del_list',$v['id']);?>">删除</a></td>
				</tr>
			</tbody>
			<?php endforeach;?>
			<!--<tr>-->
				<!--<td align="center"><input type="submit" value="添加"></td>-->
			<!--</tr>-->
		</table>
	</form>

</body>
</html>