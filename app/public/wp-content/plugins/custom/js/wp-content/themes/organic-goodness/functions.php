<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage organic-goodness
 * @since 1.0.0
 */

// Main Class.
require get_template_directory() . '/class/class-organic-goodness.php';

// Handle Customizer Settings.
require get_template_directory() . '/class/class-organic-goodness-customize.php';

// Elementor Compatibility.
require get_template_directory() . '/class/class-organic-goodness-elementor-extension.php';

// Theme Setup.
require_once get_parent_theme_file_path( '/includes/theme-setup/class-organic-goodness-theme-setup.php' );
require_once get_parent_theme_file_path( '/includes/theme-setup/theme-setup-config.php' );

if ( is_admin() ) {
	// Block Patterns.
	include get_template_directory() . '/functions/function-block-patterns.php';
}

// Include Theme Setup Functions.
require get_template_directory() . '/functions/function-theme-setup.php';

// Include Theme Enqueue Functions.
require get_template_directory() . '/functions/function-enqueue.php';

// Include WooCommerce Functions.
if ( organic_goodness_is_wc_active() ) {
	require get_template_directory() . '/functions/function-woocommerce-setup.php';
}

// Include Theme Fonts Class.
require get_template_directory() . '/class/class-organic-goodness-fonts.php';

// Include Theme's Template Tags.
require get_template_directory() . '/includes/template-tags.php';
