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
 
 
// enqueue css
function lagoonlogistics_common_custom_css(){
    
    wp_enqueue_style( 'lagoonlogistics-common', get_template_directory_uri().'/assets/css/dynamic.css' );
		$header_bg         		  = esc_url( get_header_image() );
		$header_bg_img 			  = !empty( $header_bg ) ? 'background-image: url('.esc_url( $header_bg ).')' : '';

		$themeColor     		  = lagoonlogistics_opt( 'lagoonlogistics_theme_color', '#e72727' );

		$headerTop_bg     		  = lagoonlogistics_opt( 'lagoonlogistics_top_header_bg_color' );
		$headerTop_col     		  = lagoonlogistics_opt( 'lagoonlogistics_top_header_color' );

		$headerBg          		  = lagoonlogistics_opt( 'lagoonlogistics_header_bg_color', '#fff' );
		$menuColor          	  = lagoonlogistics_opt( 'lagoonlogistics_header_menu_color', '#262533' );
		$menuHoverColor           = lagoonlogistics_opt( 'lagoonlogistics_header_menu_hover_color' );

		$dropMenuBgColor          = lagoonlogistics_opt( 'lagoonlogistics_header_menu_dropbg_color' );
		$dropMenuColor            = lagoonlogistics_opt( 'lagoonlogistics_header_drop_menu_color' );
		$dropMenuHovColor         = lagoonlogistics_opt( 'lagoonlogistics_header_drop_menu_hover_color' );
		$dropMenuHovItemBg        = lagoonlogistics_opt( 'lagoonlogistics_drop_menu_item_hover_bg' );

		$footerwbgColor     	  = lagoonlogistics_opt('lagoonlogistics_footer_widget_bdcolor', '#19191b');
		$footerwbgImage     	  = lagoonlogistics_opt('lagoonlogistics_footer_widget_bgimg');
		$footerwTextColor   	  = lagoonlogistics_opt('lagoonlogistics_footer_widget_textcolor');
		$footerwanchorcolor 	  = lagoonlogistics_opt('lagoonlogistics_footer_widget_anchorcolor', '#8f8f8f');
		$footerwanchorhovcolor    = lagoonlogistics_opt('lagoonlogistics_footer_widget_anchorhovcolor', '#e72727');
		$widgettitlecolor  		  = lagoonlogistics_opt('lagoonlogistics_footer_widget_titlecolor');


		$fofbg  	  		  = lagoonlogistics_opt('lagoonlogistics_fof_bg_color');
		$foftonecolor  	  	  = lagoonlogistics_opt('lagoonlogistics_fof_textone_color');
		$fofttwocolor  	  	  = lagoonlogistics_opt('lagoonlogistics_fof_texttwo_color');


		$footerbgImg = json_decode( $footerwbgImage );

		$footerbgImgAttr = '';

		if( ! empty( $footerbgImg->url ) ) {
			$footerbgImgAttr = 'background-image:url( ' .esc_url( $footerbgImg->url ). ' );';
		}

		$dirImg = get_template_directory_uri().'/assets/img/pattern_bg.png';


		$customcss ="
			.banner-area .owl-nav div:hover{
				background-image: url( {$dirImg} )
			}
		
			.banner-area{
				{$header_bg_img}
			}
			.header_area {
				background: {$headerBg}
			}

			.section-title-wrap h5,
			.top_menu .left_side li:hover a,
			.top_menu .right_side li:hover a,
			.top_menu .left_side li a:hover a,
			.top_menu .right_side li a i,
			.header_area .navbar .icons:hover,
			.header_area .navbar .nav .nav-item:hover .nav-link, 
			.header_area .navbar .nav .nav-item.active .nav-link,
			.single-feature i,
			.about-area .activity .activity_box i,
			.single-service:hover h3,
			.quote-area .nav-tabs .nav-link.active, 
			.quote-area .nav-tabs .nav-link:hover,
			.quote-area .estimated-cost .form-wrap .form-select .nice-select .list .option:hover,
			.quote-area .estimated-cost .form-wrap .form-select .nice-select .list .option.selected,
			.single-home-blog .bottom a:hover,
			.single-home-blog:hover h4,
			.banner_area .banner_inner .banner_content .page_link a:hover,
			.l_blog_item .l_blog_text h4:hover,
			.causes_item .causes_text h4:hover,
			.blog_right_sidebar .post_category_widget .cat-list li:hover a,
			.blog_right_sidebar .widget_lagoonlogistics_recent_widget .post_item .media-body h3:hover,
			.single-post-area .navigation-top .social-icons li:hover i,
			.single-post-area .navigation-top .social-icons li:hover span,
			.comments-area .btn-reply:hover,
			.form-contact label,
			.sample-text-area p b,
			.sample-text-area p i,
			.sample-text-area p sup,
			.sample-text-area p sub,
			.sample-text-area p del,
			.sample-text-area p u,
			.link-border,
			.submit_btn:hover,
			.copy-right-text i,
			.copy-right-text a,
			.footer-social a:hover i,
			.footer-text a,
			.footer-text i,
			.wp-block-archives li a:hover,
			.blog_details .wp-block-categories-list li a:hover,
			.wp-block-latest-comments__comment-author:hover, 
			.wp-block-latest-comments__comment-link:hover,
			.blog_right_sidebar .widget_categories ul > li:hover > a,
			.blog_right_sidebar .widget_rss ul li:hover a,
			.blog_right_sidebar .widget_recent_entries ul li:hover a,
			.blog_right_sidebar .widget_recent_comments ul li:hover a,
			.blog_right_sidebar .widget_archive ul li:hover a,
			.blog_right_sidebar .widget_meta ul li:hover a,
			.blog_right_sidebar .widget_nav_menu ul li a:hover,
			.blog_right_sidebar .widget_pages ul li a:hover
			{
				color: {$themeColor}
			}			

			.header_area .navbar .nav .nav-item.submenu ul > .nav-item:hover > .nav-link,
			.home_banner_area .banner_inner .banner-right .main_btn:hover,
			.home_banner_area .banner_inner .banner-right .main_btn:hover:before,
			.single-feature a:before,
			.single-service a:before,
			.testimonial-area .owl-carousel .owl-nav .owl-prev,
			.testimonial-area .owl-carousel .owl-nav .owl-next,
			.testimonial-area .owl-carousel .owl-nav .owl-prev:before,
			.testimonial-area .owl-carousel .owl-nav .owl-next:before,
			.single_testi,
			.cta_inner,
			.cta_inner .main_btn:hover:before,
			.causes_slider .owl-dots .owl-dot.active,
			.causes_item .causes_img .c_parcent span,
			.causes_item .causes_img .c_parcent span:before,
			.causes_item .causes_bottom a,
			.tags .tag_btn:before,
			.blog_item_img .blog_item_date,
			.blog_right_sidebar .tag_cloud_widget ul li a:hover,
			.link-border:before,
			.single-footer-widget .click-btn,
			.main_btn,
			.main_btn:before,
			.main_btn2:hover,
			.submit_btn,
			.white_bg_btn:hover,
			.footer-area .tagcloud a:hover,
			.single_sidebar_widget .tagcloud a:hover
			{
				background: {$themeColor}
			}

			.about-area .activity .activity_box:hover,
			.quote-area .nav-tabs .nav-link.active, 
			.quote-area .nav-tabs .nav-link:hover,
			.quote-area .estimated-cost .form-wrap .form-select .nice-select .list,
			.quote-area .estimated-cost .form-wrap textarea:focus,
			.causes_item .causes_bottom a,
			.single-post-area .quotes,
			.link-border,
			.main_btn2:hover,
			.submit_btn,
			.white_bg_btn:hover			
			{
				border-color: {$themeColor}
			}
			.cta_inner .main_btn:after, .main_btn:hover:after {
			    border-right: 10px solid {$themeColor};
			    border-bottom: 10px solid {$themeColor};
			}



			.top_menu{
				background: {$headerTop_bg}
			}
			.top_menu .dn_btn,
			.top_menu .header_social li a,
			.top_menu .follow_us
			{
				color: {$headerTop_col}
			}

			
			
			.header_area .navbar .nav .nav-item .nav-link {
			   color: {$menuColor};
			}
			.header_area .navbar .nav .nav-item:hover .nav-link,
			.header_area .navbar .nav > .nav-item.active > .nav-link{
			   color: {$menuHoverColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul {
			   background: {$dropMenuBgColor};
			}
			.header_area .navbar .nav .nav-item.submenu ul .nav-item .nav-link {
			   color: {$dropMenuColor};
			}
			
			.header_area .navbar .nav .nav-item.submenu > ul > .nav-item:hover > .nav-link{
				background: {$dropMenuHovItemBg};
				color: {$dropMenuHovColor}
			}
	
			.footer-area .footer-top{
				{$footerbgImgAttr}
			}
			
			.footer-area {
				background-color: {$footerwbgColor};
			}
			footer.footer-area p{
				color: {$footerwTextColor}
			}
			.footer-area .single-footer-widget h4{
				color: {$widgettitlecolor}
			}
			footer a,
			.footer-area .single-footer-widget ul li a{
			   color: {$footerwanchorcolor};
			}
			footer a:hover,
			.footer-area .single-footer-widget ul li a:hover{
			   color: {$footerwanchorhovcolor};
			}
			#f0f {
			   background-color: {$fofbg};
			}
			.f0f-content .h1 {
			   color: {$foftonecolor};
			}
			.f0f-content p {
			   color: {$fofttwocolor};
			}

        ";
       
    wp_add_inline_style( 'lagoonlogistics-common', $customcss );
    
}
add_action( 'wp_enqueue_scripts', 'lagoonlogistics_common_custom_css', 50 );