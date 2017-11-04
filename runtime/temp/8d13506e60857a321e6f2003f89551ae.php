<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\phpStudy\WWW\game\public/../application/admin\view\guess\addeditguess.html";i:1508344294;s:72:"E:\phpStudy\WWW\game\public/../application/admin\view\public\header.html";i:1506450140;s:72:"E:\phpStudy\WWW\game\public/../application/admin\view\public\footer.html";i:1508002063;}*/ ?>
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
    .guess_type div{ float: left;}
</style>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>竞猜名称：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text" value="<?php echo $guessInfo['gues_name']; ?>" placeholder="请填写竞猜名称" name="gues_name">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择比赛：</label>
            <select name="match_id"  style="height:31px;margin-left: 20px;" >
                <option value="">--请选择--</option>
                <?php if(is_array($matchList) || $matchList instanceof \think\Collection || $matchList instanceof \think\Paginator): $i = 0; $__LIST__ = $matchList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>

                <option value="<?php echo $vo['matchs_id']; ?>" <?php if($vo['matchs_id'] == $guessInfo['match_id']): ?>selected<?php endif; ?> ><?php echo $vo['mname']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <!--<div class="row cl">-->
            <!--<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>投注栏目一（胜负）：</label>-->
        <!--</div>-->

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>设置赔率：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text" value="<?php echo $guessInfo['peilv']; ?>" placeholder="请填写赔率" name="peilv">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>竞猜类型：</label>
            <div class="formControls col-xs-8 col-sm-4 guess_type">
                <div><input type="radio" name="guess_type" value="1" <?php if(1 == $guessInfo['guess_type']): ?>checked<?php endif; ?> />押胜负</div>
                <div><input type="radio" name="guess_type" value="2" <?php if(2 == $guessInfo['guess_type']): ?>checked<?php endif; ?> />押比分</div>

            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">赢多少分：</label>
            <div class="formControls col-xs-8 col-sm-4">
                <input type="text" class="input-text" value="<?php echo $guessInfo['point']; ?>" placeholder="押胜负可不填，押比分必填" name="point">
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <input class="btn btn-primary radius" onclick="closess()" type="button" value="&nbsp;&nbsp;取消&nbsp;&nbsp;">
            </div>
        </div>
    </form>
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
