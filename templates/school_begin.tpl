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
    <img src="img/banner_kaiban.jpg"/>
</div>
{foreach $info as $i}
<div class="shift" id = "{$i['id']}">
    {if $i['is_closed'] === '1'}
        <p><img src="img/qun.png"/>{$i['nam']}</p>
        <span class="full">已满</span><div id="f_{$i['id']}" style ="display: none">{$i['is_full']}</div>
        <div class="clearfix"></div>
    {else}
        <p><img src="img/qun01.png"/>{$i['nam']}</p>
       <span class="nofull">未满</span><div id="f_{$i['id']}" style ="display: none">{$i['is_full']}</div>
        <div class="clearfix"></div>
    {/if}
</div>
<div class="unfold" id="li_{$i['id']}">
    <div class="hang"><p>授课地点</p><span>{$i['addr']}</span><div class="clearfix"></div></div>
    <div class="hang"><p>开始时间</p><span>{$i['start']}</span><div class="clearfix"></div></div>
    <div class="hang"><p>结束时间</p><span>{$i['end']}</span><div class="clearfix"></div></div>
    <div class="hang"><p>备注信息</p><span>{$i['des']}</span><div class="clearfix"></div></div>
</div>
{/foreach}
<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="script/school_begin.js?v={$smarty.now}"></script>
</body>
</html>
