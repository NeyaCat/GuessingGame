<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\26 0026
 * Time: 23:37
 */
namespace app\admin\controller;
use think\Controller;

class Messagere extends Controller{
    public function index()
    {
        $select=model('Messagere')->select();
        return $this->fetch('',['select'=>$select]);
    }

    /**
     * 创建帖子
     * @param int $close
     * @return mixed|void
     */
    public function add($close=0)
    {
        $userID=model("Messagere")->userID();
        $messageID=model("Messagere")->messageID();
        if(request()->isPost()){
            $data=input("post.");
        //    halt($data);
            $validate = validate('Messagere');
            if (!$validate->check($data)){
                 $this->error($validate->getError());
            }
            $message= model('Messagere')->add($data);
            //halt($message);
            if($message){
                $this->success('添加成功','messagere/add?close=1');exit;
            }else{
                $this->error('商品添加失败，请稍后在试！');
            }
        }
        return $this->fetch('',['userID'=>$userID,'messageID'=>$messageID]);
    }

    public function edit($close=0)
    {
        $messageID=model("Messagere")->messageID();
        $id=input("param.re_id");
        $oldlist= model("Messagere")->find($id);
        if(request()->isPost()){
            $res = model("Messagere")->edit(input('post.'));

            if($res){
                $this->success('修改成功','messagere/edit?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist,'messageID'=>$messageID]);
    }

    public function del()
    {
        $id=  db('message_re')->find(input("param.re_id"));
        //halt($id);
        $del= db('message_re')->delete($id);
    }
}