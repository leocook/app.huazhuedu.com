<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/chpwd.css"/>

    <title>修改密码</title>
</head>
<body>
<div class="header">
    <p>修改密码</p>
    <div class="tubiao">
        <img src="img/fanhui.png"/>
        <img src="img/fenlei.png"/>
        <div class="clearfix"></div>
    </div>

    <div class="tianjia">
        <div class="form">
            {*<p><nobr><span>*</span>手机号：</nobr></p>*}
            <input type="text" placeholder="手机号" id="mb_sign" />
            <div class="clearfix"></div>
        </div>
        <div class="form">
            {*<p><nobr><span>*</span>新密码：</nobr></p>*}
            <input type="password" placeholder="新密码" id="pwd_sign"  />
            <div class="clearfix"></div>
        </div>
        <div class="form">
            {*<p><nobr><span>*</span>验证码：</nobr></p>*}
            <input type="text" placeholder="验证码" id="code_sign" />
            <div class="clearfix"></div>
            <h1 class="btn_code">获取验证码</h1>
        </div>
        <div id="btn">
            {*<button class="btn_clean">重置</button>*}
            <button class="btn_ch">修改密码</button>
        </div>
    </div>
</div>
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="script/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/chpwd.js?v={$smarty.now}" type="text/javascript" charset="utf-8"></script>
</body>
</html>
