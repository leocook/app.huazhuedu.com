$(document).ready(function(){
    $('.nav_box').on({
       click:function(){
           switch (this.id){
               case '01':
                   window.location.href = 'nav.php?id=01';
                   break;
               case '03':
                   window.location.href = 'nav.php?id=03';
                   break;
               case 'hw':
                   window.location.href = 'robot/HW5000';
                   break;
               case 'sj':
                   window.location.href = 'robot/JB3208T';
                   break;
               case 'bd':
                   window.location.href = 'robot/BD';
                   break;
               case 'videos':
                   window.location.href = 'videos.php';
                   break;
               case 'notice_1':
                   var param = this.id.split('_')[0];
                   window.location.href = 'notice.php?id='+param;
                   break;
               case 'notice_2':
                   window.location.href = 'school_begin.php';
                   break;
               case 'notice_3':
                   window.location.href = 'reg.php';
                   break;
               default:
                   window.location.href = 'nav.php?id=01';
           }
       }
    });
});