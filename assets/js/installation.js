jQuery(document).ready(function($){
    var form = $('.setup-form');
    $(form).each(function() {
        $(this).on('submit', function(e) {
            $(this).find('.submit').css('display', 'none');
        });
    })
});