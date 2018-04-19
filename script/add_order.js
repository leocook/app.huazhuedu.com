$(document).ready(function () {
    $("#code_img").on('click',function(){
        change_code();
    });
    $("#search_img").on('click',function() {
        var mb = $("#search_input").val();
        flush_order(mb);
    });

    $('#add_course').on('click',function(){
        var mb = $("#mb").val();
        var mbc = $("#mbc").val();
        if(!valid_mobile(mb)){
            alert("手机号码格式不对!");
            $("#mb").focus();
            return;
        }
        if(mbc!==mb){
            alert("两次输入不一致，请检查");
            $("#mbc").focus();
            return;
        }
        var code = $("#code_txt").val();
        add_order(mb,code);
    });

});

var gen_order=function(ords,mb){
    var arr=[];
    for (var i in ords){
            arr.push('<div class="kecheng"><div class="bt">');
            arr.push('<p>'+ords[i]['des']+'</p>');
            arr.push('<span>'+ords[i]['tim']+'</span>');
            if(ords[i]['stat']==='1'){
                arr.push('<img src="img/youxiao.png"/>');
            }
            arr.push('</div><div class="cont">');
            if(ords[i]['gid'].indexOf('365')){
                arr.push('<img src="img/order_a_'+ords[i]['stat']+'.png"/>');
            }else{
                arr.push('<img src="img/order_l_'+ords[i]['stat']+'.png"/>');
            }
            arr.push('<div class="descrip">');
            arr.push('<p class="ming">'+ords[i]['des']+'</p>');
            arr.push('<p>截止日期：'+ords[i]['exp']+'</p>');
            arr.push('<p>剩余时长：<span class="time">'+gen_left(ords[i]['exp'])+'</span></p>');
            if(ords[i]['stat']==='1'){
                arr.push('</div></div><div class="chu"><span><img src="img/shanchu.png"/><p onclick="javascript:del_order('+ords[i]['id']+','+mb+')">删除课程</p></span></div></div>');
            }else{
                arr.push(' </div><img src="img/guoqi.png" class="guoqi"/></div><div class="chu"><span><img src="img/shanchu.png"/><p onclick="javascript:del_order('+ords[i]['id']+','+mb+')">删除课程</p></span> </div> </div>');
            }
    }
    return arr.join('');
};

var gen_left = function($d){
    var _now = new Date();
    var stamp1 = Date.parse(_now);
    var stamp2 =Date.parse($d.replace(/[-]/g,'/'));
    if((stamp2-stamp1)<=0){
        return "已过期";
    }
    var ndate =  new Date();
    ndate.setTime(stamp2-stamp1);
    var _year = ndate.getUTCFullYear()-1970;
    var _mon =  ndate.getUTCMonth();
    var _date = ndate.getUTCDate();
    var _hour = ndate.getUTCHours();
    var _min = ndate.getUTCMinutes();
    var _sec = ndate.getUTCSeconds();
    if(_year>0){
        return _year+'年'+_mon+'月'+_date+'天'+_hour+'小时'+_min+'分'+_sec+'秒';
    }else if(_mon>0){
        return _mon+'月'+_date+'天'+_hour+'小时'+_min+'分'+_sec+'秒';
    }else if(_date>0){
        return _date+'天'+_hour+'小时'+_min+'分'+_sec+'秒';
    }else if(_hour>0){
        return _hour+'小时'+_min+'分'+_sec+'秒';
    }else if(_min>0){
        return _min+'分'+_sec+'秒';
    }else if(_sec>0){
        return _sec+'秒';
    }else{
        return "已过期";
    }
};

var flush_order=function(mb){
    $.ajax({
        url: "a_in_order.php",
        type: "post",
        data: {
            'action':'search',
            'mb':mb
        },
        async: true,
        success: function (data) {
            change_code();
            var r = JSON.parse(data);
            if (r["status"] === "no") {
                alert(r['msg']);
            }
            else {
                $(".pholder").html(gen_order(r['orders'],r['mb']));//传回mb,方便删除时记录查询手机号码
            }
        }
    });
};
var add_order = function(mb,code){
    $.ajax({
        url: "a_in_order.php",
        type: "post",
        data: {
            'action':'add',
            'mb':mb,
            'code':code
        },
        async: true,
        success: function (data) {
            var r = JSON.parse(data);
            if (r["status"] === "no") {
                alert(r['msg']);
            }
            else {
                alert(r['msg']);
                flush_order(mb);
            }
        }
    });
};

var del_order = function(id,mb){
    $.ajax({
        url: "a_in_order.php",
        type: "post",
        data: {
            'action':'del',
            'id':id
        },
        async: true,
        success: function (data) {
            var r = JSON.parse(data);
            if (r["status"] === "no") {
                alert(r['msg']);
            }
            else {
                alert(r['msg']);
                flush_order(mb);
            }
        }
    });
};

var change_code = function(){
    document.getElementById('code_img').src = 'code.php?r=' + Math.random();
};

var valid_mobile = function(mb){
    var re = /^0?(13|14|15|16|17|18|19)[0-9]{9}$/;
    if(re.test(mb)){
        return true;
    }
};