<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\23 0023
 * Time: 1:33
 */
namespace app\index\controller;
use app\common\commonclass\Base;
use think\Controller;
use think\Db;

class Userinfo extends Controller{
    public function index(){
        $id = session('user_id');
        $time1 = time()+7200;
        $matchList = db('matchs')->where("starttime >= $time1")->select();
        if(!$id){
            $this->error('请登录','index/index');
        }
        $data = db('user')->where('user_id',session('user_id'))->find();
        $present =db('user')->where(['user_tel'=>$data['gold_present']])->find();
        $betsInfo = db('bets')
            ->alias('b')
            ->join('matchs m','b.matchs_id = m.matchs_id')
            ->field('m.mname,b.*')
            ->where("b.user_id",session('user_id'))
            ->select();


        $costList = db('user_log')->where("user_id",session('user_id'))->select();

        return $this->fetch('',[
            'data'=>$data,
            'present'=>$present,
            'betsInfo'=>$betsInfo,
            'costList'=>$costList,
            'matchList'=>$matchList
            ]);
    }
    /**
     * 名称编辑
     * @param $user_id
     * @param $user_name
     */
    public function nameEdit($user_id,$user_name)
    {
        $res = model('User')->save(['user_name'=>$user_name], ['user_id'=>$user_id]);
        if($res) {
            $this->success('用户名更新成功','login/logout');exit;
        }else {
            $this->error('用户名更新失败');
        }
    }

    /**
     * 收货地址编辑
     * @param $user_id
     * @param $user_address
     */
    public function addressEdit($user_id,$user_address)
    {
        $res = model('User')->save(['user_address'=>$user_address], ['user_id'=>$user_id]);
        if($res) {
            $this->success('地址更新成功');
        }else {
            $this->error('地址更新失败');
        }
    }
    /**
     * 给其他用户金币转赠
     * @param $user_id
     * @param $user_address
     */
    public function present($user_id,$gold_present)
    {   //查询数据中是否有此电话号码
         $data = model('User')->get(['user_tel'=>$gold_present]);
        // halt($data);
        if(!$data){
            $this->error('此系统内该用户不存在');exit;
        }else{
            model('User')->save(['gold_present'=>$gold_present],['user_id'=>$user_id]);
        }
    }
    public function presentNum($user_id,$gold_num)
    {
            $data = db('user')->where('user_id', $user_id)->find();
            if($data['user_gold']<$gold_num ){
                $this->error('你的金币已不足');
            }elseif ($data['gold_status']!=0) {
                $this->error('你的金币存在异常，请联系管理员');
            }else{
                $data['user_gold'] = $data['user_gold'] - $gold_num;
                model('User')->save(['user_gold' => $data['user_gold'],'present_number'=>$gold_num], ['user_id' => $user_id]);
                $user = model('User')->get(['user_tel' => $data['gold_present']]);
                $user['user_gold'] = $user['user_gold'] + $gold_num;
                $res = model('User')->save(['user_gold' => $user['user_gold']], ['user_id' => $user['user_id']]);
                if($res) {
                    $this->success('转赠成功');
                }else {
                    $this->error('转赠失败');
                }
            }

    }

    public function launch(){
        if(request()->isPost())
        {
            $data = input('post.');
            if(empty($data['gues_name']))
                return(['msg'=>"请填写竞猜名称",'sta'=> -1]);
            if(empty($data['match_id']))
                return(['msg'=>"请选择比赛",'sta'=> -1]);
            if(empty($data['peilv']))
                return(['msg'=>"请设置赔率",'sta'=> -1]);
            if(empty($data['guess_type']))
                return(['msg'=>"请选择比赛类型",'sta'=> -1]);
            if(empty($data['gues_name'])&&$data['guess_type']==2)
                return(['msg'=>"请填写赢多少分",'sta'=> -1]);
            $data['match_name'] = db('matchs')->where("matchs_id = {$data['match_id']}")->field('mname')->find()['mname'];
            $data['user_id'] = session('user_id');
            $data['user_name'] = getUserName(session('user_id'));
            $data['status'] = 0;
            $data['add_time']=time();
            $res = db('gues')->insert($data);
            if($res)
            {
                return(['msg'=>"提交成功！",'sta'=> 1]);
            }

        }
    }

}