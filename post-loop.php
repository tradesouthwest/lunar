<?php
/**
 * The template part for displaying content
 *
 * @package Lunar
 * @since Lunar 1.0
 */
?>
	<div class="entry-content">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) :
            the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		

        	<?php the_title( sprintf( '<h2 class="entry-title-article"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	
                <figure class="featured-img-container">
        
                    <?php if (has_post_thumbnail()) { the_post_thumbnail(); }  ?>
    
                </figure>

                <div class="excerpt-content">

                    <?php
                     $article_data = substr(get_the_content(), 0, 300);
echo $article_data;
    ?>
                </div>

                    <div class="meta-foot">
                            
                            <p>info</p>
    
                    </div>
	
		</article>

        <?php endwhile; 
        	// If no content, include the "No posts found" template.
		else :
			echo "---------------------- nothing to see here -----------------------";
		endif;
		?>
    <nav>
        <?php 
			// Previous/next page navigation.
			the_posts_pagination(
				array(
					'prev_text'          => esc_html__( 'Previous page', 'lunar' ),
					'next_text'          => esc_html__( 'Next page', 'lunar' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'lunar' ) . ' </span>',
				)
			);
?>
</nav>
		
