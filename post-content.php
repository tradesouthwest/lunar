 <?php if ( have_posts() ) : ?>

<div aria-labelledby="posts" class="solo-loop">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> 
                itemscope itemtype="https://schema.org/Article">
         
         <header class="article-heading">
         
         <?php 
         the_title(); 
         ?>
         
         </header>
         <figure class="featured-img-container">
  <?php if (has_post_thumbnail()) { the_post_thumbnail(); }  ?>
        <figcaption>
        <?php echo wp_get_attachment_caption(get_post_thumbnail_id()); ?>
        </figcaption>
        
        </figure>

            <?php 
            the_content( ); 
            ?>
            
        </article>                 

</div>

         <?php endwhile; ?>
<?php else : ?>
            
            <div class="post-content">
		        
            <?php echo esc_url( home_url('/') ); ?>
            
            </div>

    <?php 
    endif; ?>  
