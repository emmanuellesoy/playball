<div class="footerListas">
	<h4>
		VISITA MÁS SITIOS DE TIKI TAKA SPORTS NETWORK
	</h4>
	<div class="listaCiudadDeportiva">
		<a href="http://www.laciudaddeportiva.com/">
			<div class="imagenCiudadDeportiva"></div>
		</a>
		<p>
			Las mejores historias del deporte
		</p>
		<div class="listaCiudadDeportivaLinea"></div>
		<?php 
			wprss_display_feed_items( $args = array(
				'links_before' => '<ul>',
				'links_after' => '</ul>',
				'link_before' => '<li>',
				'link_after' => '</li>',
				'limit' => '5',
				'source' => '275'
			));
		?>
	</div>
	<div class="listaIzquierdazo">
	<a href="http://izquierdazo.com/">
		<div class="imagenIzquierdazo"></div>
	</a>
		<p>
			El mundo del boxeo
		</p>
		<div class="listaIzquierdazoLinea">
		</div>
		<?php 
			wprss_display_feed_items( $args = array(
				'links_before' => '<ul>',
				'links_after' => '</ul>',
				'link_before' => '<li>',
				'link_after' => '</li>',
				'limit' => '5',
				'source' => '284'
			));
		?>
	</div>
	<div class="listaPelotaPimienta">
	<a href="http://www.pelotapimienta.mx/">
		<div class="imagenPelotaPimienta"></div>
	</a>
		<p>
			Cocinando emociones desde el campo de los sueños
		</p>
		<a href="http://www.pelotapimienta.mx/">
			<div class="listaPelotaPimientaLinea"></div>
		</a>
		<?php 
			wprss_display_feed_items( $args = array(
				'links_before' => '<ul>',
				'links_after' => '</ul>',
				'link_before' => '<li>',
				'link_after' => '</li>',
				'limit' => '5',
				'source' => '305'
			));
		?>
	</div>
	<div class="footerFinal">
		Copyright © 2013 Tiki Taka Sports Network 
		<p>
			Todos los derechos reservados.
		</p>
	</div>
</div>