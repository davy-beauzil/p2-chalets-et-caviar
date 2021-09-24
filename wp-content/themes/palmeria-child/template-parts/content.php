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
        <th><i class="fa-solid fa-house content_description_icon"></i> Type</th>
        <th><i class="fa-solid fa-euro-sign content_description_icon"></i> Prix</th>
        <th><i class="fa-solid fa-person content_description_icon"></i> Capacité d'accueil</th>
      </tr>
      <tr>
        <td><?php if (get_the_terms($post->ID, 'typechalet')[0]->name) echo get_the_terms($post->ID, 'typechalet')[0]->name; ?></td>
        <td><?php if (get_post_meta($post->ID, 'price', true)) echo get_post_meta($post->ID, 'price', true); ?> € <?php if (get_the_terms($post->ID, 'typechalet')[0]->name === "Locations") echo '/ semaine' ?> </td>
        <td>De <?php echo get_post_meta($post->ID, 'min', true); ?> à <?php echo get_post_meta($post->ID, 'max', true); ?> personnes</td>
      </tr>
      <tr>
        <th><i class="fa-solid fa-bed content_description_icon"></i> Chambre(s)</th>
        <th><i class="fa-solid fa-bath content_description_icon"></i> Salle(s) de bain</th>
      </tr>
      <tr>
        <td><?php if (get_post_meta($post->ID, 'bedrooms', true)) echo get_post_meta($post->ID, 'bedrooms', true); ?></td>
        <td><?php if (get_post_meta($post->ID, 'bathrooms', true)) echo get_post_meta($post->ID, 'bathrooms', true); ?></td>
      </tr>
    </table>

    <hr>

    <div class="content_infos">
      <?php if (get_the_terms($post->ID, 'typechalet')[0]->name) : ?>
        <div class="content_info">
          <div class="content_info_title"><i class="fa-solid fa-house content_description_icon"></i> Type</div>
          <div class="content_info_value"><?php echo get_the_terms($post->ID, 'typechalet')[0]->name; ?></div>
        </div>
      <?php endif;
      if (get_post_meta($post->ID, 'price', true)) : ?>
        <div class="content_info">
          <div class="content_info_title"><i class="fa-solid fa-euro-sign content_description_icon"></i> Prix</div>
          <div class="content_info_value"><?php echo get_post_meta($post->ID, 'price', true); ?> € <?php if (get_the_terms($post->ID, 'typechalet')[0]->name === "Locations") echo '/ semaine' ?> </div>
        </div>
      <?php endif;
      if (get_post_meta($post->ID, 'min', true) && get_post_meta($post->ID, 'max', true)) : ?>
        <div class="content_info">
          <div class="content_info_title"><i class="fa-solid fa-person content_description_icon"></i> Capacité d'accueil</div>
          <div class="content_info_value">De <?php echo get_post_meta($post->ID, 'min', true); ?> à <?php echo get_post_meta($post->ID, 'max', true); ?> personnes</div>
        </div>
      <?php endif;
      if (get_post_meta($post->ID, 'bedrooms', true)) : ?>
        <div class="content_info">
          <div class="content_info_title"><i class="fa-solid fa-bed content_description_icon"></i> Chambre(s)</div>
          <div class="content_info_value"><?php echo get_post_meta($post->ID, 'bedrooms', true); ?></div>
        </div>
      <?php endif;
      if (get_post_meta($post->ID, 'bathrooms', true)) : ?>
        <div class="content_info">
          <div class="content_info_title"><i class="fa-solid fa-bath content_description_icon"></i> Salle(s) de bain</div>
          <div class="content_info_value"><?php echo get_post_meta($post->ID, 'bathrooms', true); ?></div>
        </div>
      <?php endif;
      if (get_post_meta($post->ID, 'surface', true)) : ?>
        <div class="content_info">
          <div class="content_info_title"><i class="fa-solid fa-ruler content_description_icon"></i> Surface</div>
          <div class="content_info_value"><?php echo get_post_meta($post->ID, 'surface', true); ?></div>
        </div>
      <?php endif; ?>
    </div>

    <hr>

    <?php the_content() ?>

  </div>

</article>
<!-- #post-<?php //the_ID(); 
            ?> -->