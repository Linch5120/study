<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Home\Controller\UserController;
use Think\Page;

class BlogController extends Controller {
    //首页frameset html框架集成方法
    public function index(){
        //获取分类
        $data['is_delete'] = 0;
        $cat_info = M('Cat') -> where($data) -> select();
        $this -> assign('cat_info',$cat_info);
        //查询
        $cat = I('post.cat');
        $keywords = I('post.keywords');
        if($cat){
            $data['cat'] = $cat;
        }
        if(!empty($keywords)){
            $data['title'] = array('like','%'.$keywords.'%');
        }
        //分页列表
        $num = 10;
        $blog_count = M('Blog') -> where($data) -> count();//查询总数
        $page = new Page($blog_count,$num);//实例化分页类
        $show = $page -> show();//调用分类输出方式
        $limit = $page -> firstRow.','.$page -> listRows;//设置limit值
        $this -> assign('show',$show);
        //实例化Model对象
        $info = M('Blog') -> where($data) -> order('blog_id desc') -> limit($limit) -> select();//获得数据信息
        //把数据assign到模板
        $this -> assign('info',$info);
        //渲染到页面
        $this -> display();
    }

    //添加博文
    public function add_blog(){
        $data['is_delete'] = 0;
        $cat_info = M('Cat') -> where($data) -> select();//获取分类
        $this -> assign('cat_info',$cat_info);
        $this -> display();
    }

    //编辑博文
    public function edit_blog(){
        //获取需要编辑的数据信息并展示
        $blog_id = I('get.blog_id');
        $edit_info = M('Blog') -> find($blog_id);
        $this -> assign('edit_info',$edit_info);
        //获取分类
        $data['is_delete'] = 0;
        $cat_info = M('Cat') -> where($data) -> select();
        $this -> assign('cat_info',$cat_info);
        $this -> display();
    }

    //保存和添加编辑博文
    public function save_blog(){
        $blog_id = I('post.blog_id')+0;
        $cat = I('post.cat');
        $title = I('post.title');
        //收集上传图片
        if(!empty($_FILES)) {
            $config = array(
                'rootPath' => './Public/',  //根目录
                'savePath' => 'upload/',   //保存路径
            );
            $upload = new \Think\Upload($config);
            $z = $upload->uploadOne($_FILES['blog_img']);
            if (!$z) {
//                show_bug($upload->getError());//获得上传附件产生的错误信息
                //编辑博文时，如果没有更改封面将使用上一次设置的封面
                if($blog_id > 0){
                    $map['blog_id'] = $blog_id;
                    $bimg = M('Blog') -> where($map) -> getField('blog_big_img');
                    $_POST['blog_big_img'] = $bimg;
                    $simg = M('Blog') -> where($map) -> getField('blog_small_img');
                    $_POST['blog_small_img'] = $simg;
                }
            } else {
                //拼装图片路径名
                $bigimg = $z['savepath'] . $z['savename'];
                $_POST['blog_big_img'] = $bigimg;
                //把已经上传好的图片制作成缩略图
                $image = new \Think\Image();
                $srcimg = $upload->rootPath . $bigimg;
                $image->open($srcimg);
                $image->thumb(150, 120);
                $smallimg = $z['savepath'] . "small_" . $z['savename'];
                $image->save($upload->rootPath . $smallimg);
                $_POST['blog_small_img'] = $smallimg;
            }
        }
        //获取上传的图像
        $blog_big_img = I('post.blog_big_img');
        $blog_small_img = I('post.blog_small_img');
        if($blog_id>0){
            //编辑博文
            $content = I('post.content');
            $content = str_replace(array("&lt;","&gt;","br","/"),"",$content);//去除<br />
            $content = nl2br($content);//换行加<br />
            $data = compact("cat","title","content","blog_big_img","blog_small_img");
            $data['update_time'] = time();
            $map['blog_id'] = $blog_id;
            $res = M('Blog') -> where($map) -> save($data);
            if ($res) {
                //展示一个页面并做页面跳转
                $this->success('修改成功', U('Blog/index'));
            } else {
                $this->error('修改失败', U('Blog/index'));
            }

        }else{
            //添加博文
            $content = nl2br(I('post.content'));
            $data = compact("cat","title","content","blog_big_img","blog_small_img");
            $data['add_time'] = time();
            $data['is_delete'] = 0;
            $data['com_count'] = 0;
            $data['visit_count'] = 0;
            $data['author'] = session('mg_name');
            $map['id'] = session('mg_id');
            $data['author_img'] = M('Manager') -> where($map) ->getField('mg_small_img');
            $res = M('Blog') -> add($data);
            if ($res) {
                //展示一个页面并做页面跳转
                $this->success('添加成功', U('Blog/index'));
            } else {
                $this->error('添加失败', U('Blog/index'));
            }
        }
    }

    //删除博文
    public function del_blog(){
        $id = I('get.blog_id');
        $map['blog_id'] = $id;
        $data['is_delete'] = 1;
        $res = M('Blog') -> where($map) -> save($data);
        if ($res) {
            //展示一个页面并做页面跳转
            $this->success('删除成功', U('Blog/index'));
        } else {
            $this->error('删除失败', U('Blog/index'));
        }
    }

}