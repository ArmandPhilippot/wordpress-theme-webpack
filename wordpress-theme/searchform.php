<?php
/**
 * The search form template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

$yourprefix_unique_id = esc_attr( uniqid( 'search-form-' ) );
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form">
	<label for="<?php echo esc_attr( $yourprefix_unique_id ); ?>" class="form__label">
		<?php esc_html_e( 'Search for:', 'yourTextDomain' ); ?>
	</label>
	<input type="search" id="<?php echo esc_attr( $yourprefix_unique_id ); ?>" class="form__field" placeholder="<?php echo esc_attr_x( 'Keywords &hellip;', 'placeholder', 'yourTextDomain' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
	<button type="submit" class="form__btn btn btn--primary">
		<span class="btn__body">
			<?php echo esc_html_x( 'Search', 'submit button', 'yourTextDomain' ); ?>
		</span>
	</button>
</form>
