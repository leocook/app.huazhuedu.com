$(document).ready(function(){
    $('.sub').on('click',function(){
        var d = get_info();
        $.post('a.in.cust.php',d,function(data){
            sessionStorage.url='in_cust.php';
            var nd = JSON.parse(data);
            alert(nd.msg);
            if(nd.errCode == 1){
                window.location.href = 'login_page.php';
            }else if(nd.errCode == 0){
                window.location.href = 'my_cust.php';
            }else{}
        });
    });
});
var get_info = function(){
    var name = $('.nam').val();
    var id = $('.idd').val();
    var mb = $('.mb').val();
    var tel = $('.tel').val();
    var com = $('.company').val();
    var des = $('.des').val();
    return {nam_:name,id_:id,mb_:mb,tel_:tel,com_:com,des_:des}
};