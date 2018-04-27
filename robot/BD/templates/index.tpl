<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="/style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/bd.css?v={$smarty.now}"/>
    <script src="/script/basic.js" type="text/javascript" charset="utf-8"></script>
    <title>北大青鸟</title>
</head>
<body>
<div class="container">
    <div class="head">
        北大青鸟
    </div>
    <div class="screen">
       <div class="screen_content">
           <div class="screen_left" ></div>
           <div class="screen_right" ></div>
           <div class="clearfix" ></div>
       </div>
        <div class="screen_nav"></div>
    </div>
    <div style = 'display: none'>
        <img src = 'img/start_img.jpg' id="start_img"/>
        <img src = 'img/logo.png' id="logo_img"/>
    </div>

    <!--开关+指示灯-->
    <div class="light">
        <div class="left">
            <dl>
                <dt>禁止</dt>
                <dd><img src="img/lamp_red_0.png" id="key_1_forb"/></dd>
            </dl>
            <dl>
                <dt>允许</dt>
                <dd><img src="img/lamp_green_0.png" id="key_1_allow"/></dd>
            </dl>
            <div class="clearfix"></div>
            <div class="switch" id="key_1">
                <img src="img/key_0.png" />
                自动方式
            </div>
        </div>
        <div class="right">
            <dl><span><img src="img/lamp_red_0.png" id ="lamp_alarm"/>火警</span>
                <span><img src="img/lamp_green_0.png" id ="lamp_start"/>启动</span>
                <div class="clearfix"></div>
            </dl>
            <dt>
                <span><img src="img/lamp_green_0.png" id ="lamp_101"/>监管报警</span>
                <span><img src="img/lamp_green_0.png" id ="lamp_104"/>备电工作</span>
                <span><img src="img/lamp_yellow_0.png" id ="lamp_201"/>故 障</span>
                <span><img src="img/lamp_red_0.png" id ="lamp_204"/>消 音</span>
                <div class="clearfix"></div>
            </dt>
            <dt>
                <span><img src="img/lamp_green_0.png" id ="lamp_102"/>启动延时</span>
                <span><img src="img/lamp_red_0.png" id ="lamp_105"/>手动报警</span>
                <span><img src="img/lamp_red_0.png" id ="lamp_202"/>反 馈</span>
                <span><img src="img/lamp_green_0.png" id ="lamp_205"/>自 检</span>
                <div class="clearfix"></div>
            </dt>
            <dt>
                <span><img src="img/lamp_green_0.png" id ="lamp_103"/>主电运行</span>
                <span><img src="img/lamp_green_0.png" id ="lamp_106"/>系统故障</span>
                <span><img src="img/lamp_green_0.png" id ="lamp_203"/>屏 蔽</span>
                <span><img src="img/lamp_green_0.png" id ="lamp_206"/>运 行</span>
                <div class="clearfix"></div>
            </dt>
        </div>
        <div class="clearfix"></div>
    </div>

    <!--操作面板-->
    <!--F系列键-->
    <div class="f-btn">
        <img src="img/btn_F1_0.png" class="bn" id="btn_F1"/>
        <img src="img/btn_F2_0.png" class="bn" id="btn_F2"/>
        <img src="img/btn_F3_0.png" class="bn" id="btn_F3"/>
        <img src="img/btn_F4_0.png" class="bn" id="btn_F4"/>
        <img src="img/btn_F5_0.png" class="bn" id="btn_F5"/>
        <img src="img/btn_F6_0.png" class="bn" id="btn_F6"/>
        <div class="clearfix"></div>
    </div>

    <div class="btn">
        <div class="btn-left">
            <div class="numb-btn">
                <img src="img/btn_11_0.png" class="bn" id="btn_11"/>
                <img src="img/btn_12_0.png" class="bn" id="btn_12"/>
                <img src="img/btn_13_0.png" class="bn" id="btn_13"/>
                <img src="img/btn_14_0.png" class="bn" id="btn_14"/>
                <img src="img/btn_15_0.png" class="bn" id="btn_15"/>
                <img src="img/btn_16_0.png" class="bn" id="btn_16"/>
                <div class="clearfix"></div>
            </div>
            <div class="numb-btn">
                <img src="img/btn_21_0.png" class="bn" id="btn_21"/>
                <img src="img/btn_22_0.png" class="bn" id="btn_22"/>
                <img src="img/btn_23_0.png" class="bn" id="btn_23"/>
                <img src="img/btn_24_0.png" class="bn" id="btn_24"/>
                <img src="img/btn_25_0.png" class="bn" id="btn_25"/>
                <img src="img/btn_26_0.png" class="bn" id="btn_26"/>
                <div class="clearfix"></div>
            </div>
            <div class="numb-btn">
                <img src="img/btn_31_0.png" class="bn" id="btn_31"/>
                <img src="img/btn_32_0.png" class="bn" id="btn_32"/>
                <img src="img/btn_33_0.png" class="bn" id="btn_33"/>
                <img src="img/btn_34_0.png" class="bn" id="btn_34"/>
                <img src="img/btn_35_0.png" class="bn" id="btn_35"/>
                <img src="img/btn_36_0.png" class="bn" id="btn_36"/>
                <div class="clearfix"></div>
            </div>
            <div class="numb-btn">
                <img src="img/btn_41_0.png" class="bn" id="btn_41"/>
                <img src="img/btn_42_0.png" class="bn" id="btn_42"/>
                <img src="img/btn_43_0.png" class="bn" id="btn_43"/>
                <img src="img/btn_44_0.png" class="bn" id="btn_44"/>
                <img src="img/btn_45_0.png" class="bn" id="btn_45"/>
                <img src="img/btn_46_0.png" class="bn" id="btn_46"/>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="btn-right">
            <img src="img/btn_reset_0.png" class="bn" id="btn_reset"/>
            <img src="img/btn_check_0.png" class="bn" id="btn_check"/>
            <img src="img/btn_clear_0.png" class="bn" id="btn_clear"/>
        </div>
        <div class="clearfix"></div>
    </div>


    <div class="third">
        <div class="left">
            <div class="tips">
                <dl>
                    <span><img src="img/lamp_green_0.png" id="mul_lamp_run"/>运行</span>
                    <span><img src="img/lamp_green_0.png" id="mul_lamp_alarm"/>火警</span>
                    <div class="clearfix"></div>
                </dl>
            </div>
            <div class="kaiguan">
                <dl>
                    <dt>禁止</dt>
                    <dd><img src="img/lamp_red_0.png" id="key_2_forb"/></dd>
                </dl>
                <dl>
                    <dt>允许</dt>
                    <dd><img src="img/lamp_green_0.png" id="key_2_allow"/></dd>
                </dl>
                <div class="clearfix"></div>
                <div class="switch" id="key_2">
                    <img src="img/key_0.png"/>
                    自动方式
                </div>
            </div>
            <div class="kaiguan">
                <dl>
                    <dt>禁止</dt>
                    <dd><img src="img/lamp_red_0.png" id="key_3_forb"/></dd>
                </dl>
                <dl>
                    <dt>允许</dt>
                    <dd><img src="img/lamp_green_0.png" id="key_3_allow"/></dd>
                </dl>
                <div class="clearfix"></div>
                <div class="switch" id="key_3">
                    <img src="img/key_0.png"/>
                    手动方式
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="right">
            <p>1</p>
            <span></span>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_101"/>启 动</dl>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_102"/>反 馈</dl>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_103"/>故 障</dl>
            <div class="start-end">
                <img src="img/btn_start_0.png" class="bns" id = "start_1"/>
                <img src="img/btn_stop_0.png" class="bns" id = "stop_1"/>
            </div>
        </div>
        <div class="right">
            <p>2</p>
            <span></span>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_201"/>启 动</dl>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_202"/>反 馈</dl>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_203"/>故 障</dl>
            <div class="start-end">
                <img src="img/btn_start_0.png" class="bns" id = "start_2"/>
                <img src="img/btn_stop_1.png" class="bns" id = "stop_2"/>
            </div>
        </div>
        <div class="right">
            <p>3</p>
            <span></span>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_301"/>启 动</dl>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_302"/>反 馈</dl>
            <dl><img src="img/lamp_red_0.png" id="mul_lamp_303"/>故 障</dl>
            <div class="start-end">
                <img src="img/btn_start_0.png" class="bns" id = "start_3"/>
                <img src="img/btn_stop_0.png" class="bns" id = "stop_3"/>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>


    <div class="fouth">
        <div class="left">
            <div class="logo">
                <img src="img/beida-logo.png"/>
            </div>
            <dl><img src="img/lamp_green_0.png" id="bus_lamp_run"/>运行</dl>
            <p>手动方式</p>
            <dl><img src="img/lamp_green_0.png" id="bus_lamp_forb"/>禁止</dl>
            <dl><img src="img/lamp_green_0.png" id="bus_lamp_allow"/>允许</dl>
        </div>
        <div class="right">
            <dl>
                <span>动作</span>
                <span>反馈</span>
                <span>操作</span>
                <span>受控设备</span>
                <div class="clearfix"></div>
            </dl>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_101"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_101"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_101"/>
                </span>
                <span>01</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_102"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_102"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_102"/>
                </span>
                <span>02</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_103"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_103"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_103"/>
                </span>
                <span>03</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_104"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_104"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_104"/>
                </span>
                <span>04</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_105"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_105"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_105"/>
                </span>
                <span>05</span>
            <div class="clearfix"></div>
            </p>
        </div>
        <div class="right">
            <dl>
                <span>动作</span>
                <span>反馈</span>
                <span>操作</span>
                <span>受控设备</span>
                <div class="clearfix"></div>
            </dl>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_201"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_201"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_201"/>
                </span>
                <span>01</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_202"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_202"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_202"/>
                </span>
                <span>02</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_203"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_203"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_203"/>
                </span>
                <span>03</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_204"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_204"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_204"/></span>
                <span>04</span>
            <div class="clearfix"></div>
            </p>
            <p>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_a_205"/></span>
                <span><img src="img/lamp_red_0.png" id="bus_lamp_b_205"/></span>
                <span class="btnn">
                    <img src="img/btn_zong_0.png" class="bus_btn" id="bus_205"/>
                </span>
                <span>05</span>
            <div class="clearfix"></div>
            </p>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="foot">
        <p>杭州华筑职业技能培训学校</p>
    </div>

</div>
<script src="/script/jquery-3.2.1.min.js"></script>
<script src="/script/jquery.touchSwipe.min.js"></script>
<script src="script/bd.js?v={$smarty.now}"></script>
</body>
</html>



