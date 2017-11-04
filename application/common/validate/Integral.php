<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Integral extends Validate
{
    protected $rule =[
        'integral_title'=>'require',
        'integral_content'=>'require',
    ];
    protected $message =
        [
            'integral_title.require'=>'请输入积分兑换详情标题',
            'integral_content.require'=>'请输入积分兑换详情内容',
        ];
}
