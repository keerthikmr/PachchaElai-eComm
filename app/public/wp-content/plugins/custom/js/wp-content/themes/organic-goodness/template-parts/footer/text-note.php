<?php
/**
 * The template for diplaying the footer text note
 *
 * @package organic-goodness
 * @version Organic Goodness 1.0
 */

if ( ! empty( Organic_Goodness_Customize::get_option( 'footer_text_note' ) ) ) {
	?>
	<div class="sub-footer">
		<div class="footer-element footer-text-note">
			<?php
			echo do_shortcode(
				wp_kses( Organic_Goodness_Customize::get_option( 'footer_text_note' ), Organic_Goodness::get_allowed_html_tags() )
			);
			?>
		</div>
	</div>
	<?php
}
?>
