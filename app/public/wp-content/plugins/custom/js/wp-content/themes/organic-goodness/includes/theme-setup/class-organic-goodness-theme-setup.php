<?php
/**
 * Organic Goodness Theme Setup
 * Better WordPress Theme Onboarding
 *
 * The following code is a derivative work from the
 * Envato WordPress Theme Setup Wizard by David Baker.
 * And based on Merlin WP theme setup
 * By Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com.
 * https://merlinwp.com/
 *
 * @package organic-goodness
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Organic_Goodness_Theme_Setup.
 */
class Organic_Goodness_Theme_Setup {
	/**
	 * Current theme.
	 *
	 * @var object WP_Theme
	 */
	protected $theme;

	/**
	 * Current step.
	 *
	 * @var string
	 */
	protected $step = '';

	/**
	 * Steps.
	 *
	 * @var    array
	 */
	protected $steps = array();

	/**
	 * The base import file name.
	 *
	 * @var string
	 */
	public $import_file_base_name;

	/**
	 * Helper.
	 *
	 * @var    array
	 */
	protected $helper;

	/**
	 * Updater.
	 *
	 * @var    array
	 */
	protected $updater;

	/**
	 * The text string array.
	 *
	 * @var array $strings
	 */
	protected $strings = null;

	/**
	 * The import attachments array.
	 *
	 * @var array $import_attachments
	 */
	protected $import_attachments = array();

	/**
	 * The import pages array.
	 *
	 * @var array $import_pages
	 */
	protected $import_pages = array();

	/**
	 * The import posts array.
	 *
	 * @var array $import_posts
	 */
	protected $import_posts = array();

	/**
	 * The import products array.
	 *
	 * @var array $import_products
	 */
	protected $import_products = array();

	/**
	 * The import widgets array.
	 *
	 * @var array $import_widgets
	 */
	protected $import_widgets = array();

	/**
	 * The import menus array.
	 *
	 * @var array $import_menus
	 */
	protected $import_menus = array();

	/**
	 * The import customizer array.
	 *
	 * @var array $import_customizer
	 */
	protected $import_customizer = array();

	/**
	 * The base path where Organic_Goodness_Theme_Setup is located.
	 *
	 * @var array $strings
	 */
	protected $base_path = null;

	/**
	 * The base url where Organic_Goodness_Theme_Setup is located.
	 *
	 * @var array $strings
	 */
	protected $base_url = null;

	/**
	 * The location where Organic_Goodness_Theme_Setup is located within the theme or plugin.
	 *
	 * @var string $directory
	 */
	protected $directory = null;

	/**
	 * Top level admin page.
	 *
	 * @var string $ts_theme_setup_url
	 */
	protected $ts_theme_setup_url = null;

	/**
	 * The wp-admin parent page slug for the admin menu item.
	 *
	 * @var string $parent_slug
	 */
	protected $parent_slug = null;

	/**
	 * The capability required for this menu to be displayed to the user.
	 *
	 * @var string $capability
	 */
	protected $capability = null;

	/**
	 * The URL for the "Learn more about child themes" link.
	 *
	 * @var string $child_action_btn_url
	 */
	protected $child_action_btn_url = null;

	/**
	 * The URL for the "Set up your store" link.
	 *
	 * @var string $ready_primary_btn_url
	 */
	protected $ready_primary_btn_url = null;

	/**
	 * The URL for the "View your website" link.
	 *
	 * @var string $ready_secondary_btn_url
	 */
	protected $ready_secondary_btn_url = null;

	/**
	 * Turn on dev mode if you're developing.
	 *
	 * @var string $dev_mode
	 */
	protected $dev_mode = false;

	/**
	 * Ignore.
	 *
	 * @var string $ignore
	 */
	public $ignore = null;

	/**
	 * Class Constructor.
	 *
	 * @param array $config Package-specific configuration args.
	 * @param array $strings Text for the different elements.
	 * @param array $import_attachments Attachments to be imported.
	 * @param array $import_pages Pages to be imported.
	 * @param array $import_posts Posts to be imported.
	 * @param array $import_products Products to be imported.
	 * @param array $import_widgets Widgets to be imported.
	 * @param array $import_menus Menus to be imported.
	 * @param array $import_customizer Customizer options to be imported.
	 */
	public function __construct( $config = array(), $strings = array(), $import_attachments = array(), $import_pages = array(), $import_posts = array(), $import_products = array(), $import_widgets = array(), $import_menus = array(), $import_customizer = array() ) {

		$config = wp_parse_args(
			$config,
			array(
				'base_path'               => get_parent_theme_file_path(),
				'base_url'                => get_parent_theme_file_uri(),
				'directory'               => 'theme-setup',
				'ts_theme_setup_url'      => 'organic-goodness-setup',
				'parent_slug'             => 'themes.php',
				'capability'              => 'manage_options',
				'child_action_btn_url'    => '',
				'dev_mode'                => '',
				'ready_primary_btn_url'   => home_url( '/' ),
				'ready_secondary_btn_url' => home_url( '/' ),
			)
		);

		// Set config arguments.
		$this->base_path               = $config['base_path'];
		$this->base_url                = $config['base_url'];
		$this->directory               = $config['directory'];
		$this->ts_theme_setup_url      = $config['ts_theme_setup_url'];
		$this->parent_slug             = $config['parent_slug'];
		$this->capability              = $config['capability'];
		$this->child_action_btn_url    = $config['child_action_btn_url'];
		$this->dev_mode                = $config['dev_mode'];
		$this->ready_primary_btn_url   = $config['ready_primary_btn_url'];
		$this->ready_secondary_btn_url = $config['ready_secondary_btn_url'];

		// Strings passed in from the config file.
		$this->strings = $strings;

		// Import attachments passed in from the config file.
		$this->import_attachments = $import_attachments;

		// Import pages passed in from the config file.
		$this->import_pages = $import_pages;

		// Import posts passed in from the config file.
		$this->import_posts = $import_posts;

		// Import products passed in from the config file.
		$this->import_products = $import_products;

		// Import widgets passed in from the config file.
		$this->import_widgets = $import_widgets;

		// Import widgets passed in from the config file.
		$this->import_menus = $import_menus;

		// Import customizer options passed in from the config file.
		$this->import_customizer = $import_customizer;

		// Retrieve a WP_Theme object.
		$this->theme = wp_get_theme();
		$this->slug  = strtolower( preg_replace( '#[^a-zA-Z]#', '', $this->theme->template ) );

		// Set the ignore option.
		$this->ignore = $this->slug . '_ignore';

		// Is Dev Mode turned on?
		if ( true !== $this->dev_mode ) {

			// Has this theme been setup yet?
			$already_setup = get_option( 'ts_theme_setup_' . $this->slug . '_completed' );

			// Return if Organic_Goodness_Theme_Setup has already completed it's setup.
			if ( $already_setup ) {
				return;
			}
		}

		add_action( 'admin_init', array( $this, 'required_classes' ) );
		add_action( 'admin_init', array( $this, 'redirect' ), 30 );
		add_action( 'after_switch_theme', array( $this, 'switch_theme' ) );
		add_action( 'admin_init', array( $this, 'steps' ), 30, 0 );
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_page' ), 30, 0 );
		add_action( 'admin_init', array( $this, 'ignore' ), 5 );
		add_action( 'wp_ajax_ts_theme_setup_content', array( $this, 'ajax_content' ), 10, 0 );
		add_action( 'wp_ajax_ts_theme_setup_activate_plugin', array( $this, 'activate_plugin' ), 10, 0 );
		add_action( 'wp_ajax_ts_theme_setup_child_theme', array( $this, 'generate_child' ), 10, 0 );
	}

	/**
	 * Require necessary classes.
	 */
	public function required_classes() {
	}

	/**
	 * Set redirection transient on theme switch.
	 */
	public function switch_theme() {
		if ( ! is_child_theme() ) {
			set_transient( $this->theme->template . '_ts_theme_setup_redirect', 1 );
		}
	}

	/**
	 * Redirection transient.
	 */
	public function redirect() {

		if ( ! get_transient( $this->theme->template . '_ts_theme_setup_redirect' ) ) {
			return;
		}

		delete_transient( $this->theme->template . '_ts_theme_setup_redirect' );

		wp_safe_redirect( menu_page_url( $this->ts_theme_setup_url, false ) );

		exit;
	}

