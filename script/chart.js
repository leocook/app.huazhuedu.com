$(document).ready(function () {
    get_line('week');

    $(".gd").on('click',function () {
        var id=this.id;
        get_line(id);
    });
});

function get_line(id){
    $.ajax({
        url : "include/get_chart_data.php",
        type : "get",
        data : {
            type: id
        },
        async : true,
        success : function(data) {
            var result = JSON.parse(data);
            if(result["err"]==="no"){
                alert(result["err"]);
            }
            else{
                var ylist=[],pts=[];
                for(var i = 0;i<result['d'].length;i++){
                    pts.push(result["d"][i][0]);
                    ylist.push(result["d"][i][1]);
                }
                drawP(ylist,pts);
            }
        }
    });
}


function drawP(y,p){
    var myChart = echarts.init(document.getElementById('main'));
    var option = {
        xAxis: {
            data: y
        },
        yAxis: {},
        series: [{
            name: '注册人数',
            type: 'line',
            data: p
        }]
    };
    myChart.setOption(option);
}
