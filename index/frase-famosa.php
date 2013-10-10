<section class="fraseFamosa">
<?php query_posts('category_name=la-frase&posts_per_page=1'); ?>
<?php while (have_posts()) : the_post(); ?>
	<h3>
		<?php the_title(); ?> 
		<SPAN>
			<?php
			  $custom_fields = get_post_custom();
			  $personaje = $custom_fields['personaje'][0];
			?>
			<?php echo $personaje; ?>
		</SPAN>
	</h3>
	<?php endwhile; ?>
</section>