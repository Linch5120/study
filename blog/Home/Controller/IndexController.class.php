<?php
namespace Home\Controller;
use Faker\Provider\Image;
use Think\Controller;
use Think\Page;
class IndexController extends Controller{
    public function index(){
        $data['is_delete'] = 0;
        //获取博文总数
        $blog_count = M('Blog') -> where($data) -> count();
        //获取阅读总数
        $comment_count = M('Blog')  -> where($data)  -> sum('visit_count');
        //获取用户总数
        $user_count = M('User') -> where($data) -> count();
        //获取总访客数
        $visitor_count = M('Visitor') -> where($data) -> count();
        $datainfo = compact('blog_count','comment_count','user_count','visitor_count');
        $this -> assign('datainfo',$datainfo);
        //获取分类
        //分页列表
        $num = 5;
        $blog_count = M('Blog') -> where($data) -> count();//查询总数
        $page = new Page($blog_count, $num);//实例化分页类
        $show = $page -> show();//调用分类输出方式
        $limit = $page -> firstRow . ',' . $page -> listRows;//设置limit值
        $this -> assign('show', $show);
        //查询博文
        $info = M('Blog') -> where($data) -> order('blog_id desc') -> limit($limit) -> select();//获得数据信息
        $this -> assign('info', $info);
        //查询留言并显示到主页
        $messageinfo = M('Messagebook') -> order('id desc') -> select();
        $this -> assign('messageinfo', $messageinfo);
        //查询活跃访客并显示在主页
        $user_info = M('User') -> order('login_count desc') -> limit(7) -> select();
        $this->assign('user_info', $user_info);
        //查询推荐博文并显示在主页
        $blog_info = M('Blog') -> order('visit_count desc') -> limit(7) -> select();
        $this -> assign('blog_info', $blog_info);
        //获取登录信息展示在主页
        $map['user_id'] = session('user_id');
        $user_img = M('User') -> where($map) -> getField('user_img');
        $this -> assign('user_img', $user_img);
        $this -> display();
    }

    //添加博文
    public function add_blog()
    {
        $data['is_delete'] = 0;
        $cat_info = M('Cat')->where($data)->select();//获取分类
        $this->assign('cat_info', $cat_info);
        $this->display();
    }

