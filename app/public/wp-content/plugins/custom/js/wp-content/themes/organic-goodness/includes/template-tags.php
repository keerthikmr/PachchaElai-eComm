<?php
/**
 * Custom template tags for this theme.
 *
 * @package organic-goodness
 * @since Organic Goodness 1.0
 */

/**
 * Table of Contents:
 * Logo & Description
 * Post Meta
 * Classes
 * Archives
 * Search
 * Mobile Menu
 * Minicart
 * Miscellaneous
 */

/**
 * Logo & Description
 */

/**
 * Displays the site logo, either text or image.
 *
 * @param array   $args Arguments for displaying the site logo either as an image or text.
 * @param boolean $echo Echo or return the HTML.
 * @return string Compiled HTML based on our arguments.
 */
function organic_goodness_site_logo( $args = array(), $echo = true ) {
	$logo              = get_custom_logo();
	$site_title        = get_bloginfo( 'name' );
	$mobile_logo       = get_custom_mobile_logo( 0, false );
	$logo_class        = '';
	$mobile_logo_class = '';
	$contents          = '';
	$classname         = '';
	$html              = '';

	if ( ! empty( $mobile_logo ) ) {
		if ( Organic_Goodness_Customize::get_option( 'mobile_logo_on_phones_only' ) ) {
			$logo_class        = ' hidden-sm-down';
			$mobile_logo_class = ' hidden-sm-up';
		} else {
			$logo_class        = ' hidden-lg-down';
			$mobile_logo_class = ' hidden-lg-up';
		}
	}

	$defaults = array(
		'logo'              => '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class'        => 'site-logo' . $logo_class,
		'mobile_logo'       => '%1$s<span class="screen-reader-text">%2$s</span>',
		'mobile_logo_class' => 'mobile-site-logo' . $mobile_logo_class,
		'title'             => '<a href="%1$s">%2$s</a>',
		'title_class'       => 'site-title',
		'wrap'              => '<div class="%1$s">%2$s</div>',
	);

	$args = wp_parse_args( $args, $defaults );

	/**
	* Filters the arguments for `organic_goodness_site_logo()`.
	*
	* @param array  $args     Parsed arguments.
	* @param array  $defaults Function's default arguments.
	*/
	$args = apply_filters( 'organic_goodness_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo, esc_html( $site_title ) );
		$classname = $args['logo_class'];

		$html .= sprintf( $args['wrap'], $classname, $contents );

		if ( ! empty( $mobile_logo ) ) {
			$mobile_contents  = sprintf( $args['mobile_logo'], $mobile_logo, esc_html( $site_title ) );
			$mobile_classname = $args['mobile_logo_class'];

			$html .= sprintf( $args['wrap'], $mobile_classname, $mobile_contents );
		}
	} else {
		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), esc_html( $site_title ) );
		$classname = $args['title_class'];

		$html .= sprintf( $args['wrap'], $classname, $contents );
	}

	/**
	* Filters the arguments for `organic_goodness_site_logo()`.
	*
	* @param string $html      Compiled HTML based on our arguments.
	* @param array  $args      Parsed arguments.
	* @param string $classname Class name based on current view, home or single.
	* @param string $contents  HTML for site title or logo.
	*/
	$html = apply_filters( 'organic_goodness_site_logo', $html, $args, $classname, $contents );

	if ( ! $echo ) {
		return $html;
	}

	$allowedtags = Organic_Goodness::get_allowed_html_tags();

	echo wp_kses( $html, $allowedtags );
}

/**
 * Get mobile custom logo.
 * Native get_custom_logo() changed to get the mobile logo.
 *
 * @param int     $blog_id ID of the blog to get the custom logo for.
 * @param boolean $echo Echo or return the HTML.
 * @return string The HTML to display.
 */
