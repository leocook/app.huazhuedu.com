$(document).ready(function(){
    $('.nav_box').on({
        click:function(){
            var c= this.id;
            switch (c){
                case '1':
                case '2':
                case '3':
                case '7':
                case '8':
                case '9':
                case '10':
                case '6':
                case '11':
                case '12':
                case '13':
                case '14':
                case '15':
                case '16':
                case '17':
                    window.location.href='video.php?id='+c;
                    break;
                default:
                    alert('该视频正在加紧录制中...');
            }
        }
    });
});