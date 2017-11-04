<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\9\26 0026
 * Time: 23:37
 */
namespace app\admin\controller;
use think\Controller;
use think\Validate;

class Shop extends Common {
    /**
     * 商品列表
     * @return mixed
     */
    public function index()
    {
        $data = db('goods')
            ->alias('a')
            ->join('Goods_category c','a.goods_cid = c.goods_cid' )
            ->order('goods_id desc')
            ->where('goods_delete',0)
            ->paginate(5);
   // halt($data);
        return $this->fetch('', ['data' => $data]);
    }

    /**
     * 商品查找
     * @return mixed|void
     */
    public function shopFind()
    {

        if(request()->isGet()) {
            $inp = input("param.find_name");
        }
        $data =  db('Goods')->alias('a')
            ->join('Goods_category c','a.goods_cid = c.goods_cid' )
            ->where('goods_title','like',"{$inp}%")
            ->where('goods_delete',0)
            ->paginate();

        //halt($categorys);
        if($data){
            return $this->fetch('shop/index',["data"=>$data]);
        }else {

            return $this->error("未查询到数据");
        }


    }

    /**
     * 商品添加
     * @param int $close
     * @return mixed|void
     */
    public function add($close=0)
    {
        $cate = db('Goods_category')->where('goods_pid','neq' ,0)->select();
        if(request()->isPost())
        {
          $data = input('post.');
          $time = time();
            $data = [
                'goods_gold' => $data['goods_gold'],
                'goods_count' => $data['goods_count'],
                'goods_image' => $data['goods_image'],
                'goods_cid' => $data['goods_cid'],
                'goods_create_time'=>$time
            ];
            $validate = validate('shop');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //添加到数据库
            $res = model('Goods')->add($data);
            if($res){
                $this->success('添加成功','shop/add?close=1');exit;
            }else{
                $this->error('商品添加失败，请稍后在试！');
            }



        }
        return $this->fetch('',['close'=>$close,'cate'=>$cate]);
    }

    /**
     * 商品编辑
     * @param int $close
     * @return mixed
     */
    public function edit($close=0)
    {
        $cate = db('Goods_category')->where('goods_pid','neq' ,0)->select();

        $id=input('param.id');
        //halt($id);
        $data = db('Goods')
            ->alias('a')
            ->join('Goods_category c','a.goods_cid = c.goods_cid' )
            ->find($id);
        if(request()->isPost()){
            //halt(input('post.'));
          $res =  model('Goods')->edit(input('post.'));
          if($res){
              $this->success('商品修改成功','shop/edit?close=1');exit;
          }else{
              $this->error('商品修改失败，请稍后再试！');exit;
          }

        }
        return $this->fetch('',['close'=>$close,'data'=>$data,'cate'=>$cate]);
    }

    /**
     * 商品软删除
     * @param int $id
     * @param int $delete
     */
    public function del($id=0,$delete=0)
    {
        //echo(1111);
        if(!$id){
            $this->error('参数错误');
        }
        $res = model('Goods')->save(["goods_delete"=>$delete],["goods_id"=>$id]);

        if ($res) {
            $this->success('操作成功', 'shop/index');exit;
        } else {
            $this->error('操作失败,请稍后再试！');exit;
        }
    }

    /**
     * 商品回收站列表
     * @return mixed
     */

    public function recyle()
    {
        $data = db('Goods')->alias('a')
            ->join('Goods_category c','a.goods_cid=c.goods_cid')
            ->where("goods_delete",1)->paginate(10);
        //halt($data);
        return $this->fetch('',['data'=>$data]);
    }

    /**
     * 商品恢复
     * @param int $id
     *
     * @param int $status
     */
    public function status($id = 0, $status = 0)
    {
        //echo $status;die;
        $res = db('goods')->where('goods_id', $id)->update(['goods_delete' => $status]);
        if ($res) {
            $this->success('数据恢复成功', 'shop/index');
        } else {
            $this->error('数据恢复失败，请稍后再试！');
        }

    }

    /**
     * 回收站查找
     * @return mixed|void
     */
    public function recyleFind()
    {
        if(request()->isGet()) {
            $inp = input("param.find_name");
        }
        $data =  db('Goods')->alias('a')
            ->join('Goods_category c','a.goods_cid = c.goods_cid' )
            ->where('goods_title','like',"{$inp}%")
            ->where('goods_delete',1)
            ->paginate();

        //halt($categorys);
        if($data){
            return $this->fetch('shop/recyle',["data"=>$data]);
        }else {

            return $this->error("未查询到数据");
        }


    }
    /**
     * 商品状态
     * @return array
     */
    public function goodsStatus()
    {
        $data=input('post.');
        //halt($data);
        $res=model('Goods')->save(['goods_status'=>$data['status']],['goods_id'=>$data['id']]);
        if($res)
        {

            return ['code'=>1,'data'=>$data];
        }else{
            return ['code'=>0];
        }
    }

    /**
     * 回收站删除商品
     * @param int $id
     * @param int $delete
     */
    public function rdel($id=0,$delete=0)
    {
        //echo(1111);
        if(!$id){
            $this->error('参数错误');
        }
        $res = db('Goods')->where("goods_id",$id)->delete();
        if ($res) {
            $this->success('操作成功', 'shop/index');exit;
        } else {
            $this->error('操作失败,请稍后再试！');exit;
        }
    }

    /**
     * 商品分类
     * @return mixed
     */
    public function category()
    {
        $cate = db('Goods_category')->where('goods_pid',0)->paginate();
        //halt($cate);
        return $this->fetch('',['cate'=>$cate]);
    }

    /**
     * 分类编辑
     * @param int $close
     * @return mixed
     */
    public function cateedit($close=0)
    {
        $data=db('Goods_category')->find(input('param.id'));
        if(request()->isPost()){
            $cateadd = db('Goods_category')->where('goods_cid',input('post.goods_cid'))->update(input('post.'));
            if($cateadd){
                $this->success('分类编辑成功','shop/cateedit?close=1');exit;
            }else{
                $this->error('商品修改失败，请稍后再试！');exit;
            }
        }

        return $this->fetch('',['data'=>$data,'close'=>$close]);
    }

    /**
     * 分类添加
     * @param int $close
     * @return mixed|void
     */
    public function cateadd($close=0)
    {
        $cate = db('Goods_category')->select();
        if(request()->isPost())
        {
            $data = input('post.');
           // halt($data);
            $data = [
                'goods_title' => $data['goods_title'],
                'goods_pid'=>$data['goods_cid']
            ];
            $validate = new Validate(
            ['goods_title'=>'require'],['goods_title'=>'请输入分类标题']);
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //添加到数据库
            $res = model('GoodsCate')->add($data);
            if($res){
                $this->success('分类标题添加成功','shop/add?close=1');exit;
            }else{
                $this->error('分类标题添加失败，请稍后在试！');
            }
        }
        return $this->fetch('',['close'=>$close,'cate'=>$cate]);
    }

    /**分类删除
     * @param int $id
     */
    public function cateDel($id=0)
    {
        if(!$id) {
            return $this->error("参数错误");
        }
        $res=db('Goods_category')->delete(["goods_cid"=>$id]);
        if($res)
        {
            return $this->success('删除成功','shop/index');
        }else{
            return $this->error('删除失败') ;
        }

    }

}