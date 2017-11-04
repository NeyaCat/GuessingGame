<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Games extends Validate
{
    protected $rule =[
        'gname'=>'require',
    ];
    protected $message =
        [
            'gname.require'=>'请输入游戏名称',
        ];
}
