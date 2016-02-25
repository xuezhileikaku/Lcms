<?php
namespace Admin\Controller;
use Think\Controller;
class GpController extends Controller {
    //为人员设置分类
    public function index(){
        $up=M('group');
        //获取成员
        $u=$this->getUser();
        foreach($up->select() as $k=>$v){
            $data[$k]=$v;
            $data[$k]['user']=$u[$v['up_id']];
        }
        //给前台传递数据
        $this->assign('up',$data);
        $this->display();
    }
  
    public function add() {
        $data['up_name']=$_POST['up_name'];
        $data['up_intro']=$_POST['up_intro'];
        $up=M('group');
        $re=$up->add($data);
        if($re){
           $this->success('添加成功','index');
       }else{
            $this->error('添加失败');
       }
    }
    //编辑小组
    public function edt() {
        $id=$_GET['id'];
        $up=M('group');
        $data=$up->where("up_id=$id")->find();
        //
        $this->assign('up',  $data);
        $this->display();
    }
    //删除小组
    public function del() {
        $id=$_GET['id'];
        $up=M('group');
         $re=$up->delete($id);
         if($re){
           $this->success('删除成功','../../index');
        }else{
           $this->error('删除失败');
        }                        
    }
    //接收编辑传过来的信息
    public function up(){
        $id=$_POST['up_id'];
        $data['up_name']=$_POST['up_name'];
        $data['up_intro']=$_POST['up_intro'];
        
       $up=  \M('group');  
       $re= $up->where("up_id=$id")->save($data);
       if($re){
           $this->success('更新成功','index');
       }else{
            $this->error('更新失败');
       }
    }
    //获取部门成员
    public function getUser() {
        $u=M("user");
        foreach ($u->select() as $k=> $v) {
            $data[$v['u_pos']][$v['u_id']]=$v['u_name'];
        }
        return $data;
    }    
}