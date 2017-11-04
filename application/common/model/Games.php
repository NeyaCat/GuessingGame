<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Games extends Model{
    protected $pk = 'game_id';
    protected $table = 'games';
    protected $autoWriteTimestamp = true;

    //查询列表
    public function select()
    {
        return db('games') ->paginate(5);
    }
    //创建游戏
    public function gamesAdd($data)
    {
        return $this->allowField(true)->save($data);
    }
    //修改帖子游戏
  public function gamesEdit($data){
        return $this->save($data,$data['game_id']);
    }


}
