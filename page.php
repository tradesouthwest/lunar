  <?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package solo
 * @since 1.0
 */

get_header(); ?>

<div class="container lunar-width-control">
    <main id="sitecontent" class="content">

        <?php get_template_part( 'post', 'content' ); ?>

    </main>
     
        <section class="sidebar">

            <?php get_sidebar(); ?>
                    	
        </section>
</div>

<?php get_footer(); ?>
