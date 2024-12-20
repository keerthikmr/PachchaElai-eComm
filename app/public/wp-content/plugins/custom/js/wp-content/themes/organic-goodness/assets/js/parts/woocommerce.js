(function($) {

	"use strict";

	function shop_filters_area_init_dropdown() {
		var filters_height;
		$( '.woocommerce button.filters-toggle' ).css( 'pointer-events', 'none' );
		setTimeout(
			function() {
				filters_height     = $( '.woocommerce .woocommerce-filters-area .shop-filters' ).outerHeight();
				var widgets_number = $( '.woocommerce .woocommerce-filters-area .shop-filters > .widget' ).length;
				if ( widgets_number >= 4 ) {
					widgets_number = 4;
				} else if ( widgets_number >= 3 ) {
					widgets_number = 3;
				} else {
					widgets_number = 2;
				}
				$( '.woocommerce .woocommerce-filters-area' ).removeClass( 'init' );
				$( '.woocommerce .woocommerce-filters-area .shop-filters' ).removeClass( 'absolute' ).addClass( 'close columns-' + widgets_number );
				$( '.woocommerce button.filters-toggle' ).css( 'pointer-events', '' );
				$( '.woocommerce .woocommerce-filters-area .shop-filters .widget' ).addClass( 'hidden' );
			},
			100
		);

		$( '.woocommerce button.filters-toggle' ).on(
			'click touch',
			function(){
				$( '.woocommerce .woocommerce-filters-area .shop-filters' ).toggleClass( 'close open' );

				if ( $( '.woocommerce .woocommerce-filters-area .shop-filters' ).hasClass( 'open' ) ) {
					$( '.woocommerce .woocommerce-filters-area .shop-filters' ).css( 'max-height', filters_height + 100 );
					$( '.woocommerce .woocommerce-filters-area .shop-filters .widget' ).removeClass( 'hidden' );
				} else {
					$( '.woocommerce .woocommerce-filters-area .shop-filters' ).css( 'max-height', '' );
					setTimeout(
						function() {
							$( '.woocommerce .woocommerce-filters-area .shop-filters .widget' ).addClass( 'hidden' );
						},
						400
					);
				}
			}
		);

		$( '.woocommerce .woocommerce-filters-area .shop-filters' ).addClass( 'init' );
	}

	// Product Archives - open/close filters area.

	// get area height, then hide it.
	if( $( '.woocommerce .woocommerce-filters-area').hasClass('dropdown') || ( $( '.woocommerce .woocommerce-filters-area').hasClass('sidebar') && $( window ).width() < 1024 ) ) {
		shop_filters_area_init_dropdown();
	}

	$( window ).on(
		'resize',
		function () {
			if( $( window ).width() < 1024 && ! $( '.woocommerce .woocommerce-filters-area .shop-filters' ).hasClass( 'init' ) ) {
				shop_filters_area_init_dropdown();
			}
		}
	);

	$( window ).on(
		'resize',
		function () {
			if( $( window ).width() >= 1024 && $( '.woocommerce .woocommerce-filters-area').hasClass('sidebar') ) {
				$( '.woocommerce .woocommerce-filters-area .shop-filters' ).css( 'max-height', '' );
				$( '.woocommerce .woocommerce-filters-area .shop-filters .widget' ).removeClass( 'hidden' );
				$( '.woocommerce .woocommerce-filters-area .shop-filters' ).removeClass( 'init' );
			}
		}
	);

	// My Account - detect my account dashboard page.
	if ( $( '.woocommerce-account .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--dashboard' ).hasClass( 'is-active' ) ) {
		$( '.woocommerce-account' ).addClass( 'woocommerce-myaccount-dashboard' );
	}

	// Mobile - Products vertical scroll.
	if ( $( window ).width() < 1024 && $('body').hasClass('wc-draggable-products') ) {
		$( ".woocommerce .related ul.products:not(.columns-2)" ).attachDragger();
		$( ".woocommerce .upsells ul.products:not(.columns-2)" ).attachDragger();
		$( ".wc-block-grid:not(.all-products):not(.has-2-columns):not(.has-1-columns) ul.wc-block-grid__products" ).attachDragger();
	}

	$( window ).on(
		'resize',
		function() {
			if ( $( window ).width() < 1024 && $('body').hasClass('wc-draggable-products') ) {
				$( ".woocommerce .related ul.products:not(.columns-2)" ).attachDragger();
				$( ".woocommerce .upsells ul.products:not(.columns-2)" ).attachDragger();
				$( ".wc-block-grid:not(.all-products):not(.has-2-columns):not(.has-1-columns) ul.wc-block-grid__products" ).attachDragger();
			}
		}
	);

	// Product navigation.
	if( $('.navigation-product').length ) {
		$('.navigation-product .nav-icon-link').on({
			mouseover: function() {
				$(this).parents('.navigation-product').addClass('hovered');
			},
			mouseout: function() {
				$(this).parents('.navigation-product').removeClass('hovered');
			}
		});
	}

})( jQuery );
