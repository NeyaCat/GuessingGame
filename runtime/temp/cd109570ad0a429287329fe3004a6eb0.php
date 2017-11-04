<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"F:\www\game\public/../application/index\view\index\index.html";i:1507888879;s:61:"F:\www\game\public/../application/index\view\public\main.html";i:1507386836;s:63:"F:\www\game\public/../application/index\view\public\header.html";i:1507384265;s:63:"F:\www\game\public/../application/index\view\public\footer.html";i:1507885767;}*/ ?>
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
        <?php if(session('user_id')==''): ?>
        <li id="sss"><a href="" >我的竞猜</a></li>
        <?php else: ?>
        <li><a href="<?php echo url('userinfo/index'); ?>" >我的竞猜</a></li>
<?php endif; ?>
    </ul>
</nav>
<!--全部项目和news-->
<div class="big_box">
    <div class="news row">
        <div class="btn-group col-xs-3 col-md-1" id="all_btn">
            <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle">全部项目<span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li><a href="#">LOL</a></li>
                <li><a href="#">Dota2</a></li>
                <li><a href="#">DNF</a></li>
            </ul>
        </div>
        <button type="button" class="col-xs-2 col-md-1">已结束</button>
        <div id="demo" class="col-md-6">
            <ul id="demo1">
                <li>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头70</li>
                <li>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头70</li>
                <li>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头70</li>
                <li>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头70</li>
                <li>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头70</li>
                <li>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头70</li>
                <li>恭喜玩家：lh91807963609在ProDota竞猜成功赢取木头70</li>
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
        <div class="col-xs-12 col-md-9">
            <table class="table table-hover" id="table_title">
                <thead>
                <tr>
                    <th>对阵</th>
                    <th>状态</th>
                    <th>比赛时间</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href="<?php echo url('match/index'); ?>">
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                            <i>VS</i>
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                        </a>
                    </td>
                    <td>
                        <span>进行中</span>
                    </td>
                    <td>
                        <span>2018-8-16 15:05</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="<?php echo url('match/index'); ?>">
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                            <i>VS</i>
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                        </a>
                    </td>
                    <td>
                        <span>进行中</span>
                    </td>
                    <td>
                        <span>2018-8-16 15:05</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="<?php echo url('match/index'); ?>">
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                            <i>VS</i>
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                        </a>
                    </td>
                    <td>
                        <span>进行中</span>
                    </td>
                    <td>
                        <span>2018-8-16 15:05</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="<?php echo url('match/index'); ?>">
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                            <i>VS</i>
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                        </a>
                    </td>
                    <td>
                        <span>进行中</span>
                    </td>
                    <td>
                        <span>2018-8-16 15:05</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="<?php echo url('match/index'); ?>">
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                            <i>VS</i>
                            <div>
                                <img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>
                                <b>SKT</b>
                            </div>
                        </a>
                    </td>
                    <td>
                        <span>进行中</span>
                    </td>
                    <td>
                        <span>2018-8-16 15:05</span>
                    </td>
                </tr>
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
                <h3>这里就是文章的标题</h3>
                <p>分析师推荐 <span>推荐时间：2017-08-14 15:47:31</span></p>
                <p>
                    这里是一大串文章内容 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid dolore, facere incidunt quibusdam quisquam sit ut. Animi eligendi eum exercitationem modi nam optio quia velit voluptate. Doloremque, optio quidem.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                </p>
            </div>
            <div class="bangInfo">
                <h3>积分兑换</h3>
                <p>xxxxxxxxxx</p>
                <p>
                    这里是一大串文章内容 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid dolore, facere incidunt quibusdam quisquam sit ut. Animi eligendi eum exercitationem modi nam optio quia velit voluptate. Doloremque, optio quidem.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet architecto asperiores beatae dolorum eaque est, exercitationem harum, illum iusto porro praesentium quae quo recusandae rerum sit tempore tenetur vero
                </p>
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
    var speed = 100;
    window.onload = function() {
        var demo = document.getElementById("demo");
        var demo2 = document.getElementById("demo2");
        var demo1 = document.getElementById("demo1");
        demo2.innerHTML = demo1.innerHTML
        function Marquee() {
            if (demo.scrollTop >= demo1.offsetHeight) {
                demo.scrollTop = 0;
            } else {
                demo.scrollTop = demo.scrollTop + 1;
            }
        }
        var MyMar = setInterval(Marquee, speed)
    }
$("#sss a").click(function () {
    confirm('亲，需登录才能查看哦！')
})
</script>