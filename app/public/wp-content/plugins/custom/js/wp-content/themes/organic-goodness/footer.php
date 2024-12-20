<?php
/**
 * Footer file for Organic Goodness theme.
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<?php
	if ( Organic_Goodness_Elementor_Extension::location_not_set( 'footer' ) &&
	( ! empty( Organic_Goodness_Customize::get_option( 'footer_text_note' ) ) || is_active_sidebar( 'footer-widgets' ) ) ) {
		?>

		<footer id="site-footer" role="contentinfo" class="site-footer">

			<?php get_template_part( 'template-parts/footer/widgets-area' ); ?>

			<?php get_template_part( 'template-parts/footer/text-note' ); ?>

		</footer><!-- #site-footer -->

	<?php } ?>

	</div><!-- #page -->

	<?php wp_footer(); ?>

	</body>
</html>
