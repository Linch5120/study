<?php
header("content-type:text/html;charset=utf-8");
//制作一个输出调试函数
function show_bug($msg){
    echo '<pre>';
    var_dump($msg);
    echo '</pre>';
}
//设置tp模式     true为开发模式  false为生产模式
define("APP_DEBUG",true);
//引入框架的核心程序
include "../ThinkPHP/ThinkPHP.php";
