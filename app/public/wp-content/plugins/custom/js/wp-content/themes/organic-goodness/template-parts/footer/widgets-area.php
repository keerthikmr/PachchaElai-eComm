<?php
/**
 * The template for diplaying the footer widgets area
 *
 * @package organic-goodness
 * @version Organic Goodness 1.0
 */

if ( is_active_sidebar( 'footer-widgets' ) ) {
	?>
	<div class="widgets-area">
		<?php dynamic_sidebar( 'footer-widgets' ); ?>
	</div>
	<?php
}
?>
