<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Website extends Validate
{
    protected $rule =[
        'website_name'=>'require',
        'website_introduce'=>'require',
        'website_type'=>'require',
        'website_tel'=>'number|min:11',
        'website_email'=>'email',
    ];
    protected $message =
        [
            'website_name.require'=>'请输入网站名称',
            'website_introduce.require'=>'请输网站简介',
            'website_tel'=>'请输入正确手机号',
            'website_email'  => '邮箱格式错误',
        ];
}
