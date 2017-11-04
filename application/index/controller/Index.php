<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        session("game_id",null);
        session("matchs_status",null);
        $select=model('Notice')->select();
        $integral=model('Integral')->integral();
        $analyst=model('Analyst')->analyst();
        $games = db('games')->select();
        $matchs = db('matchs')->order('status asc')->order('starttime asc')->select();
        for($i=0;$i<count($matchs);$i++)
        {
            $matchs[$i]['team1_tname']=getTeams($matchs[$i]['team1_id'])['tname'];
            $matchs[$i]['team1_timage']=getTeams($matchs[$i]['team1_id'])['timage'];
            $matchs[$i]['team2_tname']=getTeams($matchs[$i]['team2_id'])['tname'];
            $matchs[$i]['team2_timage']=getTeams($matchs[$i]['team2_id'])['timage'];
        }
        //print_r($matchs);die;
        return $this->fetch('',['select'=>$select,'integral'=>$integral,'analyst'=>$analyst,'games'=>$games,'matchs'=>$matchs]);
    }

    public function ajax_matchs(){
        $id = input('id');
        if(!empty($id))
            session("game_id",$id);
        if($id == "-1")
            session("game_id",null);
        $sta = input('sta');
        if(!empty($sta))
            session("matchs_status",$sta);
        if($sta == "-1")
            session("matchs_status",null);
        $q = input('key_words');
        $where = "1 = 1";
        if(!empty(session('game_id')))
            $where .= " AND game_id = ".session('game_id');
        if(!empty(session("matchs_status")))
            $where .= " AND status = ".session("matchs_status");
        if(!empty($q))
            $where .= " AND mname like '%".$q."%'";


         //print_r($where);die;
        $matchs = model("Matchs")->selectFromGame($where);
        //var_dump($matchs);

        return $this->fetch('',['matchs'=>$matchs]);
    }


}
