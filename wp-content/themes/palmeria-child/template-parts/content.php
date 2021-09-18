<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Palmeria
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div>
    <?php palmeria_post_thumbnail(); ?>
  </div>
  <header class="entry-header">
    <?php
    the_title('<h1 class="entry-title">', '</h1>');
    ?>
  </header><!-- .entry-header -->
  <div>
    <table>
      <tr>
        <th>Type</th>
        <td><?php echo get_post_meta($post->ID, 'type', true); ?></td>
      </tr>
      <tr>
        <th>Prix</th>
        <td><?php echo get_post_meta($post->ID, 'price', true); ?> € <?php if (get_post_meta($post->ID, 'type', true) == "Location") echo '/ semaine' ?> </td>
      </tr>
      <?php if (get_post_meta($post->ID, 'surface', true)) { ?>
        <tr>
          <th>Surface</th>
          <td><?php echo get_post_meta($post->ID, 'surface', true); ?> m2</td>
        </tr>
      <?php } ?>
      <?php if (get_post_meta($post->ID, 'min', true) && get_post_meta($post->ID, 'max', true)) { ?>
        <tr>
          <th>Capacité d'accueil</th>
          <td>De <?php echo get_post_meta($post->ID, 'min', true); ?> à <?php echo get_post_meta($post->ID, 'max', true); ?> personnes</td>
        </tr>
      <?php } ?>
      <?php if (get_post_meta($post->ID, 'bedrooms', true)) { ?>
        <tr>
          <th>Nombre de chambres</th>
          <td><?php echo get_post_meta($post->ID, 'bedrooms', true); ?></td>
        </tr>
      <?php } ?>
      <?php if (get_post_meta($post->ID, 'bathrooms', true)) { ?>
        <tr>
          <th>Nombre de salles de bain</th>
          <td><?php echo get_post_meta($post->ID, 'bathrooms', true); ?></td>
        </tr>
      <?php } ?>
    </table>

  </div>


  <footer class="entry-footer"><?php palmeria_entry_footer(); ?></footer>
  <!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->