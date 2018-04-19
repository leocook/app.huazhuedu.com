{include file='header.tpl'}
{include file='red_header.tpl'}

<div class="row">
    <!--ban开始-->
    <div>
        <div class="container">
            <div class="banner_question">
                <div class="row banner_title">
                    <div class="col-xs-4 banner_top_left "></div>
                    <div class="col-xs-4 bg_red_light banner_top_mid center-block text-center font14bw">
                        七日注册
                    </div>
                    <div class="col-xs-4 center-block banner_top_right"></div>
                </div>
                <div class="row">
                    <div class="tb font14bn">

                        <div class="row tbh">
                            <div class="col-xs-5">
                                手机号码
                            </div>

                            <div class="col-xs-3">
                                城市
                            </div>
                            <div class="col-xs-4">
                                注册时间
                            </div>

                        </div>
                        {foreach $users as $u}

                            <div class="score">
                                <div class="col-xs-5">{$u['mobile']}</div>
                                <div class="col-xs-3">{$u['city']}</div>
                                <div class="col-xs-4">{$u['sign_time']|time_to_date}</div>
                            </div>


                        {/foreach}

                        <div class="row tbh">
                            <div class="col-xs-12 text-right">
                                最近7天共有新用户 : <span class="ex_num">{$users|@count}</span> 个
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{include file='footer.tpl'}
