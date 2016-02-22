<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //显示主页面
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
    //退出
    //退出
    public function ext($id) {
        $id=$_GET['id'];
        $u=M('user');
        $where="u_id=".$id;
        $re=$u->where($where)->find();
        if($re){
            unset($_SESSION['userId']);
            $this->success('成功退出','../../log');
        }else{
            $this->success('退出失败','../../index');
        }
    }
}