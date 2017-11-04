<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"E:\phpStudy\WWW\game\public/../application/index\view\shop\index.html";i:1507885666;s:70:"E:\phpStudy\WWW\game\public/../application/index\view\public\main.html";i:1507386836;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\header.html";i:1507384265;s:72:"E:\phpStudy\WWW\game\public/../application/index\view\public\footer.html";i:1507885767;}*/ ?>
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
    @media (max-width: 750px){
        #nav_list>ul>li>ul>li{
            text-align: left;
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

    <nav class="navbar navbar-default">
        <div class="container-fluid row" id="nav_list">
            <?php if(is_array($cate) || $cate instanceof \think\Collection || $cate instanceof \think\Paginator): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <ul class="nav navbar-nav col-xs-3" id="">
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"
                       onclick="member_del(this,'<?php echo url('shop/cate'); ?>','<?php echo $vo['goods_cid']; ?>')"><?php echo $vo['goods_title']; ?></a>
                    <ul class="dropdown-menu" id="cates">


                    </ul>
                </li>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
    </nav>
    <div id="shop_content">
        <div class="row" id="detail">
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="col-xs-6 col-md-3">
                <a href="">
                    <div class="thumbnail">
                        <img src="<?php echo $vo['goods_image']; ?>"style="width: 245px;height:150px">
                        <div class="caption">
                            <h5><?php echo $vo['goods_title']; ?></h5>
                            <p><b><?php echo $vo['goods_intgral']; ?>积分</b><span>库存<?php echo $vo['goods_count']; ?>件</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <nav aria-label="Page navigation" id="page">
            <?php echo $data->render(); ?>
        </nav>
    </div>
</div>

<div id="footer"></div>
<script>
    var SCOPE = {
        'detail' : "<?php echo url('shop/detail'); ?>",
    };
    //获取分类下的标题
    function member_del(obj,url,id){
        //alert(id)
        $.ajax({
            type: 'POST',
            url: url,
            data:{'id':id},
            dataType: 'json',
            success: function(msg){
                $str="";
                $(msg).each(function(i){
                    $str+='<li><a href="javascript:;" onclick="shopcateid('+msg[i].goods_cid+')")>'+msg[i].goods_title+'</a></li>';
                });
                $('.dropdown-menu').html($str);

                if(msg==''){
                    $empty = '<li><a href="#">'+没有数据+'</a></li>';
                    $('.dropdown-menu').html($empty);
                }
            },

        });

    }
  //获取标题下的具体详细内容
    function shopcateid(id){
        var url = SCOPE.detail;
        $.ajax({
        type: 'POST',
        url: url,
        data:{'id':id},
        dataType: 'json',
        success: function(msg){
                var data = msg.data;
                var $str ="";
                $(data).each(function(i){
                    $str+='<div class="col-xs-6 col-md-3">';
                    $str+='<a href="">';
                    $str+='<div class="thumbnail">';
                    $str+='<img src="'+this.goods_image+'"style="width: 245px;height:150px">';
                    $str+='<div class="caption">';
                    $str+='<h5>'+this.goods_title+'</h5>';
                    $str+='<p><b>'+this.goods_intgral+'积分</b><span>库存'+this.goods_count+'件</span></p>';
                    $str+='</div>';
                    $str+='</div>';
                    $str+='</a>';
                    $str+='</div>';
                });
                $("#detail").html($str);//更新到html
            if(data==''){
                $empty = '<div class="row" style="height: 500px;width: 1140px;border: 1px solid #e3e3e3;text-align: center"><h2>没有数据...</h2></div>';
                $('#detail').html($empty);
            }
        },

    });
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