function get_custom_mobile_logo( $blog_id = 0, $echo = true ) {
	$html           = '';
	$custom_logo_id = Organic_Goodness_Customize::get_option( 'custom_mobile_logo' );

	// We do not have a logo.
	if ( ! $custom_logo_id ) {
		return '';
	}

	$custom_logo_attr = array(
		'class'   => 'mobile-logo',
		'loading' => false,
	);

	$unlink_homepage_logo = (bool) get_theme_support( 'custom-logo', 'unlink-homepage-logo' );

	if ( $unlink_homepage_logo && is_front_page() && ! is_paged() ) {
		/*
			* If on the home page, set the logo alt attribute to an empty string,
			* as the image is decorative and doesn't need its purpose to be described.
			*/
		$custom_logo_attr['alt'] = '';
	} else {
		/*
			* If the logo alt attribute is empty, get the site title and explicitly pass it
			* to the attributes used by wp_get_attachment_image().
			*/
		$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
		if ( empty( $image_alt ) ) {
			$custom_logo_attr['alt'] = get_bloginfo( 'name', 'display' );
		}
	}

	/**
	 * Filters the list of custom logo image attributes.
	 *
	 * @param array $custom_logo_attr Custom logo image attributes.
	 * @param int   $custom_logo_id   Custom logo attachment ID.
	 * @param int   $blog_id          ID of the blog to get the custom logo for.
	 */
	$custom_logo_attr = apply_filters( 'get_custom_mobile_logo_image_attributes', $custom_logo_attr, $custom_logo_id, $blog_id );

	/*
		* If the alt attribute is not empty, there's no need to explicitly pass it
		* because wp_get_attachment_image() already adds the alt attribute.
		*/
	$image = wp_get_attachment_image( $custom_logo_id, 'full', false, $custom_logo_attr );

	if ( $unlink_homepage_logo && is_front_page() && ! is_paged() ) {
		// If on the home page, don't link the logo to home.
		$html = sprintf(
			'<span class="custom-logo-link">%1$s</span>',
			$image
		);
	} else {
		$aria_current = is_front_page() && ! is_paged() ? ' aria-current="page"' : '';

		$html = sprintf(
			'<a href="%1$s" class="custom-logo-link" rel="home"%2$s>%3$s</a>',
			esc_url( home_url( '/' ) ),
			$aria_current,
			$image
		);
	}

	if ( ! $echo ) {
		/**
		 * Filters the custom logo output.
		 *
		 * @param string $html    Custom logo HTML output.
		 * @param int    $blog_id ID of the blog to get the custom logo for.
		 */
		return apply_filters( 'get_custom_mobile_logo', $html, $blog_id );
	}

	$allowedtags = Affiche::get_allowed_html_tags();

	/**
	 * Filters the custom logo output.
	 *
	 * @param string $html    Custom logo HTML output.
	 * @param int    $blog_id ID of the blog to get the custom logo for.
	 */
	echo wp_kses( apply_filters( 'get_custom_mobile_logo', $html, $blog_id ), $allowedtags );
}

/**
 * Displays the site description.
 *
 * @param boolean $echo Echo or return the html.
 * @return string The HTML to display.
 */
function organic_goodness_site_tagline( $echo = true ) {

	if ( has_custom_logo() ) {
		return;
	}

	$description = get_bloginfo( 'description' );

	if ( ! $description ) {
		return;
	}

	$wrapper = '<div class="site-tagline">%s</div><!-- .site-tagline -->';

	$html = sprintf( $wrapper, esc_html( $description ) );

	/**
	* Filters the HTML for the site description.
	*
	* @param string $html         The HTML to display.
	* @param string $description  Site description via `bloginfo()`.
	* @param string $wrapper      The format used in case you want to reuse it in a `sprintf()`.
	*/
	$html = apply_filters( 'organic_goodness_site_tagline', $html, $description, $wrapper );

	if ( ! $echo ) {
		return $html;
	}

	$allowedtags = Organic_Goodness::get_allowed_html_tags();

	echo wp_kses( $html, $allowedtags );
}

/**
 * Post Meta
 */

/**
 * Retrieves and displays the post meta.
 *
 * If it's a single post, outputs the post meta values specified in the Customizer settings.
 *
 * @param int    $post_id  The ID of the post for which the post meta should be output.
 * @param string $location Which post meta location to output – single or preview.
 */
