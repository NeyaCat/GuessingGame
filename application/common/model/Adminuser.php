<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\27 0027
 * Time: 1:27
 */
namespace app\common\model;
use think\Model;

class Adminuser extends Model{
    protected $pk = "admin_id";
    protected $table = "admin_user";

    public function add($data)
    {
        return  $this->save($data);
    }
}