<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:68:"E:\phpStudy\WWW\game\public/../application/index\view\bbs\index.html";i:1507973605;s:70:"E:\phpStudy\WWW\game\public/../application/index\view\public\main.html";i:1507386836;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\header.html";i:1507384265;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\footer.html";i:1507885767;}*/ ?>
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
    @media screen and (max-width: 992px){
        .carousel{
            width:100%;
        }
        .activity{
            display: none;
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

    <section class="clear">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
			 <!--  <li data-target="#carousel-example-generic" data-slide-to="1" -class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" -class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3" -class="active"></li>-->
			<?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): if( count($banner)==0 ) : echo "" ;else: foreach($banner as $key=>$vo): ?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $key; ?>" ></li>
             
           <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="carousel-inner" role="listbox">
			<?php if(is_array($banner) || $banner instanceof \think\Collection || $banner instanceof \think\Paginator): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <div class="item <?php if($i==1): ?>active<?php endif; ?>" >
                    <img src="<?php echo $vo['banner_image']; ?>" alt="...">
                </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="activity">
            <h4>最新帖子</h4>
            <?php if(is_array($select) || $select instanceof \think\Collection || $select instanceof \think\Paginator): $i = 0; $__LIST__ = $select;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <p><a href="<?php echo url('bbs/note'); ?>">【关于<?php echo $vo['message_title']; ?>的一些小细节】</a></p>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </section>
    <div class="bbs_box">
        <header>
            <h3>
                <a href="">社区广场</a>
                <a class="change"><img src="__STATIC__/index/image/cate_fold.gif" alt=""/></a>
            </h3>
        </header>
        <ul class="row">
            <li class="col-xs-12 col-md-4">
                <a href="">
                    <img src="__STATIC__/index/image/01.gif" alt=""/>
                    <b>社区服务</b>
                    <p>投诉、勋章、交易、桃子</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-4">
                <a href="">
                    <img src="__STATIC__/index/image/02.gif" alt=""/>
                    <b>管理基地</b>
                    <p>管理议事、经验交流场地</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-4">
                <a href="">
                    <img src="__STATIC__/index/image/公告.png" alt=""/>
                    <b>社区公告</b>
                    <p>最新消息</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="bbs_box">
        <header>
            <h3>
                <a href="">热门游戏</a>
                <a class="change"><img src="__STATIC__/index/image/cate_fold.gif" alt=""/></a>
            </h3>
        </header>
        <ul class="row">
		  <?php if(session('user_id')==''): ?>
            <li class="col-xs-12 col-md-3" id='ww'>
                <a href="">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
			<?php else: ?>
			   <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('bbs/detail'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
			<?php endif; ?>
            <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('detail/index'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('detail/index'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('detail/index'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('detail/index'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('detail/index'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('detail/index'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
            <li class="col-xs-12 col-md-3">
                <a href="<?php echo url('detail/index'); ?>">
                    <img src="__STATIC__/index/image/lol.gif" alt=""/>
                    <b>英雄联盟</b>
                    <p>Dota原版人马倾力打造</p>
                </a>
            </li>
        </ul>
    </div>

</div>

<script>
$(function($){
    $('.change').click(function(){
        var fold="image/cate_fold.gif";
        var open="image/cate_open.gif";
        var src=$(this).children().attr('src');
        if(src==fold){
            $(this).children().attr('src',open);
        }else{
            $(this).children().attr('src',fold);
        }
        $(this).parent().parent().siblings().fadeToggle();
    })
});
  $('#ww').click(function(){

            confirm('需登录才能购买哦')
        });
        </script>
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