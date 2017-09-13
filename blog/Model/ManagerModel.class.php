<?php
namespace Model;
use Think\Model;
class ManagerModel extends Model {
    protected $_validate = array(
        //验证用户名
        array('mg_name','require','管理员名称必须填写'),// 验证管理员名称是否填写
        array('mg_name','','管理员名称已经存在！',0,'unique'), // 在新增的时候验证mg_name字段是否唯一
        array('mg_name','3,10','管理员名称长度必须为3-10',0,'length'), // 验证管理员名称字数
        array('mg_pwd','require','密码必须填写'),// 验证密码是否填写
        array('mg_pwd','/^([a-zA-Z0-9]{6,22})$/','密码必须为6-22位的字母数字',0,'regex'), //验证密码字数
        array('mg_phone','require','手机号码必须填写'),
        array('mg_phone','/^1[34578]\d{9}$/','手机号码格式不正确',0,'regex'),
        array('mg_phone','','该手机号码已被占用', 0, 'unique'),
        array('mg_email','require','邮箱必须填写'),
        array('mg_email','','该邮箱已被占用', 0, 'unique'),
        array('mg_email','email','邮箱格式不正确'),

    );

    public function checkNamePwd($name,$pwd){
        //根据$name查询是否有此记录
        $mg_info = $this -> getByMg_name($name); //getByxxx()函数返回一维数组信息
        //$info 不为null继续验证密码
        if(!empty($mg_info)){
            if($mg_info['mg_pwd'] != $pwd){
                return false;
            }else{
                return $mg_info;
            }
        }else{
            return false;
        }

    }


}