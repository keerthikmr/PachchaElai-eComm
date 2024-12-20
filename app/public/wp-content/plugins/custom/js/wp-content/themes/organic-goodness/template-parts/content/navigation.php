<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ( $next_post || $prev_post ) {
	?>

	<div class="post-navigation">

		<?php if ( $prev_post ) { ?>
			<nav class="navigation-single previous-post" aria-label="<?php esc_attr_e( 'Previous Post', 'organic-goodness' ); ?>" role="navigation">
				<div class="nav-post-info">
					<span class="uppercase meta-size background-color">
						<?php esc_html_e( 'Previous Post', 'organic-goodness' ); ?>
					</span>
					<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
						<?php echo get_the_post_thumbnail( $prev_post->ID, 'large' ); ?>

						<h3 class="title background-color">
							<?php echo wp_kses_post( get_the_title( $prev_post->ID ) ); ?>
						</h3>

						<p class="background-color">
							<?php
							add_filter( 'excerpt_length', 'organic_goodness_limit_excerpt', 999 );
							echo wp_kses_post( get_the_excerpt( $prev_post->ID ) );
							remove_filter( 'excerpt_length', 'organic_goodness_limit_excerpt', 999 );
							?>
						</p>
					</a>
				</div>
			</nav><!-- .pagination-single -->
		<?php } ?>

		<?php if ( $next_post ) { ?>
			<nav class="navigation-single next-post" aria-label="<?php esc_attr_e( 'Next Post', 'organic-goodness' ); ?>" role="navigation">
				<div class="nav-post-info">
					<span class="uppercase meta-size background-color">
						<?php esc_html_e( 'Next Post', 'organic-goodness' ); ?>
					</span>
					<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
						<?php echo get_the_post_thumbnail( $next_post->ID, 'large' ); ?>

						<h3 class="title background-color">
							<?php echo wp_kses_post( get_the_title( $next_post->ID ) ); ?>
						</h3>

						<p class="background-color">
							<?php
							add_filter( 'excerpt_length', 'organic_goodness_limit_excerpt', 999 );
							echo wp_kses_post( get_the_excerpt( $next_post->ID ) );
							remove_filter( 'excerpt_length', 'organic_goodness_limit_excerpt', 999 );
							?>
						</p>
					</a>
				</div>
			</nav><!-- .pagination-single -->
		<?php } ?>

	</div>

	<?php
}
