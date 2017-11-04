<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\23 0023
 * Time: 0:50
 */
namespace app\index\controller;
use think\Controller;

class Register extends Controller{
    public function index()
    {
        if (request()->isPost())
        {
            $data = input("post.");
            $validate = validate('Register');
            if(!$validate->scene('add')->check($data)) {
                return  $this->error($validate->getError());
            }
            $name = model('User')->get(['user_name'=>$data['user_name']]);
            if($name) {
                $this->error('该用户名已存在！');
            }
            $time = time();
           $data =[
               'user_name'=>$data['user_name'],
                'user_password'=> md5($data['user_password']),
                'user_create_time' =>$time
            ];
            $res = model('User')->add($data);
            if($res) {
                $this->success("注册成功","login/index");
            }else{
                $this->error("注册失败");
            }
        }
        return $this->fetch();
    }
}