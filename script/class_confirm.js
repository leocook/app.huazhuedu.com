$(document).ready(function(){
    p_stat = [];
    $('.ban').on('click',function(){
        var id = this.id.split('_')[1];
        var pre = '#status_'+id;
        $(pre).slideToggle();
    });
    $('.status').on('click',function(){
        var id = this.id;
        var cid = id.split('_')[1];
        var status = id.split('_')[2];
        var pre = '#'+status+'_'+cid;
        $(pre).slideToggle();
    });
    $('.person').on('click',function(){
        var id = this.id;
        var sid = id.split('_')[1];
        var pre = '#pinfo_'+sid;
        if(p_stat[sid] === true){
            p_stat[sid] = false;
            $(pre).slideUp();
        }else{
            get_info(sid,pre);
        }
    });

    $('.gre').on('click',function(){
        var id = this.id;
        var sid = id.split('_')[1];
        var stp = id.split('_')[0]
        var cid = id.split('_')[2];
        var d={id_:sid,tp_:stp,cid_:cid};
        ch_stat(d);
    });
    $('.red').on('change',function(){
        var id = this.id;
        var sid =  id.split('_')[1];
        var stp = id.split('_')[0];
        var cid = $(this).val();
        var d = {id_:sid,tp_:stp,cid_:cid};
        ch_stat(d);
    });
});

var get_info=function(sid,pre){
    var d={id_:sid};
    $.post('a.class.conform.php',d).done(function(data){
        nd = JSON.parse(data);
        if(nd.status === 'no'){
            alert(nd.msg);
            if(nd.errCode === 1){
                sessionStorage.url = 'class_conform.php';
                window.location.href = 'login_page.php';
            }
        }else{
            var c= "#p_"+sid;
            var model = '<div class="inform"><p>str1</p><span>str2</span><div class="clearfix"></div></div>';
            var tmp = [];
            $.each(nd.data,function(index,dom){
                tmp.push(model.replace('str1',dom['des']).replace('str2',dom['val']));
            });
            var str=tmp.join('');
            p_stat[sid] = true;
            $(c).html(str);
            $(pre).slideDown();
        }

    });
};

var ch_stat = function(info){
    $.post('a.class.change.php',info).done(function(data){
        d= JSON.parse(data);
        alert(d.msg);
        if(d.status === 'yes'){
            window.location.href = 'class_confirm.php';
        }
    });

};