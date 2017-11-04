<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\26 0026
 * Time: 23:37
 */
namespace app\admin\controller;
use app\common\commonclass\Base;
use think\Controller;

class Guess extends Controller{
    //比赛队伍管理
    public function teams()
    {
        $select = model('Teams')->select();
        return $this->fetch('', ['select' => $select]);
    }

    public function showTeam($id)
    {
        $select = model('Teams')->find($id);
        return $this->fetch('', ['select' => $select]);
    }
    public function teamsAdd()
    {
        if(request()->isPost()){
            $data=input("post.");
            $games= model('Teams')->teamsAdd($data);
            if($games){
                Base::alert('添加成功！',url('guess/teams'));
            }else{
                Base::alert('添加失败！',-1);
            }
        }
        return $this->fetch('');
    }

    public function teamsEdit()
    {
        $id=input("param.team_id");
        $oldlist= model("Teams")->find($id);
        if(request()->isPost()){
            $res = model("Teams")->teamsEdit(input('post.'));
            if($res){
                Base::alert('添加成功！',url('guess/teams'));
            }else{
                Base::alert('添加失败！',-1);
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }
    public function teamsStatus($id = 0, $status = 0)
    {
        $res = db('Teams')->where('team_id', $id)->update(['status' => $status]);
        if ($res) {
            $this->success('更新成功', 'guess/teams');
        } else {
            $this->error('更新失败');
        }
    }
    public function teamsDel()
    {
        $id=  db('Teams')->find(input("param.team_id"));
        $del= db('Teams')->delete($id);
        if($del){
            Base::alert('删除成功！',url('guess/teams'));
        }else{
            Base::alert('删除失败！',-1);
        }

    }
    //游戏管理
    public function games()
    {
        $select = model('Guess')->select();
        return $this->fetch('', ['select' => $select]);
    }
    public function gamesAdd($close=0)
    {
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Games');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $games= model('Games')->gamesAdd($data);
            if($games){
                Base::alert('添加成功！',url('guess/games'));
            }else{
                Base::alert('添加失败！',-1);
            }
        }
        return $this->fetch('');
    }

    public function gamesEdit()
    {
        $id=input("param.game_id");
        $oldlist= model("Games")->find($id);
        if(request()->isPost()){
            $res = model("Games")->gamesEdit(input('post.'));
            if($res){
                Base::alert('添加成功！',url('guess/games'));
            }else{
                Base::alert('添加失败！',-1);
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist]);
    }


    public function gamesDel()
    {
        $id=  db('games')->find(input("param.game_id"));
        $del= db('games')->delete($id);
        if($del){
            Base::alert('删除成功！',url('guess/games'));
        }else{
            Base::alert('删除失败！',-1);
        }
    }

    //赛事管理
    public function matchs()
    {
        $select = model('Matchs')->selectMatchs();
        return $this->fetch('', ['select' => $select]);
    }

    public function showMatchsMessage()
    {
        $id = input('id');
        $select = model('Matchs')->showMatchsMessage($id);
        $match = $select['matchs'];
        $gues = $select['gues'];
        return $this->fetch('', ['match' => $match,'gues'=>$gues]);
    }

    public function saiShiStatus()
    {
        $id = input('param.')['id'];
        $sta = input('param.')['sta'];
        $change = model('Matchs')->saiShiStatus($id,$sta);
        if($change)
        {
            $this->success('修改成功!');
        }
    }

    public function endForm()
    {
        $id = input('id');
        $msg = db('matchs')->find($id);
        if(request()->isPost()){
            $data = input('post.')['point'];
            if(empty($data[0])||empty($data[1]))
                $this->success('请填写比赛结果!');
            if($data[0]>$data[1])
                $team = $msg['team1_id'];
            else
                $team = $msg['team2_id'];
            $point = implode(":",$data);
            $res = db('matchs')->where("matchs_id = $id")->update(['point'=>$point]);
            if($res == 1){
                $end['point'] = $data;
                $end['match_id'] = $id;
                $end['team'] = $team;
                model('Matchs')->saiShiStatus($id,2);
                model('matchs')->jieSuan($end);
                $this->success('发布成功!');
            }
        }
        $find = model('Matchs')->showMatchsMessage($id);
        return $this->fetch('',['msg'=>$msg,'matchs'=>$find]);
    }
    public function matchsAdd()
    {
        $teamsID=model("Matchs")->teamsID();
        $itemsID=model("Matchs")->itemsID();
       $userID=model("Matchs")->userID();
        if(request()->isPost()){
            $data=input("post.");
            if($data['team1_id']==$data['team2_id'])
                $this->error("不可选择两只相同队伍比赛");

            $match = [
                'mname' => $data['mname'],
                'game_id' => $data['game_id'],
                'team1_id' => $data['team1_id'],
                'team2_id' => $data['team2_id'],
                'status' => 1,
                'starttime' => strtotime($data['start_time']),
                'endtime' => strtotime($data['end_time']),
                'create_time' => time(),
                'update_time' => time()
            ];
//            print_r($match);die;
            $match_id = db('matchs')->insertGetId($match);

            if($match_id>0&&is_numeric($match_id)){
                $data2['match_id'] = $match_id;
                $data2['match_name'] = $data['mname'];
                $data2['start_time'] = strtotime($data['start_time']);
                $data2['end_time'] = strtotime($data['end_time']);
                addTeamMatch($data['team1_id'],$data2);
                addTeamMatch($data['team2_id'],$data2);
                Base::alert('添加成功！',url('guess/matchs'));
            }else{
                Base::alert('添加失败！',-1);
            }
        }
        $games = db('games')->field('game_id,gname')->select();
        return $this->fetch('',['games'=>$games,'userID'=>$userID,'teamsID'=>$teamsID,'itemsID'=>$itemsID]);
    }

    public function competition(){
        $select = db('gues')->paginate(5);
        return $this->fetch('', ['select' => $select]);
    }

    public function addEditGuess(){
        $id = input('id');
        $time1 = time()+7200;
        $matchList = db('matchs')->where("starttime >= $time1")->select();
        if(request()->isPost())
        {
            $data = input('post.');
            if(empty($data['gues_name']))
                return "请填写竞猜名称";
            if(empty($data['match_id']))
                return "请选择比赛";
            if(empty($data['peilv']))
                return "请设置赔率";
            if(empty($data['guess_type']))
                return "请选择比赛类型";
            if(empty($data['gues_name'])&&$data['guess_type']==2)
                return "请填写赢多少分";
            $data['match_name'] = db('matchs')->where("matchs_id = {$data['match_id']}")->field('mname')->find()['mname'];
            $data['user_id'] = 0;
            $data['user_name'] = "平台";
            $data['status'] = 1;
            $data['add_time']=time();
            if($id){
                $res = db('gues')->where("gues_id = $id")->update($data);
            }else{
                $res = db('gues')->insert($data);
            }
            if($res)
            {
                Base::alert("添加成功！");
            }

        }
        if($id){
            $guessInfo = db('gues')->where("gues_id = $id")->find();
        }else{
            $arr = db('gues')->getTableFields();
            foreach ($arr as $k => $v){
                $guessInfo[$v] = "";
            }
        }
        return $this->fetch('',['matchList'=>$matchList,'guessInfo'=>$guessInfo]);
    }

    public function matchsEdit()
    {
        $teamsID=model("Matchs")->teamsID();
        $itemsID=model("Matchs")->itemsID();
        $userID=model("Matchs")->userID();
        $id=input("param.matchs_id");
        $oldlist= db("matchs")->find($id);
        $oldlist['team1_name'] = getTeamName($oldlist['team1_id']);
        $oldlist['team2_name'] = getTeamName($oldlist['team2_id']);
        $games = db('games')->field('game_id,gname')->select();
        if(request()->isPost()){
            $res = model("Matchs")->matchsEdit(input('post.'));
            if($res){
                Base::alert('修改成功！',url('guess/matchs'));
            }else{
                Base::alert('修改失败！',-1);
            }
        }
//        print_r($oldlist);die;
        return  $this->fetch('',['oldlist'=>$oldlist,'teamsID'=>$teamsID,'itemsID'=>$itemsID,'userID'=>$userID,'games'=>$games]);
    }

    public function matchsDel()
    {
        $id=  db('matchs')->find(input("param.matchs_id"));
        db('matchs')->delete($id);
        $this->success("删除成功！");

    }

    //投注项目管理
    public function guesDel()
    {
        $id=  db('gues')->find(input("param.gues_id"));
        $del= db('gues')->delete($id);
        $this->success("删除成功！");
    }

    //修改状态
    public function guesStatus()
    {
        $table = input('table');
        $id_name = input('id_name');
        $id = input('id');
        $value = input('value');
        $result = updateTableField($table,$id_name,$id,"status",$value);
        return $result;
    }
    //投注表管理
    public function bets()
    {
        $select = model('Bets')->select();
        return $this->fetch('', ['select' => $select]);
    }

    public function betsAdd()
    {
        $matchsID=model("Bets")->matchsID();
        $userID=model("Bets")->userID();
        if(request()->isPost()){
            $data=input("post.");
            $validate = validate('Bets');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            $games= model('Bets')->betsAdd($data);
            if($games){
                Base::alert('添加成功！',url('guess/bets'));
            }else{
                Base::alert('添加失败！',-1);
            }
        }

        return $this->fetch('',['userID'=>$userID,'matchsID'=>$matchsID]);
    }
    public function betsEdit()
    {

        $matchsID=model("Bets")->matchsID();
        $userID=model("Bets")->userID();
        $id=input("param.bets_id");
        $oldlist= model("Bets")->find($id);
        if(request()->isPost()){
            $res = model("Bets")->betsEdit(input('post.'));
            if($res){
                Base::alert('添加成功！',url('guess/bets'));
            }else{
                Base::alert('添加失败！',-1);
            }
        }
        return  $this->fetch('',['oldlist'=>$oldlist,'matchsID'=>$matchsID,'userID'=>$userID]);
    }
    public function betsStatus($id = 0, $status = 0)
    {
        $res = db('Bets')->where('bets_id', $id)->update(['status' => $status]);
        if ($res) {
            $this->success('更新成功', 'guess/bets');
        } else {
            $this->error('更新失败');
        }
    }
    public function betsDel()
    {
        $id=  db('Bets')->find(input("param.bets_id"));
        $del= db('Bets')->delete($id);
        $this->success("删除成功！");
    }

    public function audit()
    {
        $select = model('Bets')->select();
        return $this->fetch('', ['select' => $select]);
    }
}