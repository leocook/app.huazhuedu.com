<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/q.css"/>
    <title>问卷调查</title>
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
                title: '消防安全问卷调查',
                imgUrl: 'http://www.huazhuedu.com/app/img/logo.png', // 分享图标
                success: function () {
                    alert("分享成功");
                },
                cancel: function () {
                }
            });

            wx.onMenuShareAppMessage({
                title: '消防安全问卷调查',
                desc: '消防行业培训领导品牌',
                imgUrl: 'http://www.huazhuedu.com/app/img/logo.png',
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
<div class="box">
<form action ='a.q.php' method="post">
    <div class="top">
        <p>调查问卷</p>
        <div class="tubiao">
            <img src="img/fanhui.png"/>
            <img src="img/fenlei.png"/>
        </div>
    </div>
    <div class="banner">
        <img src="img/wenjuan.png"/>
    </div>
    <div class="qianyan">
        <p>尊敬的单位领导:</p>
        <p>您好！为了更好的提高华筑消防服务企业的能力，我们展开此次问卷调查。为了保证情况的真实性，请您如实填写，感谢您花费宝贵时间填写问卷，谢谢您的配合。</p>
    </div>
    <div class="ti">
        <h1>1、您在本单位担任的职位是</h1>
        <p><label><input type="radio" name="q1" value="A" required="required" />A、法人、总经理、总工程师</label></p>
        <p><label><input type="radio" name="q1" value="B" required="required" />B、副总经理、主管安全责任人</label></p>
        <p><label><input type="radio" name="q1" value="C" required="required" />C、经理</label></p>
        <p><label><input type="radio" name="q1" value="D" required="required" />D、一般员工</label></p>
    </div>

    <div class="ti">
        <h1>2、年龄</h1>
        <p><label><input type="radio" name="q2" value="A" required="required" />A、25岁以下</label></p>
        <p><label><input type="radio" name="q2" value="B" required="required" />B、25-30岁</label></p>
        <p><label><input type="radio" name="q2" value="C" required="required" />C、30-40岁</label></p>
        <p><label><input type="radio" name="q2" value="D" required="required" />D、40岁以上</label></p>
    </div>
    <div class="ti">
        <h1>3、文化程度</h1>
        <p><label><input type="radio" name="q3" value="A" required="required" />A、初中及以下</label></p>
        <p><label><input type="radio" name="q3" value="B" required="required" />B、高中或中专</label></p>
        <p><label><input type="radio" name="q3" value="C" required="required" />C、大专</label></p>
        <p><label><input type="radio" name="q3" value="D" required="required" />D、本科及以上</label></p>
    </div>
    <div class="ti">
        <h1>4、目前月收入</h1>
        <p><label><input type="radio" name="q4" value="A" required="required" />A、3000以下</label></p>
        <p><label><input type="radio" name="q4" value="B" required="required" />B、3000-4000</label></p>
        <p><label><input type="radio" name="q4" value="C" required="required" />C、4000-5000</label></p>
        <p><label><input type="radio" name="q4" value="D" required="required" />D、5000以上</label></p>
    </div>
    <div class="ti">
        <h1>5、贵单位是否有定期做消防培训演练</h1>
        <p><label><input type="radio" name="q5" value="A" required="required" />A、是</label></p>
        <p><label><input type="radio" name="q5" value="B" required="required" />B、否</label></p>
    </div>
    <div class="ti">
        <h1>6、贵单位建筑面积</h1>
        <p><label><input type="radio" name="q6" value="A" required="required" />A、5000m²-10000m²</label></p>
        <p><label><input type="radio" name="q6" value="B" required="required" />B、10000m²-30000m²</label></p>
        <p><label><input type="radio" name="q6" value="C" required="required" />C、30000m²-50000m²</label></p>
        <p><label><input type="radio" name="q6" value="D" required="required" />D、50000m²-100000m²</label></p>
        <p><label><input type="radio" name="q6" value="E" />E、其它</label></p>
    </div>
    <div class="ti">
        <h1>7、贵单位消防检测到期时间</h1>
        <p><label><input type="radio" name="q7" value="A" required="required" />A、2018年3月—6月</label></p>
        <p><label><input type="radio" name="q7" value="B" required="required" />B、2018年6月—9月</label></p>
        <p><label><input type="radio" name="q7" value="C" required="required" />C、2018年9—12月</label></p>
        <p><label><input type="radio" name="q7" value="D" required="required" />D、2019年</label></p>
    </div>
    <div class="ti">
        <h1>8、贵单位消防维保到期时间</h1>
        <p><label><input type="radio" name="q8" value="A" required="required" />A、2018年3月—6月</label></p>
        <p><label><input type="radio" name="q8" value="B" required="required" />B、2018年6月—9月</label></p>
        <p><label><input type="radio" name="q8" value="C" required="required" />C、2018年9—12月</label></p>
        <p><label><input type="radio" name="q8" value="D" required="required" />D、2019年</label></p>
    </div>
    <div class="ti">
        <h1>9、贵单位的消防设施维保频率偏高的是</h1>
        <p><label><input type="checkbox" name="q9[]"  value="A"  />A、火灾自动报警及联动系统</label></p>
        <p><label><input type="checkbox" name="q9[]"  value="B" />B、室内外消火栓给水系统</label></p>
        <p><label><input type="checkbox" name="q9[]"  value="C" />C、自动喷水灭火系统</label></p>
        <p><label><input type="checkbox" name="q9[]"  value="D" />D、防火分隔设施</label></p>
        <p><label><input type="checkbox" name="q9[]"  value="E"/>E、防排烟设施</label></p>
        <p><label><input type="checkbox" name="q9[]"  value="F"/>F、应急照明和疏散指示系统</label></p>
        <p><label><input type="checkbox" name="q9[]"  value="G"/>G、无</label></p>
    </div>
    <div class="ti">
        <h1>10、贵单位每年检测维保费用预算是</h1>
        <p><label><input type="radio" name="q10"  value="A" required="required"/>A、5万以下</label></p>
        <p><label><input type="radio" name="q10"  value="B" required="required"/>B、5-10万</label></p>
        <p><label><input type="radio" name="q10"  value="C" required="required"/>C、10-20万</label></p>
        <p><label><input type="radio" name="q10"  value="D" required="required"/>D、20万以上</label></p>
    </div>
    <div class="ti">
        <h1>11、对以合作消防检测维保单位是否满意</h1>
        <p><label><input type="radio" name="q11" value="A" required="required" />A、是</label></p>
        <p><label><input type="radio" name="q11" value="B" required="required" />B、否</label></p>
    </div>
    <div class="ti">
        <h1>12、是否愿意更换目前的检测维保合作单位</h1>
        <p><label><input type="radio" name="q12"  value="A" required="required" />A、是</label></p>
        <p><label><input type="radio" name="q12"  value="B" required="required" />B、否</label></p>
    </div>
    <div class="inform">
        <div class="hag">
            <p>姓名：</p>
            <input type="text" name="name" id="nam" />
        </div>
        <div class="hag">
            <p>手机：</p>
            <input type="text" name="mobile" id="mb" />
        </div>
        <div class="hag">
            <p>单位：</p>
            <input type="text" name="company" id="com"/>
        </div>
        <div class="hag">
            <p>老师：</p>
            <input type="text" name="teacher" id="tea" />
        </div>
        <div class="hag">
            <button class = 'sub'>提交问卷</button>
        </div>

    </div>
</form>
</div><!--box_end-->
<script src="script/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/q.js?v={$smarty.now}" type="text/javascript" charset="utf-8"></script>
</body>
</html>