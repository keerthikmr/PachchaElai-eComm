/* global organic_goodness */
(function ($) {

	"use strict";

	$(window).on(
		'load',
		function () {

			if ($('#site-header').length) {

				var header_height = $('#site-header').outerHeight();
				header_height += $('.woocommerce-store-notice.demo_store').length ? $('.woocommerce-store-notice.demo_store').outerHeight() : 0;
				$('.site-header').css('height', header_height);
				
				if (!organic_goodness.sticky_header_always_visible && $(window).scrollTop() > header_height / 2) {
					$('.site-header-wrapper').removeClass('fixed').css('top', -header_height);
				}

				if (!organic_goodness.sticky_header_always_visible) {
					setTimeout(
						function () {
							$('.site-header-wrapper').addClass('header-fixed');
						},
						500
					);
				}

				$(window).on(
					'resize',
					function () {
						setTimeout(
							function () {
								var header_height = $('#site-header').outerHeight();
								header_height += $('.woocommerce-store-notice.demo_store').length ? $('.woocommerce-store-notice.demo_store').outerHeight() : 0;
								$('.site-header').css('height', header_height);
							},
							200
						);
					}
				);

				// submenus.
				$(document).on(
					'click',
					'.site-header-wrapper #site-header ul.primary-menu>li.menu-item-has-children>.sub-menu-icon',
					function () {
						$(this).parent().toggleClass('hover');
					}
				);

				// sticky header.
				if (!organic_goodness.sticky_header_always_visible) {
					var previousScroll = 0;
					var currentScroll = 0;
					$(window).on(
						'scroll',
						function () {
							currentScroll = $(this).scrollTop();
							if ($(this).scrollTop() <= header_height / 3) {
								$('.site-header-wrapper').removeClass('fixed').css('top', '');
							} else if ($(this).scrollTop() > header_height / 3 && ((currentScroll < previousScroll) && (previousScroll - currentScroll > 5))) {
								$('.site-header-wrapper').addClass('fixed').css('top', '');
								$('.site-header-wrapper .header-minicart').removeClass('open');
								$('.site-header-wrapper #mobile-menu-wrapper').removeClass('open');
								$('.site-header-wrapper #shopping-bag-site-tool').removeClass('open');
								$('.site-header-wrapper #mobile-menu-tool').removeClass('open');
							} else if ($(this).scrollTop() > header_height / 3 && ((currentScroll < previousScroll) && (previousScroll - currentScroll <= 5))) {

							} else {
								$('.site-header-wrapper').removeClass('fixed').css('top', -header_height);
								$('.site-header-wrapper .header-minicart').removeClass('open');
								$('.site-header-wrapper #mobile-menu-wrapper').removeClass('open');
								$('.site-header-wrapper #shopping-bag-site-tool').removeClass('open');
								$('.site-header-wrapper #mobile-menu-tool').removeClass('open');
							}
							previousScroll = currentScroll;
						}
					);
				}

				// adjust dropdowns' position to avoid offscreen display.
				if ($(window).width() >= 1024) {
					$('.site-header .primary-menu > li.menu-item-has-children').each(
						function () {

							var submenuWidth = $(this).find('> .sub-menu').outerWidth();
							var submenuOffset = $(this).find('> .sub-menu').offset().left;
							var totalSubMenuWidth = submenuWidth + submenuOffset;

							if ((totalSubMenuWidth - $(window).width()) > 0) {
								$(this).find('> .sub-menu').addClass('reverse');
							}
						}
					);
				}

				// Minicart.
				if ($('.site-header-wrapper .header-minicart').length && $('.site-header-wrapper #shopping-bag-site-tool').length) {

					// minicart height.
					if ($(window).width() < 768) {
						var minicart_list_height = $('.site-header').length ? $('.site-header').outerHeight() : 0;
						minicart_list_height += $('.header-minicart .woocommerce.widget_shopping_cart p.woocommerce-mini-cart__total').length ? $('.header-minicart .woocommerce.widget_shopping_cart p.woocommerce-mini-cart__total').outerHeight() : 0;
						minicart_list_height += $('.header-minicart .woocommerce.widget_shopping_cart p.buttons').length ? $('.header-minicart .woocommerce.widget_shopping_cart p.buttons').outerHeight() : 0;
						minicart_list_height += $('.header-minicart .woocommerce.widget_shopping_cart+.button.wc-forward').length ? $('.header-minicart .woocommerce.widget_shopping_cart+.button.wc-forward').outerHeight() : 0;
						minicart_list_height += $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;

						$('.header-minicart .woocommerce.widget_shopping_cart ul.product_list_widget.cart_list').css('max-height', 'calc( 100vh - ' + minicart_list_height + 'px - 35px - 3.10rem )');
					}

					// open/close minicart.
					$(document).on(
						'click touch',
						function (event) {
							var $target = $(event.target);
							var minicart = '#site-header #secondary-menu-wrapper ul#menu-site-tools .header-minicart';
							var minicart_icon = '#site-header #secondary-menu-wrapper ul#menu-site-tools > li#shopping-bag-site-tool .menu-icon';

							if ($target.closest(minicart_icon).length && !$(minicart).hasClass('open')) {
								$(minicart).addClass('open');
								$('#site-header #secondary-menu-wrapper ul#menu-site-tools > li#shopping-bag-site-tool').addClass('open');

								if ($(window).width() < 768) {
									$('body').addClass('noscroll');
								}
							} else if ((!$target.closest(minicart).length && !$target.closest(minicart_icon).length) || (!$target.closest(minicart).length && $target.closest(minicart_icon).length) && $(minicart).is(":visible")) {
								$(minicart).removeClass('open');
								$('#site-header #secondary-menu-wrapper ul#menu-site-tools > li#shopping-bag-site-tool').removeClass('open');
								$('body').removeClass('noscroll');
							}
						}
					);
				}

				// Search.
				if ($('.site-header-wrapper .search-wrapper').length && $('.site-header-wrapper #search-site-tool').length) {
					// open search.
					$(document).on(
						'click touch',
						'#site-header #secondary-menu-wrapper ul#menu-site-tools > li#search-site-tool .menu-icon',
						function () {
							if ($('.site-header-wrapper ul#menu-site-tools>li#search-site-tool .search-wrapper').hasClass('open')) {
								$('.site-header-wrapper ul#menu-site-tools>li#search-site-tool .search-wrapper').removeClass('open');
								$('#site-header #secondary-menu-wrapper ul#menu-site-tools > li#search-site-tool').removeClass('open');
							} else {
								$('.site-header-wrapper ul#menu-site-tools>li#search-site-tool .search-wrapper').addClass('open');
								$('#site-header #secondary-menu-wrapper ul#menu-site-tools > li#search-site-tool').addClass('open');
								$('.site-header-wrapper #site-header #secondary-menu-wrapper ul#menu-site-tools>li#search-site-tool .search-wrapper form input[type=search]').focus();
							}
						}
					);

					// close search when click outside it.
					$(document).on(
						'click',
						function (event) {
							var $target = $(event.target);
							var element1 = '#site-header #secondary-menu-wrapper ul#menu-site-tools .search-wrapper';
							var element2 = '#site-header #secondary-menu-wrapper ul#menu-site-tools > li#search-site-tool *';

							if (!$target.closest(element1).length && !$target.closest(element2).length && $(element1).is(":visible")) {
								$(element1).removeClass('open');
								$('#site-header #secondary-menu-wrapper ul#menu-site-tools > li#search-site-tool').removeClass('open');
							}
						}
					);
				}

				// Mobile menu.
				if ($('.site-header-wrapper #mobile-menu-wrapper').length && $('.site-header-wrapper #mobile-menu-tool').length) {

					// mobile menu height.
					if ($(window).width() < 768) {
						var mobile_menu_height = $('.site-header').length ? $('.site-header').outerHeight() : 0;
						mobile_menu_height += $('#wpadminbar').length ? $('#wpadminbar').outerHeight() : 0;

						$('.site-header-wrapper #mobile-menu-wrapper').css('max-height', 'calc( 100vh - ' + mobile_menu_height + 'px - 35px - 4.25rem )');
					} else {
						$('.site-header-wrapper #mobile-menu-wrapper').css('max-height', 'calc( 100vh - ' + $('.site-header-wrapper #mobile-menu-wrapper').offset().top + 'px - 4.25rem )');
					}

					// open mobile menu.
					$(document).on(
						'click touch',
						'.site-header-wrapper #site-header ul.mobile-menu #mobile-menu-tool .menu-icon',
						function () {
							if ($('.site-header-wrapper #mobile-menu-wrapper').hasClass('open')) {
								$('.site-header-wrapper #mobile-menu-wrapper').removeClass('open');
								$('.site-header-wrapper #mobile-menu-tool').removeClass('open');
								$('body').removeClass('noscroll');
							} else {
								$('.site-header-wrapper #mobile-menu-wrapper').addClass('open');
								$('.site-header-wrapper #mobile-menu-tool').addClass('open');
								$('body').addClass('noscroll');
							}
						}
					);

					// close mobile menu when click outside it.
					$(document).on(
						'click',
						function (event) {
							var $target = $(event.target);
							var element1 = '#site-header #mobile-menu-wrapper';
							var element2 = '.site-header-wrapper #site-header ul.mobile-menu #mobile-menu-tool';

							if (!$target.closest(element1).length && !$target.closest(element2).length && $(element1).is(":visible")) {
								$(element1).removeClass('open');
								$(element2).removeClass('open');
								$('body').removeClass('noscroll');
							}
						}
					);

					// mobile menu dropdown open/close.
					$('#mobile-menu-wrapper ul.mobile-menu li.menu-item.menu-item-has-children>.sub-menu-icon').on(
						'click touch',
						function () {
							if (!$(this).parent().hasClass('active')) {
								$(this).parent().addClass('active');
								$(this).parent().siblings().removeClass('active');
								$(this).closest('li').siblings().find('> .sub-menu:visible').slideUp(700, "swing");
								$(this).closest('li').find('ul').slideDown(700, "swing");
							} else {
								$(this).parent().removeClass('active');
								$(this).parent().siblings().removeClass('active');
								$(this).closest('li').find('> .sub-menu').slideUp(700, "swing");
							}
						}
					);

					// fix slideDown animation jump.
					$('.site-header-wrapper #mobile-menu-wrapper ul.mobile-menu > li.menu-item > ul.sub-menu').each(
						function () {
							$(this).css('height', $(this).height());
							$(this).hide();
						}
					);
				}
			}
		}
	);

})(jQuery);
