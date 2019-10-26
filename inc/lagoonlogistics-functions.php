<?php 
/**
 * @Packge     : Lagoonlogistics
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

/*=========================================================
	Image Crop Size
=========================================================*/
add_image_size( 'lagoonlogistics_blog_750x375', 750, 375, true );
add_image_size( 'lagoonlogistics_60x60', 60, 60, true );
add_image_size( 'lagoonlogistics_360x200', 360, 200, true );
add_image_size( 'lagoonlogistics_latest_blog_360x220', 360, 220, true );




/*========================================================
 *  Button Pattern Background Image
 * ======================================================*/
function button_bg(){
    $img_url = get_template_directory_uri() . '/assets/img/pattern_bg_3.png';
    $icon_bg = ' style="background-image: url('. esc_url( $img_url ) .')" ';
    return $icon_bg;
}



/*=========================================================
	Theme option callback
=========================================================*/
function lagoonlogistics_opt( $id = null, $default = '' ) {
	
	$opt = get_theme_mod( $id, $default );
	
	$data = '';
	
	if( $opt ) {
		$data = $opt;
	}
	
	return $data;
}

/*======================================================
 *  Social Profile
 * ====================================================*/
function lagoonlogistics_social_profile() {
	$social_urls = lagoonlogistics_opt( 'lagoonlogistics_social_pofile' );
	if ( is_array( $social_urls ) && count( $social_urls ) > 0 ) {
		?>
        <div class="float-left">
            <ul class="left_side">
                <?php
                foreach ( $social_urls as $social_pro ) {
                    echo '<li><a href="' . esc_url( $social_pro['social_url'] ) . '"><i class="'. esc_attr( $social_pro['social_icon'] ) .'"></i></a></li>';
                }
                ?>
            </ul>
        </div>
		<?php
	}
}


/*=========================================================
	Blog Date Permalink
=========================================================*/
function lagoonlogistics_blog_date_permalink(){
	
	$year  = get_the_time('Y'); 
    $month_link = get_the_time('m');
    $day   = get_the_time('d');

    $link = get_day_link( $year, $month_link, $day);
    
    return $link; 
}



/*========================================================
	Blog Excerpt Length
========================================================*/
if ( ! function_exists( 'lagoonlogistics_excerpt_length' ) ) {
	function lagoonlogistics_excerpt_length( $limit = 30 ) {

		$excerpt = explode( ' ', get_the_excerpt() );
		
		// $limit null check
		if( !null == $limit ){
			$limit = $limit;
		}else{
			$limit = 30;
		}
        
        
		if ( count( $excerpt ) >= $limit ) {
			array_pop( $excerpt );
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice ).' ...';
		} else {
			$exc_slice = array_slice( $excerpt, 0, $limit );
			$excerpt = implode( " ", $exc_slice );
		}
		
		$excerpt = '<p>'.preg_replace('`\[[^\]]*\]`','',$excerpt).'</p>';
		return $excerpt;

	}
}


/*==========================================================
	Comment number and Link
==========================================================*/
if ( ! function_exists( 'lagoonlogistics_posted_comments' ) ) {
    function lagoonlogistics_posted_comments( $icon = true ){
        $icon = $icon == true ? '<i class="fa fa-comments"></i>' : '';
        $comments_num = get_comments_number();
        if( comments_open() ){
            if( $comments_num == 0 ){
                $comments = esc_html__('No Comments','lagoonlogistics');
            } elseif ( $comments_num > 1 ){
                $comments= $comments_num . esc_html__(' Comments','lagoonlogistics');
            } else {
                $comments = esc_html__( '1 Comment','lagoonlogistics' );
            }
            $comments = '<a href="' . esc_url( get_comments_link() ) . '">'. $icon . $comments .'</a>';
        } else {
            $comments = esc_html__( 'Comments are closed', 'lagoonlogistics' );
        }
        
        return $comments;
    }
}


/*===================================================
	Post embedded media
===================================================*/
function lagoonlogistics_embedded_media( $type = array() ){
    
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );
        
    if( in_array( 'audio' , $type) ){
    
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }
        
    }else{
        
        if( count( $embed ) > 0 ){

            $output = $embed[0];
        }else{
           $output = ''; 
        }
        
    }
    
    return $output;
}


