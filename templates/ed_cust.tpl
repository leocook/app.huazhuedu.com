<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/reg.css"/>
    <script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
    <title>{$title}</title>
</head>
<body>
<div class="banner">
    <img src="img/banner_luru.jpg"/>
</div>

<div class="introduction">
    <h1>公司简介</h1>
    <p>杭州华筑职业技能培训学校成立于2017年5月，起源于专注教育培训5年之久的杭州华筑教育科技有限公司，学校通过了杭州市拱墅区人力资源与社会保障局、杭州市民政局审批和浙江省消防总队备案。培训范围涵盖建工、消防、学历和网络培训等领域。</p>
</div>

<div class="introduction">
    <h1>填写信息</h1>
</div>
<div class="form">
    <div class="row">
        <p><img src="img/shenqing01.png">姓名</p>
        <input type="text" class="nam" placeholder="必填" value = {$info['nam']} />
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <p><img src="img/shenqing02.png">身份证</p>
        <input type="text" class="idd" placeholder="必填" value = {$info['id_num']} />
        <div class="clearfix"></div>
    </div>

    <div class="row" style="margin-top: .12rem">
        <p><img src="img/shenqing07.png">手机号</p>
        <input type="text" class="mb" placeholder="必填" value = "{$info['mb']}" />
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <p><img src="img/shenqing03.png">固定电话</p>
        <input type="text" class='tel' placeholder="可不填" value = "{$info['tel']}" />
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <p><img src="img/shenqing04.png">公司名称</p>
        <input type="text" class="company" placeholder="可不填" value = "{$info['company']}" />
        <div class="clearfix"></div>
    </div>
    <div class="row row2" style="margin-top: .12rem;margin-bottom: 0;padding: .28rem .2rem;">
        <p><img src="img/shenqing08.png">备注</p>
        <div class="clearfix"></div>
    </div>
    <div class="row1">
        <textarea  cols="" rows="6" class="des">{$info['des']}</textarea>
    </div>
    <div class="uid" style="display: none">{$info['id']}</div>
    <button class="sub">提交信息</button>
</div>
<script src="script/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/ed_cust.js?v={$smarty.now}" type="text/javascript" charset="utf-8"></script>
</body>
</html>
