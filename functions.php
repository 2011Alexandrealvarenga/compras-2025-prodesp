<?php
if ( ! class_exists( 'Prodesp_Theme_Setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0.0
	 */
	class Prodesp_Theme_Setup {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since 1.0.0
		 * @var   object
		 */
		private static $instance = null;

		/**f
		 * True if the page is a blog or archive.
		 *
		 * @since 1.0.0
		 * @var   Boolean
		 */
		private $is_blog = false;

		/**
		 * Sidebar position.
		 *
		 * @since 1.0.0
		 * @var   String
		 */
		public $sidebar_position = 'none';

		/**
		 * Loaded modules
		 *
		 * @var array
		 */
		public $modules = array();

		/**
		 * Theme version
		 *
		 * @var string
		 */
		public $version;

		/**
		 * Sets up needed actions/filters for the theme to initialize.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			$template      = get_template();
			$theme_obj     = wp_get_theme( $template );
			$this->version = $theme_obj->get( 'Version' );

			// Load the theme modules.
			add_action( 'after_setup_theme', array( $this, 'Prodesp_framework_loader' ), -20 );

			// Initialization of customizer.
			add_action( 'after_setup_theme', array( $this, 'Prodesp_customizer' ) );

			// Initialization of breadcrumbs module
			add_action( 'wp_head', array( $this, 'Prodesp_breadcrumbs' ) );

			// Language functions and translations setup.
			add_action( 'after_setup_theme', array( $this, 'l10n' ), 2 );

			// Handle theme supported features.
			add_action( 'after_setup_theme', array( $this, 'theme_support' ), 3 );

			// Load the theme includes.
			add_action( 'after_setup_theme', array( $this, 'includes' ), 4 );

			// Load theme modules.
			add_action( 'after_setup_theme', array( $this, 'load_modules' ), 5 );

			// Init properties.
			add_action( 'wp_head', array( $this, 'Prodesp_init_properties' ) );

			// Register public assets.
			add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ), 9 );

			// Enqueue scripts.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 10 );

			// Enqueue styles.
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 10 );

			// Maybe register Elementor Pro locations.
			add_action( 'elementor/theme/register_locations', array( $this, 'elementor_locations' ) );

		}

		/**
		 * Retuns theme version
		 *
		 * @return string
		 */
		public function version() {
			return apply_filters( 'Prodesp-theme/version', $this->version );
		}

		/**
		 * Load the theme modules.
		 *
		 * @since  1.0.0
		 */
		public function Prodesp_framework_loader() {

			require get_theme_file_path( 'framework/loader.php' );

			new Prodesp_CX_Loader(
				array(
					get_theme_file_path( 'framework/modules/customizer/cherry-x-customizer.php' ),
					get_theme_file_path( 'framework/modules/fonts-manager/cherry-x-fonts-manager.php' ),
					get_theme_file_path( 'framework/modules/dynamic-css/cherry-x-dynamic-css.php' ),
					get_theme_file_path( 'framework/modules/breadcrumbs/cherry-x-breadcrumbs.php' ),
				)
			);

		}

		/**
		 * Run initialization of customizer.
		 *
		 * @since 1.0.0
		 */
		public function Prodesp_customizer() {

			$this->customizer = new CX_Customizer( Prodesp_get_customizer_options() );
			$this->dynamic_css = new CX_Dynamic_CSS( Prodesp_get_dynamic_css_options() );

		}

		/**
		 * Run initialization of breadcrumbs.
		 *
		 * @since 1.0.0
		 */
		public function Prodesp_breadcrumbs() {

			$this->breadcrumbs = new CX_Breadcrumbs( Prodesp_get_breadcrumbs_options() );

		}

		/**
		 * Run init init properties.
		 *
		 * @since 1.0.0
		 */
		public function Prodesp_init_properties() {

			$this->is_blog = is_home() || ( is_archive() && ! is_tax() && ! is_post_type_archive() ) ? true : false;

			// Blog list properties init
			if ( $this->is_blog ) {
				$this->sidebar_position = Prodesp_Theme()->customizer->get_value( 'blog_sidebar_position' );
			}

			// Single blog properties init
			if ( is_singular( 'post' ) ) {
				$this->sidebar_position = Prodesp_Theme()->customizer->get_value( 'single_sidebar_position' );
			}

		}

		/**
		 * Loads the theme translation file.
		 *
		 * @since 1.0.0
		 */
		public function l10n() {

			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 */
			load_theme_textdomain( 'Prodesp', get_theme_file_path( 'languages' ) );

		}

		/**
		 * Adds theme supported features.
		 *
		 * @since 1.0.0
		 */
		public function theme_support() {

			global $content_width;

			if ( ! isset( $content_width ) ) {
				$content_width = 1200;
			}

			// Add support for core custom logo.
			add_theme_support( 'custom-logo', array(
				'height'      => 35,
				'width'       => 135,
				'flex-width'  => true,
				'flex-height' => true
			) );

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Enable HTML5 markup structure.
			add_theme_support( 'html5', array(
				'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
			) );

			// Enable default title tag.
			add_theme_support( 'title-tag' );

			// Enable post formats.
			add_theme_support( 'post-formats', array(
				'gallery', 'image', 'link', 'quote', 'video', 'audio',
			) );

			// Enable custom background.
			add_theme_support( 'custom-background', array( 'default-color' => 'ffffff', ) );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

		}

		/**
		 * Loads the theme files supported by themes and template-related functions/classes.
		 *
		 * @since 1.0.0
		 */
		public function includes() {

			/**
			 * Configurations.
			 */
			require_once get_theme_file_path( 'config/layout.php' );
			require_once get_theme_file_path( 'config/menus.php' );
			require_once get_theme_file_path( 'config/sidebars.php' );
			require_once get_theme_file_path( 'config/modules.php' );

			require_if_theme_supports( 'post-thumbnails', get_theme_file_path( 'config/thumbnails.php' ) );

			require_once get_theme_file_path( 'inc/modules/base.php' );

			/**
			 * M2 specific config - start
			 */
			require_once get_theme_file_path( 'config/plugins-wizard.php' );
			require_once get_theme_file_path( 'config/data-importer.php' );
			require_once get_theme_file_path( 'config/theme-core.php' );
			/**
			 * M2 specific config - end
			 */

			/**
			 * Classes.
			*/
			require_once get_theme_file_path( 'inc/classes/class-widget-area.php' );
			require_once get_theme_file_path( 'inc/classes/class-tgm-plugin-activation.php' );

			/**
			 * Functions.
			 */
			require_once get_theme_file_path( 'inc/template-tags.php' );
			require_once get_theme_file_path( 'inc/template-menu.php' );
			require_once get_theme_file_path( 'inc/template-comment.php' );
			require_once get_theme_file_path( 'inc/template-related-posts.php' );
			require_once get_theme_file_path( 'inc/extras.php' );
			require_once get_theme_file_path( 'inc/customizer.php' );
			require_once get_theme_file_path( 'inc/breadcrumbs.php' );
			require_once get_theme_file_path( 'inc/context.php' );
			require_once get_theme_file_path( 'inc/hooks.php' );
			require_once get_theme_file_path( 'inc/register-plugins.php' );
		
			
			/**
			 * Post types. 
			 */
			require_once get_theme_file_path( 'inc/post-types/hiring.php' );
// 			require_once get_theme_file_path( 'inc/post-types/pilulas.php' );
			require_once get_theme_file_path( 'inc/post-types/logistica.php' );
			/**
			 * Taxonomies 
			 */
			require_once get_theme_file_path( 'inc/taxonomies/exibition.php' );
			
			/**
			 * Shortcodes 
			 */
			require_once get_theme_file_path( 'inc/shortcodes/hiring.php' );
			require_once get_theme_file_path( 'inc/shortcodes/form_itsm.php' );
			require_once get_theme_file_path( 'inc/shortcodes/form_itsm_soap.php' );
			//require_once get_theme_file_path( 'inc/shortcodes/form_pilulas.php' );
			require_once get_theme_file_path( 'inc/shortcodes/form_logistica.php' );
		}

		/**
		 * Modules base path
		 *
		 * @return string
		 */
		public function modules_base() {

			return 'inc/modules/';

		}

		/**
		 * Returns module class by name
		 * @return [type] [description]
		 */
		public function get_module_class( $name ) {

			$module = str_replace( ' ', '_', ucwords( str_replace( '-', ' ', $name ) ) );
			return 'Prodesp_' . $module . '_Module';

		}

		/**
		 * Load theme and child theme modules
		 *
		 * @return void
		 */
		public function load_modules() {

			$disabled_modules = apply_filters( 'Prodesp-theme/disabled-modules', array() );

			foreach ( Prodesp_get_allowed_modules() as $module => $childs ) {
				if ( ! in_array( $module, $disabled_modules ) ) {
					$this->load_module( $module, $childs );
				}
			}

		}

		public function load_module( $module = '', $childs = array() ) {

			if ( ! file_exists( get_theme_file_path( $this->modules_base() . $module . '/module.php' ) ) ) {
				return;
			}

			require_once get_theme_file_path( $this->modules_base() . $module . '/module.php' );
			$class = $this->get_module_class( $module );

			if ( ! class_exists( $class ) ) {
				return;
			}

			$instance = new $class( $childs );

			$this->modules[ $instance->module_id() ] = $instance;

		}

		/**
		 * Register assets.
		 *
		 * @since 1.0.0
		 */
		public function register_assets() {

			wp_register_script(
				'magnific-popup',
				get_theme_file_uri( 'assets/lib/magnific-popup/jquery.magnific-popup.min.js' ),
				array( 'jquery' ),
				'1.1.0',
				true
			);

			wp_register_script(
				'jquery-swiper',
				get_theme_file_uri( 'assets/lib/swiper/swiper.jquery.min.js' ),
				array( 'jquery' ),
				'4.3.3',
				true
			);

			wp_register_script(
				'jquery-totop',
				get_theme_file_uri( 'assets/js/jquery.ui.totop.min.js' ),
				array( 'jquery' ),
				'1.2.0',
				true
			);

			wp_register_script(
				'responsive-menu',
				get_theme_file_uri( 'assets/js/responsive-menu.js' ),
				array(),
				'1.0.0',
				true
			);

			// register style
			wp_register_style(
				'font-awesome',
				get_theme_file_uri( 'assets/lib/font-awesome/font-awesome.min.css' ),
				array(),
				'4.7.0'
			);

			wp_register_style(
				'magnific-popup',
				get_theme_file_uri( 'assets/lib/magnific-popup/magnific-popup.min.css' ),
				array(),
				'1.1.0'
			);

			wp_register_style(
				'jquery-swiper',
				get_theme_file_uri( 'assets/lib/swiper/swiper.min.css' ),
				array(),
				'4.3.3'
			);

		}

		/**
		 * Enqueue scripts.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_scripts() {

			/**
			 * Filter the depends on main theme script.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$scripts_depends = 	apply_filters( 'Prodesp-theme/assets-depends/script', array(
				'jquery',
				'responsive-menu'
			) );

			if ( $this->is_blog || is_singular( 'post' ) ) {
				array_push( $scripts_depends, 'magnific-popup', 'jquery-swiper' );
			}

			wp_enqueue_script(
				'Prodesp-theme-script',
				get_theme_file_uri( 'assets/js/theme-script.js' ),
				$scripts_depends,
				$this->version(),
				true
			);
			
			wp_enqueue_script(
				'hiring',
				get_theme_file_uri( 'assets/js/hiring.js' ),
				$scripts_depends,
				$this->version(),
				true
			);
			
			
			if(is_page('fale-conosco')) {
				wp_enqueue_script(
					'jquery-validation',
					'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js',
					$scripts_depends,
					'1.19.5',
					true
				);				
				wp_enqueue_script(
					'jquery-validation-additional-methods',
					'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js',
					$scripts_depends,
					'1.19.5',
					true
				);				
				wp_enqueue_script(
					'jquery-mask',
					'https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js',
					$scripts_depends,
					'1.14.16',
					true
				);
				
				wp_enqueue_script(
					'google-recaptcha',
					'https://www.google.com/recaptcha/api.js',
					array(),
					'1.0',
					false
				);
				
				wp_enqueue_script(
					'fale-conosco-soap',
					get_stylesheet_directory_uri().'/assets/js/fale-conosco-soap.js',
					$scripts_depends,
					'1.19.5',
					true	
				);
				
				wp_script_add_data('google-recaptcha', 'async', true);
				wp_script_add_data('google-recaptcha', 'defer', true);
				
				
			}
			
			if(is_page('fale-conosco-rest')) {						
				wp_enqueue_script(
					'jquery-validation',
					'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js',
					$scripts_depends,
					'1.19.5',
					true
				);			
				wp_enqueue_script(
					'jquery-validation-additional-methods',
					'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.js',
					$scripts_depends,
					'1.19.5',
					true
				);
				wp_enqueue_script(
					'jquery-mask',
					'https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js',
					$scripts_depends,
					'1.14.16',
					true
				);				
				wp_enqueue_script(
					'google-recaptcha',
					'https://www.google.com/recaptcha/api.js',
					array(),
					'1.0',
					false
				);
				wp_enqueue_script(
					'fale-conosco',
					get_stylesheet_directory_uri().'/assets/js/fale-conosco-old.js',
					$scripts_depends,
					'1.19.5',
					true	

				);
				wp_script_add_data('google-recaptcha', 'async', true);
				wp_script_add_data('google-recaptcha', 'defer', true);				
			}
			if(is_home() || is_front_page()) {
				wp_enqueue_script(
					'home_js_front',
					get_theme_file_uri( 'assets/js/home.js' ),
					$scripts_depends,
					$this->version(),
					true
				);
				
			}
			
			

			// Threaded Comments.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}

		}

		/**
		 * Enqueue styles.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_styles() {

			/**
			 * Filter the depends on main theme styles.
			 *
			 * @since 1.0.0
			 * @var   array
			 */
			$styles_depends = apply_filters( 'Prodesp-theme/assets-depends/styles', array(
				'font-awesome',
			) );

			if ( $this->is_blog || is_singular( 'post' ) ) {
				array_push($styles_depends, 'magnific-popup', 'jquery-swiper');
			}

			wp_enqueue_style(
				'Prodesp-theme-style',
				get_stylesheet_uri(),
				$styles_depends,
				$this->version()
			);

			if ( is_rtl() ) {
				wp_enqueue_style(
					'rtl',
					get_theme_file_uri( 'rtl.css' ),
					false,
					$this->version()
				);
			}

		}

		/**
		 * Do Elementor or Jet Theme Core location
		 *
		 * @return bool
		 */
		public function do_location( $location = null, $fallback = null ) {

			$handler = false;
			$done    = false;

			// Choose handler
			if ( function_exists( 'jet_theme_core' ) ) {
				$handler = array( jet_theme_core()->locations, 'do_location' );
			} elseif ( function_exists( 'elementor_theme_do_location' ) ) {
				$handler = 'elementor_theme_do_location';
			}

			// If handler is found - try to do passed location
			if ( false !== $handler ) {
				$done = call_user_func( $handler, $location );
			}

			if ( true === $done ) {
				// If location successfully done - return true
				return true;
			} elseif ( null !== $fallback ) {
				// If for some reasons location coludn't be done and passed fallback template name - include this template and return
				if ( is_array( $fallback ) ) {
					// fallback in name slug format
					get_template_part( $fallback[0], $fallback[1] );
				} else {
					// fallback with just a name
					get_template_part( $fallback );
				}
				return true;
			}

			// In other cases - return false
			return false;

		}

		/**
		 * Register Elemntor Pro locations
		 *
		 * @return [type] [description]
		 */
		public function elementor_locations( $elementor_theme_manager ) {

			// Do nothing if Jet Theme Core is active.
			if ( function_exists( 'jet_theme_core' ) ) {
				return;
			}

			$elementor_theme_manager->register_location( 'header' );
			$elementor_theme_manager->register_location( 'footer' );

		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;

		}
	}
}

