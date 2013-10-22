<section id="destacadas" class="contieneMasRecientes">
<?php query_posts('category_name=destacadas&posts_per_page=4'); ?>
    <?php $contador = 1; ?>
    <?php while (have_posts()) : the_post(); ?>
    	<?php
    		switch ($contador) {
    			case 2:
    				$clase = 'notasMasRecienteUno';
    				break;
    			case 3:
    				$clase = 'notasMasRecientesDos';
    				break;
				case 4:
    				$clase = 'notasMasRecienteTres';
    				break;
    			default:
    				$clase = '';
    				break;
    		}
    	?>
		<div class="notasMasReciente <?php echo $clase; ?>">
			<?php
                    $custom_fields = get_post_custom();
                    $videoLink = $custom_fields['video'][0];
                ?>
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
		<?php $contador++; ?>
	<?php endwhile; ?>
</section>