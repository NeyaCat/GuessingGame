<?php
/*********************************************************************************
 * Copyright (C) 2017 CDEDUASK ChuangXinGongChang
 * All Rights Reserved.
 * 本软件为华育国际创新工场开发研制。未经本公司正式书面同意，其他任何个人、团体不得使用、复制、修改或发布本软件.
 *********************************************************************************/

/**
 * 功能名字
 * User: 唐明蓉
 * Date: 2017/7/28
 * Time: 9:14
 */
namespace app\common\validate;

use think\Validate;
class Banner extends Validate{
    protected $rule=[
        'banner_url'=>'require',
        'banner_image'=>'require',

    ];
    protected $message=[
        'banner_url.require'=>'请输入路径',
        'banner_image.require'=>'请添加图片',
    ];
}