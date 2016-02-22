<?php
namespace Admin\Controller;
use Think\Controller;
class CatController extends Controller {
    //show index
    public function index(){
        $cat=M("cat");
       $c_cat=$cat->where("cat_type=2")->select();
        foreach ($c_cat as $key => $v) {
            //格式化类别id
            $data[$key]['id']=$v['cat_id'];
            //格式化类别名称
            $data[$key]['name']=$v['cat_name'];
            //格式化学科描述
            $data[$key]['intro']=$v['cat_intro'];

        }

        $this->assign('ca',$data);
    	$this->display();

    }

    //编辑学科
    public function edt(){
        $id=$_GET['id'];
        $cat=M("cat");
        $c=$cat->where("cat_id=$id")->find();
        $this->assign('cat',$c);
        $this->display();
    }
    //添加学科分类
    public function add(){
        //获取部门列表

        $this->display();
    }
    //接收添加学科传递的数据
    public function addUp() {
        $data['cat_type']=2;
        $data['cat_name']=$_POST['cat_name'];

        $data['cat_intro']=$_POST['cat_intro'];
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
        $whe="cat_id=".$_POST['cat_id'];
        $data['cat_name']=$_POST['cat_name'];
        $data['cat_intro']=$_POST['cat_intro'];
        $cat=M("cat");
       $re= $cat->where($whe)->save($data);
       if($re){
           $this->success('更新成功','index');
       }else{
            $this->error('更新失败');
       }
    }


}
?>
