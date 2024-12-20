<?php
/**
 * The template for displaying single posts and pages.
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

get_header();

if ( Organic_Goodness_Elementor_Extension::location_not_set( 'single' ) ) {

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}
}

get_footer();
