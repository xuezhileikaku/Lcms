<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class ModuController extends Controller {
    public function index(){
        $co=$_GET['co'];
        $id=$_GET['ch'];
        $m=M("Modu");
        $arr=$this->getDep($co);
        $tmp=$m->where("ch_id=$id")->select();
        //获取用户
        dump($tmp);
        $gp=  $this->getUser();
        if(empty($tmp)){
            redirect("../../../../set/co/$co/ch/$id");
        }else{
             foreach ($tmp as $k=> $v) {
                $data['mo_id']=(int)$tmp['mo_id'];
                $data['co_id']=(int)$tmp['co_id'];
                $data['ch_id']=(int)$tmp['ch_id'];
                $data['co_name']=$tmp['co_name'];
                $data['co_manager']=$gp[$tmp['co_manager']];
                echo $tmp['mo_time_s'];
                $data['mo_time_s']= date("Y-m-d H:i:s",$tmp['mo_time_s']);
            }
            echo time();
            echo date("Y-m-d H:i:s",'1438943674');
            dump($data);
            $this->assign('mo',$data);
            $this->display();
        }
    }
    //设置模块
    public function set(){
        $co=$_GET['co'];
        $id=$_GET['ch'];
        $m=M("Modu");
        //通过课程获取部门
        $arr=$this->getDep($co);
        //获取模块下可选择的人员
        $gp=  $this->getUser();
        foreach ($arr as $k=> $v) {
            $data[$k]['mo']=$v['mo'];
            $data[$k]['se']=$gp[$v['dep']];
        }
        $this->assign("mo",$data);
        $this->display();
    }
    //
    public function setUp() { 
        $co=$_POST['cid'];
        $ch=$_POST['hid'];
        foreach ($_POST['mo_manager'] as $k => $v) {
            $datlist[$k]['mo_manager']=$v;
            $datlist[$k]['mo_name']=$_POST['mo_name'][$k];
            $datlist[$k]['co_id']=$_POST['cid'];
            $datlist[$k]['ch_id']=$_POST['hid'];
            $datlist[$k]['mo_pro']=1;
            $datlist[$k]['mo_time_s']=time();
        } 
        $m=M("Modu");
        $re=$m=M("Modu")->addAll($datlist);
        if($re){
            $this->success('添加成功', "index/co/$co/ch/$ch");
        }  else {
            $this->error('添加失败');
        }
    }
    //添加模块
    public function add() {
         $m=M('modu'); 
        //获取部门
       
       //接收回传的数据
        $data['co_id']=(int)$_POST['co_id'];
        $data['ch_id']=(int)$_POST['ch_id'];
        $data['mo_name']=$_POST['mo_name'];
        $data['mo_manager']=(int)$_POST['mo_manager']; 
        $data['mo_pro']=(int)$_POST['mo_pro'];
        $data['mo_time_s']=$_POST['mo_time_s'];
        $data['mo_time_e']=$_POST['mo_time_e'];
       
        $re=$m->add($data);
        if($re){
            $this->success('添加成功', "index/co/{$data['co_id']}/ch/{$data['ch_id']}");
        }  else {
            $this->error('添加失败');
        }
    }
    //编辑模块
    public function edt() {
         $m=M('modu');
         $id=$_GET['id'];
         $data=$m->where("mo_id=$id")->find();
         $this->assign('mo',$data);
         $this->display();
    }
    //删除模块
    public function del() {
         
         $ch=$_GET['ch'];
         $co=$_GET['co'];
         $id=$_GET['id'];
         $m=M('modu');
        $re=$m->delete($id);
        if($re){
            $this->success('删除成功', "../../../../../../index/co/{$co}/ch/{$ch}");
        }  else {
            $this->error('删除失败');
        }
    }
    //接收更新的数据
    public function up() {
        $id=(int)$_POST['mo_id'];
        $data['co_id']=(int)$_POST['co_id'];
        $data['ch_id']=(int)$_POST['ch_id'];
        $data['mo_name']=$_POST['mo_name'];
        $data['mo_manager']=(int)$_POST['mo_manager']; 
        $data['mo_pro']=(int)$_POST['mo_pro'];
        //$data['mo_time_s']=$_POST['mo_time_s'];
        //$data['mo_time_e']=$_POST['mo_time_e'];
        $m=M('modu');
        $re=$m->where("mo_id=$id")->save($data);
        if($re){
            $this->success('更新成功', "index/co/{$data['co_id']}/ch/{$data['ch_id']}");
        }  else {
            $this->error('更新失败');
        }
    }
    
    //获取模块h和对应的部门
    public function getDep($co) {
        //根据课程id获取分类id
        $course=M("course");
        $ca=$course->where("co_id=$co")->getField('co_cat');
        //根据课程分类获取模块
        $cat=M("cat");
        $mo=$cat->where("cat_id=$ca")->getField('cat_modu');
        foreach (explode(',', $mo) as $k => $v) {
            list($arr[$k]['mo'],$arr[$k]['dep'])=  explode(":",$v);
        }
        return $arr;
    }
    //根据部门获取对应的人员
    public function getUser(){
        $u=M("user");
        foreach ($u->select() as $k=> $v) {
            $data[$v['u_pos']][$v['u_id']]=$v['u_name'];
        }
        return $data;
    }
}
