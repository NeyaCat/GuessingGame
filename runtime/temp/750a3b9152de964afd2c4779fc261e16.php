<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"E:\phpStudy\WWW\game\public/../application/index\view\match\index.html";i:1508391528;s:70:"E:\phpStudy\WWW\game\public/../application/index\view\public\main.html";i:1507386836;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\header.html";i:1507384265;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\footer.html";i:1507885767;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <link rel="stylesheet" href="__STATIC__/index/css/same.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/match.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/index.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/header.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/footer.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/copyRight.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/index/css/bbs_detail.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/bbs.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/bbs_note.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/guessing.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/match.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/shop.css"/>
    <link rel="stylesheet" href="__STATIC__/index/css/person.css"/>
    <title>竞猜游戏</title>
    <style>
        .topHead>.mainPage{
            float:left;
        }
        .topHead>div>a{
            color:#fff;
            font-size:1.5rem;
        }
        .topHead{
            text-align: right;
            padding:10px 5%;
            background-color: #09304D;
            color:#fff;
            font-size:1.5rem;
        }
        .topHead>a{
            color:#fff;
            font-size:1.5rem;
        }
        @media screen and (max-width: 750px){
            .topHead{
                padding:10px 0;
            }
            .container{
                padding-left:0;
                padding-right:0;
            }
        }
    </style>
</head>

<body>



<div class="container">

<body>
<div class="topHead">
    <div class="mainPage">
        <a href="<?php echo url('index/index'); ?>">官方首页</a>
        <a href="<?php echo url('bbs/index'); ?>">官方论坛</a>
    </div>
    <?php if(session('user_name')): ?>
    欢迎您:<?php echo session('user_name'); ?>|<a href="<?php echo url('login/logout'); ?>">退出</a>
    <?php else: ?>
    <a href="<?php echo url('login/index'); ?>">[登录]</a>
    <a href="<?php echo url('register/index'); ?>">[免费注册]</a>
    <?php endif; ?>
</div>

    <div class="match">
        <div class="row">
            <div class="col-xs-5">
                <img src="<?php echo $info['team1']['timage']; ?>" class="img-responsive" alt="<?php echo $info['team1']['tname']; ?>"/>
                <span><?php echo $info['team1']['tname']; ?></span>
            </div>
            <div class="col-xs-2">
                <b><img src="__STATIC__/index/image/VS.png" alt=""/></b>
            </div>
            <div class="col-xs-5">
                <img src="<?php echo $info['team2']['timage']; ?>" class="img-responsive" alt="<?php echo $info['team2']['tname']; ?>"/>
                <span><?php echo $info['team2']['tname']; ?></span>
            </div>
        </div>
        <h3>比赛竞猜</h3>
        <ul class="row">
            <li class="col-xs-4">
                <span>总共下注</span>
                <p><?php echo $allItemNum; ?>注</p>
            </li>
            <li class="col-xs-4">
                <span>总下注额</span>
                <p><?php echo $allMoneyNum; ?></p>
            </li>
            <li class="col-xs-4">
                <span>截止时间</span>
                <p><?php echo date("Y-m-d H:i:s",$info['endtime']); ?></p>
            </li>
        </ul>
        <?php if(!empty($item)): if(is_array($item) || $item instanceof \think\Collection || $item instanceof \think\Paginator): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <div class="winner" data-content="<?php echo $v['gues_name']; ?>" data-peilv="<?php echo $v['peilv']; ?>" data-id="<?php echo $v['gues_id']; ?>">
            <h4><?php echo $v['gues_name']; ?><span>（共<?php echo $v['num']; ?>人投注）</span></h4>
            <p>
                <a data-id="<?php echo $info['team1']['team_id']; ?>"><?php echo $info['team1']['tname']; ?></a>
                <a data-id="<?php echo $info['team2']['team_id']; ?>"><?php echo $info['team2']['tname']; ?></a>
            </p>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>


</div>
<!--遮罩层-->
<div class="cover">
    <div class="cover_box">
        <h3>
            投注<a class="cover_close"></a>
        </h3>
        <div class="cover_head">
            <p class="question"><span></span>（Lorem Ipsum 1:0 胜者组优势）</p>
            <p class="myChose"></p>
            <p class="answer" style="color: red;text-align: center;font-size: 14px;"></p>
            <div class="howMuch">
                <i>投注&nbsp;&nbsp;|</i>
                <input name="price" type="text" onkeyup="myNum()" placeholder="投注数量" maxlength="5"/>
            </div>
            <span id="win">
                可赢积分：<b>0</b>
            </span>
            <span id="gold">当前积分： <?php echo $intgral; ?></span>
            <div class="tz_btn">
                <a>投注</a>
            </div>
            <input type="hidden" name="team" value=""/>
            <input type="hidden" name="gues_id" value=""/>
        </div>
    </div>
</div>

<div class="copyRight">
    <p>Copyright © 2017 xxxxxx网络科技有限公司版权所有</p>
    <p>xxICP备xxxxxxxxx号 企业营业执照xxxxxxxxxxxxxxxx</p>
</div>

<footer>
    <div class="foot col-xs-12">
        <a href="<?php echo url('index/index'); ?>" class="col-xs-3">主页</a>
        <a href="<?php echo url('guessing/index'); ?>" class="col-xs-3">竞猜大厅</a>
        <a href="<?php echo url('shop/index'); ?>" class="col-xs-3">兑换中心</a>
        <?php if(session('user_id')==''): ?>
        <a href="" class="col-xs-3" id="ss">个人中心</a>
        <?php else: ?>
        <a href="<?php echo url('userinfo/index'); ?>" class="col-xs-3">个人中心</a>
        <?php endif; ?>
    </div>
</footer>
<script src="__STATIC__/index/js/jquery-1.11.3.min.js"></script>
<script src="__STATIC__/index/js/bootstrap.min.js"></script>



</body>

<script>

    $("#ss").click(function () {
        confirm('亲，需登录才能查看哦！')
    })
</script>

</html>
<script>
    $('#header').load('header.html');
    $('#copyRight').load('copyRight.html');
    $('#footer').load('footer.html');
</script>
<script>
    $(document).ready(function () {
        $(".tz_btn").children("a").on("click",stake);
    })
    $('.cover_close').click(function(){
        $('.cover').css('display','none');
    })
    $('.winner a').click(function(){
        $('.cover').css('display','block');
        var teamName=$(this).html();
        $('.myChose').html(teamName);
        var team_id = $(this).attr("data-id");
        var box = $(this).parents(".winner");
        var content = box.attr("data-content");
        var peilv = box.attr("data-peilv");
        var gues_id = box.attr("data-id");
        $(".answer").html("赔率："+peilv);
        $("input[name='team']").val(team_id);
        $("input[name='gues_id']").val(gues_id);
        $(".question").children("span").text(content);
    });
    function myNum(){
        var val1=$('.howMuch input').val();
        var peilv = $('.winner').attr("data-peilv");
        var val2=$('#win b').html();
        val2=(parseInt(val1) * peilv).toFixed(2);
        if(val2<0){
            $('#win b').html(-val2);
        }else{
            $('#win b').html(val2);
        }
    }
    function stake() {
        var gues_id = $("input[name='gues_id']").val();
        var team_id = $("input[name='team']").val();
        var price = $("input[name='price']").val();
        var data = {gues_id:gues_id,team_id:team_id,price:price};
        $.ajax({
            url:"<?php echo url('index/Match/stake'); ?>",
            data:data,
            type:"post",
            success:function (res) {
                alert(res['msg']);
            }
        })
    }
</script>
