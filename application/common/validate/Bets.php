<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Bets extends Validate
{
    protected $rule =[
        'bmoney'=>'number',
    ];
    protected $message =
        [
            'bmoney'=>'请输入投注金额',
        ];
}
