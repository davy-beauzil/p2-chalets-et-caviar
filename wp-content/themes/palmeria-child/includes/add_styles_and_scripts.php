<?php

add_action('wp_enqueue_scripts', 'add_styles', 101, 0);
add_action('wp_enqueue_scripts', 'add_scripts', 101, 0);


/**
 * Prend en compte le style.css du thème enfant
 */
function add_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css');
}

function add_scripts()
{
  wp_register_script('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js', null, null, true);
  wp_enqueue_script('fontAwesome');
  wp_register_script('bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js', null, null, true);
  wp_enqueue_script('bundle');
  wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js', null, null, true);
  wp_enqueue_script('popper');
  wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js', null, null, true);
  wp_enqueue_script('bootstrap');
}
