<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/reg.css"/>
    <script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
    <title>班次录入</title>
</head>
<body>
<div class="banner">
    <img src="img/banner_in_class.jpg"/>
</div>

<div class="row">
    <p><img src="img/shenqing09.png"/>名称</p>
    <input type="text" placeholder="必填" id="c_nam" value = "{$info['nam']}" />
    <div class="clearfix"></div>
</div>
<div class="row">
    <p><img src="img/shenqing10.png"/>人数</p>
    <input type="text" placeholder="必填" id="c_count" value = "{$info['count']}" />
    <div class="clearfix"></div>
</div>


<div class="row row2" style="margin-top: .16rem;">
    <p><img src="img/shenqing11.png"/>开始时间</p>
    <input type="date" name="input_date" id="c_start" value = "{$info['start']}" />
    <div class="clearfix"></div>
</div>
<div class="row row2">
    <p><img src="img/shenqing12.png"/>结束时间</p>
    <input type="date" name="input_date" id="c_end" value = "{$info['end']}" />
    <div class="clearfix"></div>
</div>


<div class="row" style="margin-top: .16rem;">
    <p><img src="img/shenqing04.png"/>上课地址</p>
    <input type="text" id="c_addr" value = "{$info['addr']}"/>
    <div class="clearfix"></div>
</div>
<div class="row row3">
    <p><img src="img/shenqing13.png"/>是否关闭</p>
    <select id="c_closed">
        {if $info['is_closed']==1}
        <option value="1" selected = 'selected'>是</option>
        <option value="0">否</option>
        {else}
        <option value="1" >是</option>
        <option value="0" selected = 'selected'>否</option>
        {/if}

    </select>
    <div class="clearfix"></div>
</div>
<div class="row" style="padding-bottom: 0;margin-bottom: 0">
    <p><img src="img/shenqing08.png"/>备注</p>
    <div class="clearfix"></div>
</div>

<div class="row1">
    <textarea  rows="6" cols="" id="c_des">
        {$info['des']}
    </textarea>
</div>
<div class="cid" style="display: none">{$info['id']}</div>

<button class="sub">提 交</button>
<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/lCalendar.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/ed_class.js?v={$smarty.now}" type="text/javascript" charset="utf-8"></script>
</body>
</html>
