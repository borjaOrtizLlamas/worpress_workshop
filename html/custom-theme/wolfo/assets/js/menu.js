jQuery(document).ready(function($) {
    let nav_menu            = $('.wolfo-canvas-menu ul.mobile-nav');

    $('.wolfo-canvas-menu ul.mobile-nav .menu-item-has-children > a').after( $('<button class="dropdown-toggle"></button>') );

    $('button.dropdown-toggle').click(function() {
        $(this).parent().find('.sub-menu').first().slideToggle();
    });

    // Keyboard Navigation
    if( $(window).width() < 1024 ) {
        nav_menu.find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        nav_menu.find("li").unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            nav_menu.find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        }
        else {
            nav_menu.find("li").unbind('keydown');
        }
    });
});