<?php query_posts('category_name=dia-como-hoy&posts_per_page=1'); ?>
<?php while (have_posts()) : the_post(); ?>
		<section class="comoHoy comoHoyInterna">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				<div class="cuadroComoHoy"></div>
			</a>
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>			
			<h3>
				<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
					UN DÍA COMO HOY
				</a>
			</h3>
			<span>
				<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_title(); ?>
				</a>
			</span>
		</section>
	</a>
<?php endwhile; ?>