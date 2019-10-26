<?php
namespace Lagoonlogisticselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Lagoonlogistics elementor section widget.
 *
 * @since 1.0
 */
class Lagoonlogistics_Testimonial extends Widget_Base {

	public function get_name() {
		return 'lagoonlogistics-testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'lagoonlogistics' );
	}

	public function get_icon() {
		return 'eicon-post-slider';
	}

	public function get_categories() {
		return [ 'lagoonlogistics-elements' ];
	}

	protected function _register_controls() {

        // Testimonial Heading
		$this->start_controls_section(
			'section_heading',
			[
				'label' => __( 'Section Heading', 'lagoonlogistics' ),
			]
		);
        $this->add_control(
            'sec_title',
            [
                'label'         => esc_html__( 'Title', 'lagoonlogistics' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       =>__( 'Some statistics that we want <br> to show our viewers', 'lagoonlogistics' )
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => esc_html__( 'Sub Title', 'lagoonlogistics' ),
                'type'          => Controls_Manager::TEXTAREA,
                'label_block'   => true,
                'default'       =>  __( 'ABOUT OUR COMPANY', 'lagoonlogistics' )

            ]
        );
		$this->end_controls_section();


		// ----------------------------------------  Customers review content ------------------------------
		$this->start_controls_section(
			'customersreview_content',
			[
				'label' => __( 'Customers Review', 'lagoonlogistics' ),
			]
		);

		$this->add_control(
            'review_slider', [
                'label' => __( 'Create Review', 'lagoonlogistics' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Name', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Name', 'lagoonlogistics' )
                    ],
                    [
                        'name'  => 'designation',
                        'label' => __( 'Designation', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'Chief Customer', 'lagoonlogistics' )
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default'   => __('Also made from. Give may saying meat there from heaven it lights face had is gathered god earth light for life may itself shall whales made they\'re blessed whales also made from give may saying meat. There from heaven it lights face had', 'lagoonlogistics')
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Image', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End exibition content

        /**
         * Style Tab
         *
         */
		//------------------------------ Style Section ------------------------------
		$this->start_controls_section(
			'style_section', [
				'label' => __( 'Style Section Heading', 'lagoonlogistics' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'color_secttitle', [
				'label'     => __( 'Section Title Color', 'lagoonlogistics' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap h2' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'color_sectsubtitle', [
				'label'     => __( 'Section Sub Title Color', 'lagoonlogistics' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .section-title-wrap h5' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'style_item',
			[
				'label' => __( 'Style Item', 'lagoonlogistics' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_control(
            'testimonial_name_color', [
                'label'     => __( 'Testimonial Name Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single_testi .testi_author .a-desc h6' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_desc_color', [
                'label'     => __( 'Testimonial Description Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single_testi .testi_content p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'testimonial_item_bg', [
                'label'     => __( 'Testimonial Background Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .single_testi' => 'background: {{VALUE}};',
                ],
            ]
        );

		$this->end_controls_section();


        /*------------------------------ Background Style ------------------------------*/
		$this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'lagoonlogistics' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'lagoonlogistics' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'lagoonlogistics' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .testimonial_sec',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
	$this->load_widget_script();
	$title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
	$reviews = !empty( $settings['review_slider'] ) ? $settings['review_slider'] : '';

    ?>
        <section class="testimonial-area section_gap_top">
            <div class="container">
                <div class="row justify-content-center section-title-wrap">
                    <div class="col-lg-12">
                        <?php
                        if( $subTitle ){
	                        echo '<h5>'. esc_html( $subTitle ) .'</h5>';
                        }

                        if( $title ){
                            echo '<h2>'. wp_kses_post( nl2br( $title ) ) .'</h2>';
                        }
                        ?>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="owl-carousel active_testimonial">
                            <?php if( is_array( $reviews ) && count( $reviews ) > 0 ) {
	                            foreach ( $reviews as $review ) {
	                                $name       = !empty( $review['label'] ) ? $review['label'] : '';
	                                $desc       = !empty( $review['desc'] ) ? $review['desc'] : '';
	                                $designation = !empty( $review['designation'] ) ? $review['designation'] : '';
	                                $image      = !empty( $review['img']['id'] ) ? wp_get_attachment_image( $review['img']['id'], 'lagoonlogistics_60x60'  ) : '';
		                            ?>
                                    <div class="single_testi">
                                        <div class="testi_content">
	                                        <?php
	                                        if ( $desc ) {
		                                        echo '<p>'. esc_html( $desc ) .'</p>';
	                                        }
                                            ?>
                                        </div>
                                        <div class="testi_author d-flex justify-content-center align-items-center">
                                            <div class="thumb mr-4">
                                                <?php
                                                if( $image ){
                                                    echo wp_kses_post( $image );
                                                }
                                                ?>
                                            </div>
                                            <div class="a-desc text-left">
					                            <?php
					                            if ( $name ) {
					                                echo '<h6>'. esc_html( $name ) .'</h6>';
					                            }
					                            if ( $designation ) {
					                                echo '<p>'. esc_html( $designation ) .'</p>';
					                            }
					                            ?>
                                            </div>
                                        </div>
                                    </div>
		                            <?php
	                            }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            $('.active_testimonial').owlCarousel({
                items: 1,
                loop: true,
                dots: false,
                nav: true,
                margin: 0,
                responsiveClass: true,
                autoplay: 2500,
                slideSpeed: 300,
                paginationSpeed: 500,
                navText: ["<i class='fa fa-long-arrow-left'>","<i class='fa fa-long-arrow-right'>"]
            });
            
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
