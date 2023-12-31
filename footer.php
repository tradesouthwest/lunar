    <footer class="site-footer">

        <div class="footer-section">
        
        <?php if ( is_active_sidebar( 'footer-one' ) ) { ?>
            <div class="footer-block foot-one">
            
                <?php dynamic_sidebar( 'footer-one' ); ?>

            </div>
        
        <?php } ?>
        </div>

        <div class="footer-section">
        
        <?php if ( is_active_sidebar( 'footer-two' ) ) { ?>
            <div class="footer-block foot-two">
        
                <?php dynamic_sidebar( 'footer-two' ); ?>
        
            </div>
        
        <?php } ?>
        </div>

        <div class="footer-section">
            
            <?php if ( is_active_sidebar( 'footer-three' ) ) { ?>
                <div class="footer-block foot-three">
            
                    <?php dynamic_sidebar( 'footer-three' ); ?>
            
                </div>
            
            <?php } ?>
            </div>

    </footer>
        <div class="footer-base">
            <div class="site-copyright">
                <small><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="bookmark">
                <?php 
                printf( '<small>%s &copy; %s</small>',
                    bloginfo( 'name' ),
                    esc_html( gmdate( 'Y' ) ) 
                ); ?></a></small>
            </div>
            <div class="upto">
                <a class="back_to_top" title="<?php esc_attr_e('Top of page link', 'lunar'); ?>"><sup>^</sup></a>
            </div>
        </div>
        
        <?php wp_footer(); ?>
        
</body>
</html>
