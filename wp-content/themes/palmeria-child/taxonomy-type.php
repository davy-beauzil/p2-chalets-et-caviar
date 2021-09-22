<?php

/**
 * Le template qui affiche tous les types de chalets
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Palmeria
 */

get_header();
?>

<div id="primary" class="content-area boxed">
    <main id="main" class="site-main">
        <div class="taxonomy_posts">
            <?php
            // get term of the taxonomy
            $taxonomy_term = get_query_var('term');

            $args = array(
                'numberposts' => -1,
                'post_type' => 'chalets',
                'order'    => 'ASC',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'type',
                        'field'    => 'slug',
                        'terms'    => $taxonomy_term,
                    ),
                ),
            );

            // get posts of the term
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) :
                while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $price = get_post_meta($post->ID, 'price', true);
                    $image = get_post_meta($post->ID, 'thumbnail', true);
            ?>
                    <div class="taxonomy_post">
                        <a href="<?php echo the_permalink() ?>">
                            <?php if (has_post_thumbnail()) :
                                the_post_thumbnail();
                            endif; ?>
                            <p class="taxonomy_post_info taxonomy_post_title"><?php echo get_the_title() ?></p>
                            <p class="taxonomy_post_info taxonomy_post_price"> <?php echo $price ?> €</p>
                        </a>
                    </div>
            <?php
                // content goes here
                endwhile;
                wp_reset_postdata();
            else :
            endif;

            ?>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
