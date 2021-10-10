<?php

/**
 * Template Name: Home page
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Palmeria
 */

get_header();
?>
<div class="pagehome_content">
    <!-- <?php
            the_content();
            ?> -->
    <div>
        <h2>Qui sommes nous ?</h2>
        <p>Chalets et caviar, c'est une petite, mais dynamique entreprise spécialisée dans la vente et la location de chalets de luxe. Nous sommes animés par la passion du bon plan et de l’efficacité du service client. C’est pourquoi nous nous engageons à vous apporter les deux.</p>
        <p>Si vous cherchez quelque chose de nouveau, vous êtes au bon endroit. Notre mission est de tout faire pour répondre au mieux à vos envies. N'hésitez pas à nous contacter si vous êtes intéressé pour louer ou acheter un chalet, nous serons ravis de vous présenter notre catalogue de bons plans.</p>
    </div>
    <div>
        <h2>Louer un chalet</h2>
        <p>Retrouvez notre catalogue de chalets à louer pour une ou plusieurs semaines dans la commune de Courchevel. Venez déposer vos valises et profiter du paysage et des spécialités locales.</p>
        <div class="w-75 mx-auto">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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
                                the_post_thumbnail();
                                ?>
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
                <button class="carousel-control-prev bg-transparent" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next bg-transparent" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            </div>
        </div>
    </div>
    <div>
        <h2>Acheter votre chalet</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut scelerisque est velit, feugiat sollicitudin elit molestie ac. Vestibulum ac enim vulputate, tincidunt nisi a, fringilla urna. Donec finibus urna enim, sed pulvinar metus pellentesque ac. Vivamus accumsan ipsum cursus imperdiet sodales. Maecenas eu ante eget nibh interdum dignissim. Curabitur porta rhoncus arcu, sed consectetur neque elementum in. Nulla sagittis augue id velit aliquet accumsan. Praesent tempus venenatis sem, a eleifend metus efficitur nec. Aliquam a tincidunt ex.</p>
    </div>
    <div>
        <h2>Notre équipe</h2>
    </div>
</div>

<?php
get_footer();
