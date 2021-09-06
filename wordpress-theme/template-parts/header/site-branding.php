<?php
/**
 * The branding template.
 *
 * Used to display branding in header template.
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

if ( has_custom_logo() ) {
	the_custom_logo();
}
?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
</a>
<p>
	<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
</p>