	/**
	 * Give the user the ability to ignore Organic_Goodness_Theme_Setup.
	 */
	public function ignore() {

		// Bail out if not on correct page.
		if ( ! isset( $_GET['_wpnonce'] ) || ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ), 'ts_theme_setup-ignore-nounce' ) || ! is_admin() || ! isset( $_GET[ $this->ignore ] ) || ! current_user_can( 'manage_options' ) ) ) {
			return;
		}

		update_option( 'ts_theme_setup_' . $this->slug . '_completed', 'ignored' );
	}

	/**
	 * Add the admin menu item, under Appearance.
	 */
	public function add_admin_menu() {

		// Strings passed in from the config file.
		$strings = $this->strings;

		$this->hook_suffix = add_submenu_page(
			esc_html( $this->parent_slug ),
			esc_html( $strings['admin-menu'] ),
			esc_html( $strings['admin-menu'] ),
			sanitize_key( $this->capability ),
			sanitize_key( $this->ts_theme_setup_url ),
			array( $this, 'admin_page' )
		);
	}

	/**
	 * Add the admin page.
	 */
	public function admin_page() {

		$pagenow = isset( $pagenow ) ? $pagenow : 'themes';

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Do not proceed, if we're not on the right page.
		if ( empty( $_GET['page'] ) || $this->ts_theme_setup_url !== $_GET['page'] ) { // phpcs:ignore
			return;
		}

		if ( ob_get_length() ) {
			ob_end_clean();
		}

		$this->step = isset( $_GET['step'] ) ? sanitize_key( $_GET['step'] ) : current( array_keys( $this->steps ) ); // phpcs:ignore

		// Use minified libraries if dev mode is turned on.
		$suffix = ( ( true === $this->dev_mode ) ) ? '' : '.min';

		// Enqueue styles.
		wp_enqueue_style( 'organic-goodness-theme-setup', trailingslashit( $this->base_url ) . $this->directory . '/assets/css/theme-setup' . $suffix . '.css', array( 'wp-admin' ), $this->theme->version );

		// Enqueue javascript.
		wp_enqueue_script( 'organic-goodness-theme-setup', trailingslashit( $this->base_url ) . $this->directory . '/assets/js/theme-setup' . $suffix . '.js', array( 'jquery-core', 'updates' ), true, $this->theme->version );

		$texts = array(
			'something_went_wrong' => esc_html_x( 'Something went wrong. Please refresh the page and try again!', 'Theme setup', 'organic-goodness' ),
			'next'                 => $strings['btn-next'],
			'activating'           => $strings['btn-plugins-activate'],
			'importing'            => $strings['btn-content-importing'],
			'installing'           => $strings['btn-child-installing'],
			'try_again'            => $strings['btn-try-again'],
			'plugin_success'       => $strings['plugins-success%s'],
			'plugin_install_error' => $strings['plugins-install-error%s'],
		);

		// Localize the javascript.
		wp_localize_script(
			'organic-goodness-theme-setup',
			'ts_theme_setup_params',
			array(
				'ajaxurl'   => admin_url( 'admin-ajax.php' ),
				'wpnonce'   => wp_create_nonce( 'ts_theme_setup_nonce' ),
				'texts'     => $texts,
				'pagenow'   => $pagenow,
				'next_link' => $this->step_next_link(),
			)
		);

		ob_start();

		/**
		 * Start the actual page content.
		 */
		$this->header(); ?>

		<div class="ts_theme_setup__wrapper">

			<div class="ts_theme_setup__content ts_theme_setup__content--<?php echo esc_attr( strtolower( $this->steps[ $this->step ]['name'] ) ); ?>">

				<?php
				// Content Handlers.
				$show_content = true;

				if ( ! empty( $_REQUEST['save_step'] ) && isset( $this->steps[ $this->step ]['handler'] ) ) { // phpcs:ignore
					$show_content = call_user_func( $this->steps[ $this->step ]['handler'] );
				}

				if ( $show_content ) {
					$this->body();
				}
				?>

			<?php $this->step_output(); ?>

			</div>

			<?php echo sprintf( '<a class="return-to-dashboard" href="%s">%s</a>', esc_url( admin_url( '/' ) ), esc_html( $strings['return-to-dashboard'] ) ); ?>

			<?php $ignore_url = wp_nonce_url( admin_url( '?' . $this->ignore . '=true' ), 'ts_theme_setup-ignore-nounce' ); ?>

			<?php echo sprintf( '<a class="return-to-dashboard ignore" href="%s">%s</a>', esc_url( $ignore_url ), esc_html( $strings['ignore'] ) ); ?>

		</div>

		<?php $this->footer(); ?>

		<?php
		exit;
	}

	/**
	 * Output the header.
	 */
	protected function header() {

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Get the current step.
		$current_step = strtolower( $this->steps[ $this->step ]['name'] );
		?>

		<!DOCTYPE html>
		<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
		<head>
			<meta name="viewport" content="width=device-width"/>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
			<?php printf( esc_html( $strings['title%s%s%s%s'] ), '<ti', 'tle>', esc_html( $this->theme->name ), '</title>' ); ?>
			<?php do_action( 'admin_print_styles' ); ?>
			<?php do_action( 'admin_print_scripts' ); ?>
		</head>
		<body class="ts_theme_setup__body ts_theme_setup__body--<?php echo esc_attr( $current_step ); ?>">
		<?php
	}

	/**
	 * Output the content for the current step.
	 */
	protected function body() {
		isset( $this->steps[ $this->step ] ) ? call_user_func( $this->steps[ $this->step ]['view'] ) : false;
	}

	/**
	 * Output the footer.
	 */
	protected function footer() {
		?>
		</body>
		<?php do_action( 'admin_footer' ); ?>
		<?php do_action( 'admin_print_footer_scripts' ); ?>
		</html>
		<?php
	}

	/**
	 * Setup steps.
	 */
	public function steps() {

		$this->steps = array(
			'welcome' => array(
				'name'    => esc_html_x( 'Welcome', 'Theme setup', 'organic-goodness' ),
				'view'    => array( $this, 'welcome' ),
				'handler' => array( $this, 'welcome_handler' ),
			),
			'child'   => array(
				'name' => esc_html_x( 'Child', 'Theme setup', 'organic-goodness' ),
				'view' => array( $this, 'child' ),
			),
			'plugins' => array(
				'name' => esc_html_x( 'Plugins', 'Theme setup', 'organic-goodness' ),
				'view' => array( $this, 'plugins' ),
			),
			'content' => array(
				'name' => esc_html_x( 'Content', 'Theme setup', 'organic-goodness' ),
				'view' => array( $this, 'content' ),
			),
			'ready'   => array(
				'name' => esc_html_x( 'Ready', 'Theme setup', 'organic-goodness' ),
				'view' => array( $this, 'ready' ),
			),
		);

		$this->steps = apply_filters( $this->theme->template . '_ts_theme_setup_steps', $this->steps );
	}

	/**
	 * Output the steps
	 */
	protected function step_output() {
		$ouput_steps  = $this->steps;
		$array_keys   = array_keys( $this->steps );
		$current_step = array_search( $this->step, $array_keys, true );

		array_shift( $ouput_steps );
		?>

		<ol class="dots">

			<?php
			foreach ( $ouput_steps as $step_key => $step ) :

				$class_attr = '';
				$show_link  = false;

				if ( $step_key === $this->step ) {
					$class_attr = 'active';
				} elseif ( $current_step > array_search( $step_key, $array_keys, true ) ) {
					$class_attr = 'done';
					$show_link  = true;
				}
				?>

				<li class="<?php echo esc_attr( $class_attr ); ?>">
					<a href="<?php echo esc_url( $this->step_link( $step_key ) ); ?>" title="<?php echo esc_attr( $step['name'] ); ?>"></a>
				</li>

			<?php endforeach; ?>

		</ol>

		<?php
	}

	/**
	 * Get the step URL.
	 *
	 * @param string $step Name of the step, appended to the URL.
	 */
	protected function step_link( $step ) {
		return add_query_arg( 'step', $step );
	}

	/**
	 * Get the next step link.
	 */
	protected function step_next_link() {
		$keys = array_keys( $this->steps );
		$step = array_search( $this->step, $keys, true ) + 1;

		if ( isset( $keys[ $step ] ) ) {
			return add_query_arg( 'step', $keys[ $step ] );
		}

		return home_url( '/' );
	}

	/**
	 * Introduction step
	 */
	protected function welcome() {

		// Has this theme been setup yet? Compare this to the option set when you get to the last panel.
		$already_setup = get_option( 'ts_theme_setup_' . $this->slug . '_completed' );

		// Theme Name.
		$theme = ucfirst( $this->theme );

		// Remove "Child" from the current theme name, if it's installed.
		$theme = str_replace( ' Child', '', $theme );

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Text strings.
		$header    = ! $already_setup ? $strings['welcome-header%s'] : $strings['welcome-header-success%s'];
		$paragraph = ! $already_setup ? $strings['welcome%s'] : $strings['welcome-success%s'];
		$start     = $strings['btn-start'];
		$no        = $strings['btn-no'];
		?>

		<div class="ts_theme_setup__content--transition">

			<svg width="44px" height="66px" viewBox="0 0 88 133" class="theme-icon icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="organic-goodness-logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<path d="M39.6981376,16.8894094 C36.1900905,21.4358588 33.2491854,25.2856748 30.2579692,29.0988258 C29.5947791,29.946702 29.0688008,30.5837549 30.0567253,31.6103725 C33.0433678,34.7223071 35.9476831,37.9167377 38.8840145,41.0745035 C39.1538643,40.8728464 39.4282878,40.6666063 39.6981376,40.4649493 C39.6981376,32.9257263 39.6981376,25.3865033 39.6981376,16.8894094 L39.6981376,16.8894094 Z M39.4374353,65.6537454 C42.0398848,51.9777324 36.96305,50.1444866 28.7166239,41.8811316 C23.6123469,36.7617929 22.9811728,36.8809539 19.2215709,43.2468996 C18.5629545,44.3651795 18.7596247,44.9609844 19.5874689,45.7813618 C26.1233219,52.284801 32.6271588,58.8249051 39.4374353,65.6537454 L39.4374353,65.6537454 Z M8.27664704,70.8693294 C8.18974627,89.1880372 20.4381817,103.963998 36.8944442,106.736782 C39.6478266,107.204259 40.5579979,106.127228 39.7484486,103.377359 C39.3688294,102.094087 38.3260201,101.342456 37.4524386,100.462498 C27.6646672,90.6271351 17.8540271,80.9109328 8.27664704,70.8693294 L8.27664704,70.8693294 Z M39.8719391,91.2091906 C39.8719391,87.5197836 39.6981376,84.9074085 39.9176764,82.3362814 C40.1920999,79.0914365 39.1492906,76.7173833 36.7572324,74.4304092 C30.1573473,68.1286271 23.809017,61.5610243 17.3600648,55.0988332 C13.5958892,51.3269301 13.5135621,51.2994314 11.5605816,56.4508519 C10.8333593,58.3665937 8.96727951,60.2594199 11.2770106,62.5463939 C20.5799672,71.7722029 29.8005967,81.0942574 39.8719391,91.2091906 L39.8719391,91.2091906 Z M48.0543331,17.9847737 C48.0543331,19.1947159 48.0543331,20.404658 48.0543331,21.6146002 C48.0543331,33.1457158 48.0497594,44.6768313 48.0497594,56.2079468 C48.0497594,72.2442637 48.1046441,88.2805806 47.9992411,104.312314 C47.9811535,107.025518 49.1748957,107.094265 51.2147771,106.709283 C70.5204701,103.079457 83.0661977,84.206192 78.9772876,64.8700328 C78.172312,61.066048 77.124929,57.3078943 75.2817178,53.888891 C68.1146908,40.6116089 57.5219438,29.8871215 48.0543331,17.9847737 L48.0543331,17.9847737 Z M39.8673654,122.731851 C39.8536442,115.925926 39.8536442,115.925926 33.2125956,114.376833 C7.2978699,108.331706 -6.45074736,81.5663182 2.9756998,55.5388122 C5.16651406,49.4891013 8.32695802,43.984781 12.251214,38.9066904 C21.3712216,27.1235036 30.4820818,15.3357336 39.6020894,3.55254682 C42.7305172,-0.48517686 45.1591652,-0.51725866 48.2327084,3.45630142 C57.4304693,15.3357336 66.6556725,27.1922503 75.7848276,39.1220968 C85.15639,51.3681782 90.013686,65.0716899 87.2099926,80.5488668 C83.9443529,98.5834215 69.4227762,112.218187 51.1278763,115.023052 C48.703802,115.394285 47.9171214,116.136749 48.0314645,118.487887 C48.1823974,121.613571 48.1046441,124.757587 48.0360382,127.887854 C47.9765798,130.605641 46.8971807,132.562631 43.8236375,132.498467 C40.9559119,132.438887 39.9725611,130.546061 39.8856603,127.997849 C39.8216282,126.242516 39.8673654,124.487183 39.8673654,122.731851 L39.8673654,122.731851 Z" id="organic-goodness" fill="#2d4b38"></path>
				</g>
			</svg>

			<h2><?php echo esc_html( sprintf( $header, $theme ) ); ?></h2>

			<p><?php echo esc_html( sprintf( $paragraph, $theme ) ); ?></p>

		</div>

		<footer class="ts_theme_setup__content__footer">
			<a href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--start ts_theme_setup__button--proceed"><?php echo esc_html( $start ); ?></a>
			<?php wp_nonce_field( 'ts_theme_setup' ); ?>
		</footer>

		<?php
	}

	/**
	 * Handles save button from welcome page.
	 * This is to perform tasks when the setup wizard has already been run.
	 */
	protected function welcome_handler() {

		check_admin_referer( 'ts_theme_setup' );

		return false;
	}

	/**
	 * Child theme generator.
	 */
	protected function child() {

		// Variables.
		$is_child_theme     = is_child_theme();
		$child_theme_option = get_option( 'ts_theme_setup_' . $this->slug . '_child' );
		$theme              = $child_theme_option ? wp_get_theme( $child_theme_option )->name : $this->theme . ' Child';
		$action_url         = $this->child_action_btn_url;

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Text strings.
		$header    = ! $is_child_theme ? $strings['child-header'] : $strings['child-header-success'];
		$action    = $strings['child-action-link'];
		$skip      = $strings['btn-skip'];
		$next      = $strings['btn-next'];
		$paragraph = ! $is_child_theme ? $strings['child'] : $strings['child-success%s'];
		$install   = $strings['btn-child-install'];
		?>

		<div class="ts_theme_setup__content--transition">

			<svg width="44px" height="66px" viewBox="0 0 88 133" class="theme-icon icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="organic-goodness-logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<path d="M39.6981376,16.8894094 C36.1900905,21.4358588 33.2491854,25.2856748 30.2579692,29.0988258 C29.5947791,29.946702 29.0688008,30.5837549 30.0567253,31.6103725 C33.0433678,34.7223071 35.9476831,37.9167377 38.8840145,41.0745035 C39.1538643,40.8728464 39.4282878,40.6666063 39.6981376,40.4649493 C39.6981376,32.9257263 39.6981376,25.3865033 39.6981376,16.8894094 L39.6981376,16.8894094 Z M39.4374353,65.6537454 C42.0398848,51.9777324 36.96305,50.1444866 28.7166239,41.8811316 C23.6123469,36.7617929 22.9811728,36.8809539 19.2215709,43.2468996 C18.5629545,44.3651795 18.7596247,44.9609844 19.5874689,45.7813618 C26.1233219,52.284801 32.6271588,58.8249051 39.4374353,65.6537454 L39.4374353,65.6537454 Z M8.27664704,70.8693294 C8.18974627,89.1880372 20.4381817,103.963998 36.8944442,106.736782 C39.6478266,107.204259 40.5579979,106.127228 39.7484486,103.377359 C39.3688294,102.094087 38.3260201,101.342456 37.4524386,100.462498 C27.6646672,90.6271351 17.8540271,80.9109328 8.27664704,70.8693294 L8.27664704,70.8693294 Z M39.8719391,91.2091906 C39.8719391,87.5197836 39.6981376,84.9074085 39.9176764,82.3362814 C40.1920999,79.0914365 39.1492906,76.7173833 36.7572324,74.4304092 C30.1573473,68.1286271 23.809017,61.5610243 17.3600648,55.0988332 C13.5958892,51.3269301 13.5135621,51.2994314 11.5605816,56.4508519 C10.8333593,58.3665937 8.96727951,60.2594199 11.2770106,62.5463939 C20.5799672,71.7722029 29.8005967,81.0942574 39.8719391,91.2091906 L39.8719391,91.2091906 Z M48.0543331,17.9847737 C48.0543331,19.1947159 48.0543331,20.404658 48.0543331,21.6146002 C48.0543331,33.1457158 48.0497594,44.6768313 48.0497594,56.2079468 C48.0497594,72.2442637 48.1046441,88.2805806 47.9992411,104.312314 C47.9811535,107.025518 49.1748957,107.094265 51.2147771,106.709283 C70.5204701,103.079457 83.0661977,84.206192 78.9772876,64.8700328 C78.172312,61.066048 77.124929,57.3078943 75.2817178,53.888891 C68.1146908,40.6116089 57.5219438,29.8871215 48.0543331,17.9847737 L48.0543331,17.9847737 Z M39.8673654,122.731851 C39.8536442,115.925926 39.8536442,115.925926 33.2125956,114.376833 C7.2978699,108.331706 -6.45074736,81.5663182 2.9756998,55.5388122 C5.16651406,49.4891013 8.32695802,43.984781 12.251214,38.9066904 C21.3712216,27.1235036 30.4820818,15.3357336 39.6020894,3.55254682 C42.7305172,-0.48517686 45.1591652,-0.51725866 48.2327084,3.45630142 C57.4304693,15.3357336 66.6556725,27.1922503 75.7848276,39.1220968 C85.15639,51.3681782 90.013686,65.0716899 87.2099926,80.5488668 C83.9443529,98.5834215 69.4227762,112.218187 51.1278763,115.023052 C48.703802,115.394285 47.9171214,116.136749 48.0314645,118.487887 C48.1823974,121.613571 48.1046441,124.757587 48.0360382,127.887854 C47.9765798,130.605641 46.8971807,132.562631 43.8236375,132.498467 C40.9559119,132.438887 39.9725611,130.546061 39.8856603,127.997849 C39.8216282,126.242516 39.8673654,124.487183 39.8673654,122.731851 L39.8673654,122.731851 Z" id="organic-goodness" fill="#2d4b38"></path>
				</g>
			</svg>

			<svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
				<circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
			</svg>

			<h2><?php echo esc_html( $header ); ?></h2>

			<p id="child-theme-text"><?php echo esc_html( sprintf( $paragraph, $theme ) ); ?></p>

			<a class="ts_theme_setup__button ts_theme_setup__button--knockout ts_theme_setup__button--external" href="<?php echo esc_url( $action_url ); ?>" target="_blank"><?php echo esc_html( $action ); ?></a>

		</div>

		<footer class="ts_theme_setup__content__footer">

			<?php if ( ! $is_child_theme ) : ?>

				<a href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--skip ts_theme_setup__button--proceed"><?php echo esc_html( $skip ); ?></a>

				<a href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--next button-next" data-callback="install_child">
					<span class="ts_theme_setup__button--loading__text"><?php echo esc_html( $install ); ?></span>
				</a>

			<?php else : ?>
				<a href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--next ts_theme_setup__button--proceed"><?php echo esc_html( $next ); ?></a>
			<?php endif; ?>
			<?php wp_nonce_field( 'ts_theme_setup' ); ?>
		</footer>
		<?php
	}

	/**
	 * Theme plugins
	 */
	protected function plugins() {

		// Strings passed in from the config file.
		$strings = $this->strings;

		$plugin_slug = 'woocommerce';
		$plugin_file = 'woocommerce.php';
		$plugin_name = 'WooCommerce';

		// Text strings.
		$header    = ( is_plugin_active( $plugin_slug . '/' . $plugin_file ) ) ? $strings['plugins-header-success'] : $strings['plugins-header'];
		$paragraph = ( is_plugin_active( $plugin_slug . '/' . $plugin_file ) ) ? $strings['plugins-success%s'] : $strings['plugins'];
		$skip      = $strings['btn-skip'];
		$next      = $strings['btn-next'];
		$install   = $strings['btn-plugins-install'];
		?>

		<div class="ts_theme_setup__content--transition">

			<svg version="1.1" width="100" height="60" class="theme-icon icon" viewBox="0 0 256 153" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
				<path d="m23.759 0h208.38c13.187 0 23.863 10.675 23.863 23.863v79.542c0 13.187-10.675 23.863-23.863 23.863h-74.727l10.257 25.118-45.109-25.118h-98.695c-13.187 0-23.863-10.675-23.863-23.863v-79.542c-0.10466-13.083 10.571-23.863 23.758-23.863z" fill="#7f54b3"/>
				<path d="m14.578 21.75c1.4569-1.9772 3.6423-3.0179 6.5561-3.226 5.3073-0.41626 8.3252 2.0813 9.0537 7.4927 3.226 21.75 6.7642 40.169 10.511 55.259l22.79-43.395c2.0813-3.9545 4.6829-6.0358 7.8049-6.2439 4.5789-0.3122 7.3886 2.6016 8.5333 8.7415 2.6016 13.841 5.9317 25.6 9.8862 35.59 2.7057-26.433 7.2846-45.476 13.737-57.236 1.561-2.9138 3.8504-4.3707 6.8683-4.5789 2.3935-0.20813 4.5789 0.52033 6.5561 2.0813 1.9772 1.561 3.0179 3.5382 3.226 5.9317 0.10406 1.8732-0.20813 3.4341-1.0407 4.9951-4.0585 7.4927-7.3886 20.085-10.094 37.567-2.6016 16.963-3.5382 30.179-2.9138 39.649 0.20813 2.6016-0.20813 4.8911-1.2488 6.8683-1.2488 2.2894-3.122 3.5382-5.5154 3.7463-2.7057 0.20813-5.5154-1.0406-8.2211-3.8504-9.678-9.8862-17.379-24.663-22.998-44.332-6.7642 13.32-11.759 23.311-14.985 29.971-6.1398 11.759-11.343 17.795-15.714 18.107-2.8098 0.20813-5.2033-2.1854-7.2846-7.1805-5.3073-13.633-11.031-39.961-17.171-78.985-0.41626-2.7057 0.20813-5.0992 1.665-6.9724zm223.64 16.338c-3.7463-6.5561-9.2618-10.511-16.65-12.072-1.9772-0.41626-3.8504-0.62439-5.6195-0.62439-9.9902 0-18.107 5.2033-24.455 15.61-5.4114 8.8455-8.1171 18.628-8.1171 29.346 0 8.013 1.665 14.881 4.9951 20.605 3.7463 6.5561 9.2618 10.511 16.65 12.072 1.9772 0.41626 3.8504 0.62439 5.6195 0.62439 10.094 0 18.211-5.2033 24.455-15.61 5.4114-8.9496 8.1171-18.732 8.1171-29.45 0.10406-8.1171-1.665-14.881-4.9951-20.501zm-13.112 28.826c-1.4569 6.8683-4.0585 11.967-7.9089 15.402-3.0179 2.7057-5.8276 3.8504-8.4293 3.3301-2.4976-0.52033-4.5789-2.7057-6.1398-6.7642-1.2488-3.226-1.8732-6.452-1.8732-9.4699 0-2.6016 0.20813-5.2033 0.72846-7.5967 0.93659-4.2667 2.7057-8.4293 5.5154-12.384 3.4341-5.0992 7.0764-7.1805 10.823-6.452 2.4976 0.52033 4.5789 2.7057 6.1398 6.7642 1.2488 3.226 1.8732 6.452 1.8732 9.4699 0 2.7057-0.20813 5.3073-0.72846 7.7008zm-52.033-28.826c-3.7463-6.5561-9.3659-10.511-16.65-12.072-1.9772-0.41626-3.8504-0.62439-5.6195-0.62439-9.9902 0-18.107 5.2033-24.455 15.61-5.4114 8.8455-8.1171 18.628-8.1171 29.346 0 8.013 1.665 14.881 4.9951 20.605 3.7463 6.5561 9.2618 10.511 16.65 12.072 1.9772 0.41626 3.8504 0.62439 5.6195 0.62439 10.094 0 18.211-5.2033 24.455-15.61 5.4114-8.9496 8.1171-18.732 8.1171-29.45 0-8.1171-1.665-14.881-4.9951-20.501zm-13.216 28.826c-1.4569 6.8683-4.0585 11.967-7.9089 15.402-3.0179 2.7057-5.8276 3.8504-8.4293 3.3301-2.4976-0.52033-4.5789-2.7057-6.1398-6.7642-1.2488-3.226-1.8732-6.452-1.8732-9.4699 0-2.6016 0.20813-5.2033 0.72846-7.5967 0.93658-4.2667 2.7057-8.4293 5.5154-12.384 3.4341-5.0992 7.0764-7.1805 10.823-6.452 2.4976 0.52033 4.5789 2.7057 6.1398 6.7642 1.2488 3.226 1.8732 6.452 1.8732 9.4699 0.10406 2.7057-0.20813 5.3073-0.72846 7.7008z" fill="#fff"/>
			</svg>

			<svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
				<circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
			</svg>

			<h2><?php echo esc_html( $header ); ?></h2>

			<p id="plugin-text"><?php echo esc_html( $paragraph ); ?></p>

		</div>

		<form action="" method="post">

			<footer class="ts_theme_setup__content__footer">
				<?php if ( ! is_plugin_active( $plugin_slug . '/' . $plugin_file ) ) : ?>
					<a id="close" href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--skip ts_theme_setup__button--closer ts_theme_setup__button--proceed"><?php echo esc_html( $skip ); ?></a>
					<a id="skip" href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--skip ts_theme_setup__button--proceed"><?php echo esc_html( $skip ); ?></a>
					<?php $this->install_plugin_button( $plugin_slug, $plugin_file, $plugin_name, array(), _x( 'Next', 'Theme notification', 'organic-goodness' ), _x( 'Activate', 'Theme notification', 'organic-goodness' ), _x( 'Install', 'Theme notification', 'organic-goodness' ) ); ?>
				<?php else : ?>
					<a href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--next ts_theme_setup__button--proceed"><?php echo esc_html( $next ); ?></a>
				<?php endif; ?>
				<?php wp_nonce_field( 'ts_theme_setup' ); ?>

			</footer>
		</form>

		<?php
	}

	/**
	 * Page setup
	 */
	protected function content() {

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Text strings.
		$header    = $strings['import-header'];
		$paragraph = $strings['import'];
		$action    = $strings['import-action-link'];
		$skip      = $strings['btn-skip'];
		$next      = $strings['btn-next'];
		$import    = $strings['btn-import'];
		?>

		<div class="ts_theme_setup__content--transition">

			<svg width="44px" height="66px" viewBox="0 0 88 133" class="theme-icon icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="organic-goodness-logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<path d="M39.6981376,16.8894094 C36.1900905,21.4358588 33.2491854,25.2856748 30.2579692,29.0988258 C29.5947791,29.946702 29.0688008,30.5837549 30.0567253,31.6103725 C33.0433678,34.7223071 35.9476831,37.9167377 38.8840145,41.0745035 C39.1538643,40.8728464 39.4282878,40.6666063 39.6981376,40.4649493 C39.6981376,32.9257263 39.6981376,25.3865033 39.6981376,16.8894094 L39.6981376,16.8894094 Z M39.4374353,65.6537454 C42.0398848,51.9777324 36.96305,50.1444866 28.7166239,41.8811316 C23.6123469,36.7617929 22.9811728,36.8809539 19.2215709,43.2468996 C18.5629545,44.3651795 18.7596247,44.9609844 19.5874689,45.7813618 C26.1233219,52.284801 32.6271588,58.8249051 39.4374353,65.6537454 L39.4374353,65.6537454 Z M8.27664704,70.8693294 C8.18974627,89.1880372 20.4381817,103.963998 36.8944442,106.736782 C39.6478266,107.204259 40.5579979,106.127228 39.7484486,103.377359 C39.3688294,102.094087 38.3260201,101.342456 37.4524386,100.462498 C27.6646672,90.6271351 17.8540271,80.9109328 8.27664704,70.8693294 L8.27664704,70.8693294 Z M39.8719391,91.2091906 C39.8719391,87.5197836 39.6981376,84.9074085 39.9176764,82.3362814 C40.1920999,79.0914365 39.1492906,76.7173833 36.7572324,74.4304092 C30.1573473,68.1286271 23.809017,61.5610243 17.3600648,55.0988332 C13.5958892,51.3269301 13.5135621,51.2994314 11.5605816,56.4508519 C10.8333593,58.3665937 8.96727951,60.2594199 11.2770106,62.5463939 C20.5799672,71.7722029 29.8005967,81.0942574 39.8719391,91.2091906 L39.8719391,91.2091906 Z M48.0543331,17.9847737 C48.0543331,19.1947159 48.0543331,20.404658 48.0543331,21.6146002 C48.0543331,33.1457158 48.0497594,44.6768313 48.0497594,56.2079468 C48.0497594,72.2442637 48.1046441,88.2805806 47.9992411,104.312314 C47.9811535,107.025518 49.1748957,107.094265 51.2147771,106.709283 C70.5204701,103.079457 83.0661977,84.206192 78.9772876,64.8700328 C78.172312,61.066048 77.124929,57.3078943 75.2817178,53.888891 C68.1146908,40.6116089 57.5219438,29.8871215 48.0543331,17.9847737 L48.0543331,17.9847737 Z M39.8673654,122.731851 C39.8536442,115.925926 39.8536442,115.925926 33.2125956,114.376833 C7.2978699,108.331706 -6.45074736,81.5663182 2.9756998,55.5388122 C5.16651406,49.4891013 8.32695802,43.984781 12.251214,38.9066904 C21.3712216,27.1235036 30.4820818,15.3357336 39.6020894,3.55254682 C42.7305172,-0.48517686 45.1591652,-0.51725866 48.2327084,3.45630142 C57.4304693,15.3357336 66.6556725,27.1922503 75.7848276,39.1220968 C85.15639,51.3681782 90.013686,65.0716899 87.2099926,80.5488668 C83.9443529,98.5834215 69.4227762,112.218187 51.1278763,115.023052 C48.703802,115.394285 47.9171214,116.136749 48.0314645,118.487887 C48.1823974,121.613571 48.1046441,124.757587 48.0360382,127.887854 C47.9765798,130.605641 46.8971807,132.562631 43.8236375,132.498467 C40.9559119,132.438887 39.9725611,130.546061 39.8856603,127.997849 C39.8216282,126.242516 39.8673654,124.487183 39.8673654,122.731851 L39.8673654,122.731851 Z" id="organic-goodness" fill="#2d4b38"></path>
				</g>
			</svg>

			<svg class="icon icon--checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
				<circle class="icon--checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="icon--checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
			</svg>

			<h2><?php echo esc_html( $header ); ?></h2>

			<p><?php echo esc_html( $paragraph ); ?></p>

			<a id="ts_theme_setup__drawer-trigger" class="ts_theme_setup__button ts_theme_setup__button--knockout"><span><?php echo esc_html( $action ); ?></span><span class="chevron"></span></a>

		</div>

		<form action="" method="post">

			<ul class="ts_theme_setup__drawer ts_theme_setup__drawer--import-content js-ts_theme_setup-drawer-import-content">
				<?php

				$allowed_html_array = array(
					'li'    => array(
						'class'        => array(),
						'data-content' => array(),
					),
					'input' => array(
						'type'    => array(),
						'name'    => array(),
						'class'   => array(),
						'id'      => array(),
						'value'   => array(),
						'checked' => array(),
					),
					'label' => array(
						'for' => array(),
					),
					'i'     => array(),
					'span'  => array(),
				);

				echo wp_kses(
					$this->get_import_steps_html(
						array(
							'pages'      => esc_html_x( 'Pages', 'Theme setup', 'organic-goodness' ),
							'posts'      => esc_html_x( 'Posts', 'Theme setup', 'organic-goodness' ),
							'products'   => esc_html_x( 'Products', 'Theme setup', 'organic-goodness' ),
							'menus'      => esc_html_x( 'Menus', 'Theme setup', 'organic-goodness' ),
							'widgets'    => esc_html_x( 'Widgets', 'Theme setup', 'organic-goodness' ),
							'customizer' => esc_html_x( 'Customizer', 'Theme setup', 'organic-goodness' ),
						)
					),
					$allowed_html_array
				);
				?>
			</ul>

			<footer class="ts_theme_setup__content__footer">

				<a id="close" href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--skip ts_theme_setup__button--closer ts_theme_setup__button--proceed"><?php echo esc_html( $skip ); ?></a>

				<a id="skip" href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--skip ts_theme_setup__button--proceed"><?php echo esc_html( $skip ); ?></a>

				<a href="<?php echo esc_url( $this->step_next_link() ); ?>" class="ts_theme_setup__button ts_theme_setup__button--next button-next" data-callback="install_content">
					<span class="ts_theme_setup__button--loading__text"><?php echo esc_html( $import ); ?></span>
				</a>

				<?php wp_nonce_field( 'ts_theme_setup' ); ?>
			</footer>
		</form>

		<?php
	}


	/**
	 * Final step
	 */
	protected function ready() {

		// Author name.
		$author = $this->theme->author;

		// Theme Name.
		$theme = ucfirst( $this->theme );

		// Remove "Child" from the current theme name, if it's installed.
		$theme = str_replace( ' Child', '', $theme );

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Text strings.
		$header        = $strings['ready-header'];
		$paragraph     = $strings['ready%s'];
		$action        = $strings['ready-action-link'];
		$skip          = $strings['btn-skip'];
		$next          = $strings['btn-next'];
		$primary_btn   = $strings['ready-primary-button'];
		$secondary_btn = $strings['ready-secondary-button'];

		// Links.
		$links = array();

		for ( $i = 1; $i < 4; $i++ ) {
			if ( ! empty( $strings[ "ready-link-$i" ] ) ) {
				$links[] = $strings[ "ready-link-$i" ];
			}
		}

		$links_class = empty( $links ) ? 'ts_theme_setup__content__footer--nolinks' : null;

		$allowed_html_array = array(
			'a' => array(
				'href'   => array(),
				'title'  => array(),
				'target' => array(),
			),
		);

		update_option( 'ts_theme_setup_' . $this->slug . '_completed', time() );
		?>

		<div class="ts_theme_setup__content--transition">

			<svg width="44px" height="66px" viewBox="0 0 88 133" class="theme-icon icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				<g id="organic-goodness-logo" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<path d="M39.6981376,16.8894094 C36.1900905,21.4358588 33.2491854,25.2856748 30.2579692,29.0988258 C29.5947791,29.946702 29.0688008,30.5837549 30.0567253,31.6103725 C33.0433678,34.7223071 35.9476831,37.9167377 38.8840145,41.0745035 C39.1538643,40.8728464 39.4282878,40.6666063 39.6981376,40.4649493 C39.6981376,32.9257263 39.6981376,25.3865033 39.6981376,16.8894094 L39.6981376,16.8894094 Z M39.4374353,65.6537454 C42.0398848,51.9777324 36.96305,50.1444866 28.7166239,41.8811316 C23.6123469,36.7617929 22.9811728,36.8809539 19.2215709,43.2468996 C18.5629545,44.3651795 18.7596247,44.9609844 19.5874689,45.7813618 C26.1233219,52.284801 32.6271588,58.8249051 39.4374353,65.6537454 L39.4374353,65.6537454 Z M8.27664704,70.8693294 C8.18974627,89.1880372 20.4381817,103.963998 36.8944442,106.736782 C39.6478266,107.204259 40.5579979,106.127228 39.7484486,103.377359 C39.3688294,102.094087 38.3260201,101.342456 37.4524386,100.462498 C27.6646672,90.6271351 17.8540271,80.9109328 8.27664704,70.8693294 L8.27664704,70.8693294 Z M39.8719391,91.2091906 C39.8719391,87.5197836 39.6981376,84.9074085 39.9176764,82.3362814 C40.1920999,79.0914365 39.1492906,76.7173833 36.7572324,74.4304092 C30.1573473,68.1286271 23.809017,61.5610243 17.3600648,55.0988332 C13.5958892,51.3269301 13.5135621,51.2994314 11.5605816,56.4508519 C10.8333593,58.3665937 8.96727951,60.2594199 11.2770106,62.5463939 C20.5799672,71.7722029 29.8005967,81.0942574 39.8719391,91.2091906 L39.8719391,91.2091906 Z M48.0543331,17.9847737 C48.0543331,19.1947159 48.0543331,20.404658 48.0543331,21.6146002 C48.0543331,33.1457158 48.0497594,44.6768313 48.0497594,56.2079468 C48.0497594,72.2442637 48.1046441,88.2805806 47.9992411,104.312314 C47.9811535,107.025518 49.1748957,107.094265 51.2147771,106.709283 C70.5204701,103.079457 83.0661977,84.206192 78.9772876,64.8700328 C78.172312,61.066048 77.124929,57.3078943 75.2817178,53.888891 C68.1146908,40.6116089 57.5219438,29.8871215 48.0543331,17.9847737 L48.0543331,17.9847737 Z M39.8673654,122.731851 C39.8536442,115.925926 39.8536442,115.925926 33.2125956,114.376833 C7.2978699,108.331706 -6.45074736,81.5663182 2.9756998,55.5388122 C5.16651406,49.4891013 8.32695802,43.984781 12.251214,38.9066904 C21.3712216,27.1235036 30.4820818,15.3357336 39.6020894,3.55254682 C42.7305172,-0.48517686 45.1591652,-0.51725866 48.2327084,3.45630142 C57.4304693,15.3357336 66.6556725,27.1922503 75.7848276,39.1220968 C85.15639,51.3681782 90.013686,65.0716899 87.2099926,80.5488668 C83.9443529,98.5834215 69.4227762,112.218187 51.1278763,115.023052 C48.703802,115.394285 47.9171214,116.136749 48.0314645,118.487887 C48.1823974,121.613571 48.1046441,124.757587 48.0360382,127.887854 C47.9765798,130.605641 46.8971807,132.562631 43.8236375,132.498467 C40.9559119,132.438887 39.9725611,130.546061 39.8856603,127.997849 C39.8216282,126.242516 39.8673654,124.487183 39.8673654,122.731851 L39.8673654,122.731851 Z" id="organic-goodness" fill="#2d4b38"></path>
				</g>
			</svg>

			<h2><?php echo esc_html( sprintf( $header, $theme ) ); ?></h2>

			<p><?php printf( wp_kses_post( $paragraph ), wp_kses_post( $author ) ); ?></p>

		</div>

		<footer class="ts_theme_setup__content__footer ts_theme_setup__content__footer--fullwidth <?php echo esc_attr( $links_class ); ?>">

			<a href="<?php echo esc_url( $this->ready_primary_btn_url ); ?>" class="ts_theme_setup__button ts_theme_setup__button--fullwidth ts_theme_setup__button--primary ts_theme_setup__button--popin"><?php echo esc_html( $primary_btn ); ?></a>

			<a href="<?php echo esc_url( $this->ready_secondary_btn_url ); ?>" target="_blank" class="ts_theme_setup__button ts_theme_setup__button--fullwidth ts_theme_setup__button--secondary ts_theme_setup__button--popin"><?php echo esc_html( $secondary_btn ); ?></a>

			<?php if ( ! empty( $links ) ) : ?>
				<a id="ts_theme_setup__drawer-trigger" class="ts_theme_setup__button ts_theme_setup__button--knockout"><span><?php echo esc_html( $action ); ?></span><span class="chevron"></span></a>

				<ul class="ts_theme_setup__drawer ts_theme_setup__drawer--extras">

					<?php foreach ( $links as $link ) : ?>
						<li><?php echo wp_kses( $link, $allowed_html_array ); ?></li>
					<?php endforeach; ?>

				</ul>
			<?php endif; ?>

		</footer>

		<?php
	}

	/**
	 * Generate the child theme via AJAX.
	 */
	public function generate_child() {

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Text strings.
		$success = $strings['child-json-success%s'];
		$already = $strings['child-json-already%s'];
		$error   = $strings['child-json-error%s'];

		$name = $this->theme . ' Child';
		$slug = sanitize_title( $name );

		$path = get_theme_root() . '/' . $slug;

		if ( ! file_exists( $path ) ) {

			WP_Filesystem();

			global $wp_filesystem;

			$created_dir = $wp_filesystem->mkdir( $path );

			if ( $created_dir ) {

				$wp_filesystem->put_contents( $path . '/style.css', $this->generate_child_style_css( $this->theme->template, $this->theme->description, $this->theme->tags, $this->theme->name, $this->theme->author, $this->theme->version ) );
				$wp_filesystem->put_contents( $path . '/functions.php', $this->generate_child_functions_php( $this->theme->template ) );

				$this->generate_child_screenshot( $path );
				$this->generate_child_theme_json( $path );

				$allowed_themes          = get_option( 'allowedthemes' );
				$allowed_themes[ $slug ] = true;
				update_option( 'allowedthemes', $allowed_themes );

			} else {
				wp_send_json(
					array(
						'error' => sprintf(
							esc_html( $error ),
							$slug
						),
					)
				);
			}
		} else {

			if ( $this->theme->template !== $slug ) :
				update_option( 'ts_theme_setup_' . $this->slug . '_child', $name );
				switch_theme( $slug );
					endif;

			wp_send_json(
				array(
					'done'    => 1,
					'message' => sprintf(
						esc_html( $success ),
						$slug
					),
				)
			);
		}

		if ( $this->theme->template !== $slug ) :
			update_option( 'ts_theme_setup_' . $this->slug . '_child', $name );
			switch_theme( $slug );
		endif;

		wp_send_json(
			array(
				'done'    => 1,
				'message' => sprintf(
					esc_html( $already ),
					$name
				),
			)
		);
	}

	/**
	 * Content template for the child theme functions.php file.
	 *
	 * @link https://gist.github.com/richtabor/688327dd103b1aa826ebae47e99a0fbe
	 *
	 * @param string $slug Parent theme slug.
	 */
	public function generate_child_functions_php( $slug ) {

		$slug_no_hyphens = strtolower( preg_replace( '#[^a-zA-Z]#', '', $slug ) );

		$output = "
			<?php
			/**
			 * Organic Goodness Child Theme functions and definitions.
			 */

			/*
			 * Load parent and child styles.
			 */
			function {$slug_no_hyphens}_child_enqueue_styles() {
			    wp_enqueue_style( '{$slug}-style', get_template_directory_uri() . '/style.css' );
			    wp_enqueue_style( '{$slug}-main', get_template_directory_uri() . '/assets/css/styles.css' );
			    wp_enqueue_style( '{$slug}-child-style',
			        get_stylesheet_directory_uri() . '/style.css',
			        array( '{$slug}-main' ),
			        wp_get_theme()->get('Version')
			    );
			}
			add_action(  'wp_enqueue_scripts', '{$slug_no_hyphens}_child_enqueue_styles', 101 );\n\n
		";

		// Let's remove the tabs so that it displays nicely.
		$output = trim( preg_replace( '/\t+/', '', $output ) );

		// Filterable return.
		return apply_filters( 'ts_theme_setup_generate_child_functions_php', $output, $slug );
	}

	/**
	 * Content template for the child theme functions.php file.
	 *
	 * @link https://gist.github.com/richtabor/7d88d279706fc3093911e958fd1fd791
	 *
	 * @param string $slug    Parent theme slug.
	 * @param string $description Parent theme description.
	 * @param string $tags Parent theme tags.
	 * @param string $parent  Parent theme name.
	 * @param string $author  Parent theme author.
	 * @param string $version Parent theme version.
	 */
	public function generate_child_style_css( $slug, $description, $tags, $parent, $author, $version ) {

		$output = "
			/**
			* Theme Name: {$parent} Child
			* Author: {$author}
			* Description: {$description}
			* Tags: " . implode( ', ', $tags ) . "
			* Template: {$slug}
			* Version: {$version}
			* License: GNU General Public License v2 or later
			* License URI: http://www.gnu.org/licenses/gpl-2.0.html
			* Text Domain: {$slug}
			*/\n
		";

		// Let's remove the tabs so that it displays nicely.
		$output = trim( preg_replace( '/\t+/', '', $output ) );

		return apply_filters( 'ts_theme_setup_generate_child_style_css', $output, $slug, $description, $tags, $parent, $author, $version );
	}

	/**
	 * Generate child theme screenshot file.
	 *
	 * @param string $path    Child theme path.
	 */
	public function generate_child_screenshot( $path ) {

		$screenshot = apply_filters( 'ts_theme_setup_generate_child_screenshot', '' );

		if ( ! empty( $screenshot ) ) {
			// Get custom screenshot file extension.
			if ( '.png' === substr( $screenshot, -4 ) ) {
				$screenshot_ext = 'png';
			} else {
				$screenshot_ext = 'jpg';
			}
		} else {
			if ( file_exists( $this->base_path . '/screenshot.png' ) ) {
				$screenshot     = $this->base_path . '/screenshot.png';
				$screenshot_ext = 'png';
			} elseif ( file_exists( $this->base_path . '/screenshot.jpg' ) ) {
				$screenshot     = $this->base_path . '/screenshot.jpg';
				$screenshot_ext = 'jpg';
			}
		}

		if ( ! empty( $screenshot ) && file_exists( $screenshot ) ) {
			$copied = copy( $screenshot, $path . '/screenshot.' . $screenshot_ext );
		}
	}

	/**
	 * Generate child theme theme.json file.
	 *
	 * @param string $path    Child theme path.
	 */
	public function generate_child_theme_json( $path ) {

		$theme_json = apply_filters( 'ts_theme_setup_generate_child_theme_json', '' );

		if ( empty( $theme_json ) && file_exists( $this->base_path . '/theme.json' ) ) {
			$theme_json     = $this->base_path . '/theme.json';
			$theme_json_ext = 'json';
		}

		if ( ! empty( $theme_json ) && file_exists( $theme_json ) ) {
			$copied = copy( $theme_json, $path . '/theme.' . $theme_json_ext );
		}
	}

	/**
	 * Do content's AJAX
	 *
	 * @internal    Used as a callback.
	 */
	public function ajax_content() {

		if ( ! check_ajax_referer( 'ts_theme_setup_nonce', 'wpnonce' ) || empty( $_POST['content'] ) && isset( $content[ $_POST['content'] ] ) ) {
			return;
		}

		$content = isset( $_POST['content'] ) ? sanitize_text_field( wp_unslash( $_POST['content'] ) ) : '';

		if ( ! isset( $content ) || empty( $content ) ) {
			exit();
		}

		switch ( $content ) {
			case 'pages':
				$this->import_pages();
				break;
			case 'posts':
				$this->import_posts();
				break;
			case 'products':
				$this->import_products();
				break;
			case 'menus':
				$this->import_menus();
				break;
			case 'widgets':
				$this->import_widgets();
				break;
			case 'customizer':
				$this->import_customizer();
				break;
			default:
				break;
		}

		exit();
	}

	/**
	 * Import attachments set in config file.
	 *
	 * @param string $category The category of images to import.
	 *
	 * @return array The attachments array.
	 */
	public function import_attachments( $category = '' ) {
		$attachments    = $this->import_attachments[ $category ];
		$attachment_ids = array();

		if ( empty( $attachments ) ) {
			return;
		}

		// Get the path to the upload directory.
		$upload_dir = wp_upload_dir();

		// Insert pages.
		foreach ( $attachments as $attachment => $attachment_config ) {

			$existing_attachment = get_posts( 'post_type=attachment&name=' . $attachment . '&posts_per_page=1&post_status=inherit' );

			if ( $existing_attachment ) {
				$existing_attachment           = array_pop( $existing_attachment );
				$attachment_ids[ $attachment ] = $existing_attachment->ID;
				continue;
			}

			$source   = get_parent_theme_file_path( $attachment_config['file'] );
			$filename = $upload_dir['basedir'] . '/' . $attachment . '.' . $attachment_config['type'];

			if ( ! file_exists( $filename ) ) {
				copy( $source, $filename ); // @codingStandardsIgnoreLine.
			}

			$filetype          = wp_check_filetype( basename( $filename ), null );
			$attachment_config = array(
				'guid'           => $upload_dir['url'] . '/' . basename( $filename ),
				'post_mime_type' => $filetype['type'],
				'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
				'post_content'   => '',
				'post_status'    => 'inherit',
			);

			$attach_id = wp_insert_attachment( $attachment_config, $filename );

			$attachment_ids[ $attachment ] = $attach_id;

			// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
			require_once ABSPATH . 'wp-admin/includes/image.php';

			// Generate the metadata for the attachment, and update the database record.
			$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			wp_update_attachment_metadata( $attach_id, $attach_data );
		}

		return $attachment_ids;
	}

	/**
	 * Import pages set in config file.
	 */
	public function import_pages() {
		$pages = $this->import_pages;

		if ( empty( $pages ) ) {
			return;
		}

		$attachments = $this->import_attachments( 'pages' );

		// Insert pages.
		foreach ( $pages as $page => $page_config ) {
			$page_id = wp_insert_post( $page_config );
			if ( isset( $page_config['thumbnail'] ) ) {
				set_post_thumbnail( $page_id, $attachments[ $page_config['thumbnail'] ] );
			}
		}

		// Set Homepage and Articles Page.
		$homepage = get_page_by_title( $pages['frontpage']['post_title'] );
		$blogpage = get_page_by_title( $pages['blog']['post_title'] );
		if ( ( isset( $homepage ) && $homepage->ID ) && ( isset( $blogpage ) && $blogpage->ID ) ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $homepage->ID );
			update_option( 'page_for_posts', $blogpage->ID );
		}
	}

	/**
	 * Import posts set in config file.
	 */
	public function import_posts() {
		$posts = $this->import_posts;

		if ( empty( $posts ) ) {
			return;
		}

		$attachments = $this->import_attachments( 'posts' );

		// Insert posts.
		foreach ( $posts as $post => $post_config ) {
			$post_id = wp_insert_post( $post_config );
			if ( isset( $post_config['thumbnail'] ) ) {
				set_post_thumbnail( $post_id, $attachments[ $post_config['thumbnail'] ] );
			}

			if ( isset( $post_config['taxonomy'] ) ) {
				$terms = array();

				foreach ( $post_config['taxonomy'] as $taxonomy => $taxonomy_terms ) {

					foreach ( $taxonomy_terms as $taxonomy_item ) {

						$term = term_exists( $taxonomy_item['term'], $taxonomy );
						$term = ( isset( $term ) && ! empty( $term ) ) ? $term : wp_insert_term( $taxonomy_item['term'], $taxonomy, array( 'slug' => $taxonomy_item['slug'] ) );

						if ( is_array( $term ) && isset( $term['term_id'] ) ) {
							$terms[] = $term['term_id'];
						}
					}

					wp_set_post_terms( $post_id, $terms, $taxonomy, true );
				}
			}
		}

		// Change "Hello World" post date.
		$posts = get_posts(
			array(
				'name'           => 'hello-world',
				'posts_per_page' => 1,
				'post_type'      => 'post',
				'post_status'    => 'publish',
			)
		);

		if ( is_array( $posts ) && isset( $posts[0] ) ) {
			wp_update_post(
				array(
					'ID'        => $posts[0]->ID,
					'post_date' => '2021-12-20 18:57:33',
				)
			);
		}
	}

	/**
	 * Import products set in config file.
	 */
	public function import_products() {
		$products = $this->import_products;

		if ( empty( $products ) ) {
			return;
		}

		$attachments = $this->import_attachments( 'products' );

		// Insert products.
		foreach ( $products as $product => $product_config ) {
			$product_id = wp_insert_post( $product_config );
			set_post_thumbnail( $product_id, $attachments[ $product_config['thumbnail'] ] );

			// Add product taxonomies.
			if ( isset( $product_config['taxonomy'] ) && ! empty( $product_config['taxonomy'] ) ) {
				foreach ( $product_config['taxonomy'] as $taxonomy_slug => $taxonomy_items ) {

					if ( ! empty( $taxonomy_items ) ) {
						$taxonomy_ids = array();

						foreach ( $taxonomy_items as $taxonomy ) {
							// Check if the term already exists.
							$taxonomy_exists = term_exists( $taxonomy['term'], $taxonomy_slug );

							if ( $taxonomy_exists ) {
								$taxonomy_ids[] = (int) $taxonomy_exists['term_id'];

								continue;
							}

							$taxonomy_args = array(
								'slug' => $taxonomy['slug'],
							);

							if ( isset( $taxonomy['description'] ) ) {
								$taxonomy_args['description'] = $taxonomy['description'];
							}

							// Create new taxonomy.
							$created_taxonomy = wp_insert_term(
								$taxonomy['term'],
								$taxonomy_slug,
								$taxonomy_args
							);

							if ( ! is_wp_error( $created_taxonomy ) ) {
								$taxonomy_ids[] = $created_taxonomy['term_id'];

								if ( isset( $taxonomy['thumbnail'] ) ) {
									update_term_meta( $created_taxonomy['term_id'], 'thumbnail_id', $attachments[ $taxonomy['thumbnail'] ] );
								}
							}
						}

						wp_set_object_terms( $product_id, $taxonomy_ids, $taxonomy_slug );
					}
				}
			}

			// Set product type.
			if ( ! empty( $product_config['product_type'] ) ) {
				switch ( $product_config['product_type'] ) {
					case 'variable':
						wp_set_object_terms( $product_id, 'variable', 'product_type' );

						if ( ! empty( $product_data['custom'] ) ) {
							foreach ( $product_data['custom'] as $attribute => $attribute_config ) {
								$attribute_values = explode( '|', $attribute_config['value'] );
								if ( is_array( $attribute_values ) ) {
									foreach ( $attribute_values as $value ) {
										$variation = array(
											'post_title'   => $product_config['post_title'] . '(' . $value . ' variation)',
											'post_content' => '',
											'post_status'  => 'publish',
											'post_parent'  => $product_id,
											'post_type'    => 'product_variation',
										);

										$variation_id = wp_insert_post( $variation );

										update_post_meta( $variation_id, '_regular_price', $product_data['regular_price'] );
										update_post_meta( $variation_id, '_price', $product_data['price'] );
										update_post_meta( $variation_id, 'attribute_' . $attribute, $value );
									}
								}
							}
						}
						break;
					case 'external':
						wp_set_object_terms( $product_id, 'external', 'product_type' );
						break;
					case 'grouped':
						wp_set_object_terms( $product_id, 'grouped', 'product_type' );
						break;
					default:
						break;
				}
			}

			// Add product data.
			$product_data = $product_config['product_data'];
			$product_obj  = function_exists( 'wc_get_product' ) ? wc_get_product( $product_id ) : null;

			if ( ! $product_obj ) {
				continue;
			}

			// Set visibility.
			$product_obj->set_catalog_visibility( 'visible' );

			// Set regular price.
			if ( ! empty( $product_data['regular_price'] ) ) {
				$product_obj->set_regular_price( floatval( $product_data['regular_price'] ) );
			}

			// Set price.
			if ( ! empty( $product_data['price'] ) ) {
				$product_obj->set_price( floatval( $product_data['price'] ) );
			}

			// Set sale price.
			if ( ! empty( $product_data['sale_price'] ) ) {
				$product_obj->set_sale_price( floatval( $product_data['sale_price'] ) );
			}

			// Set price.
			if ( ! empty( $product_data['stock_status'] ) ) {
				$product_obj->set_stock_status( strval( $product_data['stock_status'] ) );
			}

			// Set weight.
			if ( ! empty( $product_data['weight'] ) ) {
				$product_obj->set_weight( strval( $product_data['weight'] ) );
			}

			// Set width.
			if ( ! empty( $product_data['width'] ) ) {
				$product_obj->set_width( strval( $product_data['width'] ) );
			}

			// Set height.
			if ( ! empty( $product_data['height'] ) ) {
				$product_obj->set_height( strval( $product_data['height'] ) );
			}

			// Set featured.
			if ( ! empty( $product_data['featured'] ) ) {
				$product_obj->set_featured( true );
			} else {
				$product_obj->set_featured( false );
			}

			// Set external product URL.
			if ( ! empty( $product_config['product_type'] ) && ( 'external' === $product_config['product_type'] ) ) {
				$product_obj->set_product_url( 'https://woocommerce.com/products/organic-goodness/' );
				$product_obj->set_button_text( 'Buy on WooCommerce.com' );
			}

			// Set grouped product children.
			if ( ! empty( $product_config['product_type'] ) && ( 'grouped' === $product_config['product_type'] ) && ! empty( $product_config['product_children'] ) ) {
				$children = array();
				foreach ( $product_config['product_children'] as $child_slug ) {
					$product = get_page_by_path( $child_slug, OBJECT, 'product' );
					if ( ! empty( $product ) ) {
						$product_object = wc_get_product( $product );
						$children[]     = $product_object->get_id();
					}
				}
				$product_obj->set_children( $children );
			}

			// Set custom attributes.
			if ( ! empty( $product_data['custom'] ) ) {
				update_post_meta( $product_id, '_product_attributes', $product_data['custom'] );
			}

			// Save.
			$product_obj->save();
		}
	}

	/**
	 * Import widgets set in config file.
	 */
	public function import_widgets() {
		$widgets = $this->import_widgets;

		if ( empty( $widgets ) ) {
			return;
		}

		foreach ( $widgets as $sidebar => $area_widgets ) {

			foreach ( $area_widgets as $widget_id => $widget_options ) {

				// Retrieve sidebars, widgets and their instances.
				$sidebars_widgets = get_option( 'sidebars_widgets', array() );
				$widget_instances = get_option( 'widget_block', array() );

				// Retrieve the key of the next widget instance.
				$numeric_keys = array_filter( array_keys( $widget_instances ), 'is_int' );
				$next_key     = $numeric_keys ? max( $numeric_keys ) + 1 : 2;

				// Add this widget to the sidebar.
				if ( ! isset( $sidebars_widgets[ $sidebar ] ) ) {
					$sidebars_widgets[ $sidebar ] = array();
				}

				$sidebars_widgets[ $sidebar ][] = 'block-' . $next_key;

				// Add the new widget instance.
				$widget_instances[ $next_key ] = $widget_options;

				// Store updated sidebars, widgets and their instances.
				update_option( 'sidebars_widgets', $sidebars_widgets );
				update_option( 'widget_block', $widget_instances );
			}
		}
	}

	/**
	 * Import menus set in config file.
	 */
	public function import_menus() {
		$menus     = $this->import_menus;
		$locations = get_theme_mod( 'nav_menu_locations' );

		if ( empty( $menus ) ) {
			return;
		}

		foreach ( $menus as $menu => $menu_settings ) {

			// Check if the menu exists.
			$menu_location = $menu;
			$menu_name     = $menu_settings['name'];
			$menu_exists   = wp_get_nav_menu_object( $menu_name );

			// If it doesn't exist, let's create it.
			if ( ! $menu_exists ) {
				$menu_id = wp_create_nav_menu( $menu_name );

				$menu_items = $menu_settings['items'];
				$menu_ids   = array();

				foreach ( $menu_items as $menu_item => $item_settings ) {
					if ( isset( $item_settings['menu-item-parent'] ) ) {
						$item_settings['menu-item-parent-id'] = $menu_ids[ $item_settings['menu-item-parent'] ];
					}

					switch ( $item_settings['menu-item-classes'] ) {
						case 'shop':
							if ( get_option( 'woocommerce_shop_page_id' ) ) {
								$item_settings['menu-item-url'] = get_permalink( get_option( 'woocommerce_shop_page_id' ) );
							} else {
								$item_settings['menu-item-url'] = home_url( '/?post_type=product' );
							}
							break;
						case 'blog':
							if ( 'page' === get_option( 'show_on_front' ) ) {
								if ( get_option( 'page_for_posts' ) ) {
									$item_settings['menu-item-url'] = get_permalink( get_option( 'page_for_posts' ) );
								} else {
									$item_settings['menu-item-url'] = home_url( '/?post_type=post' );
								}
							} else {
								$item_settings['menu-item-url'] = home_url( '/' );
							}
							break;
						case 'product':
							if ( isset( $item_settings['menu-item-path'] ) && organic_goodness_is_wc_active() ) {
								$product                        = get_page_by_path( $item_settings['menu-item-path'], OBJECT, 'product' );
								$page_url                       = isset( $product->ID ) ? get_permalink( $product->ID ) : '';
								$item_settings['menu-item-url'] = ( isset( $page_url ) && ! empty( $page_url ) ) ? $page_url : home_url( '/' );
							} else {
								$item_settings['menu-item-url'] = home_url( '/' );
							}
							break;
						case 'category':
							if ( isset( $item_settings['menu-item-path'] ) && organic_goodness_is_wc_active() ) {
								$product_categories = get_terms(
									array(
										'taxonomy' => 'product_cat',
										'orderby'  => 'name',
										'order'    => 'asc',
									)
								);
								if ( is_array( $product_categories ) && ! empty( $product_categories ) ) {
									$found_key                      = array_search( $item_settings['menu-item-path'], array_column( $product_categories, 'slug' ), true );
									$page_url                       = isset( $product_categories[ $found_key ]->term_id ) ? get_term_link( $product_categories[ $found_key ]->term_id ) : '';
									$item_settings['menu-item-url'] = ( isset( $page_url ) && ! empty( $page_url ) ) ? $page_url : home_url( '/' );
								} else {
									$item_settings['menu-item-url'] = home_url( '/' );
								}
							} else {
								$item_settings['menu-item-url'] = home_url( '/' );
							}
							break;
						default:
							if ( isset( $item_settings['menu-item-path'] ) ) {
								$page                           = get_page_by_path( $item_settings['menu-item-path'] );
								$page_url                       = isset( $page->ID ) ? get_permalink( $page->ID ) : '';
								$item_settings['menu-item-url'] = ( isset( $page_url ) && ! empty( $page_url ) ) ? $page_url : home_url( '/' );
							}
							break;
					}

					$menu_ids[ $menu_item ] = wp_update_nav_menu_item( $menu_id, 0, $item_settings );
				}
			}

			if ( isset( $menu_id ) ) {
				$locations[ $menu_location ] = $menu_id;
			}
		}

		set_theme_mod( 'nav_menu_locations', $locations );
	}

	/**
	 * Import customizer options set in config file.
	 */
	public function import_customizer() {
		$customizer = $this->import_customizer;

		if ( empty( $customizer ) ) {
			return;
		}

		$attachments = $this->import_attachments( 'customizer' );

		foreach ( $customizer as $option_type => $options ) {
			switch ( $option_type ) {
				case 'theme_mods':
					foreach ( $options as $option => $value ) {

						if ( 'site_icon' === $option ) {
							update_option( $option, $attachments[ $value ] );
						} elseif ( 'custom_logo' === $option ) {
							set_theme_mod( $option, $attachments[ $value ] );
						} elseif ( 'footer_image' === $option ) {
							set_theme_mod( $option, $attachments[ $value ] );
						} else {
							set_theme_mod( $option, $value );
						}
					}
					break;
				case 'options':
					foreach ( $options as $option => $value ) {
						update_option( $option, $value );
					}
					break;
				default:
					break;
			}
		}
	}

	/**
	 * Get the import steps HTML output.
	 *
	 * @param array $import_info The import info to prepare the HTML for.
	 *
	 * @return string
	 */
	public function get_import_steps_html( $import_info ) {
		ob_start();
		?>
			<?php foreach ( $import_info as $slug => $title ) : ?>

				<li class="ts_theme_setup__drawer--import-content__list-item status status--Pending" data-content="<?php echo esc_attr( $slug ); ?>">
					<input type="checkbox" name="default_content[<?php echo esc_attr( $slug ); ?>]" class="checkbox checkbox-<?php echo esc_attr( $slug ); ?>" id="default_content_<?php echo esc_attr( $slug ); ?>" value="1" checked>
					<label for="default_content_<?php echo esc_attr( $slug ); ?>">
						<i></i><span><?php echo esc_html( $title ); ?></span>
					</label>
				</li>

			<?php endforeach; ?>
		<?php

		return ob_get_clean();
	}

	/**
	 * AJAX call for activating plugin.
	 */
	public function activate_plugin() {

		if ( ! check_ajax_referer( 'ts_theme_setup_nonce', 'wpnonce' ) || empty( $_POST['plugin'] ) && isset( $content[ $_POST['plugin'] ] ) ) {
			return;
		}

		// Strings passed in from the config file.
		$strings = $this->strings;

		// Activation flag.
		$not_activated = true;

		$slug        = sanitize_title( $this->theme );
		$all_plugins = get_plugins();
		$plugin      = isset( $_POST['plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) : '';

		if ( array_key_exists( $plugin . '/' . $plugin . '.php', $all_plugins ) ) {
			$not_activated = activate_plugin( $plugin . '/' . $plugin . '.php' );
		}

		if ( $not_activated ) {
			wp_send_json(
				array(
					'error' => sprintf(
						esc_html( $strings['plugins-activate-error%s'] ),
						$slug
					),
				)
			);
		} else {
			wp_send_json(
				array(
					'done'    => 1,
					'message' => sprintf(
						esc_html( $strings['plugins-success%s'] ),
						$slug
					),
				)
			);
		}
	}

	/**
	 * Output a button that will install or activate a plugin if it doesn't exist, or display a disabled button if the
	 * plugin is already activated.
	 *
	 * @param string $plugin_slug The plugin slug.
	 * @param string $plugin_file The plugin file.
	 * @param string $plugin_name The plugin name.
	 * @param string $classes CSS classes.
	 * @param string $activated Button activated text.
	 * @param string $activate Button activate text.
	 * @param string $install Button install text.
	 */
	public function install_plugin_button( $plugin_slug, $plugin_file, $plugin_name, $classes = array(), $activated = '', $activate = '', $install = '' ) {
		if ( current_user_can( 'install_plugins' ) && current_user_can( 'activate_plugins' ) ) {
			if ( is_plugin_active( $plugin_slug . '/' . $plugin_file ) ) {
				// The plugin is already active.
				$button = array(
					'message' => esc_attr_x( 'Next', 'Theme notification', 'organic-goodness' ),
					'url'     => $this->step_next_link(),
					'classes' => array( 'organic-goodness-button', 'ts_theme_setup__button', 'ts_theme_setup__button--next', 'ts_theme_setup__button--proceed' ),
				);

				if ( '' !== $activated ) {
					$button['message'] = esc_attr( $activated );
				}
			} elseif ( self::is_plugin_installed( $plugin_slug ) ) {
				$url = self::is_plugin_installed( $plugin_slug );

				// The plugin exists but isn't activated yet.
				$button = array(
					'message' => esc_attr_x( 'Activate', 'Theme notification', 'organic-goodness' ),
					'url'     => $url,
					'classes' => array( 'activate-now', 'ts_theme_setup__button', 'ts_theme_setup__button--next', 'button-next' ),
				);

				if ( '' !== $activate ) {
					$button['message'] = esc_attr( $activate );
				}
			} else {
				// The plugin doesn't exist.
				$url    = wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'install-plugin',
							'plugin' => $plugin_slug,
						),
						self_admin_url( 'themes.php?page=organic-goodness-setup&step=plugins' )
					),
					'install-plugin_' . $plugin_slug
				);
				$button = array(
					'message' => esc_attr_x( 'Install', 'Theme notification', 'organic-goodness' ),
					'url'     => $url,
					'classes' => array( 'organic-goodness-install-now', 'install-now', 'install-' . $plugin_slug, 'ts_theme_setup__button', 'ts_theme_setup__button--next', 'button-next' ),
				);

				if ( '' !== $install ) {
					$button['message'] = esc_attr( $install );
				}
			}

			if ( ! empty( $classes ) ) {
				$button['classes'] = array_merge( $button['classes'], $classes );
			}

			$button['classes'] = implode( ' ', $button['classes'] );

			?>
			<span class="plugin-card-<?php echo esc_attr( $plugin_slug ); ?>">
				<a href="<?php echo esc_url( $button['url'] ); ?>" class="<?php echo esc_attr( $button['classes'] ); ?>" data-originaltext="<?php echo esc_attr( $button['message'] ); ?>" data-name="<?php echo esc_attr( $plugin_name ); ?>" data-slug="<?php echo esc_attr( $plugin_slug ); ?>" data-callback="install_plugins" aria-label="<?php echo esc_attr( $button['message'] ); ?>">
					<span class="ts_theme_setup__button--loading__text"><?php echo esc_html( $button['message'] ); ?></span>
				</a>
			</span>
			<?php
		}
	}

	/**
	 * Check if a plugin is installed and return the url to activate it if so.
	 *
	 * @param string $plugin_slug The plugin slug.
	 */
	private static function is_plugin_installed( $plugin_slug ) {
		if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin_slug ) ) {
			$plugins = get_plugins( '/' . $plugin_slug );
			if ( ! empty( $plugins ) ) {
				$keys        = array_keys( $plugins );
				$plugin_file = $plugin_slug . '/' . $keys[0];
				$url         = wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'activate',
							'plugin' => $plugin_file,
						),
						admin_url( 'themes.php?page=organic-goodness-setup&step=plugins' )
					),
					'activate-plugin_' . $plugin_file
				);
				return $url;
			}
		}
		return false;
	}
}
