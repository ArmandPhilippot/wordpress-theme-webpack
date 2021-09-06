<?php
/**
 * The comments template.
 *
 * Used to display comments and comment form.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/comment-template/
 *
 * @package Your-Package-Name
 * @since   0.1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if ( have_comments() ) {
	wp_list_comments();
	the_comments_pagination();
}

comment_form();
