<section id="pimientaTv" class="pimientaTv">
	<h2>
		PIMIENTA TV
	</h2>
	<?php query_posts('category_name=pimienta-tv&posts_per_page=1'); ?>
    <?php while (have_posts()) : the_post(); ?>
    	<div class="cajaPimientaTV">
		<h3>
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
            	<?php the_title(); ?>
        	</a>
		</h3>
		<div class="texto">
			<?php the_excerpt(); ?>
		</div>
	</div>
	<div class="cajaVideo">
	<?php
	  $custom_fields = get_post_custom();
	  $videoLink = $custom_fields['video'][0];
	?>
	<?php 
		if($custom_fields['mlb'][0] == 'Si'){
			$pos = strpos($videoLink, '&width=');
			$videoLink = substr_replace($videoLink, '&width=650', $pos, 10);
			$pos = strpos($videoLink, '&height=');
			$videoLink = substr_replace($videoLink, '&height=365', $pos, 11);
		}
	?>
	<?php echo $videoLink; ?>
	</div>
	<?php endwhile; ?>
</section>