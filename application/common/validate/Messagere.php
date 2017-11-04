<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Messagere extends Validate
{
    protected $rule =[
        'message_id'=>'require',
        'messagere_content'=>'require',
    ];
    protected $message =
        [
            'message_id.require'=>'请选择帖子标题',
            'messagere_content.require'=>'请输入回复内容',
        ];
}