/**
 * Returns instanse of main theme configuration class.
 *
 * @since  1.0.0
 * @return object
 */
function Prodesp_Theme() {

	return Prodesp_Theme_Setup::get_instance();

}

Prodesp_Theme();

/*Customização de Funções
*por Henrique Dias - 811041*
realizada em  29.08.2019*/
 
/*shortcode para exibição do Nome do Post*/
function post_title_shortcode(){
    return get_the_title();
}
add_shortcode('post_titulo','post_title_shortcode');
 
/*shortcode para exibição da Data do Post*/
function shortcode_post_published_date(){
    return get_the_date();
}

add_shortcode( 'post_diapublicado', 'shortcode_post_published_date');

// pagina capacitacao js
function capcacitacao_js()
{ 
	if(is_page('capacitacao')){  
		wp_register_script('capcacitacao_page', get_stylesheet_directory_uri().'/assets/js/capacitacao.js', array('jquery'));
		wp_enqueue_script('capcacitacao_page');
	}	
}
add_action('wp_footer', 'capcacitacao_js');

function toolkit_js()
{ 
	// insere javascript em todas as paginas
	// wp_register_script('general_js', get_stylesheet_directory_uri().'/assets/js/general.js', array('jquery'));
	// wp_enqueue_script('general_js');

	if(is_page('toolkits-documentos-padronizados')){  
		wp_register_script('toolkit_css', get_stylesheet_directory_uri().'/assets/js/toolkit.js', array('jquery'));
		wp_enqueue_script('toolkit_css');
	}	
}
add_action('wp_footer', 'toolkit_js');

