$(document).ready(function () {
    var mb_stat=0;
    var pwd_stat=0;
    $(".btn_code").click(function(){
        if(mb_stat && pwd_stat){
            $.ajax({
                url : "a.chpwd.php",
                type : "post",
                data : {
                    mb: $("#mb_sign").val(),
                    action:'sms'
                },
                async : true,
                success : function(data) {
                    var result = JSON.parse(data);
                    alert(result["msg"]);
                }
            });
        }else{
            alert("电话号码或密码不符合规定");
        }
    });

    $("#mb_sign").blur(function(){
        var mobile =this.value;
        var re = /^0?(13|14|15|16|17|18|19)[0-9]{9}$/;
        if(input_check(re,mobile,"手机号码非法，请重新输入","mb_sign")){
            mb_stat=1;
        }else{
            mb_stat=0;
        }
    });

    $("#pwd_sign").blur(function(){
        var pwd =this.value;
        var re = /^[a-zA-Z\d_]{8,}$/;
        if(input_check(re,pwd,"密码最少8位，字母数字组合","pwd_sign")){
            pwd_stat=1;
        }else{
            pwd_stat=0;
        }
    });


    $(".btn_ch").click(function () {
        if(mb_stat && pwd_stat){
            $.ajax({
                url : "a.chpwd.php",
                type : "post",
                data : {
                    mb: $("#mb_sign").val(),
                    pwd: $("#pwd_sign").val(),
                    code: $("#code_sign").val(),
                    action:'ch'
                },
                async : true,
                success : function(data) {
                    var result = JSON.parse(data);
                    if(result["status"]==="no"){
                        alert(result["msg"]);
                    }
                    else {
                        alert(result["msg"]);
                        clear_value();
                        window.location.href = "login_page.php";
                    }
                }
            });
        }else{
            alert("电话号码或密码不符合规定");
        }
    });
    $(".btn_clean").click(function(){
        clear_value();
    });
});

function input_check(re,str,tip,id){
    var ele=$("#"+id);
    if(!re.test(str)){
        ele.attr("placeholder",tip);
        return false;
    }else{
        return true;

    }
}


function clear_value(){
    document.getElementById("mb_sign").value = "";
    document.getElementById("pwd_sign").value = "";
    document.getElementById("code_sign").value = "";
}