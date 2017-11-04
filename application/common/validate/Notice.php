<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Notice extends Validate
{
    protected $rule =[
        'notice_title'=>'require',
        'notice_content'=>'require',
    ];
    protected $message =
        [
            'notice_title.require'=>'请输入公告标题',
            'notice_content.require'=>'请输公告内容',
        ];
}