function organic_goodness_the_post_meta( $post_id = null, $location = 'single-top' ) {

	// Require post ID.
	if ( ! $post_id ) {
		return;
	}

	/**
	* Filters post types array.
	*
	* This filter can be used to hide post meta information of post, page or custom post type
	* registered by child themes or plugins.
	*
	* @since Organic Goodness 1.0
	*
	* @param array Array of post types
	*/
	$disallowed_post_types = apply_filters( 'organic_goodness_disallowed_post_types_for_meta_output', array( 'product' ) );

	// Check whether the post type is allowed to output post meta.
	if ( in_array( get_post_type( $post_id ), $disallowed_post_types, true ) ) {
		return;
	}

	$post_meta_wrapper_classes = '';

	// Get the post meta settings for the location specified.
	if ( 'single-top' === $location ) {
		/**
		* Filters post meta info visibility.
		*
		* Use this filter to hide post meta information like Author, Post date, Comments, Is sticky status.
		*
		* @since Organic Goodness 1.0
		*
		* @param array $args {
		*  @type string 'comments'
		*  @type string 'categories'
		*  @type string 'post-date'
		* }
		*/
		$post_meta = apply_filters(
			'organic_goodness_post_meta_location_single_top',
			array(
				'comments',
				'categories',
				'post-date',
			)
		);

		$post_meta_wrapper_classes = ' post-meta-single post-meta-single-top';

	} elseif ( 'single-bottom' === $location ) {

		/**
		* Filters post tags visibility.
		*
		* Use this filter to hide post tags.
		*
		* @since Organic Goodness 1.0
		*
		* @param array $args {
		*   @type string 'tags'
		* }
		*/
		$post_meta = apply_filters(
			'organic_goodness_post_meta_location_single_bottom',
			array(
				'tags',
			)
		);

		$post_meta_wrapper_classes = ' post-meta-single post-meta-single-bottom';

	} elseif ( 'archive-top' === $location ) {
		/**
		* Filters post meta info visibility.
		*
		* Use this filter to hide post meta information like Author, Post date, Comments, Is sticky status.
		*
		* @since Organic Goodness 1.0
		*
		* @param array $args {
		*  @type string 'featured'
		*  @type string 'categories'
		*  @type string 'post-date'
		* }
		*/
		$post_meta = apply_filters(
			'organic_goodness_post_meta_location_single_top',
			array(
				'featured',
				'categories',
				'post-date',
			)
		);

		$post_meta_wrapper_classes = ' post-meta-archive post-meta-archive-top';
	} elseif ( 'page-top' === $location ) {
		/**
		* Filters post meta info visibility.
		*
		* Use this filter to hide post meta information like Author, Post date, Comments, Is sticky status.
		*
		* @since Organic Goodness 1.0
		*
		* @param array $args {
		*  @type string 'categories'
		*  @type string 'post-date'
		* }
		*/
		$post_meta = apply_filters(
			'organic_goodness_post_meta_location_page_top',
			array(
				'comments',
			)
		);

		$post_meta_wrapper_classes = ' post-meta-page post-meta-page-top';
	} elseif ( 'image' === $location ) {
		/**
		* Filters post meta info visibility.
		*
		* Use this filter to hide post meta information like Author, Post date, Comments, Is sticky status.
		*
		* @since Organic Goodness 1.0
		*
		* @param array $args {
		*  @type string 'categories'
		*  @type string 'post-date'
		* }
		*/
		$post_meta = apply_filters(
			'organic_goodness_post_meta_location_image',
			array(
				'post-date',
				'image-meta',
			)
		);

		$post_meta_wrapper_classes = ' post-meta-page post-meta-page-top';
	}

	// If the post meta setting has the value 'empty', it's explicitly empty and the default post meta shouldn't be output.
	if ( $post_meta && ! in_array( 'empty', $post_meta, true ) ) {

		// Make sure we don't output an empty container.
		$has_meta = false;

		global $post;
		$the_post = get_post( $post_id );
		setup_postdata( $the_post );

		ob_start();

		?>

		<div class="post-meta-wrapper<?php echo esc_attr( $post_meta_wrapper_classes ); ?>">

			<?php

			if ( is_page() ) {
				// Comments link.
				if ( in_array( 'comments', $post_meta, true ) && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

					$has_meta = true;
					?>
					<ul class="post-meta no-list-style no-padding no-margin">
						<li class="post-comments meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php echo esc_html_x( 'Comments', 'Post meta', 'organic-goodness' ); ?></span>
							</span>
							<span class="meta-text uppercase meta-size text-color">
								<a href="#comments-section">
									<?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
								</a>
							</span>
						</li>
					</ul>
					<?php
				}
			}
			?>

			<?php if ( ! is_page() ) { ?>

				<ul class="post-meta no-list-style no-padding no-margin">

					<?php

					/**
					 * Fires before post meta HTML display.
					 *
					 * Allow output of additional post meta info to be added by child themes and plugins.
					 *
					 * @since Organic Goodness 1.0
					 *
					 * @param int    $post_id   Post ID.
					 * @param array  $post_meta An array of post meta information.
					 * @param string $location  The location where the meta is shown.
					 *                          Accepts 'single-top' or 'single-bottom'.
					 */
					do_action( 'organic_goodness_start_of_post_meta_list', $post_id, $post_meta, $location );

					if ( in_array( 'featured', $post_meta, true ) && is_sticky( $post_id ) ) {
						?>
						<li class="post-featured meta-wrapper">
							<span class="meta-icon"></span>
							<span class="meta-text"></span>
						</li>
						<?php
					}

					// Categories.
					if ( in_array( 'categories', $post_meta, true ) && has_category() ) {

						$has_meta = true;
						?>
						<li class="post-categories meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php echo esc_html_x( 'Categories', 'Post meta', 'organic-goodness' ); ?></span>
							</span>
							<span class="meta-text uppercase meta-size text-color">
								<?php the_category( ', ' ); ?>
							</span>
						</li>
						<?php

					}

					// Post date.
					if ( in_array( 'post-date', $post_meta, true ) ) {

						$has_meta = true;
						?>
						<li class="post-date meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php echo esc_html_x( 'Post date', 'Post meta', 'organic-goodness' ); ?></span>
							</span>
							<span class="meta-text uppercase meta-size text-color">
								<?php the_time( get_option( 'date_format' ) ); ?>
							</span>
						</li>
						<?php
					}

					// Comments number.
					if ( in_array( 'comments', $post_meta, true ) && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

						$has_meta = true;
						?>
						<li class="post-comments meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php echo esc_html_x( 'Comments', 'Post meta', 'organic-goodness' ); ?></span>
							</span>
							<span class="meta-text uppercase meta-size text-color">
								<a href="#comments-section">
									<?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>
								</a>
							</span>
						</li>
						<?php
					}

					// Tags.
					if ( in_array( 'tags', $post_meta, true ) && has_tag() ) {

						$has_meta = true;
						?>
						<li class="post-tags meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php echo esc_html_x( 'Tags', 'Post meta', 'organic-goodness' ); ?></span>
							</span>
							<span class="meta-text meta-size uppercase text-color">
								<?php the_tags( '', ', ', '' ); ?>
							</span>
						</li>
						<?php
					}

					// Post image.
					if ( in_array( 'image-meta', $post_meta, true ) ) {

						$metadata = wp_get_attachment_metadata();
						?>
						<li class="image-meta meta-wrapper">
							<span class="meta-icon">
								<span class="screen-reader-text"><?php echo esc_html_x( 'Full size', 'Post meta', 'organic-goodness' ); ?></span>
							</span>
							<span class="meta-text uppercase meta-size text-color">
								<?php echo absint( $metadata['width'] ) . ' &times; ' . absint( $metadata['height'] ); ?>
							</span>
						</li>

						<?php
					}

					/**
					* Fires after post meta HTML display.
					*
					* Allow output of additional post meta info to be added by child themes and plugins.
					*
					* @since Organic Goodness 1.0
					*
					* @param int    $post_id   Post ID.
					* @param array  $post_meta An array of post meta information.
					* @param string $location  The location where the meta is shown.
					*                          Accepts 'single-top' or 'single-bottom'.
					*/
					do_action( 'organic_goodness_end_of_post_meta_list', $post_id, $post_meta, $location );

					?>

				</ul><!-- .post-meta -->
			<?php } ?>

		</div><!-- .post-meta-wrapper -->

		<?php

		wp_reset_postdata();

		$meta_output = ob_get_clean();

		// If there is meta to output, return it.
		if ( $has_meta && $meta_output ) {

			echo do_shortcode( $meta_output );

		}
	}
}

