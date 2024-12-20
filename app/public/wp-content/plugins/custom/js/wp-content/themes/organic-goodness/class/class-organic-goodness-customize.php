<?php
/**
 * Customizer settings for this theme.
 *
 * @package WordPress
 * @subpackage organic-goodness
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Organic_Goodness_Customize' ) ) {
	/**
	 * Customizer Settings.
	 */
	class Organic_Goodness_Customize {

		/**
		 * Cache each request to prevent duplicate queries.
		 *
		 * @var array
		 */
		protected static $cached = array();

		/**
		 * Organic Goodness_Customize constructor
		 */
		private function __construct() {}

		/**
		 * Default values for theme options
		 *
		 * @return array The options array
		 */
		private static function theme_defaults() {
			return array(
				'headings_font_family'          => 'Prata',
				'body_font_family'              => 'Jost',
				'font_size'                     => 18,
				'body_color_1'                  => '#fffdf9',
				'body_color_2'                  => '#2d4b38',
				'body_color_3'                  => '#59956f',
				'body_color_4'                  => '#59956f',
				'body_color_5'                  => '#c95328',
				'body_color_6'                  => '#ea9b41',
				'store_notice_background_color' => '#2d4b38',
				'store_notice_text_color'       => '#fffdf9',
				'logo_height'                   => 75,
				'desktop_header_spacing'        => 2.75,
				'mobile_header_spacing'         => 1.55,
				'custom_mobile_logo'            => '',
				'mobile_logo_height'            => 35,
				'mobile_centered_logo'          => true,
				'header_account_icon'           => false,
				'blog_post_logo'                => true,
				'excerpt_read_more_link'        => false,
				'excerpt_read_more_link_text'   => 'Continue Reading',
				'footer_background_color'       => '#2d4b38',
				'footer_text_color'             => '#fffdf9',
				'footer_text_note'              => '© 2022 All rights reserved.',
				'footer_spacing'                => 15,
				'footer_first_widget_columns'   => 3,
				'footer_widget_columns'         => 5,
				'footer_background_image'       => '',
				'shop_categories_list'          => true,
				'shop_categories_list_display'  => 'main-categories',
				'shop_pagination'               => 'classic',
				'shop_filters_display'          => 'dropdown',
				'product_navigation'            => true,
				'product_sorting'               => true,
				'product_image_zoom'            => true,
				'mobile_products_display'       => 'draggable',
				'mobile_categories_list'        => true,
				'mobile_menu_show_on_desktop'   => false,
				'sticky_header_always_visible'  => false,
				'mobile_logo_on_phones_only'    => false,
			);
		}

		/**
		 * Writes the options inline styles
		 *
		 * @return string
		 */
		public static function get_options_css() {
			$background_image           = ( ! empty( self::get_option( 'footer_background_image' ) ) && filter_var( self::get_option( 'footer_background_image' ), FILTER_VALIDATE_URL ) ) ? 'url(' . self::get_option( 'footer_background_image' ) . ')' : 'none';
			$footer_first_widget_column = ( 4 <= (int) self::get_option( 'footer_widget_columns' ) ) ? self::get_option( 'footer_first_widget_columns' ) : 1;

			$options = '
				:root {
					--global--font-headings: 	 		 		' . Organic_Goodness_Fonts::get_font( self::get_option( 'headings_font_family' ) ) . ';
					--global--font-primary: 	 		 		' . Organic_Goodness_Fonts::get_font( self::get_option( 'body_font_family' ) ) . ';
					--global--font-size-base: 	 		 		' . self::get_option( 'font_size' ) . 'px;

					--global--body-color-1: 		 	 		' . self::get_option( 'body_color_1' ) . ';
					--global--body-color-1-xlight: 	 	 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_1' ) ) . ', .05);
					--global--body-color-1-light: 	 			rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_1' ) ) . ', .15);
					--global--body-color-1-medium: 	 	 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_1' ) ) . ', .5);
					--global--body-color-1-dark: 	 	 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_1' ) ) . ', .9);
					--global--body-color-1-xdark: 	 	 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_1' ) ) . ', .95);
					--global--body-color-2: 		     		' . self::get_option( 'body_color_2' ) . ';
					--global--body-color-2-rgb: 		 		' . self::convert_hex_to_rgb( self::get_option( 'body_color_2' ) ) . ';
					--global--body-color-2-xlight: 		 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_2' ) ) . ', .05);
					--global--body-color-2-light: 		 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_2' ) ) . ', .15);
					--global--body-color-2-medium: 		 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_2' ) ) . ', .5);
					--global--body-color-2-dark: 		 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_2' ) ) . ', .75);
					--global--body-color-3: 			 		' . self::get_option( 'body_color_3' ) . ';
					--global--body-color-3-medium: 	 	 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_3' ) ) . ', .5);
					--global--body-color-3-dark: 		 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'body_color_3' ) ) . ', .75);
					--global--body-color-3-rgb: 		 		' . self::convert_hex_to_rgb( self::get_option( 'body_color_3' ) ) . ';
					--global--body-color-4: 			 		' . self::get_option( 'body_color_4' ) . ';
					--global--body-color-5: 			 		' . self::get_option( 'body_color_5' ) . ';
					--global--body-color-6: 			 		' . self::get_option( 'body_color_6' ) . ';
					--global--store-notice-background-color: 	' . self::get_option( 'store_notice_background_color' ) . ';
					--global--store-notice-text-color: 	        ' . self::get_option( 'store_notice_text_color' ) . ';
					--global--footer-background--color:  		' . self::get_option( 'footer_background_color' ) . ';
					--global--footer-background-medium--color:  rgba(' . self::convert_hex_to_rgb( self::get_option( 'footer_background_color' ) ) . ', .5);
					--global--footer-text--color: 		 		' . self::get_option( 'footer_text_color' ) . ';
					--global--footer-text-dark--color:   		rgba(' . self::convert_hex_to_rgb( self::get_option( 'footer_text_color' ) ) . ', .75);
					--global--footer-text-medium--color: 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'footer_text_color' ) ) . ', .5);
					--global--footer-text-light--color:  		rgba(' . self::convert_hex_to_rgb( self::get_option( 'footer_text_color' ) ) . ', .15);
					--global--footer-text-xlight--color: 		rgba(' . self::convert_hex_to_rgb( self::get_option( 'footer_text_color' ) ) . ', .05);
					--global--footer-spacing:				 	' . self::get_option( 'footer_spacing' ) . 'rem;
					--global--footer-first-widget-columns:      ' . $footer_first_widget_column . ';
					--global--footer-widget-columns:            ' . self::get_option( 'footer_widget_columns' ) . ';
					--global--footer-background-image: 			' . $background_image . ';

					--global--logo-height:				 		' . self::get_option( 'logo_height' ) . 'px;
					--global--mobile-logo-height:				' . self::get_option( 'mobile_logo_height' ) . 'px;
					--global--desktop-header-spacing:			' . self::get_option( 'desktop_header_spacing' ) . 'rem;
					--global--mobile-header-spacing:			' . self::get_option( 'mobile_header_spacing' ) . 'rem;

					--gallery-block--gutter-size:               1.55rem;
					--wp--style--block-gap:                     2.75rem;
					--wp--style--unstable-gallery-gap:          1.55rem;
					
				}

				body .wp-block-gallery-2 {
					--wp--style--unstable-gallery-gap: 1.55rem;
					gap: 1.55rem;
				}

				select, select:hover, select:focus,
				.wc-block-components-select .components-custom-select-control__button,
				.wc-block-components-select .components-custom-select-control__button:hover,
				.wc-block-components-select .components-custom-select-control__button:focus,
				.wp-block-woocommerce-checkout .wc-block-checkout__form .wc-block-components-checkout-step__content .wc-block-components-combobox .wc-block-components-combobox-control input.components-combobox-control__input,
				.wc-block-components-combobox .wc-block-components-combobox-control input.components-combobox-control__input,
				.wc-block-components-form .wc-block-components-combobox .wc-block-components-combobox-control input.components-combobox-control__input,
				.wc-blocks-components-form-token-field-wrapper .components-form-token-field__input-container input[type=text].components-form-token-field__input {
					background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'16\' height=\'16\' viewBox=\'0 0 24 24\' fill=\'rgb(' . self::convert_hex_to_rgb( self::get_option( 'body_color_2' ) ) . ')\'><path d=\'M 2.65625 6.25 L 1.34375 7.75 L 11.34375 16.75 L 12 17.34375 L 12.65625 16.75 L 22.65625 7.75 L 21.34375 6.25 L 12 14.65625 Z \'></path></svg>");
				}

				.wp-block-woocommerce-cart .wc-block-cart .wc-block-cart__sidebar .wc-block-components-shipping-calculator .wc-block-components-combobox-control input.components-combobox-control__input {
					background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'16\' height=\'16\' viewBox=\'0 0 24 24\' fill=\'rgb(' . self::convert_hex_to_rgb( self::get_option( 'body_color_1' ) ) . ')\'><path d=\'M 2.65625 6.25 L 1.34375 7.75 L 11.34375 16.75 L 12 17.34375 L 12.65625 16.75 L 22.65625 7.75 L 21.34375 6.25 L 12 14.65625 Z \'></path></svg>");
				}

				#site-footer select, #site-footer select:hover, #site-footer select:focus,
				#site-footer .wc-block-components-select .components-custom-select-control__button,
				#site-footer .wc-block-components-select .components-custom-select-control__button:hover,
				#site-footer .wc-block-components-select .components-custom-select-control__button:focus,
			    #site-footer .is-single .wc-block-components-dropdown-selector__input:first-child {
					background-image: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'' . self::get_option( 'font_size' ) . '\' height=\'' . self::get_option( 'font_size' ) . '\' viewBox=\'0 0 24 24\' fill=\'rgb(' . self::convert_hex_to_rgb( self::get_option( 'footer_text_color' ) ) . ')\'><path d=\'M 2.65625 6.25 L 1.34375 7.75 L 11.34375 16.75 L 12 17.34375 L 12.65625 16.75 L 22.65625 7.75 L 21.34375 6.25 L 12 14.65625 Z \'></path></svg>");
				}
				';

			return self::compress_styles( $options );
		}

		/**
		 * Writes the experimental-theme.json with the customizer options
		 *
		 * @return void
		 */
		public static function get_options_json() {
			$json_array = array(
				'global' => array(
					'presets' => array(
						'color' => array(
							array(
								'slug'  => 'background',
								'value' => self::get_option( 'body_color_1' ),
							),
							array(
								'slug'  => 'font',
								'value' => self::get_option( 'body_color_2' ),
							),
							array(
								'slug'  => 'accent',
								'value' => self::get_option( 'body_color_3' ),
							),
						),
						'font'  => array(
							array(
								'slug'  => 'family',
								'value' => Organic_Goodness_Fonts::get_font( self::get_option( 'body_font_family' ) ),
							),
							array(
								'slug'  => 'base_size',
								'value' => self::get_option( 'font_size' ),
							),
						),
					),
				),
			);
		}

		/**
		 * Compress custom styles.
		 *
		 * @param string $minify String to be minified.
		 */
		public static function compress_styles( $minify ) {
			$minify = preg_replace( '/\/\*((?!\*\/).)*\*\//', '', $minify ); // negative look ahead.
			$minify = preg_replace( '/\s{2,}/', ' ', $minify );
			$minify = preg_replace( '/\s*([:;{}])\s*/', '$1', $minify );
			$minify = preg_replace( '/;}/', '}', $minify );

			return $minify;
		}

		/**
		 * Create Color Control.
		 *
		 * @param object $wp_customize WP Customize.
		 * @param string $option_name The option name.
		 * @param string $sanitize_function The options's sanitize function.
		 * @param string $default_value The option's default value.
		 * @param string $label The option's label.
		 * @param string $description The option's description.
		 * @param string $section The option's section.
		 * @param int    $priority The option's priority.
		 */
		public static function add_color_control( $wp_customize, $option_name, $sanitize_function, $default_value, $label, $description, $section, $priority ) {
			$wp_customize->add_setting(
				$option_name,
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => $sanitize_function,
					'default'           => $default_value,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					$option_name,
					array(
						'label'       => $label,
						'description' => $description,
						'section'     => $section,
						'priority'    => $priority,
					)
				)
			);
		}

		/**
		 * Register customizer options.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public static function register( $wp_customize ) {

			/**
			* Site Title & Description.
			* */
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => 'organic_goodness_customize_partial_blogname',
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => 'organic_goodness_customize_partial_blogdescription',
				)
			);

			self::register_header_controls( $wp_customize );
			self::register_mobile_menu_controls( $wp_customize );
			self::register_fonts_controls( $wp_customize );
			self::register_colors_controls( $wp_customize );
			self::register_footer_controls( $wp_customize );
			self::register_blog_controls( $wp_customize );

			if ( organic_goodness_is_wc_active() ) {
				self::register_woocommerce_controls( $wp_customize );
			}
		}

		/**
		 * Header Section controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public static function register_header_controls( $wp_customize ) {

			// Header.
			$wp_customize->add_section(
				'header',
				array(
					'title'    => esc_html_x( 'Header', 'Theme customizer options', 'organic-goodness' ),
					'priority' => 22,
				)
			);

			// Logo Max Height.
			$wp_customize->add_setting(
				'logo_height',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'absint',
					'default'           => 75,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'logo_height',
					array(
						'type'        => 'number',
						'label'       => esc_html_x( 'Logo Max Height', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html( '(0px - 300px)' ),
						'section'     => 'title_tagline',
						'priority'    => 9,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 300,
							'step' => 1,
						),
					)
				)
			);

			// Mobile Logo.
			$wp_customize->add_setting(
				'custom_mobile_logo',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_image',
					'default'           => '',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'custom_mobile_logo',
					array(
						'label'       => esc_html_x( 'Mobile Logo', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html_x( 'Used for mobile devices, iPads and tablets under 1024px screen width.', 'Theme customizer options', 'organic-goodness' ),
						'section'     => 'title_tagline',
						'priority'    => 9,
					)
				)
			);

			// Mobile Logo Max Height.
			$wp_customize->add_setting(
				'mobile_logo_height',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'absint',
					'default'           => 35,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mobile_logo_height',
					array(
						'type'        => 'number',
						'label'       => esc_html_x( 'Mobile Logo Max Height', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html( '(0px - 100px)' ),
						'section'     => 'title_tagline',
						'priority'    => 9,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
					)
				)
			);

			// Display the desktop logo on tablets.
			$wp_customize->add_setting(
				'mobile_logo_on_phones_only',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => false,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mobile_logo_on_phones_only',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Use the mobile logo on phone screens only', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'title_tagline',
						'priority' => 9,
					)
				)
			);

			// Desktop Header Top-Bottom Spacing.
			$wp_customize->add_setting(
				'desktop_header_spacing',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_float_number',
					'default'           => 2.75,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'desktop_header_spacing',
					array(
						'type'        => 'number',
						'label'       => esc_html_x( 'Desktop Header Top-Bottom Spacing', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html( '(0rem - 6rem)' ),
						'section'     => 'header',
						'priority'    => 9,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 6,
							'step' => 0.05,
						),
					)
				)
			);

			// Mobile Header Top-Bottom Spacing.
			$wp_customize->add_setting(
				'mobile_header_spacing',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_float_number',
					'default'           => 1.55,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mobile_header_spacing',
					array(
						'type'        => 'number',
						'label'       => esc_html_x( 'Mobile Header Top-Bottom Spacing', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html( '(0rem - 4rem)' ),
						'section'     => 'header',
						'priority'    => 9,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 4,
							'step' => 0.05,
						),
					)
				)
			);

			// Keep header visible onwhen scrolling down.
			$wp_customize->add_setting(
				'sticky_header_always_visible',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => false,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'sticky_header_always_visible',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Keep header visible on scroll', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'header',
						'priority' => 9,
					)
				)
			);

			// Center logo on mobile screens.
			$wp_customize->add_setting(
				'mobile_centered_logo',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => true,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mobile_centered_logo',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Center logo on mobile devices', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'header',
						'priority' => 10,
					)
				)
			);

			// Add Account Icon.
			$wp_customize->add_setting(
				'header_account_icon',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => false,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'header_account_icon',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Add account icon', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'header',
						'priority' => 10,
					)
				)
			);
		}

		/**
		 * Mobile Menu Section controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public static function register_mobile_menu_controls( $wp_customize ) {

			// Mobile Menu Section.
			$wp_customize->add_section(
				'mobile_menu',
				array(
					'title'    => esc_html_x( 'Mobile Menu', 'Theme customizer options', 'organic-goodness' ),
					'priority' => 22,
				)
			);

			// Show mobile menu on desktop.
			$wp_customize->add_setting(
				'mobile_menu_show_on_desktop',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => false,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mobile_menu_show_on_desktop',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Show mobile menu on desktop', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'mobile_menu',
						'priority' => 10,
					)
				)
			);

			if ( organic_goodness_is_wc_active() ) {

				// Show categories list in mobile menu.
				$wp_customize->add_setting(
					'mobile_categories_list',
					array(
						'type'              => 'theme_mod',
						'capability'        => 'edit_theme_options',
						'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
						'default'           => true,
					)
				);

				$wp_customize->add_control(
					new WP_Customize_Control(
						$wp_customize,
						'mobile_categories_list',
						array(
							'type'     => 'checkbox',
							'label'    => esc_html_x( 'Show categories list in mobile menu', 'Theme customizer options', 'organic-goodness' ),
							'section'  => 'mobile_menu',
							'priority' => 10,
						)
					)
				);
			}
		}

		/**
		 * Footer Section controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public static function register_footer_controls( $wp_customize ) {

			// Footer Section.
			$wp_customize->add_section(
				'footer',
				array(
					'title'    => esc_html_x( 'Footer', 'Theme customizer options', 'organic-goodness' ),
					'priority' => 22,
				)
			);

			// Footer Text Note.
			$wp_customize->add_setting(
				'footer_text_note',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_html_text',
					'default'           => '© 2022 All rights reserved.',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'footer_text_note',
					array(
						'type'        => 'textarea',
						'label'       => esc_html_x( 'Footer Text Note', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html_x( 'Allowed HTML tags: a, br, div, em, i, img, span, strong', 'Theme customizer options', 'organic-goodness' ),
						'section'     => 'footer',
						'priority'    => 10,
					)
				)
			);

			$wp_customize->selective_refresh->add_partial(
				'footer_text_note',
				array(
					'selector'        => 'footer .footer-text-note',
					'render_callback' => 'organic_goodness_customize_partial_footer_text',
				)
			);

			// Background Image.
			$wp_customize->add_setting(
				'footer_background_image',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw',
					'default'           => '',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'footer_background_image',
					array(
						'section'  => 'footer',
						'label'    => esc_html_x( 'Footer Background Image', 'Theme customizer options', 'organic-goodness' ),
						'priority' => 10,
					)
				)
			);

			// Footer Background Color.
			self::add_color_control(
				$wp_customize,
				'footer_background_color',
				'sanitize_hex_color',
				'#2d4b38',
				esc_html_x( 'Footer Background Color', 'Theme customizer options', 'organic-goodness' ),
				'',
				'footer',
				10
			);

			// Footer Text Color.
			self::add_color_control(
				$wp_customize,
				'footer_text_color',
				'sanitize_hex_color',
				'#fffdf9',
				esc_html_x( 'Footer Text Color', 'Theme customizer options', 'organic-goodness' ),
				'',
				'footer',
				10
			);

			// Footer Spacing.
			$wp_customize->add_setting(
				'footer_spacing',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'absint',
					'default'           => 15,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'footer_spacing',
					array(
						'type'        => 'number',
						'label'       => esc_html_x( 'Footer Spacing', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html( '(0rem - 15rem)' ),
						'section'     => 'footer',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 15,
							'step' => 1,
						),
					)
				)
			);

			// Footer Widget Columns.
			$wp_customize->add_setting(
				'footer_widget_columns',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'absint',
					'default'           => 5,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'footer_widget_columns',
					array(
						'type'        => 'number',
						'label'       => esc_html_x( 'Footer Widget Columns', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html( '(2-5)' ),
						'section'     => 'footer',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 2,
							'max'  => 5,
							'step' => 1,
						),
					)
				)
			);

			// Display first widget over x columns.
			$wp_customize->add_setting(
				'footer_first_widget_columns',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'absint',
					'default'           => 3,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'footer_first_widget_columns',
					array(
						'type'            => 'number',
						'label'           => esc_html_x( 'Display The First Widget Over x Columns', 'Theme customizer options', 'organic-goodness' ),
						'description'     => esc_html( '(1-3)' ),
						'section'         => 'footer',
						'priority'        => 10,
						'input_attrs'     => array(
							'min'  => 1,
							'max'  => 3,
							'step' => 1,
						),
						'active_callback' => 'organic_goodness_over_four_widget_columns',
					)
				)
			);
		}

		/**
		 * Fonts Section controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public static function register_fonts_controls( $wp_customize ) {

			// Fonts Section.
			$wp_customize->add_section(
				'fonts',
				array(
					'title'    => esc_attr_x( 'Fonts', 'Theme customizer options', 'organic-goodness' ),
					'priority' => 20,
				)
			);

			// Headings Font.
			$wp_customize->add_setting(
				'headings_font_family',
				array(
					'default'           => 'Prata',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'wp_filter_nohtml_kses',
					'type'              => 'theme_mod',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'headings_font_family',
					array(
						'type'        => 'text',
						'label'       => esc_html_x( 'Headings Font Family', 'Theme customizer options', 'organic-goodness' ),
						'description' => wp_kses_post( 'Organic Goodness supports all fonts on <a href="' . Organic_Goodness::get_google_fonts_url() . '" target="_blank">Google Fonts</a> and all <a href="' . Organic_Goodness::get_safe_fonts_url() . '" target="_blank">web safe fonts</a>. Use the exact name of the font as it is called in Google Fonts ( e.g. Roboto Mono ).<br/><a href="' . Organic_Goodness::get_fonts_documentation_url() . '" target="_blank">See documentation</a>' ),
						'section'     => 'fonts',
						'input_attrs' => array(
							'placeholder'    => esc_html_x( 'Enter the font name', 'Theme customizer options', 'organic-goodness' ),
							'class'          => 'organic-goodness-font-suggestions',
							'list'           => 'organic-goodness-suggested-fonts',
							'autocapitalize' => 'off',
							'autocomplete'   => 'off',
							'autocorrect'    => 'off',
							'spellcheck'     => 'false',
						),
					)
				)
			);

			// Base Font.
			$wp_customize->add_setting(
				'body_font_family',
				array(
					'default'           => 'Jost',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'wp_filter_nohtml_kses',
					'type'              => 'theme_mod',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'body_font_family',
					array(
						'type'        => 'text',
						'label'       => esc_html_x( 'Base Font Family', 'Theme customizer options', 'organic-goodness' ),
						'description' => wp_kses_post( 'Organic Goodness supports all fonts on <a href="' . Organic_Goodness::get_google_fonts_url() . '" target="_blank">Google Fonts</a> and all <a href="' . Organic_Goodness::get_safe_fonts_url() . '" target="_blank">web safe fonts</a>. Use the exact name of the font as it is called in Google Fonts ( e.g. Roboto Mono ).<br/><a href="' . Organic_Goodness::get_fonts_documentation_url() . '" target="_blank">See documentation</a>' ),
						'section'     => 'fonts',
						'input_attrs' => array(
							'placeholder'    => esc_html_x( 'Enter the font name', 'Theme customizer options', 'organic-goodness' ),
							'class'          => 'organic-goodness-font-suggestions',
							'list'           => 'organic-goodness-suggested-fonts',
							'autocapitalize' => 'off',
							'autocomplete'   => 'off',
							'autocorrect'    => 'off',
							'spellcheck'     => 'false',
						),
					)
				)
			);

			// Base Font Size.
			$wp_customize->add_setting(
				'font_size',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'absint',
					'default'           => 18,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'font_size',
					array(
						'type'        => 'number',
						'label'       => esc_html_x( 'Base Font Size', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html_x( 'The Base Font Size refers to the size applied to the paragraph text. All other elements, such as headings, links, buttons, etc will adjusted automatically to keep the hierarchy of font sizes based on this one size. Easy-peasy!', 'Theme customizer options', 'organic-goodness' ),
						'section'     => 'fonts',
						'priority'    => 10,
						'input_attrs' => array(
							'min'  => 12,
							'max'  => 24,
							'step' => 1,
						),
					)
				)
			);
		}

		/**
		 * Colors Section controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public static function register_colors_controls( $wp_customize ) {

			// Colors Section.
			$wp_customize->add_section(
				'colors',
				array(
					'title'    => esc_html_x( 'Colors', 'Theme customizer options', 'organic-goodness' ),
					'priority' => 21,
				)
			);

			// Background Color.
			self::add_color_control(
				$wp_customize,
				'body_color_1',
				'sanitize_hex_color',
				'#fffdf9',
				esc_html_x( 'Color 1', 'Theme customizer options', 'organic-goodness' ),
				esc_html_x( 'Used as background color and contrast texts.', 'Theme customizer options', 'organic-goodness' ),
				'colors',
				11
			);

			// Text Color.
			self::add_color_control(
				$wp_customize,
				'body_color_2',
				'sanitize_hex_color',
				'#2d4b38',
				esc_html_x( 'Color 2', 'Theme customizer options', 'organic-goodness' ),
				esc_html_x( 'Used as global text color.', 'Theme customizer options', 'organic-goodness' ),
				'colors',
				11
			);

			// Accent Color.
			self::add_color_control(
				$wp_customize,
				'body_color_3',
				'sanitize_hex_color',
				'#59956f',
				esc_html_x( 'Color 3', 'Theme customizer options', 'organic-goodness' ),
				'',
				'colors',
				11
			);

			// Success Color.
			self::add_color_control(
				$wp_customize,
				'body_color_4',
				'sanitize_hex_color',
				'#59956f',
				esc_html_x( 'Color 4', 'Theme customizer options', 'organic-goodness' ),
				esc_html_x( 'Used for success notifications.', 'Theme customizer options', 'organic-goodness' ),
				'colors',
				11
			);

			// Error Color.
			self::add_color_control(
				$wp_customize,
				'body_color_5',
				'sanitize_hex_color',
				'#c95328',
				esc_html_x( 'Color 5', 'Theme customizer options', 'organic-goodness' ),
				esc_html_x( 'Used for error notifications.', 'Theme customizer options', 'organic-goodness' ),
				'colors',
				11
			);

			// Info Color.
			self::add_color_control(
				$wp_customize,
				'body_color_6',
				'sanitize_hex_color',
				'#ea9b41',
				esc_html_x( 'Color 6', 'Theme customizer options', 'organic-goodness' ),
				esc_html_x( 'Used for info notifications.', 'Theme customizer options', 'organic-goodness' ),
				'colors',
				11
			);

			// Store Notice Background Color.
			self::add_color_control(
				$wp_customize,
				'store_notice_background_color',
				'sanitize_hex_color',
				'#2d4b38',
				esc_html_x( 'Store notice background color', 'Theme customizer options', 'organic-goodness' ),
				'',
				'shop',
				10
			);

			// Store Notice Text Color.
			self::add_color_control(
				$wp_customize,
				'store_notice_text_color',
				'sanitize_hex_color',
				'#fffdf9',
				esc_html_x( 'Store notice text color', 'Theme customizer options', 'organic-goodness' ),
				'',
				'shop',
				10
			);
		}

		/**
		 * Blog Section controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public static function register_blog_controls( $wp_customize ) {

			// Blog Section.
			$wp_customize->add_section(
				'blog',
				array(
					'title'    => esc_html_x( 'Blog', 'Theme customizer options', 'organic-goodness' ),
					'priority' => 22,
				)
			);

			// Display site logo next to blog post.
			$wp_customize->add_setting(
				'blog_post_logo',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => true,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'blog_post_logo',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Display site logo next to blog post', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'blog',
						'priority' => 9,
					)
				)
			);

			// Add "Read More" link to blog posts.
			$wp_customize->add_setting(
				'excerpt_read_more_link',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => false,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'excerpt_read_more_link',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Add Read More link to blog posts', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'blog',
						'priority' => 9,
					)
				)
			);

			// "Read More" link text.
			$wp_customize->add_setting(
				'excerpt_read_more_link_text',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_html_text',
					'default'           => 'Continue Reading',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'excerpt_read_more_link_text',
					array(
						'type'            => 'text',
						'label'           => esc_html_x( '"Read More" link text', 'Theme customizer options', 'organic-goodness' ),
						'section'         => 'blog',
						'priority'        => 10,
						'active_callback' => 'organic_goodness_has_read_more_link',
					)
				)
			);
		}

		/**
		 * WooCommerce controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 * @return void
		 */
		public static function register_woocommerce_controls( $wp_customize ) {

			// Shop Section.
			$wp_customize->add_section(
				'shop',
				array(
					'title'    => esc_html_x( 'Shop', 'Theme customizer options', 'organic-goodness' ),
					'priority' => 22,
				)
			);

			// Shop Pagination.
			$wp_customize->add_setting(
				'shop_pagination',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_select',
					'default'           => 'classic',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'shop_pagination',
					array(
						'type'     => 'select',
						'label'    => esc_html_x( 'Shop Pagination', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'shop',
						'priority' => 10,
						'choices'  => array(
							'classic'   => esc_html_x( 'Classic', 'Theme customizer options', 'organic-goodness' ),
							'load-more' => esc_html_x( 'Load More', 'Theme customizer options', 'organic-goodness' ),
						),
					)
				)
			);

			// Shop Filters Display.
			$wp_customize->add_setting(
				'shop_filters_display',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_select',
					'default'           => 'dropdown',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'shop_filters_display',
					array(
						'type'     => 'select',
						'label'    => esc_html_x( 'Shop Filters Display', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'shop',
						'priority' => 10,
						'choices'  => array(
							'dropdown' => esc_html_x( 'Dropdown Area', 'Theme customizer options', 'organic-goodness' ),
							'sidebar'  => esc_html_x( 'Sidebar', 'Theme customizer options', 'organic-goodness' ),
						),
					)
				)
			);

			// Mobile Products Display.
			$wp_customize->add_setting(
				'mobile_products_display',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_select',
					'default'           => 'draggable',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'mobile_products_display',
					array(
						'type'        => 'select',
						'label'       => esc_html_x( 'Mobile Products Display', 'Theme customizer options', 'organic-goodness' ),
						'description' => esc_html_x( 'This option affects the products blocks and the related/upsell product lists', 'Theme customizer options', 'organic-goodness' ),
						'section'     => 'shop',
						'priority'    => 10,
						'choices'     => array(
							'grid'      => esc_html_x( '2-Column Grid', 'Theme customizer options', 'organic-goodness' ),
							'draggable' => esc_html_x( 'Draggable Product List', 'Theme customizer options', 'organic-goodness' ),
						),
					)
				)
			);

			// Show categories list in product archives.
			$wp_customize->add_setting(
				'shop_categories_list',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => true,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'shop_categories_list',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Show categories list in product archives', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'shop',
						'priority' => 10,
					)
				)
			);

			// Categories List Display.
			$wp_customize->add_setting(
				'shop_categories_list_display',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_select',
					'default'           => 'main-categories',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'shop_categories_list_display',
					array(
						'type'            => 'select',
						'label'           => esc_html_x( 'Categories List Display', 'Theme customizer options', 'organic-goodness' ),
						'description'     => esc_html_x( 'Choose what to display on product category pages.', 'Theme customizer options', 'organic-goodness' ),
						'section'         => 'shop',
						'priority'        => 10,
						'choices'         => array(
							'subcategories'   => esc_html_x( 'Subcategories', 'Theme customizer options', 'organic-goodness' ),
							'main-categories' => esc_html_x( 'Main Shop Categories', 'Theme customizer options', 'organic-goodness' ),
						),
						'active_callback' => 'organic_goodness_shop_categories_list_is_enabled',
					)
				)
			);

			// Show default sorting on product archives.
			$wp_customize->add_setting(
				'product_sorting',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => true,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'product_sorting',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Show default sorting on product archives', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'shop',
						'priority' => 10,
					)
				)
			);

			// Show product navigation on product pages.
			$wp_customize->add_setting(
				'product_navigation',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => true,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'product_navigation',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Show product navigation on product pages', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'shop',
						'priority' => 10,
					)
				)
			);

			// Enable Product Gallery Image Zoom.
			$wp_customize->add_setting(
				'product_image_zoom',
				array(
					'type'              => 'theme_mod',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'Organic_Goodness_Customize::sanitize_checkbox',
					'default'           => true,
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'product_image_zoom',
					array(
						'type'     => 'checkbox',
						'label'    => esc_html_x( 'Enable product gallery image zoom', 'Theme customizer options', 'organic-goodness' ),
						'section'  => 'shop',
						'priority' => 10,
					)
				)
			);
		}

		/**
		 * Sanitizes select controls.
		 *
		 * @param string $input [the input].
		 * @param string $setting [the settings].
		 *
		 * @return string
		 */
		public static function sanitize_select( $input, $setting ) {
			$input   = sanitize_key( $input );
			$choices = isset( $setting->manager->get_control( $setting->id )->choices ) ? $setting->manager->get_control( $setting->id )->choices : '';

			return ( $choices && array_key_exists( $input, $choices ) ) ? $input : $setting->default;
		}

		/**
		 * Sanitizes float controls.
		 *
		 * @param string $input [the input].
		 * @param string $setting [the settings].
		 *
		 * @return string
		 */
		public static function sanitize_float_number( $input, $setting ) {
			return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
		}

		/**
		 * Sanitize boolean for checkbox.
		 *
		 * @param bool $checked Whether or not a box is checked.
		 * @return bool
		 */
		public static function sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true === $checked ) ? true : false );
		}

		/**
		 * Sanitizes html text controls
		 *
		 * @param string $input [the input].
		 *
		 * @return boolean
		 */
		public static function sanitize_html_text( $input ) {
			$allowedtags                          = wp_kses_allowed_html();
			$allowedtags['a']['data-*']           = true;
			$allowedtags['a']['target']           = true;
			$allowedtags['a']['rel']              = true;
			$allowedtags['a']['href']             = true;
			$allowedtags['a']['class']            = true;
			$allowedtags['a']['title']            = true;
			$allowedtags['br']                    = true;
			$allowedtags['em']                    = true;
			$allowedtags['i']                     = true;
			$allowedtags['strong']                = true;
			$allowedtags['div']['class']          = true;
			$allowedtags['div']['data']           = true;
			$allowedtags['div']['style']          = true;
			$allowedtags['span']['class']         = true;
			$allowedtags['span']['style']         = true;
			$allowedtags['img']['alt']            = true;
			$allowedtags['img']['class']          = true;
			$allowedtags['img']['src']            = true;
			$allowedtags['img']['title']          = true;
			$allowedtags['img']['width']          = true;
			$allowedtags['img']['height']         = true;
			$allowedtags['img']['referrerpolicy'] = true;
			$allowedtags['img']['crossorigin']    = true;

			return wp_kses( $input, $allowedtags );
		}

		/**
		 * Sanitizes image upload.
		 *
		 * @param string $input potentially dangerous data.
		 */
		public static function sanitize_image( $input ) {
			$mimes    = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
				'bmp'          => 'image/bmp',
				'tiff|tif'     => 'image/tiff',
				'ico'          => 'image/x-icon',
				'svg'          => 'image/svg+xml',
			);
			$filetype = wp_check_filetype( $input, $mimes );

			if ( isset( $filetype['ext'] ) ) {
				return is_int( $input ) ? $input : attachment_url_to_postid( $input );
			}

			return '';
		}

		/**
		 * Converts a hex string to rgb equivalent string.
		 *
		 * @param string $hex The color hex.
		 * @return string
		 */
		private static function convert_hex_to_base64( $hex ) {
			$base64_color = str_replace( '#', '', $hex );

			return $base64_color;
		}

		/**
		 * Converts a hex string to rgb equivalent string.
		 *
		 * @param string $hex The color hex.
		 * @return string
		 */
		private static function convert_hex_to_rgb( $hex ) {
			$hex = str_replace( '#', '', $hex );

			if ( 3 === strlen( $hex ) ) {
				$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
				$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
				$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
			} else {
				$r = hexdec( substr( $hex, 0, 2 ) );
				$g = hexdec( substr( $hex, 2, 2 ) );
				$b = hexdec( substr( $hex, 4, 2 ) );
			}
			$rgb = array( $r, $g, $b );

			return implode( ',', $rgb );
		}

		/**
		 * Return the theme option from cache; if it isn't cached fetch it and cache it.
		 *
		 * @param  string $option_name [name of the option].
		 * @param  string $default     [default value of option].
		 *
		 * @return string
		 */
		public static function get_option( $option_name, $default = '' ) {
			/* Return cached if possible */
			if ( array_key_exists( $option_name, self::$cached ) && empty( $default ) ) {
				return self::$cached[ $option_name ];
			}
			/* If no default is given, fetch from theme defaults variable */
			if ( empty( $default ) ) {
				$default = array_key_exists( $option_name, self::theme_defaults() ) ? self::theme_defaults()[ $option_name ] : '';
			}

			$opt = get_theme_mod( $option_name, $default );

			/* Cache the result */
			self::$cached[ $option_name ] = $opt;

			/* Process the variable */
			if ( self::process_option( $option_name, $opt ) !== $opt ) {
				self::$cached[ $option_name ] = self::process_option( $option_name, $opt );
			}

			return self::$cached[ $option_name ];
		}

		/**
		 * Switch case for options that need post processing.
		 *
		 * @param  [string] $key   [name of option].
		 * @param  [string] $value [value].
		 *
		 * @return [string]        [processed value]
		 */
		private static function process_option( $key, $value ) {
			$opacity_dark = .75;

			switch ( $key ) {
				case 'heading_gray_dark':
					return 'rgba(' . self::hex2rgb( self::get_option( 'body_color_2' ) ) . ',' . $opacity_dark . ')';
				default:
					return $value;
			}

			return $value;
		}
	}

	// Setup the Theme Customizer settings and controls.
	add_action( 'customize_register', array( 'Organic_Goodness_Customize', 'register' ) );

}

