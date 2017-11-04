<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"E:\phpStudy\WWW\game\public/../application/admin\view\guess\showmatchsmessage.html";i:1508393247;s:72:"E:\phpStudy\WWW\game\public/../application/admin\view\public\header.html";i:1506450140;s:72:"E:\phpStudy\WWW\game\public/../application/admin\view\public\footer.html";i:1508002063;}*/ ?>
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
<body>
    <article class="page-container">

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">比赛名称：</label>
            <div class="formControls col-xs-8 col-sm-4">
            <?php echo $match['mname']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">比赛类型：</label>
            <div class="formControls col-xs-8 col-sm-4">
            <?php echo $match['gname']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">比赛队伍：</label>
            <div class="formControls col-xs-8 col-sm-4">
            <?php echo getTeamName($match['team1_id']); ?>VS<?php echo getTeamName($match['team2_id']); ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">庄家：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <?php echo getUserName($match['user_id']); ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">比赛开始时间：</label>
            <div class="formControls col-xs-8 col-sm-10">
            <?php echo date("Y-m-d h:s:m ", $match['starttime']); ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">比赛结束时间：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <?php echo date("Y-m-d h:s:m ", $match['endtime']); ?>
            </div>
        </div>
        <?php if($gues == []): ?>
        啥都没有
        <?php else: if(is_array($gues) || $gues instanceof \think\Collection || $gues instanceof \think\Paginator): $i = 0; $__LIST__ = $gues;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">竞猜名称：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <?php echo $vo['gues_name']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">发起人：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <?php echo $vo['user_name']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">竞猜赔率：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <?php echo $vo['peilv']; ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">添加时间：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <?php echo date('Y-m-d H:i:s', $vo['add_time']); ?>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">竞猜状态：</label>
            <div class="formControls col-xs-8 col-sm-10">
                <?php echo gues_status($vo['status']); ?>
            </div>
        </div>
        <br/>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </article>

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


<script type="text/javascript">
    $(function(){
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });
    });
    $(function(){
        var ue = UE.getEditor('editor');

    });
    function closess() {
        parent.layer.closeAll();//关闭所有layer窗口
    }


</script>
<script type="text/javascript" src="__STATIC__/admin/js/My97DatePicker/WdatePicker.js"></script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
