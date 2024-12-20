<?php
/**
 * The template for diplaying the site identity (logo)
 *
 * @package organic-goodness
 * @version Organic Goodness 1.0
 */

$logo_wrapper_class = Organic_Goodness_Customize::get_option( 'mobile_centered_logo' ) ? 'items-center justify-center text-center' : 'text-left';

?>

<div id="site-identity-wrapper" class="flex flex-column <?php echo esc_attr( $logo_wrapper_class ); ?>">
	<?php
	// Site title or logo.
	organic_goodness_site_logo();

	// Site description.
	organic_goodness_site_tagline();
	?>
</div>
