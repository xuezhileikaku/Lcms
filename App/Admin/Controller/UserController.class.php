<?php

namespace Admin\Controller;

use Think\Controller;

class UserController extends Controller {

    //显示人员列表
    public function index() {
        $u = M("user");
        $u_cat= $this->getDep();
        //按部门格式化所属人员
        foreach ($u->select() as $k => $v) {
            $data[$v['u_cat']][]= $v;
        }
        $this->assign('dep', $u_cat);
        $this->assign('user', $data);
        $this->display();
    }

    //添加人员
    public function add() {
        //获取部门列表
        $u_cat =  $this->getDep();
        $this->assign('up', $u_cat);
        $this->display();
    }

    // 接收用户添加的数据
    public function addup() {
       //格式化添加的数据
         $data['u_real_name'] = $_POST['u_real_name'];
        $data['u_cat'] = $_POST['u_cat'];
        $data['u_role'] = $_POST['u_role'];
        $data['u_name'] = $_POST['u_name'];
        $data['u_pwd'] = md5($_POST['u_pwd']);
        $data['u_email'] = $_POST['u_email'];
        $data['u_tel'] = (int) $_POST['u_tel'];
        $data['u_qq'] = (int) $_POST['u_qq'];
        $u = M('user');
        $re = $u->add($data);
        if ($re) {
            $this->success('添加成功', 'index');
        } else {
            $this->error('添加失败');
        }
    }

    //编辑人员信息
    public function edt() {
        $id = $_GET['id'];
        $u = M('user');
        $data = $u->where("u_id=$id")->find();

        $this->assign('user', $data);
        $up = $this->getDep();
        $this->assign('up', $up);
        $this->display();
    }

    //删除人员
    public function del() {
        $id = (int) $_GET['id'];
        //实例化
        $u = M('user');
        $re = $u->delete($id);
        if ($re) {
            $this->success('删除成功', '../../index');
        } else {
            $this->error('删除失败');
        }
    }

    //接收编辑的数据
    public function up() {
        $where="u_id=".$_POST['id'];
        $data['u_real_name'] = $_POST['u_real_name'];
        $data['u_role'] = $_POST['u_role'];
        $data['u_cat'] = (int) $_POST['u_cat'];
        $data['u_name'] = $_POST['u_name'];
        $data['u_email'] = $_POST['u_email'];
        $data['u_tel'] = (int) $_POST['u_tel'];
        $data['u_qq'] = (int) $_POST['u_qq'];
        //实例化
        $u = M('user');
        $re = $u->where($where)->save($data);
        if ($re) {
            $this->success('更新成功', 'index');
        } else {
            $this->error('更新失败');
        }
    }
    //获取部门列表
    public function getDep() {
        $up = M('cat');
        $u_cat = $up->where('cat_type=1')->select();
        return $u_cat;
    }

    //获取部门并显示
    public function dep() {

        $u_cat = $this->getDep();
        $this->assign('grou', $u_cat);
        $this->display();
    }
    //编辑部门信息
    public function pedt(){
        $up = M('cat');
        $where="cat_id=".$_GET['id'].' AND cat_type=1';
        $u_cat = $up->where($where)->find();
        $this->assign('cat',$u_cat);
        //dump($u_cat);
        $this->display();
    }
    //接收部门数据
    public function pup() {
        $where="cat_id=".$_POST['cat_id'];
        $data['cat_name']=$_POST['cat_name'];
        $data['cat_intro']=$_POST['cat_intro'];
        $up = M('cat');
        $re=$up->where($where)->save($data);
        if ($re) {
            $this->success('更新成功', 'dep');
        } else {
            $this->error('更新失败');
        }
    }
    //接收添加部门数据
    public function paup() {
        if($_POST['sub']){
            $data['cat_name']=$_POST['name'];
            $data['cat_intro']=$_POST['intro'];
            $data['cat_type']=1;
            $up = M('cat');
            $re=$up->add($data);
            if ($re) {
                $this->success('添加成功', 'dep');
            } else {
                $this->error('添加失败');
            }
        }

    }
    //删除部门
    public function pdel() {

        $id = (int) $_GET['id'];
        //实例化
        $up = M('cat');
        $re = $up->delete($id);
        if ($re) {
            $this->success('删除成功', '../../dep');
        } else {
            $this->error('删除失败');
        }
    }
    public function work(){
      $u = M("user");
      $u_cat= $this->getDep();
      //按部门格式化所属人员
      foreach ($u->select() as $k => $v) {
          $data[$v['u_cat']][]= $v;
      }
      $this->assign('dep', $u_cat);
      $this->assign('user', $data);
      $this->display();
    }

}
