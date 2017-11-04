<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\10\14 0014
 * Time: 20:09
 */

namespace app\admin\Controller;
use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        if(!session('admin_id'))
        {
            $this->redirect('admin/login/index');
        }
    }
}


?>