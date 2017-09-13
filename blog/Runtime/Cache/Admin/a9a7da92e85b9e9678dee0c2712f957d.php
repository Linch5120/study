<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="" rel="stylesheet">
    <script type="text/javascript" src=""></script>
    <title></title>
</head>
<body>
    <form action="/thinkphp/shop/index.php/Admin/Index/upd" method="POST">
        <table border="1" cellspacing="0" style="margin: 0 auto;">
            <tr>
                <td>ID</td>
                <td align="center"><input type="text" name="id" ></td>
            </tr>
            <tr>
                <td>NUMBER</td>
                <td><input type="text" name="number"></td>
            </tr>
            <tr>
                <td>NAME</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>SEX</td>
                <td><input type="text" name="sex"></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" value="修改"></td>
            </tr>
        </table>
    </form>
</body>
</html>