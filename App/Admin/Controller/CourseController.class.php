<?php
namespace Admin\Controller;
use Think\Controller;
class CourseController extends Controller {
    public function index(){
        $course=M("course");
        $data=$course->select();
        $co=array();
        $user=  $this->getUser();
        foreach ($data as $key => $v) {
            $co[$key]['co_id']=$v['co_id'];
            $co[$key]['co_name']=$v['co_name'];
            $co[$key]['co_time_s']=$v['co_time_s'];
            $co[$key]['co_time_e']=$v['co_time_e'];
            $co[$key]['co_process']=$v['co_process']."%";
            $co[$key]['co_type']=$v['co_type'];
            $co[$key]['co_manager']=$user[$v['co_manager']];
        }
        $this->assign('co',$co);
        $this->display();
    }
    //添加课程
    public function add() {
        //获取学科类别
        $data['cat']=$this->getCat();
        $data['user']= $this->getUser();
        $this->assign('data',$data);
         $this->display();
    }
    //接收添加课程传递的数据
    public function addUp() {
        dump($_POST);
        exit();
        $data['co_name']=$_POST['co_name'];
        $data['co_manager']=(int)$_POST['co_manager'];
        $data['co_cat']=(int)$_POST['co_cat'];
        $data['co_time_s']=$_POST['co_time_s'];
        $data['co_time_e']=$_POST['co_time_e'];
        $data['co_process']=$_POST['co_process'];
        $data['co_type']=$_POST['co_type'];
        $course=M("course");
        
       $re= $course->add($data);
       if($re){
           $this->success('添加成功','index');
       }else{
            $this->error('添加失败');
       }
    }
     //删除课程
    public function del() {
         $id=$_GET['co'];
         $course=M("course");
         $re=$course->delete($id);
         if($re){
           $this->success('删除成功','../../index');
       }else{
            $this->error('删除失败');
       }
    }
   
    //课程编辑
    public function edt() {
        $id=$_GET['co'];
        $course=M("course");
        $data=$course->where("co_id=$id")->find();
        //var_dump($data);
        $this->assign('dat',$data);
        $this->assign('user',  $this->getUser());
        $this->assign('cat',  $this->getCat());
        $this->display();
    }
   //课程设置
    public function set() {
        $this->display();
    }
    //课程更新
    public function up() {
        $id=$_POST['co_id'];
        $data['co_name']=$_POST['co_name'];
        $data['co_manager']=(int)$_POST['co_manager'];
        $data['co_cat']=(int)$_POST['co_cat'];
        $data['co_time_s']=$_POST['co_time_s'];
        $data['co_time_e']=$_POST['co_time_e'];
        $data['co_type']=$_POST['co_type'];
        $data['co_process']=$_POST['co_process'];
        $course=M("course");  
       $re= $course->where("co_id=$id")->save($data);
       if($re){
           $this->success('更新成功','index');
       }else{
            $this->error('更新失败');
       }
    }
    //获取用户id对应的名称
    public function getUser(){ 
        $u=M("user");
        foreach ($u->select() as $v) {
            $data[$v['u_id']]=$v['u_name'];
        }
        return $data;
    }
    //获取学科和模块
    public function getCat() {
        $cat=M('cat');       
        foreach ($cat->select() as $v){
            $data['name'][$v['cat_id']]=$v['cat_name'];
            $data['modu'][$v['cat_id']]=$v['cat_modu'];
        }
        return $data;
    } 
}