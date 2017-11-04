<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Messagere extends Model{
    protected $pk = 're_id'; //主键

    // 设置当前模型对应的完整数据表名称
    protected $table = 'message_re';
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
    public function messageID()
    {
        return db("message")
            ->alias('a')
        //    ->where($data)
            ->field('a.message_title,a.message_id')
            ->select();
    }
    //查询帖子回复列表
    public function select()
    {
        return db('message_re')
            ->alias('a')
            ->field('a.*')
            ->join('user u','a.user_id = u.user_id')
            ->field('u.user_name')
            ->join('message m','a.message_id = m.message_id')
            ->field('m.*')
           // ->select();
            ->paginate(5);
    }
    //创建帖子回复
    public function add($data)
    {
        return $this->allowField(true)->save($data);
    }
    //修改帖子回复
    public function edit($data){
        return $this->save($data,$data['re_id']);
    }

}
