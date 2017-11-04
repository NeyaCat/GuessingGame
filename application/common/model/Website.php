<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Website extends Model{
    protected $pk = 'website_id'; //主键

    // 设置当前模型对应的完整数据表名称
    protected $table = 'website';
    protected $autoWriteTimestamp = true;

    //查询网站列表
    public function select()
    {
        return db('website')->paginate(5);
    }
    //添加网站信息
    public function websiteAdd($data)
    {
        $data['status']=0;
        return $this->allowField(true)->save($data);
    }
    //修改网站信息
    public function websiteEdit($data){
        return $this->save($data,$data['website_id']);
    }

}
