<?php 
/**
 * @Packge     : Lagoonlogistics
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */

/***********************************
 * General Section Fields
 ***********************************/
// Header top background color
Epsilon_Customizer::add_field(
    'lagoonlogistics_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_general_section',
        'default'     => '#e72727',
    )
);

/***********************************
 * Header Section Fields =====================================
 ***********************************/
//Header Top
Epsilon_Customizer::add_field(
    'header_top_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Top', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_header_section',
        
    )
);

// Header search form toggle field
Epsilon_Customizer::add_field(
	'lagoonlogistics_phoneemail_toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Header Top Phone & Email show/hide', 'lagoonlogistics' ),
		'description' => esc_html__( 'Toggle to show header top phone and email.', 'lagoonlogistics' ),
		'section'     => 'lagoonlogistics_header_section',
		'default'     => false,
	)
);
// Header top phone number
Epsilon_Customizer::add_field(
    'lagoonlogistics_top_phone',
    array(
        'type'        => 'number',
        'label'       => esc_html__( 'Phone Number', 'lagoonlogistics' ),
        'description' => esc_html__( 'Empty field would be display none', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => __( '01723 664 041', 'lagoonlogistics' ),
    )
);
// Header Top Email
Epsilon_Customizer::add_field(
    'lagoonlogistics_top_email',
    array(
        'type'        => 'email',
        'label'       => esc_html__( 'Email', 'lagoonlogistics' ),
        'description' => esc_html__( 'Empty field would be display none', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => __( 'emergency@colorlib.com', 'lagoonlogistics' ),
    )
);



Epsilon_Customizer::add_field(
    'social_pro_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Social Profile', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_header_section',

    )
);
// Social Profile Show/Hide
Epsilon_Customizer::add_field(
    'lagoonlogistics_social_profile_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Social Profile Show/Hide', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_header_section',
        'default'     => false,
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'lagoonlogistics_social_pofile',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'lagoonlogistics_header_section',
		'label'        => esc_html__( 'Social Profile Links', 'lagoonlogistics' ),
		'button_label' => esc_html__( 'Add new social link', 'lagoonlogistics' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_url',
		),
		'fields'       => array(
			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'lagoonlogistics' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'pentax' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			)
		),
	)
);



// Header navbar============================================
Epsilon_Customizer::add_field(
    'header_sec',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header Navbar', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_header_section',
        
    )
);

// Header background color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'lagoonlogistics' ),
        'description' => esc_html__( 'Select the header background color.', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => '#262533',
    )
);

// Header nav menu color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_header_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => '#262533',
    )
);

// Header nav menu hover color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_header_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu hover color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => '',
    )
);
// Header menu dropdown background color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_header_menu_dropbg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header menu dropdown background color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => '#fff',
    )
);

// Header dropdown menu color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_header_drop_menu_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => '#262533',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_drop_menu_item_hover_bg',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu item hover background', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => '',
    )
);
// Header dropdown menu hover color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_header_drop_menu_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Dropdown menu hover color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_header_section',
        'default'     => '#ffffff',
    )
);


/***********************************
 * Blog Section Fields
 ***********************************/
 

Epsilon_Customizer::add_field(
    'lagoonlogistics_blog_pagetitle',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Blog Page Title', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => 'Blog',
    )
);
Epsilon_Customizer::add_field(
    'lagoonlogistics_blog_pagesubtitle',
    array(
        'type'        => 'textarea',
        'label'       => esc_html__( 'Blog Page Sub Title', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => 'If you are looking at blank cassettes on the web, you may be very confused.',
    )
);

// Post excerpt length field
Epsilon_Customizer::add_field(
	'lagoonlogistics_excerpt_length',
	array(
		'type'        => 'number',
		'label'       => esc_html__( 'Set post excerpt length', 'lagoonlogistics' ),
		'section'     => 'lagoonlogistics_blog_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => '30',
	)
);

// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'lagoonlogistics_blog_layout',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'lagoonlogistics' ),
        'section'  => 'lagoonlogistics_blog_section',
        'description' => esc_html__( 'Select the option to set blog page layout.', 'lagoonlogistics' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 2,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);

// Blog single page social share icon
Epsilon_Customizer::add_field(
    'lagoonlogistics_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_blog_section',
        'default'     => false
    )
);
Epsilon_Customizer::add_field(
    'lagoonlogistics_blog_single_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog single post meta show/hide', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_blog_section',
        'default'     => false
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'lagoonlogistics_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'lagoonlogistics' ),
        'section'           => 'lagoonlogistics_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'lagoonlogistics_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'lagoonlogistics' ),
        'section'           => 'lagoonlogistics_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/
