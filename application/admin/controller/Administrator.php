<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/1
 * Time: 13:14
 */
namespace app\admin\controller;
class Administrator extends Common {
    /**
     * 管理员添加
     * @param int $close
     * @return mixed|void
     */
    public function add($close=0)
    {
        if(request()->isPost())
        {
            $data = input('post.');
            $time = time();
            $data = [
                'admin_username' => $data['admin_username'],
                'admin_password' => md5($data['admin_password']),
                'email' => $data['email'],
                'create_time'=>$time
            ];
          // halt($data);
            $validate = validate('Adminuser');
            if (!$validate->check($data)){
                return $this->error($validate->getError());
            }
            //添加到数据库
            $res = model('Adminuser')->add($data);
            if($res){
                $this->success('添加成功','administrator/add?close=1');exit;
            }else{
                $this->error('管理员添加失败，请稍后在试！');
            }



        }
        return $this->fetch('',['close'=>$close]);
    }

    /**
     * 展示管理员列表
     * @return mixed
     */
    public function index()
    {
        $data = db('Admin_user')->where("delete",0)->select();
       // halt($data);
        return $this->fetch('',['data'=>$data]);
    }

    /**
     * 管理员编辑
     * @param int $close
     * @return mixed
     */
    public function edit($close=0)
    {

        $data = db('Admin_user')->find(input('param.id'));
       // halt($data);
        if(request()->isPost())
        {
            $data = input('post.');

            $res = db('Admin_user')->where('admin_id',$data['admin_id'])->update($data);
            if($res){
                $this->success('管理员修改成功','administrator/edit?close=1');exit;
            }else{
                $this->error('管理员修改失败，请稍后再试！');exit;
            }
        }
        return $this->fetch('',['data'=>$data,'close'=>$close]);
    }

    /**
     * 管理员删除
     * @param int $id
     * @param int $delete
     */
    public function del($id=0,$delete=0)
    {
        //echo $id;
        if(!$id){
            $this->error('参数错误');
        }
        $res = model('Adminuser')->save(["delete"=>$delete],["admin_id"=>$id]);

        if ($res) {
            $this->success('操作成功', 'administrator/index');
            exit;
        } else {
            $this->error('操作失败,请稍后再试！');
            exit;
        }
    }

    /**
     * 管理员状态修改
     * @return array
     */
    public function adminStatus()
    {
        $data=input('post.');
        //halt($data);
        $res=model('Adminuser')->save(['admin_status'=>$data['status']],['admin_id'=>$data['id']]);
        if($res)
        {

            return ['code'=>1,'data'=>$data];
        }else{
            return ['code'=>0];
        }
    }

    /**
     * 管理员查找
     * @return mixed|void
     */
    public function adminFind()
    {

        if(request()->isGet()) {
            $inp = input("param.find_name");
        }
        $data =  db('Admin_user')
            ->where('admin_tel|admin_username|email','like',"{$inp}%")
            ->where("admin_status","=","1")
            ->paginate();

        //halt($categorys);
        if($data){
            return $this->fetch('administrator/index',["data"=>$data]);
        }else {

            return $this->error("未查询到数据");
        }


    }

}