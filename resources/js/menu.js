if($('#page-name').length > 0){
    var page = $('#page-name');
    var pagename = page.data('page');
    $('#menu-bar li a.p-'+pagename).addClass('active');
}
