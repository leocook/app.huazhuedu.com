<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-
scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/intro_sign.css"/>
    <title>{$title}</title>
    <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        wx.config({
            debug: false,
            appId: '{$JP["appId"]}',
            timestamp: '{$JP["timestamp"]}',
            nonceStr: '{$JP["nonceStr"]}',
            signature: '{$JP["signature"]}',
            jsApiList: [
                'onMenuShareTimeline',
                'onMenuShareAppMessage'
            ]
        });
        wx.ready(function () {
            wx.onMenuShareTimeline({
                title: '消防新干线',
                //link: {'http://app.huazhuedu.com/intro_sign.php?saler='|cat:$saler|urlencode},
                imgUrl: 'http://app.huazhuedu.com/img/logo.png', // 分享图标
                success: function () {
                    alert("分享成功");
                },
                cancel: function () {
                }
            });

            wx.onMenuShareAppMessage({
                title: '消防新干线',
                desc: '消防新干线，考试全过线!',
                //link: {'http://app.huazhuedu.com/intro_sign.php?saler='|cat:$saler|urlencode},
                imgUrl: 'http://app.huazhuedu.com/img/logo.png',
                type: 'link',
                dataUrl: '',
                success: function () {
                    alert("分享成功");
                },
                cancel: function () {
                }
            });

        });
    </script>
</head>
<body>
<div class="banner">
    <img src="img/banner.jpg"/>
</div>

<!--注册列表-->
<div class="bt">
    <p>—— 注册获取更多福利 ——</p>
</div>
<div class="form" id="mb">
    <img src="img/input01.png"/>
    <input type="text" id="mb_sign" placeholder="手机号:"  />
    <div class="clearfix"></div>
</div>
<div class="form" id="pwd">
    <img src="img/input02.png"/>
    <input  type="password" id="pwd_sign" placeholder="密码（字母+数字，最少8位）:"  />
    <div class="clearfix"></div>
</div>
<div class="form" >
    <img src="img/input03.png"/>
    <input type="text" id="code_sign" placeholder="验证码:" />
    <div class="clearfix"></div>
    <span><a href="javascript:void 0;" class="btn_get_valid">获取验证码</a></span>
</div>
<div class="form" id="button">
    <input type="button" class="btn_sign" value="快速注册" />
    <div class="clearfix"></div>
</div>

<!--服务类型-->

<label id="saler" style="display: none">{$saler}</label>
<div class="bt">
    <p>—— 服务类型 ——</p>
</div>
<div class="tu">
    <img src="img/fuwu.png"/>
</div>

<!--培训体系-->
<div class="bt">
    <p>—— 培训体系 ——</p>
</div>
<div class="hang">
    <dl style="background: #22D29E;">
        <dt><img src="img/peixun01.png"/></dt>
        <dt>开班教学</dt>
        <dd>名师护航，直击重点</dd>
    </dl>
    <dl style="background: #4dbc65;">
        <dt><img src="img/peixun02.png"/></dt>
        <dt>高清视频</dt>
        <dd>名师护航，直击重点</dd>
    </dl>
    <dl style="background: #4992dd;">
        <dt><img src="img/peixun03.png"/></dt>
        <dt>核心资料</dt>
        <dd>名师护航，直击重点</dd>
    </dl>
    <div class="clearfix"></div>
</div>
<div class="hang">
    <dl style="background: #b372ef;">
        <dt><img src="img/peixun04.png"/></dt>
        <dt>复习强化</dt>
        <dd>名师护航，直击重点</dd>
    </dl>
    <dl style="background: #f066e1;">
        <dt><img src="img/peixun05.png"/></dt>
        <dt>考场压阵</dt>
        <dd>名师护航，直击重点</dd>
    </dl>
    <dl style="background: #ff5883;">
        <dt><img src="img/peixun06.png"/></dt>
        <dt>贴心服务</dt>
        <dd>名师护航，直击重点</dd>
    </dl>
    <div class="clearfix"></div>
</div>

<!--关于我们-->
<div class="bt">
    <p>—— 关于我们 ——</p>
</div>
<div class="content">
    <p>『消防新干线』是针对建（构）筑物消防员考试而推出的一款在线学习考试系统。本系统包括：章节练习、在线模拟考试、视频教学、在线读书、模拟真机操作等强大功能、是你消防考试 顺利通关的法宝。</p>
</div>

<!--学员注册-->
<div class="bt">
    <p>—— 学员注册 ——</p>
</div>
<div class="content">
    <p>进入微信-通讯录-点击右上角添加朋友 - 公众号 - 在搜索框内输入『消防新干线』- 关注成功后进入『消防新干线』微信服务号，点击左下角，会员服务 - 个人中心 - 学员注册，输入手机 号、密码、验证码即可注册成功。</p>
</div>
<div class="jietu">
    <p><img src="img/jiemian01.png"/></p>
    <p><img src="img/jiemian02.png"/></p>
    <p><img src="img/jiemian03.png"/></p>
    <div class="clearfix"></div>
