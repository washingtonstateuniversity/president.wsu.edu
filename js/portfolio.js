(function($){
    var $search_field = $('.search-field');

    $('.president-trigger-search').on('click', function() {
        $('.president-primary-search').toggle();
        $('.main-header').toggleClass('president-search-open');
    });

    var placeholder = $search_field.attr('placeholder');

    $search_field.on('focus', function() { $(this).attr('placeholder',''); } );
    $search_field.on('blur', function() { $(this).attr('placeholder', placeholder ); } );
}(jQuery));
