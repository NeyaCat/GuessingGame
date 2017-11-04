<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\25 0025
 * Time: 12:17
 */
namespace app\common\model;

use think\Loader;
use think\Model;

class Login extends Model
{
    protected $pk='admin_id';
    protected $table='admin_user';
    public function login($data)
    {
        $validate=Loader::validate('Login');
        if(!$validate->check($data))
        {
            //验证用户名和密码不能为空
            return ['valid'=>0,'msg'=>$validate->getError()];
        }

        $userinfo=db('admin_user')->where('admin_username',$data['admin_username'])->where('admin_password',md5($data['admin_password']))->find();

        if(!$userinfo)
        {
            return ['valid'=>0,'msg'=>'用户名或者密码错误'];
        }else if($userinfo['delete']!=0)
        {
            return ['valid'=>0,'msg'=>'该账号已被禁用，请联系管理员'];
        }

        //session存储登陆用户信息备用
        session('admin_username',$userinfo['admin_username']);
        session('admin_id',$userinfo['admin_id']);
        //halt( session('admin_id'));
        $time = time();
        $data =[
            'last_login_time'=>$time
        ];
        $this->where('admin_id',session('admin_id'))->update($data);
        return ['valid'=>1,'msg'=>'登录成功'];

    }
}
