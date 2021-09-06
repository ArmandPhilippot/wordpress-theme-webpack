<?php
/**
 * The footer template.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

?>
	</main>
	<footer>
		<?php get_template_part( 'template-parts/footer/site', 'copyright' ); ?>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
