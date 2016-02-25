<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller {  
    //show index
    public function index(){
        $cat=M("cat");
        $dep=$this->getDepart();
        foreach ($cat->select() as $key => $v) {
            //格式化类别id
            $data[$key]['id']=$v['cat_id'];
            //格式化类别名称
            $data[$key]['name']=$v['cat_name'];
            //格式化部门
            $data[$key]['dep']=$dep[$v['cat_dep']];
            //格式化类别下的模块
            foreach (explode(',', $v['cat_modu']) as $k => $v) {
                $n=  strlen($v);
                $arr[$k]="模块：".substr($v, 0,$n-2)."<br/>&nbsp;&nbsp;负责部门：".$dep[substr($v, $n-1,$n)];
            }
            $data[$key]['modu']=$arr;
        }  

        $this->assign('ca',$data);
    	$this->display();

    }
    //编辑学科
    public function edt(){
        $id=$_GET['id'];
        $cat=M("cat");
        $c=$cat->where("cat_id=$id")->find();
        foreach (explode(',', $c['cat_modu']) as $k => $v) {
                $n=  strlen($v);
                $c['m'][$k]['name']=substr($v, 0,$n-2);
                $c['m'][$k]['dep']=substr($v, $n-1,$n);
            }
        //获取部门列表
        $depart=$this->getDepart();
        $this->assign('dep',$depart);
        
        $this->assign('cat',$c);
        $this->display();
    }
    //添加学科分类
    public function add(){
        //获取部门列表
        $depart=$this->getDepart();
        $this->assign('dep',$depart);
        $this->display();
    }
    //接收添加学科传递的数据
    public function addUp() {
        $data['cat_dep']=(int)$_POST['cat_dep'];
        $data['cat_name']=$_POST['cat_name'];
        //把模块的数字转换为json格式的变量
        foreach ($_POST['modu_name'] as $k=>$v) {
            $data['cat_modu'].=$v.":".$_POST['modu_dep'][$k].",";
        }
        $data['cat_modu']=substr($data['cat_modu'], 0,strlen($data['cat_modu'])-1);
        $cat=M("cat");
       $re= $cat->add($data);
       if($re){
           $this->success('添加成功','index');
       }else{
            $this->error('添加失败');
       }
    }
     //删除学科
    public function del() {
         $id=$_GET['id'];
         $cat=M("cat");
         $re=$cat->delete($id);
         if($re){
           $this->success('删除成功','../../index');
       }else{
            $this->error('删除失败');
       }
    }
    //接收编辑学科分类的数据
    public function up() {
        $id=$_POST['cat_id'];
        $data['cat_name']=$_POST['cat_name'];
         foreach ($_POST['modu_name'] as $k=>$v) {
            $data['cat_modu'].=$v.":".$_POST['modu_dep'][$k].",";
        }
        $data['cat_modu']=substr($data['cat_modu'], 0,strlen($data['cat_modu'])-1);
        $cat=M("cat");
       $re= $cat->where("cat_id=$id")->save($data);
       if($re){
           $this->success('更新成功','index');
       }else{
            $this->error('更新失败');
       }
    }
    //获取负责部门
    public function getDepart() {
        $gp=M("group");
        foreach ($gp->select() as $k => $v) {
            $data['name'][$v['up_id']]=$v['up_name'];
        }
        return $data['name'];
    }
    
}    
?>