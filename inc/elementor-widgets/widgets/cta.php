<?php
namespace Lagoonlogisticselementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



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
class Lagoonlogistics_Cta extends Widget_Base {

    public function get_name() {
        return 'lagoonlogistics-cta';
    }

    public function get_title() {
        return __( 'Cta', 'lagoonlogistics' );
    }

    public function get_icon() {
        return 'eicon-call-to-action';
    }

    public function get_categories() {
        return [ 'lagoonlogistics-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Cta Info  ------------------------------
        
        $this->start_controls_section(
            'contact_info',
            [
                'label' => __( 'Cta Info', 'lagoonlogistics' ),
            ]
        );
	    $this->add_control(
		    'cta_title',
		    [
			    'label'     => esc_html__( 'Cta Title', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::TEXT,
			    'label_block' => true,
			    'default'   => esc_html__('GET A QUICK RESPONSE FROM OUR TEAM', 'lagoonlogistics')
		    ]
	    );
	    $this->add_control(
		    'sub_title',
		    [
			    'label'     => esc_html__( 'Subtitle Title', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::TEXTAREA,
			    'label_block' => true,
			    'default'   => esc_html__('Get to Know Project Estimate?', 'lagoonlogistics')
		    ]
	    );
	    $this->add_control(
		    'btn_label',
		    [
			    'label'     => esc_html__( 'Button Label', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::TEXT,
			    'label_block' => true,
			    'default'   => esc_html__('Get a quote now', 'lagoonlogistics')
		    ]
	    );
	    $this->add_control(
		    'btn_url',
		    [
			    'label'     => esc_html__( 'Button URL', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::URL,
			    'label_block' => true,
		    ]
	    );


        $this->end_controls_section(); // End Cta Info


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
                    '{{WRAPPER}} .call_to_action_inner .area-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sub_tcolor', [
                'label'     => __( 'Sub Title Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#262533',
                'selectors' => [
                    '{{WRAPPER}} .area-heading h3' => 'color: {{VALUE}};',
                ],
            ]
        );


        // Button Style Tab =================================
	    $this->start_controls_tabs(
		    'style_tabs'
	    );

	    // Tab Normal ===================
	    $this->start_controls_tab(
		    'style_normal_tab',
		    [
			    'label' => __( 'Normal', 'lagoonlogistics' ),
		    ]
	    );
	    $this->add_control(
		    'btn_lcolor', [
			    'label'     => __( 'Button Label Color', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => 'fff',
			    'selectors' => [
				    '{{WRAPPER}} .call_to_action_inner .main_btn_2' => 'color: {{VALUE}};',
			    ],
		    ]
	    );
	    $this->add_control(
		    'btn_bg_color', [
			    'label'     => __( 'Button Background color', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#262533',
			    'selectors' => [
				    '{{WRAPPER}} .call_to_action_inner .main_btn_2' => 'background: {{VALUE}};',
			    ],
		    ]
	    );

	    $this->end_controls_tab();

	    // Tab Hover ====================
	    $this->start_controls_tab(
		    'style_hover_tab',
		    [
			    'label' => __( 'Hover', 'lagoonlogistics' ),
		    ]
	    );

	    $this->add_control(
		    'btn_hover_lcolor', [
			    'label'     => __( 'Button Hover Label color', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '',
			    'selectors' => [
				    '{{WRAPPER}} .main_btn_2:hover' => 'color: {{VALUE}};',
			    ],
		    ]
	    );
	    $this->add_control(
		    'btn_hover_bg_color', [
			    'label'     => __( 'Button Hover Background color', 'lagoonlogistics' ),
			    'type'      => Controls_Manager::COLOR,
			    'default'   => '#262533',
			    'selectors' => [
				    '{{WRAPPER}} .main_btn_2:hover' => 'background: {{VALUE}};',
			    ],
		    ]
	    );
	    $this->end_controls_tab();

	    $this->end_controls_tabs();
	    // End Button Tab Style =============================


        $this->end_controls_section();


    }

    protected function render() {

    $settings  = $this->get_settings();
    $cta_title = !empty( $settings['cta_title'] ) ? $settings['cta_title'] : '';
    $cta_stitle= !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $btn_label = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    $btn_url   = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';

    ?>

        <section class="call_to_action">
            <div class="container">
                <div class="row call_to_action_inner">
                    <div class="col-md-7">
                        <div class="area-heading">
                            <?php
                            if( $cta_title ){
                                echo '<p>'. esc_html( $cta_title ) .'</p>';
                            }
                            if( !empty( $cta_stitle ) ){
                                echo '<h3>'. esc_html( $cta_stitle ) .'</h3>';
                            }

                            ?>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <?php
                        if( $btn_label ){
                            echo '<a href="'. esc_url( $btn_url ) .'" class="main_btn_2">'. esc_html( $btn_label ) .'<span '. button_bg() .'><img src="'. LAGOONLOGISTICS_DIR_IMG .'arrow.png" alt="'. esc_html__('Button pattern background', 'lagoonlogistics' ) .'"></span></a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

    <?php
    }
}
