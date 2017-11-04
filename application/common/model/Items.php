<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/2
 * Time: 15:23
 */
namespace app\common\model;
use think\Model;
class Items extends Model{
    protected $pk = 'items_id';
    protected $table = 'items';
    protected $autoWriteTimestamp = true;

    //查询投注项目列表
    public function select()
    {
        return db('items') ->paginate(5);
    }
    //创建投注项目信息
    public function itemsAdd($data)
    {
        $data['status']=0;
        return $this->allowField(true)->save($data);
    }
    //修改投注项目信息
  public function itemsEdit($data){
        return $this->save($data,$data['items_id']);
    }

}
