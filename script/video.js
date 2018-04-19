$(document).ready(function () {
    var player = new CloudVodPlayer();
    player.init({uu:"hg9fnfcvyn",vu:"03f4e0ff94",auto_play:1,autoSize:1,control:1,dfull:0,changeParent:1,loadingurl:"",posterType:"3"},'pplayer');
    $(".catagory").click(function(){
        var pre ="#list_"+this.id;
        $(pre).slideToggle("fast");
    });

    $(".list_div").click(function() {
        var openId = this.id;
        $.ajax({
            url: "a.video.php",
            type: "post",
            data: {
                'id':openId
            },
            async: true,
            success: function (data) {
                var r = JSON.parse(data);
                if (r["status"] === "no") {
                    switch (r["errcode"]){
                        case 1:
                            sessionStorage.url = window.location.href;
                            jqalert({
                                title: '友情提示',
                                content: r['msg'],
                                yestext: '去登陆',
                                notext: '再看看',
                                yeslink: 'login_page.php'
                            });
                            break;
                        case 2:
                            jqalert({
                                title: '友情提示',
                                content: r['msg'],
                                yestext: '购买课程',
                                notext: '继续试用',
                                yeslink: 'buy.php'
                            });
                            break;
                        default:
                            jqalert({
                                title: '友情提示',
                                content: r['msg']
                            });
                            break;
                    }

                }
                else {
                    var xx = r['path'];
                    player.sdk.playNewId({vu: xx});
                }
            }
        });
    });

    $(".tabcont").hide().eq(0).show();
    $(".tab span").on('click',function(){
        $(".tabcont").hide().eq($(".tab span").index(this)).show();
    });
});
