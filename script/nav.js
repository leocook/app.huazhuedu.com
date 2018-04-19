$(document).ready(function(){
    $('.nav_box').on({
        click:function(){
            var bid = $('.bid').text();
            switch (this.id){
                case 'chapter':
                    window.location.href = 'chapter.php?id='+bid;
                    break;
                case 'exam':
                    window.location.href = 'exam_rnd.php?id='+bid;
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
                case 's':
                    window.location.href = 'test.php?id=01000s';
                    break;
                case 'k':
                    window.location.href = 'test.php?id=01000k';
                    break;
                case 'z':
                    window.location.href = 'test.php?id=01000z';
                    break;
                default:
                    window.location.href = 'nav.php?id=01';
            }
        }
    });
});