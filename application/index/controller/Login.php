<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\23 0023
 * Time: 0:43
 */
namespace app\index\controller;
use think\Controller;

class Login extends Controller{
    public function index()
    {
        if(request()->isPost())
        {
            $data=input('post.');//获取登陆用户名和密码
            $res=model('User')->login($data);
            if($res['valid'])
            {
                //echo"<script>alert('$res['msg']'\)</script>";
                return $this->success($res['msg'],'index/index');
            }else{
                return $this->error($res['msg']);
            }
        }
        return $this->fetch();
    }

    public function logout()
    {
        session(null);
        $this->redirect('index/index');
    }
}