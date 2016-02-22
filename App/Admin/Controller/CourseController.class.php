<?php
namespace Admin\Controller;
use Think\Controller;
class CourseController extends Controller {
    public function index(){
        $course=M("course");
        $data=$course->select();
        $co=array();
        $user=$this->getUser();
        foreach ($data as $key => $v) {
            $co[$key]['co_id']=$v['co_id'];
            $co[$key]['co_name']=$v['co_name'];
            $co[$key]['co_time_s']=  date("Y-m-d",$v['co_time_s']);
            $co[$key]['co_time_e']= date("Y-m-d",$v['co_time_e']);
            $co[$key]['co_process']=$v['co_process'];
            if($v['co_type']){
                $co[$key]['co_type']='标准';
            }else{
                $co[$key]['co_type']='定制';
            }
            $co[$key]['co_manager']=$user[$v['co_manager']];
        }
        $this->assign('co',$co);
        $this->display();
    }
    //添加课程
    public function add() {
        //获取学科类别
        $data['cat']=$this->getCat();
        //返回json格式用户
        $data['user']= $this->getUser(false);

        $this->assign('data',$data);
        $this->display();
    }
    //接收添加课程传递的数据
    public function addUp() {
//用户名转id
      foreach ($this->getUser() as $k => $v) {
        if($v==$_POST['co_manager']){
          $data['co_manager']=(int)$k;
        }
      }
        $data['co_cat']=(int)$_POST['co_cat'];
        $data['co_name']=$_POST['co_name'];
        $data['co_time_s']=  time();
        $data['co_time_e']=(int)strtotime($_POST['co_time_e']);
        $data['co_process']=0;
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
        $co=$course->where("co_id=$id")->find();
        $data['co_id']=$co['co_id'];
        $data['co_name']=$co['co_name'];
        $data['co_time_e']=  date("Y-m-d",(int)$co['co_time_e']);
        $data['co_type']=$co['co_type'];
        $data['co_cat']=$co['co_cat'];
        $data['co_manager']=$co['co_manager'];
        //var_dump($data);
        $this->assign('dat',$data);
        $this->assign('user',  $this->getUser(false));
        $this->assign('cat',  $this->getCat());
        $this->display();
    }
   //课程设置
    public function set() {
        $this->display();
    }
    //课程更新
    public function up() {

        $where="co_id=".$_POST['co_id'];
        $data['co_name']=$_POST['co_name'];
        $data['co_manager']=(int)$_POST['co_manager'];
        $data['co_cat']=(int)$_POST['co_cat'];
        $data['co_time_e']=strtotime($_POST['co_time_e']);
        $data['co_type']=$_POST['co_type'];
        $data['co_process']=  $this->countPro($_POST['co_id']);
        $course=M("course");
       $re= $course->where($where)->save($data);
       if($re){
           $this->success('更新成功','index');
       }else{
            $this->error('更新失败');
       }
    }
    //获取用户id对应的名称
    public function getUser($bool=TRUE){
        $u=M("user");

        if($bool){
            foreach ($u->select() as $v) {
                $data[$v['u_id']]=$v['u_real_name'];
            }
            $da=$data;
        }else{
          $user= '[';
          foreach ($u->select() as $v) {
            $user.="'".$v['u_real_name']."',";
          }
          $da=substr($user,0,strlen($user)-1)."]";
        }
        return $da;
    }

    //获取学科
    public function getCat() {
        $cat=M('cat');
        foreach ($cat->where("cat_type=2")->select() as $v){
            $data[$v['cat_id']]=$v['cat_name'];
        }
        return $data;
    }
    //工作统计
    public function work() {
         //实例化
          $course=M("course");
          $s=  strtotime("2015-08-01");

          //$cou=$course->orderBy()->select();
    }
    //计算课程的进度
    private function countPro($co) {
        $ch = M("Chapter");
        //根据章节ID获取模块信息
        $where="co_id=".$co;
        $num=0;
        $tmp=0;
        $data=$ch->where($where)->select();
        foreach ($data as $k=> $v){
            $tmp+=(int)$v['ch_pro'];
            $num++;
        }
         return ceil($tmp/$num);
    }
}
