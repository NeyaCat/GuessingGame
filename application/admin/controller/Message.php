<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\26 0026
 * Time: 23:37
 */
namespace app\admin\controller;
use think\Controller;

class Message extends Controller{
    public function index()
    {
        $select=model('Message')->select();
        //  halt($select);
        return $this->fetch('',['select'=>$select]);
    }

    /**
     * 创建帖子
     * @param int $close
     * @return mixed|void
     */
    public function add($close=0)
    {
        $userID=model("Message")->userID();
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Message');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $message= model('Message')->add($data);
            if($message){
                $this->success('添加成功','message/add?close=1');exit;
            }else{
                $this->error('商品添加失败，请稍后在试！');
            }
        }
        return $this->fetch('',['userID'=>$userID]);
    }

    public function edit($close=0)
    {
        $id=input("param.message_id");
        $oldlist= model("Message")->find($id);
        if(request()->isPost()){
            $res = model("Message")->edit(input('post.'));
           // halt($res);
            if($res){
                $this->success('修改成功','message/edit?close=1');exit;
            }else{
                $this->error('修改失败，请稍后再试！');exit;
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }

    public function del()
    {
      $id=  db('message')->find(input("param.message_id"));
       $del= db('message')->delete($id);
    }
}