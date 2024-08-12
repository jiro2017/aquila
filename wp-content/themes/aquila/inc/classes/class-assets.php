<?php
/**
 * Enqueue theme assets
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;
use AQUILA_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct()
    {
        $this->set_hooks();
    }

    protected function set_hooks() {
        // actions and filters
        add_action('wp_enqueue_scripts', [ $this, 'register_styles']);
        add_action('wp_enqueue_scripts', [ $this, 'register_scripts']);
    }

    public function register_styles() {
        wp_register_style(
            'style-css', 
            get_template_directory_uri().'/style.css',
            [],
            filemtime(get_template_directory().'/style.css')
        );
        wp_register_style(
            'bootstrap-css', 
            get_template_directory_uri().'/assets/src/library/bootstrap-5.3.3-dist/css/bootstrap.min.css',
            [],
            false,
            'all'
        );

        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function register_scripts() {
        wp_register_script(
            'main-js',
            get_template_directory_uri().'/assets/main.js',
            [],
            filemtime(get_template_directory().'/assets/main.js'),
            true
        );
        wp_register_script(
            'bootstrap-js',
            get_template_directory_uri().'/assets/src/library/bootstrap-5.3.3-dist/js/bootstrap.min.js',
            ['jquery'],
            false,
            true
        );

        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap-js');
    }
}