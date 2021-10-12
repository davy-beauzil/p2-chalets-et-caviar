<?php /* Template Name: Accueil */ ?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'palmeria'); ?></a>

        <header id="masthead" class="site-header">
            <div class="site-branding">
                <?php
                the_custom_logo();
                if (is_front_page() && is_home()) :
                ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
                else :
                ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;
                $palmeria_description = get_bloginfo('description', 'display');
                if ($palmeria_description || is_customize_preview()) :
                ?>
                    <p class="site-description"><?php echo esc_html($palmeria_description); /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- .site-branding -->
            <?php
            if (has_nav_menu('menu-1')) :
            ?>
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'primary-menu'
                    ));
                    ?>
                </nav><!-- #site-navigation -->
            <?php
            endif;
            if (is_active_sidebar('sidebar-1') || has_nav_menu('menu-1')) :
                $classes = '';
                if (has_nav_menu('menu-1') && !is_active_sidebar('sidebar-1')) {
                    $classes = 'menu-open';
                }
            ?>
                <button class="sidebar-open <?php echo esc_attr($classes); ?>" id="sidebar-open">
                    <i></i>
                    <i></i>
                    <i></i>
                </button>
            <?php
            endif;
            ?>
        </header><!-- #masthead -->

        <?php
        get_sidebar();

        ?>
        <div class="custom-header">
            <?php

            if (function_exists('is_woocommerce') && is_woocommerce() && get_theme_mod('palmeria_shop_image', null)) {
            ?>
                <img src="<?php echo esc_url(get_theme_mod('palmeria_shop_image')); ?>" alt="">
            <?php
            } elseif (has_post_thumbnail() && is_singular()) {
                the_post_thumbnail('palmeria-x-large');
            } else {
            ?>
                <img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="<?php esc_attr(get_bloginfo('name')); ?>" />
            <?php
            }
            ?>
        </div>

        <div id="content" class="site-content accueil_site_content wrapper">

            <div class="accueil_carousel d-inline-block">
                <div class="w-75 mx-auto accueil_carousel_block">
                    <h2 class="accueil_carousel_label">Chalets à louer</h2>
                    <div id="locations" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $args = array(
                                'numberposts' => -1,
                                'post_type' => 'chalets',
                                'order'    => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'typechalet',
                                        'field'    => 'slug',
                                        'terms'    => 'locations',
                                    ),
                                ),
                            );

                            $recentPosts = new WP_Query($args);
                            $actived = false;

                            if ($recentPosts->have_posts()) {
                                while ($recentPosts->have_posts()) {
                                    $recentPosts->the_post();
                            ?>

                                    <div class="carousel-item <?php if (!$actived) echo 'active';
                                                                $actived = true; ?>">
                                        <?php
                                        the_post_thumbnail($size = 'post-thumbnail', $attr = [
                                            'class' => 'accueil_carousel_image'
                                        ]);
                                        $price = get_post_meta($post->ID, 'price', true);
                                        ?>
                                        <p class="accueil_carousel_price"><?php echo $price ?> € / semaine</p>
                                        <div class="accueil_carousel_cta">
                                            <a class="accueil_carousel_cta_single" href="<?php echo the_permalink() ?>"><i class="fa-solid fa-up-right-from-square"></i> Voir ce chalet </a>
                                            <a class="accueil_carousel_cta_others" href="<?php echo get_term_link('locations', 'typechalet') ?>"><i class="fa-solid fa-up-right-from-square"></i> Voir les autres</a>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                // no posts found
                            }

                            // Restore original Post Data
                            wp_reset_postdata();
                            ?>
                        </div>
                        <button class="carousel-control-prev bg-transparent" type="button" data-bs-target="#locations" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next bg-transparent" type="button" data-bs-target="#locations" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="accueil_carousel d-inline-block">
                <div class="w-75 mx-auto accueil_carousel_block">
                    <h2 class="accueil_carousel_label">Chalets à vendre</h2>
                    <div id="ventes" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $args = array(
                                'numberposts' => -1,
                                'post_type' => 'chalets',
                                'order'    => 'ASC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'typechalet',
                                        'field'    => 'slug',
                                        'terms'    => 'ventes',
                                    ),
                                ),
                            );

                            $recentPosts = new WP_Query($args);
                            $actived = false;

                            if ($recentPosts->have_posts()) {
                                while ($recentPosts->have_posts()) {
                                    $recentPosts->the_post();
                            ?>
                                    <div class="carousel-item <?php if (!$actived) echo 'active';
                                                                $actived = true; ?>">
                                        <?php
                                        the_post_thumbnail($size = 'post-thumbnail', $attr = [
                                            'class' => 'accueil_carousel_image'
                                        ]);
                                        $price = get_post_meta($post->ID, 'price', true);

                                        ?>
                                        <p class="accueil_carousel_price"><?php echo $price ?> €</p>
                                        <div class="accueil_carousel_cta">
                                            <a class="accueil_carousel_cta_single" href="<?php echo the_permalink() ?>"><i class="fa-solid fa-up-right-from-square"></i> Voir ce chalet </a>
                                            <a class="accueil_carousel_cta_others" href="<?php echo get_term_link('ventes', 'typechalet') ?>"><i class="fa-solid fa-up-right-from-square"></i> Voir les autres </a>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                // no posts found
                            }

                            // Restore original Post Data
                            wp_reset_postdata();
                            ?>
                        </div>
                        <button class="carousel-control-prev bg-transparent" type="button" data-bs-target="#ventes" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next bg-transparent" type="button" data-bs-target="#ventes" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- #page -->

    <?php
    get_footer(); ?>

    <?php wp_footer(); ?>

</body>

</html>