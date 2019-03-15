if($('.block-news').length > 0){
    var activity = $(".block-news>div");
    var countnews = activity.length;
    var newviewmore = $("#news .btn-viewmore");
    console.log(countnews);
    if(countnews <= 9){
        newviewmore.hide();
    }
    activity.hide();
    activity.slice(0, 1).show();
    newviewmore.on('click', function (e) {
        e.preventDefault();
        $(".block-news>div:hidden").slice(0, 1).slideDown();
        if ($(".block-news>div:hidden").length == 0) {
            newviewmore.hide();
        }
    });
}

if($('#activities .activity-block').length > 0){
    var activity = $("#activities .activity-block");
    var acviewmore = $("#activities .btn-viewmore");
    var count = activity.length;
    console.log(count);
    if(count <= 9){
        acviewmore.hide();
    }
    $(activity).hide();
    $(activity).slice(0, 1).show();
    acviewmore.on('click', function (e) {
        e.preventDefault();
        $("#activities .activity-block:hidden").slice(0, 1).slideDown();
        console.log('$("#activities .activity-block:hidden").length',$("#activities .activity-block:hidden").length);
        if ($("#activities .activity-block:hidden").length == 0) {
            acviewmore.hide();
        }
    });
}