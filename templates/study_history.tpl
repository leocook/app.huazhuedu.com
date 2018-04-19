<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/study_history.css"/>
    <title>{$title}</title>
</head>
<body>
<div class="banner">
    <img src="img/banner_rec.jpg"/>
</div>
<div id="mb" style="display: none">{$mb}</div>
<div id="kuaidi">
    <span>账户：{$mb}</span><span>注册时间：{$ctime}</span>
</div>
{foreach $res as $r}
<div class="wuliu" id="f_{$r}">
    <h2>
        <p>{$r}</p>
    </h2>
    <h1 class="first"><p></p></h1>
    <dl>
        <dt><span>认真学习的一天...</span></dt>
    </dl>
</div>
    <div class="wuliu-down" id="c_{$r}" style="display: none">
    </div>
{/foreach}
<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/study_history.js?v={$smarty.now}"></script>
</body>
</html>
