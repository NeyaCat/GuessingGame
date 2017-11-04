<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Teams extends Validate
{
    protected $rule =[
        'tname'=>'require',
        'todds'=>'require',
//        'games_id'=>'require',
//        'timage'=>'require',
    ];
    protected $message =
        [
            'tname.require'=>'请输入比赛标题',
            'todds.require'=>'请输入赔率',
//            'games_id.require'=>'请选择游戏',
//            'timage.require'=>'请上传图片'
        ];
}