/*===================================================
	WP post link pages
====================================================*/
function lagoonlogistics_link_pages(){
    wp_link_pages( array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'lagoonlogistics' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'lagoonlogistics' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


/*====================================================
	Theme logo
====================================================*/
function lagoonlogistics_theme_logo( $class = '' ) {

    $siteUrl = home_url('/');
    // site logo
		
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$imageUrl = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	
	if( !empty( $imageUrl[0] ) ){
		$siteLogo = '<a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'"><img src="'.esc_url( $imageUrl[0] ).'" alt=""></a>';
	}else{
		$siteLogo = '<div class="sitename_wrap"><h2><a class="'.esc_attr( $class ).'" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2><span>'. esc_html( get_bloginfo('description') ) .'</span></div>';
	}
	
	return wp_kses_post( $siteLogo );
	
}


/*================================================
    Page Title Bar
================================================*/
function lagoonlogistics_page_titlebar() {
	if ( ! is_page_template( 'template-builder.php' ) ) {
		?>
        <section class="home_banner_area banner-area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="banner_content d-flex flex-md-row flex-column">
                                <div class="banner-left text-md-right">
                                    <h1 class="text-uppercase">
	                                    <?php
                                        $blogPageTitle = !empty( lagoonlogistics_opt( 'lagoonlogistics_blog_pagetitle' ) ) ? lagoonlogistics_opt( 'lagoonlogistics_blog_pagetitle' ) : 'Blog';



	                                    if ( is_category() ) {
		                                    single_cat_title( __('Category: ', 'lagoonlogistics') );

	                                    } elseif ( is_tag() ) {
		                                    single_tag_title( 'Tag Archive for &quot;' );

	                                    } elseif ( is_archive() ) {
		                                    echo get_the_archive_title();

	                                    } elseif ( is_page() ) {
		                                    echo get_the_title();

	                                    } elseif ( is_search() ) {
		                                    echo esc_html__( 'Search for: ', 'lagoonlogistics' ) . get_search_query();

	                                    } elseif ( ! ( is_404() ) && ( is_single() ) ) {
		                                    echo esc_html__( 'Blog Details', 'lagoonlogistics' );

	                                    } elseif ( is_home() ) {
		                                    echo $blogPageTitle;

	                                    } elseif ( is_404() ) {
		                                    echo esc_html__( '404 error', 'lagoonlogistics' );

	                                    }
	                                    ?>
                                    </h1>
                                </div>
                                <div class="banner-right position-relative">
	                                <?php
	                                $subtitle = get_post_meta( get_the_ID(), 'subtitle_input_meta', true);
	                                $blogPageSubTitle = !empty( lagoonlogistics_opt( 'lagoonlogistics_blog_pagesubtitle' ) ) ? lagoonlogistics_opt( 'lagoonlogistics_blog_pagesubtitle' ) : 'If you are looking at blank cassettes on the web, you may be very confused.';

	                                if( !empty( $subtitle ) ){
		                                echo '<p>'. wp_kses_post( $subtitle ) .'</p>';
	                                }elseif ( is_single() ){
	                                    global $post;
	                                    $post_title = get_post( $post->ID );
	                                    echo '<p>'. substr( strip_tags( $post_title->post_content ), 0, 80 ) .'</p>';

                                    }elseif ( is_home() ){
	                                    echo '<p>'. $blogPageSubTitle .'</p>';
                                    }


	                                if ( function_exists( 'lagoonlogistics_breadcrumbs' ) ) {
		                                lagoonlogistics_breadcrumbs();
	                                }
	                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<?php
	}
}



/*================================================
	Blog pull right class callback
=================================================*/
function lagoonlogistics_pull_right( $id = '', $condation ){
    
    if( $id == $condation ){
        return ' '.'order-last';
    }else{
        return;
    }
    
}



/*======================================================
	Inline Background
======================================================*/
function lagoonlogistics_inline_bg_img( $bgUrl ){
    $bg = '';

    if( $bgUrl ){
        $bg = 'style="background-image:url('.esc_url( $bgUrl ).')"';
    }

    return $bg;
}


/*======================================================
	Blog Category
======================================================*/
function lagoonlogistics_featured_post_cat(){

	$categories = get_the_category(); 
	
	if( is_array( $categories ) && count( $categories ) > 0 ){
		$getCat = [];
		foreach ( $categories as $value ) {

			if( $value->slug != 'featured' ){
				$getCat[] = '<a href="'.esc_url( get_category_link( $value->term_id ) ).'">'.esc_html( $value->name ).'</a>';
			}   
		}

		return implode( ', ', $getCat );
	}

}


/*=======================================================
	Customize Sidebar Option Value Return
========================================================*/
function lagoonlogistics_sidebar_opt(){

    $sidebarOpt = lagoonlogistics_opt( 'lagoonlogistics_blog_layout' );
    $sidebar = '1';
    // Blog Sidebar layout  opt
    if( is_array( $sidebarOpt ) ){
        $sidebarOpt =  $sidebarOpt;
    }else{
        $sidebarOpt =  json_decode( $sidebarOpt, true );
    }
    
    
    if( !empty( $sidebarOpt['columnsCount'] ) ){
        $sidebar = $sidebarOpt['columnsCount'];
    }


    return $sidebar;
}


/**================================================
	Themify Icon
 =================================================*/
function lagoonlogistics_themify_icon(){
    return[
        'ti-home'       => 'Home',
        'ti-tablet'     => 'Tablet',
        'ti-email'      => 'Email',
        'ti-twitter'    => 'twitter',
        'ti-skype'      => 'skype',
        'ti-instagram'  => 'instagram',
        'ti-dribbble'   => 'dribbble',
        'ti-vimeo'      => 'vimeo',
    ];
}


/*===========================================================
	Set contact form 7 default form template
============================================================*/
function lagoonlogistics_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template = '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3"><button type="submit" class="button button-contactForm main_btn">Send Message</button></div>';

        return $template;

    } else {
        return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'lagoonlogistics_contact7_form_content', 10, 2 );



/*============================================================
	Pagination
=============================================================*/
function lagoonlogistics_blog_pagination(){
	echo '<nav class="blog-pagination justify-content-center d-flex">';
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '<span class="fa fa-long-arrow-left"></span>', 'lagoonlogistics' ),
                'next_text' => __( '<span class="fa fa-long-arrow-right"></span>', 'lagoonlogistics' ),
                'screen_reader_text' => ' '
            )
        );
	echo '</nav>';
}


