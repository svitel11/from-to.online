import $ from 'jquery';
document.addEventListener('DOMContentLoaded', function() {
    var navTopHeight = $('.nav-wrapper').height();
    //$('.header-top').height(navTopHeight);
    $('body').css('marginTop', navTopHeight);
});

