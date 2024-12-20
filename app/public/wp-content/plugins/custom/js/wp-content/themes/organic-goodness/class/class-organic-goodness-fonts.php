<?php
/**
 * This class manages fonts
 *
 * @package organic-goodness
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Organic_Goodness_Fonts' ) ) {
	/**
	 * Reads theme options and generates fonts enqueue urls.
	 */
	class Organic_Goodness_Fonts {

		/**
		 * List of web safe fonts that don't need Google Fonts.
		 *
		 * @var array web fonts.
		 */
		private static $web_safe_fonts = array(
			'--apple-system',
			'Arial',
			'Comic Sans',
			'Courier New',
			'Courier',
			'Garamond',
			'Georgia',
			'Helvetica',
			'Impact',
			'Palatino',
			'Times New Roman',
			'Times',
			'Trebuchet',
			'Verdana',
		);

		/**
		 * Get the default font weights.
		 *
		 * @param string $font The font.
		 * @return [string] [font weights]
		 */
		public static function get_google_font_weights( $font ) {
			return esc_html( $font . ':400,500,700,900' );
		}

		/**
		 * Get the enqueue URL for the fonts selected.
		 *
		 * @param string $font font option.
		 * @return [string] [font link]
		 */
		public static function get_google_font_url( $font = 'body_font_family' ) {

			$customizer_font    = Organic_Goodness_Customize::get_option( $font );
			$web_safe_fonts     = array( 'web-safe-sans-serif', 'web-safe-serif' );
			$google_font_family = '';

			// Continue if the font name is empty, or matches one of the web safe fonts.
			if ( $customizer_font && ! in_array( $customizer_font, self::$web_safe_fonts, true ) ) {

				$font_value = apply_filters( 'organic_goodness_google_font_weights', $customizer_font );

				if ( $font_value && ! in_array( $font_value, $web_safe_fonts, true ) ) {
					$google_font_family = rawurlencode( $font_value );
				}

				if ( $google_font_family ) {
					$google_fonts_url = '//fonts.googleapis.com/css?family=' . $google_font_family;

					return $google_fonts_url;
				}
			}
		}

		/**
		 * Get the font fallback list.
		 *
		 * @param string $font The font.
		 * @return [array] [font fallback list]
		 */
		private static function get_font_fallbacks( $font ) {

			$sans_serif_list = '-apple-system, BlinkMacSystemFont, Arial, Helvetica, \'Helvetica Neue\', Verdana, sans-serif';
			$serif_list      = 'Bookman Old Style, Georgia, Garamond, \'Times New Roman\', Times, serif';
			$mono_list       = 'Courier, Lucida Console, Monaco, monospace';

			if ( strpos( $font, ' Mono' ) !== false ) {
				return $mono_list;
			} elseif ( strpos( $font, ' Sans' ) !== false ) {
				return $sans_serif_list;
			} elseif ( strpos( $font, ' Serif' ) !== false || strpos( $font, ' Slab' ) !== false ) {
				return $serif_list;
			}

			return $sans_serif_list;
		}

		/**
		 * Get the font used as custom style.
		 *
		 * @param string $font The font.
		 * @return [string] [processed value]
		 */
		public static function get_font( $font ) {

			$main_font_stack = self::get_font_fallbacks( $font );

			if ( $font ) {
				return '\'' . $font . '\', ' . $main_font_stack;
			}

			return $main_font_stack;
		}
	}
}
