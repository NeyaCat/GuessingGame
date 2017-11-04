<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\26 0026
 * Time: 23:37
 */
namespace app\admin\controller;
use think\Controller;

class System extends Controller{
    //公告
    public function notice()
    {
        $select=model('Notice')->select();
        //  halt($select);
        return $this->fetch('',['select'=>$select]);
    }
  //添加公告
    public function noticeAdd($close=0)
    {
        if(request()->isPost()){
            $data=input("post.");
          //  halt($data);
            $validate = validate('Notice');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $message= model('Notice')->add($data);
            if($message){
                $this->success('添加成功','system/notice?close=1');exit;
            }else{
                $this->error('商品添加失败，请稍后在试！');
            }
        }
        return $this->fetch('');
    }
//修改公告
    public function noticeEdit($close=0)
    {
        $id=input("param.notice_id");
        $oldlist= model("Notice")->find($id);
        if(request()->isPost()){
            $res = model("Notice")->edit(input('post.'));
            if($res){
                $this->success('修改成功','system/notice?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }
    //公告发布状态
    public function noticeStatus($id = 0, $status = 0)
    {
        $res = db('Notice')->where('notice_id', $id)->update(['status' => $status]);
        if ($res) {
            $this->success('更新成功', 'system/notice');
        } else {
            $this->error('更新失败');
        }
    }
//删除公告
    public function NoticeDel()
    {
      $id=  db('Notice')->find(input("param.notice_id"));
       $del= db('Notice')->delete($id);
        if ($del) {
            $this->success('删除成功', 'system/notice');
        } else {
            $this->error('删除失败');
        }
    }
//广告
    public function advertisement()
    {
        $select=model('Advertisement')->select();
        return $this->fetch('',['select'=>$select]);
    }
    //添加广告
    public function advertisementAdd($close=0)
    {
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Advertisement');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $advertisement= model('Advertisement')->advertisementAdd($data);
            if($advertisement){
                $this->success('添加成功','system/advertisement?close=1');exit;
            }else{
                $this->error('添加失败，请稍后在试！');
            }
        }
        return $this->fetch('');
    }
    //修改广告
    public function advertisementEdit($close=0)
    {
        $id=input("param.news_id");
        $oldlist= model("Advertisement")->find($id);
        if(request()->isPost()){
            $res = model("Advertisement")->advertisementEdit(input('post.'));
            if($res){
                $this->success('修改成功','system/advertisement?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }
    //广告发布状态
    public function advertisementStatus($id = 0, $status = 0)
    {
        $res = db('news')->where('news_id', $id)->update(['status' => $status]);
        if ($res) {
            $this->success('更新成功', 'system/advertisement');
        } else {
            $this->error('更新失败');
        }
    }
    //删除广告
    public function advertisementDel()
    {
        $id=  db('news')->find(input("param.news_id"));
        $del= db('news')->delete($id);
        if ($del) {
            $this->success('删除成功', 'system/advertisement');
        } else {
            $this->error('删除成功');
        }
    }
    //网站信息
    public function website()
    {
        $select=model('Website')->select();
        return $this->fetch('',['select'=>$select]);
    }
    //添加网站信息
    public function websiteAdd($close=0)
    {
        if(request()->isPost()){
            $data=input("post.");
            //halt($data);
            $validate = validate('Website');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $website= model('Website')->websiteAdd($data);
            if($website){
                $this->success('添加成功','system/website?close=1');exit;
            }else{
                $this->error('添加失败，请稍后在试！');
            }
        }
        return $this->fetch('');
    }
    //修改网站信息
    public function websiteEdit($close=0)
    {
        $id=input("param.website_id");
        $oldlist= model("Website")->find($id);
        if(request()->isPost()){
            $res = model("Website")->websiteEdit(input('post.'));
            if($res){
                $this->success('修改成功','system/website?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }
    //删除网站信息
    public function websiteDel()
    {
        $id=  db('Website')->find(input("param.website_id"));
        $del= db('Website')->delete($id);
        if ($del) {
            $this->success('删除成功', 'system/website');
        } else {
            $this->error('删除成功');
        }
    }
    // 分析师详情
    public function analyst()
    {
        $select=model('Analyst')->select();
        return $this->fetch('',['select'=>$select]);
    }
    //添加推荐标题
    public function analystAdd($close=0)
    {
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Analyst');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $analyst= model('Analyst')->analystAdd($data);
            if($analyst){
                $this->success('添加成功','system/analyst?close=1');exit;
            }else{
                $this->error('添加失败，请稍后在试！');
            }
        }
        return $this->fetch('');
    }
    //修改推荐详情
    public function analystEdit($close=0)
    {
        $id=input("param.analyst_id");
        $oldlist= model("Analyst")->find($id);
        if(request()->isPost()){
            $res = model("Analyst")->analystEdit(input('post.'));
            if($res){
                $this->success('修改成功','system/analyst?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }
    //推荐详情发布状态
    public function analystStatus($id = 0, $status = 0)
    {
        $res = db('Analyst')->where('analyst_id', $id)->update(['status' => $status]);
        if ($res) {
            $this->success('更新成功', 'system/analyst');
        } else {
            $this->error('更新失败');
        }
    }
    //删除积分兑换详情
    public function analystDel()
    {
        $id=  db('Analyst')->find(input("param.analyst_id"));
        $del= db('Analyst')->delete($id);
        if ($del) {
            $this->success('删除成功', 'system/analyst');
        } else {
            $this->error('删除失败');
        }
    }

    // 积分兑换详情
    public function integral()
    {
        $select=model('Integral')->select();
        return $this->fetch('',['select'=>$select]);
    }
    //添加积分兑换详情添加
    public function integralAdd($close=0)
    {
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Integral');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $integral= model('Integral')->integralAdd($data);
            if($integral){
                $this->success('添加成功','system/integral?close=1');exit;
            }else{
                $this->error('添加失败，请稍后在试！');
            }
        }
        return $this->fetch('');
    }
    //修改积分兑换详情
    public function integralEdit($close=0)
    {
        $id=input("param.integral_id");
        $oldlist= model("Integral")->find($id);
        if(request()->isPost()){
            $res = model("Integral")->integralEdit(input('post.'));
            if($res){
                $this->success('修改成功','system/integral?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }
    //积分兑换详情发布状态
    public function integralStatus($id = 0, $status = 0)
    {
        $res = db('integral')->where('integral_id', $id)->update(['status' => $status]);
        if ($res) {
            $this->success('更新成功', 'system/integral');
        } else {
            $this->error('更新失败');
        }
    }
    //删除积分兑换详情
    public function integralDel()
    {
        $id=  db('integral')->find(input("param.integral_id"));
        $del= db('integral')->delete($id);
        if ($del) {
            $this->success('删除成功', 'system/integral');
        } else {
            $this->error('删除失败');
        }
    }

}