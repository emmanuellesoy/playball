<aside class="columna">
	<?php get_template_part('single/autor', 'nota'); ?>
	<div class="anuncioUnoColumna">
		<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Half Page Banner -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:600px"
		     data-ad-client="ca-pub-3477318490672713"
		     data-ad-slot="9007854122">
		 </ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<!-- Termina anuncioUnoColumna -->
	<?php $categories = get_the_category(); ?>
	<?php $the_id = get_the_ID(); ?>
	<?php if($categories) { ?>
		<?php foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id; ?>
		<?php query_posts('cat='.$category_ids[0].'&posts_per_page=3'); ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if(get_the_ID() != $the_id){ ?>
			<div class="notasColumnaReciente">
				<?php
					$custom_fields = get_post_custom();
					$videoLink = $custom_fields['video'][0];
				?>
				<?php
					if($videoLink){
						if($custom_fields['mlb'][0] == 'Si'){
							$pos = strpos($videoLink, '&width=');
							$videoLink = substr_replace($videoLink, '&width=300', $pos, 10);
							$pos = strpos($videoLink, '&height=');
							$videoLink = substr_replace($videoLink, '&height=160', $pos, 11);
						}
						echo $videoLink;
					} elseif ( has_post_thumbnail() ){
						 the_post_thumbnail('frontera'); 
					}
				?>
				<h3>
					<a href="<?php echo get_permalink(); ?>" title="Leer más sobre <?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
					<SPAN>
						por <?php the_author(); ?>
					</SPAN>
				</h3>
			</div>
			<!-- Termina notasColumnaRecente -->
			<?php } ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
	<?php } ?>
	<?php get_template_part('single/como', 'hoy'); ?>
	<?php get_template_part('single/line', 'up'); ?>
	</aside>
	<!-- Termina columna -->