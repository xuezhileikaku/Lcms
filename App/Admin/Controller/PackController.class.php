<?php
namespace Admin\Controller;
use Think\Controller;
class PackController extends Controller {
  //
  public function index(){

  }
  public function setStru(){
    $cArr=$this->chap($_GET['co']);
    $cArr['m']=$this->modu($_GET['co'],$cArr['id']);

    $this->assign("mo",$cArr);
    $this->display();
  }
  //章节 id and name
  private function Chap($c){
    $cp=M("Chapter");
    $where="co_id=".$c;

    foreach ($cp->where($where)->select() as $k => $v) {
        $ch['id'][]=$v['ch_id'];
        $ch['name'][]=$v['ch_name'];
    }
    return $ch;
  }
  //模块id and name
  private function Modu($c,$l){
    $m=M("Modu");
    foreach($l as $v){
      $where='';
      $where="co_id=".$c."&ch_id=".$v;
      foreach ($m->where($where)->select() as $k => $v) {
          $mo['id'][]=$v['mo_id'];
          $mo['name'][]=$v['mo_name'];
      }
      $where='';
    }
    return $mo;
  }
//
public function getStru(){
  var_dump($_POST);
}



}
