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
    <img src="img/reg.jpg"/>
</div>

<div class="introduction">
    <h1>公司简介</h1>
    <p>杭州华筑职业技能培训学校成立于2017年5月，起源于专注教育培训5年之久的杭州华筑教育科技有限公司，学校通过了杭州市拱墅区人力资源与社会保障局、杭州市民政局审批和浙江省消防总队备案。培训范围涵盖建工、消防、学历和网络培训等领域。</p>
</div>

<div class="introduction">
    <h1>填写信息</h1>
</div>

<div class="row">
    <p><img src="img/shenqing01.png"/>姓名</p>
    <input type="text" placeholder="必填"/>
    <div class="clearfix"></div>
</div>
<div class="row">
    <p><img src="img/shenqing04.png"/>手机</p>
    <input type="text" placeholder="必填"/>
    <div class="clearfix"></div>
</div>
<div class="row row3">
    <p><img src="img/shenqing11.png"/>期望学习时间</p>

    <select id="z_cls" style="font-size: .24rem">
            <option value="">一月</option>
            <option value="">二月</option>
    </select>
    <div class="clearfix"></div>
</div>

<div class="row" style="padding-bottom: 0;margin-bottom: 0;">
    <p><img src="img/shenqing08.png"/>留言</p>
    <div class="clearfix"></div>
</div>
<div class="row1">
    <textarea  rows="6" cols="" id="c_des">
        {$info['des']}
    </textarea>
</div>
<button class="sub">确认报名</button>

{*
<form action="" method="post">
    <select name="">
        <option value="">期望学习时间</option>
        <option value="">一月</option>
        <option value="">二月</option>
        <option value="">三月</option>
        <option value="">四月</option>
        <option value="">五月</option>
        <option value="">六月</option>
        <option value="">七月</option>
        <option value="">八月</option>
        <option value="">九月</option>
        <option value="">十月</option>
        <option value="">十一月</option>
        <option value="">十二月</option>
    </select>
    <select name="">
        <option value="">科目</option>
        <option value="">一级消防工程师</option>
        <option value="">建（构）筑物消防员</option>
        <option value="">安全人、责任人</option>
        <option value="">初级消防员</option>
        <option value="">中级消防员</option>
    </select>
    <input type="text" placeholder="姓名"/>
    <input type="text" placeholder="手机"/>
    <textarea name="" rows="6" cols="" placeholder="留言"></textarea>
    <a href="###"><button>提交信息</button></a>
</form>
*}

</body>
</html>
