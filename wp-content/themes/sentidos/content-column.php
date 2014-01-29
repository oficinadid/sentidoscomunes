<section id="content" class="wrapper">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="full">
			<div class="titles">
				<ul class="tags">
					<li><strong>Claves:</strong></li>
					<?php 
						if(get_the_tag_list()) {
						    echo get_the_tag_list('<li>','</li><li>','</li>');
						}
					?>
				</ul>
				<big><?php $category = get_the_category(); echo $category[0]->cat_name; ?></big>
				<h1 class="title"><?php the_title(); ?></h1>
			</div>
		</header>

		<section class="content">

			<div id="the_content">
				<div class="source">
					<img src="<?php print_r(the_field('foto_columnista')); ?>">

					<?php if (get_field('columnista')): ?>
					<span><strong>Por:</strong> <?php the_field('columnista'); ?>, <?php echo get_the_date(); ?></span>	
					<?php else: ?>
						<span><strong>Por:</strong> <?php the_author_posts_link(); ?>, <?php echo get_the_date(); ?></span>
					<?php endif ?>
					
				</div>
				<?php the_content(); ?>
			</div>
			<div id="comments">
				<?php comments_template( '', true ); ?>
			</div>
		</section>

	</article>

	<?php get_template_part( 'sidebar', 'single' ); ?>

</section>	