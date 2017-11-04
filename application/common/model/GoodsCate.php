<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:27
 */
namespace app\common\model;
use think\Model;

class GoodsCate extends Model{
    /**
     * 商品添加
     * @param $data
     * @return false|int
     */
    protected $pk ='goods_cid';
    protected $table = 'goods_category';
    public function add($data)
    {
      return $this->save($data);
    }

    /**
     * s商品修改
     * @param $data
     * @return array
     */
    public function edit($data)
    {
       //halt($data);
        $res = $this->save($data,['goods_id',$data['goods_id']]);
        return $res;
    }
}