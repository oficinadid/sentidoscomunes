<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="apple-mobile-web-app-title" content="Sentidos Comunes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/inc/img/apple/touch-icon-iphone-precomposed.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url'); ?>/inc/img/apple/touch-icon-ipad-precomposed.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_url'); ?>/inc/img/apple/touch-icon-iphone4-precomposed.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_url'); ?>/inc/img/apple/touch-icon-ipad-retina-precomposed.png" />

<link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/inc/img/apple/startup.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)">
<link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/inc/img/apple/startup-retina.png" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)">
<link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/inc/img/apple/startup-5.png"  media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)">

<link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/inc/img/apple/startup-ipad-portrait.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 1) and (oriantation:portrait)">
<link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/inc/img/apple/startup-ipad-landscape.png" media="(device-width: 1024px) and (device-height: 768px) and (-webkit-device-pixel-ratio: 1) and (oriantation:landscape)">
<link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/inc/img/apple/startup-ipad-retina-portrait.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (oriantation:portrait)">
<link rel="apple-touch-startup-image" href="<?php bloginfo('template_url'); ?>/inc/img/apple/startup-ipad-retina-landscape.png" media="(device-width: 1024px) and (device-height: 768px) and (-webkit-device-pixel-ratio: 2) and (oriantation:landscape)">


<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="shortcut icon" href="<?php bloginfo( 'wpurl' ) ?>/favicon.ico" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/inc/css/main.css?<?php echo filemtime(get_stylesheet_directory().'/inc/css/main.css') ?>" />

<script src="<?php echo get_template_directory_uri(); ?>/inc/js/modernizr.js" type="text/javascript"></script>

<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Vollkorn:400italic,700italic,400,700' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/inc/js/html5.js" type="text/javascript"></script>
<![endif]-->

<!-- scripts -->

<?php wp_enqueue_script("jquery"); ?>

<!-- scripts -->

<?php wp_head(); ?>



</head>

<body <?php body_class(); ?> >

<?php if (wpmd_is_device()): ?>
<!-- MOBILE NAV DROPDOWN -->
	<header class="menu mobile">
		<nav class="wrapper">

            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<div class="main-menu-mobile">
				<a class="trigger"><span>Menu</span></a>
				<div class="main_menu">
					<?php wp_nav_menu(array('menu' => 'Main Menu' )); ?>
				</div>
			</div>
			
			<div class="search search-toggle"><a href="#search_form">Search</a></div>

			<ul class="social">
				<li class="facebook"><a href="https://www.facebook.com/pages/Sentidos-Comunes/162551567123399" title="Únete a nuestro Fan Page en Facebook">Facebook</a></li>

				<li class="twitter"><a href="https://twitter.com/sentidoscomunes" title="Siguenos en Twitter">Twitter</a></li>
				<li class="instagram"><a href="https://instagram.com/sentidoscomunes">Instagram</a></li>
			</ul>

		</nav>
	</header>

<?php else: ?>
<!-- DESKTOP NAV -->
	<header class="menu full">
		<nav class="wrapper">
            
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div class="this_week">
				<?php
					$args = array(
						'post_type' => 'edicion',
						'posts_per_page' => 1
					);
					$featured = new WP_Query($args);
					if($featured->have_posts()) : while($featured->have_posts()): $featured->the_post(); 

				?>
					<a href="<?php the_permalink(); ?>" class="current">
						<span>Nº<?php the_field('numero'); ?></span>
						<strong><?php the_title(); ?></strong>
					</a>
				<?php endwhile; wp_reset_postdata(); endif; ?>
				<!--a href="#" class="past">Boton Semanas Anteriores</a--> 
				<ul>
					<?php
						$args = array(
							'post_type' => 'edicion',
							'posts_per_page' => 5,
							'offset' => 1
						);
						$featured = new WP_Query($args);
						if($featured->have_posts()) : while($featured->have_posts()): $featured->the_post(); 
					?>
						<li><a href="<?php the_permalink(); ?>" ><span>Nº<?php the_field('numero'); ?></span><strong><?php the_title(); ?></strong></a></li>
					<?php endwhile; wp_reset_postdata(); endif; ?>
						<li class="mas-ediciones"><a href="<?php bloginfo( 'wpurl' ) ?>/edicion"><span>&larr;</span><strong> Ver todas las ediciones</strong></a></li>
				</ul>
			</div>
			<ul class="social">
				<li class="facebook"><a href="https://www.facebook.com/pages/Sentidos-Comunes/162551567123399" title="Únete a nuestro Fan Page en Facebook">Facebook</a></li>

				<li class="twitter"><a href="https://twitter.com/sentidoscomunes" title="Siguenos en Twitter">Twitter</a></li>			<li class="instagram"><a href="https://instagram.com/sentidoscomunes">Instagram</a></li>
			</ul>
			<div class="main_menu">
				<?php wp_nav_menu(array('menu' => 'Main Menu' )); ?>
			</div>
			<div class="search search-toggle"><a href="#search_form">Search</a></div>
		</nav>
	</header>

<?php endif ?>

	<div id="search_form" class="wrapper hidden">
		<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" class="field" name="s" id="s" placeholder="¿Que buscas?" />
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="Buscar" />
		</form>
	</div>




<?php
	// Get the featured content, show it only in frontpage
	if (is_home()) : get_template_part( 'loop', 'home_featured' );
	endif;
?>