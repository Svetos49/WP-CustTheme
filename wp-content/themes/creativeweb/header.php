<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package creativeweb
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

test1

<?php wp_body_open(); ?>

<?php wp_nav_menu(
	array(
		'theme_location' => 'header_nav',
		'menu_class' => 'myClass',
		'container' => 'div',
		'fallback_cb' => 'wp_page_menu'
	)
); ?>
