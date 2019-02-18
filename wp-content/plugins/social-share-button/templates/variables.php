<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


$html_popup_buttons = '';
$html_button = '';
$html_more_button = '';

$post_id = get_the_ID();

$social_share_button_sites = get_option('social_share_button_sites');
$social_share_button_total = get_option('social_share_button_total', 3);
$social_share_button_more_display = get_option('social_share_button_more_display');

$share_count = get_post_meta(get_the_ID(),'social_share_button_share_count', true);
$ssb_post_sites = get_post_meta(get_the_ID(),'ssb_post_sites', true);

//var_dump($share_count);



if(empty($social_share_button_sites)){

	$social_share_button_sites = array (
		'facebook' =>
			array (
				'title' => 'Facebook',
				'id' => 'facebook',
				'share_url' => 'https://www.facebook.com/sharer/sharer.php?u=url',
				'icon' => 'facebook',
				'visible' => 'yes',
				'can_remove' => 'yes',
			),
		'twitter' =>
			array (
				'title' => 'Twitter',
				'id' => 'twitter',
				'share_url' => 'https://twitter.com/intent/tweet?url=url&text=title',
				'icon' => 'twitter',
				'visible' => 'yes',
				'can_remove' => 'yes',
			),

		'google-plus' =>
			array (
				'title' => 'Google plus',
				'id' => 'google-plus',
				'share_url' => 'https://plus.google.com/share?url=url',
				'icon' => 'google-plus',
				'visible' => 'yes',
				'can_remove' => 'yes',
			),

	);
}

//echo '<pre>'.var_export($social_share_button_sites, true).'</pre>';
//echo '<pre>'.var_export($ssb_post_sites, true).'</pre>';


$vars = array(
	'URL' => get_permalink(),
	'TITLE'=> get_the_title(),

);