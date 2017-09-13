<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Home\Controller\UserController;
use Think\Page;

class UsermessageController extends Controller {
    //用户首页
    public function index(){
        $data['is_delete'] = 0;
        //分页列表
        $num = 10;
        $mg_count = M('User') -> count();//查询总数
        $page = new Page($mg_count, $num);//实例化分页类
        $show = $page -> show();//调用分类输出方式
        $limit = $page -> firstRow . ',' . $page -> listRows;//设置limit值
        $this -> assign('show', $show);
        //实例化Model对象
        $user_info = M('User') -> where($data) -> order('user_id desc') -> limit($limit) -> select();//获得数据信息
        //把数据assign到模板
        $this -> assign('user_info', $user_info);
        //渲染到页面
        $this -> display();
    }


    //删除用户
    public function del_user(){
        $user_id = I('get.user_id');
        $map['user_id'] = $user_id;
        $data['is_delete'] = 1;
        $res = M('User') -> where($map) -> save($data);
        if($res){
            //展示一个页面并做页面跳转
            $this -> success('删除成功', U('Usermessage/index'));
        } else {
            $this -> error('删除失败', U('Usermessage/index'));
        }
    }

    //访客记录
    public function visitor(){
        $data['is_delete'] = 0;
        //分页列表
        $num = 10;
        $vi_count = M('Visitor') -> count();//查询总数
        $page = new Page($vi_count, $num);//实例化分页类
        $show = $page -> show();//调用分类输出方式
        $limit = $page -> firstRow . ',' . $page -> listRows;//设置limit值
        $this -> assign('show', $show);
        //查询访客记录
        $visitor_info = M('Visitor') -> where($data) -> order('id desc') -> limit($limit) -> select();//获得数据信息
        $this -> assign('visitor_info', $visitor_info);
        $this -> display();
    }

    //删除访客记录
    public function del_visitor(){
        $id = I('get.id');
        $map['id'] = $id;
        $data['is_delete'] = 1;
        $res = M('Visitor') -> where($map) -> save($data);
        if($res){
            //展示一个页面并做页面跳转
            $this -> success('删除成功', U('Usermessage/visitor'));
        } else {
            $this -> error('删除失败', U('Usermessage/visitor'));
        }
    }

    //留言板
    public function messagebook(){
        $data['is_delete'] = 0;
        //分页列表
        $num = 10;
        $mg_count = M('Messagebook') -> count();//查询总数
        $page = new Page($mg_count, $num);//实例化分页类
        $show = $page -> show();//调用分类输出方式
        $limit = $page -> firstRow . ',' . $page -> listRows;//设置limit值
        $this -> assign('show', $show);
        $messageinfo = M('Messagebook') -> where($data) -> limit($limit) -> order('id desc') -> select();
        $this -> assign('messageinfo',$messageinfo);
        $this -> display();
    }

    //删除留言
    public function del_message(){
        $id = I('get.id');
        $map['id'] = $id;
        $data['is_delete'] = 1;
        $res = M('Messagebook') -> where($map) -> save($data);
        if($res){
            //展示一个页面并做页面跳转
            $this -> success('删除成功', U('Usermessage/messagebook'));
        } else {
            $this -> error('删除失败', U('Usermessage/messagebook'));
        }
    }

}