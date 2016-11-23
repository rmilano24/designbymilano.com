<?php
/**
 * Template for displaying search forms in Modesto
 *
 * @package modesto
 */

?>
<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-wrapper icon">
		<input class="input" type="text" value="<?php get_search_query(); ?>" name="s" />
		<label><?php echo esc_attr__( 'Search', 'modesto' ); ?> ...</label>
		<span></span>
		<button class="icon"><i class="fa fa-search"></i></button>
	</div>
</form>
