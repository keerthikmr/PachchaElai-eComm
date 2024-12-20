<?php
/**
 * Displays the site header.
 *
 * @package organic-goodness
 * @version Organic Goodness 1.0
 */

$header_class      = Organic_Goodness_Customize::get_option( 'sticky_header_always_visible' ) ? 'header-fixed' : '';
$site_header_class = Organic_Goodness_Customize::get_option( 'mobile_centered_logo' ) ? '' : 'items-center-lg-down';

if ( Organic_Goodness_Elementor_Extension::location_not_set( 'header' ) ) { ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-header-wrapper <?php echo esc_attr( $header_class ); ?>">

			<?php
			/**
			 * Hook: organic_goodness_demo_store.
			 *
			 * @hooked woocommerce_demo_store - 10
			 */
			do_action( 'organic_goodness_demo_store' );
			?>

			<div id="site-header" class="flex full-width <?php echo esc_attr( $site_header_class ); ?>">

				<?php get_template_part( 'template-parts/header/menu-primary' ); ?>
				<?php get_template_part( 'template-parts/header/site-identity' ); ?>
				<?php get_template_part( 'template-parts/header/menu-secondary' ); ?>

			</div><!-- #site-header -->
		</div>
	</header><!-- #masthead -->

<?php } ?>
