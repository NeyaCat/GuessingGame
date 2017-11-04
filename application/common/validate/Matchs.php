<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Matchs extends Validate
{
    protected $rule =[
        'mname'=>'require',

    ];
    protected $message =
        [
            'mname.require'=>'请输入赛事标题',

        ];
}