</div>

<!--在线学习-->
<div class="bt">
    <p>—— 在线学习 ——</p>
</div>
<div class="content">
    <p>进入『消防新干线』微信服务号-在线学习：在线读书、视频教学、在线题库三个模块分别提供国考教材全部章节内容（重点内容及章节标注）、专业老师重要知识点及真题视频讲解及国家考试真题练习题库供学员学习。</p>
</div>
<div class="jietu">
    <p><img src="img/jiemian04.png"/></p>
    <p><img src="img/jiemian05.png"/></p>
    <p><img src="img/jiemian06.png"/></p>
    <div class="clearfix"></div>
</div>

<!--实操演练-->
<div class="bt">
    <p>—— 实操演练 ——</p>
</div>
<div class="content">
    <p>进入『消防新干线』微信服务号-实操操作：实考模拟提供模拟考试场景，进行在线考试，成绩查询，错题解析等。</p>
</div>
<div class="jietu">
    <p><img src="img/jiemian07.png"/></p>
    <p><img src="img/jiemian08.png"/></p>
    <p><img src="img/jiemian09.png"/></p>
    <div class="clearfix"></div>
</div>

<!--消防职业“钱”景-->
<div class="bt">
    <p>—— 消防职业“钱”景 ——</p>
</div>
<div class="content">
    <p>近年来，我国经济高速发展和城市化进程快速推进给社会消防工作提出了更高的要求。而我国的消防事业由于底子薄等原因导致发展形势及其紧迫，特别是消防行业从业人员和管理人才稀缺，从业人员对专业的掌握程度不高。据统计，我国对于建（构）筑物消防员还有五十万的人才缺口。在这一时代背景下，作为从事消防行业必备的证书也就是建（构）筑物消防员证书的含金量升值空间明显。在京津、长三角和珠三角等地区，拥有建（构）筑物消防员证书，月薪都在6000元以上，其他地区拥有证书的人才月薪也在4000以上。</p>
</div>
<div class="tu">
    <img src="img/qianjing.jpg"/>
</div>

<!--国家政策与消防考试-->
<div class="bt">
    <p>—— 国家政策与消防考试 ——</p>
</div>
<div class="tiaoli">
    <dl>
        <dt style="text-align: center;display: block">《中华人民共和国消防法》</dt>
        <dd>1.单位的主要负责人是本单位的消防安全责任人。</dd>
        <dd>2.消防安全重点单位需要确定本单位的消防安全管理人，组织实施本单位的安全管理工作。</dd>
        <dd>3.从事自动消防系统的操作人员，必须持证上岗。</dd>
    </dl>
    <dl>
        <dt style="text-align: center;display: block">《消防安全责任制实施办法》</dt>
        <dd>1.机关、团体、企业、事业等单位设有消防控制室的，实行24小时值班制度，每班不少于2人，并持证上岗。</dd>
        <dd>2.消防安全责任人、消防安全管理人、特有工种人员须经消防安全培训；自动消防设施操作人员应取得建（构）筑物消防员资格证书。</dd>
    </dl>
    <img src="img/donghua.png"/>
    <div class="clearfix"></div>
</div>

<!--建（构）筑物消防员报名要求-->
<div class="bt">
    <p>—— 报名要求 ——</p>
</div>
<div class="tiaoli">
    <dl>
        <dt style="text-align: center;display: block">初级建（构）筑物消防员</dt>
        <dd>1.具有初中以上学历。</dd>
        <dd>2.经建（构）筑物初级消防员正规的职业培训，达规定标准学时数并取得结业证书。</dd>
        <dd>3.在本职业连续见习工作一年以上。</dd>
    </dl>
    <dl>
        <dt style="text-align: center;display: block">中级建（构）筑物消防员</dt>
        <dd>1.具有初中以上学历。</dd>
        <dd>2.取得本职业初级职业资格证书后，连续从事本职业工作2年以上，经建（构）筑物初级消防员正规的职业培训，达规定标准学时数并取得结业证书。</dd>
        <dd>3.取得本职业初级职业资格证书后，连续从事本职业工作4年以上。</dd>
        <dd>4.连续从事本职业工作6年以上。</dd>
        <dd>5.取得经劳动和社会保障行政部门审核认定的、以终极技能为培养目标的中等以上职业学校本职业（专业）毕业证书。</dd>
    </dl>
    <img src="img/donghua.png"/>
    <div class="clearfix"></div>
</div>

<!--二维码-->
<div class="fenge">
    <span></span>
    <img src="img/dibu01.png"/>
    <span></span>
    <div class="clearfix"></div>
</div>
<div class="dibu">
    <dl>
        <dt>消防新干线</dt>
        <dd>专注于消防工程师学习的平台</dd>
    </dl>
    <img src="qrcode.php?info={$saler}"/>
</div>
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="script/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{$js}" type="text/javascript" charset="utf-8"></script>
</body>
</html>
