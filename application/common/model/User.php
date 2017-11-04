<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:27
 */
namespace app\common\model;
use think\Loader;
use think\Model;

class User extends Model{
    /**
     * 用户添加
     * @param $data
     * @return false|int
     */

    public function add($data)
    {
        return $this->save($data);
    }
    public function edit($data)
    {
        //halt($data);
        $res = $this->save($data,['user_id',$data['user_id']]);
        return $res;
    }
    public function login($data)
    {
        $validate=Loader::validate('User');
        if(!$validate->check($data)) {
            //验证用户名和密码不能为空
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        $userinfo=db('User')->where('user_name',$data['user_name'])->where('user_password',md5($data['user_password']))->find();
        if(!$userinfo) {
            return ['valid'=>0,'msg'=>'用户名或者密码错误'];
        }else if($userinfo['user_delete']!=0) {
            return ['valid'=>0,'msg'=>'该账号已被禁用，请联系管理员'];
        }

        //session存储登陆用户信息备用
        session('user_name',$userinfo['user_name']);
        session('user_id',$userinfo['user_id']);
        $time = time();
        $data =['user_lastlogin_time'=>$time];
        $this->where('user_id',session('user_id'))->update($data);
        return ['valid'=>1,'msg'=>'登录成功'];

    }

    //获取用户积分
    public function getIntgral()
    {
        return $this->where(['user_id'=>session('user_id')])->field('user_intgral')->find();
    }

}