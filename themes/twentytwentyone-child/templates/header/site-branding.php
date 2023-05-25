<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
//wird der Seitentitel angezeigt: true/false
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<!-- wenn der Seitentitel angezeigt wird -->
<?php if ( has_custom_logo() && $show_title ) : ?>
	<div class="site-logo"><?php the_custom_logo(); ?>
	<p class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></p></div>
<?php endif; ?>