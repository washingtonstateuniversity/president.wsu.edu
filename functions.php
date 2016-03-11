<?php

add_action( 'wsu_register_inline_svg', 'register_svgs' );
function register_svgs() {
    ob_start();
    ?><svg><!-- SVG 1 is pasted here --></svg><?php
    $svg_1 = ob_get_contents();
    ob_end_clean();

    ob_start();
    ?><svg><!-- SVG 2 is pasted here --></svg><?php
    $svg_2 = ob_get_contents();
    ob_end_clean();

    // SVG is registered with an ID of "my-inline-svg"
    wsu_register_inline_svg( 'my-svg-1', $svg_1 );
    wsu_register_inline_svg( 'my-svg-2', $svg_2 );
}

add_action( 'after_setup_theme', 'wsu_president_theme_setup' );
function wsu_president_theme_setup() {
    add_theme_support( 'html5', array( 'gallery', 'caption', 'search-form' ) );
}

add_action( 'wp_enqueue_scripts', 'wsu_president_theme_enqueue_scripts' );
function wsu_president_theme_enqueue_scripts() {
    wp_enqueue_script( 'wsu-president', get_stylesheet_directory_uri() . '/js/portfolio.js', array( 'jquery' ), spine_get_script_version(), true );
}
