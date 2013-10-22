<?php query_posts('category_name=diamante&posts_per_page=4'); ?>
<?php $contador = 0; ?>
    <section class="primerCuadro">
    <?php while (have_posts()) : the_post(); ?>
        <section class="primerCuadro-<?php echo $contador; ?> primerCuadro-<?php echo get_the_ID(); ?> <?php if(!isset($primerCuadroHidden)) { $primerCuadroHidden = 'primerCuadroHidden'; } else { echo $primerCuadroHidden; }  ?>">
            <?php if ( has_post_thumbnail() ){
                echo '<div class="primerCuadroFondo"></div>';
                 the_post_thumbnail(); 
            }
            ?>
			<a class="tituloCarrusel" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
                <?php $meta = get_post_custom(get_the_ID()); ?>
                <?php if($meta['Subtitulo'][0]){ ?>
                    <?php echo $meta['Subtitulo'][0]; ?>
                <?php } else { ?>
                    <?php the_title(); ?>
                <?php } ?>
        	</a>			
            <div class="banner">
				<div class="bolitas <?php echo ($contador == 0) ? 'bolitasActive' : ''; ?>" onclick="cambiarCuadro(0);"></div>
				<div class="bolitas <?php echo ($contador == 1) ? 'bolitasActive' : ''; ?>" onclick="cambiarCuadro(1);"></div>
				<div class="bolitas <?php echo ($contador == 2) ? 'bolitasActive' : ''; ?>" onclick="cambiarCuadro(2);"></div>
				<div class="bolitas <?php echo ($contador == 3) ? 'bolitasActive' : ''; ?>" onclick="cambiarCuadro(3);"></div>
				<div class="bolitasHover">
				</div>
			</div>
    </section>
    <?php $contador++; ?>
<?php endwhile; ?>
</section>