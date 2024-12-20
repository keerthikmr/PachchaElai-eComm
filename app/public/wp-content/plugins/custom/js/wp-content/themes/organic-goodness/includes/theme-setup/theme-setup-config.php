<?php
/**
 * Theme Setup configuration file.
 *
 * @package organic-goodness
 */

if ( ! class_exists( 'Organic_Goodness_Theme_Setup' ) ) {
	return;
}

$config = array(
	'directory'               => 'includes/theme-setup', // Location / directory where Organic_Goodness_Theme_Setup is placed in your theme.
	'ts_theme_setup_url'      => 'organic-goodness-setup', // The wp-admin page slug where Organic_Goodness_Theme_Setup loads.
	'parent_slug'             => 'themes.php', // The wp-admin parent page slug for the admin menu item.
	'capability'              => 'manage_options', // The capability required for this menu to be displayed to the user.
	'child_action_btn_url'    => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/', // URL for the 'child-action-link'.
	'dev_mode'                => false, // Enable development mode for testing.
	'ready_primary_btn_url'   => admin_url( 'admin.php?page=wc-admin&path=/setup-wizard' ),
	'ready_secondary_btn_url' => home_url( '/' ),
);

$strings = array(
	'admin-menu'               => esc_html__( 'Theme Setup', 'organic-goodness' ),

	/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
	'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'organic-goodness' ),
	'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'organic-goodness' ),
	'ignore'                   => esc_html__( 'Disable this wizard', 'organic-goodness' ),

	'btn-skip'                 => esc_html__( 'Skip', 'organic-goodness' ),
	'btn-next'                 => esc_html__( 'Next', 'organic-goodness' ),
	'btn-start'                => esc_html__( 'Start', 'organic-goodness' ),
	'btn-try-again'            => esc_html__( 'Try Again', 'organic-goodness' ),
	'btn-no'                   => esc_html__( 'Cancel', 'organic-goodness' ),
	'btn-plugins-install'      => esc_html__( 'Install', 'organic-goodness' ),
	'btn-plugins-activate'     => esc_html__( 'Activating...', 'organic-goodness' ),
	'btn-child-install'        => esc_html__( 'Install', 'organic-goodness' ),
	'btn-child-installing'     => esc_html__( 'Installing...', 'organic-goodness' ),
	'btn-content-install'      => esc_html__( 'Install', 'organic-goodness' ),
	'btn-import'               => esc_html__( 'Import', 'organic-goodness' ),
	'btn-content-importing'    => esc_html__( 'Importing...', 'organic-goodness' ),

	/* translators: Theme Name */
	'welcome-header%s'         => esc_html__( 'Welcome to %s', 'organic-goodness' ),
	'welcome-header-success%s' => esc_html__( 'Welcome back!', 'organic-goodness' ),
	'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'organic-goodness' ),
	'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'organic-goodness' ),

	'child-header'             => esc_html__( 'Install Child Theme', 'organic-goodness' ),
	'child-header-success'     => esc_html__( 'You\'re good to go!', 'organic-goodness' ),
	'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'organic-goodness' ),
	'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'organic-goodness' ),
	'child-action-link'        => esc_html__( 'Learn about child themes', 'organic-goodness' ),
	'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'organic-goodness' ),
	'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'organic-goodness' ),
	'child-json-error%s'       => esc_html__( 'The child theme could not be created. Please check your file permissions.', 'organic-goodness' ),

	'plugins-header'           => esc_html__( 'Install WooCommerce', 'organic-goodness' ),
	'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'organic-goodness' ),
	'plugins'                  => esc_html__( 'Let\'s install & activate the WooCommerce plugin to enable all the eCommerce features you need.', 'organic-goodness' ),
	'plugins-success%s'        => esc_html__( 'WooCommerce plugin has been installed and is now activated.', 'organic-goodness' ),
	'plugins-install-error%s'  => esc_html__( 'Installation failed: An unexpected error occurred. Something may be wrong with WordPress.org or this server\'s configuration.', 'organic-goodness' ),
	'plugins-activate-error%s' => esc_html__( 'Activation failed: An unexpected error occurred. Something may be wrong with WordPress.org or this server\'s configuration.', 'organic-goodness' ),
	'plugins-action-link'      => esc_html__( 'Advanced', 'organic-goodness' ),

	'import-header'            => esc_html__( 'Import Content', 'organic-goodness' ),
	'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'organic-goodness' ),
	'import-success'           => esc_html__( 'The content has been successfully imported.', 'organic-goodness' ),
	'import-action-link'       => esc_html__( 'Advanced', 'organic-goodness' ),

	'ready-header'             => esc_html__( 'All done. Have fun!', 'organic-goodness' ),

	/* translators: Theme Author */
	'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'organic-goodness' ),
	'ready-action-link'        => esc_html__( 'Extras', 'organic-goodness' ),
	'ready-primary-button'     => esc_html__( 'Set up your store', 'organic-goodness' ),
	'ready-secondary-button'   => esc_html__( 'View your website', 'organic-goodness' ),
	'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://woocommerce.com/document/organic-goodness-theme/', esc_html__( 'Read Documentation', 'organic-goodness' ) ),
	'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://woocommerce.com/my-account/create-a-ticket/', esc_html__( 'Get Theme Support', 'organic-goodness' ) ),
);

