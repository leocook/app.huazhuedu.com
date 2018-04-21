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
            var param = this.id.split('_');
            $(this).attr('src', 'img/btn_'+param[0] + '_2.png')
        },
        touchend: function () {
            var param = this.id.split('_');
            var tp = param[0];
            var mul_id = param[1];
            $(this).attr('src', 'img/btn_'+ tp + '_0.png');
            var id = 'mul_'+ mul_id;
            var val = man.data[id];
            switch(tp){
                case 'start':
                    if(val === 0){
                        man.data[id] =3;
                        man.turn_on_mul(mul_id,3);
                    }
                    break;
                case 'stop':
                    man.data[id] =0;
                    console.log(mul_id);
                    man.turn_off_mul(mul_id);
                    break;
                default:
                    break;
            }
        }
    });
    $(".bus_btn").on({
        touchstart: function () {
            $(this).attr('src', 'img/btn_zong_2.png');
        },
        touchend: function () {
            $(this).attr('src', 'img/btn_zong_0.png');
            var id = this.id.split('_')[1];
            var new_stat = (man.data['bus_'+id]+1)%2;
            if(new_stat===1){
                man.turn_on_bus(id);
            }else{
                man.turn_off_bus(id);
            }

        }

    });
    $(".switch").on({
        touchstart: function () {
            var id = this.id;
            var new_stat = (man.data[id]+1)%2;
            man.data[id] = new_stat;
            if(new_stat===1){
                man.turn_on_key(id);
            }else{
                man.turn_off_key(id);
            }
        }
    });
});

