<?php

/**
 * Load Bootstrap in it's entirety
 */
function gs_load_bootstrap()
{
    function enqueue_bootstrap_css() {
        wp_enqueue_style( 'bootstrap',
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' );

        wp_enqueue_style( 'bootstrap-theme',
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css' );
    }

    function enqueue_bootstrap_js()
    {
        wp_enqueue_script ('bootstrap-js', 
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'
            );
    }

    //* Make Font Awesome available
    add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap_css' );
    add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap_js' );
}
