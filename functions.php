<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'LAGOONLOGISTICS_DIR_URI' ) )
		define( 'LAGOONLOGISTICS_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'LAGOONLOGISTICS_DIR_ASSETS_URI' ) )
		define( 'LAGOONLOGISTICS_DIR_ASSETS_URI', LAGOONLOGISTICS_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'LAGOONLOGISTICS_DIR_CSS_URI' ) )
		define( 'LAGOONLOGISTICS_DIR_CSS_URI', LAGOONLOGISTICS_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'LAGOONLOGISTICS_DIR_JS_URI' ) )
		define( 'LAGOONLOGISTICS_DIR_JS_URI', LAGOONLOGISTICS_DIR_ASSETS_URI .'js/' );

	// Vendors File URI
	if( !defined( 'LAGOONLOGISTICS_DIR_VEN_URI' ) )
		define( 'LAGOONLOGISTICS_DIR_VEN_URI', LAGOONLOGISTICS_DIR_ASSETS_URI .'vendors/' );

	// Icon Images
	if( !defined('LAGOONLOGISTICS_DIR_IMG') )
		define( 'LAGOONLOGISTICS_DIR_IMG', LAGOONLOGISTICS_DIR_URI.'assets/img/' );
	
	//DIR inc
	if( !defined( 'LAGOONLOGISTICS_DIR_INC' ) )
		define( 'LAGOONLOGISTICS_DIR_INC', LAGOONLOGISTICS_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	if( !defined( 'LAGOONLOGISTICS_DIR_ELEMENTOR' ) )
		define( 'LAGOONLOGISTICS_DIR_ELEMENTOR', LAGOONLOGISTICS_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'LAGOONLOGISTICS_DIR_PATH' ) )
		define( 'LAGOONLOGISTICS_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'LAGOONLOGISTICS_DIR_PATH_INC' ) )
		define( 'LAGOONLOGISTICS_DIR_PATH_INC', LAGOONLOGISTICS_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'LAGOONLOGISTICS_DIR_PATH_LIB' ) )
		define( 'LAGOONLOGISTICS_DIR_PATH_LIB', LAGOONLOGISTICS_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'LAGOONLOGISTICS_DIR_PATH_CLASSES' ) )
		define( 'LAGOONLOGISTICS_DIR_PATH_CLASSES', LAGOONLOGISTICS_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	if( !defined( 'LAGOONLOGISTICS_DIR_PATH_WIDGET' ) )
		define( 'LAGOONLOGISTICS_DIR_PATH_WIDGET', LAGOONLOGISTICS_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	if( !defined( 'LAGOONLOGISTICS_DIR_PATH_ELEMENTOR_WIDGETS' ) )
		define( 'LAGOONLOGISTICS_DIR_PATH_ELEMENTOR_WIDGETS', LAGOONLOGISTICS_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'lagoonlogistics-breadcrumbs.php' );
	// Sidebar register file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'widgets/lagoonlogistics-widgets-reg.php' );
	// Post widget file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'widgets/lagoonlogistics-recent-post-thumb.php' );
	// News letter widget file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'widgets/lagoonlogistics-newsletter-widget.php' );
	//Social Links
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'widgets/lagoonlogistics-social-links.php' );
	// Instagram Widget
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'widgets/lagoonlogistics-instagram.php' );
	// Nav walker file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'lagoonlogistics-functions.php' );

	// Theme Demo file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'demo/demo-import.php' );

	// Inline css file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'lagoonlogistics-commoncss.php' );
	// Post Like
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	require_once( LAGOONLOGISTICS_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( LAGOONLOGISTICS_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( LAGOONLOGISTICS_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class lagoonlogistics dashboard
	require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


	if( class_exists( 'RW_Meta_Box' ) ){
		// Metabox Function
		require_once( LAGOONLOGISTICS_DIR_PATH_INC . 'lagoonlogistics-metabox.php' );
	}
	

	// Admin Enqueue Script
	function lagoonlogistics_admin_script(){
		wp_enqueue_style( 'lagoonlogistics-admin', get_template_directory_uri().'/assets/css/lagoonlogistics_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'lagoonlogistics_admin', get_template_directory_uri().'/assets/js/lagoonlogistics_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'lagoonlogistics_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );




	/**
	 * Instantiate Lagoonlogistics object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Lagoonlogistics Dashboard .
	 *
	 */
	
	$Lagoonlogistics = new Lagoonlogistics();
	
