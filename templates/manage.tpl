<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="style/manage.css"/>
    <link rel="stylesheet" type="text/css" href="style/base.css"/>
    <title>{$title}</title>
</head>
<body>
<div class="header">
    <p>{$title}</p>
    <div class="tubiao">
        <img src="img/fanhui.png"/>
        <img src="img/fenlei.png"/>
    </div>
</div>
{if $lvl>95}
<div class="zu">
    <div class="fenlei">
        超级管理员（{$sas|@count}人）
    </div>
    {foreach $sas as $op}
    <div class="flcont">
        <div class="hengh" id="{'hengh_'|cat:$op["mobile"]}">
            <img src="img/touxiang.png"/>
            <span>LV{$op["levels"]}</span>
            <p>{$op["name"]}    &nbsp;&nbsp;&nbsp;{$op["mobile"]}</p>
            <div class="clearfix"></div>
        </div>
        <div class="xinxi hidden">
            <dl>
                <dt>等级调整</dt>
                <dd>
                    <button class="sub">-</button>
                    <input type="text" id={"lvl_"|cat:$op['mobile']} value="{$op['levels']}" />
                    <button class="add">+</button>
                </dd>
            </dl>
            <dl>
                <dt>最后一次登录时间</dt>
                <dd id="{'time_'|cat:$op["mobile"]}">{$op['lastLoginTime']}</dd>
            </dl>
            <dl>
                <dt>IP地址</dt>
                <dd id="{'ip_'|cat:$op["mobile"]}">{$op['lastLoginIp']}</dd>
            </dl>
            <dl>
                <dt>登录地点</dt>
                <dd id="{'addr_'|cat:$op["mobile"]}"></dd>
            </dl>
            <dl>
                <dt>推广注册</dt>
                <dd id="{'ext_'|cat:$op["mobile"]}"></dd>
            </dl>
            <div class="scbc">
                <button id="{'del_'|cat:$op["mobile"]}" class="del">删除</button>
                <button id="{'save_'|cat:$op["mobile"]}" class="sav">保存</button>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    {/foreach}
