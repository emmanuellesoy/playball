<section id="lineUp" class="lineUp">
	<h2>
		LINEUP DEL DIA
	</h2>
	<ul class="lineUpLista">
		<?php query_posts('posts_per_page=9'); ?>
        <?php $contador = 1; ?>
        <?php while (have_posts()) : the_post(); ?>
        	<li>
            <span class="numero"><?php echo $contador; ?></span>
        		<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
            	</a>
        	</li>
        	<?php  $contador++; ?>
    	<?php endwhile; ?>
	</ul><!-- Termina lista -->
</section><!-- Termina lineUp -->