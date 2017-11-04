<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Items extends Validate
{
    protected $rule =[
        'iname'=>'require',
    ];
    protected $message =
        [
            'iname.require'=>'请输入投注项目名称',
        ];
}
