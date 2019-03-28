if($('.accordion').length > 0){

    $('.accordion').collapse();

    $('.accordion').on('hidden.bs.collapse', toggleIconClose);
    $('.accordion').on('shown.bs.collapse', toggleIconShow);

    $( ".nav a:first-child" ).trigger( "click" );
    $( ".tab-pane+.tab-pane").removeClass('active');

    function toggleIconClose(e) {
        $(this)
            .find(".collapsed")
            .find(".more-less")
            .removeClass('fa-angle-down')
            .addClass('fa-angle-right');
    }
    function toggleIconShow(e) {
        $(this)
            .find(".btn-link")
            .not(".collapsed")
            .find(".more-less")
            .removeClass('fa-angle-right')
            .addClass('fa-angle-down');
    }
}
