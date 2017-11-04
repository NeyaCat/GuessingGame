<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Message extends Validate
{
    protected $rule =[
        'message_title'=>'require',
        'message_content'=>'require',
    ];
    protected $message =
        [
            'message_title.require'=>'请输入帖子标题',
            'message_content.require'=>'请输入帖子内容',
        ];
}