function Robot() {
    this.imgs = this._pre_load_img();
    this.data = this.Default;
    this.w = this.get_width();
    this.h = this.get_height();
    this.ctx = this.get_ctx();
    this.w_ratio = 0.75;
    this.h_ratio = 0.92;
    this.screen={
        main:{x:0,y:0,w:this.w*this.w_ratio,h:this.h*this.h_ratio},
        foot:{x:0,y:this.h*this.h_ratio,w:this.w,h:this.h*(1-this.h_ratio)},
        right:{x:this.w*this.w_ratio,y:0,w:this.w*(1-this.w_ratio),h:this.h}
    };
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

Robot.prototype.draw_start_screen= function(){
    var main_x =this.screen.main.x;
    var main_y =this.screen.main.y;
    var main_w =this.screen.main.w;
    var main_h =this.screen.main.h;
    var foot_x = this.screen.foot.x;
    var foot_y = this.screen.foot.y;
    var foot_w = this.screen.foot.w;
    var foot_h = this.screen.foot.h;
    var start_img = new Image();
    start_img.src = 'img/start_img.jpg';
    this.ctx.drawImage(start_img,0,0,this.screen.main.w,this.screen.main.h);
    var grd = this.create_gradient(foot_x,foot_y,0,this.h);
    this.ctx.fillStyle = grd;
    this.ctx.fillRect(foot_x,foot_y,foot_w,foot_h);

};

Robot.prototype.create_gradient= function(x1,y1,x2,y2){
    var grd=this.ctx.createLinearGradient(x1,y1,x2,y2);
    grd.addColorStop(0,'#ffffff');
    grd.addColorStop(1,"#000000");
    return grd;

};



Robot.prototype.Default ={
    key_1:0,key_2:0,key_3:0,
    mul_1:0,mul_2:3,mul_3:7,
    bus_101:0,bus_102:0,bus_103:0,bus_104:0,bus_105:0,
    bus_201:0,bus_202:0,bus_203:0,bus_204:0,bus_205:1,
    /*lamp_s : {
        lamp_alarm:0,lamp_start:1,
        lamp_101:0,lamp_104:0,lamp_201:0,lamp_204:0,
        lamp_102:0,lamp_105:0,lamp_202:0,lamp_205:0,
        lamp_103:1,lamp_106:0,lamp_203:0,lamp_206:1,
        mul_lamp_run:0,mul_lamp_alarm:0,
        bus_lamp_run:1,bus_lamp_forb:0,bus_lamp_allow:0
    }*/
};

Robot.prototype.init=function(){
    console.log('init');
    this.data = this.Default;
    var ds = this.data;
    for(var k in ds ){
        var tp = k.split('_')[0];
        var v = ds[k];
        switch(tp){
            case 'key':
                this.key_init(k,v);
                break;
            case 'bus':
                this.bus_init(k,v);
                break;
            case 'mul':
                this.mul_init(k,v);
                break;
            default:
                break;
        }
    }
    this.draw_start_screen();

};

Robot.prototype.turn_on_mul = function(id,val){
    for(var i = 3;i>0;i--){
        var lamp_id='#mul_lamp_'+id+'0'+(4-i);
        if(val & 4>>(i-1)){
            setTimeout(this.turn_on_lamp.bind(this),1000*(3-i),$(lamp_id));
        }
    }
};

Robot.prototype.turn_off_mul = function(id){
    for(var i = 2;i>=0;i--){
        var lamp_id = '#mul_lamp_'+id+'0'+(i+1);
        console.log(lamp_id);
        setTimeout(this.turn_off_lamp.bind(this),1000*(2-i),$(lamp_id));
    }
};

Robot.prototype.mul_init = function(k,v){
    var id = k.split('_')[1];
    this.turn_on_mul(id,v);
};

Robot.prototype.bus_init = function(k,v){
    if(v===1){
        var param = k.split('_');
        var id = param[1];
        this.turn_on_lamp($('#bus_lamp_a_'+id));
        this.turn_on_lamp($('#bus_lamp_b_'+id));
    }

};

Robot.prototype.turn_on_bus=function(id){
    $.when(
        this.turn_lamp_delay($('#bus_lamp_a_'+id),1000,1),
        this.turn_lamp_delay($('#bus_lamp_b_'+id),2000,1)
    ).then(
        this.change_bus_val('bus_'+id,1)
    );
};

Robot.prototype.turn_off_bus=function(id){
    $.when(
        this.turn_lamp_delay($('#bus_lamp_b_'+id),1000,0),
        this.turn_lamp_delay($('#bus_lamp_a_'+id),2000,0)
    ).then(
        this.change_bus_val('bus_'+id,0)
    );
};

Robot.prototype.turn_lamp_delay = function($ele,delay,val){
        var dfd = $.Deferred();
        var that = this;
        setTimeout(function(){
            that.turn_lamp($ele,val);
        },delay);
        return dfd.promise();
};

Robot.prototype.change_bus_val=function(id,val){
    this.data[id] = val;
};

Robot.prototype.key_init=function(k,v){
   var $ele_allow = $('#'+k+'_allow');
   var $ele_forb = $('#'+k+'_forb');
   if(v===1){
       this.turn_on_lamp($ele_allow);
       this.turn_off_lamp($ele_forb);
   }else{
       this.turn_on_lamp($ele_forb);
       this.turn_off_lamp($ele_allow);
   }
};

Robot.prototype.lamps_init=function(lamps){
    var k;
    for( k in lamps){
        var $ele = $('#'+k);
        if(lamps[k]===1){
            this.turn_on_lamp($ele);
        }else{
            this.turn_off_lamp($ele);
        }
    }
};

Robot.prototype.clear_timer = function(){
    for(var i in this.timer){
        for(var j in this.timer[i]){
            clearTimeout(this.timer[i][j]);
        }
    }
};

Robot.prototype.turn_on_key = function(switch_id){
    this.turn_key(switch_id,1);
};
Robot.prototype.turn_off_key = function(switch_id){
    this.turn_key(switch_id,0);
};

Robot.prototype.turn_key = function(switch_id,val){
    $ele = $('#'+switch_id);
    $ele.find('img').attr('src','img/key_'+val+'.png');
    var $ele_allow = $('#'+switch_id+'_allow');
    var $ele_forb = $('#'+switch_id+'_forb');
    if(val === 1){
        this.turn_on_lamp($ele_allow);
        this.turn_off_lamp($ele_forb);
    }else{
        this.turn_on_lamp($ele_forb);
        this.turn_off_lamp($ele_allow);
    }
};


Robot.prototype.turn_on_lamp = function($ele){
    this.turn_lamp($ele,1);
};
Robot.prototype.turn_off_lamp = function($ele){
    this.turn_lamp($ele,0);
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
    $(".screen").html("<canvas id='can_top' width='" + this.w + "' height='" + this.h + "'/>");
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