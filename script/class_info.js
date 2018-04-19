$(document).ready(function(){
    s=[];
    $('.shift').on({
        click:function(){
            var id=this.id;
            var pre = "#li_"+id;
            if(s[id]===true){
                $(pre).slideUp();
                s[id]=false;
            }else{
                get_class_info(id);
            }

        }
    });

    $('.unfold').on('click','.hang .ed',function(){
        window.location.href = 'ed_class.php?id='+this.id.split('_')[1];
    });

    $('.unfold').on('click','.hang .del',function(){
        var id = this.id.split('_')[1];
        var d={cid_:id}
        $.post('a.del.class.php',d).done(function(data){
            var nd = JSON.parse(data);
            alert(nd.msg);
            window.location.href = 'class_info.php';
            if(nd.errCode==1){
                sessionStorage.url = 'class_info.php';
                window.location.href = 'login_page.php';
            }


        });
    });

    $('.unfold').on('click','.hang .add',function(){
        window.location.href = 'in_class.php';
    })

});

var get_class_info= function(id){
    $.post('/a.class.info.php',{id_:id})
        .done(function(data){
            var d = JSON.parse(data);
            if(d.status==='no'){
                alert(d.msg);
                if(d.errCode==1){
                    sessionStorage.url = 'class_info.php';
                    window.location.href = 'login_page.php';
                }
            }else{
                var pre = "#li_"+id;
                var model = '<div class="hang"><p>str1</p><span>str2</span><div class="clearfix"/></div>';
                var tmp = [];
                $.each(d.data,function(index,dom){
                    tmp.push(model.replace('str1',dom['des']).replace('str2',dom['val']));
                });
                if(d.lvl>70){
                    tmp.push('<div class="hang last">');
                    tmp.push('<button class="gre del" id="del_str">删除</button>'.replace('str',id));
                    tmp.push('<button class="gre add" id="add_str">添加</button>'.replace('str',id));
                    tmp.push('<button class="gre ed" id="ed_str">编辑</button>'.replace('str',id));
                    tmp.push('<div class="clearfix" />');
                    tmp.push('</div>');
                }
                var str=tmp.join('');
                s[id]=true;
                $(pre).html(str).slideDown();
            }
        });
};
