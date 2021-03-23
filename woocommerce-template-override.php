<?php
/**
* Plugin Name: Woocommerce Template Override
* Plugin URI: https://developer.wordpress.org/
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: WordPress.org`
* Author URI: https://developer.wordpress.org/
**/



// get path for templates used in loop
add_filter( 'wc_get_template_part', 'wc_custom_template_path', 10, 3 );

function wc_custom_template_path( $template, $slug, $name ) 
{ 
    // look in plugin/woocommerce/slug-name.php or plugin/woocommerce/slug.php
    if ( $name ) {
        $path = plugin_dir_path( __FILE__ ) . WC()->template_path() . "{$slug}-{$name}.php";    
    } else {
        $path = plugin_dir_path( __FILE__ ) . WC()->template_path() . "{$slug}.php";    
    }

    return file_exists( $path ) ? $path : $template;

}


// get path for all other templates.
add_filter( 'woocommerce_locate_template', 'custom_template', 10, 3 );

function custom_template( $template, $template_name, $template_path ) 
{ 
    $path = plugin_dir_path( __FILE__ ) . $template_path . $template_name;  
    return file_exists( $path ) ? $path : $template;

}

?>