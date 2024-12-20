<?php
/**
 * The template for diplaying the primary menu
 *
 * @package organic-goodness
 * @version Organic Goodness 1.0
 */

?>

<div id="secondary-menu-wrapper" class="flex-1 text-right">

	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'primary-right',
			'container'       => 'div',
			'container_id'    => 'secondary-menu-list',
			'container_class' => 'hidden-lg-down',
			'menu_class'      => 'primary-menu no-list-style no-margin no-padding',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'after'           => '',
			'fallback_cb'     => false,
		)
	);
	?>

	<ul id="menu-site-tools" class="secondary-menu no-list-style no-margin no-padding">
		<li id="search-site-tool" class="menu-item">
			<button class="menu-icon"><span class="screen-reader-text"><?php echo esc_html( 'Search Toggle' ); ?></span></button>
			<?php
			// Search Form.
			organic_goodness_search_form();
			?>
		</li>

		<?php if ( organic_goodness_is_wc_active() && Organic_Goodness_Customize::get_option( 'header_account_icon' ) ) { ?>
			<li id="my-account-site-tool" class="menu-item">
				<span class="screen-reader-text"><?php echo esc_html( 'My Account Icon' ); ?></span>
				<a class="menu-icon account-menu-icon" href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"></a>
			</li>
		<?php } ?>

		<?php if ( organic_goodness_is_wc_active() ) { ?>
			<li id="shopping-bag-site-tool" class="menu-item">
				<button class="menu-icon bag-menu-icon">
					<span class="screen-reader-text"><?php echo esc_html( 'Minicart Toggle' ); ?></span>
					<span class="bag-product-count"><span><?php echo is_object( WC()->cart ) ? esc_html( WC()->cart->get_cart_contents_count() ) : ''; ?></span></span>
				</button>

				<?php
				// Minicart.
				organic_goodness_minicart();
				?>
			</li>
		<?php } ?>
	</ul>

</div>
