<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

$username        = fw_akg( 'username', $atts );
$tweets_count    = fw_akg( 'tweets_count', $atts, 1 );
$slider_infinity = fw_akg( 'slider_infinity', $atts );
$slides_per_page = fw_akg( 'slides_per_page', $atts );
$autoplay        = fw_akg( 'autoplay', $atts, 0 );

$add_class     = fw_akg( 'add_class', $atts );
$margin_bottom = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$add_class .= ' custom-space col-sm-' . $margin_bottom;
}
$add_style       = fw_akg( 'inline_style', $atts );

$number = fw_rand_md5();

if ( ! empty( $add_style ) ) {
	if ( substr_count( $add_style, 'style=' ) > 0 ) {
		$custom_style = $add_style;
	} else {
		$custom_style = 'style=' . $add_style . '"';
	}
} else {
	$custom_style = '';
}

$small = $medium = 1;
if ( ! empty( $slides_per_page ) && $slides_per_page < 4 && $slides_per_page > 1 ) {
	$medium = $slides_per_page - 1;
	$small  = $slides_per_page - 2;
} elseif ( $slides_per_page === 1 ) {
	$medium = $small = 1;
}
$data_atts = array(
	'data-slides-per-view' => esc_attr( $slides_per_page ),
	'data-breakpoints'     => 1,
	'data-xs-slides'       => 1,
	'data-sm-slides'       => esc_attr( $small ),
	'data-md-slides'       => esc_attr( $medium ),
);

if ( ! empty( $slider_infinity ) ) {
	$data_atts['data-loop'] = '1';
} else {
	$data_atts['data-loop'] = '0';
}

if ( ! empty( $autoplay ) && ! ( 0 === $autoplay ) ) {
	$data_atts['data-autoplay'] = esc_attr( $autoplay ) . '000';
} else {
	$data_atts['data-autoplay'] = '0';
}

$tweets               = get_site_transient( 'scratch_tweets_' . $username . '_' . $tweets_count );
$consumer_key         = fw_get_db_settings_option( 'twitter-consumer-key' );
$consumer_secret      = fw_get_db_settings_option( 'twitter-consumer-secret' );
$access_tocken        = fw_get_db_settings_option( 'twitter-access-token' );
$access_tocken_secret = fw_get_db_settings_option( 'twitter-access-token-secret' );

if ( fw()->extensions->get( 'social' ) ) {
	if ( empty( $consumer_key ) ) {
		$consumer_key = fw_get_db_ext_settings_option( 'social', 'twitter-consumer-key' );
	}
	if ( empty( $consumer_secret ) ) {
		$consumer_secret = fw_get_db_ext_settings_option( 'social', 'twitter-consumer-secret' );
	}
	if ( empty( $access_tocken ) ) {
		$access_tocken = fw_get_db_ext_settings_option( 'social', 'twitter-access-token' );
	}
	if ( empty( $access_tocken_secret ) ) {
		$access_tocken_secret = fw_get_db_ext_settings_option( 'social', 'twitter-access-token-secret' );
	}


	if ( empty( $tweets ) && class_exists( 'TwitterOAuth' ) ) {
		/* @var $connection TwitterOAuth */

		if ( empty( $consumer_key ) || empty( $consumer_secret ) || empty( $access_tocken ) || empty( $access_tocken_secret ) || empty( $username ) ) { ?>
			<strong><?php esc_html_e( 'Please fill all settings!', 'modesto' ) ?></strong>

			<?php return;
		}

		$connection = new TwitterOAuth( $consumer_key, $consumer_secret, $access_tocken, $access_tocken_secret );
		$tweets     = $connection->get( 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $username . '&count=' . $tweets_count );

		set_site_transient( 'scratch_tweets_' . $username . '_' . $tweets_count, $tweets, HOUR_IN_SECONDS );
	}
}
if ( ! empty( $tweets->errors ) ) {
	echo esc_html__( 'Error code:', 'modesto' ) . ' ' . esc_html( $tweets->errors[0]->code ) . ' ' . esc_html( $tweets->errors[0]->message );
} elseif(!empty($tweets) && is_array($tweets)) { ?>
	<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?>>
		<div class="row">
			<div class="col-md-12 text-center">
				<i class="fa fa-twitter twitter-slider-icon"></i>
			</div>
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="swiper-container" <?php echo fw_attr_to_html( $data_atts ); ?>>
					<div class="swiper-button-prev swiper-button hidden"></div>
					<div class="swiper-button-next swiper-button hidden"></div>
					<div class="swiper-wrapper">
						<?php foreach ( $tweets as $tweet ) {
							$converted_tweet = modesto_twitter_convert_links( $tweet->text );
							?>
							<div class="swiper-slide">
								<div class="empty-space col-xs-b15"></div>
								<div class="simple-article"><?php echo( $converted_tweet ); ?></div>
								<div class="empty-space col-xs-b10"></div>
								<div class="simple-article small grey">@<?php echo esc_attr( $username ) ?> / <?php echo esc_html( modesto_relative_time( $tweet->created_at ) ); ?></div>
								<div class="empty-space col-xs-b10"></div>
							</div>
						<?php } ?>
					</div>
					<div class="swiper-pagination relative-pagination" style="margin-top: 20px;"></div>
				</div><!--.swiper-container-->
			</div><!--.col-sm-6 col-sm-offset-3 text-center-->
		</div><!--.row-->
	</div><!--.crumina-block-->
<?php }