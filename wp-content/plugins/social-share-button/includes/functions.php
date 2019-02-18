<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/
if ( ! defined('ABSPATH')) exit;  // if direct access 




function social_share_button_filter_buttons_before_extra($html){

   // var_dump('Hello');

	$social_share_button_display_total_count = get_option('social_share_button_display_total_count');
	$social_share_button_tc_text = get_option('social_share_button_tc_text' ,'Total Share');
	$social_share_button_tc_themes = get_option('social_share_button_tc_themes');

	if($social_share_button_display_total_count == 'yes'){

		$share_count = get_post_meta( get_the_ID(), 'social_share_button_share_count', true );
		$total_count = 0;
		//var_dump($share_count);
		if(!empty($share_count)){
			foreach($share_count as $key=>$count){
				$total_count +=$count;
			}
		}

		$html.= '<span class="total-share '.$social_share_button_tc_themes.'">';
		$html.= '<i class="total-count-text">'.$social_share_button_tc_text.'</i> ';
		$html.= '<i class="total-count">'.$total_count.'</i> ';
		$html.= '</span>';


	}



	return $html;

}
add_filter('social_share_button_filter_buttons_before','social_share_button_filter_buttons_before_extra');







	
	
	function social_share_button_open_graph(){
		
		$data = '';
		
		if(is_singular()){
			
			$data.= '<meta property="og:title" content="'.get_the_title(get_the_ID()).'" />';
			$data.= '<meta property="og:url" content="'.get_permalink(get_the_ID()).'" />';
			
			if(has_post_thumbnail()){
				
				$team_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
				$team_thumb_url = $team_thumb['0'];
				
				$data.= '<meta property="og:image" content="'.$team_thumb_url.'" />';
	
				}
								
			
			}
		

		
		echo $data;
		
		
		}
	add_action('wp_head','social_share_button_open_graph');




function social_share_button_filter_the_content($content){
	$html = '';
	$social_share_button = do_shortcode('[social_share_button]');

	$social_share_button_display = get_option('social_share_button_display');

	if(empty($social_share_button_display)){

		$social_share_button_display[] = array(
			'location' =>  'content',
			'position' =>  'after',
			'posttype' =>  'post',
			'page_type' =>  'single'
		);
	}

	//var_dump($social_share_button_display);





	$posttype = get_post_type( get_the_ID() );

	if( is_archive() ) $page_type = 'archive';
    elseif( is_singular() ) $page_type = 'single';
    elseif( is_home() ) $page_type = 'home';
	else $page_type = 'none';

	$count = 0;


	foreach($social_share_button_display as $key=>$button_info){

		$location = $button_info['location'];

		if($location=='content'){
			if ( $page_type == $button_info['page_type'] ){
				if ($posttype == $button_info['posttype']){
					$check = $posttype.'_'.$count;

					if( $button_info['position'] == 'before') $html .= $social_share_button;
					if ( $check == $button_info['posttype'].'_0' ) $html .= $content;
					if( $button_info['position'] == 'after' ) $html .= $social_share_button;

					$count++;
				}
				//else return $content;
			}
		}




	}
	if ( empty($html) ) return $content;
	else return $html;
}

add_filter('the_content','social_share_button_filter_the_content');





function social_share_button_filter_the_title($content){
	$html = '';
	//$social_share_button = do_shortcode('[social_share_button]');



	$social_share_button_display = get_option('social_share_button_display');

	if(empty($social_share_button_display)){

		$social_share_button_display[] = array(
			'location' =>  'content',
			'position' =>  'after',
			'posttype' =>  'post',
			'page_type' =>  'single'
		);
	}

	$posttype = get_post_type( get_the_ID() );

	if( is_archive() ) $page_type = 'archive';
    elseif( is_singular() ) $page_type = 'single';
    elseif( is_home() ) $page_type = 'home';
	else $page_type = 'none';

	$count = 0;


	foreach($social_share_button_display as $key=>$button_info){
		$location = $button_info['location'];
		if($location=='post_title'){
			if ( $page_type == $button_info['page_type'] ){
				if ($posttype == $button_info['posttype']){

					$social_share_button = do_shortcode('[social_share_button]');
					$check = $posttype.'_'.$count;
					if( $button_info['position'] == 'before') $html .= $social_share_button;
					if ( $check == $button_info['posttype'].'_0' ) $html .= $content;
					if( $button_info['position'] == 'after' ) $html .= $social_share_button;

					$count++;
				}
			}
		}
	}
	if ( empty($html) ) return $content;
	else return $html;
}

