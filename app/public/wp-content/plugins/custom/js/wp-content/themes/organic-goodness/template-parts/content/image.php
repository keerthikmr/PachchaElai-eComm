<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header main-header align-content-width">
		<div class="entry-header-inner text-center">
			<?php

			the_title( '<h1 class="entry-title heading-size-1-md-down heading-size-post-title-lg-down heading-size-page-title-lg-up margin-b-md-up">', '</h1>' );
			organic_goodness_the_post_meta( get_the_ID(), 'image' );

			?>
		</div><!-- .entry-header-inner -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<figure class="entry-attachment wp-block-image">
			<?php
			/**
			 * Filters the default image attachment size.
			 *
			 * @since Organic Goodness 1.0
			 *
			 * @param string $image_size Image size. Default 'large'.
			 */
			$image_size = apply_filters( 'organic_goodness_attachment_size', 'full' );

			echo wp_get_attachment_image( get_the_ID(), $image_size );
			?>

			<figcaption class="wp-caption-text"><?php the_excerpt(); ?></figcaption>

		</figure><!-- .entry-attachment -->

		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- .post -->
