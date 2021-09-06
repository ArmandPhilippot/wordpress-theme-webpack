<?php
/**
 * The page template.
 *
 * Used when an individual page is queried.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

get_header();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/page/page', 'content' );
	}
} else {
	get_template_part( 'template-parts/page/page', 'none' );
}
get_footer();
