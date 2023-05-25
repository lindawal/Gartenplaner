<?php
/**
 * Mein header
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>
        <?php bloginfo('title'); ?>
    </title> <!-- Seitenname laden-->
	<?php wp_head(); ?><!-- WICHTIG! WP HOOK um Funktionen im Head wieder zu geben-->
</head>

<!-- <body> -->
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="site">

	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		esc_html_e( 'Skip to content', 'twentytwentyone' );
		?>
	</a>

	<?php get_template_part( 'templates/header/site-header' ); ?>
