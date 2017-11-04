<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Notice extends Model{
    protected $pk = 'notice_id'; //主键

    // 设置当前模型对应的完整数据表名称
    protected $table = 'notice';
    protected $autoWriteTimestamp = true;
    //查询广告列表
    public function select()
    {
        $data=[
            "status"=>['neq', -1],
        ];
        return db('notice')->where($data)->paginate(5);
    }
    //添加广告
    public function add($data)
    {
        $data['status']=0;
        return $this->allowField(true)->save($data);
    }
    //修改广告
    public function edit($data){
        return $this->save($data,$data['notice_id']);
    }

}
