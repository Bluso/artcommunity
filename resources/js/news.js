//load more news
if($('.block-news').length > 0){
    var activity = $(".block-news>div");
    var countnews = activity.length;
    var newviewmore = $("#news .btn-viewmore");
    if(countnews <= 8){
        newviewmore.hide();
    }
    activity.hide();
    activity.slice(0, 8).show();
    newviewmore.on('click', function (e) {
        e.preventDefault();
        $(".block-news>div:hidden").slice(0, 4).slideDown();
        if ($(".block-news>div:hidden").length == 0) {
            newviewmore.hide();
        }
    });
}
//load more activities
if($('#activities .activity-block').length > 0){
    var activity = $("#activities .activity-block");
    var acviewmore = $("#activities .btn-viewmore");
    var count = activity.length;
    if(count <= 9){
        acviewmore.hide();
    }
    $(activity).hide();
    $(activity).slice(0, 9).show();
    acviewmore.on('click', function (e) {
        e.preventDefault();
        $("#activities .activity-block:hidden").slice(0, 3).slideDown();
        if ($("#activities .activity-block:hidden").length == 0) {
            acviewmore.hide();
        }
    });
}

//category active and show by content cate
if($('.categories').length > 0){
    var activity = $("#activities .activity-block");
    $('.categories a').click( function(){
        $('.categories a').removeClass('active');
        $(this).addClass('active');
        var cateId = $(this).data('cateid');
        $(activity).hide();
        $('.category-'+cateId).show();
    });
}