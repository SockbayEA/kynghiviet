<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


$social_share_button_count_format = get_option( 'social_share_button_count_format' );

$html_button.= '<a target="_blank" href="'.$url.'" post-id="'.get_the_ID().'" class="share-button share-button-'.get_the_ID().' '.$site_info['id'].'" id="'.$site_info['id'].'" >';

$html_button.= '<span class="button-icon"><i class="fa fa-'.$site_info['id'].'"></i></span>';
$html_button.= '<span class="button-name">'.$site_info['title'].'</span>';


if($social_share_button_count_format=='short'){
	
	$count = $share_count_value;
	
	if($count>1000000000000){
		$share_count_value = round(($count/1000000000000),1).'t+';
	}
	else if($count>1000000000){
		$share_count_value = round(($count/1000000000),1).'b+';
		}
	else if($count>1000000){
		$share_count_value = round(($count/1000000),1).'m+';
		} 
	else if($count>1000){
		$share_count_value = round(($count/1000),1).'k+';
		}
	
	}


$html_button.= '<span class="button-count">'.$share_count_value.'</span>';

$html_button.= '</a>';