<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>编辑数据</title>
</head>
<body>
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
</style>
<body>
<div id="head">
  <a href="<?php echo U('/Admin/Upload');?>"><div class="div-a">数据列表</div></a>
</div>
<div id="list">
  <form action="<?php echo U('/Admin/Upload/save_list');?>" method="post">
      <table border="1" cellspacing="0" style="width: 30%;float: left;text-align: center;">	
        <tr>
        	<td>学号</td>
        	<td><input type="text" name="number" style="width: 95%;" value="<?php echo ($info["number"]); ?>"></td>
        </tr>	
        <tr>
        	<td>姓名</td>
        	<td><input type="text" name="name" style="width: 95%;" value="<?php echo ($info["name"]); ?>"></td>
        </tr>	
        <tr>
        	<td>性别</td>
        	<td><input type="text" name="sex" style="width: 95%;" value="<?php echo ($info["sex"]); ?>"></td>
        </tr>	
        <tr>
          <td>年龄</td>
          <td><input type="text" name="age" style="width: 95%;" value="<?php echo ($info["age"]); ?>"></td>
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
  </form>
</div>

</body>
</html>