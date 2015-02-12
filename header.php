<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title></title>

		<?php // mobile meta ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
		<?php // Normal desktop browsers ?>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		
		<?php // Old retarded browsers ?>
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

			<div id="container">

				<header class="header"> 

					<div id="inner-header" class="cf">
						
						<h1 class="logo">
							<a href="<?php echo home_url(); ?>">
								<span class="bold">Awesome</span>
								<span class="regular">Logo</span>
							</a>
						</h1>
						
						<button id="menu-toggle"></button>

						<nav class="main-menu">
							<?php wp_nav_menu(array(
		    					'container' => false,                         
		    					'container_class' => 'menu cf',               
		    					'menu' => 'The Main Menu',
		    					'menu_class' => 'nav top-nav cf',             
		    					'theme_location' => 'main-nav',               
		    					'before' => '',                               
			        			'after' => '',                                
			        			'link_before' => '',                          
			        			'link_after' => '',                           
			        			'depth' => 0,                                 
		    					'fallback_cb' => ''                           
							)); ?>
						</nav>
						
					</div>

				</header>
			