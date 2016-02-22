<?php
namespace Admin\Controller;
use Think\Controller;
class SetController extends Controller {
  //show index
  public function index(){
    $course='';

      exit();
      $this->display();
  }
  private function courseData(){
    
  }

  //生成courseLabel.js文件
  private function courseLabel(){
    $file="courseLabel.js";
    $infoArray=array(3,2,3);
    $qn=array(3,4,5);
    $qArr=array(-1,-2,0);


    if (!is_dir("file/shared")) {
          mkdir("file/shared");
    }
    if (!is_dir("file/shared/js")) {
          mkdir("file/shared/js");
    }
    if (!is_dir("file/shared/js/metadata")) {
          mkdir("file/shared/js/metadata");
    }
    $nfile="file/shared/js/metadata/".$file;

    //
    $ql=array();
    //循环遍历包含章，课时，活动的数组
    for ($i=1; $i <=$infoArray[0]; $i++) {
         for ($j=1; $j <=$infoArray[1]; $j++) {
              for ($k=1; $k <=$infoArray[2] ; $k++) {
                $cl='';
                $rgt='';
                $str='';
                //ch_03_02_01
                $cl="q_0".$i."_0".$j."_0".$k;
                //'q_01_01_01_01','q_01_01_01_02','q_01_01_01_03',
                $rgt=$this->quesArr($cl,3);
                //去掉最后的逗号
                $str=substr($rgt,0,strlen($rgt)-1);
                $ql[]="        labels['".$cl."']=[".$str."]";
              }
         }
    }

    if (file_exists($nfile)) {
        unlink($nfile);
    }
    //新建pageInfo.js
    $hfile = fopen($nfile,"a+");
    //写入js文件开头
    $s="var labels;

function loadCourseLabels(){
        labels = new Array();
//labels数据的第一个元素表示页面的交互类型，-2表示无交互的页面，-1表示可以提交两次的页面，0表示测试页面（只能提交一次）
"."\n";
    fwrite($hfile, $s);

    //写入js文件内容
    foreach ($ql as $k => $v) {
          fwrite($hfile,$v.";\n")."<br/>";
      }
      //写入文件结束符
      fwrite($hfile, "}");
      //关闭文件
      fclose($hfile);

  }
  //循环生成问题编号
  private function quesArr($rn,$qn){
    $rgt='-1,';
    for ($i=1; $i <= $qn; $i++) {
        $rgt.="'".$rn."_0".$i."',";
    }
   return $rgt;
  }

  //生成courseData.js文件
  private function courseData(){
    return true;
  }

  //生成pageInfo.js文件
  private function pageInfo(){
    //元素0--章节，元素1--课时
      $infoArray=array(3,3);
      $file="pageInfo.js";
      //元素0--activity名称，元素1--分值
      $acArr=array(array("reading",5),array("listening",5),array("writing",5));
      //批量生成pageInfo.js



      if (!is_dir("file/shared")) {
            mkdir("file/shared");
      }
      if (!is_dir("file/shared/js")) {
            mkdir("file/shared/js");
      }
      if (!is_dir("file/shared/js/metadata")) {
            mkdir("file/shared/js/metadata");
      }
      $nfile="file/shared/js/metadata/".$file;
    	//声明数组变量
    	$cl=array();
    	//循环遍历包含章，课时，活动的数组
    	for ($i=1; $i <=$infoArray[0]; $i++) {
    	     for ($j=1; $j <=$infoArray[1]; $j++) {
    	     	//ch_03_02
    	     	$ch="ch_0".$i."_0".$j;
    	     	//声明变量
    	     	$cla='';
    	     	//赋值=右边
    	     	$cla=$this->actiInfo($ch,$acArr);
    	     	//去掉，
    	        $ca=substr($cla, 0,strlen($cla)-1);
    	        //拼出完整的字符
    	        $cl[]="            allpagelist['q_".$ch."']=[".$ca."]";
    	     }
    	}

    	if (file_exists($nfile)) {
          unlink($nfile);
    	}
      //新建pageInfo.js
      $hfile = fopen($nfile,"a+");
    	//写入js文件开头
    	$s="function loadPageInfo(){
                allpagelist=new Array();"."\n";
    	fwrite($hfile, $s);

    	//写入js文件内容
    	foreach ($cl as $k => $v) {
            fwrite($hfile,$v.";\n")."<br/>";
      	}
      	//写入文件结束符
      	fwrite($hfile, "}");
        //关闭文件
        fclose($hfile);
    }

    //根据activity的信息写出字符串
    function actiInfo($ch,$arr){
    	$n=count($arr);
    	$cla='';
    	for ($k=0; $k <$n; $k++) {
    	    $cla.="['../../pre_test/ml5_".$ch."_0".($k+1).".html','q_".$ch."_0".($k+1)."','".$arr[$k][0]."','".$arr[$k][1]."'"."],";
    	 }
    	 return $cla;
    }
}
