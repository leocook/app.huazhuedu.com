$(document).ready(function () {
    man = new Robot();
    man.init();
    $(".bn").on({
        touchstart: function () {
            var id = this.id;
            $(this).attr('src', 'img/'+id + '_2.png')
        },
        touchend: function () {
            var id = this.id;
            $(this).attr('src', 'img/'+id + '_0.png')

        }
    });
    $(".bns").on({
        touchstart: function () {
            var param = this.id.split('_')[0];
            $(this).attr('src', 'img/btn_'+param + '_2.png')
        },
        touchend: function () {
            var param = this.id.split('_')[0];
            $(this).attr('src', 'img/btn_'+param + '_0.png')

        }
    });
    $(".z_btn").on({
        touchstart: function () {
            $(this).attr('src', 'img/btn_zong_2.png')
        },
        touchend: function () {
            $(this).attr('src', 'img/btn_zong_0.png')

        }
    });
    $(".switch").on({
        touchstart: function () {
            var id = this.id;
            var new_stat = (man.keys[id]+1)%2;
            man.keys[id] = new_stat;
            $(this).find('img').attr('src','img/key_'+new_stat+'.png');
            var $ele_allow = $('#'+id+'_allow');
            man.turn_lamp($ele_allow,new_stat);

        }
    });
});

function Robot(){
    this.imgs = this._pre_load_img();
    this.keys ={key_1:0,key_2:0,key_3:0};
    this.stat={w:0,h:0};
    this.lamp = {
        lamp_11:0,lamp_12:0,lamp_13:0,lamp_14:0,lamp_15:0,
        lamp_21:0,lamp_22:0,lamp_23:0,lamp_24:0,lamp_25:0,
        lamp_31:0,lamp_32:0,lamp_33:1,lamp_34:0,lamp_35:0,
        lamp_41:0,lamp_42:1,lamp_43:0,lamp_44:0,lamp_45:0
    };
    this.mul={
        mul_11:0,mul_12:0,mul_13:0,
        mul_21:0,mul_22:0,mul_23:0,
        mul_31:0,mul_32:0,mul_33:0,
        mul_41:0,mul_42:0,mul_43:0,
        mul_51:0,mul_52:0,mul_53:0,
        mul_61:0,mul_62:0,mul_63:0
    };
    this.scrn={
        start_mod:{manual:1,auto:0,index:0},
        self_check:{menu_show:0},
        rec_check:{menu_show:0,menu_index:0,rec:[
                {id:"000000",msg:"喷洒允许",stat:"设置"},
                {id:"000001",msg:"自动禁止",stat:"设置"},
                {id:"000002",msg:"手动禁止",stat:"设置"},
                {id:"000003",msg:"光柵测温",stat:"屏蔽"},
                {id:"000004",msg:"注册设备",stat:"操作"},
                {id:"000005",msg:"注册示盘",stat:"操作"},
                {id:"000006",msg:"消防广播",stat:"启动"}
            ],his_rec_list:0}
    };
    this.timer={
        scrn:[],lamp:[],normal:[],mul:[]
    };
    this.stat.w = this.get_width();
    this.stat.h = this.get_height();
    this.ctx = this.get_ctx();
}
//主机初始状态，在每次初

Robot.prototype.btn=['F1','F2','F3','F4','F5','F6',
    '11','12','13','14','15','16',
    '21','22','23','24','25','26',
    '31','32','33','34','35','36',
    '41','42','43','44','45','46',
    'reset','check','clear','start','stop','zong'
];
Robot.prototype._pre_load_img= function(){
    var list = this.btn;
    var arr_img_path=[];
    var len = list.length;
    for (var i=0; i<len;i++){
        arr_img_path.push('img/btn_'+list[i]+'_0.png');
        arr_img_path.push('img/btn_'+list[i]+'_1.png');
        arr_img_path.push('img/btn_'+list[i]+'_2.png');
    }
    var arr_img_count = arr_img_path.length;
    var imgs=[];
    for(var j=0;j<arr_img_count;j++){
        var img = new Image();
        img.src =  arr_img_path[j];
        imgs.push(img);
    }
    return imgs;
};



