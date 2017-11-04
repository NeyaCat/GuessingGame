<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\25 0025
 * Time: 23:07
 */
namespace app\admin\controller;
use think\controller;

 class Index extends Common {
     public function index()
     {
         $info=info();//获取服务器的一些基本信息
         $this->assign('info',$info);
        return $this->fetch();
     }

     public function systemData()
     {

     }
 }