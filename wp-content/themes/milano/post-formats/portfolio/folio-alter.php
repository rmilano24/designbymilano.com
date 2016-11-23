<?php

$show_excerpt   = get_query_var( 'alter_show_excerpt' );
$excerpt_length = get_query_var( 'alter_excerpt_length' );
$readmore       = get_query_var( 'alter_readmore' );
$alter_comt     = get_query_var( 'alter_count' );

if ( has_post_thumbnail( get_the_ID() ) ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
} else {
	$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
}

if ( 'yes' === $show_excerpt ) {

	$excerpt = get_post_field( 'post_excerpt', get_the_ID() );
	if ( isset( $excerpt ) && ! empty( $excerpt ) ) {
		$display_excerpt = wp_trim_words( $excerpt, $excerpt_length );
	} else {
		$display_excerpt = wp_trim_words( get_the_content(), $excerpt_length );
	}

} else {
	$display_excerpt = '';
}

if ( 1 === $alter_comt ) {
	$align_class = 'new-view';
} else {
	$align_class = '';
}

if ( empty( $readmore ) ) {
	$readmore = esc_html__( 'read more', 'modesto' );
} ?>
<div class="row">
	<div class="col-md-12">
		<div class="left-right-entry clearfix <?php echo esc_attr( $align_class ) ?>">
			<div class="left">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<div class="cell-view">
							<div class="simple-article grey text-center">
								<h2 class="small"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></h2>
								<?php if ( 'yes' === $show_excerpt ) { ?>
									<div class="empty-space col-xs-b5"></div>
									<p><?php echo( $display_excerpt ) ?></p>
									<div class="empty-space col-xs-b35"></div>
									<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="button type-3"><?php echo esc_attr( $readmore ) ?></a>
								<?php } ?>
							</div>
							<div class="empty-space col-sm-b20"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="right">
				<a class="entry full-size mouseover poster-3d" data-offset="5" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '846', '500', true ) ) ?>);"
				   href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
                                <span class="layer-1 full-size" data-offset="10">
                                    <span class="mouseover-helper-frame"></span>
                                </span>
					<span class="layer-1 full-size" data-offset="20">
                                    <span class="mouseover-helper-icon"></span>
                                </span>
				</a>
			</div>
		</div>
	</div>
</div>