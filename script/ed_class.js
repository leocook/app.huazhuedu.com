$(document).ready(function(){
    $('.sub').on('click',function(){
        d= get_info();
        $.post('a.ed.class.php',d).done(function(data){
            nd = JSON.parse(data);
            alert(nd.msg);
            if(nd.errCode === 1){
                sessionStorage.url = 'in_class.php';
                window.location.href = 'login_page.php';
            }else if(nd.status === 'yes'){
                window.location.href = 'class_info.php';
            }
        });
    });

});

var get_info = function(){
    var name = $('#c_nam').val();
    var count = $('#c_count').val();
    var start = $('#c_start').val();
    var end = $('#c_end').val();
    var addr = $('#c_addr').val();
    var closed = $('#c_closed').val();
    var des = $('#c_des').val();
    var cid = $('.cid').text();
    return {nam_:name,count_:count,start_:start,end_:end,addr_:addr,closed_:closed,des_:des,cid_:cid}
};