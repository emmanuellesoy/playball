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

?>