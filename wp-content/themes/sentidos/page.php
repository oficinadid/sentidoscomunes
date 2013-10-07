<?php get_header(); ?>
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

		<article>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</article>

		<?php endwhile; ?>

		<nav>
			<?php dynamic_sidebar( 'Page Sidebar' ); ?>
		</nav>

	</section>

<?php get_footer(); ?>