<?php
namespace Home\Controller;
use Think\Controller;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModuController
 *
 * @author ulearning
 */
class ModuController extends Controller{
    //put your code here
    public function index() {
        $data="asdfas";
        $this->assign('data',$data);
        $this->display("Chapter:index");
        
    }
}
