<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\25 0025
 * Time: 12:18
 */
namespace app\common\validate;

use think\Validate;

class User extends Validate
{
    protected $rule=[
        'user_name'=>'require',
        'user_password'=>'require',
    ];
    protected $message=[
        'user_name.require'=>'未输入用户名或用户名错误',
        'user_password.require'=>'未输入密码或密码错误',
    ];



}