<?php 
/*
	Template Name: Streaming
*/
get_header(); 
?>
	<ul class="wrapper nav_bar">
		<li>Estas en: </li>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Sentidos Comunes</a> ›</li>
		<li><?php the_title();?></li>
	</ul>

	<section id="page" class="wrapper">
		<?php while ( have_posts() ) : the_post(); ?>

		<header class="full">
			<h1 class="title"><?php the_title(); ?></h1>
		</header>

		<div class="cf"></div>

		<article class="streaming">
			
			<iframe width="530" height="298" src="//www.youtube.com/embed/_WJ3Fli7iYY?list=FLUItTVp98YRtNLjzGgFfH3g" frameborder="0" allowfullscreen></iframe>

		</article>

		<?php endwhile; ?>


	</section>

<?php get_footer(); ?>