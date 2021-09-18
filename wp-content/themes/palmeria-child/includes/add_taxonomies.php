<?php

// add_action('init', 'add_price_taxonomy', 0);
add_action('init', 'add_type_taxonomy', 0);
// add_action('init', 'add_room_taxonomy', 0);
// add_action('init', 'add_surface_taxonomy', 0);
// add_action('init', 'add_capacity_taxonomy', 0);

function add_price_taxonomy()
{

  $labels = array(
    'name'                => _x('Prix', 'Taxonomy General Name'),
    // Le nom au singulier
    'singular_name'       => _x('Prix', 'Taxonomy Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __('Prix'),
    // Les différents libellés de l'administration
    'all_items'           => __('Tous les prix'),
    'add_new_item'        => __('Ajouter un nouveau prix'),
    'edit_item'           => __('Editer le prix'),
    'update_item'         => __('Modifier le prix'),
    'search_items'        => __('Rechercher un prix'),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );

  register_taxonomy('price', 'chalets', $args);
}

function add_type_taxonomy()
{

  $labels = array(
    'name'                => _x('Types', 'Taxonomy General Name'),
    // Le nom au singulier
    'singular_name'       => _x('Type', 'Taxonomy Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __('Types'),
    // Les différents libellés de l'administration
    'all_items'           => __('Tous les types'),
    'add_new_item'        => __('Ajouter un nouveau type'),
    'edit_item'           => __('Editer le type'),
    'update_item'         => __('Modifier le type'),
    'search_items'        => __('Rechercher un type'),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
    'show_admin_column' => true
  );

  register_taxonomy('type', 'chalets', $args);
}

function add_room_taxonomy()
{

  $labels = array(
    'name'                => _x('Pièces', 'Taxonomy General Name'),
    // Le nom au singulier
    'singular_name'       => _x('Pièce', 'Taxonomy Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __('Pièces'),
    // Les différents libellés de l'administration
    'all_items'           => __('Toutes les pièces'),
    'add_new_item'        => __('Ajouter une nouvelle pièce'),
    'edit_item'           => __('Editer la pièce'),
    'update_item'         => __('Modifier la pièce'),
    'search_items'        => __('Rechercher une pièce'),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );

  register_taxonomy('room', 'chalets', $args);
}

function add_surface_taxonomy()
{

  $labels = array(
    'name'                => _x('Surfaces', 'Taxonomy General Name'),
    // Le nom au singulier
    'singular_name'       => _x('Surface', 'Taxonomy Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __('Surfaces'),
    // Les différents libellés de l'administration
    'all_items'           => __('Toutes les surfaces'),
    'add_new_item'        => __('Ajouter une nouvelle surface'),
    'edit_item'           => __('Editer la surface'),
    'update_item'         => __('Modifier la surface'),
    'search_items'        => __('Rechercher une surface'),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );

  register_taxonomy('surface', 'chalets', $args);
}

function add_capacity_taxonomy()
{

  $labels = array(
    'name'                => _x('Capacités d\'accueil', 'Taxonomy General Name'),
    // Le nom au singulier
    'singular_name'       => _x('Capacité d\'accueil', 'Taxonomy Singular Name'),
    // Le libellé affiché dans le menu
    'menu_name'           => __('Capacités d\'accueil'),
    // Les différents libellés de l'administration
    'all_items'           => __('Toutes les capacités d\'accueil'),
    'add_new_item'        => __('Ajouter une nouvelle capacité d\'accueil'),
    'edit_item'           => __('Editer la capacité d\'accueil'),
    'update_item'         => __('Modifier la capacité d\'accueil'),
    'search_items'        => __('Rechercher une capacité d\'accueil'),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );

  register_taxonomy('capacity', 'chalets', $args);
}
