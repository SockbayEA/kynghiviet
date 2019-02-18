<?php	


/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

$nonce = $_GET['_wpnonce'];




?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br><?php echo "<h2>".social_share_button_plugin_name.' '.__('Migrate', 'social_share_button')."</h2>";?></div>

    <?php
    if(wp_verify_nonce( $nonce, 'nonce_social_share_button' )):
    ?>

    <div class="step-1">

        <?php
/*
 *
*          $ssb_social_sites_domain_url = get_option('ssb_social_sites_domain_url');

        foreach ($ssb_social_sites_domain_url as $key=>$social_sites_domain_url){

	        if($key=='fb'){
		        $ssb_social_sites_domain_url_new['facebook'] = $social_sites_domain_url;

	        }elseif ($key=='gplus'){
		        $ssb_social_sites_domain_url_new['google-plus'] = $social_sites_domain_url;
	        }
	        else{
		        $ssb_social_sites_domain_url_new[$key] = $social_sites_domain_url;
            }



        }

        var_dump($ssb_social_sites_domain_url);
        var_dump($ssb_social_sites_domain_url_new);
 *
 * */




        ?>


    </div>
    <div class="step-2">






    <?php


    $meta_query[] = array(

	    'key' => 'ssb_post_sites',
	    'value' => '',
	    'compare' => '!=',

    );




    // ssb_post_sites
    $wp_query = new WP_Query(
	    array (
		    'post_type' => 'any',
		    'post_status' => 'any',
		    'orderby' => 'date',
		    'meta_query' => $meta_query,
		    'order' => 'DESC',
		    'posts_per_page' => -1,


	    ) );



    if ( $wp_query->have_posts() ) :

        echo '<ul>';
	    while ( $wp_query->have_posts() ) : $wp_query->the_post();

            echo '<li><i class="fa fa-check-square" aria-hidden="true"></i> '.get_the_title().'</li>';
		    $ssb_post_sites = get_post_meta(get_the_ID(),'ssb_post_sites', true);

		    foreach ($ssb_post_sites as $key=>$ssb_post_site){

		        if($key=='fb'){
			        $social_share_button_share_count['facebook'] = $ssb_post_site;

                }elseif ($key=='gplus'){
			        $social_share_button_share_count['google-plus'] = $ssb_post_site;
                }
                else{
	                $social_share_button_share_count[$key] = $ssb_post_site;
                }

            }

		    //var_dump($social_share_button_share_count);
            update_post_meta(get_the_ID(),'social_share_button_share_count', $social_share_button_share_count);



	    endwhile;
	    echo '</ul>';
    endif;

    update_option('social_share_button_migrate_2_1_1','done');
    ?>

    </div>

    <?php
    endif;
    ?>
</div>