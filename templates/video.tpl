<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/video.css?v={$smarty.now}"/>

    <title>{$title}</title>
</head>
<body>
<div class="ttop">
    <div class="video">
        <div class="vid-wrapper" id="pplayer">
        </div>
    </div>
    <div class="tab">
        <span>视频章节</span>
        <span>详情介绍</span>
        <div class="clearfix"></div>
</div>

<div id="xiangqing" class="tabcont">
        <div class="pian">
            <div class="pianbt">
                {$name}
            </div>
            <div>
            {foreach $videos as $v}
                {if $v['id']|substr:6:2 eq '00'}
            </div>
                    <div class="zhang">
                        <div class="zhangbt catagory" id="{$v['id']}">
                            <img src="img/zhangbt.png"/>
                            <p>{$v['name']}</p>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="secs" id="list_{$v['id']}">
                {else}
                    <div class="jie list_div" id = "{$v['id']}">
                        <img src="img/bofangsj.png"/>
                        <p>{$v['name']}</p>
                        <div class="clearfix"></div>
                    </div>
                {/if}
            {/foreach}
                    </div>
</div>
    <div class="tmp"></div>
</div>

<div id="xqing" class="tabcont">
    <div class="xqcont">
        <div class="xqbt">
            <img src="img/video_j.png"/>
            <span>建（构）筑物消防员</span>
            <div class="clearfix"></div>
        </div>
        <p>建(构)筑物消防员是指从事建筑物、构筑物消防安全管理、消防安全检查和建筑消防设施操作与维护等工作的人员。</p>
    </div>
    <div class="xqcont">
        <div class="xqbt">
            <img src="img/video_l.png"/>
            <span>工作的主要内容有哪些？</span>
            <div class="clearfix"></div>
        </div>
        <p>
            1、消防安全检查<br/>
            2、消防控制室监控<br/>
            3、建筑消防设施操作与维护<br/>
            4、消防安全管理等</p>
    </div>
    <div class="xqcont">
        <div class="xqbt">
            <img src="img/video_x.png"/>
            <span>初级课程分类</span>
            <div class="clearfix"></div>
        </div>
        <p>基础知识＋初级技能</p>
    </div>
    <div class="xqcont">
        <div class="xqbt">
            <img src="img/video_y.png"/>
            <span>初级课程分类</span>
            <div class="clearfix"></div>
        </div>
        <p>由我们名师倾情讲解，使重点、难点生动易懂;让学习变得简单，毫无压力的通过考试！</p>
    </div>
</div>

<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/popups.js"></script>
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="http://yuntv.letv.com/player/vod/bcloud.js" type="text/javascript" charset="utf-8"></script>
<script src="script/video.js?v={$smarty.now}"></script>
</body>
</html>
