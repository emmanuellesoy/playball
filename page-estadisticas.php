<?php get_header(); ?>
<section class="contieneTodo">
	<div class="contieneTodoFondo">
		<header class="estadisticasHeader">
			ESTADÍSTICAS
		</header>
		<div class="estadisticasBotones">
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/scoreboard.php');">Scoreboard</button>
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/lideres_bateo.php');">Lideres de bateo</button>		
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/lideres_pitcheo.php');">Lideres de picheo</button>		
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/bateo_equipos.php');">Bateo Equipos</button>		
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/pitcheo_equipos.php');">Pitcheo Equipos</button>
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/top5_bateo.php');">Top 5 bateo</button>	
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/top5_pitcheo.php');">Top 5 Pitcheo</button>		
				<button onclick="caragr_frame_estadisticas('http://www.lmp.mx/livedata/miniscore.php');">Miniscore</button>
		</div>
		<div id="estadisticasFrame">
			<iframe id="frame" src="" frameborder="0" width="1062" height="0"></iframe>
		</div>
		<?php get_template_part('general/footer', 'general'); ?>
	</div><!-- Termina contieneTodoFondio -->
</section><!--Termina contieneTodo -->
<?php get_footer();?>