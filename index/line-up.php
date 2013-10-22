<section id="lineUp" class="lineUp">
	<h2>
		<img src="<?php bloginfo('template_directory');?>/img/lineUpDelDia.png" title="Lineup del Día">
	</h2>
	<ul class="lineUpLista">        
        <?php

            function filter_where( $where = '' ) {

            $where .= " AND post_date > '" . date('Y-m-d', strtotime('-72 hours')) . "'";

            return $where;

        }

        add_filter( 'posts_where', 'filter_where' );

        $args = array(

            'meta_key' => 'readed',

            'orderby' => 'meta_value_num',

            'order' => 'DESC',
            
            'posts_per_page' => 9

                );

        $query = new WP_Query($args);

        remove_filter( 'posts_where', 'filter_where' );
        ?>
        <?php $contador = 1; ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
        	<li>
            <span class="numero"><?php echo $contador; ?></span>
        		<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php $meta = get_post_custom(get_the_ID()); ?>
                    <?php if($meta['Subtitulo'][0]){ ?>
                        <?php echo $meta['Subtitulo'][0]; ?>
                    <?php } else { ?>
                        <?php the_title(); ?>
                    <?php } ?>
            	</a>
        	</li>
        	<?php  $contador++; ?>
    	<?php endwhile; ?>
	</ul><!-- Termina lista -->
</section><!-- Termina lineUp -->