/**
 * Classes
 */

/**
 * Adds 'no-js' class.
 *
 * If we're missing JavaScript support, the HTML element will have a 'no-js' class.
 */
function organic_goodness_no_js_class() {

	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php

}
add_action( 'wp_head', 'organic_goodness_no_js_class' );

/**
 * Archives
 */

/**
 * Remove archive labels.
 *
 * @param  string $title Current archive title to be displayed.
 * @return string        Modified archive title to be displayed.
 */
function organic_goodness_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'organic_goodness_archive_title' );

/**
 * Output archive pagination.
 */
function organic_goodness_archive_pagination() {
	$args = array(
		'mid_size'  => 1,
		'prev_text' => false,
		'next_text' => false,
	);

	the_posts_pagination( $args );
}

/**
 * Search
 */

/**
 * Gets search form.
 */
function organic_goodness_search_form() {

	if ( organic_goodness_is_wc_active() ) {
		the_widget(
			'WC_Widget_Product_Search',
			'title=',
			array(
				'before_widget' => '<div class="search-wrapper %s">',
				'after_widget'  => '</div>',
			)
		);
	} else {
		echo '<div class="search-wrapper widget_search">';
		get_search_form();
		echo '</div>';
	}
}
add_action( 'organic_goodness_mobile_menu_fixed_content', 'organic_goodness_search_form', 10 );

