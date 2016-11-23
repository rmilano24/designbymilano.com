<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * @var $number
 * @var $before_widget
 * @var $after_widget
 * @var $title
 * @var $tweets
 * @var $style
 */

echo $before_widget;
echo esc_html( $title );

$style_class      = ( strpos( $style, 'gray' ) !== false ) ? 'light' : $style;
$article_class    = ( strpos( $style, 'blue' ) !== false ) ? 'light' : '';
$pagination_class = ( strpos( $style, 'blue' ) !== false ) ? 'swiper-pagination-white' : '';
?>
	<div class="w-twitter twitter twitter--gray">
		<?php if ( ! empty( $tweets->errors ) ) {
			echo esc_html__( 'Error code:', 'modesto' ) . ' ' . esc_html( $tweets->errors[0]->code ) . ' ' . esc_html( $tweets->errors[0]->message );
		} elseif(!empty($tweets) && is_array($tweets)) { ?>
			<div class="twitter-entry <?php echo esc_attr( $style_class ); ?>">
				<div class="swiper-container swiper-standard" data-slides-per-view="1" data-mousewheel="1">
					<!-- Additional required wrapper -->
					<div class="swiper-wrapper">
						<!-- Slides -->
						<?php foreach ( $tweets as $tweet ) { ?>
							<div class="swiper-slide">
								<div class="align valign-middle">
									<div class="align-content">
										<div class="row col-xs-b15">
											<div class="col-xs-6">
												<div class="date"><i><?php echo esc_html( modesto_relative_time( $tweet->created_at ) ); ?></i></div>
											</div>
											<div class="col-xs-6 text-right">
												<i class="fa fa-twitter"></i>
											</div>
										</div>
										<div class="simple-article <?php echo esc_attr( $article_class ); ?> col-xs-b10">
											<?php echo modesto_twitter_convert_links( $tweet->text ); ?>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="swiper-pagination relative-pagination <?php echo esc_attr( $pagination_class ); ?>"></div>
				</div>
			</div>
		<?php } ?>
	</div>
<?php echo $after_widget;

