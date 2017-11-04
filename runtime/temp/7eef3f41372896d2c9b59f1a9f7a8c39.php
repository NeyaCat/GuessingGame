<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:70:"E:\phpStudy\WWW\game\public/../application/index\view\index\index.html";i:1508349059;s:70:"E:\phpStudy\WWW\game\public/../application/index\view\public\main.html";i:1507386836;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\header.html";i:1507384265;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\footer.html";i:1507885767;}*/ ?>
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

<div class="online">
    <div>
        <span>已有</span>
        <b>2</b>
        <b>9</b>
        <b>7</b>
        <b>7</b>
        <b>6</b>
        <b>5</b>
        <span>人参加</span>
    </div>
    <span>| 竞猜游戏</span>
</div>
<!--banner部分-->
<section class="clear" style="background: #0d0d0d">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="__STATIC__/index/image/banner.png" alt="...">
            </div>
            <div class="item">
                <img src="__STATIC__/index/image/banner.png" alt="...">
            </div>
            <div class="item">
                <img src="__STATIC__/index/image/banner.png" alt="...">
            </div>
            <div class="item">
                <img src="__STATIC__/index/image/banner.png" alt="...">
            </div>
        </div>
    </div>
    <div class="activity">
        <img src="__STATIC__/index/image/home-1.png" alt="" class="img-responsive"/>
        <p>活动：2017.8.15-2017.8.31</p>
        <p>xxxxxxxxxxxxxxxxxxxxxxxxx</p>
    </div>
</section>
<!--导航-->
<nav>
    <ul class="nav nav-justified">
        <li><a href="<?php echo url('bbs/index'); ?>">论坛</a></li>
        <li><a href="<?php echo url('guessing/index'); ?>">竞猜大厅</a></li>
        <li><a href="<?php echo url('shop/index'); ?>">兑换中心</a></li>
        <li><a href="<?php echo url('userinfo/index'); ?>">我的竞猜</a></li>
    </ul>
</nav>
<!--全部项目和news-->
<div class="big_box">
    <div class="news row">
        <div class="btn-group col-xs-3 col-md-1" id="all_btn1">
            <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">全部项目<span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu1">
                <li data-id="-1"><a href="javascript:;">全部项目</a></li>
                <?php if(is_array($games) || $games instanceof \think\Collection || $games instanceof \think\Paginator): $i = 0; $__LIST__ = $games;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li data-id="<?php echo $vo['game_id']; ?>"><a href="javascript:;"><?php echo $vo['gname']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="btn-group col-xs-3 col-md-1" id="all_btn2">
            <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">全部状态<span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu2">
                <li data-sta="-1"><a href="javascript:;">全部状态</a></li>
                <li data-sta="1"><a href="javascript:;">未开始</a></li>
                <li data-sta="2"><a href="javascript:;">进行中</a></li>
                <li data-sta="3"><a href="javascript:;">已结束</a></li>
            </ul>
        </div>
        <div id="demo" class="col-md-6">
            <ul id="demo1">
                <?php if(is_array($select) || $select instanceof \think\Collection || $select instanceof \think\Paginator): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li><?php echo $vo['notice_content']; ?></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div id="demo2"></div>
        </div>
        <form action="" class="col-xs-6 col-md-3">
            <input type="search" placeholder="请输入搜索内容"/>
        </form>
    </div>
</div>
<!--竞猜内容-->
<div class="content">
    <div class="row">
        <article class="col-xs-3">
            <div class="date">
                <b></b>
                <span>8月15日-8月16日</span>
                <b></b>
            </div>
            <div class="week">
                <ul>
                    <li>
                        <span>周二</span>
                        <b>14<span>(1场)</span></b>
                    </li>
                    <li>
                        <span>周三</span>
                        <b>15<span>(1场)</span></b>
                    </li>
                    <li>
                        <span>周四</span>
                        <b>16<span>(5场)</span></b>
                    </li>
                    <li>
                        <span>周五</span>
                        <b>17<span>(暂无)</span></b>
                    </li>
                    <li>
                        <span>周六</span>
                        <b>18<span>(暂无)</span></b>
                    </li>
                    <li>
                        <span>周日</span>
                        <b>19<span>(暂无)</span></b>
                    </li>
                    <li>
                        <span>周一</span>
                        <b>20<span>(暂无)</span></b>
                    </li>
                </ul>
            </div>
        </article>
        <div class="col-xs-12 col-md-9" id="match_box">
            <table class="table table-hover" id="table_title">
                <thead>
                <tr>
                    <th>对阵</th>
                    <th>状态</th>
                    <th>开始时间</th>
                    <th>结束时间</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($matchs) || $matchs instanceof \think\Collection || $matchs instanceof \think\Paginator): $i = 0; $__LIST__ = $matchs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td>
                        <a href="<?php echo url('match/index',['matchs_id'=>$vo['matchs_id']]); ?>">
                            <div>
                                <div style="width:90px;height:90px;margin: 0 auto;"><img width="90px" src="<?php echo $vo['team1_timage']; ?>" alt="<?php echo $vo['team1_tname']; ?>" class="img-responsive"/></div>
                                <b><?php echo $vo['team1_tname']; ?></b>
                            </div>
                            <i>VS</i>
                            <div>
                                <div style="width:90px;height:90px;margin: 0 auto;"><img width="90px" src="<?php echo $vo['team2_timage']; ?>" alt="<?php echo $vo['team2_tname']; ?>" class="img-responsive"/></div>
                                <b><?php echo $vo['team2_tname']; ?></b>
                            </div>
                        </a>
                    </td>
                    <td>
                        <span><?php echo matchs_stat_qian($vo['status']); ?></span>
                    </td>
                    <td>
                        <span><?php echo date("Y-m-d H:i:s",$vo['starttime']); ?></span>
                    </td>
                    <td>
                        <span><?php echo date("Y-m-d H:i:s",$vo['endtime']); ?></span>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--分析师推荐-->
