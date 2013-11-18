<section class="siguenos">
	<div class="content-siguenos">
		<h3>Sigue a <strong>Sentidos Comunes</strong> en</h3>
		<ul>
			<li><a href="https://www.facebook.com/revistasentidoscomunes" target="_blank"><span class="fb"></span><p>Facebook</p></a></li>
			<li><a href="https://twitter.com/sentidoscomunes" target="_blank"><span class="tw"></span><p>Twitter</p></a></li>
			<li><a href="http://instagram.com/sentidoscomunes/" target="_blank"><span class="ins"></span><p>Instagram</p></a></li>
		</ul>
	</div>
	
</section>

<footer class="full">

	<div class="wrapper">
		<section class="logo">
			<big>Sentidos <strong>Comunes</strong></big>
		</section>
<!-- 
		<section class="welike">
			<h4>Nos Gusta</h4>
			<div class="scroll">
				<a href="" class="next">Avanza</a>

				<?php
				$args = array(
					'post_type' => 'page',
					'page_id' => 2
				);
				$nosgusta = new WP_Query($args);
			
				if($nosgusta->have_posts()) : while($nosgusta->have_posts()): $nosgusta->the_post(); ?>

					<?php while(the_repeater_field('nos_gusta')): ?>

						<article>
							<h3><a href="<?php the_sub_field('url') ?>"><?php the_sub_field('titulo') ?></a></h3>
							<p><?php the_sub_field('descripcion') ?></p>
						</article>

					<?php endwhile; ?>

				
			
				<?php endwhile;
				wp_reset_postdata();
				endif; ?>
				
				<a href="" class="prev">Retrocede</a>
			</div>
		</section>
-->
		<nav>
			<ul>
				<li><h4>Sobre Nosotros:</h4></li>
				<li><a href="<?php echo get_bloginfo(url); ?>/quienes-somos">Quienes Somos </a></li>
				<li><a href="<?php echo get_bloginfo(url); ?>/colaboradores">Colaboradores</a></li>
				<li><a href="<?php echo get_bloginfo(url); ?>/contacto">Contacto</a></li>
				<li><a href="<?php echo get_bloginfo(url); ?>/politicas-de-privacidad">Políticas de Privacidad</a></li>
			</ul>
			<ul>
				<li><h4>Conectate:</h4></li>
				<li><a href="http://www.sentidoscomunes.cl/agenda/">Agenda</a></li>
				<li><a href="http://www.sentidoscomunes.cl/feed/">RSS</a></li>
				<li><a href="#">Newsletter</a></li>
			</ul>
			<ul>
				<li><h4>Encuentranos en:</h4></li>
				<li><a href="https://twitter.com/sentidoscomunes">Twitter</a></li>
				<li><a href="https://www.facebook.com/revistasentidoscomunes">Facebook</a></li>
				<li><a href="https://instagram.com/sentidoscomunes">Instagram</a></li>
			</ul>
			<ul>
				<li><h4>Canales:</h4></li>
				<li><a href="#">Playlist</a></li>
				<li><a href="#">SC TV</a></li>
			</ul>
		</nav>
	</div>
	<div class="wrapper">
		<h5><a rel="license" class="img" href="http://creativecommons.org/licenses/by-nc/3.0/deed.es_ES"><img alt="Licencia de Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc/3.0/80x15.png" /></a>Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc/3.0/deed.es_ES">licencia de Creative Commons Reconocimiento-NoComercial 3.0 Unported</a>. | Sentidos Comunes 2013</h5>
	</div>
</footer>

<?php wp_footer(); ?>
<script>
	var addToHomeConfig = {
		returningVisitor: true,
		expire: 720	
	};
</script>
<script src="<?php bloginfo('template_url') ?>/inc/js/add2home.js"></script>


<script type="text/javascript">

/* disqus
/* ------------------------------------ */ 

//<![CDATA[
(function() {
    var links = document.getElementsByTagName('a');
    var query = '?';
    for(var i = 0; i < links.length; i++) {
    if(links[i].href.indexOf('#disqus_thread') >= 0) {
        query += 'url' + i + '=' + encodeURIComponent(links[i].href) + '&';
    }
    }
    document.write('<script charset="utf-8" type="text/javascript" src="http://disqus.com/forums/sentidoscomunes/get_num_replies.js' + query + '"></' + 'script>');
})();
//]]>

  /* Analytics */
  /* ------------------------------------ */ 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10133338-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>