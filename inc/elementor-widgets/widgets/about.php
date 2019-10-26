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
class Lagoonlogistics_About extends Widget_Base {

	public function get_name() {
		return 'lagoonlogistics-about';
	}

	public function get_title() {
		return __( 'About', 'lagoonlogistics' );
	}

	public function get_icon() {
		return 'eicon-thumbnails-half';
	}

	public function get_categories() {
		return [ 'lagoonlogistics-elements' ];
	}

	protected function _register_controls() {

        
		// ----------------------------------------  About content ------------------------------
		$this->start_controls_section(
			'about_content',
			[
				'label' => __( 'About Us', 'lagoonlogistics' ),
			]
		);
        $this->add_control(
            'section_title',
            [
                'label'         => esc_html__( 'Section Title', 'lagoonlogistics' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => __( 'About Our Company', 'lagoonlogistics' )
            ]
        );
        $this->add_control(
            'content',
            [
                'label'         => esc_html__( 'Content', 'lagoonlogistics' ),
                'description'   => esc_html__('Use <br> tag for line break', 'lagoonlogistics'),
                'type'          => Controls_Manager::WYSIWYG,
                'label_block'   => true,
                'default'       => __( '<h1>Let’s <br>Introduce About <br>Myself</h1> <p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after seed appear midst evenin</p><p>Beginning blessed second a creepeth. Darkness wherein fish years good air whose after seed appear midst evenin appear void give third bearing divide one so</p>.', 'lagoonlogistics' )
            ]
        );

        $this->add_control(
            'button_label',
            [
                'label'         => esc_html__( 'Button Label', 'lagoonlogistics' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__('Learn More', 'lagoonlogistics')
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__( 'Button URL', 'lagoonlogistics' ),
                'type'          => Controls_Manager::URL,
                'label_block'   => true,
                
            ]
        );

		$this->add_control(
			'img_caption',
			[
				'label'         => esc_html__( 'Image Caption', 'lagoonlogistics' ),
				'description'   => __( 'Use Blod for color & bold text', 'lagoonlogistics' ),
				'type'          => Controls_Manager::WYSIWYG,
				'label_block'   => true,
				'default'       => __('<span>26</span>Years of Awesomeness', 'lagoonlogistics')
			]
		);
		$this->end_controls_section(); // End about content


		$this->start_controls_section(
			'about_feature_image',
			[
				'label' => __( 'Featured Images', 'lagoonlogistics' ),
			]
		);
		$this->add_control(
			'about_img1',
			[
				'label'         => esc_html__( 'Featured Image Layer 1', 'lagoonlogistics' ),
				'type'          => Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'separetor_1', [ 'type' => Controls_Manager::DIVIDER ]
		);
		$this->add_control(
			'bg_heading1',
			[
				'label'         => esc_html__( 'Featured Image Pattern Top', 'lagoonlogistics' ),
				'type'          => Controls_Manager::HEADING,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'feature_pattern1',
				'label' => __( 'Featured Image Pattern Top', 'lagoonlogistics' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .img-styleBox .styleBox-border:before',
			]
		);

		$this->add_control(
			'separetor_2', [ 'type' => Controls_Manager::DIVIDER ]
		);
		$this->add_control(
			'bg_heading2',
			[
				'label'         => esc_html__( 'Featured Image Pattern Bottom', 'lagoonlogistics' ),
				'type'          => Controls_Manager::HEADING,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'feature_pattern2',
				'label' => __( 'Featured Image Pattern Bottom', 'lagoonlogistics' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .img-styleBox .styleBox-border:after',
			]
		);

		$this->add_control(
			'separetor_3', [ 'type' => Controls_Manager::DIVIDER ]
		);
		$this->add_control(
			'bg_heading3',
			[
				'label'         => esc_html__( 'Image Caption Background Pattern ', 'lagoonlogistics' ),
				'type'          => Controls_Manager::HEADING,
			]
		);
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'feature_pattern3',
				'label' => __( 'Featured Image Pattern Top', 'lagoonlogistics' ),
				'types' => [ 'classic' ],
				'selector' => '{{WRAPPER}} .img-styleBox .styleBox-2',
			]
		);
		$this->end_controls_section(); // End about content


        // Feature Style ==============================
        $this->start_controls_section(
            'stylecolor', [
                'label' => __( 'Style Featuer', 'lagoonlogistics' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );        
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button label Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color', [
                'label'     => __( 'Button Background Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color', [
                'label'     => __( 'Button Hover label Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color', [
                'label'     => __( 'Button Hover Background Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn:hover' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_border_color', [
                'label'     => __( 'Button Border Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_border_color', [
                'label'     => __( 'Button Hover Border Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about-content .main_btn:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();


	}

	protected function render() {
        $settings = $this->get_settings();
		$sectionTitle = !empty( $settings['section_title'] ) ? $settings['section_title'] : '';
        $content      = !empty( $settings['content'] ) ? $settings['content'] : '';
        $button_label = !empty( $settings['button_label'] ) ? $settings['button_label'] : '';
        $img_caption  = !empty( $settings['img_caption'] ) ? $settings['img_caption'] : '';
        $button_url   = !empty( $settings['button_url']['url'] ) ? $settings['button_url']['url'] : '';

		$feature_img1 = !empty( $settings['about_img1']['id'] ) ? wp_get_attachment_image( $settings['about_img1']['id'], 'lagoonlogistics_390x450', false, array( 'class' => 'styleBox-img1' ) ) : '';

        ?>
        <section class="about-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img-styleBox">
                            <div class="styleBox-border wow bounceInUp">
                                <?php
                                if( $feature_img1 ){
	                                echo wp_kses_post( $feature_img1 );
                                }
                                ?>
                            </div>
                            <div class="styleBox-2">
                                <?php
                                if( $img_caption ){
                                    echo wp_kses_post( wpautop($img_caption ) );
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-12 offset-lg-0 col-lg-5 offset-xl-1">
                        <div class="about-content">
                            <?php
                            if( $sectionTitle ){
                                echo '<span>'. esc_html( $sectionTitle ) .'</span>';
                            }
                            //Content ==============
                            if( $content ){
                            echo wp_kses_post( wpautop( $content ) );
                            }
                            // Button =============
                            if( $button_label ){
                            echo '<a class="main_btn" href="'. esc_url( $button_url ) .'">'. esc_html( $button_label ) .'</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php

    }

}
