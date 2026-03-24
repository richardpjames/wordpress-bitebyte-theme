<?php

function enqueue_styles()
{
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), filemtime(get_template_directory() . '/assets/css/tailwind.css'));
}

add_action('wp_enqueue_scripts', 'enqueue_styles');

function setup()
{
    add_theme_support('title-tag');
    register_nav_menus(array(
            'main' => 'Main Menu',
        ));
}

add_action('after_setup_theme', 'setup');
