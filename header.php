<!DOCTYPE html>
<html>
    <head>
        <title><?php if(is_home()): bloginfo('name'); else : wp_title(''); endif; ?></title>
        <link href="<?php bloginfo('template_url'); ?>/css/normalize.css" type="text/css" rel="stylesheet" />      
        <?php wp_head(); ?>
    </head>
    <body>
        <header class="headerPrincipal">
            <a href="<?php bloginfo('wpurl') ?>">
                <img src="<?php bloginfo('template_url'); ?>/img/logoPelota.png">
            </a>
            <div class="redSocial">
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
                <div class="menu">
                	<div class="menuUno">
                	</div>
                	<ul>
                        <li>
                            <a href="<?php bloginfo('wpurl'); ?>" title="Pelota Pimienta">
                                INICIO
                            </a>
                        </li>
                		<li>
                			<a href="<?php bloginfo('wpurl'); ?>/category/destacadas" title="Noticias Destacadas">
                				DESTACADAS
                			</a>
                		</li>
                		<li>
                			<a href="<?php bloginfo('wpurl'); ?>/category/pimienta-tv" title="Pimienta TV">
                				PIMIENTA TV
                			</a>
                		</li>
                		<li>
                			<a href="<?php bloginfo('wpurl'); ?>/category/radio-pimienta" title="Radio Pimienta">
                				RADIO PIMIENTA
                			</a>
                		</li>
                	</ul>
                </div>
        </header>