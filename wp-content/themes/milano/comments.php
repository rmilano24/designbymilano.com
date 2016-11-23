<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<?php if ( have_comments() ) : ?>
	<div class="h3 text-center"><b>
			<?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'modesto' ), number_format_i18n( get_comments_number() ) ); ?>
		</b></div>
	<div class="empty-space col-xs-b30 col-sm-b60"></div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'modesto' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'modesto' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'modesto' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ul class="comments-wrapper">
		<?php
		wp_list_comments( array(
			'style'      => 'ul',
			'short_ping' => true,
			'callback'   => 'modesto_comments',
		) );
		?>
	</ul><!-- .comment-list -->
	<div class="empty-space col-xs-b15 col-sm-b30"></div>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'modesto' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'modesto' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'modesto' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'modesto' ); ?></p>
	<?php endif; ?>
<?php endif; // have_comments() ?>
<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && '0' !== get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<div class="empty-space col-xs-b25 col-sm-b50"></div>
	<div class="h3"><b>
			<?php esc_html_e( 'Comments are closed.', 'modesto' ); ?>
		</b></div>
	<div class="empty-space col-xs-b30 col-sm-b60"></div>
<?php endif; ?>

<?php
$fields        = array(
	'author' => '<div class="row"><div class="col-sm-6"><div class="input-wrapper">
					<input class="input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	            '" size="30" required /><label for="author">' . esc_html__( 'Name', 'modesto' ) . '</label><span></span></div></div>',
	'email'  => '<div class="col-sm-6"><div class="input-wrapper">
					<input class="input" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) .
	            '" size="30" required /><label for="email">' . esc_html__( 'Email', 'modesto' ) . '</label><span></span></div></div></div>',
	'url'    => ''
);
$comments_args = array(
	'id_form'              => 'commentform',
	'class_submit'         => 'hide',
	'name_submit'          => 'submit',
	'title_reply'          => esc_html__( 'Leave a Reply', 'modesto' ),
	'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'modesto' ),
	'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'modesto' ),
	'label_submit'         => esc_html__( 'Post Comment', 'modesto' ),
	'title_reply_before'   => '<div class="empty-space col-xs-b15 col-sm-b30"></div><div class="h4 small"><b>',
	'title_reply_after'    => '</b></div><div class="empty-space col-xs-b15"></div>',
	'comment_notes_after'  => '<button type="submit" class="button type-3">' . esc_html__( 'Post Comment', 'modesto' ) . '</button>',
	'comment_notes_before' => '<p class="comment-notes">' . esc_html__( 'Your email address will not be published.', 'modesto' ) . '</p>',
	'comment_field'        => '<div class="row"><div class="col-sm-12"><div class="input-wrapper">
					<textarea class="input" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
					<label for="comment">' . esc_html__( 'Comment', 'modesto' ) . '</label><span></span></div></div></div>',
	'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
);
comment_form( $comments_args );
?>

<div class="empty-space col-xs-b55 col-sm-b110"></div>