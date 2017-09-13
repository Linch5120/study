<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //获取登录信息
        $map['id'] = session('mg_id');
        $manager_img = M('Manager') -> where($map) ->getField('mg_small_img');
        $this -> assign('manager_img',$manager_img);
        //获取博文总数
        $data['is_delete'] = 0;
        $blog_count = M('Blog') -> where($data) -> count();
        //获取阅读总数
        $comment_count = M('Blog')  -> where($data)  -> sum('visit_count');
        //获取用户总数
        $user_count = M('User') -> where($data) -> count();
        //获取总访客数
        $visitor_count = M('Visitor') -> where($data) -> count();
        $info = compact('blog_count','comment_count','user_count','visitor_count');
        $this -> assign('info',$info);
        //查询留言并显示到主页
        $messageinfo = M('Messagebook') -> order('id desc') -> select();
        $this -> assign('messageinfo', $messageinfo);
        //查询活跃访客并显示在主页
        $user_info = M('User') -> order('login_count desc') -> limit(9) -> select();
        $this->assign('user_info', $user_info);
        //查询推荐博文并显示在主页
        $blog_info = M('Blog') -> order('visit_count desc') -> limit(9) -> select();
        $this -> assign('blog_info', $blog_info);
        $this -> display();

    }
    public function _empty(){
        echo '对不起，方法不存在';
    }

}
