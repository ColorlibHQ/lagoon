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
class Lagoonlogistics_Contact_Section extends Widget_Base {

    public function get_name() {
        return 'lagoonlogistics-contact-sec';
    }

    public function get_title() {
        return __( 'Contact Section', 'lagoonlogistics' );
    }

    public function get_icon() {
        return 'eicon-mail';
    }

    public function get_categories() {
        return [ 'lagoonlogistics-elements' ];
    }

    protected function _register_controls() {


        // ----------------------------------------  Contact Info  ------------------------------
        
        $this->start_controls_section(
            'estimate_section',
            [
                'label' => __( 'Estimate Section', 'lagoonlogistics' ),
            ]
        );

        $this->add_control(
            'sec_title', [
                'label'         => __( 'Section Title', 'lagoonlogistics' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => 'Check the estimated cost for <br> your requesting goods'
            ]
        );
        $this->add_control(
            'sec_subtitle', [
                'label'         => __( 'Section Sub-title', 'lagoonlogistics' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => 'Get a quote now!'
            ]
        );

        $this->end_controls_section(); // End Contact Info

        // ----------------------------------------  Contact Form  ------------------------------
        $this->start_controls_section(
            'contact_form',
            [
                'label' => __( 'Estimate Form', 'lagoonlogistics' ),
            ]
        );
        $this->add_control(
            'contact_form_title',
            [
                'label'     => esc_html__( 'Form Title', 'lagoonlogistics' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => 'Get an estimation'
            ]
        );
        $this->add_control(
            'estimate_form',
            [
                'label'      => esc_html__( 'Form Shortcode', 'lagoonlogistics' ),
                'description'=> esc_html__('Contact form 7 shortcode here', ''),
                'type'       => Controls_Manager::TEXT,
                'label_block'=> true
            ]
        );
        $this->end_controls_section(); // End Contact Form


        /**
         * Style Tab
         * ------------------------------ Style ------------------------------
         *
         */
        $this->start_controls_section(
            'style_content_color', [
                'label' => __( 'Style Content Color', 'lagoonlogistics' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'color_title', [
                'label'     => __( 'Section Title Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .section-title-wrap h2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_subtitle', [
                'label'     => __( 'Section Sub-title Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .quote-area .nav-tabs .nav-link.active' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_color', [
                'label'     => __( 'Button Label Color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .main_btn' => 'color: {{VALUE}};',
                ],
            ]
        );



        $this->add_control(
            'color_fbtntextcolor', [
                'label'     => __( 'Form Button Label color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .contact-page-area .form-area .primary-btn' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovlc', [
                'label'     => __( 'Form Button Hover Label color', 'lagoonlogistics' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#00ff8c',
                'selectors' => [
                    '{{WRAPPER}} .contact-page-area .form-area .primary-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function render() {

    $settings = $this->get_settings();
    $title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $subtitle = !empty( $settings['sec_subtitle'] ) ? $settings['sec_subtitle'] : '';
    $formTitle= !empty( $settings['contact_form_title'] ) ? $settings['contact_form_title'] : '';

    ?>
        <section class="quote-area">
            <div class="container">
                <div class="row justify-content-center text-left section-title-wrap">
                    <div class="col-lg-12">
                        <?php
                        if( $subtitle ){
                            echo '<h5>'. esc_html( $subtitle ) .'</h5>';
                        }

                        if( $title ){
                            echo '<h2 class="text-white">'. wp_kses_post( nl2br( $title ) ) .'</h2>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-12">
                        <div class="estimated-cost">

                                <nav>
                                    <div class="nav nav-tabs justify-content-md-start justify-content-center" id="nav-tab" role="tablist">
                                        <?php
                                        if( $formTitle ){
                                            echo '<a class="nav-item nav-link active" id="nav-getEstimation-tab" data-toggle="tab" href="#nav-getEstimation" role="tab" aria-controls="nav-getEstimation" aria-selected="true">'. esc_html( $formTitle ) .'</a>';
                                        }
                                        ?>
                                    </div>
                                </nav>

                                <!-- Tab Content -->
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-getEstimation" role="tabpanel" aria-labelledby="nav-getEstimation-tab">
	                                    <?php
	                                    if( !empty( $settings['estimate_form'] ) ){
		                                    echo do_shortcode( $settings['estimate_form'] );
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
