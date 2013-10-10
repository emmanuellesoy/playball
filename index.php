<?php get_header(); ?>
<section class="contieneTodo">
	<div class="contieneTodoFondo">
		<?php get_template_part('index/primer', 'cuadro'); ?>
		<?php get_template_part('anuncios/box', 'banner'); ?>
		<?php get_template_part('anuncios/mini', 'banner'); ?>
		<?php get_template_part('index/radio', 'pimienta'); ?>
		<?php get_template_part('index/line', 'up'); ?>
		<?php get_template_part('index/mas', 'recientes'); ?>
		<?php get_template_part('index/pimienta', 'tv'); ?>
		<section class="bannerEstadisticas">
			<?php get_template_part('anuncios/super', 'banner'); ?>
			<?php get_template_part('index/las', 'estadisticas'); ?>
		</section>
		<?php get_template_part('index/como', 'hoy'); ?>
		<?php get_template_part('index/imagen', 'dia'); ?>
		<!--<?php get_template_part('index/frase', 'famosa'); ?>-->
		<?php get_template_part('general/footer', 'general'); ?>
	</div><!-- Termina contieneTodoFondio -->
</section><!--Termina contieneTodo -->
<?php get_footer();?>