/*=============================================================
	Blog Single Post Navigation
=============================================================*/
if( ! function_exists('lagoonlogistics_blog_single_post_navigation') ) {
	function lagoonlogistics_blog_single_post_navigation() {

		// Start nav Area
		if( get_next_post_link() || get_previous_post_link()   ):
			?>
			<div class="navigation-area">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
						<?php
						if( get_next_post_link() ){
							$nextPost = get_next_post();

							if( has_post_thumbnail() ){
								?>
								<div class="thumb">
									<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
										<?php echo get_the_post_thumbnail( absint( $nextPost->ID ), 'lagoonlogistics_60x60', array( 'class' => 'img-fluid' ) ) ?>
									</a>
								</div>
								<?php
							} ?>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<span class="fa fa-angle-left text-white"></span>
								</a>
							</div>
							<div class="detials">
								<p><?php echo esc_html__( 'Prev Post', 'lagoonlogistics' ); ?></p>
								<a href="<?php the_permalink(  absint( $nextPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $nextPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<?php
						} ?>
					</div>
					<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
						<?php
						if( get_previous_post_link() ){
							$prevPost = get_previous_post();
							?>
							<div class="detials">
								<p><?php echo esc_html__( 'Next Post', 'lagoonlogistics' ); ?></p>
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<h4><?php echo wp_trim_words( get_the_title( $prevPost->ID ), 4, ' ...' ); ?></h4>
								</a>
							</div>
							<div class="arrow">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<span class="fa fa-angle-right text-white"></span>
								</a>
							</div>
							<div class="thumb">
								<a href="<?php the_permalink(  absint( $prevPost->ID )  ) ?>">
									<?php echo get_the_post_thumbnail( absint( $prevPost->ID ), 'lagoonlogistics_60x60', array( 'class' => 'img-fluid' ) ) ?>
								</a>
							</div>
							<?php
						} ?>
					</div>
				</div>
			</div>
		<?php
		endif;

	}
}


/*=======================================================
	Author Bio
=======================================================*/
function lagoonlogistics_author_bio(){
	$avatar = get_avatar( absint( get_the_author_meta( 'ID' ) ), 90 );
	?>
	<div class="blog-author">
		<div class="media align-items-center">
			<?php
			if( $avatar  ) {
				echo wp_kses_post( $avatar );
			}
			?>
			<div class="media-body">
				<a href="<?php echo esc_url( get_author_posts_url( absint( get_the_author_meta( 'ID' ) ) ) ); ?>"><h4><?php echo esc_html( get_the_author() ); ?></h4></a>
				<p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
			</div>
		</div>
	</div>
	<?php
}


/*===================================================
 Lagoonlogistics Comment Template Callback
 ====================================================*/
function lagoonlogistics_comment_callback( $comment, $args, $depth ) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo esc_attr( $tag ); ?> <?php comment_class( ( empty( $args['has_children'] ) ? '' : 'parent').' comment-list' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-list">
	<?php endif; ?>
		<div class="single-comment">
			<div class="user d-flex">
				<div class="thumb">
					<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				</div>
				<div class="desc">
					<div class="comment">
						<?php comment_text(); ?>
					</div>
					<div class="d-flex justify-content-between">
						<div class="d-flex align-items-center">
							<h5 class="comment_author"><?php printf( __( '<span class="comment-author-name">%s</span> ', 'lagoonlogistics' ), get_comment_author_link() ); ?></h5>
							<p class="date"><?php printf( __('%1$s at %2$s', 'lagoonlogistics'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'lagoonlogistics' ), '  ', '' ); ?> </p>
							<?php if ( $comment->comment_approved == '0' ) : ?>
								<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'lagoonlogistics' ); ?></em>
								<br>
							<?php endif; ?>
						</div>

						<div class="reply-btn">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
						</div>
					</div>

				</div>
			</div>
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
// add class comment reply link
add_filter('comment_reply_link', 'lagoonlogistics_replace_reply_link_class');
function lagoonlogistics_replace_reply_link_class( $class ) {
	$class = str_replace("class='comment-reply-link", "class='btn-reply comment-reply-link text-uppercase", $class);
	return $class;
}