/**
* PARTIAL REFRESH FUNCTIONS
* */
if ( ! function_exists( 'organic_goodness_customize_partial_blogname' ) ) {
	/**
	 * Render the site title for the selective refresh partial.
	 */
	function organic_goodness_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

if ( ! function_exists( 'organic_goodness_customize_partial_blogdescription' ) ) {
	/**
	 * Render the site description for the selective refresh partial.
	 */
	function organic_goodness_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}

if ( ! function_exists( 'organic_goodness_customize_partial_footer_text' ) ) {
	/**
	 * Render the footer text for the selective refresh partial.
	 */
	function organic_goodness_customize_partial_footer_text() {
		echo do_shortcode(
			wp_kses( Organic_Goodness_Customize::get_option( 'footer_text_note' ), Organic_Goodness::get_allowed_html_tags() )
		);
	}
}

if ( ! function_exists( 'organic_goodness_shop_categories_list_is_enabled' ) ) {
	/**
	 * Check if the shop categories list is enabled.
	 */
	function organic_goodness_shop_categories_list_is_enabled() {
		return Organic_Goodness_Customize::get_option( 'shop_categories_list' );
	}
}

if ( ! function_exists( 'organic_goodness_has_read_more_link' ) ) {
	/**
	 * Check if blog posts have "Read More" link.
	 */
	function organic_goodness_has_read_more_link() {
		return Organic_Goodness_Customize::get_option( 'excerpt_read_more_link' );
	}
}

if ( ! function_exists( 'organic_goodness_over_four_widget_columns' ) ) {
	/**
	 * Check if footer has over four widget columns.
	 */
	function organic_goodness_over_four_widget_columns() {
		return ( 4 <= (int) Organic_Goodness_Customize::get_option( 'footer_widget_columns' ) );
	}
}
