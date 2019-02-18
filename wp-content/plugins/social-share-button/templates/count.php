<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

$count = $share_count_value;


        if($count>1000000000000){
			$share_count_value = round(($n/1000000000000),1).' trillion';
		}
        else if($count>1000000000){
			$share_count_value = round(($n/1000000000),1).' billion';
			}
        else if($count>1000000){
			$share_count_value = round(($n/1000000),1).' million';
			} 
        else if($count>1000){
			$share_count_value = round(($n/1000),1).' thousand';
			}



$html_first.= '<span class="button-count">'.$share_count_value.'</span>';