Robot.prototype.Default ={
    'res':{ctx: null, shield_num: "",shield_code:""},
    'stat':{
        mul_start:0,mul_self_check:0,mul_1:0, mul_2:0, mul_3:0, mul_4:0, mul_5:0, mul_6:0, alarm:0,
        self_check:0,pwd:0,set_start_mod:0,his_rec:0,shield:0,nc_flag:0,shield_cancel:0,reset:0
    },
    'lamp': {
        lamp_11:0,lamp_12:0,lamp_13:0,lamp_14:0,lamp_15:0,
        lamp_21:0,lamp_22:0,lamp_23:0,lamp_24:0,lamp_25:0,
        lamp_31:0,lamp_32:0,lamp_33:1,lamp_34:0,lamp_35:0,
        lamp_41:0,lamp_42:1,lamp_43:0,lamp_44:0,lamp_45:0
    },
    'mul':{
        mul_11:0,mul_12:0,mul_13:0,
        mul_21:0,mul_22:0,mul_23:0,
        mul_31:0,mul_32:0,mul_33:0,
        mul_41:0,mul_42:0,mul_43:0,
        mul_51:0,mul_52:0,mul_53:0,
        mul_61:0,mul_62:0,mul_63:0
    },
    'scrn':{
        start_mod:{manual:1,auto:0,index:0},
        self_check:{menu_show:0},
        rec_check:{menu_show:0,menu_index:0,rec:[
                {id:"000000",msg:"喷洒允许",stat:"设置"},
                {id:"000001",msg:"自动禁止",stat:"设置"},
                {id:"000002",msg:"手动禁止",stat:"设置"},
                {id:"000003",msg:"光柵测温",stat:"屏蔽"},
                {id:"000004",msg:"注册设备",stat:"操作"},
                {id:"000005",msg:"注册示盘",stat:"操作"},
                {id:"000006",msg:"消防广播",stat:"启动"}
            ],his_rec_list:0}

    }
};

Robot.prototype.init=function(){
    var ctx = this.ctx;
    var old_style = ctx.fillStyle;
    var old_font = ctx.font;
    var old_stroke = ctx.strokeStyle;
    var w=this.stat.w;
    var h = this.stat.h;
    ctx.font = "bold 20px 微软雅黑";
    ctx.fillText("GST",0,25);
    ctx.font = "bold 12px 微软雅黑";
    var ver_str ="GST5000 V1.2";
    var comp_str = "GULF SECURITY TECH CO., LTD.";
    var l = ctx.measureText(ver_str).width;
    ctx.fillText(ver_str,w-l-25,30);
    ctx.font = "bold 12px 微软雅黑";
    ctx.fillText(comp_str,0,45);
    ctx.moveTo(0,33);
    ctx.lineTo(w,33);
    ctx.lineWidth=2;
    ctx.strokeStyle="#fff";
    ctx.stroke();
    ctx.fillStyle=old_style;
    ctx.font=old_font;
    ctx.strokeStyle = old_stroke;
};


Robot.prototype.to_default=function(){
    this.clear_timer();
    this.mul = this.Default.mul;
    this.lamp = this.Default.lamp;
    this.stat = this.Default.stat;
    this.stat.w = this.get_width();
    this.stat.h = this.get_height();
    this.ctx = this.get_ctx();
    this.init();
};


Robot.prototype.clear_timer = function(){
    for(var i in this.timer){
        for(var j in this.timer[i]){
            clearTimeout(this.timer[i][j]);
        }
    }

};


Robot.prototype.turn_lamp = function($ele,stat){
    var old_path = $ele.attr('src');
    var new_path = old_path.slice(0,-5)+stat+'.png';
    $ele.attr('src',new_path);
};

Robot.prototype.get_width = function(){
    return $(".screen").width();
};
Robot.prototype.get_height = function(){
    return $(".screen").height();
};
Robot.prototype.get_ctx = function(){
    $(".screen").html("<canvas id='can_top' width='" + this.stat.w + "' height='" + this.stat.h + "'/>");
    var c = document.getElementById("can_top");
    var ctx = c.getContext("2d");
    ctx.fillStyle = "#fff";
    ctx.font = "12px 微软雅黑";
    ctx.strokeStyle = "#666";
    return ctx;
};

function audioAutoPlay() {
    var audio = document.getElementById('bg-music');
    audio.play();
    document.addEventListener("WeixinJSBridgeReady", function () {
        audio.play();
    }, false);
}
// 音乐播放
function autoPlayMusic() {
    // 自动播放音乐效果，解决浏览器或者APP自动播放问题
    function musicInBrowserHandler() {
        musicPlay(true);
        document.body.removeEventListener('touchstart', musicInBrowserHandler);
    }

    document.body.addEventListener('touchstart', musicInBrowserHandler);

    // 自动播放音乐效果，解决微信自动播放问题
    function musicInWeixinHandler() {
        musicPlay(true);
        document.addEventListener("WeixinJSBridgeReady", function () {
            musicPlay(true);
        }, false);
        document.removeEventListener('DOMContentLoaded', musicInWeixinHandler);
    }

    document.addEventListener('DOMContentLoaded', musicInWeixinHandler);
}
function musicPlay(isPlay) {
    var media = document.querySelector('#bg-music');
    if (isPlay && media.paused) {
        media.play();
    }
    if (!isPlay && !media.paused) {
        media.pause();
    }
};

Date.prototype.Format = function (fmt) { //author: meizz
    var o = {
        "M+": this.getMonth()+1, //月份
        "d+": this.getDate(), //日
        "h+": this.getHours(), //小时
        "m+": this.getMinutes(), //分
        "s+": this.getSeconds(), //秒
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度
        "S": this.getMilliseconds() //毫秒
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
        if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length === 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
};