<?php
/**
 * The Template for displaying all single posts
 */

$related_posts    = 2;
$current_position = 'right';
$hide_addinfo     = ( function_exists( 'fw_get_db_settings_option' ) ) ? fw_get_db_settings_option( 'hide-post-meta', false ) : false;
$header_class     = $color = '';

$container_width = 'container';
if ( function_exists( 'fw_ext_page_builder_is_builder_post' ) && true === fw_ext_page_builder_is_builder_post( get_the_ID() ) ) {
	$container_width = 'page-builder-wrap';
}
?>
<div id="primary">
	<div class="container">
		<div class="header-empty-space"></div>
		<div class="empty-space col-xs-b55 col-sm-b110"></div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">

				<?php the_title( '<h2 class="entry-title">', '</h1>' ); ?>

				<?php if ( true !== $hide_addinfo ) { ?>
					<div class="row">
						<div class="col-sm-12">
							<div class="simple-article small grey blog-light-color"><?php echo modesto_posted_author(); ?> / <?php echo modesto_posted_on(); ?></div>
						</div>
						<!-- <div class="col-sm-6 col-sm-text-right">
							<div class="simple-article small grey blog-light-color">
								<?php echo modesto_posted_additional( get_the_ID() ); ?>
							</div>
						</div> -->
					</div>
					<div class="empty-space col-xs-b30"></div>
				<?php } ?>


			</div>
		</div>
	</div>
	<div class="empty-space col-xs-b55 col-sm-b110"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12">
				<?php while ( have_posts() ) :
					the_post(); ?>

					<!-- <article id="post-<?php the_ID(); ?>" <?php post_class( 'simple-article' ); ?>>
						<?php the_title( '<h1 class="h3 entry-title">', '</h1>' ); ?>
						<div class="empty-space col-xs-b15"></div>
						<?php if ( true !== $hide_addinfo ) { ?>
							<div class="row">
								<div class="col-sm-6">
									<div class="simple-article small grey blog-light-color"><?php echo modesto_posted_author(); ?> / <?php echo modesto_posted_on(); ?></div>
								</div>
								<div class="col-sm-6 col-sm-text-right">
									<div class="simple-article small grey blog-light-color">
										<?php echo modesto_posted_additional( get_the_ID() ); ?>
									</div>
								</div>
							</div>
							<div class="empty-space col-xs-b30"></div>
						<?php } ?> -->
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail( 'large' ); ?>
							<div class="empty-space col-xs-b30"></div>
						<?php } ?>

						<div class="simple-article grey">
							<?php
							the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'modesto' ) );
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'modesto' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
							) );
							?>
						</div>
						<div class="empty-space col-xs-b20 col-sm-b40"></div>
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
									<?php echo modesto_get_share( get_the_ID() ); ?>
									<?php if ( function_exists( 'get_simple_likes_button' ) ) { ?>
										<div class="simple-article small grey article-likes-title blog-light-color">
											<?php echo get_simple_likes_button( get_the_ID() ); ?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</article><!-- #post-## -->
					<div class="empty-space col-xs-b25 col-sm-b80"></div>
					<div class="clearfix"></div>
					<?php if ( class_exists( 'RP4WP' ) ) { ?>
					<?php set_query_var( 'related_posts_count', $related_posts );
					get_template_part( 'parts/related/post', 'related' ); ?>
					<div class="empty-space col-xs-b10 col-sm-b20"></div>
				<?php } else { ?>
					<div class="empty-space col-xs-b50 col-sm-b80"></div>
				<?php }
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
				<?php endwhile; ?>
			</div>

			<aside class="col-md-4">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	</div>
</div>
