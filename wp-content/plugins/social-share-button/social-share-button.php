<?php
/*
Plugin Name: Social Share Button
Plugin URI: http://pickplugins.com
Description: Awesome Share Button.
Version: 2.1.6
Author: pickplugins
Author URI: http://pickplugins.com
Text Domain: social_share_button
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class SocialShareButton{
	
	public function __construct(){
		
		define('social_share_button_plugin_url', plugins_url('/', __FILE__)  );
		define('social_share_button_plugin_dir', plugin_dir_path( __FILE__ ) );
		define('social_share_button_wp_url', 'https://wordpress.org/plugins/social-share-button/' );
		define('social_share_button_wp_reviews', 'https://wordpress.org/plugins/social-share-button/#reviews' );
		define('social_share_button_pro_url','http://www.pickplugins.com/' );
		define('social_share_button_demo_url', 'www.pickplugins.com/demo/social-share-button/' );
		define('social_share_button_conatct_url', 'http://www.pickplugins.com/contact/' );
		define('social_share_button_qa_url', 'http://www.pickplugins.com/questions/' );
		define('social_share_button_plugin_name', __('Social Share Button', 'social-share-button') );
		define('social_share_button_plugin_version', '2.1.6' );
		define('social_share_button_customer_type', 'free' );	 // pro & free
		define('social_share_button_share_url', 'https://wordpress.org/plugins/social-share-button/' );

		define('social_share_button_tutorial_doc_url', 'https://www.pickplugins.com/documentation/social-share-button/' );

		// Class
		//require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');
		// require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');

		require_once( plugin_dir_path( __FILE__ ) . 'includes/class-migrate.php');


		// Function's
		require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');

		//add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
		add_action( 'wp_enqueue_scripts', array( $this, 'front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	

		add_action( 'init', array( $this, 'textdomain' ));

		register_activation_hook( __FILE__, array( $this, 'activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivation' ) );
		//register_uninstall_hook( __FILE__, array( $this, 'uninstall' ) );
	
	}
	
	public function textdomain() {

		$locale = apply_filters( 'plugin_locale', get_locale(), 'social-share-button' );
		load_textdomain('social-share-button', WP_LANG_DIR .'/social-share-button/social-share-button-'. $locale .'.mo' );

		load_plugin_textdomain( 'social-share-button', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}
	
	
	
	
	public function activation(){

		do_action( 'social_share_button_activation' );
		}		
		
	public function uninstall(){
		
		do_action( 'social_share_button_uninstall' );
		}		
		
	public function deactivation(){
		
		do_action( 'social_share_button_deactivation' );
		}
		
	public function front_scripts(){
		
		wp_enqueue_script('jquery');
		//wp_enqueue_script('jquery-ui-datepicker');
		
		wp_enqueue_script('social_share_button_front_js', plugins_url( 'assets/front/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script('social_share_button_front_js', 'social_share_button_ajax', array( 'social_share_button_ajaxurl' => admin_url( 'admin-ajax.php')));
		
		
		wp_enqueue_style('social_share_button_style', social_share_button_plugin_url.'assets/front/css/style.css');
		wp_enqueue_style('font-awesome', social_share_button_plugin_url.'assets/global/css/font-awesome.css');
		//wp_enqueue_style('jquery-ui', social_share_button_plugin_url.'admin/css/jquery-ui.css');

		}

	public function admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('social_share_button_admin_js', plugins_url( '/assets/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'social_share_button_admin_js', 'social_share_button_ajax', array( 'social_share_button_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('social_share_button_admin_style', social_share_button_plugin_url.'assets/admin/css/style.css');
		//wp_enqueue_style('jquery-ui', social_share_button_plugin_url.'assets/admin/css/jquery-ui.css');

		wp_enqueue_style('font-awesome', social_share_button_plugin_url.'assets/global/css/font-awesome.css');

		//ParaAdmin
		wp_enqueue_style('ParaAdmin', social_share_button_plugin_url.'assets/admin/ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_script('ParaAdmin', plugins_url( 'assets/admin/ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'social_share_button_color_picker', plugins_url('assets/admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		}
	
	
	
	
	}

new SocialShareButton();