<?php query_posts('category_name=dia-como-hoy&posts_per_page=1'); ?>
<?php while (have_posts()) : the_post(); ?>
		<section class="comoHoy">
			<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				<div class="cuadroComoHoy"></div>
				<div class="cuadroComoHoySepia"></div>
			</a>
			<?php $meta = get_post_custom(get_the_ID()); ?>
			<?php if($meta['Portada'][0]){ ?>
			<img alt="<?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo $meta['Portada'][0]; ?>" />
			<?php } else { ?>
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			<?php } ?>
			<h3>
				<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
					UN DÍA COMO HOY
				</a>
			</h3>
			<div class="notaComoHoy">
				<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if($meta['Subtitulo'][0]){ ?>
						<?php echo $meta['Subtitulo'][0]; ?>
					<?php } else { ?>
						<?php the_title(); ?>
					<?php } ?>
				</a>
			</div>
		</section>
	</a>
<?php endwhile; ?>