<section id="pimientaTv" class="pimientaTv">
	<h2>
		PIMIENTA TV
	</h2>
	<?php query_posts('category_name=pimienta-tv&posts_per_page=3'); ?>
	<?php $contador = 0; ?>
    <?php while (have_posts()) : the_post(); ?>
    <section class="todoPimientaTV pimientaTV-<?php echo $contador; ?> pimientaTV-<?php echo get_the_ID(); ?> <?php if(!isset($pimientaTVHidden)) { $pimientaTVHidden = 'pimientaTVHidden'; } else { echo $pimientaTVHidden; }  ?>">
    	<div class="cajaPimientaTV">
		<h3>
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				<?php $meta = get_post_custom(get_the_ID()); ?>
				<?php if($meta['Subtitulo'][0]){ ?>
					<?php echo $meta['Subtitulo'][0]; ?>
				<?php } else { ?>
					<?php the_title(); ?>
				<?php } ?>
        	</a>
		</h3>
		<div class="cajaPimientaTvLinea">
		</div>
		<div class="texto">
			<?php the_excerpt(); ?>
		</div>
		<div class="videoFlechas">
			<span onclick="cambiarCuadroPimienta(<?php echo ($contador != 0) ? ($contador - 1) : 2; ?>);" ><</span>
			<span onclick="cambiarCuadroPimienta(<?php echo ($contador != 2) ? ($contador + 1) : 0; ?>);">></span>
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
    </section>
    <?php $contador++; ?>
	<?php endwhile; ?>
</section>