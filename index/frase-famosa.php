<section class="fraseFamosa">
<?php query_posts('category_name=la-frase&posts_per_page=1'); ?>
<?php while (have_posts()) : the_post(); ?>
	<h3>
		<?php $meta = get_post_custom(get_the_ID()); ?>
		<?php if($meta['Subtitulo'][0]){ ?>
			<?php echo $meta['Subtitulo'][0]; ?>
		<?php } else { ?>
			<?php the_title(); ?>
		<?php } ?>
	</h3>
		<SPAN>
			<?php
			  $custom_fields = get_post_custom();
			  $personaje = $custom_fields['personaje'][0];
			?>
			<?php echo $personaje; ?>
		</SPAN>
	<?php endwhile; ?>
</section>