/*=========================================================
    Latest Blog Post For Elementor Section
===========================================================*/
function lagoonlogistics_latest_blog( $post_num ){
    $lBlog = new WP_Query( array(
        'post_type'      => 'post',
        'posts_per_page' => $post_num
    ) );


    if( $lBlog->have_posts() ){
        while( $lBlog->have_posts() ){
			$lBlog->the_post(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-home-blog">
                    <?php
                    if( has_post_thumbnail() ) { ?>
                        <div class="thumb">
	                        <?php the_post_thumbnail( 'lagoonlogistics_latest_blog_360x220', array( 'class' => 'f-img img-fluid mx-auto' ) ); ?>
                        </div>
	                    <?php
                    } ?>
                    <div class="home-blog-box">
                        <a href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <p><?php echo wp_trim_words( get_the_content(), 16, '' ); ?></p>
                        <div class="bottom d-flex">
                            <a href="<?php echo esc_url( lagoonlogistics_blog_date_permalink() ) ?>"><?php the_time('M j, Y') ?></a>
	                        <?php echo lagoonlogistics_posted_comments( false ) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }

    }

}



/*=========================================================
    Share Button Code
===========================================================*/
function lagoonlogistics_social_sharing_buttons( $ulClass = '', $tagLine = '' ) {

	// Get page URL
	$URL = get_permalink();
	$Sitetitle = get_bloginfo('name');

	// Get page title
	$Title = str_replace( ' ', '%20', get_the_title());

	// Construct sharing URL without using any script
	$twitterURL = 'https://twitter.com/intent/tweet?text='.esc_html( $Title ).'&amp;url='.esc_url( $URL ).'&amp;via='.esc_html( $Sitetitle );
	$faceportfolioURL= 'https://www.faceportfolio.com/sharer/sharer.php?u='.esc_url( $URL );
	$linkedin   = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
	$pinterest  = 'http://pinterest.com/pin/create/button/?url='.esc_url( $URL ).'&description='.esc_html( $Title );;

	// Add sharing button at the end of page/page content
	$content = '';
	$content  .= '<ul class="'.esc_attr( $ulClass ).'">';
	$content .= $tagLine;
	$content .= '<li><a href="' . esc_url( $twitterURL ) . '" target="_blank"><i class="ti-twitter-alt"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $faceportfolioURL ) . '" target="_blank"><i class="ti-faceportfolio"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $pinterest ) . '" target="_blank"><i class="ti-pinterest"></i></a></li>';
	$content .= '<li><a href="' . esc_url( $linkedin ) . '" target="_blank"><i class="ti-linkedin"></i></a></li>';
	$content .= '</ul>';

	return $content;

}




/*==========================================================
 *  Flaticon Icon List
=========================================================*/
function lagoonlogistics_flaticon_list(){
    return(
        array(
            'flaticon-leaf'     => 'Leaf',
            'flaticon-send'     => 'Send',
            'flaticon-camera'   => 'Camera',
            'flaticon-balloon'  => 'Balloon'
        )
    );
}


// Page Sub Title Meta ============================
function lagoonlogistics_page_titlebar_meta() {
	add_meta_box("lagoonlogistics_page_title", esc_html__( "Page Sub Title", 'lagoonlogistics' ), "page_titlebar_markup", "page", "side", "high", null);
}
add_action('add_meta_boxes', 'lagoonlogistics_page_titlebar_meta');

function page_titlebar_markup($post) {
    $subtitle = get_post_meta($post->ID, 'subtitle_input_meta', true);
    ?>
	<label for="psub_title"><?php echo esc_html__( 'Sub Title', 'lagoonlogistics' ) ?></label>
    <textarea name="psub_title" id="psub_title" cols="30" rows="5"><?php if( !empty( $subtitle ) ){ echo $subtitle; } ?></textarea>

    <?php
}

function subtitle_save_postdata( $post_id ){
    $psub_title  = !empty( $_POST['psub_title'] ) ? $_POST['psub_title'] : '';
    update_post_meta( $post_id, 'subtitle_input_meta', $psub_title );

}
add_action('save_post', 'subtitle_save_postdata');
// End Meta Sub Title =======================
