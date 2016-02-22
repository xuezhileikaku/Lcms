<?php
namespace Home\Controller;
use Think\Controller;
class CourseController extends Controller {
    //显示
    public function index() {
        if(isset($_SESSION['userId'])){
            //实例化
            $course=M("course");
           // 获取用户
            $user=  $this->getUser();
            //获取学科
            $c=  $this->getCat();
            //当前用户
            $u['id']=$_SESSION['userId'];
            $u['name']=$user[$_SESSION['userId']];
            //根据用户id获取对应的侧边栏
            $left=$this->getRole($u['id']);
            foreach ($course->select() as $k => $v) {
                $data[$k]['id']=$v['co_id'];
                $data[$k]['name']=$v['co_name'];
                $data[$k]['time_s']=  date("Y-m-d",$v['co_time_s']);
                $data[$k]['time_e']= date("Y-m-d",$v['co_time_e']);
                $data[$k]['manager']=$user[$v['co_manager']];
                $data[$k]['pro']=$v['co_process']."%";
                $data[$k]['cat']=$c['2'][$v['co_cat']];
                if($v['co_type']){
                    $data[$k]['type']='标准';
                }else{
                    $data[$k]['type']='定制';
                }
            }
            //回传数据，渲染模板;
            $this->assign('co',$data);
            $this->assign('cat',$c);
            $this->assign('left',$left);
            $this->assign('user',  $u);
        }else{
            redirect("../Index/log");
        }
        $this->display();
    }
    //根据用户角色设置显示末板
    public function getRole($u_id){
       $u=M('user');
       foreach ($u->select() as $k => $v) {
         if($u_id==$v['u_id']){
           $role= $v['u_role'];
           break;
         }else{
           $role='scan';
         }
       }

       switch ($role) {
         case 'admin':
          $left[0]=array( "<a href=\"add\">新建课程</a>", "<a href=\"index\">管理课程</a>","<a href=\"add\">新建学科</a>");
          $left[1]=array("<a href=\"add\">我的课程</a>","<a href=\"add\">工作统计</a>","<a href=\"add\">工作统计</a>");
          $left[2]=array("<a href=\"add\">我的职位</a>","<a href=\"add\">我的职位</a>","<a href=\"add\">我的职位</a>");
           break;
        case 'course':
            $left[0]=array( "<a href=\"add\">新建课程</a>", "<a href=\"index\">管理课程</a>","<a href=\"add\">新建学科</a>");
            $left[1]=array("<a href=\"add\">我的课程</a>","<a href=\"add\">工作统计</a>","<a href=\"add\">工作统计</a>");
            $left[2]=array("<a href=\"add\">我的职位</a>","<a href=\"add\">我的职位</a>","<a href=\"add\">我的职位</a>");
             break;
         case 'modu':
         $left[0]=array( "<a href=\"index\">管理课程</a>","<a href=\"add\">新建学科</a>");
         $left[1]=array("<a href=\"add\">我的课程</a>","<a href=\"add\">工作统计</a>");
         $left[2]=array("<a href=\"add\">我的职位</a>","<a href=\"add\">我的职位</a>");
          break;
         default:
             $left[0]=array("<a href=\"index\">管理课程</a>");
             $left[1]=array();
             $left[2]=array();
           break;
       }
       return $left;
    }
    //设置课程
    public function set() {

    }
    //添加课程
    public function add(){
      //左侧的信息
      $left=$this->getRole($_SESSION['userId']);
        // 获取用户信息
            $user=  $this->getUser(false);
            $u['id']=$_SESSION['userId'];
            $u['name']=$user[$_SESSION['userId']];
            $this->assign('user',  $u);
            //获取学科信息
            $c=  $this->getCat();
            //返回json格式用户
            $user= $this->getUser(false);
            //获取部门下的负责人
            $uc=$this->getUcat();

            $this->assign('cat',$c);
            $this->assign('left',$left);
            $this->assign('user',$user);
            $course=M("course");

        $this->display();
    }
   //接收添加数据
    public function addUp() {

    }


    //获取用户
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

    //获取分类
    public function getCat() {
        $c=M('cat');
        foreach ($c->where()->select() as $k => $v) {
           $data[$v['cat_type']][$v['cat_id']]=$v['cat_name'];
        }
        return $data;
    }
    public function getUcat(){
        $u=M('user');
       foreach ($u->select() as $k => $v) {
           $data[$v['u_cat']]=$v['u_id'];
       }
       return $data;
    }

}
