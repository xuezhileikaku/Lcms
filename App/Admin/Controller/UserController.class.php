<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    //显示人员列表
    public function index(){
        $u=M("user");
        $up=$this->getGp();
        foreach ($u->select() as $k => $v) {
            $data[$k]['u_id']=$v['u_id'];
            $data[$k]['u_name']=$v['u_name'];
            $data[$k]['u_pos']=$up['name'][$v['u_pos']];
            $data[$k]['u_email']=$v['u_email'];
            $data[$k]['u_qq']=$v['u_qq'];
            $data[$k]['u_tel']=$v['u_tel'];
          
        }
        $this->assign('user',$data);
        $this->display();
    }
    //添加人员
    public function add() {
        $up=$this->getGp();
        $this->assign('up',$up);
        $this->display();
    } 
     // 接收用户添加的数据
    public function addup() {
        $data['u_name']=$_POST['u_name'];
        $data['u_pos']=$_POST['u_pos'];
        $data['u_email']=$_POST['u_email'];
        $data['u_tel']=(int)$_POST['u_tel'];
        $data['u_qq']=(int)$_POST['u_qq'];
        $u=M('user');
        $re=$u->add($data);
        if($re){
           $this->success('添加成功','index');
       }else{
            $this->error('添加失败');
       }
    }
    //编辑人员信息
    public function edt() {
        $id=$_GET['id'];
        $u=M('user');
        $data=$u->where("u_id=$id")->find();
        $this->assign('user',$data);
        $this->assign('up',$up=$this->getGp());
        $this->display();
    }
    //删除人员
    public function del() {
        $id=(int)$_GET['id'];
        //实例化 
        $u=M('user');
        $re= $u->delete($id);
        if($re){
           $this->success('删除成功','../../index');
       }else{
            $this->error('删除失败');
       }
    }
    //接收编辑的数据
    public function up() {
        
        $id=(int)$_POST['u_id'];
        $data['u_name']=$_POST['u_name'];
        $data['u_pos']=(int)$_POST['u_pos'];
        $data['u_email']=$_POST['u_email'];
        $data['u_tel']=(int)$_POST['u_tel'];
        $data['u_qq']=(int)$_POST['u_qq'];
        //实例化 
        $u=M('user');
        $re= $u->where("u_id=$id")->save($data);
        if($re){
           $this->success('更新成功','index');
       }else{
            $this->error('更新失败');
       }
    }
    
    //获取小组
    public function getGp() {
         $up=M('group');       
        foreach ($up->select() as $v){
            $data['name'][$v['up_id']]=$v['up_name'];
        }
        return $data;
    }
    
}