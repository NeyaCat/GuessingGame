<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Advertisement extends Validate
{
    protected $rule =[
        'news_title'=>'require',
        'news_content'=>'require',
    ];
    protected $message =
        [
            'news_title.require'=>'请输入广告标题',
            'news_content.require'=>'请输广告子内容',
        ];
}
