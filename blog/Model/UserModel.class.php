<?php
namespace Model;
use Think\Model;
class UserModel extends Model {
    protected $_validate = array(
        //验证用户名
        array('user_name','require','用户名称必须填写'),// 验证管理员名称是否填写
        array('user_name','','用户名称已经存在！',0,'unique'), // 在新增的时候验证mg_name字段是否唯一
        array('user_name','3,10','用户名称长度必须为3-10',0,'length'), // 验证管理员名称字数
        array('user_pwd','require','密码必须填写'),// 验证密码是否填写
        array('user_pwd','/^([a-zA-Z0-9]{6,22})$/','密码必须为6-22位的字母数字',0,'regex'), //验证密码字数
        array('user_phone','require','手机号码必须填写'),
        array('user_phone','/^1[34578]\d{9}$/','手机号码格式不正确',0,'regex'),
        array('user_phone','','该手机号码已被占用', 0, 'unique'),
        array('user_email','require','邮箱必须填写'),
        array('user_email','','该邮箱已被占用', 0, 'unique'),
        array('user_email','email','邮箱格式不正确'),

    );

    public function checkNamePwd($name,$pwd){
        //根据$name查询是否有此记录
        $user_info = $this -> getByUser_name($name); //getByxxx()函数返回一维数组信息
        //$user_info 不为null继续验证密码
        if(!empty($user_info)){
            if($user_info['user_pwd'] != $pwd){
                return false;
            }else{
                return $user_info;
            }
        }else{
            return false;
        }

    }


}