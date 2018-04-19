
$(document).ready(function () {
    $(".hengh").click(function () {
        var openId = this.id.split('_')[1];
        $(this).next().slideToggle();
        $.ajax({
            url: "a.manage.php",
            type: "post",
            data: {
                'mb': openId,
                'ip': $("#ip_"+openId).text(),
                'action': 'search'
            },
            async: true,
            success: function (result) {
                var r=JSON.parse(result);
                $("#addr_"+openId).text(r['addr']);
                $("#ext_"+openId).text(r['num']+"人");
            }
        });
    });
    $(".sub").click(function () {
        var num= parseInt($(this).next().val(),'10');
        if(num<=0){
            num = 0;
            return;
        }
        $(this).next().val(num-1);
    });
    $(".add").click(function () {
        var num= parseInt($(this).prev().val(),'10');
        if(num>=99){
            num = 99;
            return;
        }
        $(this).prev().val(num+1);
    });

    $(".sav").click(function () {
        var openId = this.id.split('_')[1];
        var lvl = $("#lvl_"+openId).val();
        $.ajax({
            url: "a.manage.php",
            type: "post",
            data: {
                'mb': openId,
                'lvl':lvl,
                'action': 'change'
            },
            async: true,
            success: function (result) {
                var r=JSON.parse(result);
                if(r['status']==='yes'){
                    alert(r['msg']);
                    window.location.href = window.location.href;
                }else{
                    alert(r['msg']);
                }
            }
        });

    });
    $(".del").click(function () {
        var openId = this.id.split('_')[1];
        $.ajax({
            url: "a.manage.php",
            type: "post",
            data: {
                'mb': openId,
                'lvl':1,
                'action': 'change'
            },
            async: true,
            success: function (result) {
                var r=JSON.parse(result);
                if(r['status']==='yes'){
                    alert(r['msg']);
                    window.location.href = window.location.href;
                }else{
                    alert(r['msg']);
                }
            }

        });

    });





});