<section id="reportaje" class="full">


	<section class="full">
		<figure class="feat_img">
			<?php the_post_thumbnail('1280'); ?>
		</figure>
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
		<div class="full white">
			<ul class="social">
				<li class="twitter"><a href="https://twitter.com/share/" title="Compartir: <?php the_title(); ?>" target="_blank">Twitter</a></li>
				<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Facebook</a></li>
				<li class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Compartir: <?php the_title(); ?>" target="_blank">Google</a></li>
			</ul>

		</div>
	</section>

	<article class="full grey">

			<div class="image">


						<?php the_content(); ?>


			</div>

		<div class="social full">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="sentidoscomunes" data-lang="es" data-related="sentidoscomunes">Twittear</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

			<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
		</div>
	</article>



</section>