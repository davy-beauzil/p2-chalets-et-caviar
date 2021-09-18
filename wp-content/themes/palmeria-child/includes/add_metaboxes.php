<?php

/**
 * PRIX
 */
add_action('add_meta_boxes', 'add_price_metabox', 0);
add_action('save_post_chalets', 'price_box_save');

/**
 * TYPES
 */
//add_action('add_meta_boxes', 'add_type_metabox', 0);
//add_action('save_post', 'type_box_save');

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

add_action('edit_form_after_title', function () {
  global $post, $wp_meta_boxes;
  do_meta_boxes(get_current_screen(), 'advanced', $post);
  unset($wp_meta_boxes[get_post_type($post)]['advanced']);
});



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
    'advanced'
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
  echo '<input id="price" type="number" name="price" value="' . $price . '" required /> €';
}

/**
 * Sauvegarde de la metabox PRIX
 */
function price_box_save($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!wp_verify_nonce($_POST['price_box_content_nonce'], plugin_basename(__FILE__))) {
    return;
  }
  if ('page' == $_POST['post-type']) {
    if (current_user_can('edit-page', $post_id)) {
      return;
    }
  } else {
    if (current_user_can('edit-post', $post_id)) {
      return;
    }
  }

  if (isset($_POST['price'])) {
    $prices = esc_html($_POST['price']);
    update_post_meta($post_id, 'price', $prices);
  } else {
    // traiter l'erreur
  }
  if (isset($_POST['recurrence'])) {
    $recurrence = esc_html($_POST['recurrence']);
    update_post_meta($post_id, 'recurrence', $recurrence);
  } else {
    // traiter l'erreur
  }
}

/**
 * Ajout de la metabox TYPE
 */
function add_type_metabox()
{
  add_meta_box(
    'type_metaboxes',
    'Type',
    'type_box_content',
    'chalets',
    'advanced'
  );
}
/**
 * Affichage de la metabox TYPE
 */
function type_box_content($post)
{
  wp_nonce_field(plugin_basename(__FILE__), 'type_box_content_nonce');
  $type = get_post_meta($post->ID, 'type', true);
  echo '<div id="types">';

  echo '<p><input id="location" type="radio" name="type" value="Location" ';
  if ($type == "Location" || $type == null) echo 'checked';
  echo '/>';
  echo '<label for="location">Location (paiement par semaine)</label></p>';

  echo '<p><input id="vente" type="radio" name="type" value="Vente" ';
  if ($type == "Vente") echo 'checked';
  echo '/>';
  echo '<label for="vente">Vente (paiement unique)</label></p>';
  echo '</div>';
}

/**
 * Sauvegarde de la metabox TYPE
 */
function type_box_save($post_ID)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!wp_verify_nonce($_POST['type_box_content_nonce'], plugin_basename(__FILE__))) {
    return;
  }
  if ('page' == $_POST['post-type']) {
    if (current_user_can('edit-page', $post_ID)) {
      return;
    }
  } else {
    if (current_user_can('edit-post', $post_ID)) {
      return;
    }
  }

  if (isset($_POST['type'])) {
    $type = esc_html($_POST['type']);
    update_post_meta($post_ID, 'type', $type);
  } else {
    // traiter l'erreur
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
    'advanced'
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
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!wp_verify_nonce($_POST['room_box_content_nonce'], plugin_basename(__FILE__))) {
    return;
  }
  if ('page' == $_POST['post-type']) {
    if (current_user_can('edit-page', $post_ID)) {
      return;
    }
  } else {
    if (current_user_can('edit-post', $post_ID)) {
      return;
    }
  }

  if (isset($_POST['bedrooms'])) {
    $bedrooms = esc_html($_POST['bedrooms']);
    update_post_meta($post_ID, 'bedrooms', $bedrooms);
  } else {
    // traiter l'erreur
  }
  if (isset($_POST['bathrooms'])) {
    $bathrooms = esc_html($_POST['bathrooms']);
    update_post_meta($post_ID, 'bathrooms', $bathrooms);
  } else {
    // traiter l'erreur
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
    'advanced'
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
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!wp_verify_nonce($_POST['surface_box_content_nonce'], plugin_basename(__FILE__))) {
    return;
  }
  if ('page' == $_POST['post-type']) {
    if (current_user_can('edit-page', $post_ID)) {
      return;
    }
  } else {
    if (current_user_can('edit-post', $post_ID)) {
      return;
    }
  }

  if (isset($_POST['surface'])) {
    $surface = esc_html($_POST['surface']);
    update_post_meta($post_ID, 'surface', $surface);
  } else {
    // traiter l'erreur
  }
}


/**
 * Ajout de la metabox CAPACITÉ D'ACCUEIL
 */
function add_capacity_metabox()
{
  add_meta_box(
    'capacity_metaboxes',
    'Capacité d\'accueil',
    'capacity_box_content',
    'chalets',
    'side'
  );
}
/**
 * Affichage de la metabox CAPACITÉ D'ACCUEIL
 */
function capacity_box_content($post)
{
  wp_nonce_field(plugin_basename(__FILE__), 'capacity_box_content_nonce');
  $min = get_post_meta($post->ID, 'min', true);
  $max = get_post_meta($post->ID, 'max', true);
  echo '<p><label for="min">Entre </label></p>';
  echo '<input id="min" type="number" name="min" value="' . $min . '"/>';
  echo '<p><label for="max">et </label></p>';
  echo '<input id="max" type="number" name="max" value="' . $max . '"/> personnes';
}

/**
 * Sauvegarde de la metabox CAPACITÉ D'ACCUEIL
 */
function capacity_box_save($post_ID)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!wp_verify_nonce($_POST['capacity_box_content_nonce'], plugin_basename(__FILE__))) {
    return;
  }
  if ('page' == $_POST['post-type']) {
    if (current_user_can('edit-page', $post_ID)) {
      return;
    }
  } else {
    if (current_user_can('edit-post', $post_ID)) {
      return;
    }
  }

  if (isset($_POST['min'])) {
    $min = esc_html($_POST['min']);
    update_post_meta($post_ID, 'min', $min);
  } else {
    // traiter l'erreur
  }
  if (isset($_POST['max'])) {
    $max = esc_html($_POST['max']);
    update_post_meta($post_ID, 'max', $max);
  } else {
    // traiter l'erreur
  }
}