</div>
{/if}
{if $lvl>90}
<div class="zu">
    <div class="fenlei">
        管理员（{$admins|@count}人）
    </div>
    {foreach $admins as $op}
        <div class="flcont">
            <div class="hengh" id="{'hengh_'|cat:$op["mobile"]}">
                <img src="img/touxiang.png"/>
                <span>LV{$op["levels"]}</span>
                <p>{$op["name"]}    &nbsp;&nbsp;&nbsp;{$op["mobile"]}</p>
                <div class="clearfix"></div>
            </div>
            <div class="xinxi hidden">
                <dl>
                    <dt>等级调整</dt>
                    <dd>
                        <button class="sub">-</button>
                        <input type="text" id={"lvl_"|cat:$op['mobile']} value="{$op['levels']}" />
                        <button class="add">+</button>
                    </dd>
                </dl>
                <dl>
                    <dt>最后一次登录时间</dt>
                    <dd id="{'time_'|cat:$op["mobile"]}">{$op['lastLoginTime']}</dd>
                </dl>
                <dl>
                    <dt>IP地址</dt>
                    <dd id="{'ip_'|cat:$op["mobile"]}">{$op['lastLoginIp']}</dd>
                </dl>
                <dl>
                    <dt>登录地点</dt>
                    <dd id="{'addr_'|cat:$op["mobile"]}"></dd>
                </dl>
                <dl>
                    <dt>推广注册</dt>
                    <dd id="{'ext_'|cat:$op["mobile"]}"></dd>
                </dl>
                <div class="scbc">
                    <button id="{'del_'|cat:$op["mobile"]}" class="del">删除</button>
                    <button id="{'save_'|cat:$op["mobile"]}" class="sav">保存</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{/if}
{if $lvl>70}
<div class="zu">
    <div class="fenlei">
        操作员（{$ops|@count}人）
    </div>
    {foreach $ops as $op}
        <div class="flcont">
            <div class="hengh" id="{'hengh_'|cat:$op["mobile"]}">
                <img src="img/touxiang.png"/>
                <span>LV{$op["levels"]}</span>
                <p>{$op["name"]}    &nbsp;&nbsp;&nbsp;{$op["mobile"]}</p>
                <div class="clearfix"></div>
            </div>
            <div class="xinxi hidden">
                <dl>
                    <dt>等级调整</dt>
                    <dd>
                        <button class="sub">-</button>
                        <input type="text" id={"lvl_"|cat:$op['mobile']} value="{$op['levels']}" />
                        <button class="add">+</button>
                    </dd>
                </dl>
                <dl>
                    <dt>最后一次登录时间</dt>
                    <dd id="{'time_'|cat:$op["mobile"]}">{$op['lastLoginTime']}</dd>
                </dl>
                <dl>
                    <dt>IP地址</dt>
                    <dd id="{'ip_'|cat:$op["mobile"]}">{$op['lastLoginIp']}</dd>
                </dl>
                <dl>
                    <dt>登录地点</dt>
                    <dd id="{'addr_'|cat:$op["mobile"]}"></dd>
                </dl>
                <dl>
                    <dt>推广注册</dt>
                    <dd id="{'ext_'|cat:$op["mobile"]}"></dd>
                </dl>
                <div class="scbc">
                    <button id="{'del_'|cat:$op["mobile"]}" class="del">删除</button>
                    <button id="{'save_'|cat:$op["mobile"]}" class="sav">保存</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{/if}
{if $lvl>60}
<div class="zu">
    <div class="fenlei">
        代理商（{$dgt|@count}人）
    </div>
    {foreach $dgt as $op}
        <div class="flcont">
            <div class="hengh" id="{'hengh_'|cat:$op["mobile"]}">
                <img src="img/touxiang.png"/>
                <span>LV{$op["levels"]}</span>
                <p>{$op["name"]}    &nbsp;&nbsp;&nbsp;{$op["mobile"]}</p>
                <div class="clearfix"></div>
            </div>
            <div class="xinxi hidden">
                <dl>
                    <dt>等级调整</dt>
                    <dd>
                        <button class="sub">-</button>
                        <input type="text" id={"lvl_"|cat:$op['mobile']} value="{$op['levels']}" />
                        <button class="add">+</button>
                    </dd>
                </dl>
                <dl>
                    <dt>最后一次登录时间</dt>
                    <dd id="{'time_'|cat:$op["mobile"]}">{$op['lastLoginTime']}</dd>
                </dl>
                <dl>
                    <dt>IP地址</dt>
                    <dd id="{'ip_'|cat:$op["mobile"]}">{$op['lastLoginIp']}</dd>
                </dl>
                <dl>
                    <dt>登录地点</dt>
                    <dd id="{'addr_'|cat:$op["mobile"]}"></dd>
                </dl>
                <dl>
                    <dt>推广注册</dt>
                    <dd id="{'ext_'|cat:$op["mobile"]}"></dd>
                </dl>
                <div class="scbc">
                    <button id="{'del_'|cat:$op["mobile"]}" class="del">删除</button>
                    <button id="{'save_'|cat:$op["mobile"]}" class="sav">保存</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{/if}
{if $lvl>50}
<div class="zu">
    <div class="fenlei">
        销售人员（{$salers|@count}人）
    </div>
    {foreach $salers as $op}
        <div class="flcont">
            <div class="hengh" id="{'hengh_'|cat:$op["mobile"]}">
                <img src="img/touxiang.png"/>
                <span>LV{$op["levels"]}</span>
                <p>{$op["name"]}    &nbsp;&nbsp;&nbsp;{$op["mobile"]}</p>
                <div class="clearfix"></div>
            </div>
            <div class="xinxi hidden">
                <dl>
                    <dt>等级调整</dt>
                    <dd>
                        <button class="sub">-</button>
                        <input type="text" id={"lvl_"|cat:$op['mobile']} value="{$op['levels']}" />
                        <button class="add">+</button>
                    </dd>
                </dl>
                <dl>
                    <dt>最后一次登录时间</dt>
                    <dd id="{'time_'|cat:$op["mobile"]}">{$op['lastLoginTime']}</dd>
                </dl>
                <dl>
                    <dt>IP地址</dt>
                    <dd id="{'ip_'|cat:$op["mobile"]}">{$op['lastLoginIp']}</dd>
                </dl>
                <dl>
                    <dt>登录地点</dt>
                    <dd id="{'addr_'|cat:$op["mobile"]}"></dd>
                </dl>
                <dl>
                    <dt>推广注册</dt>
                    <dd id="{'ext_'|cat:$op["mobile"]}"></dd>
                </dl>
                <div class="scbc">
                    <button id="{'del_'|cat:$op["mobile"]}" class="del">删除</button>
                    <button id="{'save_'|cat:$op["mobile"]}" class="sav">保存</button>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    {/foreach}
</div>
{/if}
<script src="script/basic.js" type="text/javascript" charset="utf-8"></script>
<script src="script/jquery-3.2.1.min.js" type="text/javascript" charset="utf-8"></script>
<script src="script/manage.js?v={$smarty.now}" type="text/javascript" charset="utf-8"></script>
</body>
</html>