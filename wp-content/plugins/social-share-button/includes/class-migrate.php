<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_social_share_button_migrate{
	
    public function __construct(){

	    add_action('admin_notices', array($this, 'migrate_admin_notices'));

   		}



	function migrate_admin_notices(){

		$social_share_button_version = get_option('social_share_button_version');
		$social_share_button_migrate_2_1_1 = get_option('social_share_button_migrate_2_1_1');

		$html= '';
		$nonce = wp_create_nonce( 'nonce_social_share_button' );

		if($social_share_button_migrate_2_1_1!='done'):
		?>
		<div class="update-nag"><strong>Social Share Button</strong> plugin need to <a href="<?php echo admin_url().'admin.php?page=social_share_button_migrate&_wpnonce='.$nonce; ?>">update data</a>


		</div>
		<?php

		endif;

	}
		
	
			
	}
	
	new class_social_share_button_migrate();