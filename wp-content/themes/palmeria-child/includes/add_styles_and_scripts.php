<?php

add_action('wp_enqueue_scripts', 'add_styles', 101, 0);
add_action('wp_enqueue_scripts', 'add_scripts', 101, 0);


/**
 * Prend en compte le style.css du thème enfant
 */
function add_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

function add_scripts()
{
  wp_register_script('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js', null, null, true);
  wp_enqueue_script('fontAwesome');
}
