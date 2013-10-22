<footer class="footerPrincipal">
	<div class="imagenesFooter">
		<div class="ImagenesFooterUno">
            <a href="<?php bloginfo('wpurl') ?>">
				<img src="<?php bloginfo('template_url'); ?>/img/imglogofooter.png" alt="#" title="#">
			</a>
		</div>
		<div class="imagenBarraFooter">
			Copyright © 2013 pelotapimienta.mx. Todos los derechos reservados.
		</div>
	</div>
	<div class="cajaBuscar">
	    <form method="get" id="searchform" action="<?php bloginfo('wpurl') ?>">
			<input type="text" id="s" name="s" placeholder="Buscar">
		</form>
		<!--
		<div class="contactos">
		
			<a href="" title="">
				Nosotros
			</a>
			<a href="" title="">
				- Contacto -
			</a>
			<a href="" title="">
				Publicidad
			</a>
		-->
		</div>
        <div class="redSocialFooter">
            <a href="<?php bloginfo('rss2_url'); ?>" target="_blank">
        	   <div class="socialesSuscribir"></div>
            </a>
            <a href="https://twitter.com/Pelotapimienta" target="_blank">
            	<div class="socialesTwiter"></div>
            </a>
            <a href="https://www.facebook.com/pages/Pelota-Pimienta/568453879864144" target="_blank">
                <div class="socialesFacebook"></div>
        	</a>
        <!--   
            <div class="socialesYoutube"></div>
        -->
        </div>
	</div>
	<?php get_template_part('general/tikitaka', 'footer'); ?>
</footer>