add_filter('the_excerpt','social_share_button_filter_the_title');

















function social_share_button_ajax_update_count(){
		$current_site_id = sanitize_text_field($_POST['site_id']);
		$post_id = (int)sanitize_text_field($_POST['post_id']);
		
		$social_share_button_sites = get_option( 'social_share_button_sites' );
		$share_count = get_post_meta( $post_id, 'social_share_button_share_count', true );


		do_action('social_share_button_update_count', $post_id, $current_site_id);

		foreach($social_share_button_sites as $site_key=>$site_info){
				$site_id = $site_info['id'];
				if($current_site_id == $site_id){
						$social_share_button_share_count[$site_id] = (int)$share_count[$site_id]+1;

					}
				else{
						$social_share_button_share_count[$site_id] = (int)$share_count[$site_id];
					}
			}
		// update count
		update_post_meta( $post_id, 'social_share_button_share_count', $social_share_button_share_count );

		
		die();
	}



add_action('wp_ajax_social_share_button_ajax_update_count', 'social_share_button_ajax_update_count');
add_action('wp_ajax_nopriv_social_share_button_ajax_update_count', 'social_share_button_ajax_update_count');
	

function social_share_button_add_display_filter()
	{
		$key = sanitize_text_field($_POST['time']);
		
?>
                        <tr>
                            <td>
                            <select name="social_share_button_display[<?php echo $key; ?>][location]" >
                                <option value="none"><?php echo __('None','social-share-button'); ?></option>
                                <option value="content"><?php echo __('Content','social-share-button'); ?></option>
                            </select>
                            </td>
                            <td>
                            
                            <select name="social_share_button_display[<?php echo $key; ?>][position]" >
                                <option value="none"><?php echo __('None','social-share-button'); ?></option>
                                <option value="before"><?php echo __('Before','social-share-button'); ?></option>
                                <option value="after"><?php echo __('After','social-share-button'); ?></option>
                            </select>
                            </td>
                            
                            <td>
                            <?php 							
							$post_types = get_post_types( '', 'names' );

							?>
                            <select name="social_share_button_display[<?php echo $key; ?>][posttype]" >
                            <option value="none"><?php echo __('None','social-share-button'); ?></option>
                            <?php
                            foreach ( $post_types as $post_key ){
								
								
								?>
                                <option value="<?php echo $post_key; ?>"><?php echo $post_key; ?></option>
                                <?php
								}

							?>
                            
                            </select>
                            </td>
                            
                                                
                            <td>
                            <select name="social_share_button_display[<?php echo $key; ?>][page_type]" >
                                <option value="none"><?php echo __('None','social-share-button'); ?></option>
                                <option value="single"><?php echo __('Single','social-share-button'); ?></option>
                                <option value="archive"><?php echo __('Archive','social-share-button'); ?></option>
                                <option value="home"><?php echo __('Home','social-share-button'); ?></option>
                            </select>
                            </td>
                            <td>
                                <span class="remove"><i class="fa fa-times"></i></span>
                            </td> 
                            
                                                
                        </tr>

<?php



		
		die();
		
		
		
		}
add_action('wp_ajax_social_share_button_add_display_filter', 'social_share_button_add_display_filter');
//add_action('wp_ajax_nopriv_social_share_button_add_display_filter', 'social_share_button_add_display_filter');
	

