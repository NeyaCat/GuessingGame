<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Adminuser extends Validate
{
    protected $rule =[
        'admin_username'=>'require',
        'admin_password'=>'require',
        'email'=>'require',
        'admin_tel'=>'require',


    ];
    protected $message =
        [
            'admin_username.require'=>'请填写管理员名称',
            'admin_password.require'=>'请填写管理员密码',
            'email.require'=>'请填写管理员邮箱',
            'admin_tel.require'=>'请填写管理员电话',


        ];


}
