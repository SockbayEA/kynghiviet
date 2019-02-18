<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

$html_popup_buttons.= '<a target="_blank" href="'.$url.'" post-id="'.get_the_ID().'" class="share-button share-button-'.get_the_ID().' '.$site_info['id'].'" id="'.$site_info['id'].'" >';

$html_popup_buttons.= '<span class="button-icon"><i class="fa fa-'.$site_info['id'].'"></i>
</span>';
$html_popup_buttons.= '<span class="button-name">'.$site_info['title'].'</span>';
$html_popup_buttons.= '<span class="button-count">'.$share_count_value.'</span>';				

$html_popup_buttons.= '</a>';