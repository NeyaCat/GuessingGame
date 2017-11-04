<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\25 0025
 * Time: 11:54
 */
namespace app\admin\controller;
use think\Controller;

class Login extends Controller {
    public function index()
    {
        if(request()->isPost())
        {
            $data=input('post.');//获取登陆用户名和密码

            $res=model('Login')->login($data);
            if($res['valid'])
            {
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
        $this->redirect('login/index');
    }
}