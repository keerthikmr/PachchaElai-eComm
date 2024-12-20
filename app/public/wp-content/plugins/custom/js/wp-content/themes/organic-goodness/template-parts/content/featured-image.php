<?php
/**
 * Displays the featured image
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

$thumbnail_size = ( is_singular() ) ? 'full' : 'large';

if ( has_post_thumbnail() && ! post_password_required() ) {

	?>

	<div class="entry-header-featured-image margin-b">

		<figure class="featured-media">

			<?php if ( ! is_singular() ) { ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="text-color">
				<?php } ?>

				<?php the_post_thumbnail( $thumbnail_size ); ?>

				<?php if ( ! is_singular() ) { ?>
				</a>
			<?php } ?>

		</figure><!-- .featured-media -->

	</div>

	<?php
}
