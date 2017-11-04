<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\23 0023
 * Time: 1:33
 */
namespace app\index\controller;
use think\Controller;

class Shop extends Controller{
    public function index()
    {
        //halt($good_cid);
        $cate = db('Goods_category')->where('goods_pid',0)->select();
        $data = db('Goods')
            ->alias('a')
            ->join('Goods_category b','a.goods_cid=b.goods_cid')
            ->where('goods_status',0)
            ->paginate(10);

        return $this->fetch('',['cate'=>$cate,'data'=>$data]);
    }

    /**
     * @return bool
     */
    public function cate($id)
    {
       $cate = db('Goods_category')->where('goods_pid',$id)->select();
       return $cate;

    }

    public function detail($id)
    {
        $data = db('Goods')
            ->alias('a')
            ->join('Goods_category b','a.goods_cid=b.goods_cid')
            ->where("a.goods_status",0)
            ->where('a.goods_cid',$id)
            ->paginate(1);
            return $data;

    }
}