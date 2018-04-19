$(document).ready(function(){
    sessionStorage.url = 'exam_index.php';
    $('.nav_box').on('click',function(){
        var id = this.id;
        switch (id){
            case '1':
                window.location.href = 'real_questions.php?id=0101';
                break;
            case '2':
                window.location.href = 'exam_online.php?id=01';
                break;
            case '3':
                window.location.href = 'exam_rnd.php?id=01';
                break;
            case '4':
                window.location.href = 'real_questions.php?id=0102';
                break;
            case '6':
                window.location.href = 'exam_rnd.php?id=03';
                break;

        }
    });
});