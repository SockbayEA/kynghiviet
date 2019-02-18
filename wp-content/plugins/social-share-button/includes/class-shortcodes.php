<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_social_share_button_shortcodes{
	
    public function __construct(){
		
		add_shortcode( 'social_share_button', array( $this, 'social_share_button_display' ) );
		
		//add_filter('the_content',array( $this, 'social_share_button_display' ));
   		}
		
		

	public function social_share_button_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'themes' => 'theme1',
					), $atts);
	
			$html = '';
			
			$social_share_button_theme = get_option('social_share_button_theme');
			
			if(empty($social_share_button_theme)){
				
				$social_share_button_theme = 'theme1';
				}
			
			$themes = $social_share_button_theme;

			$class_social_share_button_functions = new class_social_share_button_functions();
			$social_share_button_themes_dir = $class_social_share_button_functions->social_share_button_themes_dir();
			$social_share_button_themes_url = $class_social_share_button_functions->social_share_button_themes_url();

			ob_start();

			echo '<link  rel="stylesheet"  href="'.$social_share_button_themes_url[$themes].'/style.css" >';				

			include $social_share_button_themes_dir[$themes].'/index.php';				

			echo $html;

			return ob_get_clean();

			//return $html;
	
	
		}
		
	
			
	}
	
	new class_social_share_button_shortcodes();