$import_attachments = array(
	'pages'      => array(
		'frontpage-icon-one'    => array(
			'post_title' => _x( 'Frontpage Icon One', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-icon-one.png',
			'type'       => 'png',
		),
		'frontpage-icon-two'    => array(
			'post_title' => _x( 'Frontpage Icon Two', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-icon-two.png',
			'type'       => 'png',
		),
		'frontpage-icon-three'  => array(
			'post_title' => _x( 'Frontpage Icon Three', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-icon-three.png',
			'type'       => 'png',
		),
		'frontpage-icon-four'   => array(
			'post_title' => _x( 'Frontpage Icon Four', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-icon-four.png',
			'type'       => 'png',
		),
		'frontpage-icon-five'   => array(
			'post_title' => _x( 'Frontpage Icon Five', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-icon-five.png',
			'type'       => 'png',
		),
		'frontpage-icon-six'    => array(
			'post_title' => _x( 'Frontpage Icon Six', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-icon-six.png',
			'type'       => 'png',
		),
		'frontpage-image-one'   => array(
			'post_title' => _x( 'Frontpage Image One', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-image-one.jpeg',
			'type'       => 'jpeg',
		),
		'frontpage-image-two'   => array(
			'post_title' => _x( 'Frontpage Image Two', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-image-two.jpeg',
			'type'       => 'jpeg',
		),
		'frontpage-image-three' => array(
			'post_title' => _x( 'Frontpage Image Three', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-image-three.jpeg',
			'type'       => 'jpeg',
		),
		'frontpage-image-four'  => array(
			'post_title' => _x( 'Frontpage Image Four', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-image-four.jpeg',
			'type'       => 'jpeg',
		),
		'frontpage-background'  => array(
			'post_title' => _x( 'Frontpage Background', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/frontpage-background.jpeg',
			'type'       => 'jpeg',
		),
	),
	'posts'      => array(
		'post-image-one'   => array(
			'post_title' => _x( 'Post Image One', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-one.jpeg',
			'type'       => 'jpeg',
		),
		'post-image-two'   => array(
			'post_title' => _x( 'Post Image Two', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-two.jpeg',
			'type'       => 'jpeg',
		),
		'post-image-three' => array(
			'post_title' => _x( 'Post Image Three', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-three.jpeg',
			'type'       => 'jpeg',
		),
		'post-image-four'  => array(
			'post_title' => _x( 'Post Image Four', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-four.jpeg',
			'type'       => 'jpeg',
		),
		'post-image-five'  => array(
			'post_title' => _x( 'Post Image Five', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-five.jpeg',
			'type'       => 'jpeg',
		),
		'post-image-six'   => array(
			'post_title' => _x( 'Post Image Six', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-six.jpeg',
			'type'       => 'jpeg',
		),
		'post-image-seven' => array(
			'post_title' => _x( 'Post Image Seven', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-seven.jpeg',
			'type'       => 'jpeg',
		),
		'post-image-eight' => array(
			'post_title' => _x( 'Post Image Eight', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/post-image-eight.jpeg',
			'type'       => 'jpeg',
		),
	),
	'products'   => array(
		'product-image-one'   => array(
			'post_title' => _x( 'Product Image One', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/product-image-one.jpeg',
			'type'       => 'jpeg',
		),
		'product-image-two'   => array(
			'post_title' => _x( 'Product Image Two', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/product-image-two.jpeg',
			'type'       => 'jpeg',
		),
		'product-image-three' => array(
			'post_title' => _x( 'Product Image Three', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/product-image-three.jpeg',
			'type'       => 'jpeg',
		),
		'product-image-four'  => array(
			'post_title' => _x( 'Product Image Four', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/product-image-four.jpeg',
			'type'       => 'jpeg',
		),
		'product-image-five'  => array(
			'post_title' => _x( 'Product Image Five', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/product-image-five.jpeg',
			'type'       => 'jpeg',
		),
		'product-image-six'   => array(
			'post_title' => _x( 'Product Image Six', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/product-image-six.jpeg',
			'type'       => 'jpeg',
		),
	),
	'customizer' => array(
		'organic-goodness-favicon' => array(
			'post_title' => _x( 'Organic Goodness Favicon', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/organic-goodness-favicon.png',
			'type'       => 'png',
		),
		'organic-goodness-logo'    => array(
			'post_title' => _x( 'Organic Goodness Logo', 'Theme starter content', 'organic-goodness' ),
			'file'       => '/assets/images/customizer/starter-content/organic-goodness-logo.png',
			'type'       => 'png',
		),
	),
);

$import_pages = array(
	'frontpage'      => array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => esc_html_x( 'Organic Goodness', 'Theme starter content', 'organic-goodness' ),
		'post_content' => '<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">Natural cosmetics small batch pug cliche plaid<br> four loko fashion four dollar toast locavore organic certified.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"25px"} -->
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-2-background-color has-text-color has-background" href="#">Shop Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"85px"} -->
		<div style="height:85px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:gallery {"columns":6,"imageCrop":false,"linkTo":"none","sizeSlug":"full","align":"wide"} -->
		<figure class="wp-block-gallery alignwide has-nested-images columns-6"><!-- wp:image {"id":793,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-one.png" alt="" class="wp-image-793"/><figcaption>100% Organic</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":794,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-two.png" alt="" class="wp-image-794"/><figcaption>Vegan</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":795,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-three.png" alt="" class="wp-image-795"/><figcaption>Handmade</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":796,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-four.png" alt="" class="wp-image-796"/><figcaption>Locally Sourced</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":797,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-five.png" alt="" class="wp-image-797"/><figcaption>Paraben Free</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":798,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-six.png" alt="" class="wp-image-798"/><figcaption>Pesticides Free</figcaption></figure>
		<!-- /wp:image --></figure>
		<!-- /wp:gallery -->
		
		<!-- wp:spacer {"height":"85px"} -->
		<div style="height:85px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-two.jpeg","id":287,"dimRatio":0,"overlayColor":"color-2","focalPoint":{"x":"0.53","y":"0.63"},"minHeight":685,"minHeightUnit":"px","contentPosition":"bottom left","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"5vw","left":"5vw"}}}} -->
		<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-left" style="padding-top:5vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw;min-height:685px"><span aria-hidden="true" class="has-color-2-background-color has-background-dim-0 wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-287" alt="' . esc_attr_x( 'Frontpage Image Two', 'Theme starter content', 'organic-goodness' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-two.jpeg" style="object-position:53% 63%" data-object-fit="cover" data-object-position="53% 63%"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textColor":"color-1","className":"no-margin-bottom","fontSize":"post-title"} -->
		<h2 class="no-margin-bottom has-color-1-color has-text-color has-post-title-font-size">Subscriptions</h2>
		<!-- /wp:heading -->

		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:paragraph {"textColor":"color-1"} -->
		<p class="has-color-1-color has-text-color">Narwhal small batch messenger bag, echo park occupy<br>deep v organic pitchfork selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->

		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-1","style":{"color":{"text":"#2d4b38"}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-background-color has-text-color has-background" href="#" style="color:#2d4b38">Shop Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div></div>
		<!-- /wp:cover -->
		
		<!-- wp:spacer {"height":"85px"} -->
		<div style="height:85px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","layout":{"inherit":false,"wideSize":"1400px","contentSize":"775px"}} -->
		<div class="wp-block-group alignfull"><!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /--></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"85px"} -->
		<div style="height:85px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":849,"dimRatio":0,"customOverlayColor":"#2d4b38","minHeight":750,"minHeightUnit":"px","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"20vw","bottom":"5vw","left":"20vw"}}}} -->
		<div class="wp-block-cover alignfull" style="padding-top:5vw;padding-right:20vw;padding-bottom:5vw;padding-left:20vw;min-height:750px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#2d4b38"></span><img class="wp-block-cover__image-background wp-image-849" alt="" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:image {"align":"center","id":878,"width":50,"height":75,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image aligncenter size-full is-resized"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/organic-goodness-logo-light.png" alt="" class="wp-image-878" width="50" height="75"/></figure>
		<!-- /wp:image -->
		
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="has-text-align-center">Authentic shoreditch next level, banh mi craft beer air plant chillwave banjo chia synth coloring book slow-carb tousled hella pour-over.</h2>
		<!-- /wp:heading --></div></div>
		<!-- /wp:cover -->
		
		<!-- wp:spacer {"height":"60px"} -->
		<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:spacer {"height":"75px"} -->
		<div style="height:75px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"right":"5vw","left":"5vw","top":"0vw","bottom":"0vw"}}},"layout":{"wideSize":"1400px","contentSize":"775px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:0vw;padding-right:5vw;padding-bottom:0vw;padding-left:5vw"><!-- wp:columns {"verticalAlignment":"top","align":"wide"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"padding":{"top":"0vw","right":"0vw","bottom":"0vw","left":"0vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:0vw;padding-right:0vw;padding-bottom:0vw;padding-left:0vw"><!-- wp:heading {"textAlign":"left","fontSize":"post-title"} -->
		<h2 class="has-text-align-left has-post-title-font-size">Self-Care <br>Subscriptions</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>Up to $370 Value for $59</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"top","style":{"spacing":{"padding":{"top":"0vw","right":"0vw","bottom":"0vw","left":"0vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:0vw;padding-right:0vw;padding-bottom:0vw;padding-left:0vw"><!-- wp:paragraph -->
		<p>Can you guarantee how much money your store is going to make this month? If you offered subscription-based products, you could do just that.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>With <a href="https://woocommerce.com/products/woocommerce-subscriptions/" data-type="URL" data-id="https://woocommerce.com/products/woocommerce-subscriptions/" target="_blank" rel="noreferrer noopener">WooCommerce Subscriptions</a>, you can&nbsp;create and manage products with recurring payments&nbsp;— payments that will give you residual revenue you can track and count on.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>WooCommerce Subscriptions allows you to introduce a variety of subscriptions for physical or virtual products and services. Create product-of-the-month clubs, weekly service subscriptions or even yearly software billing packages. Add sign-up fees, offer free trials, or set expiration periods.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>A subscription-based model will allow you to&nbsp;capture more residual revenue&nbsp;— and all you have to do is ship the orders.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /--></div>
		<!-- /wp:group -->
		
		<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
		<p class="has-text-align-center has-small-font-size">*Product quantity, content and monthly value varies. Vaporware sustainable knausgaard, symmetrical franzen gluten-free. Heirloom crucifix, tousled copper mug bespoke pop-up la celiac gastropub air plant fixie. Gentrify umami street art wayfarers, scenester keffiyeh master cleanse disrupt thundercats echo park affogato neutra truffaut.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-three.jpeg","id":286,"dimRatio":0,"overlayColor":"color-1","focalPoint":{"x":"0.52","y":"0.34"},"minHeight":750,"minHeightUnit":"px","contentPosition":"bottom left","isDark":false,"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"5vw","left":"5vw"}}}} -->
		<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-bottom-left" style="padding-top:5vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw;min-height:750px"><span aria-hidden="true" class="has-color-1-background-color has-background-dim-0 wp-block-cover__gradient-background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-286" alt="' . esc_attr_x( 'Frontpage Image Three', 'Theme starter content', 'organic-goodness' ) . '" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-three.jpeg" style="object-position:52% 34%" data-object-fit="cover" data-object-position="52% 34%"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"style":{"color":{"text":"#fffdf9"}},"className":"no-margin-bottom","fontSize":"post-title"} -->
		<h2 class="no-margin-bottom has-text-color has-post-title-font-size" style="color:#fffdf9">Skin Care</h2>
		<!-- /wp:heading -->

		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:paragraph {"style":{"color":{"text":"#fffdf9"}}} -->
		<p class="has-text-color" style="color:#fffdf9">Narwhal small batch messenger bag, echo park occupy<br>deep v organic pitchfork selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->

		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"textColor":"color-2","style":{"color":{"background":"#fffdf9"}}} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-2-color has-text-color has-background" href="#" style="background-color:#fffdf9">Shop Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div></div>
		<!-- /wp:cover -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"7vw","right":"5vw","bottom":"7vh","left":"5vw"}}},"layout":{"wideSize":"1400px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:7vw;padding-right:5vw;padding-bottom:7vh;padding-left:5vw"><!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"0vw","right":"0vw","bottom":"0vw","left":"0vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0vw;padding-right:0vw;padding-bottom:0vw;padding-left:0vw;flex-basis:50%"><!-- wp:image {"id":873,"sizeSlug":"large","linkDestination":"custom"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-one.jpeg" alt="" class="wp-image-873"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"0vw","right":"3vw","bottom":"0vw","left":"3vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0vw;padding-right:3vw;padding-bottom:0vw;padding-left:3vw;flex-basis:50%"><!-- wp:heading -->
		<h2>Skin-Care <br>Gift Card</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>Cloud bread direct trade photo booth knausgaard. Godard hashtag normcore edison bulb, sustainable plaid narwhal certified organic.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-2-background-color has-text-color has-background" href="#">Send a Gift Card</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":"75px"} -->
		<div style="height:75px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:columns {"verticalAlignment":"center","align":"wide"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%","style":{"spacing":{"padding":{"top":"0vw","right":"0vw","bottom":"0vw","left":"0vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0vw;padding-right:0vw;padding-bottom:0vw;padding-left:0vw;flex-basis:50%"><!-- wp:image {"id":831,"sizeSlug":"large","linkDestination":"custom"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-four.jpeg" alt="" class="wp-image-831"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"47%","style":{"spacing":{"padding":{"top":"0vw","right":"3vw","bottom":"0vw","left":"3vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0vw;padding-right:3vw;padding-bottom:0vw;padding-left:3vw;flex-basis:47%"><!-- wp:heading -->
		<h2>Send a Self-Care <br>Package</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>Giving the gift of self-care hashtag normcore edison bulb, sustainable plaid narwhal you probably haven\'t heard of them local sourced.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-2-background-color has-text-color has-background" href="#">Send a Self-Care Package</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:group {"align":"full","style":{"color":{"background":"#f6efe3"},"spacing":{"padding":{"top":"10vh","right":"5vw","bottom":"5vh","left":"5vw"}}}} -->
		<div class="wp-block-group alignfull has-background" style="background-color:#f6efe3;padding-top:10vh;padding-right:5vw;padding-bottom:5vh;padding-left:5vw"><!-- wp:columns {"align":"full"} -->
		<div class="wp-block-columns alignfull"><!-- wp:column {"width":"33.33%","style":{"spacing":{"padding":{"top":"0vw","right":"3vw","bottom":"0vw","left":"0vw"}}}} -->
		<div class="wp-block-column" style="padding-top:0vw;padding-right:3vw;padding-bottom:0vw;padding-left:0vw;flex-basis:33.33%"><!-- wp:heading {"fontSize":"post-title"} -->
		<h2 class="has-post-title-font-size">Beauty <br>Blogging</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>Godard hashtag normcore edison bulb, sustainable plaid you probably haven\'t heard of them typewriter 8-bit offal cray.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-2-background-color has-text-color has-background" href="#">Read The Blog</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"75px"} -->
		<div style="height:75px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"66.66%","style":{"spacing":{"padding":{"top":"0vw","right":"0vw","bottom":"0vw","left":"0vw"}}}} -->
		<div class="wp-block-column" style="padding-top:0vw;padding-right:0vw;padding-bottom:0vw;padding-left:0vw;flex-basis:66.66%"><!-- wp:latest-posts {"postsToShow":2,"displayPostContent":true,"displayPostDate":true,"postLayout":"grid","columns":2,"displayFeaturedImage":true,"featuredImageSizeSlug":"large","addLinkToFeaturedImage":true} /--></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"8vw","right":"4vw","bottom":"0vw","left":"4vw"}}}} -->
		<div class="wp-block-group alignfull" style="padding-top:8vw;padding-right:4vw;padding-bottom:0vw;padding-left:4vw"><!-- wp:spacer {"height":"20px"} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="has-text-align-center">Get 25% OFF <br>Your First Order</h2>
		<!-- /wp:heading -->
		
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center","orientation":"horizontal"}} -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-2-background-color has-text-color has-background">Join our Mailing List</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:group -->',
	),
	'about'          => array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => esc_html_x( 'About', 'Theme starter content', 'organic-goodness' ),
		'post_content' => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"5vw","left":"5vw"}}}} -->
		<div class="wp-block-group alignfull" style="padding-top:0vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw"><!-- wp:columns {"verticalAlignment":"center"} -->
		<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"style":{"spacing":{"padding":{"top":"2.65rem","right":"2.65rem","bottom":"2.65rem","left":"2.65rem"}},"color":{"gradient":"linear-gradient(90deg,rgb(45,75,56) 48%,rgb(255,253,249) 48%)"},"border":{"radius":"14px"}}} -->
		<div class="wp-block-group has-background" style="background:linear-gradient(90deg,rgb(45,75,56) 48%,rgb(255,253,249) 48%);border-radius:14px;padding-top:2.65rem;padding-right:2.65rem;padding-bottom:2.65rem;padding-left:2.65rem"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-three.jpeg","id":883,"dimRatio":0,"minHeight":660,"minHeightUnit":"px"} -->
		<div class="wp-block-cover" style="min-height:660px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-883" alt="" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-image-three.jpeg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
		<p class="has-text-align-center has-large-font-size"></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:group --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"2.65rem","right":"2.65rem","bottom":"2.65rem","left":"2.65rem"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:2.65rem;padding-right:2.65rem;padding-bottom:2.65rem;padding-left:2.65rem"><!-- wp:heading {"fontSize":"post-title"} -->
		<h2 class="has-post-title-font-size">Who we are.</h2>
		<!-- /wp:heading -->
		
		<!-- wp:heading {"level":4} -->
		<h4>Fam banh mi cold-pressed, food truck 3 wolf moon plaid snackwave fixie mumblecore everyday carry pop-up church-key cloud bread.</h4>
		<!-- /wp:heading -->
		
		<!-- wp:separator {"backgroundColor":"color-2","className":"is-style-wide"} -->
		<hr class="wp-block-separator has-text-color has-color-2-color has-alpha-channel-opacity has-color-2-background-color has-background is-style-wide"/>
		<!-- /wp:separator -->
		
		<!-- wp:spacer {"height":"50px"} -->
		<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I’m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven’t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up.</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:heading {"fontSize":"huge"} -->
		<h2 class="has-huge-font-size">Why natural?</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>I’m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven’t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"6vw","right":"5vw","bottom":"5vw","left":"5vw"}}},"layout":{"inherit":false}} -->
		<div class="wp-block-group alignfull" style="padding-top:6vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":850,"dimRatio":20,"overlayColor":"color-2","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"5vw","left":"5vw"}}}} -->
		<div class="wp-block-cover" style="padding-top:5vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw"><span aria-hidden="true" class="wp-block-cover__background has-color-2-background-color has-background-dim-20 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-850" alt="" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:media-text {"align":"","mediaPosition":"right","mediaId":737,"mediaLink":"#","mediaType":"image","mediaWidth":45,"imageFill":true} -->
		<div class="wp-block-media-text has-media-on-the-right is-stacked-on-mobile is-image-fill" style="grid-template-columns:auto 45%"><figure class="wp-block-media-text__media" style="background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-three.jpeg);background-position:50% 50%"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-three.jpeg" alt="" class="wp-image-737 size-full"/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"fontSize":"huge"} -->
		<h2 class="has-huge-font-size">Sustainability</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>I’m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"2rem"} -->
		<div style="height:2rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"style":{"border":{"width":"3px","style":"solid","radius":"19px"},"spacing":{"padding":{"top":"2.65rem","right":"2.65rem","bottom":"2.65rem","left":"2.65rem"}}},"borderColor":"color-1"} -->
		<div class="wp-block-group has-border-color has-color-1-border-color" style="border-radius:19px;border-style:solid;border-width:3px;padding-top:2.65rem;padding-right:2.65rem;padding-bottom:2.65rem;padding-left:2.65rem"><!-- wp:heading {"level":4} -->
		<h4>What we do differently:</h4>
		<!-- /wp:heading -->
		
		<!-- wp:list -->
		<ul><li>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v.</li><li>Milkshake gluten-free succulents whatever squid. Lyft seitan beard, everyday carry pop-up church-key cloud bread. </li><li>Certified organic tofu photo booth try-hard.</li><li>Fam banh mi cold-pressed, food truck 3 wolf moon plaid snackwave fixie mumblecore everyday carry pop-up church-key cloud bread.</li></ul>
		<!-- /wp:list --></div>
		<!-- /wp:group --></div></div>
		<!-- /wp:media-text --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I’m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven’t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"50px"} -->
		<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:gallery {"columns":6,"linkTo":"none","align":"wide"} -->
		<figure class="wp-block-gallery alignwide has-nested-images columns-6 is-cropped"><!-- wp:image {"id":797,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-one.png" alt="" class="wp-image-797"/><figcaption>100% Organic</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":798,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-two.png" alt="" class="wp-image-798"/><figcaption>Vegan</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":796,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-three.png" alt="" class="wp-image-796"/><figcaption>Handmade</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":795,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-four.png" alt="" class="wp-image-795"/><figcaption>Locally Sourced</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":794,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-five.png" alt="" class="wp-image-794"/><figcaption>Paraben Free</figcaption></figure>
		<!-- /wp:image -->
		
		<!-- wp:image {"id":793,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-icon-six.png" alt="" class="wp-image-793"/><figcaption>Pesticides Free</figcaption></figure>
		<!-- /wp:image --></figure>
		<!-- /wp:gallery -->
		
		<!-- wp:spacer {"height":"70px"} -->
		<div style="height:70px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:separator {"align":"wide","backgroundColor":"color-2","className":"is-style-wide"} -->
		<hr class="wp-block-separator alignwide has-text-color has-color-2-color has-alpha-channel-opacity has-color-2-background-color has-background is-style-wide"/>
		<!-- /wp:separator -->
		
		<!-- wp:spacer {"height":"50px"} -->
		<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column -->
		<div class="wp-block-column"><!-- wp:quote {"className":"is-style-plain"} -->
		<blockquote class="wp-block-quote is-style-plain"><p>"Amazing as always. I have been using Organic Goodness for over a year now (my mom as well!) and all of the products are incredibly good to my skin. Highly recommended!"</p><cite>Dori Norman</cite></blockquote>
		<!-- /wp:quote -->
		
		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:quote {"className":"is-style-plain"} -->
		<blockquote class="wp-block-quote is-style-plain"><p>"I have been singing your praises to anyone who will listen. Your products are amazing and my skin looks and feels better than I can ever remember it looking and feeling."</p><cite>Martha Smith</cite></blockquote>
		<!-- /wp:quote -->
		
		<!-- wp:spacer {"height":"30px"} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":"80px"} -->
		<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"wide"} -->
		<div class="wp-block-group alignwide"><!-- wp:heading {"level":4} -->
		<h4>Follow Us</h4>
		<!-- /wp:heading -->
		
		<!-- wp:social-links {"className":"is-style-logos-only"} -->
		<ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->
		
		<!-- wp:social-link {"url":"#","service":"amazon"} /-->
		
		<!-- wp:social-link {"url":"#","service":"instagram"} /--></ul>
		<!-- /wp:social-links --></div>
		<!-- /wp:group -->',
	),
	'order-tracking' => array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => esc_html_x( 'Order Tracking', 'Theme starter content', 'organic-goodness' ),
		'post_content' => '<!-- wp:shortcode -->
		[woocommerce_order_tracking]
		<!-- /wp:shortcode -->',
	),
	'blog'           => array(
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'post_title'   => esc_html_x( 'Journal', 'Theme starter content', 'organic-goodness' ),
		'post_content' => '',
	),
);

$import_posts = array(
	'six-ways-to-style-out-summer-in-the-city'         => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2022-07-21 08:14:10',
		'post_title'   => esc_html_x( 'Six Ways To Style Out Summer In The City', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-one',
		'post_excerpt' => 'Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic.',
		'post_content' => '<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"5vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /-->
		
		<!-- wp:spacer {"height":55} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>PBR&amp;B irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify. Street art food truck health goth scenester, forage tote bag shaman. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3vw","right":"3vw","bottom":"3vw","left":"3vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignwide" style="padding-top:3vw;padding-right:3vw;padding-bottom:3vw;padding-left:3vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Fam banh mi cold-pressed, food truck 3 wolf moon plaid snackwave fixie mumblecore everyday carry pop-up church-key cloud bread.</h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"2vw","right":"5vw","bottom":"2vw","left":"5vw"}}},"layout":{"wideSize":"1400px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:2vw;padding-right:5vw;padding-bottom:2vw;padding-left:5vw"><!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"1vw","right":"1vw","bottom":"1vw","left":"1vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:1vw;padding-right:1vw;padding-bottom:1vw;padding-left:1vw"><!-- wp:spacer {"height":"10px"} -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-one.jpeg" alt="' . esc_attr_x( 'Post Image Two', 'Theme starter content', 'organic-goodness' ) . '"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"style":{"spacing":{"padding":{"top":"1vw","right":"1vw","bottom":"1vw","left":"1vw"}}}} -->
		<div class="wp-block-column" style="padding-top:1vw;padding-right:1vw;padding-bottom:1vw;padding-left:1vw"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-five.jpeg" alt="' . esc_attr_x( 'Product Image One', 'Theme starter content', 'organic-goodness' ) . '"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":55} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Milkshake gluten-free succulents whatever squid. Lyft seitan beard, everyday carry pop-up church-key cloud bread. Certified organic tofu photo booth try-hard.</h2>
		<!-- /wp:heading -->
		
		<!-- wp:spacer {"height":55} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify.</p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Lifestyle', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'lifestyle',
				),
			),
		),
	),
	'new-subscription-boxes-now-available'             => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2022-07-15 12:14:10',
		'post_title'   => esc_html_x( 'New: Subscription Boxes Now Available', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-two',
		'post_excerpt' => 'A subscription-based model will allow you to capture more residual revenue — and all you have to do is ship the orders.',
		'post_content' => '<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"6vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:6vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%"><!-- wp:image {"id":695,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-eight.jpeg" alt="" class="wp-image-695"/><figcaption>Skin Care Beauty Box — $42<br><br>Aenean porttitor arcu ac leo pellentesque eleifend quis at risus. Pellentesque nec ex vulputate mi vehicula commodo. Vestibulum sit amet magna gravida, molestie dui in, maximus libero.<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%"><!-- wp:image {"id":742,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-five.jpeg" alt="" class="wp-image-742"/><figcaption>Hyaluron-Filler Eye Cream — $59<br><br>Aenean porttitor arcu ac leo pellentesque eleifend quis at risus. Pellentesque nec ex vulputate mi vehicula commodo. Vestibulum sit amet magna gravida, molestie dui in, maximus libero.<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%"><!-- wp:image {"id":772,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-four.jpeg" alt="" class="wp-image-772"/><figcaption>Mineral Sunscreen — $25<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%"><!-- wp:image {"id":745,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-eight.jpeg" alt="" class="wp-image-745"/><figcaption>Oxygen Face Mask — $37<br><br>Aenean porttitor arcu ac leo pellentesque eleifend quis at risus. Pellentesque nec ex vulputate mi vehicula commodo. Vestibulum sit amet magna gravida, molestie dui in, maximus libero.<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":"25px"} -->
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>PBR&amp;B irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify. Street art food truck health goth scenester, forage tote bag shaman. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"4vw","right":"4vw","bottom":"4vw","left":"4vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignwide" style="padding-top:4vw;padding-right:4vw;padding-bottom:4vw;padding-left:4vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Fam banh mi cold-pressed, food truck 3 wolf moon plaid snackwave fixie mumblecore everyday carry pop-up church-key cloud bread.</h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"20px"} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /-->
		
		<!-- wp:spacer {"height":"55px"} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. </p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Beauty Tips', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'beauty-tips',
				),
				array(
					'term' => esc_attr_x( 'Incredible Women', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'incredible-women',
				),
			),
		),
	),
	'read-and-shop-shoppable-products-in-blog-posts-using-woocommerce-blocks' => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2022-05-02 12:14:10',
		'post_title'   => esc_html_x( 'Read and Shop - Shoppable Products in Blog Posts using WooCommerce Blocks', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-three',
		'post_excerpt' => 'Crafted from clean, non-toxic ingredients hashtag normcore edison bulb, sustainable plaid narwhal you probably haven’t heard of them typewriter offal la croix cray.',
		'post_content' => '<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"6vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:6vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:group {"align":"full"} -->
		<div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#6a8173"}}} -->
		<div class="wp-block-columns are-vertically-aligned-center has-background" style="background-color:#6a8173;margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"0vw","left":"5vw"}},"color":{"background":"#6a8173"}},"layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center has-background" style="background-color:#6a8173;padding-top:0vw;padding-right:5vw;padding-bottom:0vw;padding-left:5vw;flex-basis:60%"><!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"color-1","fontSize":"post-title"} -->
		<h2 class="has-color-1-color has-text-color has-post-title-font-size" style="margin-bottom:3rem">Daily Routine Box</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"textColor":"color-1"} -->
		<p class="has-color-1-color has-text-color">Donec maximus, justo dignissim convallis finibus, purus felis ornare nisl, eu porta sem sapien a nibh. Nulla lorem metus, feugiat vel lectus pretium, rutrum ultrices est. Sed posuere velit a urna facilisis maximus. Fusce interdum feugiat magna sed luctus. Donec et tristique massa.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"textColor":"color-1"} -->
		<h3 class="has-color-1-color has-text-color" style="margin-top:3rem;margin-bottom:3rem">$59 / month</h3>
		<!-- /wp:heading -->
		
		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
		<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"color-6","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-6-background-color has-text-color has-background" href="#">Buy Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"40%","backgroundColor":"color-2","className":"no-margin-bottom","layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center no-margin-bottom has-color-2-background-color has-background" style="flex-basis:40%"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":850,"isRepeated":true,"dimRatio":20,"overlayColor":"color-2","style":{"spacing":{"padding":{"top":"5vw","right":"6vw","bottom":"5vw","left":"6vw"}}}} -->
		<div class="wp-block-cover is-repeated" style="padding-top:5vw;padding-right:6vw;padding-bottom:5vw;padding-left:6vw;background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg)"><span aria-hidden="true" class="wp-block-cover__background has-color-2-background-color has-background-dim-20 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:image {"id":827,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-two.jpeg" alt="" class="wp-image-827"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"10px"} -->
		<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","layout":{"inherit":false}} -->
		<div class="wp-block-group alignfull"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":850,"isRepeated":true,"dimRatio":20,"overlayColor":"color-2","align":"full","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
		<div class="wp-block-cover alignfull is-repeated" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg)"><span aria-hidden="true" class="wp-block-cover__background has-color-2-background-color has-background-dim-20 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}},"color":{}}} -->
		<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"verticalAlignment":"center","width":"40%","style":{"spacing":{"padding":{"top":"5vw","right":"6vw","bottom":"5vw","left":"6vw"}},"color":{"background":"#6a8173"}},"className":"no-margin-bottom","layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center no-margin-bottom has-background" style="background-color:#6a8173;padding-top:5vw;padding-right:6vw;padding-bottom:5vw;padding-left:6vw;flex-basis:40%"><!-- wp:image {"id":826,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-three.jpeg" alt="" class="wp-image-826"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"0vw","left":"5vw"}},"color":{}},"layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0vw;padding-right:5vw;padding-bottom:0vw;padding-left:5vw;flex-basis:60%"><!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"color-1","fontSize":"post-title"} -->
		<h2 class="has-color-1-color has-text-color has-post-title-font-size" style="margin-bottom:3rem">Intensive Care Box</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"textColor":"color-1"} -->
		<p class="has-color-1-color has-text-color">Donec maximus, justo dignissim convallis finibus, purus felis ornare nisl, eu porta sem sapien a nibh. Nulla lorem metus, feugiat vel lectus pretium, rutrum ultrices est. Sed posuere velit a urna facilisis maximus. Fusce interdum feugiat magna sed luctus. Donec et tristique massa.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"textColor":"color-1"} -->
		<h3 class="has-color-1-color has-text-color" style="margin-top:3rem;margin-bottom:3rem">$79 / month</h3>
		<!-- /wp:heading -->
		
		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
		<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"color-6","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-6-background-color has-text-color has-background" href="#">Buy Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"10px"} -->
		<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full"} -->
		<div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#6a8173"}}} -->
		<div class="wp-block-columns are-vertically-aligned-center has-background" style="background-color:#6a8173;margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"0vw","left":"5vw"}},"color":{"background":"#6a8173"}},"layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center has-background" style="background-color:#6a8173;padding-top:0vw;padding-right:5vw;padding-bottom:0vw;padding-left:5vw;flex-basis:60%"><!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"color-1","fontSize":"post-title"} -->
		<h2 class="has-color-1-color has-text-color has-post-title-font-size" style="margin-bottom:3rem">Body Care Box</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"textColor":"color-1"} -->
		<p class="has-color-1-color has-text-color">Donec maximus, justo dignissim convallis finibus, purus felis ornare nisl, eu porta sem sapien a nibh. Nulla lorem metus, feugiat vel lectus pretium, rutrum ultrices est. Sed posuere velit a urna facilisis maximus. Fusce interdum feugiat magna sed luctus. Donec et tristique massa.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"textColor":"color-1"} -->
		<h3 class="has-color-1-color has-text-color" style="margin-top:3rem;margin-bottom:3rem">$99 / month</h3>
		<!-- /wp:heading -->
		
		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
		<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"color-6","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-6-background-color has-text-color has-background" href="#">Buy Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"40%","backgroundColor":"color-2","className":"no-margin-bottom","layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center no-margin-bottom has-color-2-background-color has-background" style="flex-basis:40%"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":850,"isRepeated":true,"dimRatio":20,"overlayColor":"color-2","style":{"spacing":{"padding":{"top":"5vw","right":"6vw","bottom":"5vw","left":"6vw"}}}} -->
		<div class="wp-block-cover is-repeated" style="padding-top:5vw;padding-right:6vw;padding-bottom:5vw;padding-left:6vw;background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg)"><span aria-hidden="true" class="wp-block-cover__background has-color-2-background-color has-background-dim-20 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:image {"id":825,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-one.jpeg" alt="" class="wp-image-825"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"55px"} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Milkshake gluten-free succulents whatever squid. Lyft seitan beard, everyday carry pop-up church-key cloud bread. Certified organic tofu photo booth try-hard.</h2>
		<!-- /wp:heading -->
		
		<!-- wp:spacer {"height":"55px"} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify.</p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Beauty Tips', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'beauty-tips',
				),
				array(
					'term' => esc_attr_x( 'Lifestyle', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'lifestyle',
				),
			),
		),
	),
	'the-three-eco-concious-brands-you-need-to-know'   => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2022-04-18 12:14:10',
		'post_title'   => esc_html_x( 'The Three Eco-Concious Brands You Need to Know', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-four',
		'post_excerpt' => 'Plant-based batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Certified selfies drinking healthy lifestyle.',
		'post_content' => '<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"4vh"} -->
		<div style="height:4vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0vw","right":"7vw","bottom":"0vw","left":"7vw"}}}} -->
		<div class="wp-block-group alignfull" style="padding-top:0vw;padding-right:7vw;padding-bottom:0vw;padding-left:7vw"><!-- wp:columns {"verticalAlignment":"top"} -->
		<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"25%","style":{"spacing":{"padding":{"top":"3vw","right":"1vw","bottom":"3vw","left":"1vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:3vw;padding-right:1vw;padding-bottom:3vw;padding-left:1vw;flex-basis:25%"><!-- wp:image {"id":694,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-two.jpeg" alt="" class="wp-image-694"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"top","width":"25%","style":{"spacing":{"padding":{"top":"2vw","right":"1vw","bottom":"2vw","left":"1vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:2vw;padding-right:1vw;padding-bottom:2vw;padding-left:1vw;flex-basis:25%"><!-- wp:spacer {"height":"5vw"} -->
		<div style="height:5vw" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:image {"id":744,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-one.jpeg" alt="" class="wp-image-744"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"top","width":"50%","style":{"spacing":{"padding":{"top":"3vw","right":"2vw","bottom":"3vw","left":"2vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:3vw;padding-right:2vw;padding-bottom:3vw;padding-left:2vw;flex-basis:50%"><!-- wp:heading -->
		<h2>Recyclable Packaging</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:list -->
		<ul><li>Mlkshk kale chips cray</li><li>Forage gluten-free artisan l</li><li>Locavore letterpress marfa</li></ul>
		<!-- /wp:list -->
		
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-2-background-color has-background" href="#">See Products</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"7vh"} -->
		<div style="height:7vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>PBR&amp;B irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify. Street art food truck health goth scenester, forage tote bag shaman. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"5vh"} -->
		<div style="height:5vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0vw","right":"7vw","bottom":"0vw","left":"7vw"}}}} -->
		<div class="wp-block-group alignfull" style="padding-top:0vw;padding-right:7vw;padding-bottom:0vw;padding-left:7vw"><!-- wp:columns -->
		<div class="wp-block-columns"><!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"3vw","right":"2vw","bottom":"3vw","left":"2vw"}}}} -->
		<div class="wp-block-column" style="padding-top:3vw;padding-right:2vw;padding-bottom:3vw;padding-left:2vw;flex-basis:50%"><!-- wp:heading -->
		<h2>Sustainable Ingredients</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:list -->
		<ul><li>Mlkshk kale chips cray</li><li>Forage gluten-free artisan l</li><li>Locavore letterpress marfa</li></ul>
		<!-- /wp:list -->
		
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-2-background-color has-background" href="#">See Products</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"top":"3vw","right":"1vw","bottom":"3vw","left":"1vw"}}}} -->
		<div class="wp-block-column" style="padding-top:3vw;padding-right:1vw;padding-bottom:3vw;padding-left:1vw;flex-basis:25%"><!-- wp:image {"id":761,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-three.jpeg" alt="" class="wp-image-761"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"top":"2vw","right":"1vw","bottom":"2vw","left":"1vw"}}}} -->
		<div class="wp-block-column" style="padding-top:2vw;padding-right:1vw;padding-bottom:2vw;padding-left:1vw;flex-basis:25%"><!-- wp:spacer {"height":"5vw"} -->
		<div style="height:5vw" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:image {"id":760,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-four.jpeg" alt="" class="wp-image-760"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"7vh"} -->
		<div style="height:7vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"5vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /-->
		
		<!-- wp:spacer {"height":"4vh"} -->
		<div style="height:4vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Editorial', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'editorial',
				),
				array(
					'term' => esc_attr_x( 'Incredible Women', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'incredible-women',
				),
			),
		),
	),
	'great-hear-at-the-beach-no-longer-a-problem'      => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2022-04-11 12:14:10',
		'post_title'   => esc_html_x( 'Great Hear at the Beach? No Longer a Problem', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-five',
		'post_excerpt' => 'Sun and sand bushwick scenester small batch pug cliche plaid four loko fashion four dollar toast locavore craft beer organic pitchfork skateboard keytar fam austin lumbersexual selfies.',
		'post_content' => '<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"5vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /-->
		
		<!-- wp:spacer {"height":55} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>PBR&amp;B irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify. Street art food truck health goth scenester, forage tote bag shaman. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"3vw","right":"3vw","bottom":"3vw","left":"3vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignwide" style="padding-top:3vw;padding-right:3vw;padding-bottom:3vw;padding-left:3vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Fam banh mi cold-pressed, food truck 3 wolf moon plaid snackwave fixie mumblecore everyday carry pop-up church-key cloud bread.</h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"2vw","right":"5vw","bottom":"2vw","left":"5vw"}}},"layout":{"wideSize":"1400px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:2vw;padding-right:5vw;padding-bottom:2vw;padding-left:5vw"><!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"1vw","right":"1vw","bottom":"1vw","left":"1vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:1vw;padding-right:1vw;padding-bottom:1vw;padding-left:1vw"><!-- wp:spacer {"height":"10px"} -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-one.jpeg" alt="' . esc_attr_x( 'Post Image Two', 'Theme starter content', 'organic-goodness' ) . '"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"style":{"spacing":{"padding":{"top":"1vw","right":"1vw","bottom":"1vw","left":"1vw"}}}} -->
		<div class="wp-block-column" style="padding-top:1vw;padding-right:1vw;padding-bottom:1vw;padding-left:1vw"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-five.jpeg" alt="' . esc_attr_x( 'Product Image One', 'Theme starter content', 'organic-goodness' ) . '"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":55} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Milkshake gluten-free succulents whatever squid. Lyft seitan beard, everyday carry pop-up church-key cloud bread. Certified organic tofu photo booth try-hard.</h2>
		<!-- /wp:heading -->
		
		<!-- wp:spacer {"height":55} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify.</p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Beauty Tips', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'beauty-tips',
				),
			),
		),
	),
	'organic-skincare-recommendations-for-this-season' => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2022-02-22 12:14:10',
		'post_title'   => esc_html_x( 'Organic Skincare Recommendations For This Season', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-six',
		'post_excerpt' => 'Everyday self care plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper natural kickstarter.',
		'post_content' => '<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"6vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:6vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%"><!-- wp:image {"id":695,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-eight.jpeg" alt="" class="wp-image-695"/><figcaption>Skin Care Beauty Box — $42<br><br>Aenean porttitor arcu ac leo pellentesque eleifend quis at risus. Pellentesque nec ex vulputate mi vehicula commodo. Vestibulum sit amet magna gravida, molestie dui in, maximus libero.<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%"><!-- wp:image {"id":742,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-five.jpeg" alt="" class="wp-image-742"/><figcaption>Hyaluron-Filler Eye Cream — $59<br><br>Aenean porttitor arcu ac leo pellentesque eleifend quis at risus. Pellentesque nec ex vulputate mi vehicula commodo. Vestibulum sit amet magna gravida, molestie dui in, maximus libero.<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"width":"60%"} -->
		<div class="wp-block-column" style="flex-basis:60%"><!-- wp:image {"id":772,"sizeSlug":"full","linkDestination":"none"} -->
		<figure class="wp-block-image size-full"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-four.jpeg" alt="" class="wp-image-772"/><figcaption>Mineral Sunscreen — $25<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%"><!-- wp:image {"id":745,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/post-image-eight.jpeg" alt="" class="wp-image-745"/><figcaption>Oxygen Face Mask — $37<br><br>Aenean porttitor arcu ac leo pellentesque eleifend quis at risus. Pellentesque nec ex vulputate mi vehicula commodo. Vestibulum sit amet magna gravida, molestie dui in, maximus libero.<br><br>INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</figcaption></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":"25px"} -->
		<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>PBR&amp;B irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify. Street art food truck health goth scenester, forage tote bag shaman. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"4vw","right":"4vw","bottom":"4vw","left":"4vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignwide" style="padding-top:4vw;padding-right:4vw;padding-bottom:4vw;padding-left:4vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Fam banh mi cold-pressed, food truck 3 wolf moon plaid snackwave fixie mumblecore everyday carry pop-up church-key cloud bread.</h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"20px"} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /-->
		
		<!-- wp:spacer {"height":"55px"} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. </p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Beauty Tips', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'beauty-tips',
				),
			),
		),
	),
	'the-ultimate-skincare-shopping-guide'             => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2022-02-04 12:14:10',
		'post_title'   => esc_html_x( 'The Ultimate Skincare Shopping Guide', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-seven',
		'post_excerpt' => 'Anti-ageing organic trust fund venmo, beard lyft godard hot chicken leggings bespoke mixtape forage tbh selvage actually. Fashion axe migas bitters, flannel iPhone taiyaki messenger bag.',
		'post_content' => '<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"6vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:6vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:group {"align":"full"} -->
		<div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#6a8173"}}} -->
		<div class="wp-block-columns are-vertically-aligned-center has-background" style="background-color:#6a8173;margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"0vw","left":"5vw"}},"color":{"background":"#6a8173"}},"layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center has-background" style="background-color:#6a8173;padding-top:0vw;padding-right:5vw;padding-bottom:0vw;padding-left:5vw;flex-basis:60%"><!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"color-1","fontSize":"post-title"} -->
		<h2 class="has-color-1-color has-text-color has-post-title-font-size" style="margin-bottom:3rem">Daily Routine Box</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"textColor":"color-1"} -->
		<p class="has-color-1-color has-text-color">Donec maximus, justo dignissim convallis finibus, purus felis ornare nisl, eu porta sem sapien a nibh. Nulla lorem metus, feugiat vel lectus pretium, rutrum ultrices est. Sed posuere velit a urna facilisis maximus. Fusce interdum feugiat magna sed luctus. Donec et tristique massa.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"textColor":"color-1"} -->
		<h3 class="has-color-1-color has-text-color" style="margin-top:3rem;margin-bottom:3rem">$59 / month</h3>
		<!-- /wp:heading -->
		
		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
		<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"color-6","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-6-background-color has-text-color has-background" href="#">Buy Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"40%","backgroundColor":"color-2","className":"no-margin-bottom","layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center no-margin-bottom has-color-2-background-color has-background" style="flex-basis:40%"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":850,"isRepeated":true,"dimRatio":20,"overlayColor":"color-2","style":{"spacing":{"padding":{"top":"5vw","right":"6vw","bottom":"5vw","left":"6vw"}}}} -->
		<div class="wp-block-cover is-repeated" style="padding-top:5vw;padding-right:6vw;padding-bottom:5vw;padding-left:6vw;background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg)"><span aria-hidden="true" class="wp-block-cover__background has-color-2-background-color has-background-dim-20 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:image {"id":827,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-two.jpeg" alt="" class="wp-image-827"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"10px"} -->
		<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","layout":{"inherit":false}} -->
		<div class="wp-block-group alignfull"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":850,"isRepeated":true,"dimRatio":20,"overlayColor":"color-2","align":"full","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"}}}} -->
		<div class="wp-block-cover alignfull is-repeated" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg)"><span aria-hidden="true" class="wp-block-cover__background has-color-2-background-color has-background-dim-20 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}},"color":{}}} -->
		<div class="wp-block-columns are-vertically-aligned-center" style="margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"verticalAlignment":"center","width":"40%","style":{"spacing":{"padding":{"top":"5vw","right":"6vw","bottom":"5vw","left":"6vw"}},"color":{"background":"#6a8173"}},"className":"no-margin-bottom","layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center no-margin-bottom has-background" style="background-color:#6a8173;padding-top:5vw;padding-right:6vw;padding-bottom:5vw;padding-left:6vw;flex-basis:40%"><!-- wp:image {"id":826,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-three.jpeg" alt="" class="wp-image-826"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"0vw","left":"5vw"}},"color":{}},"layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-top:0vw;padding-right:5vw;padding-bottom:0vw;padding-left:5vw;flex-basis:60%"><!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"color-1","fontSize":"post-title"} -->
		<h2 class="has-color-1-color has-text-color has-post-title-font-size" style="margin-bottom:3rem">Intensive Care Box</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"textColor":"color-1"} -->
		<p class="has-color-1-color has-text-color">Donec maximus, justo dignissim convallis finibus, purus felis ornare nisl, eu porta sem sapien a nibh. Nulla lorem metus, feugiat vel lectus pretium, rutrum ultrices est. Sed posuere velit a urna facilisis maximus. Fusce interdum feugiat magna sed luctus. Donec et tristique massa.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"textColor":"color-1"} -->
		<h3 class="has-color-1-color has-text-color" style="margin-top:3rem;margin-bottom:3rem">$79 / month</h3>
		<!-- /wp:heading -->
		
		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
		<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"color-6","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-6-background-color has-text-color has-background" href="#">Buy Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"10px"} -->
		<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full"} -->
		<div class="wp-block-group alignfull"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"0px","right":"0px","bottom":"0px","left":"0px"},"margin":{"top":"0px","bottom":"0px"}},"color":{"background":"#6a8173"}}} -->
		<div class="wp-block-columns are-vertically-aligned-center has-background" style="background-color:#6a8173;margin-top:0px;margin-bottom:0px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"0vw","left":"5vw"}},"color":{"background":"#6a8173"}},"layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center has-background" style="background-color:#6a8173;padding-top:0vw;padding-right:5vw;padding-bottom:0vw;padding-left:5vw;flex-basis:60%"><!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"3rem"}}},"textColor":"color-1","fontSize":"post-title"} -->
		<h2 class="has-color-1-color has-text-color has-post-title-font-size" style="margin-bottom:3rem">Body Care Box</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"textColor":"color-1"} -->
		<p class="has-color-1-color has-text-color">Donec maximus, justo dignissim convallis finibus, purus felis ornare nisl, eu porta sem sapien a nibh. Nulla lorem metus, feugiat vel lectus pretium, rutrum ultrices est. Sed posuere velit a urna facilisis maximus. Fusce interdum feugiat magna sed luctus. Donec et tristique massa.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"3rem","bottom":"3rem"}}},"textColor":"color-1"} -->
		<h3 class="has-color-1-color has-text-color" style="margin-top:3rem;margin-bottom:3rem">$99 / month</h3>
		<!-- /wp:heading -->
		
		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
		<div class="wp-block-buttons" style="margin-top:0px;margin-bottom:0px"><!-- wp:button {"backgroundColor":"color-6","textColor":"color-1"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-1-color has-color-6-background-color has-text-color has-background" href="#">Buy Now</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer {"height":"5rem"} -->
		<div style="height:5rem" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center","width":"40%","backgroundColor":"color-2","className":"no-margin-bottom","layout":{"inherit":true}} -->
		<div class="wp-block-column is-vertically-aligned-center no-margin-bottom has-color-2-background-color has-background" style="flex-basis:40%"><!-- wp:cover {"url":"' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg","id":850,"isRepeated":true,"dimRatio":20,"overlayColor":"color-2","style":{"spacing":{"padding":{"top":"5vw","right":"6vw","bottom":"5vw","left":"6vw"}}}} -->
		<div class="wp-block-cover is-repeated" style="padding-top:5vw;padding-right:6vw;padding-bottom:5vw;padding-left:6vw;background-image:url(' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/frontpage-background.jpeg)"><span aria-hidden="true" class="wp-block-cover__background has-color-2-background-color has-background-dim-20 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:image {"id":825,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-one.jpeg" alt="" class="wp-image-825"/></figure>
		<!-- /wp:image --></div></div>
		<!-- /wp:cover --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"55px"} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Milkshake gluten-free succulents whatever squid. Lyft seitan beard, everyday carry pop-up church-key cloud bread. Certified organic tofu photo booth try-hard.</h2>
		<!-- /wp:heading -->
		
		<!-- wp:spacer {"height":"55px"} -->
		<div style="height:55px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify.</p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Beauty Tips', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'beauty-tips',
				),
			),
		),
	),
	'the-green-box-subscription-package'               => array(
		'post_type'    => 'post',
		'post_status'  => 'publish',
		'post_date'    => '2021-12-26 12:14:10',
		'post_title'   => esc_html_x( 'The Green Box Subscription Package', 'Theme starter content', 'organic-goodness' ),
		'thumbnail'    => 'post-image-eight',
		'post_excerpt' => 'Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo.',
		'post_content' => '<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"4vh"} -->
		<div style="height:4vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0vw","right":"7vw","bottom":"0vw","left":"7vw"}}}} -->
		<div class="wp-block-group alignfull" style="padding-top:0vw;padding-right:7vw;padding-bottom:0vw;padding-left:7vw"><!-- wp:columns {"verticalAlignment":"top"} -->
		<div class="wp-block-columns are-vertically-aligned-top"><!-- wp:column {"verticalAlignment":"top","width":"25%","style":{"spacing":{"padding":{"top":"3vw","right":"1vw","bottom":"3vw","left":"1vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:3vw;padding-right:1vw;padding-bottom:3vw;padding-left:1vw;flex-basis:25%"><!-- wp:image {"id":694,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-two.jpeg" alt="" class="wp-image-694"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"top","width":"25%","style":{"spacing":{"padding":{"top":"2vw","right":"1vw","bottom":"2vw","left":"1vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:2vw;padding-right:1vw;padding-bottom:2vw;padding-left:1vw;flex-basis:25%"><!-- wp:spacer {"height":"5vw"} -->
		<div style="height:5vw" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:image {"id":744,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-one.jpeg" alt="" class="wp-image-744"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"top","width":"50%","style":{"spacing":{"padding":{"top":"3vw","right":"2vw","bottom":"3vw","left":"2vw"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-top:3vw;padding-right:2vw;padding-bottom:3vw;padding-left:2vw;flex-basis:50%"><!-- wp:heading -->
		<h2>Recyclable Packaging</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:list -->
		<ul><li>Mlkshk kale chips cray</li><li>Forage gluten-free artisan l</li><li>Locavore letterpress marfa</li></ul>
		<!-- /wp:list -->
		
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-2-background-color has-background" href="#">See Products</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"7vh"} -->
		<div style="height:7vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:paragraph -->
		<p>PBR&amp;B irony stumptown small batch leggings truffaut distillery tilde selvage kombucha. Farm-to-table pinterest cold-pressed, scenester biodiesel distillery venmo butcher listicle portland air plant iPhone. Banh mi tumeric af, taxidermy pug 8-bit blog lyft pickled selvage direct trade air plant cliche. Everyday carry waistcoat franzen, authentic tumblr +1 jean shorts. Humblebrag lo-fi succulents gentrify. Street art food truck health goth scenester, forage tote bag shaman. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":"5vh"} -->
		<div style="height:5vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0vw","right":"7vw","bottom":"0vw","left":"7vw"}}}} -->
		<div class="wp-block-group alignfull" style="padding-top:0vw;padding-right:7vw;padding-bottom:0vw;padding-left:7vw"><!-- wp:columns -->
		<div class="wp-block-columns"><!-- wp:column {"width":"50%","style":{"spacing":{"padding":{"top":"3vw","right":"2vw","bottom":"3vw","left":"2vw"}}}} -->
		<div class="wp-block-column" style="padding-top:3vw;padding-right:2vw;padding-bottom:3vw;padding-left:2vw;flex-basis:50%"><!-- wp:heading -->
		<h2>Sustainable Ingredients</h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin.</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:list -->
		<ul><li>Mlkshk kale chips cray</li><li>Forage gluten-free artisan l</li><li>Locavore letterpress marfa</li></ul>
		<!-- /wp:list -->
		
		<!-- wp:buttons -->
		<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"color-2"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-2-background-color has-background" href="#">See Products</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"top":"3vw","right":"1vw","bottom":"3vw","left":"1vw"}}}} -->
		<div class="wp-block-column" style="padding-top:3vw;padding-right:1vw;padding-bottom:3vw;padding-left:1vw;flex-basis:25%"><!-- wp:image {"id":761,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-three.jpeg" alt="" class="wp-image-761"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"width":"25%","style":{"spacing":{"padding":{"top":"2vw","right":"1vw","bottom":"2vw","left":"1vw"}}}} -->
		<div class="wp-block-column" style="padding-top:2vw;padding-right:1vw;padding-bottom:2vw;padding-left:1vw;flex-basis:25%"><!-- wp:spacer {"height":"5vw"} -->
		<div style="height:5vw" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:image {"id":760,"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/customizer/starter-content/product-image-four.jpeg" alt="" class="wp-image-760"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:group -->
		
		<!-- wp:spacer {"height":"7vh"} -->
		<div style="height:7vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>I\'m baby farm-to-table heirloom synth pug photo booth, af migas dreamcatcher. Everyday carry plaid hella portland prism tumblr. Salvia farm-to-table pickled shaman copper mug franzen kickstarter intelligentsia aesthetic. Narwhal small batch messenger bag, echo park put a bird on it occupy deep v organic pitchfork skateboard keytar fam austin. Lumbersexual selfies drinking vinegar venmo. </p>
		<!-- /wp:paragraph -->
		
		<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"5vw","right":"5vw","bottom":"5vw","left":"5vw"}}},"layout":{"wideSize":"1100px"}} -->
		<div class="wp-block-group alignfull" style="padding-top:5vw;padding-right:5vw;padding-bottom:5vw;padding-left:5vw"><!-- wp:heading {"textAlign":"center","align":"wide"} -->
		<h2 class="alignwide has-text-align-center">Vexillologist art party scenester, portland affogato bushwick air plant shaman fanny pack swag live-edge tilde ramps. </h2>
		<!-- /wp:heading --></div>
		<!-- /wp:group -->
		
		<!-- wp:woocommerce/product-new {"rows":1,"align":"wide"} /-->
		
		<!-- wp:spacer {"height":"4vh"} -->
		<div style="height:4vh" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:paragraph -->
		<p>Twee hexagon tbh fanny pack, knausgaard VHS beard pour-over polaroid aesthetic ramps blue bottle mlkshk deep v. Occupy you probably haven\'t heard of them shabby chic slow-carb butcher. Kinfolk squid tumeric migas live-edge man braid viral, godard meh roof party williamsburg pop-up. Mlkshk gluten-free succulents whatever squid. Lyft seitan beard everyday carry pop-up church-key cloud bread. Lumbersexual tofu photo booth try-hard chicharrones.</p>
		<!-- /wp:paragraph -->',
		'taxonomy'     => array(
			'category' => array(
				array(
					'term' => esc_attr_x( 'Beauty Tips', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'beauty-tips',
				),
			),
		),
	),
);

