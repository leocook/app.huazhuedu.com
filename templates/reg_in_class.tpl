<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/reg_in_class.css"/>
    <script src="script/basic.js" type="text/javascript" charset="utf-8"></script>

    <title>{$title}</title>
</head>
<body>
<div class="banner">
    <img src="img/reg.jpg"/>
</div>

<div class="row">
    <span>是否住宿</span>
    <div class="right">
        <label for="z_01">是</label><input type="radio" name="z" id="z_01" value="1"  class = "radio_z" />
        <label for="z_02">否</label><input type="radio" name="z" id="z_02" value="0"  class = "radio_z" />
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row rt">
    <span>单间/双间</span>
    <div class="right">
        <label for="d_01">单</label><input type="radio" name="d" id="d_01" value="1" />
        <label for="d_02">双</label><input type="radio" name="d" id="d_02" value="2" />
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row">
    <span>是否管饭</span>
    <div class="right">
        <label for="c_01">是</label><input type="radio" name="c" id="" value="1" />
        <label for="c_02">否</label><input type="radio" name="c" id="" value="0" />
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>

<div class="rt">
    <div class="row row2" style="margin-top: .18rem;">
        <span>开始日期</span>
        <input type="date"  name="input_date" id="z_start" value=""/>
        <div class="clearfix"></div>
    </div>
    <div class="row row2">
        <span>结束日期</span>
        <input type="date"  name="input_date" id="z_end"/>
        <div class="clearfix"></div>
    </div>
</div>
<div class="row row3">
    <span>报选班次</span>

    <select id="z_cls">
        {foreach $info as $i}
        <option value="{$i['id']}">{$i['nam']}</option>
        {/foreach}
    </select>
    <div class="clearfix"></div>
</div>
<div class="uid" style="display: none">{$uid}</div>
<button class="sub">提 交</button>
<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/lCalendar.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/reg_in_class.js?v={$smarty.now}" type="text/javascript" charset="utf-8"></script>
</body>
</html>
