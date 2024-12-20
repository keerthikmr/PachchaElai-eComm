<?php
/**
 * Displays the post header
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

$header_classes  = ( is_singular() ) ? 'main-header text-center' : 'text-left';
$header_classes .= ( is_singular() && is_single() ) ? ' singular-header alignwide' : '';
$header_classes .= ( is_singular() && ! is_single() ) ? ' align-content-width' : '';

$header_inner_classes = ( ! is_singular() && Organic_Goodness_Customize::get_option( 'blog_post_logo' ) && has_custom_logo() ) ? 'with-logo' : '';
?>

<header class="entry-header <?php echo esc_attr( $header_classes ); ?>">

	<?php get_template_part( 'template-parts/content/featured-image' ); ?>

	<div class="entry-header-inner <?php echo esc_attr( $header_inner_classes ); ?>">

		<?php

		if ( is_singular() ) {
			if ( is_single() ) {
				the_title( '<h1 class="entry-title heading-size-1-lg-down heading-size-post-title-lg-up">', '</h1>' );
			} else {
				the_title( '<h1 class="entry-title heading-size-1-md-down heading-size-post-title-lg-down heading-size-page-title-lg-up">', '</h1>' );
			}
		} else {
			if ( Organic_Goodness_Customize::get_option( 'blog_post_logo' ) && has_custom_logo() ) {
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				echo wp_get_attachment_image(
					$custom_logo_id,
					'thumbnail',
					true,
					array(
						'class' => 'site-logo',
						'alt'   => get_bloginfo( 'name' ),
					)
				);
			}
			the_title( '<h2 class="entry-title heading-size-3-md-down heading-size-2-md-up"><a href="' . esc_url( get_permalink() ) . '" class="text-color">', '</a></h2>' );
		}

		// Default to displaying the post meta.
		if ( is_single() ) {
			organic_goodness_the_post_meta( get_the_ID(), 'single-top' );
		} elseif ( is_page() ) {
			organic_goodness_the_post_meta( get_the_ID(), 'page-top' );
		} else {
			organic_goodness_the_post_meta( get_the_ID(), 'archive-top' );
		}

		if ( organic_goodness_is_wc_active() && is_account_page() ) {
			do_action( 'organic_goodness_account_navigation' );
		}

		if ( ! is_singular() ) {
			?>

			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>

			<?php
		}
		?>

	</div><!-- .entry-header-inner -->

</header><!-- .entry-header -->
