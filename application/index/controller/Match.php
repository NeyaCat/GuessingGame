<?php
namespace app\index\controller;

use think\Controller;

class Match extends Controller
{
    public function index()
    {
        $id = input('matchs_id');
        $intgral = model('user')->getIntgral();
        $matchInfo = model('matchs')->getMatchInfo($id);
        $allItemNum = db('bets')->where("matchs_id = $id")->count();
        $allMoneyNum = db('bets')->where("matchs_id = $id")->sum("bmoney");
        return  $this->fetch('',[
            'info'=>$matchInfo['info'],
            'item'=>$matchInfo['item'],
            'intgral'=>$intgral['user_intgral'],
            'allItemNum'=>$allItemNum,
            'allMoneyNum'=>$allMoneyNum]);
    }

    public function stake(){
        $id = input('gues_id');
        $team = input('team_id');
        $price = input('price');
        $result = model('matchs')->stake($id,$team,$price);
        return $result;
    }

    public function jiesuan(){
        $list = model('matchs')->jieSuan(1);
        var_dump($list);
    }
}
