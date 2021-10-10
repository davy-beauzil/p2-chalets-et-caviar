<?php

add_action('init', 'add_type_taxonomy', 0);

function add_type_taxonomy()
{

  $labels = array(
    'name'                => _x('Types', 'Taxonomy General Name'),
    'nav_item_name'                => _x('Nom du nouveau type', 'Taxonomy General Name'),
    'parent_item'                => _x('Type parent', 'Taxonomy General Name'),
    'add_new_item'        => __('Ajouter un nouveau type'),
    'singular_name'       => _x('Type', 'Taxonomy Singular Name'),
    'menu_name'           => __('Types'),
    'all_items'           => __('Tous les types'),
    'edit_item'           => __('Editer le type'),
    'update_item'         => __('Modifier le type'),
    'search_items'        => __('Rechercher un type'),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'public' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'typechalet'),
  );

  register_taxonomy('typechalet', 'chalets', $args);
}
