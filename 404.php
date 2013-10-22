<?php get_header(); ?>
<section class="contieneTodo">
	<div class="contieneTodoFondo">
		<section class="error404">
			<div class="error404Texto">
				<h2>¡TE VOLASTE LA BARDA!</h2>
				<p>Tanto que te saliste del campo reconocido por Pelota Pimienta.</p>
				<p>Lanza la bola y sigue navegando con nosotros a través de nuestros atajos.</p>
				<h3>ERROR 404</h3>
			</div>
			<a href="<?php bloginfo('wpurl'); ?>">
				<img src="<?php bloginfo('template_directory'); ?>/img/bat.png" alt="Bat">
			</a>
			<section class="notasRecientesWrap">
				<?php query_posts('category_name=destacadas&posts_per_page=4'); ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="notasMasReciente">
						<?php
			                    $custom_fields = get_post_custom();
			                    $videoLink = $custom_fields['video'][0];
			                ?>
    						<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
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
				                        
				                         the_post_thumbnail(); 
				                    }
				                ?>
			            	</a>
						<h3>
						<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
			                <?php $meta = get_post_custom(get_the_ID()); ?>
			                <?php if($meta['Subtitulo'][0]){ ?>
			                    <?php echo $meta['Subtitulo'][0]; ?>
			                <?php } else { ?>
			                    <?php the_title(); ?>
			                <?php } ?>
			        	</a>
						<div class="span">
							por <?php the_author(); ?>
						</div>
						</h3>
					</div>
				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>
			</section>
		</section>
		<?php get_template_part('general/footer', 'general'); ?>
	</div><!-- Termina contieneTodoFondio -->
</section><!--Termina contieneTodo -->
<?php get_footer();?>