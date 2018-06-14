$(function() {
    "use strict";

    $('#menu-button, #menu-close-button').on('click touchend', function(e) {
        e.preventDefault();

        $('body').toggleClass('pushed-left');
        $('#menu-button').toggleClass('open');

    });


    $('.panel-heading a').on('click', function() {
        $('.panel-heading').removeClass('active');
        if (!$(this).closest('.panel').find('.panel-collapse').hasClass('in')) {
            $(this).parents('.panel-heading').addClass('active');
        }
    });


    $('body').not('body.touch').on('click touchend', function(e) {
        var $body = $(this);
        var $target = $(e.target);
        if (($body.hasClass('pushed-left-alt') || $body.hasClass('pushed-left')) && $target.closest('#main-nav').length === 0 && $target.closest('#menu-button').length === 0) {
            e.preventDefault();
            $body.removeClass('pushed-left-alt').removeClass('pushed-left');
        }
    });

    $('#main-nav a').not('.sub-nav a').on('click', function() {

        $('.sub-nav').stop().slideUp(420, function() {
            $(this).addClass('hidden');
        });
    });


    $('.sub-nav-toggle').on('click touchend', function(e) {
        e.preventDefault();
        var $subNav = $(this).next('.sub-nav');
        if ($subNav.hasClass('hidden')) {
            $subNav.hide().removeClass('hidden').stop().slideDown(420);
        } else {
            $subNav.stop().slideUp(420, function() {
                $(this).addClass('hidden');
            });
        }
    });

    if ($('.banner-textblock').length) {
        $(window).scroll(function() {
            var scrollPos = $(this).scrollTop();
            $('.banner-textblock').not('.touch .banner-textblock').css({
                'top': (-(scrollPos / 5.0)) + "px",
                'opacity': 1 - (scrollPos / 550)
            });
            $('.custom-caption').not('.touch .custom-caption').css({
                'opacity': 1 - (scrollPos / 550)
            });
            $('.parallax-banner').not('.touch .parallax-banner').css({
                'transform': 'translate3d(' + "0px" + ", " + ((-scrollPos / 9.0) + "px") + ", " + "0px" + ')'

            });
        });
    }


    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('body').addClass('touch');
    }

    // Animatedblock
    var $animation_elements = $('.animatedblock');

    function check_if_in_view() {
        var window_height = $(window).height();
        var window_top_position = $(window).scrollTop();
        var window_bottom_position = (window_top_position + window_height);

        $.each($animation_elements, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);

            //check to see if this current container is within viewport
            if ((element_bottom_position >= window_top_position) &&
                (element_top_position <= window_bottom_position)) {
                $element.addClass('in-view');
            } else {
                //  $element.removeClass('in-view');
            }
        });
    }

    $(window).on('scroll resize', check_if_in_view);
    $(window).trigger('scroll');


});