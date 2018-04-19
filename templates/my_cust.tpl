<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/school_begin.css"/>
    <title>{$title}</title>
</head>
<body>
<div class="banner">
    <img src="img/banner_cust.jpg"/>
</div>
{foreach $info as $i}
    <div class="shift" id = "{$i['id']}">
        <p><img src="img/qun01.png"/>
                {$i['nam']}
        </p>
        <span class="nofull">{$i['id_num']}</span>
        <div class="clearfix"></div>
    </div>
    <div class="unfold" id="li_{$i['id']}">
        <div class="hang"><p>个人手机</p><span>{$i['mb']}</span><div class="clearfix"></div></div>
        <div class="hang"><p>固定电话</p><span>{$i['tel']}</span><div class="clearfix"></div></div>
        <div class="hang"><p>单位名称</p><span>{$i['company']}</span><div class="clearfix"></div></div>

        {if $i['class_name'] neq ''}
            <div class="hang"><p>{$i['class_name']}</p>
                <span>付款:{$stat[$i['pay_stat']]}&nbsp;&nbsp;&nbsp;&nbsp;排班:{$stat[$i['pass_stat']]}</span>
                <div class="clearfix"></div>
            </div>

        <div class="hang"><p>备注信息</p><span class="des">{$i['des']}</span><div class="clearfix"></div></div>
        <div class="hang last" id="btn_{$i['id']}">
            <button class='btn ' id="rec_{$i['id']}_{$i['mb']}_{$i['class_id']}">学习记录</button>
            <button class='btn add' id="reg_{$i['id']}_{$i['mb']}_{$i['class_id']}">报班</button>
            <button class='btn ed' id="ed_{$i['id']}_{$i['mb']}_{$i['class_id']}">编辑</button>
            <button class='btn del' id="del_{$i['id']}_{$i['mb']}_{$i['class_id']}">删除班次</button>
            <div class="clearfix"></div>
        </div>
        {else}
            <div></div>
            <div class="hang"><p>备注信息</p><span class="des">{$i['des']}</span><div class="clearfix"></div></div>
            <div class="hang last" id="btn_{$i['id']}">
                <button class='btn ' id="rec_{$i['id']}_{$i['mb']}_{$i['class_id']}">学习记录</button>
                <button class='btn add' id="reg_{$i['id']}_{$i['mb']}_{$i['class_id']}">报班</button>
                <button class='btn ed' id="ed_{$i['id']}_{$i['mb']}_{$i['class_id']}">编辑</button>
                <div class="clearfix"></div>
            </div>
        {/if}
    </div>
{/foreach}
<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="script/my_cust.js?v={$smarty.now}"></script>
</body>
</html>
