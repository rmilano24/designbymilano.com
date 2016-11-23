<?php
/**
 * The Template for displaying all single posts
 */

global $post;
$related_posts      = 3;
$post_thumbnail_url = '';
$hide_addinfo       = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'hide-post-meta', false ) : false;

setup_postdata( $post );
if ( has_post_thumbnail() ) {
	$post_thumbnail_id  = get_post_thumbnail_id( get_the_ID() );
	$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
}
$container_width = 'container';
if ( function_exists( 'fw_ext_page_builder_is_builder_post' ) && true === fw_ext_page_builder_is_builder_post( get_the_ID() ) ) {
	$container_width = 'page-builder-wrap';
}

$header_bg = ( ! empty( $post_thumbnail_url ) ) ? 'background-image: url(' . $post_thumbnail_url . ')' : 'background-color: #222'; ?>
<div class="fixed-background" style="<?php echo esc_attr( $header_bg ); ?>">
	<div class="banner-height">
		<div class="full-size-banner-entry full-size valign-middle">
			<div class="valign-text-wrapper text-center">
				<div class="row">
					<div class="col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
						<?php the_title( '<h1 class="h2 light"><b>', '</b></h1>' ); ?>
						<?php if ( true !== $hide_addinfo ) { ?>
							<div class="empty-space col-xs-b15"></div>
							<div class="banner-max-width">
								<div class="simple-article small light transparent text-center">
									<?php echo modesto_posted_author(); ?> / <?php echo modesto_posted_on(); ?><?php echo modesto_posted_additional( get_the_ID() ); ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_reset_postdata(); ?>
<div id="primary">
	<div class="container">
		<div class="empty-space col-xs-b55 col-sm-b110"></div>
		<div class="row">
			<div class="col-md-10  col-md-offset-1">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-article' ); ?>>
						<?php
						the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'modesto' ) );
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'modesto' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
						?>
					</article><!-- #post-## -->
				<?php endwhile; ?>

				<div class="empty-space col-xs-b30"></div>
				<div class="row">
					<div class="col-sm-6">
						<?php
						$posttags = get_the_tags();
						if ( $posttags ) {
							echo '<h6 class="h6 article-options-title">' . esc_html__( 'Tags', 'modesto' ) . '</h6>';
							foreach ( $posttags as $tag ) {
								echo '<a class="tag-button" href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a>';
							}
						}
						?>
						<div class="empty-space col-xs-b20 col-sm-b0"></div>
					</div>
					<div class="col-sm-6 col-sm-text-right">
						<div class="follow style-4">
							<h6 class="h6 article-options-title"><?php esc_html_e( 'Share', 'modesto' ) ?></h6>
							<a class="entry sharer" data-sharer="facebook" data-title="<?php the_title(); ?>" data-url="<?php echo esc_attr( wp_get_shortlink() ); ?>"><i class="fa fa-facebook"></i></a>
							<a class="entry sharer" data-sharer="googleplus" data-title="<?php the_title(); ?>" data-url="<?php echo esc_attr( wp_get_shortlink() ); ?>"><i class="fa fa-google-plus"></i></a>
							<a class="entry sharer" data-sharer="twitter" data-title="<?php the_title(); ?>" data-url="<?php echo wp_get_shortlink(); ?>"><i class="fa fa-twitter"></i></a>
							<a class="entry sharer" data-sharer="pinterest" data-title="<?php the_title(); ?>" data-url="<?php echo esc_attr( wp_get_shortlink() ); ?>"><i class="fa fa-pinterest-p"></i></a>
							<a class="entry sharer" data-sharer="xing" data-title="<?php the_title(); ?>" data-url="<?php echo esc_attr( wp_get_shortlink() ); ?>"><i class="fa fa-xing"></i></a>
							<?php if ( function_exists( 'get_simple_likes_button' ) ) { ?>
								<div class="simple-article small grey article-likes-title blog-light-color">
									<?php echo get_simple_likes_button( get_the_ID() ); ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php if ( class_exists( 'RP4WP' ) ) { ?>
					<div class="empty-space col-xs-b55 col-sm-b80"></div>
					<div class="column-indent">
						<?php set_query_var( 'related_posts_count', $related_posts );
						get_template_part( 'parts/related/post', 'related' ); ?>
					</div>
				<?php } ?>
				<div class="empty-space col-xs-b25 col-sm-b80"></div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>