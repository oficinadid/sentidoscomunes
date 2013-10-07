<?php get_header(); ?>


<div id="home_main" class="wrapper">
	<?php
		// Get the featured content, show it only in frontpage
		if (is_home()) : get_template_part( 'loop', 'home_news' );
		endif;

		// Get the featured content, show it only in frontpage
		if (is_home()) : get_template_part( 'loop', 'home_archive' );
		endif;
	?>
	<section id="main-primary" class="sidebar">
<!--		<div class="banner">
			<a href="http://www.sentidoscomunes.cl/infografia-los-jovenes-y-su-intencion-de-voto/"><img src="<?php echo get_template_directory_uri(); ?>/inc/banners/vota-300x300.gif" /></a>
		</div>
-->

		<a class="banner" href="http://www.sentidoscomunes.cl/categoria/infografias/">
			<img src="http://www.sentidoscomunes.cl/wp-content/uploads/2013/07/gif-infografias.gif">
		</a>

		<div class="newsletter">
			<h4>¿Quieres que te mantengamos informado?</h4>
			<?php gravity_form(1, false, false, false, '', true); ?>
		</div>
		
		<a class="banner-nottp" href="http://tppabierto.net/">
			<img style="float:left;" src="http://www.sentidoscomunes.cl/wp-content/uploads/2013/07/notpp-320.gif">
		</a>
		
		<?php dynamic_sidebar( 'Main Sidebar' ); ?>
		
	</section>

	<?php
		// Get the featured content, show it only in frontpage
		if (is_home()) : get_template_part( 'loop', 'home_video' );
		endif;
	?>

</div>

<?php get_footer(); ?>