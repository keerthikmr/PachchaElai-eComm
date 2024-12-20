<?php
/**
 * Woocommerce actions and filters.
 *
 * @package organic-goodness
 * @since 1.0
 */

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );

// Archive Hooks.
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

add_action( 'woocommerce_before_shop_loop', 'organic_goodness_woocommerce_toolbar_header', 20 );
add_action( 'woocommerce_before_shop_loop', 'organic_goodness_woocommerce_filters', 40 );
add_action( 'woocommerce_before_shop_loop_item', 'organic_goodness_product_card_wrapper_open', 3 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 11 );
add_action( 'woocommerce_before_shop_loop_item_title', 'organic_goodness_product_card_wrapper_close', 12 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 13 );
add_action( 'woocommerce_after_shop_loop', 'organic_goodness_woocommerce_filters_wrapper_close', 10 );

add_action(
	'woocommerce_before_shop_loop',
	function() {
		if ( Organic_Goodness_Customize::get_option( 'product_sorting' ) ) {
			add_action( 'organic_goodness_woocommerce_product_ordering', 'woocommerce_catalog_ordering', 10 );
		}
	},
	5
);

add_action(
	'woocommerce_before_single_product',
	function() {
		if ( Organic_Goodness_Customize::get_option( 'product_navigation' ) ) {
			add_action( 'woocommerce_after_single_product', 'organic_goodness_product_navigation', 100 );
		}
	},
	0
);

// Archive Hooks - Ajax Pagination.
add_action( 'woocommerce_after_shop_loop', 'organic_goodness_load_more_pagination', 15 );
add_action( 'organic_goodness_product_result_count', 'organic_goodness_result_count', 10 );

add_filter(
	'woocommerce_post_class',
	function( $classes, $product ) {
		if ( 'load-more' !== Organic_Goodness_Customize::get_option( 'shop_pagination' ) ) {
			return $classes;
		}

		if ( ! is_archive() ) {
			return $classes;
		}

		$page_number = ( is_paged() && get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$page_number = 'data-ajax-page-' . $page_number;
		$classes[]   = $page_number;

		return $classes;
	},
	10,
	2
);

// Single Product Hooks.
add_filter( 'woocommerce_output_related_products_args', 'organic_goodness_related_products_args', 20 );
add_filter( 'woocommerce_upsell_display_args', 'organic_goodness_upsell_products_args', 20 );
add_action( 'woocommerce_after_single_product_summary', 'organic_goodness_product_tabs_clear', 5 );
add_action( 'woocommerce_before_single_product_summary', 'organic_goodness_product_wrapper_start', 0 );
add_action( 'woocommerce_single_product_summary', 'organic_goodness_product_wrapper_end', 500 );

// Change WooCommerce wrappers.
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// My Account.
if ( is_user_logged_in() ) {
	remove_action( 'woocommerce_account_navigation', 'woocommerce_account_navigation' );
	add_action( 'organic_goodness_account_navigation', 'woocommerce_account_navigation' );
}

add_action( 'woocommerce_before_customer_login_form', 'organic_goodness_login_form_wrapper_start' );
add_action( 'woocommerce_before_lost_password_form', 'organic_goodness_login_form_wrapper_start' );
add_action( 'woocommerce_before_reset_password_form', 'organic_goodness_login_form_wrapper_start' );

add_action( 'woocommerce_after_customer_login_form', 'organic_goodness_login_form_wrapper_end' );
add_action( 'woocommerce_after_lost_password_form', 'organic_goodness_login_form_wrapper_end' );
add_action( 'woocommerce_after_reset_password_form', 'organic_goodness_login_form_wrapper_end' );

// Cart.
add_filter( 'woocommerce_cross_sells_columns', 'organic_goodness_change_cross_sells_columns' );
add_filter( 'woocommerce_cross_sells_total', 'organic_goodness_change_cross_sells_columns' );

// Checkout.
add_action( 'woocommerce_checkout_after_customer_details', 'organic_goodness_order_review_wrapper_start', 10 );
add_action( 'woocommerce_review_order_before_payment', 'organic_goodness_order_review_wrapper_end', 10 );

// Demo Store Notice.
remove_action( 'wp_footer', 'woocommerce_demo_store' );
add_action( 'organic_goodness_demo_store', 'woocommerce_demo_store', 10 );

/**
 * Shop result count.
 */
function organic_goodness_result_count() {
	if ( 'load-more' !== Organic_Goodness_Customize::get_option( 'shop_pagination' ) ) {
		return;
	}

	woocommerce_result_count();
}

/**
 * Add product card wrapper used to determine add to card button position.
 */
function organic_goodness_product_card_wrapper_open() {
	?>
	<div class="woocommerce-LoopProduct-wrapper">
	<?php
}

/**
 * Close product card wrapper.
 */
function organic_goodness_product_card_wrapper_close() {
	?>
	</div>
	<?php
}

/**
 * Generate categories list for archive pages.
 */
function organic_goodness_show_product_categories() {
	global $wp_query;

	if ( ! Organic_Goodness_Customize::get_option( 'shop_categories_list' ) ) {
		return;
	}

	if ( 'main-categories' === Organic_Goodness_Customize::get_option( 'shop_categories_list_display' ) ) {
		$parent = 0;
	} else {
		$parent = ( ! empty( $wp_query->get_queried_object()->term_id ) ) ? $wp_query->get_queried_object()->term_id : 0;
	}

	$categories = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'parent'     => $parent,
		)
	);

	if ( ! $categories && ( 0 !== $parent ) ) {
		$parent = get_ancestors( $parent, 'product_cat' );
		$parent = ( ! isset( $parent[0] ) ) ? 0 : $parent[0];

		$categories = get_terms(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => true,
				'parent'     => $parent,
			)
		);
	}

	if ( $categories ) {
		?>

		<ul class="categories-list text-center no-list-style no-margin margin-b-lg-down">
			<li class="cat-item">
				<?php
				$all_products_link = get_category_link( (int) $parent );
				$all_products_link = ( empty( $all_products_link ) && function_exists( 'wc_get_page_id' ) ) ? get_permalink( wc_get_page_id( 'shop' ) ) : $all_products_link;
				?>
				<a href="<?php echo esc_url( $all_products_link ); ?>" referrerpolicy="origin">
					<?php esc_html_e( 'All Products', 'organic-goodness' ); ?>
				</a>
			</li>

			<?php foreach ( $categories as $category ) { ?>
				<li class="cat-item cat-item-<?php echo esc_attr( $category->term_id ); ?>">
					<a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>" referrerpolicy="origin">
						<?php echo esc_html( $category->name ); ?>
					</a>
				</li>
			<?php } ?>
		</ul>

		<?php
	}
}

