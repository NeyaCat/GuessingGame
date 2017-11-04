<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\23 0023
 * Time: 1:33
 */
namespace app\index\controller;
use think\Controller;

class Bbs extends Controller{
    public function index()
    {
        $select=model('Message')->select();
		$banner = db('Banner')->where('banner_delete',1)->select();
		//halt($banner);
        return $this->fetch('',['select'=>$select,'banner'=>$banner]);
    }
    public function detail()
    {
        $select=model('Message')->select();
        return $this->fetch('',['select'=>$select]);
    }
    public function detailAdd()
    {
        $user_id = session("user_id");
		//halt($user_id);
        $userID=model("Message")->userID();
        if(request()->isPost()){
            $data=input("post.");
			//halt($data);
			$data = [
			'user_id'=>$user_id,
			'message_title'=>$data['message_title'],
			'message_content'=>$data['message_content'],
					];
            $message= model('Message')->add($data);
            if($message){
                $this->error('添加成功');exit;
            }else{
                $this->error('添加失败，请稍后在试！');
            }
        }
        return $this->fetch('',['userID'=>$userID]);
    }
    public function note()
    {
        $message = db('Message')->alias('a')->
            join('user u','a.user_id= u.user_id')
            ->find(input('param.message_id'));//
        $messagere =   db('Message')->alias('a')
            ->join('Message_re b','a.message_id=b.message_id')
            ->join('user u','a.user_id=u.user_id')
            ->where('a.message_id',input('param.message_id'))
			->paginate(10);
			//halt($messagere);
		$reone = db('message')->where('message_id',input('param.message_id'))->update(['message_look'=> ['exp','message_look+1']]);
        return $this->fetch('',['message'=>$message,'messagere'=>$messagere]);
    }
    public function noteAdd()
    {
        $user_id = session("user_id");
        $message = db('Message')->alias('a')->
        join('user u','a.user_id= u.user_id')
            ->find(input('param.message_id'));
        $userID=model("Messagere")->userID();
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Note');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $message= model('Messagere')->add($data);
            if($message){
                $this->error('添加成功');exit;
            }else{
                $this->error('商品添加失败，请稍后在试！');
            }
        }
        return $this->fetch('',['userID'=>$userID,'message'=>$message]);
    }
	

}