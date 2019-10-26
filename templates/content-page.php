<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Lagoonlogistics
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */



?>

	<div id="page_<?php the_ID(); ?>" <?php post_class('row'); ?>>
		<?php 

		/**
		 * page content 
		 * Comments Template
		 * @Hook  lagoonlogistics_page_content
		 *
		 * @Hooked lagoonlogistics_page_content_cb
		 * 
		 *
		 */
		do_action( 'lagoonlogistics_page_content' );

		?>
	</div>
