<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\26 0026
 * Time: 23:37
 */
namespace app\admin\controller;
use think\Controller;
use think\Validate;

class Member extends Common {
    /**
     * 会员列表
     * @return mixed
     */
    public function index()
    {
        $data = db('user')->where('user_delete',0)->paginate();
       // halt($data);
        return $this->fetch('', ['data' => $data]);
    }
    /**
     * 会员查找
     * @return mixed|void
     */
    public function memberFind()
    {

        if(request()->isGet()) {
            $inp = input("param.find_name");
        }
        $data =  db('User')
            ->where('user_tel|user_name|user_email','like',"{$inp}%")
            ->where("user_delete","=","0")
            ->paginate();

        //halt($categorys);
        if($data){
            return $this->fetch('member/index',["data"=>$data]);
        }else {

            return $this->error("未查询到数据");
        }


    }

    /**
     * 会员金币状态
     * @return array
     */
    public function goldStatus()
    {
        $data=input('post.');
        //halt($data);
        $res=model('User')->save(['gold_status'=>$data['status']],['user_id'=>$data['id']]);
        if($res)
        {

            return ['code'=>1,'data'=>$data];
        }else{
            return ['code'=>0];
        }
    }
    /**
     * 会员添加
     * @param int $close
     * @return mixed
     */

    public function add($close=0)
    {
        if(request()->isPost()){
            $data = input('post.');
            $time =time();
           $userInfo = [
               'user_name'=>$data['user_name'],
               'user_password'=>md5($data['user_password']),
               'user_tel'=>$data['user_tel'],
               'user_email'=>$data['user_email'],
               'user_head'=>$data['user_head'],
               'user_create_time'=>$time
           ];
            $validate = new Validate([
                'user_name'=>'require',
                'user_password'=>'require',
                'user_tel'=>'require|number|length:11',
                'user_email'=>'require|email',
            ],[
                'user_name.require'=>'请输入名称',
                'user_password.require'=>'请输入用户密码',
                'user_tel.require'=>'请输入用户电话',
                'user_tel.number'=>'手机号必须为数字',
                'user_tel.length'=>'手机号为11位数字',
                'user_email.require'=>'请输入用户邮箱',
                'user_email.require'=>'邮箱格式不正确',

            ]);
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $res = model('User')->add($userInfo);
            if($res){
                $this->success('用户添加成功','member/add?close=1');
            }else{
                $this->error('用户添加失败，请稍后再试！');
            }
        }
        return $this->fetch('',['close'=>$close,]);
    }

    /**
     * 会员编辑
     * @param int $close
     * @return mixed
     */
    public function edit($close=0)
    {
        $data = db('User')->find(input('param.user_id'));
        if(request()->isPost()){
            //halt(input('post.'));
            $res =  model('User')->edit(input('post.'));
            if($res){
                $this->success('用户修改成功','member/edit?close=1');exit;
            }else{
                $this->error('用户修改失败，请稍后再试！');exit;
            }

        }
        return $this->fetch('',['close'=>$close,'data'=>$data]);
    }

    /**
     * 会员删除   为软删除
     * @param int $id
     * @param int $delete
     */
    public function del($id=0,$delete=0)
    {
    //echo(1111);
        if(!$id){
            $this->error('参数错误');
        }
        $res = model('User')->save(["user_delete"=>$delete],["user_id"=>$id]);
        if ($res) {
            $this->success('操作成功', 'shop/index');exit;
        } else {
            $this->error('操作失败,请稍后再试！');exit;
        }
   }

    /**
     * 回收站
     * @return mixed
     */
    public function recyle()
    {
        $data = db('User')->where("user_delete",1)->paginate(10);
        //halt($data);
        return $this->fetch('',['data'=>$data]);
    }
    /**
     * 回收站会员查找
     * @return mixed|void
     */
    public function recyleFind()
    {

        if(request()->isGet()) {
            $inp = input("param.find_name");
           // halt($inp);
        }
        $data =  db('User')
            ->where('user_tel|user_name|user_email','like',"{$inp}%")
            ->where("user_delete","=","1")
            ->paginate();

        //halt($categorys);
        if($data){
            return $this->fetch('member/recyle',["data"=>$data]);
        }else {
            return $this->error("未查询到数据");
        }


    }
    /**
     * 回收站数据恢复
     * @param int $id
     * @param int $status
     */
    public function status($id = 0, $status = 0)
    {
        //echo $status;die;
        $res = db('User')->where('user_id', $id)->update(['user_delete' => $status]);
        if ($res) {
            $this->success('数据恢复成功', 'member/index');
        } else {
            $this->error('数据恢复失败，请稍后再试！');
        }
    }

    /**
     * 回收站数据删除   为真删除
     * @param int $id
     * @param int $delete
     */
    public function rdel($id=0,$delete=0)
    {
        //echo(1111);
        if(!$id){
            $this->error('参数错误');
        }
        $res = db('User')->where("user_id",$id)->delete();
        if ($res) {
            $this->success('操作成功', 'shop/index');exit;
        } else {
            $this->error('操作失败,请稍后再试！');exit;
        }
    }


 }