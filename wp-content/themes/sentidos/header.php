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

<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0"/>
<meta name="apple-mobile-web-app-capable" content="yes" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="shortcut icon" href="<?php bloginfo( 'wpurl' ) ?>/favicon.ico" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<link rel="stylesheet/less" type="text/css" href="<?php echo get_template_directory_uri(); ?>/main.css" />

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

<script src="http://unslider.com/unslider.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/inc/js/functions.js" type="text/javascript"></script>

</head>

<body <?php body_class(); ?> >
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
			</ul>
		</div>
		<ul class="social">
			<li class="facebook"><a href="https://www.facebook.com/pages/Sentidos-Comunes/162551567123399" title="Únete a nuestro Fan Page en Facebook">Facebook</a></li>

			<li class="twitter"><a href="https://twitter.com/sentidoscomunes" title="Siguenos en Twitter">Twitter</a></li>			<li class="instagram"><a href="https://instagram.com/sentidoscomunes">Instagram</a></li>
		</ul>
		<div class="main_menu">
			<?php wp_nav_menu(array('menu' => 'Main Menu' )); ?>
		</div>
		<div class="search"><a href="#search_form">Search</a></div>
	</nav>
</header>

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