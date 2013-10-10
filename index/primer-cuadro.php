<section class="primerCuadro">
<?php query_posts('category_name=diamante&posts_per_page=1'); ?>
        <?php while (have_posts()) : the_post(); ?>
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
                        echo '<div class="primerCuadroFondo"></div>';
                         the_post_thumbnail(); 
                    }
                ?>
				<a href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                	<?php the_title(); ?>
            	</a>
				<!--
                <div class="banner">
					<div class="bolitas">
					</div>
					<div class="bolitas">
					</div>
					<div class="bolitas">
					</div>
					<div class="bolitas">
					</div>
					<div class="bolitasHover">
					</div>
				</div>
                -->
		<?php endwhile; ?>
</section>
