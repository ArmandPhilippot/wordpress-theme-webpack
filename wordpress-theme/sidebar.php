<?php
/**
 * The template for displaying the sidebar.
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

if ( is_active_sidebar( 'sidebar__blog' ) ) {
	?>
	<aside class="sidebar">
		<?php dynamic_sidebar( 'sidebar__blog' ); ?>
	</aside>
	<?php
}
