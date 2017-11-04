<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Note extends Validate
{
    protected $rule =[
        'messagere_content'=>'require',
    ];
    protected $message =
        [
            'messagere_content.require'=>'请输入回复内容',
        ];
}
