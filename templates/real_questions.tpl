<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/real_questions.css"/>
    <script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
    <title>{$title}</title>
</head>
<body>
<div class="banner">
    <img src="img/{$img}"/>
</div>
{foreach $list as $l}
<div class="ti">
    <div class="left">
        <dl>
            <dt>{$l['nam']}</dt>
            <dd><p>{$l['view_count']}人做过</p><p><span>难度系数</span>

                    {$star_num = intval($l['star'])}
                    {$gray = 5 - $star_num}
                    {for $f=1 to $star_num}
                        <img src="img/star_01.png"/>
                    {/for}
                    {for $f=1 to $gray}
                        <img src="img/star_02.png"/>
                    {/for}
                    <div class="clearfix"></div>
                </p>
                <div class="clearfix"></div>
            </dd>
        </dl>
    </div>
    <div class="right">
        <a href="/test_real.php?id={$l['id']}"><img src="img/keys.png"/>答案解析 <div class="clearfix"></div></a>
        <a href="/exam_real.php?id={$l['id']}"><img src="img/write.png"/>开始答题 <div class="clearfix"></div></a>
    </div>
    <div class="clearfix"></div>
</div>
{/foreach}

</body>
</html>
