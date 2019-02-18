<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	include social_share_button_plugin_dir.'/templates/variables.php';

	$html.= '<div id="wp-share-button-'.$post_id.'" class="wp-share-button '.$themes.'">';
	
	$html.= apply_filters('social_share_button_filter_buttons_before','');


	$i=0;
	foreach($social_share_button_sites as $site_key=>$site_info ){
		
		$url = strtr($site_info['share_url'], $vars);
		
		$site_id = $site_info['id'];
		
		
		if(isset($share_count[$site_id])){
			
				$share_count_value = $share_count[$site_id];
			}
		else{
			
				$share_count_value =0;
			}
		
		if(isset($site_info['visible'])){
			
			if($i<$social_share_button_total){
			
				include social_share_button_plugin_dir.'/templates/buttons.php';
				
				// $html_button.= '<a target="_blank" href="'.$url.'" post-id="'.get_the_ID().'" class="share-button share-button-'.get_the_ID().' '.$site_info['id'].'" id="'.$site_info['id'].'" >';		
				
				// $html_button.= '<span class="button-icon"><i class="fa fa-'.$site_info['icon'].'"></i></span>';
				// $html_button.= '<span class="button-name">'.$site_info['title'].'</span>';
				// $html_button.= '<span class="button-count">'.$share_count_value.'</span>';
				
				// $html_button.= '</a>';
				
				
				
				
				}
			else{
					include social_share_button_plugin_dir.'/templates/popup-buttons.php';
					
					
					
					// $html_popup_buttons.= '<a target="_blank" href="'.$url.'" post-id="'.get_the_ID().'" class="share-button share-button-'.get_the_ID().' '.$site_info['id'].'" id="'.$site_info['id'].'" >';		
					
					// $html_popup_buttons.= '<span class="button-icon"><i class="fa fa-'.$site_info['icon'].'"></i>
					// </span>';			
					// $html_popup_buttons.= '<span class="button-name">'.$site_info['title'].'</span>';			
					// $html_popup_buttons.= '<span class="button-count">'.$share_count_value.'</span>';				
					
					// $html_popup_buttons.= '</a>';
					
					
				}
				
			$i++;
			
			}
		}
		

		if(($social_share_button_more_display=='yes') && ($social_share_button_total < ($i))){
			
			//include social_share_button_plugin_dir.'/templates/more.php';
			
			$html_more_button.= '<a title="More..." href="#wp-share-button-'.$post_id.'" post-id="'.get_the_ID().'" class="share-button-more" >';
			$html_more_button.= '<span class="button-icon"><i class="fa fa-plus"></i></span>';
			$html_more_button.= '</a>';
			

			}

	$html.= $html_button;
	$html.= $html_more_button;	
	$html.= '<div class="wp-share-button-popup wp-share-button-popup-'.get_the_ID().'"><div class="popup-buttons"><span class="close">X</span>'.$html_popup_buttons.'</div></div>';	

	$html.= '</div>';