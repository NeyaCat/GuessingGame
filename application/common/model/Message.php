<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Message extends Model{
    protected $pk = 'message_id';
    protected $table = 'message';
    protected $autoWriteTimestamp = true;
    /*
   * 获取下拉框会员分类
   */
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
        return db('message')
            ->alias('a')
            ->field('a.*')
            ->join('user b','a.user_id = b.user_id')
            ->field('b.user_name')
           ->paginate(5);
    }
    //创建帖子
    public function add($data)
    {
        return $this->allowField(true)->save($data);
    }
    //修改帖子
    public function edit($data){
        return $this->save($data,$data['message_id']);
    }

}
