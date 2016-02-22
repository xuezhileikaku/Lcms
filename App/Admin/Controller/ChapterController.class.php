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
        $co['id']=$_GET['co'];
        
       $c=$this->getCou();
        //获取课程名称
        $co['name']= $c[$co['id']];
         //获取课程下的章节
        $where="co_id=".$_GET['co'];
        foreach ($cp->where($where)->select() as $k => $v) {
            $ch[$k]['id']=$v['ch_id'];
            $ch[$k]['name']=$v['ch_name'];
            $ch[$k]['time_s']=  date("Y-m-d",$v['ch_time_s']);
            $ch[$k]['time_e']=date("Y-m-d",$v['ch_time_e']);
            $ch[$k]['pro']=$v['ch_pro'];
        }
        //var_dump($cou);
        $this->assign('cou',$co);
        $this->assign('ch',$ch);
        $this->display();
    }
    public function add() {
        
        $this->display();
    }
     //接收添加课程章节数据
    public function addUp() {
        $url="index/co/".$_POST['co_id'];
        $data['co_id']=(int)$_POST['co_id'];
        $data['ch_num']=(int)$_POST['ch_num'];
        $data['ch_name']=$_POST['ch_name'];
        $data['ch_time_s']=time();
        $ch=M('chapter');
        $re=$ch->add($data);
        if($re){
           $this->success('添加成功',$url);
        }  else {
            $this->error('添加失败');
        }
    }
    //接收更新章节的信息
    public function up() {
        $id=$_POST['ch_id'];
        $co=$_POST['co_id'];
        $data['ch_name']=$_POST['ch_name'];
        $data['ch_pro']=  $this->countPro($co, $id);
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
    //计算章节下课程的进度
    private function countPro($co,$ch) {
        $m = M("Modu");
        //拼凑where 条件
        $where="co_id=".$co." AND ch_id=".$ch;
        //计数
        $num=0;
        //计算总分
        $tmp=0;
        //根据章节ID获取模块信息
        $data=$m->where($where)->select();
        foreach ($data as $k=> $v){
            $tmp+=(int)$v['mo_pro'];
            $num++;
        }
        return ceil($tmp/$num);
    }
}
?>