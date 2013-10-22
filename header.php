<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php if(is_home()): bloginfo('name'); else : wp_title(''); endif; ?></title>
        <link href="<?php bloginfo('template_url'); ?>/css/normalize.css" type="text/css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="<?php bloginfo('template_url'); ?>/css/index.css" type="text/css" rel="stylesheet">
        <?php if(is_category() || is_author() || is_search()){ ?>
            <link href="<?php bloginfo('template_url'); ?>/css/category.css" type="text/css" rel="stylesheet" />
        <?php } ?>      
        <?php if(is_single()){ ?>
            <link href="<?php bloginfo('template_url'); ?>/css/single.css" type="text/css" rel="stylesheet" />
        <?php } ?>
        <?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari')){ ?>
            <link href="<?php bloginfo('template_url'); ?>/css/apple.css" type="text/css" rel="stylesheet" />
        <?php } ?>
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/prefixfree.min.js"></script> 
        <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script> 
        <?php wp_head(); ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>    
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    </head>
    <body>
        <?php if(function_exists(validate_dax_tag())){ validate_dax_tag(); } ?>
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
        