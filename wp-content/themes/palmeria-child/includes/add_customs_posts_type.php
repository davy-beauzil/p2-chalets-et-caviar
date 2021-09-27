<?php

add_action('init', 'chalets_custom_post_type', 0);

function chalets_custom_post_type()
{
  $labels = array(
    'name'                => _x('Chalets', 'Post Type General Name'),
    'singular_name'       => _x('Chalet', 'Post Type Singular Name'),
    'menu_name'           => __('Chalets'),
    'all_items'           => __('Tous les chalets'),
    'view_item'           => __('Voir les chalets'),
    'add_new_item'        => __('Ajouter un nouveau chalet'),
    'add_new'             => __('Ajouter'),
    'edit_item'           => __('Editer le chalet'),
    'update_item'         => __('Modifier le chalet'),
    'search_items'        => __('Rechercher un chalet'),
    'not_found'           => __('Non trouvé'),
    'not_found_in_trash'  => __('Non trouvé dans la corbeille'),
  );

  $args = array(
    'label'               => __('Chalets'),
    'description'         => __('Tous sur chalets'),
    'labels'              => $labels,
    'menu_icon'           => 'dashicons-admin-home',
    'menu_position'       => 3,
    'supports'            => array('title', 'editor', 'author', 'thumbnail'),
    'taxonomies'          => array('typechalet'),
    'publicly_queryable'  => true,
    'show_in_rest'        => true,
    'hierarchical'        => false,
    'public'              => true,
    'has_archive'         => true,
    'rewrite'        => array('slug' => 'chalets'),

  );

  register_post_type('chalets', $args);
}