/**
 * Change number of related products output.
 *
 * @param array $args Product settings.
 */
function organic_goodness_related_products_args( $args ) {
	global $product;

	$columns = 3;

	$related = wc_get_related_products( $product->get_id() );
	$related = ( isset( $related ) && is_array( $related ) ) ? count( $related ) : 0;
	if ( $related < 3 ) {
		$columns = $related;
	}

	$args['posts_per_page'] = $columns;
	$args['columns']        = $columns;

	return $args;
}

/**
 * Change number of upsell products output.
 *
 * @param array $args Product settings.
 */
function organic_goodness_upsell_products_args( $args ) {
	global $product;

	$columns = 3;

	$upsells = is_array( $product->get_upsell_ids() ) ? count( $product->get_upsell_ids() ) : 0;
	if ( $upsells < 3 ) {
		$columns = $upsells;
	}

	$args['posts_per_page'] = $columns;
	$args['columns']        = $columns;

	return $args;
}

/**
 * Change number of cross sell products columns.
 *
 * @param int $columns Number of cross sells columns.
 */
function organic_goodness_change_cross_sells_columns( $columns ) {
	if ( wp_is_mobile() ) {
		return 2;
	}

	return 3;
}

/**
 * Add wrapper to product summary.
 */
function organic_goodness_product_summary_wrapper_open() {
	?>
	<div class="product-summary alignwide relative block margin-b">
		<?php
}

	/**
	 * Add closing wrapper to product summary.
	 */
function organic_goodness_product_summary_wrapper_close() {
	?>
	</div>
	<?php
}

/**
 * Shop Filters Area.
 */
function organic_goodness_woocommerce_toolbar_header() {
	?>
	<div class="woocommerce-product-loop-header">

		<?php do_action( 'organic_goodness_woocommerce_product_ordering' ); ?>

		<?php organic_goodness_show_product_categories(); ?>

		<?php if ( is_active_sidebar( 'shop-filters-widgets' ) ) { ?>
			<?php $filter_button_class = ( 'sidebar' === Organic_Goodness_Customize::get_option( 'shop_filters_display' ) ) ? 'hidden-lg-up' : ''; ?>
			<button class="filters-toggle <?php echo esc_attr( $filter_button_class ); ?>"><span class="screen-reader-text"><?php echo esc_html( 'Shop Filters Toggle' ); ?></span><?php echo esc_html_x( 'Filters', 'Shop filters', 'organic-goodness' ); ?></button>
		<?php } ?>

	</div>

	<?php if ( ( 'dropdown' === Organic_Goodness_Customize::get_option( 'shop_filters_display' ) ) && is_active_sidebar( 'shop-filters-widgets' ) ) { ?>
		<div class="woocommerce-filters-area dropdown init">

			<?php the_widget( 'WC_Widget_Layered_Nav_Filters' ); ?>

			<div class="shop-filters absolute">
				<?php dynamic_sidebar( 'shop-filters-widgets' ); ?>
			</div>
		</div>
		<?php
	}
}

