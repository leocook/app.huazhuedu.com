<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<link rel="stylesheet" type="text/css" href="style/base.css"/>
	<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
	<title>{$title}</title>
	<style type="text/css">
		body {
			background: #F2F2F2;
		}
		.clearfix {
			clear: both;
		}
		.hang {
			background: #FFFFFF;
			padding: .28em .3rem;
			margin-bottom: 1px;
		}
		.hang h1 {
			font-size: .32rem;
			color: #333333;
			margin-bottom: .25rem;
		}
		.hang .p {
			font-size: .3rem;
			color: #555;
			line-height: .75rem;
			display: flex;
		}
		.tel-hot a {
			font-size: .3rem;
		}

		.hang img {
			width: .3rem;
			height: .34rem;
			float: left;
			margin: .18rem .4rem 0 0;
		}
	</style>
</head>
<body>
<div class="banner"><img src="img/banner_tel.jpg"/></div>
{foreach $info as $i}
<div class="hang">
	<h1>{$i['name']}</h1>
	<div class="p">
		<h1><img src="img/kefu_01.png"/></h1>
		<div class="tel-hot">
			<a href="tel:{$i['tel']}">客服热线：{$i['tel']}</a>
		</div>
	</div>
	<div class="p">
		<h1><img src="img/kefu_02.png"/></h1>
		<div class="tel-hot">
            {foreach $i['con'] as $p}
			    <a href="tel:{$p['mb']}">{$p['name']}：{$p['mb']}</a><br />
            {/foreach}
		</div>
	</div>
	<div class="p">
		<h1><img src="img/kefu_03.png"/></h1>
		<a href="">{$i['addr']}</a>
	</div>
</div>
{/foreach}
</body>
</html>
