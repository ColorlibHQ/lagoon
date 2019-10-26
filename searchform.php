<?php
/**
 * @Packge     : lagoonlogistics
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}
?>

<form action="<?php echo esc_url( site_url( '/' ) ); ?>">
	<div class="form-group">
		<div class="input-group mb-3">
			<input type="text" class="form-control" name="s" placeholder="<?php esc_html_e( 'Search Keyword', 'lagoonlogistics' ); ?>">
		</div>
	</div>
	<button class="button main_btn w-100" type="submit">Search</button>
</form>
