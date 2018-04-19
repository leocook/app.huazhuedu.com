$(document).ready(function () {
    get_data('area');

    $(".gd").on('click',function () {
        var id=this.id;
        get_line(id);
    });
});

function get_data(action){
    $.ajax({
        url : "a.chart.php",
        type : "post",
        data : {
            'action':action
        },
        async : true,
        success : function(data) {
            var result = JSON.parse(data);
            if(result["status"]==="no"){
                alert(result["msg"]);
            }
            else{
                var d=[];
                for(var i = 0;i<result['data'].length;i++){
                    d.push({'value':result['data'][i][1],'name':result['data'][i][0]});
                    $("#t"+[i+1]).text(result['data'][i][0]);
                    $("#c"+[i+1]).text(result['data'][i][1]);
                }
                drawPie(d);
            }
        }
    });
}


function drawPie(d){
    var myChart = echarts.init(document.getElementById('main'));
    var option = {
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {
                    show: true,
                    type: ['pie', 'funnel'],
                    option: {
                        funnel: {
                            x: '25%',
                            width: '50%',
                            funnelAlign: 'left',
                            max: 1548
                        }
                    }
                },
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'访问来源',
                type:'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:d
            }
        ]
    };

    myChart.setOption(option);
}
