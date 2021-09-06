<?php
/**
 * The main template.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme. It is used to display a page when nothing
 * more specific matches a query.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
	if ( get_next_posts_link() || get_previous_posts_link() ) {
		the_posts_pagination();
	}
} else {
	get_template_part( 'template-parts/page/page', 'none' );
}
get_footer();
