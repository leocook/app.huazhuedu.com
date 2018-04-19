$(document).ready(function(){
    $('.shift').on({
        click:function(){
            var id=this.id;
            var pre = "#li_"+id;
            $(pre).slideToggle();
        }
    });
});
