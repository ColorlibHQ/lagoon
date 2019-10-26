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
 * Lagoonlogistics elementor Team Member section widget.
 *
 * @since 1.0
 */
class Lagoonlogistics_Services extends Widget_Base {

	public function get_name() {
		return 'lagoonlogistics-services';
	}

	public function get_title() {
		return __( 'Services', 'lagoonlogistics' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'lagoonlogistics-elements' ];
	}

	protected function _register_controls() {

	    // Section Heading ==============================
		$this->start_controls_section(
			'blog_content',
			[
				'label' => __( 'Latest Blog Post', 'lagoonlogistics' ),
			]
		);
		$this->add_control(
			'sec_title',
			[
				'label'         => esc_html__( 'Title', 'lagoonlogistics' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'We offer Various Services <br>to get you covered.', 'lagoonlogistics' )
			]
		);
		$this->add_control(
			'sec_subtitle', [
				'label'         => esc_html__( 'Sub Title', 'lagoonlogistics' ),
				'description'   => __( "Use < br> tag for line brake", "lagoonlogistics" ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => esc_html__( 'Our Offered Services', 'lagoonlogistics' )

			]
		);

		$this->end_controls_section();

		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'lagoonlogistics' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Add Service Item', 'lagoonlogistics' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Did not find <br> your package', 'lagoonlogistics' )
                    ],
                    [
                        'name'      => 'desc',
                        'label'     => __( 'Descriptions', 'lagoonlogistics' ),
                        'type'      => Controls_Manager::TEXTAREA,
                        'default'   => __( ' inappropriate behavior is often laughed off as boys will be boys women face in higher conduct standards', 'lagoonlogistics' )
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::MEDIA,
                    ],
	                [
		                'name'  => 'btn_label',
		                'label' => __( 'Button label', 'lagoonlogistics' ),
		                'type'  => Controls_Manager::TEXT,
		                'label_block' => true,
		                'default' => __( 'Learn More', 'lagoonlogistics' )
	                ],
                    [
		                'name'  => 'btn_url',
		                'label' => __( 'Button URL', 'lagoonlogistics' ),
		                'type'  => Controls_Manager::URL,
		                'label_block' => true,
	                ]
                ],
            ]
		);

		$this->end_controls_section(); // End Services content



        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'lagoonlogistics' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_serviceshovertitle', [
                'label' => __( 'Title Hover Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_border', [
                'label' => __( 'Service Hover Border Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service .service-box' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'service_hover_bg', [
                'label' => __( 'Service Hover Background Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover .service-box' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'lagoonlogistics' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'background_color', [
				'label' => __( 'Background Color', 'lagoonlogistics' ),
				'type'  => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-area' => 'background: {{VALUE}};',
				]
			]
		);
        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();
    $services = !empty( $settings['services_content'] ) ? $settings['services_content'] : '';
    $secTitle   = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subTitle   = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';

    ?>

        <section class="service-area section_gap_top">
            <div class="container">
                <div class="row justify-content-center section-title-wrap">
                    <div class="col-lg-12">
                        <?php
                        if( $subTitle ){
                            echo '<h5>'. esc_html( $subTitle ) .'</h5>';
                        }

                        if( $secTitle ){
                            echo '<h2 class="text-white">'. wp_kses_post( nl2br( $secTitle ) ) .'</h2>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if( is_array( $services ) && count( $services ) > 0 ){
                        foreach ( $services as $service ){
                            $image = !empty( $service['img']['id'] ) ? wp_get_attachment_image( $service['img']['id'], 'lagoonlogistics_360x200', array( 'class' => 'f-img img-fluid mx-auto' ) ) : '';
                            $title = !empty( $service['label'] ) ? $service['label'] : '';
                            $desc  = !empty( $service['desc'] ) ? $service['desc'] : '';
                            $btn_label = !empty( $service['btn_label'] ) ? $service['btn_label'] : '';
                            $btn_url = !empty( $service['btn_url']['url'] ) ? $service['btn_url']['url'] : '';
                            ?>
                            <div class="single-service col-lg-4 col-md-6">
                                <div class="thumb">
                                    <?php
                                    if( $image ){
                                        echo wp_kses_post( $image );
                                    }
                                    ?>
                                </div>
                                <div class="service-box">
                                    <?php
                                    if( $title ){
                                        echo '<h3>'.  wp_kses_post( nl2br( $title ) ) .'</h3>';
                                    }

                                    if( $desc ){
                                        echo '<p>'. esc_html( $desc ) .'</p>';
                                    }

                                    if( $btn_label ){
                                        echo '<a href="'. esc_url( $btn_url ) .'">'. esc_html( $btn_label ) .'</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

    <?php
    }
}
