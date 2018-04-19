{include file='header.tpl'}
<div class = "row red_h">

    <div class="col-xs-2">
        <div class = "bg_cir">
            <span class="glyphicon glyphicon-user hd"></span>
        </div>
    </div>
    <div class="col-xs-8">
        <div class="bg_mb">账户：{$mb}</div>
        <div class="level">等级：VIP-0</div>
    </div>
    <div class="col-xs-2">
        <span class="glyphicon glyphicon-list d3"></span>
    </div>
</div>

<div class = "row">

    <div class="col-xs-6 white_l" id="personal">
        <div class="ico_1">
            <img src="./img/self.png" height="100%">
        </div>
        <div class="txt_des">个人资料
        </div>
    </div>

    <div class="col-xs-6 white_r ls" id="dgt_prot">
        <div class="ico_1">
            <img src="./img/wallete.png" height="100%">
        </div>
        <div class="txt_des">代理申请
        </div>
    </div>

</div>

<div class = "row bg_list ls" id="course">
    <div class="col-xs-2">
        <div class="ico">
            <img src="./img/by_icon.png" height="100%">
        </div>
    </div>
    <div class="col-xs-10 des">
        <div>已购买课程</div>
    </div>
</div>

<div class = "row bg_l ls" id="score">
    <div class="col-xs-2">
        <div class="ico">
            <img src="./img/buy_car.png" height="100%">
        </div>
    </div>
    <div class="col-xs-10 des">
        <div>历史成绩查询</div>
    </div>
</div>

<div class = "row bg_l ls" id="wrong_set">
    <div class="col-xs-2">
        <div class="ico">
            <img src="./img/wrong_set.png" height="100%">
        </div>
    </div>

    <div class="col-xs-10 des">
        <div>错题集</div>
    </div>
</div>


<div class = "row bg_l ls" id="chpwd">
    <div class="col-xs-2">
        <div class="ico">
            <img src="./img/change_pass.png" height="100%">
        </div>
    </div>
    <div class="col-xs-10 des">
        <div>修改密码</div>
    </div>
</div>

<div class = "row bg_l ls" id="FAQ">
    <div class="col-xs-2">
        <div class="ico">
            <img src="./img/faq.png" height="100%">
        </div>
    </div>
    <div class="col-xs-10 des">
        <div>常见问题</div>
    </div>
</div>

<div class = "row bg_l ls " id="feedback">
    <div class="col-xs-2">
        <div class="ico">
            <img src="./img/fback.png" height="100%">
        </div>
    </div>

    <div class="col-xs-10 des">
        <div>意见反馈</div>
    </div>
</div>

{if $lvl > 50}
    <div class = "row bg_list">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/intro.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <a href ="intro_sign.php?saler={$mb}"><div>我要推广</div></a>
        </div>
    </div>

    <div class = "row bg_l ls " id="my_extend">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_cst.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>我的推广</div>
        </div>
    </div>

    <div class = "row bg_l ls " id="my_deal">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_deal.png" height="100%">
            </div>
        </div>

        <div class="col-xs-10 des">
            <div>我的成交</div>
        </div>
    </div>
    <div class = "row bg_l ls " id="my_deal">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_pay.png" height="100%">
            </div>
        </div>

        <div class="col-xs-10 des">
            <div>我的佣金</div>
        </div>
    </div>
    <div class = "row bg_l ls " id="in_cust">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_01.png" height="100%">
            </div>
        </div>

        <div class="col-xs-10 des">
            <div>客户信息录入</div>
        </div>
    </div>
    <div class = "row bg_l ls " id="my_cust">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_02.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>我的客户</div>
        </div>
    </div>
    <div class = "row bg_l ls " id="class_info">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_03.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>开班详情</div>
        </div>
    </div>
{/if}


{if $lvl > 65}
    <div class = "row bg_list ls" id="class_confirm">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_04.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>报班确认</div>
        </div>
    </div>

{/if}


{if $lvl > 70}
    <div class = "row bg_list ls" id="add_order">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_05.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>服务管理</div>
        </div>
    </div>
    <div class = "row bg_l ls " id="manage">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_06.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>人员管理</div>
        </div>
    </div>
    <div class = "row bg_l ls " id="dgt_audit">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_07.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>代理审核</div>
        </div>
    </div>
{/if}

{if $lvl > 90}
    <div class = "row bg_l ls" id="user_area">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/all_users.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>用户分布</div>
        </div>
    </div>

    <div class = "row bg_l ls " id="my_extend">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/today.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>今日成交</div>
        </div>
    </div>

    <div class = "row bg_l ls " id="chart">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_09.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>趋势分析</div>
        </div>
    </div>
    <div class = "row bg_l ls " id="week_user">
        <div class="col-xs-2">
            <div class="ico">
                <img src="./img/my_10.png" height="100%">
            </div>
        </div>
        <div class="col-xs-10 des">
            <div>最近7日注册用户</div>
        </div>
    </div>
{/if}




<div class="row" style="height:100px" ></div>
{include file='footer.tpl'}