    //保存博文
    public function save_blog(){
        $cat = I('post.cat');
        $title = I('post.title');
        //收集上传图片
        if (!empty($_FILES)) {
            $config = array(
                'rootPath' => './Public/',  //根目录
                'savePath' => 'upload/',   //保存路径
            );
            $upload = new \Think\Upload($config);
            $z = $upload->uploadOne($_FILES['blog_img']);
            if (!$z) {
                show_bug($upload->getError());//获得上传附件产生的错误信息
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
        //添加博文
        $content = nl2br(I('post.content'));
        $data = compact("cat", "title", "content", "blog_big_img", "blog_small_img");
        $data['add_time'] = time();
        $data['is_delete'] = 0;
        $data['com_count'] = 0;
        $data['visit_count'] = 0;
        $data['author'] = session('user_name');
        $map['user_id'] = session('user_id');
        $data['author_img'] = M('User')->where($map)->getField('user_img');
        $res = M('Blog')->add($data);
        if ($res) {
            //展示一个页面并做页面跳转
            $this->success('添加成功', U('Upload/index'));
        } else {
            $this->error('添加失败', U('Upload/index'));
        }
    }

    public function read_blog(){
        //添加访问量
        $map['blog_id'] = I('get.blog_id');
        $visit_count = M('Blog') -> where($map) -> getField('visit_count');
        $visit_count = $visit_count + 1;
        $data['visit_count'] = $visit_count;
        M('Blog') -> where($map) -> save($data);
        //查询博文
        $data['blog_id'] = I('get.blog_id');
        $data['is_delete'] = 0;
        $blog = M('Blog') -> where($data) -> order('blog_id desc') -> select();//获得数据信息
        $this -> assign('blog',$blog);
        //查询评论
        $map['com_blogid'] = I('get.blog_id');
        $comment_info = M('Comment') -> where($map) -> order('com_id desc') -> select();
        $this -> assign('comment_info',$comment_info);
        //查询留言并显示到主页
        $messageinfo = M('Messagebook') -> order('id desc') -> select();
        $this -> assign('messageinfo', $messageinfo);
        //查询活跃访客并显示在主页
        $user_info = M('User') -> order('login_count desc') -> limit(7) -> select();
        $this->assign('user_info', $user_info);
        //查询推荐博文并显示在主页
        $blog_info = M('Blog') -> order('visit_count desc') -> limit(7) -> select();
        $this -> assign('blog_info', $blog_info);
        //获取登录信息展示在主页
        $map['user_id'] = session('user_id');
        $user_img = M('User') -> where($map) -> getField('user_img');
        $this -> assign('user_img', $user_img);

        $this -> display();

    }

    //博文评论
    public function comment(){
        $com_blogid = I('post.com_blogid');
        $com_name = session('user_name');
        $comment = I('post.comment');
        $data = compact("com_blogid", "com_name", "com_img", "comment");
        $user_id = session('user_id');
        $map['user_id'] = session('user_id');
        $data['com_img'] = M('User') -> where($map) -> getField('user_img');
        $data['add_time'] = time();
        $data['com_is_delete'] = 0;
        if (empty($user_id)) {
            $this->error('登陆后才能留言，请登录！', U('Upload/index'));
        } else {
            //添加评论数
            $map['blog_id'] = I('post.com_blogid');
            $com_count = M('Blog') -> where($map) -> getField('com_count');
            $com_count = $com_count + 1;
            $data['com_count'] = $com_count;
            M('Blog') -> where($map)-> save($data);
            //添加评论
            $res = M('Comment') -> add($data);
            if ($res) {
                //展示一个页面并做页面跳转
                $this->success('评论成功');
            } else {
                $this->error('评论失败');
            }
        }
    }

    //留言板
    public function message_book(){
        $user_name = session('user_name');
        $map['user_id'] = session('user_id');
        $user_img = M('User')->where($map)->getField('user_img');
        $message = I('post.message');
        $data = compact("user_name", "user_img", "message");
        $data['add_time'] = time();
        $data['is_delete'] = 0;
        if (empty($user_name)) {
            $this->error('登陆后才能留言，请登录！', U('Upload/index'));
        } else {
            $res = M('Messagebook')->add($data);
            if ($res) {
                //展示一个页面并做页面跳转
                $this->success('添加留言成功', U('Upload/index'));
            } else {
                $this->error('添加留言失败', U('Upload/index'));
            }
        }

    }

    //用户注册
    public function add_user(){
        $user_id = I('post.user_id');
        $user_name = I('post.user_name');
        $user_pwd = I('post.user_pwd');
        $user_sex = I('post.user_sex');
        $user_phone = I('post.user_phone');
        $user_email = I('post.user_email');
        //收集上传图片
        if (!empty($_FILES)) {
            $config = array(
                'rootPath' => './Public/',  //根目录
                'savePath' => 'upload/',   //保存路径
            );
            $upload = new \Think\Upload($config);
            $z = $upload->uploadOne($_FILES['user_img']);
            if (!$z) {
                show_bug($upload->getError());//获得上传附件产生的错误信息
            } else {
                //拼装图片路径名
                $user_img = $z['savepath'] . $z['savename'];
                //把已经上传好的图片制作成缩略图
                $image = new \Think\Image();
                $srcimg = $upload->rootPath . $user_img;
                $image->open($srcimg);
                $image->thumb(50, 50);
                $user_img = $z['savepath'] . "user_" . $z['savename'];
                $image->save($upload->rootPath . $user_img);
                $_POST['user_img'] = $user_img;
            }
        }
        $user_img = I('post.user_img');
        $data = compact("user_name", "user_img", "user_pwd", "user_sex", "user_phone", "user_email");
        $data['add_time'] = time();
        $data['is_delete'] = 0;
        $data['login_count'] = 0;
        $user = new \Model\UserModel(); //表单自动验证
        $res = $user->create();
        $error = $user->getError();
        if ($res) {
            //展示一个页面并做页面跳转
            $user->add($data);
            $this->success('注册成功', U('Upload/index'));
        } else {
            $this->error('注册失败' . '<br>' . '错误：' . $error);
        }

    }

    //修改用户信息
    public function edit_user(){
        $user_id = I('post.user_id');
        $user_name = I('post.user_name');
        $user_pwd = I('post.user_pwd');
        $user_sex = I('post.user_sex');
        $user_phone = I('post.user_phone');
        $user_email = I('post.user_email');
        //收集上传图片
        if (!empty($_FILES)) {
            $config = array(
                'rootPath' => './Public/',  //根目录
                'savePath' => 'upload/',   //保存路径
            );
            $upload = new \Think\Upload($config);
            $z = $upload->uploadOne($_FILES['user_img']);
            if (!$z) {
//                show_bug($upload->getError());//获得上传附件产生的错误信息
                //编辑管理员时，如果没有更改头像将使用上一次设置的头像
                $map['user_id'] = $user_id;
                $user_img = M('User')->where($map)->getField('user_img');
                $_POST['user_img'] = $user_img;
            } else {
                //拼装图片路径名
                $user_img = $z['savepath'] . $z['savename'];
                //把已经上传好的图片制作成缩略图
                $image = new \Think\Image();
                $srcimg = $upload->rootPath . $user_img;
                $image->open($srcimg);
                $image->thumb(50, 50);
                $user_img = $z['savepath'] . "user_" . $z['savename'];
                $image->save($upload->rootPath . $user_img);
                $_POST['user_img'] = $user_img;
            }
        }
        $data = compact("user_name", "user_img", "user_pwd", "user_sex", "user_phone");
        $data['update_time'] = time();
        $map['user_id'] = $user_id;
        $user = new \Model\UserModel(); //表单自动验证
        $res = $user->create();
        $error = $user->getError();
        if ($res) {
            $user->where($map)->save($data);
            $this->success('修改成功', U('Upload/index'));
        } else {
            $this->error('修改失败' . '<br>' . '错误：' . $error);
        }
    }

    //用户登录
    public function login(){
        if (!empty($_POST)) {
            //验证码校验
            $verify = new \Think\Verify();
            if (!$verify->check($_POST['captcha'])) {
                $this->error('验证码错误', U('Upload/login'));
            } else {
                //用户名和密码校验
                $user = new \Model\UserModel();
                $rst = $user->checkNamePwd($_POST['user_name'], $_POST['user_pwd']);
                if ($rst === false) {
                    $this->error('用户或密码错误');
                } else {
                    //登陆信息持久化$_SESSION
                    session('user_name', $rst['user_name']);
                    session('user_id', $rst['user_id']);
                    session('user_pwd', $rst['user_pwd']);
                    $map['user_id'] = session('user_id');
                    //添加用户访问数
                    $login_count = M('User') -> where($map) -> getField('login_count');
                    $login_count = $login_count + 1;
                    $data['login_count'] = $login_count;
                    M('User')-> where($map) -> save($data);
                    //将访问信息添加到数据库my_visitor数据表
                    $visitor_img = M('User')->where($map)->getField('user_img');
                    $visitor_sex = M('User')->where($map)->getField('user_sex');
                    $login_count = M('User')->where($map)->getField('login_count');
                    $visitor_name = session('user_name');
                    $visitor_ip = get_client_ip();//获取登录ip
                    $login_time = time();
                    $data = compact("visitor_name","login_count", "visitor_sex","visitor_img", "visitor_ip", "login_time", "logout_time");
                    $data['is_delete'] = 0;
                    M('Visitor')->add($data);

                    //页面跳转到前台主页
                    $this->redirect('Upload/index');
                }
            }
        } else {
            $this->display();
        }
    }

    //用户注销
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_pwd']);
        unset($_SESSION['visitor_ip']);
        unset($_SESSION['login_time']);
        $this->redirect('Upload/index');
    }

    //生成验证码
    public function verifyimg(){
        $config = array(
            'fontSize' => 16,              // 验证码字体大小(px)
            'imageH' => 35,               // 验证码图片高度
            'imageW' => 133,               // 验证码图片宽度
            'length' => 4,               // 验证码位数
            'fontttf' => '4.ttf',              // 验证码字体，不设置随机获取
            'bg' => array(243, 251, 254),  // 背景颜色
            'reset' => true,           // 验证成功后是否重置
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }
}