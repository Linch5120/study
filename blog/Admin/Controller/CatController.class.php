<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Home\Controller\UserController;
use Think\Page;

class CatController extends Controller {
    //分类
    public function index(){
        $data['is_delete'] = 0;
        //分页列表
        $num = 9;
        $cat_count = M('Cat') -> count();//查询总数
        $page = new Page($cat_count, $num);//实例化分页类
        $show = $page -> show();//调用分类输出方式
        $limit = $page -> firstRow . ',' . $page -> listRows;//设置limit值
        $this->assign('show', $show);
        //实例化Model对象
        $cat_info = M('Cat') -> where($data) -> order('id desc') -> limit($limit) -> select();//获得数据信息
        //把数据assign到模板
        $this->assign('cat_info', $cat_info);
        //渲染到页面
        $this->display();
    }

    //添加分类
    public function add_cat(){
        $this -> display();
    }

    //编辑分类
    public function edit_cat(){
        //获取需要编辑的数据信息并展示
        $id = I('get.id');
        $cat_info = M('Cat') -> find($id);
        $this -> assign('cat_info',$cat_info);
        $this -> display();
    }

    //保存和添加编辑分类
    public function save_cat(){
        $id = I('post.id')+0;
        $name = I('post.name');
        $data['name'] = $name;
        if($id>0){
            //编辑分类
            $data['update_time'] = time();
            $map['id']=$id;
            $res = M('Cat') -> where($map) -> save($data);
            if ($res) {
                //展示一个页面并做页面跳转
                $this -> success('修改成功', U('Cat/index'));
            } else {
                $this -> error('修改失败', U('Cat/index'));
            }

        }else{
            //添加分类
            $data['add_time'] = time();
            $data['is_delete'] = 0;
            $res = M('Cat') ->add($data);
            if ($res) {
                //展示一个页面并做页面跳转
                $this -> success('添加成功', U('Cat/index'));
            } else {
                $this -> error('添加失败', U('Cat/index'));
            }
        }
    }

    //删除分类
    public function del_cat(){
        $name = I('get.name');
        $map['name'] = $name;
        $data['is_delete'] = 1;
        $res = M('Cat') -> where($map) -> save($data);
        if ($res) {
            //同时删除分类下的博文
            $blog_map['cat'] = $name;
            $res = M('Blog') -> where($blog_map) -> save($data);
         //展示一个页面并做页面跳转
            $this -> success('删除博文分类成功', U('Cat/index'));
        } else {
            $this -> error('删除博文分类失败', U('Cat/index'));
        }
    }

}