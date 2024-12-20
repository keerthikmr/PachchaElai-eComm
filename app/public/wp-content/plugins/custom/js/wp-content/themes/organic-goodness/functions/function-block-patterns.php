<?php
/**
 * Starter Content and Block Patterns.
 *
 * @package organic-goodness
 */

/**
 * Register Block Patterns.
 */
function organic_goodness_register_block_patterns() {

	$block_patterns = array(
		'frontpage'         => array(
			'title'       => 'Frontpage',
			'description' => '',
			'content'     => '<!-- wp:paragraph {"align":"center"} -->
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
		'about'             => array(
			'title'       => 'About',
			'description' => '',
			'content'     => '<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"0vw","right":"5vw","bottom":"5vw","left":"5vw"}}}} -->
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
		'post-layout-one'   => array(
			'title'       => 'Post Layout One',
			'description' => '',
			'content'     => '<!-- wp:paragraph -->
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
		),
		'post-layout-two'   => array(
			'title'       => 'Post Layout Two',
			'description' => '',
			'content'     => '<!-- wp:paragraph -->
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
		),
		'post-layout-three' => array(
			'title'       => 'Post Layout Three',
			'description' => '',
			'content'     => '<!-- wp:paragraph -->
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
		),
		'post-layout-four'  => array(
			'title'       => 'Post Layout Four',
			'description' => '',
			'content'     => '<!-- wp:paragraph -->
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
		),
	);

	if ( function_exists( 'register_block_pattern' ) && function_exists( 'register_block_pattern_category' ) ) {
		register_block_pattern_category(
			'organic-goodness',
			array( 'label' => _x( 'Organic Goodness', 'Block Patterns Category', 'organic-goodness' ) )
		);

		foreach ( $block_patterns as $key => $pattern ) {

			if ( class_exists( 'WP_Block_Patterns_Registry' ) && ! WP_Block_Patterns_Registry::get_instance()->is_registered( 'organic-goodness/' . $key ) ) {
				register_block_pattern(
					'organic-goodness/' . $key,
					array(
						'categories'  => array( 'organic-goodness' ),
						'title'       => $pattern['title'],
						'description' => $pattern['description'],
						'content'     => $pattern['content'],
					)
				);
			}
		}
	}
}
add_action( 'admin_init', 'organic_goodness_register_block_patterns' );
