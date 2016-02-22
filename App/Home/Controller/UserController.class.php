<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    //自动验证
    protected $_validate = array(
        array('','require','验证码必须！'), //默认情况下用正则进行验证
        array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
        array('pwd','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
        array('pwd','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
        );
    public function index(){
        
    }
    //接收登录
    public function log(){
        $where= "u_name='". $_POST['name']."'";
        
        $u=M('user');
        $data=$u->where($where)->field('u_id,u_name,u_email,u_real_name,u_pwd')->find(); 
        
        if(substr(md5($_POST['pwd']),0,20)==$data['u_pwd']){
            $_SESSION['userId']=$data['u_id'];
            $this->success('登录成功','../Course/index');
        }else{
            $this->error('登录失败');
        }
    }
    //接收注册
    public function reg(){
        $data['u_name']=$_POST['u_name'];
        $data['u_email']=$_POST['u_email'];
        $data['u_pwd']=  md5($_POST['u_pwd']);
       
        $data['u_time']= time();
       
        $u=M('user');
        $re=$u->add($data);
        if($re){
            $this->success('注册成功', '../Index/log');
        }else{
            $this->success('注册失败');
        }
      
    }
    //接收重置
    public function reset(){
        dump($this->_validate);
        dump($_POST);
    }
    //显示个人信息
    public function profel(){
        $id=$_GET['id'];
        $u=M('user');
        $where="user_id=".$id;
        dump($where);
        
        //dump($_GET);
    }
   
}