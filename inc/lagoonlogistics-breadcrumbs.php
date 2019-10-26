<?php 
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}
/**
 *
 * @Packge      Colorlib
 * @Author      Colorlib
 * @Author URL  https//www.Colorlib.com
 * @version     1.0
 *
 */

if ( ! function_exists( 'lagoonlogistics_breadcrumbs' ) ) {
    function lagoonlogistics_breadcrumbs( $args = array() ) {
        if ( is_front_page() ) {
            return;
        }
        if ( get_theme_mod( 'ct_ignite_show_breadcrumbs_setting' ) == 'no' ) {
            return;
        }
        global $post;
        $defaults  = array(
            'breadcrumbs_id'      => '',
            'breadcrumbs_classes' => esc_html( 'breadcrumb' ),
            'home_title'          => esc_html__( 'Home', 'lagoonlogistics' )
        );
        $args      = apply_filters( 'lagoonlogistics_breadcrumbs_args', wp_parse_args( $args, $defaults ) );
                
        $args_el = array();
        
        if( $args['breadcrumbs_id'] ){
            
            $args_el[] =  'id="'.esc_attr( $args['breadcrumbs_id'] ).'"';
        }
        
        if( $args['breadcrumbs_classes'] ){
            
            $args_el[] =  'class="'.esc_attr( $args['breadcrumbs_classes'] ).'"';
            
        }
        
        /*
        * Begin Markup 
        */
        
        // Open the breadcrumbs
        $html  = '<span class="main_btn mt-4 mt-md-0">';
        // Add Homepage link (always present)
        $html .= '<a class="bread-link s-text16 bread-home" href="' . esc_url( get_home_url('/') ) . '" title="' . esc_attr( $args['home_title'] ) . '">'.esc_html__( 'Home', 'lagoonlogistics' ).' </a><i class="fa fa-arrow-right mx-2"></i>';
        // Post
        if ( is_singular( 'post' ) ) {
            $category = get_the_category();
            $category_values = array_values( $category );
            $last_category = end( $category_values );
            $cat_parents = rtrim( get_category_parents( $last_category->term_id, true, '' ), ',' );
            $cat_parents = explode( ',', $cat_parents );
            foreach ( $cat_parents as $parent ) {
                $html .= wp_kses_post( '<span>'.$parent.'</span>' );
            }
            $html .= '<i class="fa fa-arrow-right mx-2"></i><span title="'. get_the_title() .'">' . esc_html(  mb_strimwidth( get_the_title(), 0, 22, '...' ) ). '</span>';
        } elseif ( is_singular( 'page' ) ) {
            if ( $post->post_parent ) {
                $parents = get_post_ancestors( $post->ID );
                $parents = array_reverse( $parents );
                foreach ( $parents as $parent ) {
                    $html .= '<a class="bread-parent s-text16 bread-parent-' . esc_attr( $parent ) . '" href="' . esc_url( get_permalink( $parent ) ) . '" title="' . esc_attr( get_the_title( $parent ) ) . '">' . esc_html( get_the_title( $parent ) ) . '</a><i class="fa fa-arrow-right mx-2"></i>';
                }
            }
            $html .= '<span>'.esc_html( get_the_title() ).'</span>';
        } elseif ( is_singular( 'attachment' ) ) {
            $parent_id        = $post->post_parent;
            $parent_title     = get_the_title( $parent_id );
            $parent_permalink = esc_url( get_permalink( $parent_id ) );
            $html .= '<a class="bread-parent" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . esc_attr( $parent_title ) . '</a><i class="fa fa-arrow-right mx-2"></i>';
            $html .= '<span class="s-text17" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span>';
        } elseif ( is_singular() ) {
            $post_type         = get_post_type();
            $post_type_object  = get_post_type_object( $post_type );
            $post_type_archive = get_post_type_archive_link( $post_type );
            $html .= '<a class="bread-cat s-text16 bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_attr( $post_type_object->labels->name ) . ' </a><i class="fa fa-arrow-right mx-2"></i>';
            $html .= '<span class="s-text17 bread-' . $post->ID . '" title="' . $post->post_title . '">' . $post->post_title . '</span>';
			
        } elseif ( is_category() ) {
            $parent = get_queried_object()->category_parent;
            if ( $parent !== 0 ) {
                $parent_category = get_category( $parent );
                $category_link   = get_category_link( $parent );
                $html .= '<a class="bread-parent bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_link ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_attr( $parent_category->name ) . '</a><i class="fa fa-arrow-right mx-2"></i>';
            }
            $html .= '<span>' . single_cat_title( '', false ) . '</span>';
        } elseif ( is_tag() ) {
            $html .= '<span>' . single_tag_title( '', false ) . '</span>';
        } elseif ( is_author() ) {
            $html .= '<span>' . get_queried_object()->display_name . '</span>';
        } elseif ( is_day() ) {
            $html .= '<span>' . get_the_date() . '</span>';
        } elseif ( is_month() ) {
            $html .= '<span>' . get_the_date( 'F Y' ) . '</span>';
        } elseif ( is_year() ) {
            $html .= '<span>' . get_the_date( 'Y' ) . '</span>';
        } elseif ( is_archive() ) {			
            $custom_tax_name = get_queried_object()->name;
            $html .= '<span>' . esc_attr( $custom_tax_name ) . '</span>';
        } elseif ( is_search() ) {
            $html .= '<span>'.esc_html__('Search results for:','lagoonlogistics') . get_search_query() . '';
        } elseif ( is_404() ) {
            $html .= '<span>' . esc_html__( 'Error 404', 'lagoonlogistics' ) . '</span>';
        } elseif ( is_home() ) {
            $html .= '<span>' . get_the_title( get_option( 'page_for_posts' ) ) . '</span>';
        }
        $html .= '</span>';
        $html = apply_filters( 'lagoonlogistics_breadcrumbs_filter', $html );
		
		echo wp_kses_post( $html );	
	
        
    }
}
