$(document).ready(function(){
    $('.sub').on('click',function(){
        var d = get_info();
        $.post('a.reg.in.class.php',d,function(data){
            sessionStorage.url = 'reg_in_class.php?id='+d.uid;
            var nd = JSON.parse(data);
            alert(nd.msg);
            if(nd.errCode == 1){
                window.location.href = 'login_page.php';
            }
            if(nd.errCode == 0){
                window.location.href = 'my_cust.php';
            }
        });
    });

    $('.radio_z').on('change',function(){
        var id = this.id;
        switch (id){
            case 'z_01':
                $('.rt').slideDown();
                break;
            case 'z_02':
                $('.rt').slideUp();
                break;
            default:
                break;
        }
    });

});

var get_info = function(){
    var z= $("input[name='z']:checked").val();
    var d = $("input[name='d']:checked").val();
    var c = $("input[name='c']:checked").val();
    var z_start = $('#z_start').val();
    var z_end = $('#z_end').val();
    var z_cls = $('#z_cls').val();
    var uid = $('.uid').text();
    return {z_:z,d_:d,c_:c,z_start_:z_start,z_end_:z_end,z_cls_:z_cls,uid_:uid};
};