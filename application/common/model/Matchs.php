<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Matchs extends Model{
    protected $pk = 'matchs_id';
    protected $table = 'matchs';
    protected $autoWriteTimestamp = true;
    /*
   * 获取下拉框会员分类
   */
    //比赛队伍ID
    public function teamsID()
    {
        return db("teams")
            ->alias('a')
            ->field('a.tname,a.team_id')
            ->select();
    }
    //投注项目ID
    public function itemsID()
    {
        return db("items")
            ->alias('i')
            ->field('i.iname,i.items_id')
            ->select();
    }
    //用户表ID
    public function userID()
    {
        $data=[
            'user_delete'=>0,
        ];
        return db("user")
            ->alias('a')
            ->where($data)
            ->field('a.user_name,a.user_id')
            ->select();
    }
    //查询帖子列表
    public function select()
    {
        $matchs = db('matchs')
            ->alias('a')
            ->field('a.*')
            ->join('teams t1','a.team1_id = t1.team_id')
            ->field('t1.tname as tname1')
            ->join('teams t2','a.team2_id = t2.team_id')
            ->field('t2.tname as tname2')
            ->join('items i','a.matchs_id = i.match_id')
            ->field('i.iname')
            ->join('user u','a.user_id = u.user_id')
            ->field('u.user_name')
           ->select();
        return $matchs;
    }
    public function selectMatchs()
    {
        $matchs = db('matchs')
            ->alias('a')
            ->field('a.*')
            ->join('teams t1','a.team1_id = t1.team_id')
            ->field('t1.tname as tname1')
            ->join('teams t2','a.team2_id = t2.team_id')
            ->field('t2.tname as tname2')

            ->paginate();
        return $matchs;
    }

    public function showMatchsMessage($id)
    {

        $matchs = db('matchs')
            ->alias('a')
            ->field('a.*')
            ->join('games g','g.game_id = a.game_id')
            ->field('g.gname')
            ->where(['matchs_id'=>$id])
            ->find();
        $gues = db('gues')->where(['match_id'=>$matchs['matchs_id']])->select();
        $list = ['matchs'=>$matchs,'gues'=>$gues];
        return $list;
    }

    public function saiShiStatus($id,$sta)
    {
        $a = null;
        if($sta==1)//未开启
        {
            $a = $this->save(['status'=>2],['matchs_id'=>$id]);
        }elseif($sta==2)
        {
            $a = $this->save(['status'=>3],['matchs_id'=>$id]);
        }
        return $a;
    }

    public function selectFromGame($where)
    {
        $list = $this->where($where)->select();
        //var_dump($list);die;
        foreach ($list as $k => $v){
            $list[$k]['team1'] = getTeams($v['team1_id']);
            $list[$k]['team2'] = getTeams($v['team2_id']);

        }
        return $list;
    }

    public function getMatchInfo($id){
        $info = db('matchs')->where("matchs_id",$id)->find();
        if(empty($info))
            return array('info'=>"",'item'=>"");


        $info['team1'] = getTeams($info['team1_id']);
        $info['team2'] = getTeams($info['team2_id']);
        $list = db('gues')->where("match_id",$id)->select();
        return array('info'=>$info,'item'=>$list);
    }

    public function stake($gues_id,$team_id,$price){
        $user_id = session('user_id');
        $user = db('user')->where(['user_id'=>$user_id])->find();
        if(empty($user_id))
            return array('status'=> -1,'msg'=>'请先登陆');
        if(empty($gues_id))
            return array('status'=> -1,'msg'=>'请选择投注类型');
        if(empty($team_id))
            return array('status'=> -1,'msg'=>'请选择投注队伍');
        if(empty($price))
            return array('status'=> -1,'msg'=>'请输入投注金额');
        if($price<=0)
            return array('status'=> -1,'msg'=>'投注金额不合法');
        if($user['user_intgral'] < $price)
            return array('status'=> -1,'msg'=>'您的积分不足');
        $count = $this->check_stake($user_id,$gues_id);
        if($count>0)
            return array('status'=> -2,'msg'=>"您已经投注过此项了");
        $gues = db('gues')->where("gues_id = $gues_id")->find();
        $data = [
            'gues_id' => $gues_id,
            'user_id' => $user_id,
            'team_id' => $team_id,
            'matchs_id' => $gues['match_id'],
            'bmoney' => $price,
            'status' => 0,
            'create_time' => time(),
            'update_time' => time()
        ];
        $res = db('bets')->insert($data);

        if($res>0 && is_numeric($res)){
            db('user')->where(['user_id' => $user_id])->setDec('user_intgral',$price);
            db('gues')->where(['gues_id' => $gues_id])->setInc('num',1);
            $cost_type = config("cost_type");
            user_log($user_id,2,$cost_type[2],$price);
            return array('status'=>1,'msg'=>'投注成功');
        }

    }

    public function check_stake($user_id,$gues_id){
        $count = db('bets')->where("user_id = $user_id AND gues_id = $gues_id")->count();
        return $count;
    }


    //创建帖子
    public function matchsAdd($data)
    {
        $this->allowField(true)->save($data);
        $matchs_id = $this->getLastInsID();
        $data[] = ['match_id'=>$matchs_id];
        model('Items')->allowField(true)->save($data);

        return true;
    }
    //修改帖子
    public function matchsEdit($data){
        return $this->save($data,$data['matchs_id']);
    }

    public function jieSuan($data)
    {
        $itemList = db('bets')->where("matchs_id = {$data['match_id']}")->select();
        foreach ($itemList as $k => $v){
            if($v['team_id']==$data['team']){
                db('bets')->where("bets_id = {$v['bets_id']}")->update(array('status'=>2));
                $peilv = db('gues')->where("gues_id = {$v['gues_id']}")->find();
                $price = $v['bmoney']*($peilv['peilv']+1);
                db('user')->where("user_id = {$v['user_id']}")->setInc('user_intgral',$price);
                $cost_type = config('cost_type');
                user_log($v['user_id'],3,$cost_type[3],$price);
            }else{
                db('bets')->where("bets_id = {$v['bets_id']}")->update(array('status'=>1));
            }
        }
    }
}
