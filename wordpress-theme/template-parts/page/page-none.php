<?php
/**
 * The missing content template.
 *
 * Used in particular by 404 template.
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

?>
<h1>
	<?php esc_html_e( 'Nothing found', 'yourTextDomain' ); ?>
</h1>
<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
	<p>
		<?php
		printf(
			// translators: %1$s: URL to publish post.
			esc_html__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'yourTextDomain' ),
			esc_url( admin_url( 'post-new.php' ) )
		);
		?>
	</p>
<?php } else { ?>
	<p>
		<?php
		esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'yourTextDomain' );
		?>
	</p>
	<?php
}
