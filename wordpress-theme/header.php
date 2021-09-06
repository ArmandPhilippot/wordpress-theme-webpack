<?php
/**
 * The header template.
 *
 * This is the template that displays all of the <head> section and everything
 * up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header>
		<?php
		get_template_part( 'template-parts/header/site', 'branding' );
		get_template_part( 'template-parts/header/site', 'nav' );
		?>
	</header>
	<main>
