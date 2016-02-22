<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    //show index
    public function index(){
       
    	$this->display();

    }
    //登录
    public function log(){
        $this->display();
    }
    //注册
    public function reg() {
        
        $this->display();
    }
    //接收注册数据
    public function regUp() {
        $data['u_name']=$_POST['u_name'];
        $data['u_email']=$_POST['u_email'];
        $data['u_pwd']=  md5($_POST['u_pwd']);
       
        $data['u_time']= time();
       
        $u=M('user');
        $re=$u->add($data);
        if($re){
            $this->success('注册成功', '../Index/index');
        }else{
            $this->success('注册失败');
        }
    }
    //登录数据
    public function logIn() {
        $where= "u_name='". $_POST['name']."'";
        $u=M('user');
        $data=$u->where($where)->field('u_id,u_name,u_email,u_real_name,u_pwd')->find(); 
        if(substr(md5($_POST['pwd']),0,20)==$data['u_pwd']){
            $_SESSION['user']['id']=$data['u_id'];
            $_SESSION['user']['name']=$data['u_real_name'];
            $this->success('登录成功','../Course/index');
        }else{
            $this->error('登录失败');
        }
    }
    //退出
    public function ext($id) {
        $id=$_GET['id'];
        $u=M('user');
        $where="u_id=".$id;
        $re=$u->where($where)->find();
        if($re){
            unset($_SESSION['user']);
            $this->success('成功退出','__APP__/index.php/Admin/Index/index');
        }else{
            $this->error('退出失败');
        }
    }
}