<div class="bigBang">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <p><span>分析师推荐</span></p>
            <div class="bangInfo">
                <?php if(is_array($analyst) || $analyst instanceof \think\Collection || $analyst instanceof \think\Paginator): $i = 0; $__LIST__ = $analyst;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <h3><?php echo $vo['analyst_title']; ?></h3>
                <p><?php echo $vo['analyst']; ?>分析师推荐 <span>推荐时间：<?php echo date("Y-m-d", $vo['create_time']); ?></span></p>
                <p> <?php echo $vo['analyst_content']; ?></p>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="bangInfo">
                <?php if(is_array($integral) || $integral instanceof \think\Collection || $integral instanceof \think\Paginator): $i = 0; $__LIST__ = $integral;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <h3><?php echo $vo['integral_title']; ?></h3>
                <p><?php echo date("Y-m-d", $vo['create_time']); ?></p>
                <p><?php echo $vo['integral_content']; ?></p>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="col-md-4 ranking">
            <p><a href="" class="on">盈利排行</a><a href="">命中排行</a></p>
            <div class="rankingList">
                <p>
                    <b></b>
                    <img src="__STATIC__/index/image/Dota2.jpg" alt=""/>
                    <span>135xxxxx799_174_682</span>
                    <span>225413.33</span>
                </p>
                <p>
                    <b></b>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799_174</span>
                    <span>22541.33</span>
                </p>
                <p>
                    <b></b>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
                <p>
                    <i>04</i>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
                <p>
                    <i>05</i>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
                <p>
                    <i>06</i>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
                <p>
                    <i>07</i>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
                <p>
                    <i>08</i>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
                <p>
                    <i>09</i>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
                <p>
                    <i>10</i>
                    <img src="__STATIC__/index/image/tu-3.png" alt=""/>
                    <span>135xxxxx799</span>
                    <span>2254.33</span>
                </p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var speed = 100;
    window.onload = function() {
        var demo = document.getElementById("demo");
        var demo2 = document.getElementById("demo2");
        var demo1 = document.getElementById("demo1");
        demo2.innerHTML = demo1.innerHTML;
        function Marquee() {
            if (demo.scrollTop >= demo1.offsetHeight) {
                demo.scrollTop = 0;
            } else {
                demo.scrollTop = demo.scrollTop + 1;
            }
        }
        var MyMar = setInterval(Marquee, speed);
        $(".dropdown-menu1").children("li").on("click",check_game);
        $(".dropdown-menu2").children("li").on("click",check_status);
//
//        ajax_matchs(0);

    };


    function check_game() {
        var box = $(this).parents("#all_btn1");
        var text = $(this).children("a").text();
        box.children("button").html(text+'<span class="caret"></span>');
        var id = $(this).attr("data-id");
        ajax_matchs_game(id);
    }
    function check_status() {
        var box = $(this).parents("#all_btn2");
        var text = $(this).children("a").text();
        box.children("button").html(text+'<span class="caret"></span>');
        var sta = $(this).attr("data-sta");
        ajax_matchs_sta(sta);
    }
    
    function ajax_matchs_game(id) {
        var data = {id:id};
        $.ajax({
            url:"<?php echo url('index/index/ajax_matchs'); ?>",
            data:data,
            type:"post",
            datatype:'json',
            success:function (res) {
                $("#match_box").html(res);

            }
        })
    }

    function ajax_matchs_sta(sta) {
        var data = {sta:sta};
        $.ajax({
            url:"<?php echo url('index/index/ajax_matchs'); ?>",
            data:data,
            type:"post",
            datatype:'json',
            success:function (res) {
                $("#match_box").html(res);

            }
        })
    }
</script>

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