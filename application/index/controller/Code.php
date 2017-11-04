<?php
namespace app\index\controller;
use think\Controller;

class Code extends Controller
{
    public function index()
    {
        if(request()->isPost())
        {
            //echo('dasd');die;
            $tel = input('post.code');
            //halt($tel);
            $number =mt_rand(1000,9998);
            \tenxunyun\Sms::getPhoneCode($tel,$number);
        }
        return $this->fetch();
    }
}