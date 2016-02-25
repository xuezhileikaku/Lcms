<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Admin\Controller;
use Think\Controller;
class ChapterController extends Controller {
    //查看课程详细
    public function index(){
        $cp=M("Chapter");
        //获取课程ID
        $co=$_GET['co'];
        //获取课程下的章节
        $ch=$cp->where("co_id=$co")->select();
        $c=$this->getCou();
        //获取课程名称
        $cou= $c[$co];
        //var_dump($cou);
        $this->assign('cou',$cou);
        $this->assign('ch',$ch);
        $this->display();
    }
     //接收添加课程章节数据
    public function add() {
     
        $data['co_id']=(int)$_POST['co_id'];
        $data['ch_num']=(int)$_POST['ch_num'];
        $data['ch_name']=$_POST['ch_name'];
        $data['ch_pro']=(int)$_POST['ch_pro'];
        $data['ch_time_s']=$_POST['ch_time_s'];
        $data['ch_time_e']=$_POST['ch_time_e'];
        $ch=M('chapter');
        $re=$ch->add($data);
        if($re){
            $this->success('添加成功', "index/co/{$data['co_id']}");
        }  else {
            $this->error('添加失败');
        }
    }
    //接收更新章节的信息
    public function up() {
        
        $id=$_POST['ch_id'];
        $co=$_POST['co_id'];
        $data['ch_name']=$_POST['ch_name'];
        $ch=M('chapter');
        $re=$ch->where("ch_id=$id")->save($data);
        if($re){
            $this->success('更新成功', "index/co/{$co}");
        }  else {
            $this->error('更新失败');
        }
    }
    //删除课程章节
    public function del() {
        //dump($_GET);
        $co=$_GET['co'];
        $id=$_GET['ch'];
        $ch=M('chapter');
        $re=$ch->delete($id);
        
        if($re){
           $this->success('删除成功',"../../../../index/co/$co");
           
       }else{
            $this->error('删除失败');
       }
    }
    //编辑章节
    public function edt() {
        $co=$_GET['co'];
        $id=$_GET['co'];
        $c=$this->getCou();
        //获取课程名称
        $cou= $c[$co];
        $ch=M('chapter');
        $data=$ch->where("ch_id=$id")->find();
        $this->assign('cou',$cou);
        $this->assign('ch',$data);
        $this->display();
    }
    //获取课程
    public function getCou() {
        $course=M("course");
        foreach ($course->select() as $k => $v) {
             $data[$v['co_id']]=$v['co_name'];
        }
        //dump($data);
        return $data;
    }
}
?>