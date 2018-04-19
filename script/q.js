$(document).ready(function () {
    $('.sub').on('click',function () {
        check_value();
        $(this).submit();
    });

});

var check_mb = function(mb){
    var re = /^0?(13|14|15|16|17|18|19)[0-9]{9}$/;
    if(re.test(mb)){
        return true;
    }
};
var check_name = function(name){
    var re = /^[\u4E00-\u9FA5]{2,8}$/;
    if(re.test(name)){
        return true;
    }
};
var check_com = function(com){
    var re = /^[\u4E00-\u9FA5A-Za-z0-9]{4,30}$/;
    if(re.test(com)){
        return true;
    }
};
var check_tea = function(tea){
    var re = /^[\u4E00-\u9FA5]{2,8}$/;
    if(re.test(tea)){
        return true;
    }
};


var check_value = function () {
    var mb = $("#mb").val()
    var nam= $("#nam").val();
    var com= $("#com").val();
    var tea= $("#tea").val();
    if(mb==='' || !check_mb(mb)){
        alert("手机号码是未填写正确");
        $("#mb").focus();
        return;
    }
    if(com === '' || !check_com(com)){
        alert("请填写合适的公司名称");
        $("#com").focus();
        return;
    }
    if(nam === '' || !check_name(nam)){
        alert("请填写合适的姓名");
        $("#nam").focus();
        return;
    }
    if(tea === '' || !check_tea(tea)){
        alert("请填写为您推荐的老师的姓名");
        $("#tea").focus();
        return;
    }
};
