<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @package organic-goodness
 * @since 1.0
 */

if ( ! function_exists( 'organic_goodness_setup' ) ) :
	/**
	 * Theme setup function.
	 */
	function organic_goodness_setup() {

		if ( ! isset( $content_width ) ) {
			$content_width = 775;
		}

		// Load theme languages.
		load_theme_textdomain( 'organic-goodness', get_template_directory() . '/languages' );

		// Enable support for post thumbnails and featured images.
		add_theme_support( 'post-thumbnails' );

		// Enable block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for block embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for template editor.
		add_theme_support( 'block-templates' );

		// Add automatic feed links for post and comment in the head.
		add_theme_support( 'automatic-feed-links' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for WooCommerce.
		add_theme_support(
			'woocommerce',
			array(
				'product_grid' => array(
					'default_columns' => 3,
					'min_columns'     => 2,
					'max_columns'     => 5,
				),
			)
		);

		// Woocommerce Gallery.
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		if ( Organic_Goodness_Customize::get_option( 'product_image_zoom' ) ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}

		// Add title-tag support.
		add_theme_support( 'title-tag' );

		// Google font weights filter.
		add_filter( 'organic_goodness_google_font_weights', array( 'Organic_Goodness_Fonts', 'get_google_font_weights' ), 10, 1 );

		// Add support for custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 50,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
				'header-text' => array( 'site-title', 'site-description' ),
			)
		);

		// Registrer menus.
		register_nav_menus(
			array(
				'primary-left'  => esc_html_x( 'Desktop Menu - Left', 'Menu Locations', 'organic-goodness' ),
				'primary-right' => esc_html_x( 'Desktop Menu - Right', 'Menu Locations', 'organic-goodness' ),
				'mobile'        => esc_html_x( 'Mobile Menu', 'Menu Locations', 'organic-goodness' ),
			)
		);

		// Add support for HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'widgets',
			)
		);

		// Block editor styles.
		add_editor_style( 'assets/css/editor-styles.css' );

		// Excerpt Settings.
		add_filter(
			'excerpt_more',
			function() {
				return ' ...';
			},
			21
		);
	}
endif;
add_action( 'after_setup_theme', 'organic_goodness_setup' );

add_action(
	'init',
	function() {
		add_post_type_support( 'page', 'page-attributes' );
	}
);

/**
 * Registers widget areas.
 */
function organic_goodness_register_widget_areas() {
	register_sidebar(
		array(
			'name'          => esc_html_x( 'Shop Filters', 'Sidebar name', 'organic-goodness' ),
			'id'            => 'shop-filters-widgets',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html_x( 'Footer Widgets', 'Sidebar name', 'organic-goodness' ),
			'id'            => 'footer-widgets',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'organic_goodness_register_widget_areas' );

/**
 * Adds conditional body classes.
 *
 * @param array $classes Classes added to the body tag.
 * @return array Classes added to the body tag.
 */
function organic_goodness_body_classes( $classes ) {
	global $post;
	$post_type = isset( $post ) ? $post->post_type : false;

	// Check whether we're singular.
	if ( is_singular() ) {
		$classes[] = 'singular';
	}

	// Check if a mobile device is being used.
	if ( wp_is_mobile() ) {
		$classes[] = 'is-mobile';
	}

	// Product Lists Display.
	$classes[] = 'wc-' . Organic_Goodness_Customize::get_option( 'mobile_products_display' ) . '-products';

	// Slim page template class names (class = name - file suffix).
	if ( is_page_template() ) {
		$classes[] = basename( get_page_template_slug(), '.php' );
	}

	// Check whether we're in the customizer preview.
	if ( is_customize_preview() ) {
		$classes[] = 'customizer-preview';
	}

	return $classes;
}
add_filter( 'body_class', 'organic_goodness_body_classes' );

/**
 * Search - set post types to be retrieved.
 *
 * @param object $query Search query.
 */
function organic_goodness_search_filter( $query ) {
	if ( $query->is_search ) {
		if ( ! isset( $query->query_vars['post_type'] ) ) {
			$query->set( 'post_type', array( 'post', 'page' ) );
		}
	}
	return $query;
}
add_filter( 'pre_get_posts', 'organic_goodness_search_filter' );

/**
 * Add blog post Read More link.
 *
 * @param string $excerpt The post excerpt.
 * @return string The processed post excerpt.
 */
function organic_goodness_excerpt_read_more_link( $excerpt ) {
	if ( ! Organic_Goodness_Customize::get_option( 'excerpt_read_more_link' ) ) {
		return $excerpt;
	}

	$excerpt_text = Organic_Goodness_Customize::get_option( 'excerpt_read_more_link_text' );
	$excerpt     .= sprintf(
		'<a class="excerpt-read-more" href="%s">%s</a>',
		esc_url( get_permalink() ),
		__( $excerpt_text, 'organic-goodness' ) //phpcs:ignore
	);
	return $excerpt;
}
add_filter( 'get_the_excerpt', 'organic_goodness_excerpt_read_more_link', 21 );

/**
 * Menu dropdown arrows.
 *
 * @param string $output The output.
 * @param object $item Menu item.
 * @param object $depth Menu item depth.
 * @param object $args Menu args.
 */
function organic_goodness_add_menu_dropdown_arrow( $output, $item, $depth, $args ) {
	$menus = array( 'primary-left', 'primary-right', 'mobile' );

	// Only add class to 'top level' items on the 'primary' menu.
	if ( in_array( $args->theme_location, $menus, true ) && in_array( 'menu-item-has-children', $item->classes, true ) && ( 0 === $depth ) ) {
		$output .= '<button class="sub-menu-icon"><span class="screen-reader-text">' . esc_html( 'Menu Toggle' ) . '</span><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16" height="16" viewBox="0 0 24 24"><path d="M 2.65625 6.25 L 1.34375 7.75 L 11.34375 16.75 L 12 17.34375 L 12.65625 16.75 L 22.65625 7.75 L 21.34375 6.25 L 12 14.65625 Z "></path></svg></button>';
	}

	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'organic_goodness_add_menu_dropdown_arrow', 10, 4 );

/**
 * Returns true if WooCommerce is installed and active.
 */
function organic_goodness_is_wc_active() {

	return class_exists( 'WooCommerce' );
}

/**
 * Limit excerpt number of characters.
 */
function organic_goodness_limit_excerpt() {
	return 15;
}
