<?php

function basic_theme_enqueue_styles() {
    wp_enqueue_style( 'basic-theme-style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'basic_theme_enqueue_styles' );

function basic_theme_setup() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'basic_theme_setup' );