<?php
/**
 * The template for diplaying the primary menu.
 *
 * @package organic-goodness
 * @version Organic Goodness 1.0
 */

$mobile_menu_class  = ! Organic_Goodness_Customize::get_option( 'mobile_menu_show_on_desktop' ) ? 'hidden-lg-up' : '';
$menu_wrapper_class = Organic_Goodness_Customize::get_option( 'mobile_centered_logo' ) ? 'flex-1-lg-down' : '';
?>

<div class="flex-1-lg-up text-left <?php echo esc_attr( $menu_wrapper_class ); ?>">

	<?php if ( has_nav_menu( 'mobile' ) || ( organic_goodness_is_wc_active() && Organic_Goodness_Customize::get_option( 'mobile_categories_list' ) ) ) { ?>
		<ul id="mobile-menu" class="mobile-menu no-list-style no-padding <?php echo esc_attr( $mobile_menu_class ); ?>">
			<li id="mobile-menu-tool" class="menu-item">
				<div class="menu-icon"></div>

				<?php
				// Mobile Menu.
				organic_goodness_mobile_menu();
				?>
			</li>
		</ul>
	<?php } ?>

	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'primary-left',
			'container'       => 'div',
			'container_id'    => 'primary-menu-wrapper',
			'container_class' => 'hidden-lg-down',
			'menu_class'      => 'primary-menu no-list-style no-margin no-padding',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'after'           => '',
			'fallback_cb'     => false,
		)
	);
	?>
</div>
