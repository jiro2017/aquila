<?php
/**
* Theme functions
* @package Aquila
*/
// print_r(filemtime(get_template_directory().'/style.css'));
// wp_die();
function aquila_enqueue_scripts() {
    wp_register_style(
        'style-css', 
        get_template_directory_uri().'/style.css',
        [],
        filemtime(get_template_directory().'/style.css')
    );
    wp_register_script(
        'main-js',
        get_template_directory_uri().'/assets/main.js',
        [],
        filemtime(get_template_directory().'/assets/main.js'),
        true
    );

    //register bootstrap scripts and styles
    wp_register_style(
        'bootstrap-css', 
        get_template_directory_uri().'/assets/src/library/bootstrap-5.3.3-dist/css/bootstrap.min.css',
        [],
        false,
        'all'
    );

    wp_register_script(
        'bootstrap-js',
        get_template_directory_uri().'/assets/src/library/bootstrap-5.3.3-dist/js/bootstrap.min.js',
        ['jquery'],
        false,
        true
    );
    wp_enqueue_style('style-css');
    wp_enqueue_script('main-js');

    //enqueue bootstrap scripts and styles.
    wp_enqueue_style('bootstrap-css');
    wp_enqueue_script('bootstrap-js');
}

add_action( 'wp_enqueue_scripts', 'aquila_enqueue_scripts');