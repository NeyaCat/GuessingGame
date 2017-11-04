<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:22
 */namespace app\common\validate;

use think\Validate;

class Shop extends Validate
{
    protected $rule =[

        'goods_gold'=>'require',
        'goods_count'=>'require',
        'goods_image'=>'require',

    ];
    protected $message =
        [

            'goods_gold.require'=>'请填写商品金币',
            'goods_count.require'=>'请填写商品库存' ,
            'goods_image.require'=>'请输上传商品图片'
            ,
        ];


}
