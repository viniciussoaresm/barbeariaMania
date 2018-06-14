jQuery(window).load(function($) {
    "use strict";

    function eborLoadIsotope() {
        var $container = jQuery('#container, #container-popup'),
            $optionContainer = jQuery('#options'),
            $options = $optionContainer.find('a[href^="#"]').not('a[href="#"]'),
            isOptionLinkClicked = false;


        $container.isotope({
            itemSelector: '.element',
            resizable: false,
            filter: '*',
            transitionDuration: '0.6s',
            layoutMode: 'packery'
        });
		
		

        if (jQuery('body').hasClass('video-detail'))
            $container.isotope({
                transformsEnabled: false,
            });

        jQuery(window).smartresize(function() {
            $container.isotope('layout');
        });
		

        $options.on('click', function() {
            var $this = jQuery(this),
                href = $this.attr('href');

            if ($this.hasClass('selected')) {
                return;
            } else {
                $options.removeClass('selected');
                $this.addClass('selected');
            }

            jQuery.bbq.pushState('#' + href);
            isOptionLinkClicked = true;
            return false;
        });

        jQuery(window).on('hashchange', function() {
            var theFilter = window.location.hash.replace(/^#/, '');

            if (theFilter == false)
                theFilter = 'home';

            $container.isotope({
                filter: '.' + theFilter
            });

            if (isOptionLinkClicked == false) {
                $options.removeClass('selected');
                $optionContainer.find('a[href="#' + theFilter + '"]').addClass('selected');
            }

            isOptionLinkClicked = false;
        }).trigger('hashchange');

 


    }


    eborLoadIsotope();

    jQuery('form').submit(function() {
        setTimeout(function() {
            $container.isotope('layout');
        }, 1000);
    });

    jQuery(window).trigger('resize').trigger('smartresize');
	

});