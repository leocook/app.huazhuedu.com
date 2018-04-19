$(document).ready(function () {
    counter=1;
    qmax=parseInt($("#totle").text());
    $(".btn_pre").click(function () {
        breath();
        var id = "#q"+counter;
        counter=counter-1;
        if(counter<=0){
            counter=1;
        }
        var pre = "#q"+counter;
        $(id).addClass("hidden");
        $(pre).removeClass("hidden");
    });


    $(".btn_next").click(function () {
        breath();
        var id = "#q"+counter;
        var q_num=$('#qid'+counter).text();
        var name ="del_q_"+counter;
        if($('input[name="'+name+'"]').is(':checked')) {
            update_wset(q_num);
             window.location=location;
        }
        counter=counter+1;
        if(counter>qmax){
            counter=qmax;
            alert("测试完毕，已经到最后一题！");
            }
        var next='#q'+counter;
        $(id).addClass("hidden");
        $(next).removeClass("hidden");

    });


    $('input:radio').change( function(){
        check_answer(counter);
    });

    $('input:checkbox').change( function(){
        if($(this).attr('name').indexOf('del')===-1){
            check_answer(counter);
        }
    });

});

function get_result(i,c) {
    var rmap=['A','B','C','D','E','F','G','H','I','J','K','L','M','N'];
    var n,result;
    switch (i) {
        case 1:
        case 3:
        case 4:
            n="r"+c;
            result= $('input:radio[name="'+n+'"]:checked').val();
            var t = result-1;
            return rmap[t];
        case 2:
            n ="c"+c;
            result="";
            $('input[name="'+n+'"]').each(function () {
                if (this.checked) {
                    result += rmap[this.value-1];
                }
            });
            return result;
        default:
            alert("参数错误，该类型暂时不支持！");
            return "";
    }
}

function check_answer(c){
    var pre ="#RA"+c;
    var type = get_type(c);
    var answer = get_result(type,c);
    var c_answer=$(pre).text();
    if((type=2)&&(c_answer.length >answer.length) ){
        hide_wrong(c);
        hide_right(c);
        show_qsign(c);
    }
    else{
        if(c_answer !== answer ){
            $("#RAD"+c).removeClass("hidden");
            hide_qsign(c);
            hide_right(c);
            show_wrong(c);
        }
        else {
            $("#RAD"+c).removeClass("hidden");
            hide_qsign(c);
            hide_wrong(c);
            show_right(c);
        }
    }
}

function get_type(c){
    var pre ="#type"+c;
    return parseInt($(pre).text());
}

function show_right(c){
    $("#fr"+c).removeClass("hidden");
}

function hide_right(c){
    $("#fr"+c).addClass("hidden");
}

function show_qsign(c){
    $("#fqs"+c).removeClass("hidden");
}

function hide_qsign(c){
    $("#fqs"+c).addClass("hidden");
}

function show_wrong(c){
    $("#fw"+c).removeClass("hidden");
}

function hide_wrong(c){
    $("#fw"+c).addClass("hidden");
}

/* 集体删除错题集
function get_del_str(c) {
    var num =c+1;
    var result=[];
    for(var i = 1;i<num;i++){
        var name ="del_q_"+i;
        var id= "#qid"+i;
        if($('input[name="'+name+'"]').is(':checked')) {
            result.push($(id).text());
        }
    }
    return JSON.stringify(result);
}
*/

function update_wset(d){
    $.ajax({
        url: "update_wrong_set.php",
        type: "post",
        data: {
            p: d
        },
        async: false,
        success: function (result) {
            alert(JSON.parse(result)["result"]);
        }
    });
}
function breath(){
    $.get("live.php",function (data) {
    });
}
