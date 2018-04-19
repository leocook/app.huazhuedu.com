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
        <p><img src="img/qun01.png"/>
            <a>{$i['nam']}</a>
        </p>
        <span class="nofull">招生人数:{$i['count']}人</span>
        <div class="clearfix"></div>
    </div>
    <div class="unfold" id="li_{$i['id']}">
    </div>
{/foreach}
<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/lCalendar.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="script/class_info.js?v={$smarty.now}"></script>
</body>
</html>
