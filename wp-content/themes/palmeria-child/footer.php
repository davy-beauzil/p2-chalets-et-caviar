<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Palmeria
 */

?>

<?php if (isset($wp_query->post->post_title)) :
    if ($wp_query->post->post_title !== 'Accueil') : ?>
        </div><!-- #content -->
<?php endif;
endif; ?>

<footer id="colophon" class="site-footer">
    <div class="wrapper footer-wrapper">
        <div class="site-info">
            <p>Chalets et caviar © 2021 All Rights Reserved.</p>
            <p><b>Site fictif</b> créé par <a href="https://www.davy-beauzil.fr">Davy Beauzil</a> dans le cadre de la formation <a href="https://openclassrooms.com/fr/paths/59-developpeur-dapplication-php-symfony">Développeur d'application PHP / Symfony</a> d'Openclassrooms.</p>
        </div><!-- .site-info -->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>