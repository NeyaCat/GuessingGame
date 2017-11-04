<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\25 0025
 * Time: 12:18
 */
namespace app\common\validate;

use think\Validate;

class Login extends Validate
{
    protected $rule=[
        'admin_username'=>'require',
        'admin_password'=>'require',
    ];
    protected $message=[
        'admin_username.require'=>'未输入用户名或用户名错误',
        'admin_password.require'=>'未输入密码或密码错误',
    ];



}