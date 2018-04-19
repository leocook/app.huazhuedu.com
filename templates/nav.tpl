
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" type="text/css" href="style/base.css"/>
		<link rel="stylesheet" type="text/css" href="style/nav.css"/>
		<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
		<title>{$title}</title>
	</head>
	<body>
		<div class="banner">
			<img src="img/banner_chuji.jpg"/>
		</div>

		<div class="box">
			<div class="bt">
				<div class="bid" style="display: none">{$bid}</div>
				<img src="img/bt_01.png"/><p>理论题库</p>
				<div class="clearfix"></div>
			</div>

			<div class="row_2">
				<div class="average nav_box" id="chapter">
					<dl>
						<dt>在线练习</dt>
						<dd>Test Online</dd>
					</dl>
					<img src="img/chuji_01.png"/>
					<div class="clearfix"></div>
				</div>
				<div class="average nav_box" id="exam"">
					<dl>
						<dt>模拟考试</dt>
						<dd>Exam Online</dd>
					</dl>
					<img src="img/chuji_02.png"/>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</div>



		<div class="box">
			<div class="bt">
				<img src="img/chuji_bt_01.png"/><p>主机模拟</p>
				<div class="clearfix"></div>
			</div>
			<div class="row_3">
				<div class="row_3_cont">
					<dl class="nav_box" id="hw">
						<dt><img src="img/zhuji01.png"/></dt>
						<dd>海湾主机</dd>
					</dl>
					<dl class="nav_box" id="sj">
						<dt><img src="img/zhuji02.png"/></dt>
						<dd>松江主机</dd>
					</dl>
					<dl class="nav_box" id="bd">
						<dt><img src="img/zhuji03.png"/></dt>
						<dd>北大青鸟</dd>
					</dl>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>


		<div class="box">
			<div class="bt">
				<img src="img/chuji_bt_03.png"/><p>实操题库</p>
				<div class="clearfix"></div>
			</div>

			<div class="row_4">
				<dl class="nav_box" id="s">
					<dt><img src="img/shicao_01.png"/></dt>
					<dd>识别</dd>
				</dl>
				<dl class="nav_box" id="z">
					<dt><img src="img/shicao_02.png"/></dt>
					<dd>指认</dd>
				</dl>
				<dl class="nav_box" id="k">
					<dt><img src="img/shicao_03.png"/></dt>
					<dd>口述</dd>
				</dl>
				<dl class="nav_box" id="c">
					<dt><img src="img/shicao_04.png"/></dt>
					<dd>操作</dd>
				</dl>
				<div class="clearfix"></div>
			</div>

		</div>

        <script src="script/jquery-3.2.1.min.js"></script>
        <script src="script/nav.js?v={$smarty.now}"></script>
	</body>
</html>
