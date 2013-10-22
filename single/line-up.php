<section class="lineUp lineUpSubUno">
	<h2>
        <img src="<?php bloginfo('template_directory');?>/img/masHiteadas.png" title="Las más hitteadas">
    </h2>
	<ol class="lineUpDia lineUpsubDos">
        <?php

            function filter_where( $where = '' ) {

            $where .= " AND post_date > '" . date('Y-m-d', strtotime('-36 hours')) . "'";

            return $where;

        }

        add_filter( 'posts_where', 'filter_where' );

        $args = array(

            'meta_key' => 'prize',

            'orderby' => 'meta_value_num',

            'order' => 'DESC',
            
            'posts_per_page' => 9

                );

        $query = new WP_Query($args);

        remove_filter( 'posts_where', 'filter_where' );
        ?>
        <?php $contador = 1; ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
        	<?php if($contador == 1){ ?>
        		<div class="lineUpUno lineUpSubTres">
            <?php } elseif ($contador == 9) { ?>
                <div class="lineUpDos lineUpCuatro">
            <?php } ?>
            <li>
                <div class="numero">
                    <?php echo $contador; ?>
                </div>
                <?php $custom_fields = get_post_custom(); ?>
                <a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                	<?php if($custom_fields['subtitulo']){
                        echo $custom_fields['subtitulo'];
                    } else {
                     the_title();
                    } ?>
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