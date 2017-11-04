<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use app\common\commonclass\Base;
use think\Model;
class Guess extends Model{

    protected $autoWriteTimestamp = true;
    //查询游戏列表
    public function select()
    {
        return db('games') ->paginate(5);
    }
    //创建
    public function gamesAdd($data)
    {
        $field = $value = '';
        foreach($data as $key=>$val){
            $field .= "`$key`,";
            $value .= "'$val',";
        }
        $field = trim($field,',');
        $value = trim($value , ',');
        $rs = $this->db()->execute("insert into `games`({$field}) value({$value})");
        return $rs;
    }
    //修改游戏
    public function gamesEdit($data){
        return $this->db('games')->save($data,$data['game_id']);
    }

}
