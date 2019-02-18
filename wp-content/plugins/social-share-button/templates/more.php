<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

$html_more_button.= '<a title="More..." href="#wp-share-button-'.$post_id.'" post-id="'.get_the_ID().'" class="share-button-more" >';
$html_more_button.= '<span class="button-icon"><i class="fa fa-plus"></i></span>';
$html_more_button.= '</a>';