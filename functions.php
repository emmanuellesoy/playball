<?php

/*
* Se activa la opción para la imagen destacada (thumbnails).
*/


if ( function_exists( 'add_theme_support' ) ) {

    add_theme_support( 'post-thumbnails' );

}

//Campos Personalizados para Autor

add_filter('user_contactmethods', 'campos_usuario');

function campos_usuario($user_contactmethods){

    //unset($user_contactmethods['yim']);

    $user_contactmethods['twitter'] = 'Usuario de Twitter';

    return $user_contactmethods;

}

function premiado(){
         
    $meta = get_post_custom($_POST['post_id']);

    $update_prize = $meta['prize'][0] + 1;

    add_post_meta($_POST['post_id'], 'prize', 1, true) or update_post_meta($_POST['post_id'], 'prize', $update_prize);

    $meta = get_post_custom($_POST['post_id']);

    echo $meta['prize'][0];

    //echo 'Gracias';
    
    die();
    
}
 
 /*
 * Se inicializan las funciones por defaul
 */

 add_action('wp_ajax_nopriv_premialo', 'premiado');
 add_action('wp_ajax_premialo', 'premiado');
 
 /*
 * Se inicializan las funciones por defaul
 */

 add_action('wp_ajax_nopriv_premialo', 'premiado');
 add_action('wp_ajax_premialo', 'premiado');

 /*
 * Corta un texto al encontrar el primer punto
 */

function entradas($cadena = '', $puntos = 1){
    
    $offset = 0;
    
    for($i = 0; $i < $puntos; $i++){
        
        $pos = strpos($cadena, '.', $offset);
        
        $offset = $pos + 1;
        
    }
    
    $cadena_cortada = substr($cadena, 0, ++$pos);
    
    return $cadena_cortada;
    
}

/*
 * Recorta una cadena hasta 100 caracteres
 */

function cuenta_recorta($str){
        $str_len = strlen($str);
        if($str_len > 120){
            $str = substr($str, 0, 100).'...';
        }
        return $str;
    }

    function traer_mas()
{

    $query = new WP_Query( $_POST['query'] );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="todoNotaInterna">
            <section class="cuadroUno">
                <?php
                    $custom_fields = get_post_custom();
                    $videoLink = $custom_fields['video'][0];
                ?>
                <?php
                    if($videoLink){
                        if($custom_fields['mlb'][0] == 'Si'){
                            $pos = strpos($videoLink, '&width=');
                            $videoLink = substr_replace($videoLink, '&width=728', $pos, 10);
                            $pos = strpos($videoLink, '&height=');
                            $videoLink = substr_replace($videoLink, '&height=395', $pos, 11);
                        }
                        echo $videoLink;
                    } elseif ( has_post_thumbnail() ){
                         the_post_thumbnail(); 
                    }
                ?>
                <div id="fondo_<?php echo get_the_ID(); ?>" class="cuadroUnoFondo" <?php echo($videoLink) ? 'onmouseover="desaparecer_titulo_id('.get_the_ID().');"' : '' ?>></div>
                <a id="titulo_<?php echo get_the_ID(); ?>" href="<?php echo get_permalink(); ?>" title="Leer más sobre <?php the_title(); ?>" class="cuadroUnoA" >
                    <?php the_title(); ?>
                </a>
                <!--Termina cuadroUnoA -->
            </section>
            <!-- Termina cuadroUno-->
            <section class="cajaNotaInterna">
                <div class="autorNotaInterna">
                    <h4>
                        POR
                    </h4>
                        <?php $autor_tn = get_the_author_meta( 'twitter' ); ?>
                    <div class="cajaTwiterAutor">
                        <?php the_author_posts_link(); ?>
                    </div>
                    <a href="http://twitter.com/<?php echo $autor_tn; ?>" title="<?php the_author(); ?>">
                        <div class="twit"></div>
                    </a>
                    <div class="cajaFechaNotaInterna">
                        | <?php the_date(); ?>
                    </div>
                </div>
                <!-- Termina cajaNotaInterna -->
                <div class="cajaRedesSocial">
                    <div class="cajaRedesFace">
                        <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink()); ?>&amp;send=false&amp;layout=button_count&amp;width=70&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=90&amp;appId=279290438845254" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:90px;" allowTransparency="true"></iframe>
                    </div>
                    <!-- Termina cajaRedesFace -->
                    <div class="cajaRedesTwit">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="IzquierdazoBox" data-lang="es">Twittear</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </div>
                    <!-- Termina cajaRedesTwit -->
                    <div class="cajaRedesGoo">
                        <div class="g-plusone" data-size="medium"></div>
                        <script type="text/javascript">
                          window.___gcfg = {lang: 'es'};

                          (function() {
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/plusone.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                          })();
                        </script>
                    </div>
                    <!-- Termina cajaRedesGoo -->
                    
                    <?php $meta = get_post_custom(); ?>
                    <div class="cajaHit" onclick="premiar(<?php echo get_the_ID(); ?>);">
                        <?php echo ($meta['prize'][0]) ? $meta['prize'][0] : 0; ?>
                    </div>
                    <!-- Termina cajaHit -->
                    <?php $adjacent_post = get_adjacent_post(false, '', true) ; ?>
                    <?php $post_id = $adjacent_post->ID; ?>
                        <!--
                        <a href="<?php echo get_permalink($post_id); ?>">
                            <div class="cajaDescargar">
                            </div>
                        </a>
                        -->
                        <?php $adjacent_post = get_adjacent_post(false, '', false) ; ?>
                        <?php $post_id = $adjacent_post->ID; ?>
                        <!--
                        <a href="<?php echo get_permalink($post_id); ?>">
                            <div class="cajaSuscribirse">
                            </div>
                        </a>
                        -->
                        <?php $adjacent_post = get_adjacent_post(false, '', true) ; ?>
                    <?php $post_id = $adjacent_post->ID; ?>
                        <a class="vernota" href="<?php echo get_permalink(); ?>" title="Leer más sobre <?php the_title(); ?>"></a>
                        <a class="cajaComentar" href="<?php echo get_permalink($post_id); ?>?#c"></a>
                </div>
                <!-- Termina cajaRedesSociales -->
                <?php //if($custom_fields['audio'][0]){ ?>
                
                <?php //} ?>
                <?php if($custom_fields['audio'][0]) { ?>
                    <?php get_template_part('category/radio', 'reproductor'); ?>
                <?php } ?>
                <div class="textoNota">
                    <?php
                    the_excerpt();
                ?>
                </div>
                <!-- Termina textoNota-->
            </section>
            <!-- Termina cajaNotaInterna-->
        </div>
        <!-- Termina todoNotaInterna-->
    <?php endwhile; else: ?>
    <p>
        <?php _e('Sorry, no posts matched your criteria.'); ?>
    </p>
    <?php endif;
    die();
}

    /*
     * Se inicializan las funciones por defecto
     */

     add_action('wp_ajax_nopriv_traer_mas', 'traer_mas');
     add_action('wp_ajax_traer_mas', 'traer_mas');
     
?>