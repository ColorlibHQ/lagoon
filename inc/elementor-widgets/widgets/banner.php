<?php
namespace Lagoonlogisticselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
//use Elementor\Scheme_Color;
//use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
//use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * Lagoonlogistics elementor about us section widget.
 *
 * @since 1.0
 */
class Lagoonlogistics_Banner extends Widget_Base {

	public function get_name() {
		return 'lagoonlogistics-banner';
	}

	public function get_title() {
		return __( 'Banner', 'lagoonlogistics' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'lagoonlogistics-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_section',
            [
                'label' => __( 'Banner Section Content', 'lagoonlogistics' ),
            ]
        );
		$this->add_control(
			'banner_title',
			[
				'label'         => esc_html__( 'Banner Title', 'lagoonlogistics' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Solid Super Service', 'lagoonlogistics' )
			]
		);
		$this->add_control(
			'banner_desc',
			[
				'label'         => esc_html__( 'Banner Description', 'lagoonlogistics' ),
				'type'          => Controls_Manager::TEXTAREA,
				'label_block'   => true,
				'default'       => __( 'If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may see some for as low as each', 'lagoonlogistics' )
			]
		);
		$this->add_control(
			'btn_label',
			[
				'label'         => esc_html__( 'Button Label', 'lagoonlogistics' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'default'       => __( 'Explore More', 'lagoonlogistics' )
			]
		);
		$this->add_control(
			'btn_url',
			[
				'label'         => esc_html__( 'Button URL', 'lagoonlogistics' ),
				'type'          => Controls_Manager::URL,
				'label_block'   => true
			]
		);


        $this->end_controls_section(); // End content


        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'lagoonlogistics' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'title_color', [
				'label'     => __( 'Title Color', 'lagoonlogistics' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .home_banner_area .banner_inner .banner-left h1' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_type',
				'label' => __( 'Title Typography', 'lagoonlogistics' ),
				'selector' => '{{WRAPPER}} .banner_inner .banner-left h1',
			]
		);
		$this->add_control(
			'desc_color', [
				'label'     => __( 'Description Color', 'lagoonlogistics' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .home_banner_area .banner_inner .banner-right p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_type',
				'label' => __( 'Description Typography', 'lagoonlogistics' ),
				'selector' => '{{WRAPPER}} .banner_inner .banner-right p',
			]
		);


        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .home_banner_area .banner_inner .banner-right .main_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .home_banner_area .banner_inner .banner-right .main_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'lagoonlogistics' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '',
                'selectors'   => [
                    '{{WRAPPER}} .home_banner_area .banner_inner .banner-right .main_btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .home_banner_area .banner_inner .banner-right .main_btn:hover' => 'background-color: {{VALUE}};',
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
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'lagoonlogistics' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'lagoonlogistics' ),
                'label_off' => __( 'Hide', 'lagoonlogistics' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'lagoonlogistics' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .banner-area .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
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
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .home_banner_area',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $title = !empty( $settings['banner_title'] ) ? $settings['banner_title'] : '';
        $desc  = !empty( $settings['banner_desc'] ) ? $settings['banner_desc'] : '';
        $btnLabel = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
        $btnUrl = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';

        ?>
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="banner_content d-flex flex-md-row flex-column">
                                <div class="banner-left text-md-right">
                                    <?php
                                    // Title ----------
                                    if( $title ){
                                        echo ' <h1 class="text-uppercase">'. esc_html( $title ) .'</h1>';
                                    }
                                    ?>
                                </div>
                                <div class="banner-right position-relative">
	                                <?php
                                    // Description -----------
	                                if( $desc ){
		                                echo '<p>'. esc_html( $desc ) .'</p>';
	                                }

	                                // Button -------------
	                                if( $btnLabel ){
	                                    echo '<a class="main_btn mt-md-0 mt-4" href="'. esc_url( $btnUrl ) .'">'. esc_html( $btnLabel ) .'</a>';
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
