<?php

function modern_furniture_enqueue_styles() {
    wp_enqueue_style('modern-furniture', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'modern_furniture_enqueue_styles');

function modern_furniture_enqueue_scripts() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'modern_furniture_enqueue_scripts');

function add_svg_to_upload_mimes($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');