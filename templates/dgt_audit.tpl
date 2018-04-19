<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/dgt_audit.css"/>
    <title>{$title}</title>
</head>
<body>
<div class="header">
    <p>{$title}</p>
    <div class="tubiao">
        <img src="img/fanhui.png"/>
        <img src="img/fenlei.png"/>
    </div>
</div>
<div class="zu">
    <div class="flcont">
        {foreach $apps as $app}
        <div class="hengh" id="h_{$app['mobile']}">
            <img src="img/touxiang_03.png"/>
            <!--<span>LV9</span>-->
            <p>{$app['uname']}    &nbsp;&nbsp;&nbsp;{$app['mobile']}</p>
        </div>
        <div class="xinxi" id="x_{$app['mobile']}">
            <dl>
                <dt>姓名</dt>
                <dd>{$app['uname']}</dd>
            </dl>
            <dl>
                <dt>出生年月</dt>
                <dd>1986-12-05</dd>
            </dl>
            <dl>
                <dt>联系电话</dt>
                <dd>{$app['mobile']}</dd>
            </dl>
            <dl>
                <dt>身份证号</dt>
                <dd>{$app['idNum']}</dd>
            </dl>
            <dl>
                <dt>居住地址</dt>
                <dd>{$app['addr']}</dd>
            </dl>
            <p><span>个人描述：</span>{$app['des']}</p>
            <div class="scbc">
                <button class = "btn_rej" id="{'rj_'|cat:$app['mobile']}">拒绝</button>
                <button class="btn_pass" id="{'p_'|cat:$app['mobile']}">通过</button>
            </div>
        </div>
        {/foreach}
    </div>
</div>
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="script/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/dgt_audit.js?v={$smarty.now}" type="text/javascript" charset="utf-8"></script>
</body>
</html>
