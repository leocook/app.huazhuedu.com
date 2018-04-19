$(document).ready(function(){
    s=[];
	$('.wuliu').on('click',function(){
	    var id = this.id.split('_')[1];
	    var pre = "#c_"+id;
	    var $c = $(pre);
	    if(s[id] === true ){
            s[id]=false;
	        $c.slideUp();
        }else{
            get_info(id);
        }
	   });
});

var get_info = function(id){
    var mb = $('#mb').text();
    var d = {id_:id,mb_:mb};
    $.post('a.study.history.php',d).done(function(data){
        var nd =JSON.parse(data);
        if(nd.status === 'yes'){
            var pre = "#c_"+id;
            tmp = [];
            var dd = nd.data;
            $.each(dd,function(k,v){
                tmp.push(get_str(v));
            });
            var r = tmp.join('');
            s[id] = true;
            $(pre).html(r).slideDown();
        }else if(nd.errCode==='1'){
            sessionStorage.url='study_history.php';
            window.location.href = 'login_page.php';
        }else{
            alert(nd.msg);
        }
    });
};
var get_str = function(data){
    var head ='<div class="wuliu"><h2></h2><h1><p></p></h1><dl>'
    var foot='</dl></div>';
    var tmp = [];
    $.each(data,function(k,v){
        tmp.push('<dt>t1</dt>'.replace('t1',v));
    });
    var res = head + tmp.join('')+foot;
    return res;
};
