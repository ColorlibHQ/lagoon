<?php 
/**
 * @Packge     : Lagoonlogistics
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'lagoonlogistics_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'lagoonlogistics' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    /**
     * General Section
     */
    array(
        'id'   => 'lagoonlogistics_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'lagoonlogistics' ),
            'panel'    => 'lagoonlogistics_theme_options_panel',
            'priority' => 1,
        ),
    ),

    /**
     * Header Section
     */
    array(
        'id'   => 'lagoonlogistics_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'lagoonlogistics' ),
            'panel'    => 'lagoonlogistics_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'lagoonlogistics_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'lagoonlogistics' ),
            'panel'    => 'lagoonlogistics_theme_options_panel',
            'priority' => 3,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'lagoonlogistics_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'lagoonlogistics' ),
            'panel'    => 'lagoonlogistics_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'lagoonlogistics_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'lagoonlogistics' ),
            'panel'    => 'lagoonlogistics_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>