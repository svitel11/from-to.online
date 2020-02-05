import $ from 'jquery';

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, {});

    //menu style
    $('#menu').css('top', $('nav').height());
    $('.menu-view').on('click', function () {
        if ($('#menu').css('right') == "0px") {
            $('#menu').animate({
                right: "-600px"
            }, 500)
        } else {
            $('#menu').animate({
                right: 0
            }, 500)
        }
    })
});


