<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\23 0023
 * Time: 1:33
 */
namespace app\index\controller;
use think\Controller;

class Guessing extends Controller{
    public function index()
    {
        return $this->fetch();
    }
}