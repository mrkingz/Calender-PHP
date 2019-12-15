$(document).ready(function(){
    $('input, .btn').not('.resend').on('click', function() {
        $($('.message').parents('.alert')).fadeOut(500);
    })
})