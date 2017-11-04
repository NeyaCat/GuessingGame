<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:64:"F:\www\game\public/../application/index\view\userinfo\index.html";i:1507992722;s:61:"F:\www\game\public/../application/index\view\public\main.html";i:1507386836;s:63:"F:\www\game\public/../application/index\view\public\header.html";i:1507384265;s:63:"F:\www\game\public/../application/index\view\public\footer.html";i:1507885767;}*/ ?>
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
        @media screen and (max-width: 992px) {
            nav{
                display: none;
            }
            .container>ul>li>a{
                font-size:1rem;
                padding:5px;
            }
            .container>.box>.msg>p{
                width:100%;
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

    <h3>个人中心</h3>
    <ul class="nav nav-tabs">
        <li class="active self"><a href="#">我的资料</a></li>
        <li class="pay"><a href="#">充值记录</a></li>
        <li class="jc"><a href="#">竞猜记录</a></li>
        <li class="dh"><a href="#">兑换历史</a></li>
        <li class="zj"><a href="#">收支明细</a></li>
    </ul>
    <div class="box">
        <div class="msg">
            <p>头像：<img src="<?php echo $data['user_head']; ?>" alt=""/></p>
            <p>用户名：<input type="text" placeholder="设置昵称" id="name" value="<?php echo $data['user_name']; ?>"/><button class="btn btn-success" id="btn1">保存</button></p>
            <p>手机号：133xxxxxxxx <span onclick="change()">修改手机</span></p>
            <p>金币：<b id="user_gold"><?php echo $data['user_gold']; ?> </b><span><a href="<?php echo url('pay/index'); ?>">充值金币</a></span></p>
         <!--   <p>积分：<b><?php echo $data['user_intgral']; ?> </b></p>-->
            <p>金币转赠:<input type="text" style="width:62%;" id="present" placeholder="输入对方用户手机号"/>
                <button type="button" id="btn3" class="btn btn-primary" data-toggle="modal" data-target="#myModal">确认</button>
            </p>
            <p>
                收货地址:<input type="text" style="width:62%;" id='address' placeholder="输入兑换物品时的收货地址" value="<?php echo $data['user_address']; ?>">
                <button type="button" class="btn btn-success" id="btn2">保存</button>
            </p>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#success">发起竞猜</button>
            <ul>
                <li>
                    <span>收益</span>
                    <p>0</p>
                </li>
                <li>
                    <span>亏损</span>
                    <p>0</p>
                </li>
                <li>
                    <span>参与竞猜</span>
                    <p>0场</p>
                </li>
                <li>
                    <span>获胜场次</span>
                    <p>0场</p>
                </li>
                <li>
                    <span>胜率</span>
                    <p>0%</p>
                </li>
            </ul>
        </div>
        <div class="pay_history">
            <table class="table">
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>充值数量</th>
                    <th>充值时间</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>这是沸羊羊的感觉</td>
                    <td>xxx</td>
                    <td>2017-8-14 13:02</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="jc_history">
            <table class="table">
                <thead>
                <tr>
                    <th>结果</th>
                    <th>赛事</th>
                    <th>投注</th>
                    <th>回收额</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>赢</td>
                    <td>xxxx</td>
                    <td>1000</td>
                    <td>+1000</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="dh_history">
            <table class="table">
                <thead>
                <tr>
                    <th>时间</th>
                    <th>兑换内容</th>
                    <th>数量</th>
                    <th>消耗</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2017-8-16 09：20</td>
                    <td>xxxxxxx</td>
                    <td>2</td>
                    <td>2000</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="zj_history">
            <table class="table">
                <thead>
                <tr>
                    <th>时间</th>
                    <th>项目</th>
                    <th>收支</th>
                    <th>余额</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2017-8-16 09：20</td>
                    <td>xxxxxxx</td>
                    <td>2</td>
                    <td>xxxxxxxxxxxx</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="self_cover">
    <div class="num_change">
        <div class="close"></div>
        <br/><br/>
        <h1>更换手机号</h1>
        <br/>
        <form action="">
            <div>
                <b>CN>+86</b>
                <input type="text" placeholder="请输入未注册的手机号" maxLength="11"/>
            </div>
            <div>
                <b>验证码</b>
                <input type="text" placeholder="请输入验证码"/>
                <button type="button">发送验证码</button>
            </div>
            <br/><br/>
            <p>确认修改</p>
        </form>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">确认对方信息</h4>
            </div>
            <div class="modal-body">
                <h5>用户名 <span><?php echo $present['user_name']; ?></span></h5>
                <br/>
                <h5>电话号码 <span><?php echo $present['user_tel']; ?></span></h5>
                <br/>
                <div class="form-group">
                    <label for="gold">转赠数量</label>
                    <input type="text" class="form-control" id="gold" placeholder="请输入转赠数量">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="btnn" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" id="btn4">确定</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="success">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3 style="text-align: center">已提交申请</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
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
    var SCOPE = {
        'name_url': "<?php echo url('userinfo/nameEdit'); ?>",
        'address_url': "<?php echo url('userinfo/addressEdit'); ?>",
        'present_url': "<?php echo url('userinfo/present'); ?>",
        'num_url': "<?php echo url('userinfo/presentNum'); ?>",
    };
    $('#btnn').click(function () {
        window.history.go(0);
        return false;
    })
    $('#btn1').click(function () {
        //alert(1)
        var name = $('#name').val();
        var url = SCOPE.name_url;
        var id = <?php echo session('user_id'); ?>;
        var postdata = {'user_name':name, 'user_id':id,};
        $.ajax({
            type:"POST",
            data :postdata,
            url:url,
            dataType:"json",
            success:function(result){
                if(result.code == 0)
                {
                   // alert(ddd)
                    location.href=result.data;
                }else {
                    alert(result.msg);
                }
            }
        })

    })
    $('#btn2').click(function () {
        //alert(1)
        var address = $('#address').val();
        var url = SCOPE.address_url;
        var id = <?php echo session('user_id'); ?>;
        var postdata = {'user_address':address, 'user_id':id,};
        $.ajax({
            type:"POST",
            data :postdata,
            url:url,
            dataType:"json",
            success:function(result){
                if(result.code == 0)
                {
                    location.href=result.data;
                }else {
                    alert(result.msg);
                }
            }
        })

    })
    $('#btn3').click(function () {
        //alert(1)
        var present = $('#present').val();
        var url = SCOPE.present_url;
        //alert(url)
        var id = <?php echo session('user_id'); ?>;
        var postdata = {'gold_present':present, 'user_id':id,};
        $.ajax({
            type:"POST",
            data :postdata,
            url:url,
            dataType:"json",
            success:function(result){
                if(result.code == 0)
                {
                    confirm(result.msg);window.history.go(0);
                    return false;
                }
            }
        })

    })
    $('#btn4').click(function () {
        //alert(1)
        var gold = $('#gold').val();
        var number = $('#user_gold').val();

        var url = SCOPE.num_url;
        var id = <?php echo session('user_id'); ?>;

        var postdata = {'gold_num':gold, 'user_id':id,};
        $.ajax({
            type:"POST",
            data :postdata,
            url:url,
            dataType:"json",
            success:function(result){
                if(result.code == 1)
                {
                    confirm(result.msg);window.history.go(0);
                    return false;
                }else{
                    confirm(result.msg)
                }
            }
        })

    })
    $('ul.nav-tabs>li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    })
</script>
<script>
    $('.self').click(function(){
        console.log('sss')
        $('.msg').css('display','block');
        $('.msg').siblings().css('display','none');
    });
    $('.pay').click(function(){
        $('.pay_history').css('display','block');
        $('.pay_history').siblings().css('display','none');
    });
    $('.jc').click(function(){
        $('.jc_history').css('display','block');
        $('.jc_history').siblings().css('display','none');
    });
    $('.dh').click(function(){
        $('.dh_history').css('display','block');
        $('.dh_history').siblings().css('display','none');
    });
    $('.zj').click(function(){
        $('.zj_history').css('display','block');
        $('.zj_history').siblings().css('display','none');
    })
</script>
<script>
    $('#header').load('header.html');
    $('#footer').load('footer.html');
</script>
<script>
    function change(){
        $('.self_cover').css('display','block');
    }
    $('.close').click(function(){
        $('.self_cover').css('display','none');
    })
</script>
