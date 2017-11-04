<?php
/*********************************************************************************
 * Copyright (C) 2017 CDEDUASK ChuangXinGongChang
 * All Rights Reserved.
 * 本软件为华育国际创新工场开发研制。未经本公司正式书面同意，其他任何个人、团体不得使用、复制、修改或发布本软件.
 *********************************************************************************/

/**
 * 前台首页轮播管理
 * User: 唐明蓉
 * Date: 2017/7/27
 * Time: 11:08
 */
namespace app\admin\controller;

use think\Controller;
class Banner extends Controller{
    //列表数据显示
    public function index(){
        $select=model('Banner')->select();
       return $this->fetch('',['select'=>$select]);
    }
 //添加轮播数据
    public function add($close=0)
    {
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Banner');
            if(!$validate->check($data)){
                 $this->error($validate->getError());
            }
            $image_url = model('Banner')->add($data);
            if($image_url){
                $this->success('添加成功','banner/add?close=1');exit;
            }else{
                $this->error('添加失败，请稍后在试！');
            }
        }
        return $this->fetch();
    }
    //修改轮播数据
    public function edit($close=0)
    {
        $id=input("get.banner_id");
        $oldlist= model("Banner")->find($id);
        if(request()->isPost()){
            $res = model("Banner")->edit(input('post.'));
            if($res){
                $this->success('修改成功','banner/edit?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);

    }
//图片轮播修改状态软删除
    public function del($id=0,$delete=0)
    {
        if(!$id)
        {
            $this->error('参数错误');
        }
        $image = model('Banner')->save(["banner_delete"=>$delete],["banner_id"=>$id]);

        if ($image) {
            $this->success('操作成功', 'banner/index');
            exit;
        } else {
            $this->error('操作失败');
            exit;
        }

    }
}