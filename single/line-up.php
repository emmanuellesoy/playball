<section class="lineUp lineUpSubUno">
	<h2>
		LINEUP DEL DIA
	</h2>
	<ol class="lineUpDia lineUpsubDos">
		<?php query_posts('posts_per_page=9'); ?>
        <?php $contador = 1; ?>
        <?php while (have_posts()) : the_post(); ?>
        	<?php if($contador == 1){ ?>
        		<div class="lineUpUno lineUpSubTres">
            <?php } elseif ($contador == 9) { ?>
                <div class="lineUpDos lineUpCuatro">
            <?php } ?>
            <li>
                <div class="numero">
                    <?php echo $contador; ?>
                </div>
                <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                	<?php the_title(); ?>
            	</a>
        	</li>
        	<?php if($contador == 1 || $contador == 9){ ?>
        		</div>
        	<?php } ?>
        	<?php  $contador++; ?>
    	<?php endwhile; ?>
	</ol>
    <!-- Termina lineUpDia -->
</section>
<!-- Termina lineUp -->