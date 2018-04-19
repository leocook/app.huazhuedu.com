$(document).ready(function(){
    $('.shift').on('click',function(){
        var id = this.id;
        var pre = '#li_'+id;
        $(pre).slideToggle();
    });
    $('.btn').on('click',function(){
        var param = this.id.split('_');
        var tp = param[0];
        var id = param[1];
        var mb = param[2];
        var cid = param[3];
        switch (tp){
            case 'del':
                sessionStorage.url = 'my_cust.php';
                $.post('a.del.cust.class.php',{id_:id,cid_:cid}).done(function(data){
                    var nd = JSON.parse(data);
                    alert(nd.msg);
                    if(nd.errCode === 1){
                        window.location.href ='login_page.php';
                    }else{
                        window.location.href ='my_cust.php';
                    }
                });
                break;
            case 'ed':
                sessionStorage.url = 'my_cust.php';
                sessionStorage.u_id = id;
                window.location.href ='ed_cust.php?id='+id;
                break;
            case 'reg':
                sessionStorage.url = 'my_cust.php';
                sessionStorage.u_id = id;
                window.location.href ='reg_in_class.php?id='+id;
                break;
            case 'rec':
                window.location.href ='study_history.php?m='+mb;
                break;
            default:
                break;
        }});
});
