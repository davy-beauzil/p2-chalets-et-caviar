<?php

/**
 * Taxonomie et metabox PRIX
 */
require_once(__DIR__ . '/includes/customs_posts_type.php');
require_once(__DIR__ . '/includes/add_taxonomies.php');
require_once(__DIR__ . '/includes/add_metaboxes.php');


add_action('wp_enqueue_scripts', 'enqueue_styles');

// Prend en compte le style.css du thème enfant
function enqueue_styles()
{
  wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('phpmailer_init', 'my_phpmailer_configuration');
function my_phpmailer_configuration($phpmailer)
{
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.hostinger.fr';
  $phpmailer->SMTPAuth = true; // Indispensable pour forcer l'authentification
  $phpmailer->Port = 465;
  $phpmailer->Username = 'chaletsetcaviar@davy-beauzil.fr';
  $phpmailer->Password = 'Jeunes@peurp16';

  // Configurations complémentaires
  $phpmailer->SMTPSecure = "ssl"; // Sécurisation du serveur SMTP : ssl ou tls
  $phpmailer->From = "chaletsetcaviar@davy-beauzil.fr"; // Adresse email d'envoi des mails
  $phpmailer->FromName = "Chalets et caviar"; // Nom affiché lors de l'envoi du mail
}
