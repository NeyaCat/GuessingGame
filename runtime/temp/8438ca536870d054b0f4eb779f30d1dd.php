<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"E:\WWWRoot\game\public/../application/index\view\guessing\index.html";i:1507388778;s:65:"E:\WWWRoot\game\public/../application/index\view\public\main.html";i:1507386836;s:67:"E:\WWWRoot\game\public/../application/index\view\public\header.html";i:1507384265;s:67:"E:\WWWRoot\game\public/../application/index\view\public\footer.html";i:1507885767;}*/ ?>
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


    <style>
        @media (max-width: 750px) {
            #table_title th{
                font-size:1rem;
            }
            #table_title tbody b{
                font-size: 1.6rem;
            }
            nav{
                display: none;
            }
        }
        @media screen and (max-width: 992px){
            nav{
                display:none;
            }
        }
    </style>
    
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

    <nav style="background: #0b385a;">
        <ul class="nav nav-justified">
            <li><a href="<?php echo url('bbs/index'); ?>">论坛</a></li>
            <li><a href="<?php echo url('guessing/index'); ?>">竞猜大厅</a></li>
            <li><a href="<?php echo url('shop/index'); ?>">兑换中心</a></li>
            <li><a href="<?php echo url('userinfo/index'); ?>">我的竞猜</a></li>
        </ul>
    </nav>
    <table class="table table-hover table-bordered" id="table_title">
        <thead>
        <tr>
            <th>赛事</th>
            <th>队伍</th>
            <th>状态</th>
            <th>时间</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        <tr>
            <td>
                <img src="__STATIC__/index/image/LOL.png" alt="" class="img-responsive"/>
                <b>LPL</b>
            </td>
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
                <b>未开始</b>
            </td>
            <td>
                <b>2017.08.22 14:00</b>
            </td>
        </tr>
        </tbody>
    </table>
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