// Call To Action Section
Epsilon_Customizer::add_field(
	'lagoonlogistics_footer_cta_toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Footer Top CTA show/hide', 'lagoonlogistics' ),
		'description' => esc_html__( 'Toggle to display footer top call to action.', 'lagoonlogistics' ),
		'section'     => 'lagoonlogistics_footer_section',
		'default'     => false,
	)
);
Epsilon_Customizer::add_field(
	'lagoonlogistics_cta_title',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Call To Action Title', 'lagoonlogistics' ),
		'section'     => 'lagoonlogistics_footer_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => 'Please feel free to reach us'
	)
);
Epsilon_Customizer::add_field(
	'lagoonlogistics_cta_subtitle',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Call To Action Subtitle', 'lagoonlogistics' ),
		'section'     => 'lagoonlogistics_footer_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => 'Get a quick response from our team'
	)
);
Epsilon_Customizer::add_field(
	'lagoonlogistics_cta_btn_label',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Call To Action Button Label', 'lagoonlogistics' ),
		'section'     => 'lagoonlogistics_footer_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default'     => esc_html__( 'Explore More', 'lagoonlogistics')
	)
);
Epsilon_Customizer::add_field(
	'lagoonlogistics_cta_btn_url',
	array(
		'type'        => 'text',
		'label'       => esc_html__( 'Call To Action URL', 'lagoonlogistics' ),
		'section'     => 'lagoonlogistics_footer_section',
		'default'     => ''
	)
);


// Footer widget toggle field
Epsilon_Customizer::add_field(
    'lagoonlogistics_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'lagoonlogistics' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_footer_section',
        'default'     => false,
    )
);

// Footer Widget Background Color
Epsilon_Customizer::add_field(
	'lagoonlogistics_footer_widget_bgimg',
	array(
		'type'        => 'epsilon-image',
		'label'       => esc_html__( 'Footer Widget Background Image', 'lagoonlogistics' ),
		'sanitize_callback' => 'sanitize_text_field',
		'section'     => 'lagoonlogistics_footer_section',
	)
);

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'lagoonlogistics' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'lagoonlogistics_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'lagoonlogistics' ),
        'section'     => 'lagoonlogistics_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

//Social Profile links
Epsilon_Customizer::add_field(
	'lagoonlogistics_social_pofile_footer',
	array(
		'type'         => 'epsilon-repeater',
		'section'      => 'lagoonlogistics_footer_section',
		'label'        => esc_html__( 'Footer Social Profile Links', 'lagoonlogistics' ),
		'button_label' => esc_html__( 'Add new social link', 'lagoonlogistics' ),
		'row_label'    => array(
			'type'  => 'field',
			'field' => 'social_url',
		),
		'fields'    => array(

			'social_url' => array(
				'label'             => esc_html__( 'Social URL', 'lagoonlogistics' ),
				'type'              => 'text',
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'https://twitter.com',
			),
			'social_icon'        => array(
				'label'   => esc_html__( 'Icon', 'pentax' ),
				'type'    => 'epsilon-icon-picker',
				'default' => 'fa fa-twitter',
			),

		),
	)
);



// Footer widget background color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_footer_widget_bdcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_footer_section',
        'default'     => '#19191b',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_footer_widget_textcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_footer_widget_titlecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_footer_section',
        'default'     => '#FFFFFF',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_footer_widget_anchorcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_footer_section',
        'default'     => '#888888',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'lagoonlogistics_footer_widget_anchorhovcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'lagoonlogistics' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'lagoonlogistics_footer_section',
        'default'     => '',
    )
);



