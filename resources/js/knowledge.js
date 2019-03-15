if($('.page-knowledge .knowledge_content').length > 0){
    var knowledge_count = $(".knowledge_content").length;
    console.log(knowledge_count);
    if(knowledge_count <= 9){
        $(".btn-viewmore").hide();
    }
    $(".knowledge_content").hide();
    $(".knowledge_content").slice(0, 9).show();
    $(".btn-viewmore").on('click', function (e) {
        e.preventDefault();
        $(".knowledge_content:hidden").slice(0, 3).slideDown();
        if ($(".knowledge_content:hidden").length == 0) {
            $("#load").fadeOut('slow');
        }
        $('html,body').animate({
            scrollTop: $(this).offset().top
        }, 1500);
    });
}