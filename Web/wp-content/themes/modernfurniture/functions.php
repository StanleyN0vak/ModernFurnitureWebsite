<?php

function modern_furniture_enqueue_styles() {
    wp_enqueue_style('modern-furniture', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'modern_furniture_enqueue_styles');