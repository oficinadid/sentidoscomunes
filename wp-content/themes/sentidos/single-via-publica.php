
<?php get_header(); ?>

	<?php 
		$category = get_the_category();
		$cat_name = $category[0]->cat_name;
		$cat_id = get_cat_ID( $cat_name );
		$cat_link = get_category_link($cat_id);
	?> 

	<ul class="wrapper nav_bar">
		<li>Estas en: </li>
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Sentidos Comunes</a> ›</li>
		<li><a href=" <?php echo esc_url( home_url( '/via-publica' ) ); ?> "> <?php echo $cat_name; ?> </a> ›</li>
		<li><?php the_title();?></li>
	</ul>


	<section id="reportaje" class="full">
	

	<section class="full">
		<figure class="feat_img">
			<?php the_post_thumbnail('1280'); ?>
		</figure>
		<header class="wrapper">
			<div class="space">
				<div class="titles">
					<big>Vía Pública</big>
					<h1 class="title"><?php the_title(); ?></h1>
					<ul>
						<li><?php the_date()?></li>
						<?php edit_post_link('Editar', '<li>', '</li>'); ?>
					</ul>
				</div>
			</div>
			<ul class="autores">
				<?php if (get_field('fotografo')): ?>
					<li><strong>FOTOGRAFÍA</strong> <em><?php the_field('fotografo'); ?></em></li>
				<?php endif ?>
				<?php if (get_field('columnista')): ?>
					<li><strong>TEXTO</strong> <em><?php the_field('columnista'); ?></em></li>
				<?php endif ?>
			</ul>
		</header>
		<div class="full white">
			<ul class="social">
				<li class="twitter"><a href="https://twitter.com/share/" title="Compartir: <?php the_title(); ?>" target="_blank">Twitter</a></li>
				<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Facebook</a></li>
				<li class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Google</a></li>
			</ul>
			<ul class="tags">
				<li><strong>Claves:</strong></li>
				<?php 
					if(get_the_tag_list()) {
					    echo get_the_tag_list('<li>','</li><li>','</li>');
					}
				?>
			</ul>
		</div>
	</section>

	<article class="full grey">
		<?php while(the_repeater_field('galeria')): ?>		
			<div class="image">
				<?php echo wp_get_attachment_image( get_sub_field('imagen'), '1280' ) ?>
				<?php if (get_sub_field('caption')): ?>
					<div class="wrapper">
						<?php if (get_sub_field('titulo')): ?>
							<h3><?php the_sub_field('titulo') ?></h3>
						<?php endif ?>
						<div><?php the_sub_field('caption') ?></div>
					</div>
				<?php endif ?>
			</div>
		<?php endwhile; ?>
	</article>

</section>

<?php get_footer(); ?>