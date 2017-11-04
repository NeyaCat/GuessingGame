<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\phpStudy\WWW\game\public/../application/index\view\index\ajax_matchs.html";i:1508349104;}*/ ?>
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
    <?php if(is_array($matchs) || $matchs instanceof \think\Collection || $matchs instanceof \think\Paginator): $i = 0; $__LIST__ = $matchs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
        <tr style="height: 115px;">
            <td>
                <a href="<?php echo url('match/index',['id'=>$v['matchs_id']]); ?>">
                    <div>
                        <div style="width:90px;height:90px;margin: 0 auto;"><img src="<?php echo $v['team1']['timage']; ?>" alt="<?php echo $v['team1']['tname']; ?>" class="img-responsive"/></div>
                        <b><?php echo $v['team1']['tname']; ?></b>
                    </div>
                    <i>VS</i>
                    <div>
                        <div style="width:90px;height:90px;margin: 0 auto;"><img src="<?php echo $v['team2']['timage']; ?>" alt="<?php echo $v['team2']['tname']; ?>" class="img-responsive"/></div>
                        <b><?php echo $v['team2']['tname']; ?></b>
                    </div>
                </a>
            </td>
            <td>
                <span><?php echo matchs_stat_qian($v['status']); ?></span>
            </td>
            <td>
                <span><?php echo date("Y-m-d H:i:s",$v['starttime']); ?></span>
            </td>
            <td>
                <span><?php echo date("Y-m-d H:i:s",$v['endtime']); ?></span>
            </td>
        </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>

    <!--<tr style="height: 115px;">-->
        <!--<td>-->
            <!--<a href="<?php echo url('match/index'); ?>">-->
                <!--<div>-->
                    <!--<img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>-->
                    <!--<b>SKT</b>-->
                <!--</div>-->
                <!--<i>VS</i>-->
                <!--<div>-->
                    <!--<img src="__STATIC__/index/image/home_06.jpg" alt="" class="img-responsive"/>-->
                    <!--<b>SKT</b>-->
                <!--</div>-->
            <!--</a>-->
        <!--</td>-->
        <!--<td>-->
            <!--<span>进行中</span>-->
        <!--</td>-->
        <!--<td>-->
            <!--<span>2018-8-16 15:05</span>-->
        <!--</td>-->
    <!--</tr>-->

    </tbody>
</table>