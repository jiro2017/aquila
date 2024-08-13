<?php
/**
 * Bootstraps the theme
 * 
 * 
 * @package Aquila
 */
namespace  AQUILA_THEME\Inc;

 use AQUILA_THEME\Inc\Traits\Singleton;

 class AQUILA_THEME {
    use Singleton;

    protected function __construct()
    {
        //load classes.
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        $this->set_hooks();
    }

    protected function set_hooks() {
        // actions and filters
        add_action( 'after_setup_theme', [$this, 'setup_theme']);
    }

    public function setup_theme() {
        add_theme_support('title-tag' );
        add_theme_support(
            'custom-logo',
            [
                'header-text'   => array('site-title', 'site-description'),
                'height'        => 50,
                'width'         => 100,
                'flex-height'   => true,
                'flex-width'    => true
            ]
        );
        add_theme_support(
            'custom-background',
            [
                'default-color' => '#fff',
                'default-image' => "",
                // 'repeat'        => "no-repeat"
            ]
        );
        add_theme_support(
            'post-thumbnails'
        );
        add_theme_support('automatic-feed-links');
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'script',
                'style'
            ]
        );
        add_editor_style();
        add_theme_support(
            'wp-block-styles'
        );
        add_theme_support('align-wide');

        /**
         * Register image sizes
         */
        add_image_size( 'featured-large', 350, 233, true );

        global $content_width;
        if( !isset($content_width) ) {
            $content_width =1240;
        }
    }
 }