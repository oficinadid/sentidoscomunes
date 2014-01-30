<section id="reportaje" class="full">

	<section class="full">
		<header class="wrapper">
			<div class="space">
				<div class="titles">
					<big>Sentidos Comunes TV</big>
					<h1 class="title"><?php the_title(); ?></h1>
					<ul>
						<li><?php the_date()?></li>
						<?php edit_post_link('Editar', '<li>', '</li>'); ?>
					</ul>
				</div>
			</div>

		</header>
	</section>

	<article class="full grey">
		<div class="image wrapper">
			<?php the_content(); ?>
		</div>
	</article>

</section>