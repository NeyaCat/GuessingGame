<?php
/*********************************************************************************
 * Copyright (C) 2017 CDEDUASK ChuangXinGongChang
 * All Rights Reserved.
 * 本软件为华育国际创新工场开发研制。未经本公司正式书面同意，其他任何个人、团体不得使用、复制、修改或发布本软件.
 *********************************************************************************/

/**
 * 图片轮播管理
 * User: 唐明蓉
 * Date: 2017/7/27
 * Time: 14:13
 */
namespace app\common\model;
use think\Model;
class  Banner extends Model{
    //声明主键表名
    protected $pk = "banner_id";
    protected $table = "banner";
    protected $autoWriteTimestamp = true;
//查询图片列表
    public function select()
    {
        $data=[
            "banner_delete"=>1,
        ];
        $select = $this->where($data)->paginate(5);
        return $select;
    }
//添加图片轮播路径
    public function add($data){
        $data['status'] = 0;
        $this->allowField(true)->save($data); //save  更新方法
        return $this->banner_id;
    }
    //修改图片及路径
    public function edit($data){
        return $this->save($data,$data['banner_id']);
    }
}