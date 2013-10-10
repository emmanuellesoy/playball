<section class="imagenDia">
	<?php query_posts('category_name=imagen-del-dia&posts_per_page=1'); ?>
    <?php while (have_posts()) : the_post(); ?>
	<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
		<div class="degradadoImagenDia">
		</div>
		<h4>
        	<?php the_title(); ?>
		</h4>
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	</a>
<?php endwhile; ?>
</section>