/**
 * Mobile Menu
 */

/**
 * Gets mobile menu offcanvas.
 */
function organic_goodness_mobile_menu() {

	?>

	<div id="mobile-menu-wrapper">
		<?php

		/**
		 * Fires before menu HTML display.
		 *
		 * Allow output of additional info before menu to be added by child themes and plugins.
		 *
		 * Hook: organic_goodness_mobile_menu_product_categories - 10
		 *
		 * @since Organic Goodness 1.0
		 */
		do_action( 'organic_goodness_before_mobile_menu' );

		/**
		* Menu HTML display.
		*
		* Hook: organic_goodness_mobile_primary_menu - 10
		*
		* @since Organic Goodness 1.0
		*/
		do_action( 'organic_goodness_mobile_menu' );

		/**
		* Fires after menu HTML display.
		*
		* Allow output of additional info after menu to be added by child themes and plugins.
		*
		* @since Organic Goodness 1.0
		*/
		do_action( 'organic_goodness_after_mobile_menu' );
		?>
	</div>

	<?php
}

/**
 * Gets mobile primary menu.
 */
function organic_goodness_mobile_primary_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'mobile',
			'menu_class'     => 'mobile-primary-menu mobile-menu no-list-style no-margin no-padding',
			'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'after'          => '',
			'fallback_cb'    => false,
		)
	);
}
add_action( 'organic_goodness_mobile_menu', 'organic_goodness_mobile_primary_menu', 10 );

/**
 * Gets mobile menu product categories.
 */
function organic_goodness_mobile_menu_product_categories() {
	$categories = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'parent'     => 0,
		)
	);

	if ( empty( $categories ) ) {
		return;
	}

	?>

	<ul class="categories-list no-list-style no-margin">
		<?php foreach ( $categories as $category ) { ?>
			<li class="cat-item cat-item-<?php echo esc_attr( $category->term_id ); ?>">
				<?php
				$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
				$image_url    = wp_get_attachment_url( $thumbnail_id );
				if ( ! empty( $image_url ) ) {
					printf(
						'<img src="%s" alt="%s" class="cat-item-image" />',
						esc_url( $image_url ),
						esc_html( $category->name )
					);
				} else {
					printf(
						'<img src="%s" alt="%s" class="cat-item-image placeholder" />',
						esc_url( wc_placeholder_img_src() ),
						esc_html( $category->name )
					);
				}
				?>
				<span class="cate-item-title">
					<a href="<?php echo esc_url( get_term_link( $category->slug, 'product_cat' ) ); ?>" referrerpolicy="origin">
						<?php echo esc_html( $category->name ); ?>
					</a>
					<span class="cat-item-count count"><?php echo esc_html( $category->count ); ?></span>
				</span>
			</li>
		<?php } ?>
		</ul>

	<?php
}
if ( organic_goodness_is_wc_active() && Organic_Goodness_Customize::get_option( 'mobile_categories_list' ) ) {
	add_action( 'organic_goodness_before_mobile_menu', 'organic_goodness_mobile_menu_product_categories', 10 );
}

