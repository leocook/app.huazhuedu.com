$(document).ready(function(){
    $('.sub').on('click',function(){
        var d = get_info();
        $.post('a.ed.cust.php',d,function(data){
            var n_data = JSON.parse(data);
            alert(n_data.msg);
            switch (parseInt(n_data.errCode)){
                case 1:
                    sessionStorage.url = 'ed_cust.php?id='+d.uid_;
                    window.location.href = 'login_page.php';
                    break;
                case 0:
                    window.location.href = sessionStorage.url;
                    break;
                default:
                    break;
            }


    });
    });
});

var get_info = function(){
    var uid = $('.uid').text();
    var name = $('.nam').val();
    var id = $('.idd').val();
    var mb = $('.mb').val();
    var tel = $('.tel').val();
    var com = $('.company').val();
    var des = $('.des').val();
    return {nam_:name,id_:id,mb_:mb,tel_:tel,com_:com,des_:des,uid_:uid}
};