$import_products = array(
	'cold-pressed-extract'        => array(
		'post_title'     => esc_attr_x( 'Cold Pressed Extract', 'Theme starter content', 'organic-goodness' ),
		'post_excerpt'   => 'Beard gastropub poutine, ugh vexillologist blog mustache 90\'s knausgaard biodiesel.<ul><li>Mlkshk kale chips cray</li><li>forage gluten-free artisan l</li><li>ocavore letterpress marfa</li></ul><p class="has-small-font-size">INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</p>',
		'post_content'   => '<h2>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante&nbsp; donec eu libero sit amet quam.</h2><p>I\'m baby biodiesel polaroid echo park synth williamsburg. Put a bird on it pok pok migas literally hashtag distillery blue bottle meh direct trade. Edison bulb unicorn copper mug enamel pin, locavore farm-to-table artisan food truck. Bitters heirloom tousled, ugh kickstarter normcore craft beer gentrify air plant tote bag umami neutra yr. Kickstarter bicycle rights YOLO lomo venmo, leggings succulents drinking vinegar.</p><p>Edison bulb shoreditch narwhal freegan fingerstache adaptogen. Mumblecore green juice forage, bespoke crucifix freegan occupy poke synth viral polaroid copper mug gochujang godard. Hot chicken art party tattooed hexagon, wayfarers everyday carry kale chips. Authentic fam poke hashtag etsy activated charcoal freegan art party selvage banjo.</p>',
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'comment_status' => 'open',
		'product_type'   => 'simple',
		'thumbnail'      => 'product-image-two',
		'product_data'   => array(
			'regular_price' => '59',
			'price'         => '59',
			'sale_price'    => '57',
			'featured'      => true,
			'weight'        => '0.2',
			'height'        => '5',
			'length'        => '5',
			'width'         => '10',
			'custom'        => array(
				'delivery'       => array(
					'name'        => 'Delivery',
					'value'       => 'Same day shipping on all orders',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'sustainability' => array(
					'name'        => 'Sustainability',
					'value'       => 'All deliveries are climate conscious',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'origin'         => array(
					'name'        => 'Origin',
					'value'       => 'Made in USA',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
			),
		),
		'taxonomy'       => array(
			'product_cat' => array(
				array(
					'term'        => esc_attr_x( 'Skin Care', 'Theme starter content', 'organic-goodness' ),
					'slug'        => 'skin-care',
					'description' => 'Enamel pin food truck dreamcatcher tbh post-ironic wayfarers ethical activated charcoal. Taiyaki bespoke put a bird on it, keytar butcher etsy vape. Pork belly sustainable forage chia health goth, woke wayfarers. Pickled authentic cliche tumeric enamel pin artisan art party.',
					'thumbnail'   => 'product-image-three',
				),
				array(
					'term'        => esc_attr_x( 'Hair Care', 'Theme starter content', 'organic-goodness' ),
					'slug'        => 'hair-care',
					'description' => 'Enamel pin food truck dreamcatcher tbh post-ironic wayfarers ethical activated charcoal. Taiyaki bespoke put a bird on it, keytar butcher etsy vape. Pork belly sustainable forage chia health goth, woke wayfarers. Pickled authentic cliche tumeric enamel pin artisan art party.',
					'thumbnail'   => 'product-image-five',
				),
			),
			'product_tag' => array(
				array(
					'term' => esc_attr_x( 'Organic', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'organic',
				),
				array(
					'term' => esc_attr_x( 'Cruelty Free', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'cruelty-free',
				),
			),
		),
	),
	'day-cream-moisturizer'       => array(
		'post_title'     => esc_attr_x( 'Day Cream Moisturizer', 'Theme starter content', 'organic-goodness' ),
		'post_excerpt'   => 'Beard gastropub poutine, ugh vexillologist blog mustache 90’s knausgaard biodiesel.<ul><li>Mlkshk kale chips cray</li><li>forage gluten-free artisan l</li><li>ocavore letterpress marfa</li></ul><p class="has-small-font-size">INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</p>',
		'post_content'   => '<h2>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante&nbsp; donec eu libero sit amet quam.</h2><p>I\'m baby biodiesel polaroid echo park synth williamsburg. Put a bird on it pok pok migas literally hashtag distillery blue bottle meh direct trade. Edison bulb unicorn copper mug enamel pin, locavore farm-to-table artisan food truck. Bitters heirloom tousled, ugh kickstarter normcore craft beer gentrify air plant tote bag umami neutra yr. Kickstarter bicycle rights YOLO lomo venmo, leggings succulents drinking vinegar.</p><p>Edison bulb shoreditch narwhal freegan fingerstache adaptogen. Mumblecore green juice forage, bespoke crucifix freegan occupy poke synth viral polaroid copper mug gochujang godard. Hot chicken art party tattooed hexagon, wayfarers everyday carry kale chips. Authentic fam poke hashtag etsy activated charcoal freegan art party selvage banjo.</p>',
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'comment_status' => 'open',
		'product_type'   => 'variable',
		'thumbnail'      => 'product-image-one',
		'product_data'   => array(
			'regular_price' => '45',
			'price'         => '45',
			'stock_status'  => 'instock',
			'featured'      => true,
			'weight'        => '0.2',
			'height'        => '5',
			'length'        => '5',
			'width'         => '10',
			'custom'        => array(
				'size'           => array(
					'name'         => 'Size',
					'value'        => '50ml | 100ml | 200ml',
					'is_visible'   => '1',
					'is_variation' => '1',
					'is_taxonomy'  => '0',
				),
				'variation'      => array(
					'name'         => 'Variation',
					'value'        => 'Lemon | Almonds | Pomegranate',
					'is_visible'   => '1',
					'is_variation' => '1',
					'is_taxonomy'  => '0',
				),
				'delivery'       => array(
					'name'         => 'Delivery',
					'value'        => 'Same day shipping on all orders',
					'is_visible'   => '1',
					'is_taxonomy'  => '0',
					'is_variation' => '0',
				),
				'sustainability' => array(
					'name'         => 'Sustainability',
					'value'        => 'All deliveries are climate conscious',
					'is_visible'   => '1',
					'is_taxonomy'  => '0',
					'is_variation' => '0',
				),
			),
		),
		'taxonomy'       => array(
			'product_cat' => array(
				array(
					'term' => esc_attr_x( 'Skin Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'skin-care',
				),
				array(
					'term'        => esc_attr_x( 'Makeup', 'Theme starter content', 'organic-goodness' ),
					'slug'        => 'makeup',
					'description' => 'Enamel pin food truck dreamcatcher tbh post-ironic wayfarers ethical activated charcoal. Taiyaki bespoke put a bird on it, keytar butcher etsy vape. Pork belly sustainable forage chia health goth, woke wayfarers. Pickled authentic cliche tumeric enamel pin artisan art party.',
					'thumbnail'   => 'product-image-four',
				),
			),
			'product_tag' => array(
				array(
					'term' => esc_attr_x( 'Day Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'day-care',
				),
			),
		),
	),
	'hyaluron-filler-eye-cream'   => array(
		'post_title'     => esc_attr_x( 'Hyaluron-Filler Eye Cream', 'Theme starter content', 'organic-goodness' ),
		'post_excerpt'   => 'Beard gastropub poutine, ugh vexillologist blog mustache 90’s knausgaard biodiesel.<ul><li>Mlkshk kale chips cray</li><li>forage gluten-free artisan l</li><li>ocavore letterpress marfa</li></ul><p class="has-small-font-size">INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</p>',
		'post_content'   => '<h2>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante&nbsp; donec eu libero sit amet quam.</h2><p>I\'m baby biodiesel polaroid echo park synth williamsburg. Put a bird on it pok pok migas literally hashtag distillery blue bottle meh direct trade. Edison bulb unicorn copper mug enamel pin, locavore farm-to-table artisan food truck. Bitters heirloom tousled, ugh kickstarter normcore craft beer gentrify air plant tote bag umami neutra yr. Kickstarter bicycle rights YOLO lomo venmo, leggings succulents drinking vinegar.</p><p>Edison bulb shoreditch narwhal freegan fingerstache adaptogen. Mumblecore green juice forage, bespoke crucifix freegan occupy poke synth viral polaroid copper mug gochujang godard. Hot chicken art party tattooed hexagon, wayfarers everyday carry kale chips. Authentic fam poke hashtag etsy activated charcoal freegan art party selvage banjo.</p>',
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'comment_status' => 'open',
		'product_type'   => 'external',
		'thumbnail'      => 'product-image-six',
		'product_data'   => array(
			'regular_price' => '68',
			'price'         => '68',
			'featured'      => false,
			'weight'        => '0.2',
			'height'        => '5',
			'length'        => '5',
			'width'         => '10',
			'custom'        => array(
				'delivery'       => array(
					'name'        => 'Delivery',
					'value'       => 'Same day shipping on all orders',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'sustainability' => array(
					'name'        => 'Sustainability',
					'value'       => 'All deliveries are climate conscious',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'origin'         => array(
					'name'        => 'Origin',
					'value'       => 'Made in USA',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
			),
		),
		'taxonomy'       => array(
			'product_cat' => array(
				array(
					'term' => esc_attr_x( 'Skin Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'skin-care',
				),
				array(
					'term' => esc_attr_x( 'Hair Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'hair-care',
				),
				array(
					'term'        => esc_attr_x( 'Subscriptions', 'Theme starter content', 'organic-goodness' ),
					'slug'        => 'subscriptions',
					'description' => 'Enamel pin food truck dreamcatcher tbh post-ironic wayfarers ethical activated charcoal. Taiyaki bespoke put a bird on it, keytar butcher etsy vape. Pork belly sustainable forage chia health goth, woke wayfarers. Pickled authentic cliche tumeric enamel pin artisan art party.',
					'thumbnail'   => 'product-image-one',
				),
			),
			'product_tag' => array(
				array(
					'term' => esc_attr_x( 'Cruelty Free', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'cruelty-free',
				),
				array(
					'term' => esc_attr_x( 'Organic', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'organic',
				),
			),
		),
	),
	'oxygen-face-mask'            => array(
		'post_title'     => esc_attr_x( 'Oxygen Face Mask', 'Theme starter content', 'organic-goodness' ),
		'post_excerpt'   => 'Beard gastropub poutine, ugh vexillologist blog mustache 90’s knausgaard biodiesel.<ul><li>Mlkshk kale chips cray</li><li>forage gluten-free artisan l</li><li>ocavore letterpress marfa</li></ul><p class="has-small-font-size">INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</p>',
		'post_content'   => '<h2>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante&nbsp; donec eu libero sit amet quam.</h2><p>I\'m baby biodiesel polaroid echo park synth williamsburg. Put a bird on it pok pok migas literally hashtag distillery blue bottle meh direct trade. Edison bulb unicorn copper mug enamel pin, locavore farm-to-table artisan food truck. Bitters heirloom tousled, ugh kickstarter normcore craft beer gentrify air plant tote bag umami neutra yr. Kickstarter bicycle rights YOLO lomo venmo, leggings succulents drinking vinegar.</p><p>Edison bulb shoreditch narwhal freegan fingerstache adaptogen. Mumblecore green juice forage, bespoke crucifix freegan occupy poke synth viral polaroid copper mug gochujang godard. Hot chicken art party tattooed hexagon, wayfarers everyday carry kale chips. Authentic fam poke hashtag etsy activated charcoal freegan art party selvage banjo.</p>',
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'comment_status' => 'open',
		'product_type'   => 'simple',
		'thumbnail'      => 'product-image-five',
		'product_data'   => array(
			'regular_price' => '37',
			'price'         => '37',
			'featured'      => false,
			'weight'        => '0.2',
			'height'        => '5',
			'length'        => '5',
			'width'         => '10',
			'custom'        => array(
				'delivery'       => array(
					'name'        => 'Delivery',
					'value'       => 'Same day shipping on all orders',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'sustainability' => array(
					'name'        => 'Sustainability',
					'value'       => 'All deliveries are climate conscious',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'origin'         => array(
					'name'        => 'Origin',
					'value'       => 'Made in USA',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
			),
		),
		'taxonomy'       => array(
			'product_cat' => array(
				array(
					'term' => esc_attr_x( 'Skin Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'skin-care',
				),
				array(
					'term' => esc_attr_x( 'Hair Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'hair-care',
				),
				array(
					'term' => esc_attr_x( 'Subscriptions', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'subscriptions',
				),
			),
			'product_tag' => array(
				array(
					'term' => esc_attr_x( 'Oxygen', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'oxygen',
				),
				array(
					'term' => esc_attr_x( 'Mask', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'mask',
				),
			),
		),
	),
	'moisturizing-soothing-fluid' => array(
		'post_title'       => esc_attr_x( 'Moisturizing Soothing Fluid', 'Theme starter content', 'organic-goodness' ),
		'post_excerpt'     => 'Beard gastropub poutine, ugh vexillologist blog mustache 90’s knausgaard biodiesel.<ul><li>Mlkshk kale chips cray</li><li>forage gluten-free artisan l</li><li>ocavore letterpress marfa</li></ul><p class="has-small-font-size">INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</p>',
		'post_content'     => '<h2>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante&nbsp; donec eu libero sit amet quam.</h2><p>I\'m baby biodiesel polaroid echo park synth williamsburg. Put a bird on it pok pok migas literally hashtag distillery blue bottle meh direct trade. Edison bulb unicorn copper mug enamel pin, locavore farm-to-table artisan food truck. Bitters heirloom tousled, ugh kickstarter normcore craft beer gentrify air plant tote bag umami neutra yr. Kickstarter bicycle rights YOLO lomo venmo, leggings succulents drinking vinegar.</p><p>Edison bulb shoreditch narwhal freegan fingerstache adaptogen. Mumblecore green juice forage, bespoke crucifix freegan occupy poke synth viral polaroid copper mug gochujang godard. Hot chicken art party tattooed hexagon, wayfarers everyday carry kale chips. Authentic fam poke hashtag etsy activated charcoal freegan art party selvage banjo.</p>',
		'post_type'        => 'product',
		'post_status'      => 'publish',
		'comment_status'   => 'open',
		'product_type'     => 'grouped',
		'product_children' => array( 'oxygen-face-mask', 'cold-pressed-extract', 'pomegranate-tea-cologne' ),
		'thumbnail'        => 'product-image-three',
		'product_data'     => array(
			'regular_price' => '39',
			'price'         => '39',
			'featured'      => false,
			'custom'        => array(
				'delivery'       => array(
					'name'        => 'Delivery',
					'value'       => 'Same day shipping on all orders',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'returns'        => array(
					'name'        => 'Returns',
					'value'       => 'Free returns within 14 days',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'sustainability' => array(
					'name'        => 'Sustainability',
					'value'       => 'All deliveries are climate conscious',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'origin'         => array(
					'name'        => 'Origin',
					'value'       => 'Made in USA',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
			),
		),
		'taxonomy'         => array(
			'product_cat' => array(
				array(
					'term' => esc_attr_x( 'Skin Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'skin-care',
				),
				array(
					'term' => esc_attr_x( 'Makeup', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'makeup',
				),
				array(
					'term' => esc_attr_x( 'Subscriptions', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'subscriptions',
				),
			),
		),
	),
	'pomegranate-tea-cologne'     => array(
		'post_title'     => esc_attr_x( 'Pomegranate Tea Cologne', 'Theme starter content', 'organic-goodness' ),
		'post_excerpt'   => 'Beard gastropub poutine, ugh vexillologist blog mustache 90’s knausgaard biodiesel.<ul><li>Mlkshk kale chips cray</li><li>forage gluten-free artisan l</li><li>ocavore letterpress marfa</li></ul><p class="has-small-font-size">INGREDIENTS: Simmondsia Chinensis (Jojoba) Seed Oil*, Argania Spinosa (Argan) Kernel Oil*, Helianthus Annuus (Sunflower) Seed Oil*, Limnanthes Alba (Meadowfoam) Seed Oil*, Punica Granatum (Pomegranate) Seed Oil*, Vaccinium Macrocarpon (Cranberry) Seed Oil*, Rosa Mosqueta (Rosehip) Seed Oil*</p>',
		'post_content'   => '<h2>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante&nbsp; donec eu libero sit amet quam.</h2><p>I\'m baby biodiesel polaroid echo park synth williamsburg. Put a bird on it pok pok migas literally hashtag distillery blue bottle meh direct trade. Edison bulb unicorn copper mug enamel pin, locavore farm-to-table artisan food truck. Bitters heirloom tousled, ugh kickstarter normcore craft beer gentrify air plant tote bag umami neutra yr. Kickstarter bicycle rights YOLO lomo venmo, leggings succulents drinking vinegar.</p><p>Edison bulb shoreditch narwhal freegan fingerstache adaptogen. Mumblecore green juice forage, bespoke crucifix freegan occupy poke synth viral polaroid copper mug gochujang godard. Hot chicken art party tattooed hexagon, wayfarers everyday carry kale chips. Authentic fam poke hashtag etsy activated charcoal freegan art party selvage banjo.</p>',
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'comment_status' => 'open',
		'product_type'   => 'simple',
		'thumbnail'      => 'product-image-four',
		'product_data'   => array(
			'regular_price' => '79',
			'price'         => '79',
			'stock_status'  => 'outofstock',
			'featured'      => false,
			'weight'        => '0.2',
			'height'        => '5',
			'length'        => '5',
			'width'         => '10',
			'custom'        => array(
				'delivery'       => array(
					'name'        => 'Delivery',
					'value'       => 'Same day shipping on all orders',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'sustainability' => array(
					'name'        => 'Sustainability',
					'value'       => 'All deliveries are climate conscious',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
				'origin'         => array(
					'name'        => 'Origin',
					'value'       => 'Made in USA',
					'is_visible'  => '1',
					'is_taxonomy' => '0',
				),
			),
		),
		'taxonomy'       => array(
			'product_cat' => array(
				array(
					'term' => esc_attr_x( 'Skin Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'skin-care',
				),
				array(
					'term' => esc_attr_x( 'Hair Care', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'hair-care',
				),
			),
			'product_tag' => array(
				array(
					'term' => esc_attr_x( 'Organic', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'organic',
				),
				array(
					'term' => esc_attr_x( 'Cruelty Free', 'Theme starter content', 'organic-goodness' ),
					'slug' => 'cruelty-free',
				),
			),
		),
	),
);

$import_widgets = array(
	'footer-widgets'       => array(
		'footer-orders'  => array(
			'title'   => '',
			'content' => '
			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading -->
			<h2>Orders</h2>
			<!-- /wp:heading -->

			<!-- wp:list -->
			<ul><li><a href="#">Shipping and Returns</a></li><li><a href="#">Refund Policy</a></li><li><a href="#">Order Tracking</a></li><li><a href="#">Disposal Instructions</a></li><li><a href="#">FAQ</a></li></ul>
			<!-- /wp:list --></div>
			<!-- /wp:group -->',
		),
		'footer-find-us' => array(
			'title'   => '',
			'content' => '
			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading -->
			<h2>Find Us</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><strong>Address</strong> <br>123 Main Street<br>New York, NY 10001<br><br><strong>Hours</strong> <br>Monday–Friday: 9:00am–5:00pm<br>Saturday: 11:00am–3:00pm<br>Sunday: Closed</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:group -->',
		),
	),
	'shop-filters-widgets' => array(
		'filters-info'  => array(
			'title'   => '',
			'content' => '
			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:paragraph -->
			<p>Several widgets come with WooCommerce that help you display products in a multitude of ways. Check the documentation to see what widgets are included with WooCommerce and how to use them:<br><a rel="noreferrer noopener" href="https://woocommerce.com/document/woocommerce-widgets/" target="_blank">https://woocommerce.com/document/woocommerce-widgets/</a></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:group -->',
		),
		'filters-price' => array(
			'title'   => '',
			'content' => '
			<!-- wp:woocommerce/price-filter {"headingLevel":5} -->
			<div class="wp-block-woocommerce-price-filter is-loading" data-showinputfields="true" data-showfilterbutton="false" data-heading="Filter by price" data-heading-level="5"><span aria-hidden="true" class="wc-block-product-categories__placeholder"></span></div>
			<!-- /wp:woocommerce/price-filter -->',
		),
	),
);

$import_menus = array(
	'primary-left'  => array(
		'name'  => esc_html_x( 'Desktop Navigation - Left', 'Theme starter content', 'organic-goodness' ),
		'items' => array(
			'home'             => array(
				'menu-item-title'   => __( 'Home', 'organic-goodness' ),
				'menu-item-classes' => 'home',
				'menu-item-url'     => home_url( '/' ),
				'menu-item-status'  => 'publish',
			),
			'about'            => array(
				'menu-item-title'   => __( 'About', 'organic-goodness' ),
				'menu-item-classes' => 'about',
				'menu-item-path'    => 'about',
				'menu-item-status'  => 'publish',
			),
			'shop'             => array(
				'menu-item-title'   => __( 'Shop', 'organic-goodness' ),
				'menu-item-classes' => 'shop',
				'menu-item-status'  => 'publish',
			),
			'simple-product'   => array(
				'menu-item-title'   => __( 'Simple Product', 'organic-goodness' ),
				'menu-item-classes' => 'product',
				'menu-item-parent'  => 'shop',
				'menu-item-path'    => 'cold-pressed-extract',
				'menu-item-status'  => 'publish',
			),
			'variable-product' => array(
				'menu-item-title'   => __( 'Variable Product', 'organic-goodness' ),
				'menu-item-classes' => 'product',
				'menu-item-parent'  => 'shop',
				'menu-item-path'    => 'day-cream-moisturizer',
				'menu-item-status'  => 'publish',
			),
			'external-product' => array(
				'menu-item-title'   => __( 'External Product', 'organic-goodness' ),
				'menu-item-classes' => 'product',
				'menu-item-parent'  => 'shop',
				'menu-item-path'    => 'hyaluron-filler-eye-cream',
				'menu-item-status'  => 'publish',
			),
			'grouped-product'  => array(
				'menu-item-title'   => __( 'Grouped Product', 'organic-goodness' ),
				'menu-item-classes' => 'product',
				'menu-item-parent'  => 'shop',
				'menu-item-path'    => 'moisturizing-soothing-fluid',
				'menu-item-status'  => 'publish',
			),
			'blog'             => array(
				'menu-item-title'   => __( 'Journal', 'organic-goodness' ),
				'menu-item-classes' => 'blog',
				'menu-item-status'  => 'publish',
			),
		),
	),
	'primary-right' => array(
		'name'  => esc_html_x( 'Desktop Navigation - Right', 'Theme starter content', 'organic-goodness' ),
		'items' => array(
			'my-account'          => array(
				'menu-item-title'   => __( 'My Account', 'organic-goodness' ),
				'menu-item-classes' => 'my-account',
				'menu-item-path'    => 'my-account',
				'menu-item-status'  => 'publish',
			),
			'theme-documentation' => array(
				'menu-item-title'   => __( 'Theme Documentation', 'organic-goodness' ),
				'menu-item-classes' => 'theme-documentation',
				'menu-item-url'     => 'https://woocommerce.com/document/organic-goodness-theme',
				'menu-item-status'  => 'publish',
			),
		),
	),
	'mobile'        => array(
		'name'  => esc_html_x( 'Mobile Navigation', 'Theme starter content', 'organic-goodness' ),
		'items' => array(
			'shop'           => array(
				'menu-item-title'   => __( 'Shop', 'organic-goodness' ),
				'menu-item-classes' => 'shop',
				'menu-item-status'  => 'publish',
			),
			'blog'           => array(
				'menu-item-title'   => __( 'Journal', 'organic-goodness' ),
				'menu-item-classes' => 'blog',
				'menu-item-status'  => 'publish',
			),
			'order-tracking' => array(
				'menu-item-title'   => __( 'Order Tracking', 'organic-goodness' ),
				'menu-item-classes' => 'order-tracking',
				'menu-item-path'    => 'order-tracking',
				'menu-item-status'  => 'publish',
			),
		),
	),
);

$import_customizer = array(
	'theme_mods' => array(
		'custom_logo'                 => 'organic-goodness-logo',
		'site_icon'                   => 'organic-goodness-favicon',
		'mobile_menu_show_on_desktop' => true,
		'footer_spacing'              => 10,
		'footer_widget_columns'       => 4,
		'footer_first_widget_columns' => 1,
		'footer_text_note'            => '© All right reserved. Designed with <b>Organic Goodness</b> by <b>Thunderstores</b>.',
	),
	'options'    => array(
		'woocommerce_demo_store'            => true,
		'woocommerce_catalog_columns'       => 3,
		'woocommerce_catalog_rows'          => 4,
		'woocommerce_thumbnail_cropping'    => 'uncropped',
		'woocommerce_single_image_width'    => 1000,
		'woocommerce_thumbnail_image_width' => 500,
	),
);

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Organic_Goodness_Theme_Setup( $config, $strings, $import_attachments, $import_pages, $import_posts, $import_products, $import_widgets, $import_menus, $import_customizer );
