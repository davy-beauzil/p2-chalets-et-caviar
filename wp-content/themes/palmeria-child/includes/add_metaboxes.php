<?php

/**
 * PRIX
 */
add_action('add_meta_boxes', 'add_price_metabox', 0);
add_action('save_post_chalets', 'price_box_save');

/**
 * PIÈCES
 */
add_action('add_meta_boxes', 'add_room_metabox', 0);
add_action('save_post_chalets', 'room_box_save');

/**
 * SURFACES
 */
add_action('add_meta_boxes', 'add_surface_metabox', 0);
add_action('save_post_chalets', 'surface_box_save');

/**
 * CAPACITÉS D'ACCUEIL
 */
add_action('add_meta_boxes', 'add_capacity_metabox', 0);
add_action('save_post_chalets', 'capacity_box_save');


/**
 * Ajout de la metabox PRIX
 */
function add_price_metabox()
{
  add_meta_box(
    'price_metaboxes',
    'Prix',
    'price_box_content',
    'chalets',
    'side',
    'core'
  );
}

/**
 * Affichage de la metabox PRIX
 */
function price_box_content($post)
{
  wp_nonce_field(plugin_basename(__FILE__), 'price_box_content_nonce');
  $price = get_post_meta($post->ID, 'price', true);
  echo '<label for="price">Prix </label>';
  echo '<input id="price" type="number" name="price" value="' . $price . '"/> €';
}

/**
 * Sauvegarde de la metabox PRIX
 * TODO : ajouter try/catch & inverser la logique 
 */
function price_box_save($post_ID)
{
  if (!defined('DOING_AUTOSAVE') || (defined('DOING_AUTOSAVE') && !DOING_AUTOSAVE)) {
    if (isset($_POST['price_box_content_nonce']) && wp_verify_nonce($_POST['price_box_content_nonce'], plugin_basename(__FILE__))) {
      if (isset($_POST['price'])) {
        try {
          $price = esc_html($_POST['price']);
          update_post_meta($post_ID, 'price', $price);
        } catch (\Exception $e) {
          echo $e->getMessage();
        }
      }
    }
  }
}


/**
 * Ajout de la metabox PIÈCE
 */
function add_room_metabox()
{
  add_meta_box(
    'room_metaboxes',
    'Pièces',
    'room_box_content',
    'chalets',
    'side',
    'core'
  );
}
/**
 * Affichage de la metabox PIÈCE
 */
function room_box_content($post)
{
  wp_nonce_field(plugin_basename(__FILE__), 'room_box_content_nonce');
  $bedrooms = get_post_meta($post->ID, 'bedrooms', true);
  $bathrooms = get_post_meta($post->ID, 'bathrooms', true);
  echo '<p><label for="bedrooms">Nombre de chambres </label></p>';
  echo '<input id="bedrooms" type="number" name="bedrooms" value="' . $bedrooms . '"/>';
  echo '<p><label for="bathrooms">Nombre de salle de bain </label></p>';
  echo '<input id="bathrooms" type="number" name="bathrooms" value="' . $bathrooms . '"/>';
}

/**
 * Sauvegarde de la metabox PIÈCE
 */
function room_box_save($post_ID)
{
  if (!defined('DOING_AUTOSAVE') || (defined('DOING_AUTOSAVE') && !DOING_AUTOSAVE)) {
    if (isset($_POST['room_box_content_nonce']) && wp_verify_nonce($_POST['room_box_content_nonce'], plugin_basename(__FILE__))) {
      if (isset($_POST['bedrooms'])) {
        try {
          $bedrooms = esc_html($_POST['bedrooms']);
          update_post_meta($post_ID, 'bedrooms', $bedrooms);
        } catch (\Exception $e) {
          $e->getMessage();
        }
      }
      if (isset($_POST['bathrooms'])) {
        try {
          $bathrooms = esc_html($_POST['bathrooms']);
          update_post_meta($post_ID, 'bathrooms', $bathrooms);
        } catch (\Exception $e) {
          $e->getMessage();
        }
      }
    }
  }
}


/**
 * Ajout de la metabox SURFACE
 */
function add_surface_metabox()
{
  add_meta_box(
    'surface_metaboxes',
    'Surface',
    'surface_box_content',
    'chalets',
    'side',
    'core'
  );
}
/**
 * Affichage de la metabox SURFACE
 */
function surface_box_content($post)
{
  wp_nonce_field(plugin_basename(__FILE__), 'surface_box_content_nonce');
  $surface = get_post_meta($post->ID, 'surface', true);
  echo '<p><label for="surface">Surface </label></p>';
  echo '<input id="surface" type="number" name="surface" value="' . $surface . '"/> m2';
}

/**
 * Sauvegarde de la metabox SURFACE
 */
function surface_box_save($post_ID)
{
  if (!defined('DOING_AUTOSAVE') || (defined('DOING_AUTOSAVE') && !DOING_AUTOSAVE)) {
    if (isset($_POST['surface_box_content_nonce']) && wp_verify_nonce($_POST['surface_box_content_nonce'], plugin_basename(__FILE__))) {
      if (isset($_POST['surface'])) {
        try {
          $surface = esc_html($_POST['surface']);
          update_post_meta($post_ID, 'surface', $surface);
        } catch (\Exception $e) {
          $e->getMessage();
        }
      }
    }
  }
}


/**
 * Ajout de la metabox CAPACITÉ D'ACCUEIL
 */
function add_capacity_metabox()
{
  add_meta_box(
    'capacity_metaboxes',
    'Capacité d‘accueil',
    'capacity_box_content',
    'chalets',
    'advanced'
  );
}
/**
 * Affichage de la metabox CAPACITÉ D'ACCUEIL
 */
function capacity_box_content($post)
{
  wp_nonce_field(plugin_basename(__FILE__), 'capacity_box_content_nonce');
  $minCapacity = get_post_meta($post->ID, 'minCapacity', true);
  $maxCapacity = get_post_meta($post->ID, 'maxCapacity', true);
  echo '<p><label for="minCapacity">Entre </label></p>';
  echo '<input id="minCapacity" type="number" name="minCapacity" value="' . $minCapacity . '"/>';
  echo '<p><label for="maxCapacity">et </label></p>';
  echo '<input id="maxCapacity" type="number" name="maxCapacity" value="' . $maxCapacity . '"/> personnes';
}

/**
 * Sauvegarde de la metabox CAPACITÉ D'ACCUEIL
 */
function capacity_box_save($post_ID)
{
  if (!defined('DOING_AUTOSAVE') || (defined('DOING_AUTOSAVE') && !DOING_AUTOSAVE)) {
    if (isset($_POST['capacity_box_content_nonce']) && wp_verify_nonce($_POST['capacity_box_content_nonce'], plugin_basename(__FILE__))) {
      if (isset($_POST['minCapacity'])) {
        try {
          $min = esc_html($_POST['minCapacity']);
          update_post_meta($post_ID, 'minCapacity', $min);
        } catch (\Exception $e) {
          $e->getMessage();
        }
      }
      if (isset($_POST['maxCapacity'])) {
        try {
          $max = esc_html($_POST['maxCapacity']);
          update_post_meta($post_ID, 'maxCapacity', $max);
        } catch (\Exception $e) {
          $e->getMessage();
        }
      }
    }
  }
}
