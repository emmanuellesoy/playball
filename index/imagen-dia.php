<section class="imagenDia">
	<?php query_posts('category_name=imagen-del-dia&posts_per_page=1'); ?>
    <?php while (have_posts()) : the_post(); ?>
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
		<div class="degradadoImagenDia">
		</div>
		<div class="tituloImagenDia">
			<img src="<?php bloginfo('template_url'); ?>/img/imagendia.png" alt="#" title="#">
		</div>
		<h2>
			<?php $meta = get_post_custom(get_the_ID()); ?>
			<?php if($meta['Subtitulo'][0]){ ?>
				<?php echo $meta['Subtitulo'][0]; ?>
			<?php } else { ?>
				<?php the_title(); ?>
			<?php } ?>
		</h2>
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	</a>
<?php endwhile; ?>
</section>