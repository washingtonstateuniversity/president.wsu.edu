(function($){
    $('.president-trigger-search').on('click', function() {
        $('.president-primary-search').toggle();
        $('.main-header').toggleClass('president-search-open');
    });
}(jQuery));
