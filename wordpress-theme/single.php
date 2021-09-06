<?php
/**
 * The single post template.
 *
 * Used when a single post is queried. For this and all other query templates,
 * index.php is used if the query template is not present.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
