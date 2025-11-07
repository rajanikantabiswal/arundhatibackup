<?php 
function yobazar_child_register_scripts(){
    $parent_style = 'yobazar-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array('font-awesome-5', 'yobazar-reset'), yobazar_get_theme_version() );
    wp_enqueue_style( 'yobazar-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
    
}

add_filter( 'action_scheduler_run_queue', '__return_false' );

add_action( 'wp_enqueue_scripts', 'yobazar_child_register_scripts' );
