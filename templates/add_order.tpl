<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/add_order.css"/>
    <script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
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
<div class="search">
    <input type="text" id="search_input" placeholder="查询用户订单"/>
    <img src="img/sousuo.png" id="search_img"/>
    <div class="clearfix"></div>
</div>
<div class="pholder"></div>
<div class="tianjia">
    <div class="form">
        <input type="text" id="mb" placeholder="请输入客户手机号" />
    </div>
    <div class="form">
        <input type="text" id="mbc" placeholder="再次输入手机号码确认" />
    </div>
    <div class="form">
        <input type="text" id="code_txt" placeholder="验证码"/>
        <h1><img src="code.php" id = "code_img"/></h1>
    </div>
    <div class="form" id="btn">
        <button id="add_course">添加课程</button>
    </div>
</div>
<script src="script/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/add_order.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>
