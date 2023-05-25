<?php
/**
 * Header Parts
 *
* Twenty_Twenty_One Child
*/

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>">

	<?php get_template_part( 'templates/header/site-branding' ); ?>
	<?php get_template_part( 'templates/header/site-nav' ); ?>

</header><!-- #masthead -->
