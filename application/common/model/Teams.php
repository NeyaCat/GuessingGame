<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Teams extends Model{
    protected $pk = 'team_id';
    protected $table = 'teams';
    protected $autoWriteTimestamp = true;
    /*
   * 获取下拉框会员分类
   */
    public function gamesID()
    {
        return db("games")
            ->alias('a')
            ->field('a.gname,a.game_id')
            ->select();
    }
    //查询帖子列表
    public function select()
    {
        return db('teams')->paginate(5);
    }
    //创建帖子
    public function teamsAdd($data)
    {
        $data['status']=0;
        return $this->allowField(true)->save($data);
    }
    //修改帖子
    public function teamsEdit($data){
        return $this->save($data,$data['team_id']);
    }

}