/**
 * Update local storage with cart counter each time.
 *
 * @param array $fragments Add to cart fragments.
 */
function organic_goodness_shopping_bag_items_number( $fragments ) {
	global $woocommerce;

	ob_start();
	?>

	<span class="bag-product-count"><span><?php echo is_object( WC()->cart ) ? esc_html( WC()->cart->get_cart_contents_count() ) : ''; ?></span></span>
	<?php
	$fragments['.bag-product-count'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'organic_goodness_shopping_bag_items_number' );

/**
* Product gallery thumbs image size.
*/
add_filter(
	'woocommerce_get_image_size_gallery_thumbnail',
	function( $size ) {
		return array(
			'width'  => 150,
			'height' => 0,
			'crop'   => 0,
		);
	}
);

/**
* Enable minicart widget on cart and checkout pages.
*/
add_filter(
	'woocommerce_widget_cart_is_hidden',
	function() {
		return false;
	},
	40,
	0
);

/**
* Configure WooCommerce built-in Photoswipe.
*/
add_filter(
	'woocommerce_single_product_photoswipe_options',
	function( $options ) {
		$options['captionEl']    = false;
		$options['fullscreenEl'] = false;
		$options['zoomEl']       = false;
		$options['shareEl']      = false;
		$options['galleryPIDs']  = true;
		$options['barsSize']     = array(
			'top'    => 0,
			'bottom' => 'auto',
		);

		return $options;
	}
);

/**
 * Login Form Wrapper Start.
 */
function organic_goodness_login_form_wrapper_start() {
	echo '<div class="woocommerce-login-form-wrapper">';
}

/**
 * Login Form Wrapper End.
 */
function organic_goodness_login_form_wrapper_end() {
	echo '</div>';
}

/**
 * Checkout Review Order Wrapper Start.
 */
function organic_goodness_order_review_wrapper_start() {
	echo '<div class="woocommerce-checkout-review-order-wrapper">';
}

/**
 * Checkout Review Order Wrapper End.
 */
function organic_goodness_order_review_wrapper_end() {
	echo '</div></div>';
}

/**
 * Insert clear div before product tabs.
 */
function organic_goodness_product_tabs_clear() {
	?>
	<div class="clear"></div>
	<?php
}

/**
 * Load More Pagination.
 */
function organic_goodness_load_more_pagination() {
	if ( 'load-more' !== Organic_Goodness_Customize::get_option( 'shop_pagination' ) ) {
		return;
	}
	?>
	<div class="woocommerce-load-more-pagination block text-center">
		<?php do_action( 'organic_goodness_product_result_count' ); ?>
		<button class="link-button" products-loading-processing="0"><?php echo esc_html_x( 'Load More', 'Load More Pagination Button Text', 'organic-goodness' ); ?></button>
	</div>
	<?php
}

/**
 * Shop Filters Sidebar.
 */
function organic_goodness_woocommerce_filters() {
	if ( 'sidebar' !== Organic_Goodness_Customize::get_option( 'shop_filters_display' ) || ! is_active_sidebar( 'shop-filters-widgets' ) ) {
		return;
	}
	?>
	<div class="woocommerce-product-loop-wrapper">
		<div class="woocommerce-filters-area sidebar">
			<?php the_widget( 'WC_Widget_Layered_Nav_Filters' ); ?>
			<div class="shop-filters">
				<?php dynamic_sidebar( 'shop-filters-widgets' ); ?>
			</div>
		</div>
	<?php
}

/**
 * Shop Filters Sidebar Wrapper Close.
 */
function organic_goodness_woocommerce_filters_wrapper_close() {
	if ( 'sidebar' !== Organic_Goodness_Customize::get_option( 'shop_filters_display' ) || ! is_active_sidebar( 'shop-filters-widgets' ) ) {
		return;
	}
	echo '</div>';
}

/**
 * Product Page Wrapper Start.
 */
function organic_goodness_product_wrapper_start() {
	?>
	<div class="product-gallery-wrapper">
	<?php
}

/**
 * Product Page Wrapper End.
 */
function organic_goodness_product_wrapper_end() {
	?>
	</div>
	<div class="clear"></div>
	<?php
}
