<?php

function enqueue_styles()
{
    wp_enqueue_style('tailwind', get_template_directory_uri() . '/css/tailwind.css', array(), filemtime(get_template_directory() . '/css/tailwind.css'));
    wp_enqueue_script('highlightjs', 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.11.1/highlight.min.js', array(), '11.11.1', true);
    wp_add_inline_script('highlightjs', <<<'JS'
document.addEventListener('DOMContentLoaded', () => {
    if (typeof hljs === 'undefined') {
        return;
    }

    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightElement(block);
    });
});
JS);
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