function capacitacao_css()
{ 
	if(is_page('capacitacao')){
		wp_register_style('capacitacao_css', get_stylesheet_directory_uri().'/assets/css/capacitacao.css');
		wp_enqueue_style('capacitacao_css');
  }
}
add_action('wp_enqueue_scripts', 'capacitacao_css');

function toolkit_css()
{ 
	if(is_page('toolkits-documentos-padronizados')){
		wp_register_style('toolkit_css', get_stylesheet_directory_uri().'/assets/css/toolkit.css');
		wp_enqueue_style('toolkit_css');
  }
}
add_action('wp_enqueue_scripts', 'toolkit_css');

function home_css()
{ 
	if(is_home() || is_front_page()) {
		wp_register_style('home_style_css', get_stylesheet_directory_uri().'/assets/css/dynamic/home.css');
		wp_enqueue_style('home_style_css');
  }
}
add_action('wp_enqueue_scripts', 'home_css');

function dequeue_jquery_migrate( $scripts ) {
	if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
			$scripts->registered['jquery']->deps = array_diff(
					$scripts->registered['jquery']->deps,
					[ 'jquery-migrate' ]
			);
	}
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );


// Handle file upload
/*
add_action('init', 'upload_file_Fale_conosco'); 

function upload_file_Fale_conosco() {
			$target_path ='testando';
	}
 */
/*
function set_cache_headers() {
    if (!is_user_logged_in() && !is_admin()) {
        header("Cache-Control: public, max-age=900"); // 15 minutos
        header("Expires: " . gmdate("D, d M Y H:i:s", time() + 900) . " GMT");
    }
}
add_action('send_headers', 'set_cache_headers');
 */


