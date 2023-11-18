<?php
/**
 * Page options settings and helpers
 * @since 1.0
 * @package lunar
 */
add_action( 'lunar_theme_customizer', 'lunar_theme_customizer_css');

/**
 * Text sanitizer for numeric values
 * @since 1.0
 * @see https://themefoundation.com/wordpress-theme-customizer/
 * @return string $input
 */
function lunar_sanitize_integer( $input )
{
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

/**
 * Text sanitizer for outputs
 * @since 1.0
 *
 * @return string $input
 */
function lunar_sanitize_text( $input )
{
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Send custum CSS to wp_head
 * @since 1.0
 *
 */
function lunar_theme_customizer_css()
{
    echo '<style id="lunar-theme-mods">';
    if ( get_theme_mods() ) :
         $pgwidth  = get_theme_mod( 'lunar_page_width', '1440' );
         $hdheight = get_theme_mod( 'lunar_heading_height', '70' );
         $hdbackgrnd = get_theme_mod( 'lunar_heading_background', '' );
          echo '@media screen and ( min-width: 980px ){
          .lunar-width-control{width: ' . esc_attr( $pgwidth ) . 'px;margin: 0 auto; }
          .site-heading{height: ' . esc_attr( $hdheight ) . 'px;}
          }
          .site-heading{ background: url( ' . $hdbackgrnd . ' );background-repeat:no-repeat;}';

    endif;
    echo '</style>';
}
