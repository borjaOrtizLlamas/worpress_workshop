(function ($, window, document) {
    "use strict";

    let WOLFO = window.WOLFO || {};

    var $body		= $('body'),
        $window		= $(window),
        $loading	= $('.wolfo-load');

	WOLFO.MobileMenu = function() {
		let first_child = $('.mobile-nav > li:first-child');
		let last_child	= $('.mobile-nav > li:last-child');

		$('.header-nav .br-icon-menu').on('click', function () {
			var $this 		= $(this);

			$body.find('.header-nav .icon-menu').toggleClass('is-active');
			if ($body.hasClass('canvas-menu-open')) {
				$body.removeClass('canvas-menu-open');
			} else {
				$body.addClass('canvas-menu-open');
				first_child.find(' > a').focus();
			}

			$body.find('.header-nav .is-active').on('keydown', function (event) {
				if(event.shiftKey && event.keyCode == 9) {
					last_child.find(' > .dropdown-toggle').focus();
					return false;
				}
			});
		});

		$('.bg-open-canvas-menu').on('click', function () {
			$body.removeClass('canvas-menu-open');
			$body.find('.header-nav .icon-menu').removeClass('is-active');
		});

		$('.mobile-nav > li:last-child .dropdown-toggle').on('keydown', function (event) {
			if(event.shiftKey && event.keyCode == 9) {
				last_child.find(' > a').focus();
				return false;
			} else if (event.keyCode == 9) {
				$body.find('.header-nav .is-active').focus();
				return false;
			}
		});
	};

	WOLFO.HeaderSearchAction = function () {
		$('.wolfo-ajax-search').each(function () {
			let $wolfo_search 	= $(this);

			$wolfo_search.find('.wolfo-search-icon').on('click', function () {
				$body.toggleClass('on-search');
				$('.bas-input').addClass('focus');
			});

			$wolfo_search.find('.wolfo-search-icon').on('keyup', function (event) {
				if (event.keyCode == 13) {
					$('.bas-input').focus();
				}
			});

			$wolfo_search.find('.search-close').on('click', function () {
				$body.removeClass('on-search');
				$('.bas-input').removeClass('focus');
			});

			$wolfo_search.find('.search-close').on('focusout', function () {
				$('.bas-input').focus();
			});
		})
	};

    $(document).ready(function () {
		WOLFO.MobileMenu();
		WOLFO.HeaderSearchAction();
		$('.bas-input.focus').focus();
    });

    $window.on('resize', function () {
		WOLFO.MobileMenu();
    });

    $window.on('scroll', function() {

    });

})(jQuery, window, document);