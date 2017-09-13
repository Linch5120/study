<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
use Home\Controller\UserController;
use Think\Page;

class ManagerController extends Controller {
    //管理员首页
    public function index(){
        $data['is_delete'] = 0;
        //分页列表
        $num = 10;
        $mg_count = M('Manager') -> count();//查询总数
        $page = new Page($mg_count, $num);//实例化分页类
        $show = $page -> show();//调用分类输出方式
        $limit = $page -> firstRow . ',' . $page -> listRows;//设置limit值
        $this -> assign('show', $show);
        //实例化Model对象
        $mg_info = M('Manager') -> where($data) -> order('mg_id desc') -> limit($limit) -> select();//获得数据信息
        //把数据assign到模板
        $this -> assign('mg_info', $mg_info);
        //渲染到页面
        $this -> display();
    }

    //添加管理员
    public function add_mg(){
        $this -> display();
    }

    //编辑管理员
    public function edit_mg(){
        //获取需要编辑的数据信息并展示
        $mg_id = I('get.mg_id');
        $mg_info = M('Manager') -> find($mg_id);
        $this -> assign('mg_info',$mg_info);
        $this -> display();
    }

    //保存和添加编辑管理员
    public function save_mg(){
        //获取post提交过来的数据
        $mg_id = I('post.mg_id') + 0;
        $mg_name = I('post.mg_name');
        $mg_pwd = I('post.mg_pwd');
        $mg_phone = I('post.mg_phone');
        $mg_email = I('post.mg_email');
        //收集上传图片
        if(!empty($_FILES)) {
            $config = array(
                'rootPath' => './Public/',  //根目录
                'savePath' => 'upload/',   //保存路径
            );
            $upload = new \Think\Upload($config);
            $z = $upload->uploadOne($_FILES['mg_img']);
            if (!$z) {
//                show_bug($upload->getError());//获得上传附件产生的错误信息
                //编辑管理员时，如果没有更改头像将使用上一次设置的头像
                if($mg_id > 0){
                    $map['mg_id'] = $mg_id;
                    $bimg = M('Manager') -> where($map) -> getField('mg_big_img');
                    $_POST['mg_big_img'] = $bimg;
                    $simg = M('Manager') -> where($map) -> getField('mg_small_img');
                    $_POST['mg_small_img'] = $simg;
                }
            } else {
                //拼装图片路径名
                $bigimg = $z['savepath'] . $z['savename'];
                $_POST['mg_big_img'] = $bigimg;
                //把已经上传好的图片制作成缩略图
                $image = new \Think\Image();
                $srcimg = $upload->rootPath . $bigimg;
                $image->open($srcimg);
                $image->thumb(50, 50);
                $smallimg = $z['savepath'] . "small_" . $z['savename'];
                $image->save($upload->rootPath . $smallimg);
                $_POST['mg_small_img'] = $smallimg;
            }
        }
        //获取上传的图像
        $mg_big_img = I('post.mg_big_img');
        $mg_small_img = I('post.mg_small_img');
        if ($mg_id > 0) {
            //编辑管理员
            $data = compact("mg_name", "mg_big_img", "mg_small_img", "mg_phone", "mg_email");
            $data['update_time'] = time();
            $map['mg_id'] = $mg_id;
            $manager = new \Model\ManagerModel(); //表单自动验证
            $res = $manager -> create();
            $error = $manager ->getError();
            if ($res) {
                $manager -> where($map) -> save($data);
                $this -> success('修改成功', U('Manager/index'));
            } else {
                $this -> error('修改失败'.'<br>'.'错误：'.$error);
            }
        } else {
            //添加管理员
            $data = compact("mg_name", "mg_big_img", "mg_small_img", "mg_pwd", "mg_phone", "mg_email");
            $data['add_time'] = time();
            $data['is_delete'] = 0;
            $manager = new \Model\ManagerModel(); //表单自动验证
            $res = $manager -> create();
            $error = $manager ->getError();
            if ($res) {
                //展示一个页面并做页面跳转
                $manager -> add($data);
                $this -> success('添加成功', U('Manager/index'));
            } else {
                $this->error('添加失败'.'<br>'.'错误：'.$error);
            }

        }
    }

    //删除管理员
    public function del_mg(){
        $mg_id = I('get.mg_id');
        $map['mg_id'] = $mg_id;
        $data['is_delete'] = 1;
        $res = M('Manager') -> where($map) -> save($data);
        if($res){
            //展示一个页面并做页面跳转
            $this -> success('删除成功', U('Manager/index'));
        } else {
            $this -> error('删除失败', U('Manager/index'));
        }
    }

    //修改管理员密码
    public function edit_pwd(){
        $mg_id = session('mg_id');
        $map['mg_id'] = $mg_id;
        if(IS_POST){
            $data['mg_name'] = I('post.mg_name');
            $data['mg_pwd'] = I('post.mg_pwd');
            $res = M('Manager') -> where($map) -> save($data);
            if($res){
                $this -> success('修改密码成功',U('Manager/index'));
            }else{
                $this -> error('修改密码失败',U('Manager/edit_pwd'));
            }
            exit;
        }
        $this -> display();
    }

    //管理员登录
    public function login(){
        if(!empty($_POST)){
            //验证码校验
            $verify = new \Think\Verify();
            if(!$verify -> check($_POST['captcha'])){
                $this -> error('验证码错误',U('Manager/login'));
            }else{
                //用户名和密码校验
                $user = new \Model\ManagerModel();
                $rst =  $user -> checkNamePwd($_POST['mg_name'],$_POST['mg_pwd']);
                if($rst === false){
                    $this -> error('管理员或密码错误',U('Manager/login'));
                }else{
                    //登陆信息持久化$_SESSION
                    session('mg_name',$rst['mg_name']);
                    session('mg_id',$rst['mg_id']);
                    session('mg_pwd',$rst['mg_pwd']);
                    //页面跳转到后台主页
                    $this -> redirect('Upload/index');
                }
            }
        }else{
            $this -> display();
        }
    }

    //管理员注销
    public function logout(){
        unset($_SESSION['mg_id']);
        unset($_SESSION['mg_name']);
        unset($_SESSION['mg_pwd']);
        $this -> redirect('Manager/login');
    }

    //生成验证码
    public function verifyimg(){
        $config =	array(
            'fontSize'  =>  16,              // 验证码字体大小(px)
            'imageH'    =>  35,               // 验证码图片高度
            'imageW'    =>  133,               // 验证码图片宽度
            'length'    =>  4,               // 验证码位数
            'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
            'bg'        =>  array(243, 251, 254),  // 背景颜色
            'reset'     =>  true,           // 验证成功后是否重置
        );
        $verify = new \Think\Verify($config);
        $verify -> entry();
    }

}