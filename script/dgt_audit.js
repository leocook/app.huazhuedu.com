$(document).ready(function () {
    $('.hengh').on('click',function(){
        var openId = this.id.split('_')[1];
        $("#x_"+openId).slideToggle();
    });
    $('.btn_rej').on('click',function(){
        var openId = this.id.split('_')[1];
        cback(openId,'rej');
    });
    $('.btn_pass').on('click',function(){
        var openId = this.id.split('_')[1];
        cback(openId,'pass');
    });
});
var cback = function (id,p) {
    $.ajax({
        url : "a.dgt.php",
        type : "post",
        data : {
            mb: id,
            action:p
        },
        async : true,
        success : function(data) {
            var result = JSON.parse(data);
            alert(result["msg"]);
        }
    });
};