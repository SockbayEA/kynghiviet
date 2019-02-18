<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_social_share_button_functions{
	


	public function social_share_button_sites($sites = array()){
		
        $sites = array(
			
        'email'=>array('id'=>'email','title'=>__('Email','social-share-button'),'icon'=>'envelope','can_remove'=>'yes','visible'=>'yes','share_url'=>'mailto:?subject=TITLE&body=URL'),
        'facebook'=>array('id'=>'facebook','title'=>__('Facebook','social-share-button'),'icon'=>'facebook','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://www.facebook.com/sharer/sharer.php?u=URL'),
        'twitter'=>array('id'=>'twitter','title'=>__('Twitter','social-share-button'),'icon'=>'twitter','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://twitter.com/intent/tweet?url=URL&text=TITLE'),
        'google-plus'=>array('id'=>'google-plus','title'=>__('Google plus','social-share-button'),'icon'=>'google-plus','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://plus.google.com/share?url=URL'),
        'reddit'=>array('id'=>'reddit','title'=>__('Reddit','social-share-button'),'icon'=>'reddit','can_remove'=>'yes','visible'=>'yes','share_url'=>'http://www.reddit.com/submit?title=TITLE&url=URL'),
        'linkedin'=>array('id'=>'linkedin','title'=>__('Linkedin','social-share-button'),'icon'=>'linkedin','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://www.linkedin.com/shareArticle?url=URL&title=TITLE&summary=&source='),
        'stumbleupon'=>array('id'=>'stumbleupon','title'=>__('Stumbleupon','social-share-button'),'icon'=>'stumbleupon','can_remove'=>'yes','visible'=>'yes','share_url'=>'http://www.stumbleupon.com/submit?url=URL&title=TITLE'),
        );
		
        return $sites;

    }






	public function social_share_button_themes($themes = array()){

			$themes = array(
							'theme1'=>__('Theme 1','social-share-button'),
							'theme2'=>__('Theme 2','social-share-button'),
							'theme3'=>__('Theme 3','social-share-button'),
							'theme4'=>__('Theme 4','social-share-button'),
							'theme5'=>__('Theme 5','social-share-button'),
							'theme6'=>__('Theme 6','social-share-button'),
							'theme7'=>__('Theme 7','social-share-button'),
							'theme8'=>__('Theme 8','social-share-button'),
							'theme9'=>__('Theme 9','social-share-button'),
							'theme10'=>__('Theme 10','social-share-button'),
							'theme11'=>__('Theme 11','social-share-button'),
							'theme12'=>__('Theme 12','social-share-button'),
							'theme13'=>__('Theme 13','social-share-button'),
							'theme14'=>__('Theme 14','social-share-button'),
							'theme15'=>__('Theme 15','social-share-button'),
							'theme16'=>__('Theme 16','social-share-button'),
							'theme17'=>__('Theme 17','social-share-button'),
							'theme18'=>__('Theme 18','social-share-button'),
							'theme19'=>__('Theme 19','social-share-button'),
							'theme20'=>__('Theme 20','social-share-button'),
							'theme21'=>__('Theme 21','social-share-button'),
							'theme22'=>__('Theme 22','social-share-button'),
							'theme23'=>__('Theme 23','social-share-button'),
							//'theme24'=>'Theme 24',							
							//'theme25'=>'Theme 25',
							'theme26'=>__('Theme 26','social-share-button'),
							'theme27'=>__('Theme 27','social-share-button'),
							'theme28'=>__('Theme 28','social-share-button'),
							'theme29'=>__('Theme 29','social-share-button'),
							'theme30'=>__('Theme 30','social-share-button'),
							'theme31'=>__('Theme 31','social-share-button'),
							'theme32'=>__('Theme 32','social-share-button'),
							'theme33'=>__('Theme 33','social-share-button'),
							'theme34'=>__('Theme 34','social-share-button'),
							'theme35'=>__('Theme 35','social-share-button'),
							'theme36'=>__('Theme 36','social-share-button'),
							//'theme37'=>'Theme 37',	
							'theme38'=>__('Theme 38','social-share-button'),

						);
			
			foreach(apply_filters( 'social_share_button_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			return $theme_list;

		}
	
		
	public function social_share_button_themes_dir($themes_dir = array()){
		
			$main_url = social_share_button_plugin_dir.'themes/';
			
			$themes_dir = array(
							'theme1'=>$main_url.'theme1',							
							'theme2'=>$main_url.'theme2',							
							'theme3'=>$main_url.'theme3',							
							'theme4'=>$main_url.'theme4',	
							'theme5'=>$main_url.'theme5',								
							'theme6'=>$main_url.'theme6',
							'theme7'=>$main_url.'theme7',
							'theme8'=>$main_url.'theme8',													
							'theme9'=>$main_url.'theme9',
							'theme10'=>$main_url.'theme10',							
							'theme11'=>$main_url.'theme11',
							'theme12'=>$main_url.'theme12',														
							'theme13'=>$main_url.'theme13',
							'theme14'=>$main_url.'theme14',							
							'theme15'=>$main_url.'theme15',	
							'theme16'=>$main_url.'theme16',							
							'theme17'=>$main_url.'theme17',
							'theme18'=>$main_url.'theme18',														
							'theme19'=>$main_url.'theme19',
							'theme20'=>$main_url.'theme20',
							'theme21'=>$main_url.'theme21',							
							'theme22'=>$main_url.'theme22',							
							'theme23'=>$main_url.'theme23',							
							'theme24'=>$main_url.'theme24',	
							'theme25'=>$main_url.'theme25',								
							'theme26'=>$main_url.'theme26',
							'theme27'=>$main_url.'theme27',
							'theme28'=>$main_url.'theme28',													
							'theme29'=>$main_url.'theme29',
							'theme30'=>$main_url.'theme30',							
							'theme31'=>$main_url.'theme31',
							'theme32'=>$main_url.'theme32',														
							'theme33'=>$main_url.'theme33',
							'theme34'=>$main_url.'theme34',							
							'theme35'=>$main_url.'theme35',	
							'theme36'=>$main_url.'theme36',							
							'theme37'=>$main_url.'theme37',
							'theme38'=>$main_url.'theme38',														
							'theme39'=>$main_url.'theme39',
							'theme40'=>$main_url.'theme40',	
							'theme41'=>$main_url.'theme41',							
							'theme42'=>$main_url.'theme42',							
							'theme43'=>$main_url.'theme43',							
							'theme44'=>$main_url.'theme44',	
							'theme45'=>$main_url.'theme45',								
							'theme46'=>$main_url.'theme46',
							'theme47'=>$main_url.'theme47',
							'theme48'=>$main_url.'theme48',													
							'theme49'=>$main_url.'theme49',	
							'theme50'=>$main_url.'theme50',	
																																
							);
			
			foreach(apply_filters( 'social_share_button_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $theme_dir;
				}

			
			return $theme_list_dir;

		}


	public function social_share_button_themes_url($themes_url = array()){
		
			$main_url = social_share_button_plugin_url.'themes/';
			
			$themes_url = array(
							'theme1'=>$main_url.'theme1',
							'theme2'=>$main_url.'theme2',							
							'theme3'=>$main_url.'theme3',							
							'theme4'=>$main_url.'theme4',														
							'theme5'=>$main_url.'theme5',	
							'theme6'=>$main_url.'theme6',
							'theme7'=>$main_url.'theme7',							
							'theme8'=>$main_url.'theme8',								
							'theme9'=>$main_url.'theme9',
							'theme10'=>$main_url.'theme10',
							'theme11'=>$main_url.'theme11',	
							'theme12'=>$main_url.'theme12',																				
							'theme13'=>$main_url.'theme13',
							'theme14'=>$main_url.'theme14',							
							'theme15'=>$main_url.'theme15',	
							'theme16'=>$main_url.'theme16',	
							'theme17'=>$main_url.'theme17',																				
							'theme18'=>$main_url.'theme18',
							'theme19'=>$main_url.'theme19',							
							'theme20'=>$main_url.'theme20',
							'theme21'=>$main_url.'theme21',							
							'theme22'=>$main_url.'theme22',							
							'theme23'=>$main_url.'theme23',							
							'theme24'=>$main_url.'theme24',	
							'theme25'=>$main_url.'theme25',								
							'theme26'=>$main_url.'theme26',
							'theme27'=>$main_url.'theme27',
							'theme28'=>$main_url.'theme28',													
							'theme29'=>$main_url.'theme29',
							'theme30'=>$main_url.'theme30',							
							'theme31'=>$main_url.'theme31',
							'theme32'=>$main_url.'theme32',														
							'theme33'=>$main_url.'theme33',
							'theme34'=>$main_url.'theme34',							
							'theme35'=>$main_url.'theme35',	
							'theme36'=>$main_url.'theme36',							
							'theme37'=>$main_url.'theme37',
							'theme38'=>$main_url.'theme38',														
							'theme39'=>$main_url.'theme39',
							'theme40'=>$main_url.'theme40',	
							'theme41'=>$main_url.'theme41',							
							'theme42'=>$main_url.'theme42',							
							'theme43'=>$main_url.'theme43',							
							'theme44'=>$main_url.'theme44',	
							'theme45'=>$main_url.'theme45',								
							'theme46'=>$main_url.'theme46',
							'theme47'=>$main_url.'theme47',
							'theme48'=>$main_url.'theme48',													
							'theme49'=>$main_url.'theme49',	
							'theme50'=>$main_url.'theme50',								
																									
							);
			
			foreach(apply_filters( 'social_share_button_themes_url', $themes_url ) as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $theme_url;
				}

			return $theme_list_url;

		}


	
	}
	
	new class_social_share_button_functions();