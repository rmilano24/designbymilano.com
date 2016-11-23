<?php

$fancy_style = get_query_var( 'fancy_style' );
$show_meta   = get_query_var( 'fancy_show_meta' );

$client = fw_get_db_post_option( get_the_ID(), 'client', '' );

$portfolio_categories = wp_get_post_terms( get_the_ID(), 'fw-portfolio-category' );
$display_cats         = array();
if ( ! is_wp_error( $portfolio_categories ) ) {
	foreach ( $portfolio_categories as $single_cat ) {
		$display_cats[] = '<a href="' . esc_url( get_term_link( $single_cat->term_id ) ) . '">' . esc_html( $single_cat->name ) . '</a>';
	}
	$display_cats = array_slice( $display_cats, 0, 2 );
}

$display_cats = implode( ' / ', $display_cats );

if ( has_post_thumbnail( get_the_ID() ) ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
} else {
	$thumb[0] = get_template_directory_uri() . '/images/no-image.png';
}

if ( 1 === $fancy_style ) {
	?>
	<div class="col-sm-6">
		<div class="async-entry style-2">
			<div class="content-wrapper">
				<div class="align">
					<div class="title">
						<div class="h3 small">
							<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="blog-mouseover-3"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
						</div>
					</div>
					<a class="mouseover" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '496', '750', true ) ) ?>);" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
						<span class="mouseover-helper-frame"></span>
						<span class="mouseover-helper-icon"></span>
					</a>
					<?php if ( 'on' === $show_meta ) { ?>
						<?php if ( ! empty( $client ) ) { ?>
							<div class="label-wrapper simple-article small">
								<i><?php esc_html_e( 'For:', 'modesto' ) ?></i> <b><?php echo esc_attr( $client ) ?></b>
							</div>
						<?php } ?>
						<div class="rotate-wrapper">
							<div class="rotate simple-article small">
								<i><?php echo( $display_cats ) ?></i>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="empty-space col-xs-b55 col-sm-b110"></div>
<?php } elseif ( 2 === $fancy_style ) { ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="async-entry style-3">
				<div class="content-wrapper">
					<div class="align">
						<div class="title">
							<div class="h3 small">
								<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="blog-mouseover-3"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
							</div>
						</div>
						<a class="mouseover" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '829', '500', true ) ) ?>);" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
							<span class="mouseover-helper-frame"></span>
							<span class="mouseover-helper-icon"></span>
						</a>
						<?php if ( 'on' === $show_meta ) { ?>
							<?php if ( ! empty( $client ) ) { ?>
								<div class="label-wrapper simple-article small">
									<i><?php esc_html_e( 'For:', 'modesto' ) ?></i>
									<b><?php echo esc_attr( $client ) ?></b>
								</div>
							<?php } ?>
							<div class="rotate-wrapper simple-article small">
								<div class="rotate js-get-height">
									<i><?php echo( $display_cats ) ?></i>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="empty-space col-xs-b55 col-sm-b110"></div>
<?php } elseif ( 3 === $fancy_style ) { ?>
	<div class="row">
	<div class="col-sm-6">
		<div class="async-entry style-2">
			<div class="content-wrapper">
				<div class="align">
					<div class="title">
						<div class="h3 small">
							<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="blog-mouseover-3"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
						</div>
					</div>
					<a class="mouseover" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '496', '750', true ) ) ?>);" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
						<span class="mouseover-helper-frame"></span>
						<span class="mouseover-helper-icon"></span>
					</a>
					<?php if ( 'on' === $show_meta ) { ?>
						<?php if ( ! empty( $client ) ) { ?>
							<div class="label-wrapper simple-article small">
								<i><?php esc_html_e( 'For:', 'modesto' ) ?></i> <b><?php echo esc_attr( $client ) ?></b>
							</div>
						<?php } ?>
						<div class="rotate-wrapper">
							<div class="rotate simple-article small">
								<i><?php echo( $display_cats ) ?></i>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="empty-space col-xs-b55 col-sm-b0"></div>
	</div>
<?php } elseif ( 4 === $fancy_style ) { ?>
	<div class="col-sm-6">
		<div class="async-entry style-1">
			<div class="content-wrapper">
				<div class="align">
					<div class="title">
						<div class="h3 small">
							<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="blog-mouseover-3"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
						</div>
					</div>
					<a class="mouseover" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '496', '750', true ) ) ?>);" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
						<span class="mouseover-helper-frame"></span>
						<span class="mouseover-helper-icon"></span>
					</a>
					<?php if ( 'on' === $show_meta ) { ?>
						<?php if ( ! empty( $client ) ) { ?>
							<div class="label-wrapper simple-article small">
								<i><?php esc_html_e( 'For:', 'modesto' ) ?></i> <b><?php echo esc_attr( $client ) ?></b>
							</div>
						<?php } ?>
						<div class="rotate-wrapper">
							<div class="rotate simple-article small">
								<i><?php echo( $display_cats ) ?></i>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="empty-space col-xs-b55 col-sm-b110"></div>
<?php } elseif ( 5 === $fancy_style ) { ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="async-entry style-4">
				<div class="content-wrapper">
					<div class="align">
						<div class="title">
							<div class="h3 small">
								<a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>" class="blog-mouseover-3"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
							</div>
						</div>
						<a class="mouseover" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '829', '500', true ) ) ?>);" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
							<span class="mouseover-helper-frame"></span>
							<span class="mouseover-helper-icon"></span>
						</a>
						<?php if ( 'on' === $show_meta ) { ?>
							<?php if ( ! empty( $client ) ) { ?>
								<div class="label-wrapper simple-article small">
									<i><?php esc_html_e( 'For:', 'modesto' ) ?></i>
									<b><?php echo esc_attr( $client ) ?></b>
								</div>
							<?php } ?>
							<div class="rotate-wrapper simple-article small">
								<div class="rotate">
									<i><?php echo( $display_cats ) ?></i>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="empty-space col-xs-b35"></div>
<?php } else {
	?>
	<div class="row">
	<div class="col-sm-6">
		<div class="async-entry style-1">
			<div class="content-wrapper">
				<div class="align">
					<div class="title">
						<div class="h3 small">
							<a href="<?php echo esc_attr( get_the_permalink( get_the_ID() ) ) ?>" class="blog-mouseover-3"><b><?php echo esc_attr( get_the_title( get_the_ID() ) ) ?></b></a>
						</div>
					</div>
					<a class="mouseover" style="background-image: url(<?php echo esc_url( fw_resize( $thumb[0], '496', '750', true ) ) ?>);" href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ) ?>">
						<span class="mouseover-helper-frame"></span>
						<span class="mouseover-helper-icon"></span>
					</a>
					<?php if ( 'on' === $show_meta ) { ?>
						<?php if ( ! empty( $client ) ) { ?>
							<div class="label-wrapper simple-article small">
								<i><?php esc_html_e( 'For:', 'modesto' ) ?></i> <b><?php echo esc_attr( $client ) ?></b>
							</div>
						<?php } ?>
						<div class="rotate-wrapper">
							<div class="rotate simple-article small">
								<i><?php echo( $display_cats ) ?></i>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="empty-space col-xs-b55 col-sm-b0"></div>
	</div>
<?php } ?>