function social_share_button_add_site(){
	
		$site_name = sanitize_text_field($_POST['site_name']);

		?>
                            <tr><td class="sorting"></td>
                            <td>
                            <input name="social_share_button_sites[<?php echo $site_name; ?>][title]" type="text" value="<?php echo ucfirst($site_name); ?>" />
                            </td>                 
                            
                            <td>
                            <input name="social_share_button_sites[<?php echo $site_name; ?>][id]" type="text" value="<?php echo $site_name; ?>" />
                            </td>
                            
                            <td>
                            <input name="social_share_button_sites[<?php echo $site_name; ?>][share_url]" type="text" value="#" />
                            </td>                            

                            <td>
                            <input name="social_share_button_sites[<?php echo $site_name; ?>][icon]" type="text" value="<?php echo $site_name; ?>" />
                            </td>
                   
                            <td>
                            <input checked name="social_share_button_sites[<?php echo $site_name; ?>][visible]" type="checkbox" value="yes" />
                            </td>                   
                   
                   
                            <td>
                            <span class="remove"><i class="fa fa-time"></i> </span>
                            <input name="social_share_button_sites[<?php echo $site_name; ?>][can_remove]" type="hidden" value="yes" />
                            </td>
                            
                            
                            </tr>
        
        <?php
		
    die();
	}
		
add_action('wp_ajax_social_share_button_add_site', 'social_share_button_add_site');
//add_action('wp_ajax_nopriv_social_share_button_add_site', 'social_share_button_add_site');

function social_share_button_reset_site(){

	$class_social_share_button_functions = new class_social_share_button_functions();
	$social_share_button_sites = $class_social_share_button_functions->social_share_button_sites();


	//if(!empty($social_share_button_sites))
		foreach ($social_share_button_sites as $site_key=>$site_info){
			if(!empty($site_key)){
				?>
                <tr><td class="sorting"><span class="sort"><i class="fa fa-bars" aria-hidden="true"></i></span></td>
                    <td>
                        <input name="social_share_button_sites[<?php echo $site_key; ?>][title]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['title'])) echo $social_share_button_sites[$site_key]['title']; ?>" />
                    </td>

                    <td>
                        <input name="social_share_button_sites[<?php echo $site_key; ?>][id]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['id'])) echo $social_share_button_sites[$site_key]['id']; ?>" />
                    </td>

                    <td>
                        <input name="social_share_button_sites[<?php echo $site_key; ?>][share_url]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['share_url'])) echo $social_share_button_sites[$site_key]['share_url']; ?>" />
                    </td>




                    <td>
                        <input name="social_share_button_sites[<?php echo $site_key; ?>][icon]" type="text" value="<?php if(isset($social_share_button_sites[$site_key]['icon'])) echo $social_share_button_sites[$site_key]['icon']; ?>" />
                    </td>

                    <td>

						<?php
						if(!empty($social_share_button_sites[$site_key]['visible'])){

							$checked = 'checked';
						}
						else{
							$checked = '';
						}

						?>


                        <input <?php echo $checked; ?> name="social_share_button_sites[<?php echo $site_key; ?>][visible]" type="checkbox" value="yes" />
                    </td>


                    <td>

						<?php
						if($site_info['can_remove']=='yes'){
							?>

                            <span class="remove"><i class="fa fa-times"></i></span>

							<?php
						}
						else{
							echo '<span class="no-remove" title="Can\'t remove.">...</span>';

						}

						?>

                        <input name="social_share_button_sites[<?php echo $site_key; ?>][can_remove]" type="hidden" value="<?php echo $site_info['can_remove']; ?>" />


                    </td>


                </tr>
				<?php



			}
		}


	die();

}

add_action('wp_ajax_social_share_button_reset_site', 'social_share_button_reset_site');
//add_action('wp_ajax_nopriv_social_share_button_reset_site', 'social_share_button_reset_site');