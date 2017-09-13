<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller {
    //空操作方法
    function _empty(){
        echo '对不起，控制器不存在';
    }
    
}