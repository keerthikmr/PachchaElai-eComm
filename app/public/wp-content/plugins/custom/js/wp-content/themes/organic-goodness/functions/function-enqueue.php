<?php
/**
 * Register and Enqueue Styles and Scripts.
 *
 * @package organic-goodness
 * @since 1.0
 */

/**
 * Enqueue theme scripts and styles.
 */
function organic_goodness_scripts() {

	$google_base_font_url = Organic_Goodness_Fonts::get_google_font_url( 'body_font_family' );
	if ( $google_base_font_url ) {
		wp_enqueue_style( 'organic-goodness-google-base-font', $google_base_font_url, false, Organic_Goodness::get_theme_version(), 'all' );
	}

	$google_headings_font_url = Organic_Goodness_Fonts::get_google_font_url( 'headings_font_family' );
	if ( $google_headings_font_url ) {
		wp_enqueue_style( 'organic-goodness-google-headings-font', $google_headings_font_url, false, Organic_Goodness::get_theme_version(), 'all' );
	}

	wp_enqueue_script( 'comment-reply' );

	wp_enqueue_style( 'organic-goodness-style', get_template_directory_uri() . '/style.css', array(), Organic_Goodness::get_theme_version() );

	wp_enqueue_style( 'organic-goodness-main', get_template_directory_uri() . '/assets/css/styles.css', array(), Organic_Goodness::get_theme_version(), 'all' );

	wp_enqueue_script( 'organic-goodness-main', get_template_directory_uri() . '/assets/js/scripts.min.js', array( 'jquery' ), true, Organic_Goodness::get_theme_version() );

	$total = function_exists( 'wc_get_loop_prop' ) ? wc_get_loop_prop( 'total' ) : 0;
	/* translators: %d: total results */
	$showing_all_results_text = sprintf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'woocommerce' ), $total );

	wp_localize_script(
		'organic-goodness-main',
		'organic_goodness',
		array(
			'is_woocommerce'               => organic_goodness_is_wc_active(),
			'sticky_header_always_visible' => Organic_Goodness_Customize::get_option( 'sticky_header_always_visible' ),
			'products_per_page'            => get_option( 'woocommerce_catalog_rows', 5 ) * get_option( 'woocommerce_catalog_columns', 5 ),
			'pagination'                   => Organic_Goodness_Customize::get_option( 'shop_pagination' ),
			'showing_all_results_text'     => $showing_all_results_text,
		)
	);

	wp_add_inline_style( 'organic-goodness-main', Organic_Goodness_Customize::get_options_css() );
}
add_action( 'wp_enqueue_scripts', 'organic_goodness_scripts', 100 );

/**
 * Enqueue admin scripts and styles.
 */
function organic_goodness_admin_scripts() {

	$google_base_font_url = Organic_Goodness_Fonts::get_google_font_url( 'body_font_family' );
	if ( $google_base_font_url ) {
		wp_enqueue_style( 'organic-goodness-google-base-font', $google_base_font_url, false, Organic_Goodness::get_theme_version(), 'all' );
	}

	$google_headings_font_url = Organic_Goodness_Fonts::get_google_font_url( 'headings_font_family' );
	if ( $google_headings_font_url ) {
		wp_enqueue_style( 'organic-goodness-google-headings-font', $google_headings_font_url, false, Organic_Goodness::get_theme_version(), 'all' );
	}

	wp_enqueue_style( 'organic-goodness-admin-main', get_template_directory_uri() . '/assets/css/admin-styles.css', array(), Organic_Goodness::get_theme_version(), 'all' );

	wp_add_inline_style( 'organic-goodness-admin-main', Organic_Goodness_Customize::get_options_css() );
}
add_action( 'admin_enqueue_scripts', 'organic_goodness_admin_scripts' );
