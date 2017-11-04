<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function info(){
    $info = [
        '操作系统'=>PHP_OS,
        '运行环境'=>$_SERVER["SERVER_SOFTWARE"],
        'PHP运行方式'=>php_sapi_name(),
        '剩余空间'=>round((disk_free_space(".")/(1024*1024)),2).'M',
        '主机名'=>$_SERVER['SERVER_NAME'],
        'WEB服务端口'=>$_SERVER['SERVER_PORT'],
        '网站文档目录'=>$_SERVER["DOCUMENT_ROOT"],
        '浏览器信息'=>substr($_SERVER['HTTP_USER_AGENT'], 0, 40),
        '通信协议'=>$_SERVER['SERVER_PROTOCOL'],
        '请求方法'=>$_SERVER['REQUEST_METHOD'],
        'ThinkPHP版本'=>THINK_VERSION,
        '上传附件限制'=>ini_get('upload_max_filesize'),
        '执行时间限制'=>ini_get('max_execution_time').'秒',
        '北京时间'=>gmdate("Y年n月j日 H:i:s",time()+8*3600),
        '用户的IP地址'=>$_SERVER['REMOTE_ADDR'],
    ];
    return $info;
}
function show($status,$message,$data =[])
{
    return [
        'status' => intval($status),
        'message' => $message,
        'data' => $data,
    ];

}
function admin_status($admin_status)
{
    if($admin_status == 1)
    {
        $str = "<span class=\"label label-success radius\">已启用</span>";
    }else if($admin_status == 0)
    {
        $str = "<span class=\"label radius\">已未用</span>";
    }
    return $str;
}
function goods_status($goods_status)
{
    if($goods_status == 0)
    {
        $str = "<span class=\"label label-success radius\">上架</span>";
    }else if($goods_status == 1)
    {
        $str = "<span class=\"label radius\">下架</span>";
    }
    return $str;
}
//广告发布状态
function role_status($role_status)
{
    if($role_status == 1)
    {
        $str = '<span class="label label-success radius">已发布</span>';
    }elseif($role_status == 0)
    {
        $str = '<span class="label  radius">未发布</span>';
    }
    return $str;
}
//广告发布状态
function notice_status($role_status)
{
    if($role_status == 1)
    {
        $str = '<span class="label label-success radius">已发布</span>';
    }elseif($role_status == 0)
    {
        $str = '<span class="label  radius">未发布</span>';
    }
    return $str;
}
//推荐详情发布状态
function analyst_status($analyst_status)
{
    if($analyst_status == 1)
    {
        $str = '<span class="label label-success radius">已发布</span>';
    }elseif($analyst_status == 0)
    {
        $str = '<span class="label  radius">未发布</span>';
    }
    return $str;
}
//积分详情兑换发布状态
function integral_status($integral_status)
{
    if($integral_status == 1)
    {
        $str = '<span class="label label-success radius">已发布</span>';
    }elseif($integral_status == 0)
    {
        $str = '<span class="label  radius">未发布</span>';
    }
    return $str;
}
//投注量状态
function gues_status($gues_status)
{
    $str='';
    if($gues_status == 1)
    {
        $str = '<span class="label label-success radius">进行中</span>';
    }elseif($gues_status == 0)
    {
        $str = '<span class="label  radius">待审核</span>';
    }elseif ($gues_status == 2){
        $str = '<span class="label label-warring radius">停止投注</span>';
    }elseif ($gues_status == 3){
        $str = '<span class="label  radius">已结束</span>';
    }elseif ($gues_status == 4){
        $str = '<span class="label  radius">已拒绝</span>';
    }
    return $str;
}
function teams_status($teams_status)
{
    if($teams_status == 1)
    {
        $str = '<span class="label label-success radius">已发布</span>';
    }elseif($teams_status == 0)
    {
        $str = '<span class="label  radius">未发布</span>';
    }
    return $str;
}
//投注状态

function bets_status($bets_status)
{
    $str='';
    if($bets_status == 1)
    {
        $str = '<span class="label label-success radius">已发布</span>';
    }else//if($bets_status == 0)
    {
        $str = '<span class="label  radius">未发布</span>';
    }
    return $str;
}
//回复量
function recount($message_id)
{
    $str=db('message_re')->where('message_id',$message_id)->count();
    return $str;
}
/**
 * 会员金币状态
 * @param $admin_status
 * @return string
 */
function gold_status($gold_status)
{
    if($gold_status == 0)
    {
        $str = "<span class=\"label label-success radius\">正常</span>";
    }else if($gold_status == 1)
    {
        $str = "<span class=\"label radius\">已冻结</span>";
    }
    return $str;
}

function getTeams($team_id){
    $result = db('teams')->where("team_id",$team_id)->field('team_id,tname,timage')->find();
    return $result;
}

function getTeamName($team_id){
    $result = db('teams')->where("team_id",$team_id)->field('team_id,tname,timage')->find();
    return $result['tname'];
}

function getGameName($games_id){
    $result = db('games')->where("game_id",$games_id)->field('gname')->find();
    return $result['gname'];
}

function betsStatus($status)
{
    if($status==0)
        return "待开";
    if($status==1)
        return "输";
    if($status==2)
        return "赢";
}

function user_log($user_id,$type,$type_name,$pay){

    $user_money = db('user')->where("user_id = $user_id")->field('user_intgral')->find();
    $data = [
        'user_id' => $user_id,
        'type' => $type,
        'type_name' => $type_name,
        'pay' => $pay,
        'user_money' => $user_money['user_intgral'],
        'add_time' => time()
    ];
    db('user_log')->insert($data);
}

function matchs_stat($sta)
{
    $str = '';
    if($sta == 1)
        $str = '<span class="label radius">未开启</span>';
    if($sta == 2)
        $str = '<span class="label label-success radius">进行中</span>';
    if($sta == 3)
        $str = '<span class="label label-erroe radius">已结束</span>';
    return $str;
}

function matchs_stat_qian($sta)
{
    $str = '';
    if ($sta == 1)
        $str = '未开启';
    if ($sta == 2)
        $str = '进行中';
    if ($sta == 3)
        $str = '已结束';
    return $str;
}

function saiShiStat($sta)
{
    $str = '';
    if($sta == 1)
        $str = '开启赛事';
    if($sta == 2)
        $str = '结束赛事';
    return $str;
}

function getUserName($id){
    $user_name = db('user')->where('user_id',$id)->field('user_name')->find();
    if($user_name){
        return $user_name['user_name'];
    }else{
        return "平台";
    }
}

function addTeamMatch($team_id,$data){
    $data['team_id'] = $team_id;
    db('team_match')->insert($data);
}

function checkTeamMatch($team_id,$start_time,$end_time){

}

function updateTableField($table,$id_name,$id,$field,$value){
    db($table)->where("$id_name = $id")->update([$field=>$value]);
    return array('status' => 1);
}