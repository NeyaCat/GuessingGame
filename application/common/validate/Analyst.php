<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Analyst extends Validate
{
    protected $rule =[
        'analyst_title'=>'require',
        'analyst_content'=>'require',
        'analyst'=>'require',

    ];
    protected $message =
        [
            'analyst_title.require'=>'请输入推荐详情标题',
            'analyst_content.require'=>'请输入推荐详情内容',
            'analyst.require'=>'请填写名称',
        ];
}
