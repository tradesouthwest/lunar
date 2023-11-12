<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "main" tag.
 *
 * @package lunar
 * @since   1.0
 */

?><!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <a class="skip-link screen-reader-text" aria-label="first content" href="#sitecontent">
        <?php esc_html_e( 'Skip to content', 'solo' ); ?>
    </a>
    
        <header class="header">
    
            <?php get_template_part( 'nav', 'top' ); ?>
    
        </header>

