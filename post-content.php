<section class="entry-content">

    <?php if ( have_posts() ) : ?>

    <div aria-labelledby="posts" class="lunar-content">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> 
                itemscope itemtype="https://schema.org/Article">
         
             <header class="article-heading">
             
             <h3><?php the_title(); ?></h3>
             
             </header>

            <?php if (has_post_thumbnail()) { ?>
             <figure class="featured-img-container">
             
                <?php the_post_thumbnail(); ?>
                <figcaption>
            
                   <?php echo wp_get_attachment_caption(get_post_thumbnail_id()); ?>
                </figcaption>
            </figure>
            <?php }  
            ?>
                <div class="inner-article-content">

                    <?php the_content( ); ?>
                         <p><?php wp_link_pages(	array(
				'before' => '<div class="page-link"><span>' . __( 'Pages:', 'tinydancer' ) . '</span>',
				'after'  => '</div>', 
                ) ); ?></p>
                </div>
                
                <?php 
                // If comments are open or we have at least one comment, load up the comment template.
			    if ( comments_open() || get_comments_number() ) {
				    comments_template();
			    } ?>
			    
        </article>                 
    </div>

    <?php endwhile; ?>
        <?php else : ?>
            
            <div class="post-content">
		        
                <?php echo esc_url( home_url('/') ); ?>
            
            </div>

    <?php endif; ?>  
</section> 
