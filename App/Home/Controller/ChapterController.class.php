<?php
namespace Home\Controller;
use Think\Controller;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ChapterController
 *
 * @author ulearning
 */
class ChapterController extends Controller{
    //put your code here
    public function index() {
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
            $ch[$k]['mo']=  $this->getModu($co['id'], $v['ch_id']);
        }
        //var_dump($cou);
        $this->assign('cou',$co);
        $this->assign('ch',$ch);
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
    //获取模块
    public function getModu($co,$ch) {
         $m = M("Modu");
        //拼凑where 条件
        $where="co_id=".$co." AND ch_id=".$ch;
        //用户id对应的用户姓名
        $u=  $this->getUser();
        //根据章节ID获取模块信息
        foreach ($m->where($where)->select() as $k => $v) {
            $data[$k]['mo_name']=$v['mo_name'];
            $data[$k]['mo_pro']=$v['mo_pro'];
            $data[$k]['mo_manager']=$u[$v['mo_manager']];
            $data[$k]['mo_time_s']=  date("Y-m-d",$v['mo_time_s']);
        }
        return $data;
    }
    //获取用户id对应的名称
    public function getUser(){ 
        $u=M("user");
        foreach ($u->select() as $v) {
            $data[$v['u_id']]=$v['u_real_name'];
        }
        return $data;
    }
    
}
