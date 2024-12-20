/*globals organic_goodness */
jQuery(function ($) {

	"use strict";

	if( organic_goodness.is_woocommerce ) {

		var page = 1;
		var pagination_type = organic_goodness.pagination;

		// only load functionality on product archive pages.
		if (pagination_type === 'load-more') {
			if ($('.woocommerce-pagination').length && $('body').hasClass('archive')) {

				if ($('.woocommerce-pagination a.next').length === 0) {
					$('.woocommerce-load-more-pagination .link-button').remove();
				}

				$('.woocommerce-pagination').hide();

				$('body').on('click', '.woocommerce-load-more-pagination .link-button', function (e) {

					e.preventDefault();

					if ($('.woocommerce-pagination a.next').length) {

						$('.woocommerce-load-more-pagination .link-button').attr('products-loading-processing', 1);
						var href = $('.woocommerce-pagination a.next').attr('href');

						$('.woocommerce-load-more-pagination').addClass('loading');

						$.get(href, function (response) {

							$('.woocommerce-pagination').html($(response).find('.woocommerce-pagination').html());

							$(response).find('.site-content ul.products > li').each(function () {
								var element = $(this);
								$(this).addClass("not-ready ajax-loaded");
								$('.site-content ul.products > li:last').after($(this));
								setTimeout(function () {
									element.removeClass('not-ready').addClass('ready');
								}, 200);
							});

							$('.woocommerce-load-more-pagination').removeClass('loading');
							$('.woocommerce-load-more-pagination .link-button').attr('products-loading-processing', 0);
							var replace = page * organic_goodness.products_per_page + 1;
							$('.woocommerce-load-more-pagination .woocommerce-result-count').text($(response).find('.woocommerce-load-more-pagination .woocommerce-result-count').text().replace( replace, '1' ));

							$(document).trigger('post-load');

							setTimeout(function () {

								$('.site-content ul.products > li').each(function () {
									//lazy loading tweak
									var image = $(this).find('.product_thumbnail > img.jetpack-lazy-image');
									if (image) {
										if (image.attr('data-lazy-srcset')) {
											image.attr('srcset', image.attr('data-lazy-srcset'));
										} else {
											image.attr('srcset', image.attr('src'));
										}
									}
								});
							}, 500);

							if ($('.woocommerce-pagination a.next').length === 0) {
								$(document).find('.woocommerce-load-more-pagination .woocommerce-result-count').text( organic_goodness.showing_all_results_text );
								$('.woocommerce-load-more-pagination .link-button').remove();
							}

						});

					} else {
						$('.woocommerce-load-more-pagination .link-button').remove();
					}
				});

				// always update archive link with page number that corresponds with the visible products.
				$(window).on('scroll', function () {
					var products = $('body').find('ul.products li.product');
					var products_per_page = parseInt(organic_goodness.products_per_page);

					for (var i = 1; i < products.length; i += products_per_page) {
						var el = $(products[i]);
						var data = el.attr('class');
						var new_page = page;
						if (data.indexOf('data-ajax-page-') > -1) {
							new_page = data.charAt(data.indexOf('data-ajax-page-') + 15);
							if (!(!isNaN(parseFloat(new_page)) && isFinite(new_page))) {
								new_page = page;
							}
						}
						if (el && el.element_on_screen() && (page !== new_page)) {
							var href = $('.woocommerce-pagination a').attr('href');

							page = new_page;
							if (!isNaN(parseFloat(page)) && isFinite(page)) {
								href = href.replace(/\/[0-9]+\//, '/' + page + '/');
							} else {
								href = href.replace(/\/[0-9]+\//, '/1/');
							}

							if (window.history && window.history.pushState) {
								window.history.pushState('backward', null, href);
							}

							// Quit the loop
							break;
						}
					}
				});
			} else {
				$('.woocommerce-load-more-pagination .link-button').remove();
			}
		}
	}
});
