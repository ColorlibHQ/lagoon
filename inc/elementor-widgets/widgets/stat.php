<?php
namespace Lagoonlogisticselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
//use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * lagoonlogistics elementor about page section widget.
 *
 * @since 1.0
 */
class Lagoonlogistics_Stat extends Widget_Base {

    public function get_name() {
        return 'lagoonlogistics-stat';
    }

    public function get_title() {
        return __( 'Stat', 'lagoonlogistics' );
    }

    public function get_icon() {
        return 'eicon-skill-bar';
    }

    public function get_categories() {
        return [ 'lagoonlogistics-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Section Title  ------------------------------
	    $this->start_controls_section(
		    'section_heading',
		    [
			    'label' => __( 'Section Heading', 'lagoonlogistics' ),
		    ]
	    );
	    $this->add_control(
		    'stat_content',
		    [
			    'label'         => esc_html__( 'Stat Content', 'lagoonlogistics' ),
			    'type'          => Controls_Manager::WYSIWYG,
			    'label_block'   => true,
			    'default'       => __( ' <h5>About Our Company</h5><h2>Some statistics that we want <br> to show our viewers</h2>', 'lagoonlogistics' )
		    ]
	    );

	    $this->add_control(
		    'brand_logo',
		    [
			    'label'         => esc_html__( 'Brand Logo', 'lagoonlogistics' ),
			    'type'          => Controls_Manager::GALLERY,
			    'label_block'   => true,
		    ]
	    );


	    $this->end_controls_section();

	    $this->start_controls_section(
		    'stat_item',
		    [
			    'label' => __( 'Stat Counter', 'lagoonlogistics' ),
		    ]
	    );
	    $this->add_control(
		    'statistics', [
			    'label' => __( 'Statistics Counter', 'lagoonlogistics' ),
			    'type'  => Controls_Manager::REPEATER,
			    'title_field' => '{{{ label }}}',
			    'fields' => [
				    [
					    'name'  => 'label',
					    'label' => __( 'Title', 'lagoonlogistics' ),
					    'type'  => Controls_Manager::TEXT,
					    'label_block' => true,
					    'default' => esc_html__( 'Packages Delivered', 'lagoonlogistics' )
				    ],
				    [
					    'name'  => 'currency',
					    'label' => __( 'Currency Symbol', 'lagoonlogistics' ),
					    'type'  => Controls_Manager::SELECT,
					    'options'=> [
					        'none'  => 'None',
                            'usd'   => '$',
					        'eur'   => '€',
                            'bdt'   => '৳',
                            'inr'   => '₹',
                            'gbp'   => '£'
                        ],
					    'default' => 'none'
				    ],
				    [
					    'name'  => 'count_number',
					    'label' => __( 'Counter Number', 'lagoonlogistics' ),
					    'type'  => Controls_Manager::TEXT,
					    'label_block' => true,
					    'default' => esc_html__( '280', 'lagoonlogistics' )
				    ],
				    [
				        'name'    => 'icon_type',
                        'label'   => __( 'Select Icon Type', 'lagoonlogistics' ),
                        'type'    => Controls_Manager::SELECT,
                        'options' => [
                            'img_icon'  => 'Image Icon',
                            'font_icon' => 'Font Icon'
                        ],
                        'default'  => 'img_icon'
                    ],
				    [
					    'name'  => 'img',
					    'label' => __( 'Image Icon', 'lagoonlogistics' ),
					    'type'  => Controls_Manager::MEDIA,
                        'condition' => [
                            'icon_type' => 'img_icon'
                        ]
				    ],
				    [
					    'name'  => 'icon',
					    'label' => __( 'Font Icon', 'lagoonlogistics' ),
					    'type'  => Controls_Manager::ICON,
                        'condition' => [
                            'icon_type' => 'font_icon'
                        ]
				    ]
			    ],
		    ]
	    );
	    $this->end_controls_section();

	    /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'lagoonlogistics' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color', [
                'label'     => __( 'Title Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-area .activity .activity_box h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_tcolor', [
                'label'     => __( 'Sub Title Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#262533',
                'selectors' => [
                    '{{WRAPPER}} .about-area .activity .activity_box p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_border', [
                'label'     => __( 'Item Border Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-area .activity .activity_box' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'item_hover_border', [
                'label'     => __( 'Item Hover Border Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-area .activity .activity_box:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


	    $this->start_controls_section(
		    'background_style', [
			    'label' => __( 'Style Content Background', 'lagoonlogistics' ),
			    'tab' => Controls_Manager::TAB_STYLE,
		    ]
	    );
	    $this->add_group_control(
		    Group_Control_Background::get_type(),
		    [
			    'name' => 'sectionbg',
			    'label' => __( 'Background', 'lagoonlogistics' ),
			    'types' => [ 'classic' ],
			    'selector' => '{{WRAPPER}} .about-area',
		    ]
	    );
        $this->end_controls_section();


    }

    protected function render() {

    $settings   = $this->get_settings();
    $statContent= !empty( $settings['stat_content'] ) ? $settings['stat_content'] : '';
    $brandLogo  = !empty( $settings['brand_logo'] ) ? $settings['brand_logo'] : '';
    $statistics = !empty( $settings['statistics'] ) ? $settings['statistics'] : '';

    ?>
        <section class="about-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row justify-content-center text-left section-title-wrap">
                            <div class="col-lg-12">
                                <?php
                                if( $statContent ) {
                                    echo wp_kses_post( nl2br( $statContent ) );
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="row">
                                    <?php
                                    if( is_array( $brandLogo ) && count( $brandLogo ) > 0 ) {
	                                    foreach ( $brandLogo as $logo ) {
	                                        $image = !empty( $logo['id'] ) ? wp_get_attachment_image( $logo['id'], 'lagoonlogistics_60x60' ) : '';
		                                    ?>
                                            <div class="col-lg-4 col-md-4 col-6 single_brand">
                                                <?php echo wp_kses_post( $image ); ?>
                                            </div>
		                                    <?php
	                                    }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-lg-4">
                        <div class="about_box">
                            <div class="activity">
                                <div class="row">
                                    <?php
                                    if( is_array( $statistics ) && count( $statistics ) > 0 ) {
	                                    foreach ( $statistics as $stat ) {
	                                        $title    = !empty( $stat['label'] ) ? $stat['label'] : '';
	                                        $countNum = !empty( $stat['count_number'] ) ? $stat['count_number'] : '';
	                                        $currency = isset( $stat['currency'] ) ? $stat['currency'] : '';
	                                        $imgIcon  = !empty( $stat['img']['id'] ) ? wp_get_attachment_image( $stat['img']['id'], 'lagoonlogistics_60x60' ) : '';
	                                        $fIcon    = !empty( $stat['icon'] ) ? $stat['icon'] : '';

	                                        if( $currency == 'usd' ){
	                                            $cSymbol = '$';
                                            }elseif ( $currency == 'eur' ){
	                                            $cSymbol = '€';
                                            }elseif ( $currency == 'bdt' ){
	                                            $cSymbol = '৳';
                                            }elseif ( $currency == 'inr' ){
	                                            $cSymbol = '₹';
                                            }elseif ( $currency == 'gbp' ){
	                                            $cSymbol = '£';
                                            }else{
		                                        $cSymbol = '';
                                            }
		                                    ?>
                                            <div class="col-lg-6 col-md-3 col-6">
                                                <div class="activity_box">
                                                    <?php
                                                    if( $stat['icon_type'] == 'img_icon' && $imgIcon ){
	                                                    echo '<div>'. wp_kses_post( $imgIcon ) .'</div>';
                                                    }elseif ( $stat['icon_type'] == 'font_icon' && $fIcon ){
                                                        echo '<div><i class="'. esc_attr( $fIcon ) .'"></i></div>';
                                                    }


                                                    if( $countNum ){
                                                        echo '<h3>'. wp_kses_post( $cSymbol ) .'<span class="counter">'. absint( $countNum ) .'</span>+</h3>';
                                                    }

                                                    if( $title ){
                                                        echo '<p>'. esc_html( $title ) .'</p>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
		                                    <?php
	                                    }
                                    } ?>
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
