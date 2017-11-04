<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Analyst extends Model{
    protected $pk = 'analyst_id'; //主键

    // 设置当前模型对应的完整数据表名称
    protected $table = 'analyst';
    protected $autoWriteTimestamp = true;

    //查询积分兑换详情列表
    public function select()
    {
        $data=[
            "status"=>['neq', -1],
        ];
        return db('analyst')->where($data)->paginate(5);
    }
    //添加积分兑换详情
    public function analystAdd($data)
    {
        $data['status']=0;
        return $this->allowField(true)->save($data);
    }
    //修改广告
    public function analystEdit($data){
        return $this->save($data,$data['analyst_id']);
    }
    public function analyst()
    {
        $data=[
            "status"=>['eq', 1],
        ];
        return db('analyst')->where($data)->paginate(5);
    }
}
