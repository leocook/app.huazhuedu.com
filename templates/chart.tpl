{include file='header.tpl'}
{include file='red_header.tpl'}
<div class="container">
    <div class="row">
        <div id="main"></div>
    </div>
    <div class="row center-block text-center title">用户注册量趋势图</div>
    <div class="row">
        <div class ="col-xs-3"><button class="btn btn-block btn-danger gd" id="week">7天</button></div>
        <div class ="col-xs-3"><button class="btn btn-block btn-danger gd" id="mon">30天</button></div>
        <div class ="col-xs-3"><button class="btn btn-block btn-danger gd" id="tmon">90天</button></div>
        <div class ="col-xs-3"><button class="btn btn-block btn-danger gd" id="year">365天</button></div>
    </div>
    <div class="row tb"></div>
    <div class="row tb">
        <div class ="col-xs-6"><div class="tb_title">总注册量</div></div>
        <div class ="col-xs-6"><div class="tb_txt center-block text-center">{$user_count["@ct"]}</div></div>
    </div>
    <div class="row tb">
        <div class ="col-xs-3"><div class="tb_title">日活跃</div></div>
        <div class ="col-xs-3"><div class="tb_title">周活跃</div></div>
        <div class ="col-xs-3"><div class="tb_title">月活跃</div></div>
        <div class ="col-xs-3"><div class="tb_title">季活跃</div></div>
    </div>
    <div class="row tb">
        <div class ="col-xs-3"><div class="tb_txt center-block ">{$user_count["@o"]}</div></div>
        <div class ="col-xs-3"><div class="tb_txt center-block ">{$user_count["@w"]}</div></div>
        <div class ="col-xs-3"><div class="tb_txt center-block ">{$user_count["@t"]}</div></div>
        <div class ="col-xs-3"><div class="tb_txt center-block ">{$user_count["@n"]}</div></div>
    </div>
    <div class="row tb"></div>
</div>
{include file='footer.tpl'}