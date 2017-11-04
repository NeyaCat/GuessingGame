<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Bets extends Model{
    protected $pk = 'bets_id';
    protected $table = 'bets';
    protected $autoWriteTimestamp = true;
    /*
   * 获取下拉框会员分类
   */

    //投注赛事ID
    public function matchsID()
    {
        return db("matchs")
            ->alias('m')
            ->field('m.mname,m.matchs_id')
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
        return db('bets')
            ->alias('a')
            ->field('a.*')
            ->join('matchs m','a.matchs_id = m.matchs_id')
            ->field('m.mname')
            ->join('user u','a.user_id = u.user_id')
            ->field('u.user_name')
           ->paginate(5);
    }
    //创建帖子
    public function betsAdd($data)
    {
        return $this->allowField(true)->save($data);
    }
    //修改帖子
    public function betsEdit($data){
        return $this->save($data,$data['matchs_id']);
    }

}
