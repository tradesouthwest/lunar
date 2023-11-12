<div class="nav-container bkg-dark">
			  <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'primary-menu',
                            'depth'          => 3,
                            'container'     => 'div',
                            'menu_class'   => 'page-nav',
                            'fallback_cb' => 'wp_page_menu',
                        )
                    ); ?>
</div> 
