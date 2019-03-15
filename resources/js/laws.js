if($('.accordion').length > 0){
    $( ".nav a" ).trigger( "click" );
    $('.accordion').collapse();
    $('.accordion').on('hidden.bs.collapse', toggleIcon1);
    $('.accordion').on('shown.bs.collapse', toggleIcon2);
    function toggleIcon1(e) {
        console.log('hide');
        $(this)
            .find(".more-less")
            .removeClass('fa-angle-down')
            .addClass('fa-angle-right');
    }
    function toggleIcon2(e) {
        console.log('shown');
        $(this)
            .find(".more-less")
            .removeClass('fa-angle-right')
            .addClass('fa-angle-down');
    }
}
