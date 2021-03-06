<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"F:\www\game\public/../application/index\view\login\index.html";i:1507378179;}*/ ?>
<!DOCTYPE html>
<html>
<head lang="zh-cn">
    <meta charset="UTF-8">
    <!--2 viewport-->
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <!--3、x-ua-compatible-->
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title></title>
    <!--4、引入两个兼容文件-->
    <!--[if lt IE 9]>
    <script src="__STATIC__/index/__STATIC__/index/js/html5shiv.min.js"></script>
    <script src="__STATIC__/index/__STATIC__/index/js/respond.min.js"></script>
    <![endif]-->
    <!--6、引入 bootstrap.css-->
    <link rel="stylesheet" href="__STATIC__/index/css/bootstrap.min.css">
</head>
<style>
    html{
        margin:0;
        padding:0;
    }
    a{
        text-decoration:none;
        color:red;
    }
    .d2{
        margin-top:5%;
        background-color: #000;
        opacity: 0.7;
    }
    .d1{
        position:absolute;
        left:0px;
        top:0px;
        width:100%;
        height:100%;
        z-index:-1;
    }
    .tou1{
        width:100%;
        height:100px;
        margin-top:3%;
    }
    .tou1 p{
        text-align: center;
        font-size:14px;
    }
    .tou1 p img{
        width:100px;
        height:100px;
        border-radius:50%;
        border:1px solid #aaa;
    }
    .de{
        width:80%;
        margin:0 auto;
        margin-top:3%;
        color: #fff;
        text-align: center;
    }
    .de span{
        font-size:30px;
    }
    .login{
        margin-top:5%;
        color:#fff;
        position: relative;
    }
    .login input{
        height:40px;
        border-radius:10px;
    }
    .login .checkbox .a{
        margin-left:19%;
    }
    .login .a1{
        color:#fff;
        position: absolute;
        right: 0;
    }
    .btn{
        width:100%;
        height:40px;
        background:#343B3E;
        color:#fff;
    }
    .btn03{
        height: 35px;
        background: #464645;
        color: #fff;
        border-radius: 30px;
        margin-top: 30px;
    }
    .row{
        margin:0;
    }
    .la1{
        position: absolute;
        top: 11px;
        left: 6px;
        color: #000;
    }
    input::-webkit-input-placeholder, textarea::-webkit-input-placeholder {
        color: #000;
    }
</style>
<body>
<div class="d1"><img src="__STATIC__/index/images/denglu-1.png" width="100%" height="100%"/></div>
<div class="row">
    <div class="d2 col-lg-6 col-lg-offset-3">
        <div class="tou1">
            <p><img src="__STATIC__/index/img/LOGO.jpg" alt=""></p>
        </div>
        <div class="de">
            <span>◆&nbsp;&nbsp;&nbsp;用户登录&nbsp;&nbsp;&nbsp;◆</span>
        </div>
        <div class="login">
            <form class="form-horizontal" method="post" action="<?php echo url('login/index'); ?>">
                <div class="form-group">
                    <div class="col-sm-10 col-lg-6 col-lg-offset-3 col-md-4 col-xs-12">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="账号" name="user_name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-lg-6 col-lg-offset-3 col-md-4 col-xs-12">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="user_password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-10 col-lg-offset-3 col-lg-6">
                        <div class="checkbox">

                            <div class="col-sm-offset-1 col-sm-3 col-lg-3 col-lg-offset-1" style="text-align: right;position: absolute;right: 0;top: 6px;">
                                <a href="">忘记密码</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10  col-lg-6 col-lg-offset-3">
                        <button type="submit" class="btn">登录</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10  col-lg-6 col-lg-offset-3">
                        <a type="submit" href="<?php echo url('register/index'); ?>"  class="btn btn03">创建用户</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10  col-lg-2 col-lg-offset-7" style="margin-top: 6%;margin-bottom: 5%;text-align: right;">
                        <a href="<?php echo url('index/index'); ?>" style="color: #fff;">返回首页</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="__STATIC__/index/js/jquery-1.11.3.min.js"></script>
<script src="__STATIC__/index/js/bootstrap.min.js"></script>
<script>
    $('#footer').load('footer.html');
</script>
</body>
</html>