/**
 * Minicart
 */

/**
 * Gets minicart offcanvas.
 */
function organic_goodness_minicart() {

	if ( ! organic_goodness_is_wc_active() || ! class_exists( 'WC_Widget_Cart' ) ) {
		return;
	}

	$return_to = wc_get_page_permalink( 'shop' );
	?>

	<div class="header-minicart">
		<?php

		/**
		 * Fires before minicart HTML display.
		 *
		 * Allow output of additional info before minicart to be added by child themes and plugins.
		 *
		 * @since Organic Goodness 1.0
		 */
		do_action( 'organic_goodness_before_minicart' );

		the_widget( 'WC_Widget_Cart' );
		?>

		<a href="<?php echo esc_url( $return_to ); ?>" tabindex="1" class="button wc-forward">
			<?php echo esc_html__( 'Continue shopping', 'woocommerce' ); ?>
		</a>

		<?php
		/**
		 * Fires after minicart HTML display.
		 *
		 * Allow output of additional info after minicart to be added by child themes and plugins.
		 *
		 * @since Organic Goodness 1.0
		 */
		do_action( 'organic_goodness_after_minicart' );

		?>
	</div>

	<?php
}

/**
 * Product
 */

/**
 * Builds product page navigation.
 */
function organic_goodness_product_navigation() {
	global $post;

	if ( ! is_product() ) {
		return; }

	$previous_product = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next_product     = get_adjacent_post( false, '', false );

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( ! $next_product && ! $previous_product ) {
		return;
	}
	?>

	<div class="product-navigation-section">

		<?php if ( $previous_product ) { ?>
			<nav class="navigation-product fixed-lg-up previous-post block-md" aria-label="<?php esc_attr_e( 'Previous Product', 'organic-goodness' ); ?>" role="navigation">
				<a class="nav-icon-link hidden-lg-down" href="<?php echo esc_url( get_permalink( $previous_product->ID ) ); ?>">
					<span class="relative"></span>
				</a>
				<a class="nav-post-info" href="<?php echo esc_url( get_permalink( $previous_product->ID ) ); ?>">
					<span class="uppercase meta-size background-color hidden-lg-up">
						<?php esc_html_e( 'Previous Product', 'organic-goodness' ); ?>
					</span>
					<img class="nav-post-thumb" src="<?php echo esc_attr( get_the_post_thumbnail_url( $previous_product->ID ) ); ?>" />
					<h6 class="title text-color no-margin">
						<?php echo esc_html( get_the_title( $previous_product->ID ) ); ?>
					</h6>
				</a>
			</nav><!-- .pagination-single -->
		<?php } ?>

		<?php if ( $next_product ) { ?>
			<nav class="navigation-product fixed-lg-up next-post block-md" aria-label="<?php esc_attr_e( 'Next Product', 'organic-goodness' ); ?>" role="navigation">
				<a class="nav-icon-link hidden-lg-down" href="<?php echo esc_url( get_permalink( $next_product->ID ) ); ?>">
					<span class="relative"></span>
				</a>
				<a class="nav-post-info" href="<?php echo esc_url( get_permalink( $next_product->ID ) ); ?>">
					<span class="uppercase meta-size background-color hidden-lg-up">
						<?php esc_html_e( 'Next Product', 'organic-goodness' ); ?>
					</span>
					<img class="nav-post-thumb" src="<?php echo esc_attr( get_the_post_thumbnail_url( $next_product->ID ) ); ?>" />
					<h6 class="title text-color no-margin">
						<?php echo esc_html( get_the_title( $next_product->ID ) ); ?>
					</h6>
				</a>
			</nav><!-- .pagination-single -->
		<?php } ?>

	</div>
	<?php
}
