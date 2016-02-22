<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
class ModuController extends Controller {
//模块列表
    public function index() {
        //课程id
        $c['co'] = $_GET['co'];
        $c['ch'] = $_GET['ch'];
        //章节ID
        $where = "ch_id=" . $_GET['ch'];
        //模块实例化
        $m = M("Modu");
        //根据章节ID获取模块信息
        $tmp = $m->where($where)->select();
        //获取用户
        $gp = $this->getUser();
        foreach ($tmp as $k => $v) {
            //格式化模块
            $data[$k]['mo_id'] = (int) $v['mo_id'];
            $data[$k]['mo_name'] = $v['mo_name'];
            $data[$k]['mo_manager'] = $gp[$v['mo_manager']];
            if($v['mo_stats']){
                $data[$k]['mo_stats'] ="完成";
            }else{
                $data[$k]['mo_stats'] ="进行中";
            }
            $data[$k]['mo_pro'] = (int) $v['mo_pro'];
            $data[$k]['mo_time_s'] =  date("Y-m-d",$v['mo_time_s']);
        }
        
        // dump($data);
        $this->assign('cho', $c);
        $this->assign('mo', $data);
        $this->display();
    }

    

    //添加模块
    public function add() {
          //课程id
        $c['co'] = $_GET['co'];
        $c['ch'] = $_GET['ch'];
        $this->assign('cho',$c);
        $this->display();
    }
    //接收添加数据
    public function addUp() {
         //课程id
        $c['co'] = $_GET['co'];
        $c['ch'] = $_GET['ch'];
        
        $m = M('Modu');
        //获取部门
        //接收回传的数据
        $data['co_id'] = (int) $_POST['co_id'];
        $data['ch_id'] = (int) $_POST['ch_id'];
        $data['mo_name'] = $_POST['mo_name'];
        $data['mo_manager'] = (int) $_POST['mo_manager'];
        $data['mo_pro'] = (int) $_POST['mo_pro'];
        $data['mo_time_s'] = time();

        $re = $m->add($data);
        if ($re) {
            $this->success('添加成功', "index/co/{$data['co_id']}/ch/{$data['ch_id']}");
        } else {
            $this->error('添加失败');
        }
    }

    //编辑模块
    public function edt() {
        $m = M('modu');
        $id = $_GET['id'];
      
        $user = $this->getUser();
        //获取编辑的模块数据
        foreach ($m->where("mo_id=$id")->find() as $k => $v) {
         
            if ($k == 'mo_manager') {
                
                $data['mo_manager'] = $user[$v];
            } elseif($k == 'mo_time_s'){
            
                $data['mo_time_s']=date("Y-m-d",$v);
            }else{
                $data[$k] = $v;
            }
        }
        $this->assign('mo', $data);
        $this->display();
    }

    //删除模块
    public function del() {
       
        $id = $_GET['id'];
        $m = M('modu');
       $d= $m->where("mo_id=$id")->find();
        $re = $m->delete($id);
        if ($re) {
            $this->success('删除成功', "../../index/co/{$d['co_id']}/ch/{$d['ch_id']}");
        } else {
            $this->error('删除失败');
        }
    }

    //接收更新的数据
    public function up() {
        $where ="mo_id=".$_POST['mo_id'];
        $data['co_id'] = (int) $_POST['co_id'];
        $data['ch_id'] = (int) $_POST['ch_id'];
        $data['mo_name'] = $_POST['mo_name'];
        $data['mo_manager'] = (int) $_POST['mo_manager'];
        $data['mo_pro'] = (int) $_POST['mo_pro'];
        if( $data['mo_pro']==100){
            $data['mo_stas']=1;
        }else{
            $data['mo_stas']=0;
        }
        //$data['mo_time_e']=$_POST['mo_time_e'];
        $m = M('modu');
        $re = $m->where($where)->save($data);
        if ($re) {
            $this->success('更新成功', "index/co/{$data['co_id']}/ch/{$data['ch_id']}");
        } else {
            $this->error('更新失败');
        }
    }

    //根据id 获取人员
    public function getUser() {
        $u = M("user");
        foreach ($u->select() as $k => $v) {
            $data[$v['u_id']] = $v['u_real_name'];
        }
        return $data;
    }

}
