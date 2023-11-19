<?php
/**
 * The home or blog page template file
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lunar
 * @since 1.0
 */

get_header(); ?>

<div class="container">
    <main id="sitecontent" class="content">

        <?php get_template_part( 'post', 'loop' ); ?>

    </main>
     
        <div class="sidebar">

            <?php get_sidebar(); ?>
                    	
        </div>

</div>

<?php get_footer(); ?>
