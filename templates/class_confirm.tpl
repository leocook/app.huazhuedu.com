<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <link rel="stylesheet" type="text/css" href="style/class_confirm.css"/>
    <script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
    <title>{$title}</title>
</head>
<body>
<div class="banner">
    <img src="img/banner_conform.jpg"/>
</div>
{foreach $cls as $c}
    <div class="ban" id="ban_{$c['id']}">
        <p><img src="img/qun01.png"/>{$c['nam']}({$c['count']}人)</p>
        <span>{$c['start']} - {$c['end']}</span>
        <div class="clearfix"></div>
    </div>
    <div id="status_{$c['id']}" class="hidden">
            <div class="status" id ="status_{$c['id']}_pass">
                <p><img src="img/xiala_right.png"/>已交费已审核</p><span>{$c['pass']|count}人</span>
                <div class="clearfix"></div>
            </div>
            <div class = 'hidden' id="pass_{$c['id']}">
                {foreach $c['pass'] as $p}
                <div class="person" id="person_{$p['student_id']}">
                    <p>{$p['student_name']}</p><span>· · ·</span>
                    <div class="clearfix"></div>
                </div>
                <div class="pinfo hidden" id="pinfo_{$p['student_id']}">
                    <div id = 'p_{$p['student_id']}'>
                    </div>
                    <div class="btn">
                            <select id="admin_{$p['student_id']}" class="red">
                                <option value="0">&nbsp;&nbsp;&nbsp;调 班</option>
                                {foreach $vcs as $v}
                                    <option value="{$v['id']}">{$v['nam']}</option>
                                {/foreach}
                            </select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                {/foreach}
            </div>


            <div class="status" id ="status_{$c['id']}_paid">
                <p><img src="img/xiala_right.png"/>已交费未审核</p><span>{$c['paid']|count}人</span>
                <div class="clearfix"></div>
            </div>
            <div class = 'hidden' id="paid_{$c['id']}">
                {foreach $c['paid'] as $p}
                    <div class="person" id="person_{$p['student_id']}">
                        <p>{$p['student_name']}</p><span>· · ·</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="pinfo hidden" id="pinfo_{$p['student_id']}">
                        <div id = 'p_{$p['student_id']}'>
                        </div>
                        <div class="btn">
                            <button class="gre" id="operator_{$p['student_id']}_{$c['id']}">排班确认</button>
                            <select  id="admin_{$p['student_id']}" class="red">
                                <option value="0">&nbsp;&nbsp;&nbsp;调 班</option>
                                {foreach $vcs as $v}
                                    <option value="{$v['id']}">{$v['nam']}</option>
                                {/foreach}
                            </select>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                {/foreach}
            </div>

            <div class="status" id ="status_{$c['id']}_nopay">
                <p><img src="img/xiala_right.png"/>已报名未交费</p><span>{$c['nopay']|count}人</span>
                <div class="clearfix"></div>
            </div>
            <div class = 'hidden' id="nopay_{$c['id']}">
                {foreach $c['nopay'] as $p}
                    <div class="person" id="person_{$p['student_id']}">
                        <p>{$p['student_name']}</p><span>· · ·</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="pinfo hidden" id="pinfo_{$p['student_id']}">

                        <div id = 'p_{$p['student_id']}'>
                        </div>
                        <div class="btn">
                            <button class="gre" id="finance_{$p['student_id']}_{$c['id']}">交费确认</button>
                                <select id="admin_{$p['student_id']}" class="red">
                                    <option value="0">&nbsp;&nbsp;&nbsp;调 班</option>
                                    {foreach $vcs as $v}
                                        <option value="{$v['id']}">{$v['nam']}</option>
                                    {/foreach}
                                </select>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                {/foreach}
            </div>

    </div>

{/foreach}
<script src="script/jquery-3.2.1.min.js"></script>
<script src="script/class_confirm.js?v={$smarty.now}"></script>
</body>
</html>
