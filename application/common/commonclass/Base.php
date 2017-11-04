<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/14
 * Time: 18:00
 */

namespace app\common\commonclass;


class Base
{
    public static function alert($msg,$url=''){

        echo "<script>alert('{$msg}');";
        if(!empty($url)){
            if(is_string($url)){
                echo "window.location.href='{$url}';";
            }else{
                if(is_numeric($url)){
                    if($url > 0){
                        echo "history.go({$url});";
                    }else{
                        echo "history.back({$url});";
                    }
                }
            }
        }
        echo "</script>";
        exit;

    }
}