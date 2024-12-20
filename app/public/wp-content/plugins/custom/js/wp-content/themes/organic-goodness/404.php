<?php
/**
 * The template for displaying the 404 template.
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

get_header();

if ( Organic_Goodness_Elementor_Extension::location_not_set( 'single' ) ) {
	?>

	<header class="entry-header not-found main-header">

		<div class="entry-header-inner align-content-width">
			<h1 class="archive-title heading-size-1-lg-down heading-size-page-title-lg-up text-center margin-b-md-up">
				<?php echo esc_html_x( 'Page Not Found', '404 Page Template', 'organic-goodness' ); ?>
			</h1>

			<div class="archive-subtitle text-center margin-b-md-down margin-b-md margin-b-lg margin-b-xlg-up heading-size-5-lg-down heading-size-4-lg-up">
				<?php echo esc_html_x( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', '404 Page Template', 'organic-goodness' ); ?>
			</div>

			<div class="search-form-wrapper text-center">
				<?php get_search_form(); ?>
			</div>

		</div>

	</header>

	<?php
}

get_footer();
