<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Integral extends Model{
    protected $pk = 'integral_id'; //主键

    // 设置当前模型对应的完整数据表名称
    protected $table = 'integral';
    protected $autoWriteTimestamp = true;

    //查询积分兑换详情列表
    public function select()
    {
        $data=[
            "status"=>['neq', -1],
        ];
        return db('integral')->where($data)->paginate(5);
    }
    //添加积分兑换详情
    public function integralAdd($data)
    {
        $data['status']=0;
        return $this->allowField(true)->save($data);
    }
    //修改广告
    public function integralEdit($data){
        return $this->save($data,$data['integral_id']);
    }
    public function integral()
    {
        $data=[
            "status"=>['eq', 1],
        ];
        return db('integral')->where($data)->paginate(5);
    }
}
