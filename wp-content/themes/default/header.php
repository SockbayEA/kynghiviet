<!DOCTYPE html <?php language_attributes();?> >

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

	<title>

	<?php wp_title(); // show the blog name, from settings ?>

	</title>

	<meta name="robots" content="noodp,index,follow"/>

	<meta name='revisit-after' content='1 days' />

	<link rel="shortcut icon" href="<?php echo ot_get_option('fl_favicon'); ?>">

	<link rel="profile" href="" />

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php ?>

	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

	<!--[if lt IE 9]>

	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>

	<![endif]-->

	<?php wp_head(); ?>
    <script>

        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

    </script>
	<!-- 	<script language=JavaScript> var txt=" <?php // wp_title();?> -"; var espera=500; var refresco=null; function rotulo_title() { document.title=txt; txt=txt.substring(1,txt.length)+txt.charAt(0); refresco=setTimeout("rotulo_title()",espera); } rotulo_title();</SCRIPT> -->

	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.mmenu.all.js"></script>

	<!-- Fire the plugin onDocumentReady -->

	<script type="text/javascript">

	jQuery(document).ready(function( $ ) {

	$("#menu").mmenu();

	});

	</script>

</head>

<body <?php body_class(); ?>>

	<div id="fb-root"></div>

	<script>(function(d, s, id) {

	var js, fjs = d.getElementsByTagName(s)[0];

	if (d.getElementById(id)) return;

	js = d.createElement(s); js.id = id;

	js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=223589354720910";

	fjs.parentNode.insertBefore(js, fjs);

	}(document, 'script', 'facebook-jssdk'));</script>

	

	<?php echo ot_get_option('facebook_api'); ?>

	<div id="<?php if(is_front_page()){ echo  'header';} else { echo 'no-home'; } ?>">

		<div class="container">

			<div class="row">
				<div id="page" class="hidden-md hidden-lg">
					<div class="header">
						<a href="#menu"><span><i class="fa fa-align-justify fa-2x"></i></span></a>
					</div>
				</div>

				<div class="col-md-2 col-sm-2  logo">

					<a href="<?php echo home_url('/') ?>"><img class="logo_black hide" src="<?php echo ot_get_option('fl_logo'); ?>" alt="<?php bloginfo('name'); ?>"></a>

					<a href="<?php echo home_url('/') ?>"><img class="logo_white" src="<?php echo ot_get_option('fl_logo'); ?>" alt="<?php bloginfo('name'); ?>"></a>

				</div>
				<div class="col-md-10 col-sm-10 fix-sm text-center text-uppercase">

					<nav id="topmenu" class="navbar navbar-default">

						<?php

						wp_nav_menu(array(

						'menu' => 'primary',

						'theme_location' => 'primary',

						'depth' => 3,

						'container' => 'div',

						'container_class' => 'collapse navbar-collapse',

						'container_id' => 'bsmenu',

						'menu_class' => 'nav navbar-nav',

						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',

						'walker' => new wp_bootstrap_navwalker())

						);

						?>

						

					</nav>

				</div>

			</div>

		</div>

	</div>

	<?php if(is_front_page()){ echo  '';} else { echo '<div class="box_head"></div>'; } ?>

	<div id="main_body">

