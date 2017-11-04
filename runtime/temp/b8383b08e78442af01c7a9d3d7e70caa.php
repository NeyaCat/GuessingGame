<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"E:\WWWRoot\game\public/../application/admin\view\guess\competition.html";i:1508348342;s:67:"E:\WWWRoot\game\public/../application/admin\view\public\header.html";i:1506450140;s:67:"E:\WWWRoot\game\public/../application/admin\view\public\footer.html";i:1508002063;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="__STATIC__/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="__STATIC__/admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/admin/uploadify/uploadify.css" />

    <!--[if IE 6]>
    <script type="text/javascript" src="__STATIC__/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<style>
    .pageNav{
        float: right;
        margin-right: 50px;
    }
    .pageNav li{
        float: left;
    }
</style>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>竞猜管理 <span class="c-gray en">&gt;</span> 投注项目列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form action="" method="post">
        <div class="text-c">

            <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="search">
            <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
        </div>
    </form>
    <div class="cl pd-5 bg-1 bk-gray mt-20">  <a href="javascript:;" onclick="member_add('发起竞猜','<?php echo url('guess/addEditGuess'); ?>','1200','550')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 发起竞猜</a></span>  </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="70">ID</th>
                <th width="150">竞猜名称</th>
                <th width="50">比赛名称</th>
                <th width="50">发起人</th>
                <th width="50">创建时间</th>
                <th width="50">开启状态</th>
                <th width="70">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($select) || $select instanceof \think\Collection || $select instanceof \think\Paginator): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><?php echo $vo['gues_id']; ?></td>
                <td><?php echo $vo['gues_name']; ?></td>
                <td><?php echo $vo['match_name']; ?></td>
                <td><?php echo $vo['user_name']; ?></td>
                <td><?php echo date("Y-m-d h:s:m ", $vo['add_time']); ?></td>
                <td><?php echo gues_status($vo['status']); ?></td>
                <td class="td-manage">
                    <a style="text-decoration:none" onClick="updateStatus('gues','gues_id',<?php echo $vo['gues_id']; ?>,<?php echo $vo['status']; ?>,this)" href="javascript:;"
                       title="状态"><i class="Hui-iconfont">&#xe631;</i></a>
                    <a title="编辑" href="javascript:;"
                       onclick="member_edit('编辑','<?php echo url('guess/addEditGuess',['id'=>$vo['gues_id']]); ?>','4','','510')"
                       class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo url('guess/guesDel',['gues_id'=>$vo['gues_id']]); ?>','','1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <div class="pageNav"><?php echo $select->render(); ?></div>


</div>

<script type="text/javascript">

    function updateStatus(table,id_name,id,value,obj) {
        switch (value){
            case 0:
                layer.confirm("是否同意竞猜", {
                    btn: ['同意','拒绝'] //按钮
                }, function(){
                    checkStatus(table,id_name,id,1,obj);
                }, function(){
                    checkStatus(table,id_name,id,4,obj);
                });
                break;
            case 1:
                layer.confirm("是否终止投票", {
                    btn: ['同意','拒绝'] //按钮
                }, function(){
                    checkStatus(table,id_name,id,2,obj);
                }, function(){
                    checkStatus(table,id_name,id,1,obj);
                });
                break;
            case 2:
                layer.confirm("是否结束竞猜", {
                    btn: ['同意','拒绝'] //按钮
                }, function(){
                    checkStatus(table,id_name,id,3,obj);
                }, function(){
                    checkStatus(table,id_name,id,2,obj);
                });
                break;
            case 4:
                layer.confirm("是否同意竞猜", {
                    btn: ['同意','拒绝'] //按钮
                }, function(){
                    checkStatus(table,id_name,id,1,obj);
                }, function(){
                    checkStatus(table,id_name,id,0,obj);
                });
                break;
        }

    }

    function checkStatus(table,id_name,id,value,obj) {
        $.ajax({
            url:"<?php echo url('Guess/guesStatus'); ?>?table="+table+"&id_name="+id_name+"&id="+id+"&value="+value,
            success:function (res) {
                if(res['status']==1){
                        location.reload();
                }
            }
        })
    }

    /*用户-添加*/
    function member_add(title,url,w,h){
        //alert(url);
        layer_show(title,url,w,h);
    }
    /*用户-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*收藏-查看*/
    function collection_show(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-停用*/


    function member_stop(url){
        if(confirm("确认要更改吗？"))
        {
            location.href =url;
        }
    }


    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function member_del(obj,url,id,del){
        //alert(url);
        if(confirm('确认要删除吗？'))
        {
            $.ajax({
                type: 'POST',
                url: url,
                data:{'id':id,'delete':del},
                dataType: 'json',
                success: function(data){
                    if(data.code == 1)
                    {
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                        location.reload();
                    }
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        }else {
            return false;
        }
    }
</script>
</body>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/admin/lib/ueditor/1.4.3/ueditor.all.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__STATIC__/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__STATIC__/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="__STATIC__/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript" src="__STATIC__/admin/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>
