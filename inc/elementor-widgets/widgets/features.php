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
 * Lagoonlogistics elementor Team Member section widget.
 *
 * @since 1.0
 */
class Lagoonlogistics_Features extends Widget_Base {

	public function get_name() {
		return 'lagoonlogistics-features';
	}

	public function get_title() {
		return __( 'Features', 'lagoonlogistics' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'lagoonlogistics-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------   Features content ------------------------------
		$this->start_controls_section(
			'features_block',
			[
				'label' => __( 'Features', 'lagoonlogistics' ),
			]
		);
		$this->add_control(
            'features_content', [
                'label' => __( 'Create Features', 'lagoonlogistics' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __('Shipment Tracking', 'lagoonlogistics')
                    ],
	                [
		                'name'  => 'desc',
		                'label' => __( 'Description', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default' => __('The French Revolutioncons tituted for the conscience of the dominant the French Revolutioncons.', 'lagoonlogistics')
	                ],
                    [
		                'name'  => 'icontype',
		                'label' => __( 'Icon Type', 'lagoonlogistics' ),
                        'type'  => Controls_Manager::SELECT,
                        'options'   => [
                            'img_icon'  => esc_html__( 'Image Icon', 'lagoonlogistics' ),
                            'font_icon' => esc_html__( 'Font Icon', 'lagoonlogistics' )
                        ],
                        'default' => 'img_icon'
	                ],
                    [
		                'name'  => 'imgicon',
		                'label' => __( 'Image Icon', 'lagoonlogistics' ),
		                'type'  => Controls_Manager::MEDIA,
                        'condition' => [
                            'icontype' => 'img_icon'
                        ]
	                ],
                    [
		                'name'  => 'icon',
		                'label' => __( 'Icon', 'lagoonlogistics' ),
		                'type'  => Controls_Manager::ICON,
		                'condition' => [
			                'icontype' => 'font_icon'
		                ]
	                ],
	                [
		                'name'  => 'btn_label',
		                'label' => __( 'Button Label', 'lagoonlogistics' ),
		                'type'  => Controls_Manager::TEXT,
		                'default' => __('Find Your Cargo', 'lagoonlogistics')
	                ],
                    [
		                'name'  => 'btn_url',
		                'label' => __( 'Button link', 'lagoonlogistics' ),
		                'type'  => Controls_Manager::URL,
	                ],
                ],
            ]
		);

		$this->end_controls_section(); // End features content


        $this->start_controls_section(
			'features_desc_block',
			[
				'label' => __( 'Features Description', 'lagoonlogistics' ),
			]
		);
		$this->add_control(
			'features_desc',
			[
				'label'     => esc_html__( 'Features Description', 'lagoonlogistics' ),
				'type'      => Controls_Manager::WYSIWYG,
                'default'   => '<h5>About Our Company</h5>
                                <h2>
                                We’re Carefully <br>
                                Delivering your <br>
                                happiness.
                              </h2>
                    
                              <h4>f you are looking at blank cassettes on the web lorem ipsum dolor sit consectetur adipisicing elit,
                                eiusmod tempor incididunt.</h4>
                              <p>
                                If you are looking at blank cassettes on the web lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Eiusmod tempor
                                incididunt ut labore et dolore magna aliqua consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.
                              </p>'
			]
		);
		$this->add_control(
			'features_des_btn_label',
			[
				'label'     => esc_html__( 'Features Description Button Label', 'lagoonlogistics' ),
				'type'      => Controls_Manager::TEXT,
                'label_block'=> true,
                'default'   => esc_html__( 'Learn More About Us', 'lagoonlogistics' )
			]
		);
		$this->add_control(
			'features_des_btn_url',
			[
				'label'     => esc_html__( 'Features Description Button url', 'lagoonlogistics' ),
				'type'      => Controls_Manager::URL,
                'label_block'=> true,
			]
		);
		$this->end_controls_section(); // End features content


        //------------------------------ Style Features ------------------------------
        $this->start_controls_section(
            'style_features', [
                'label' => __( 'Style Features', 'lagoonlogistics' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'features_title_heading',
            [
                'label'     => __( 'Style Feature Title ', 'lagoonlogistics' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'color_featuretitle', [
                'label' => __( 'Title Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-feature h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_item_desc', [
                'label' => __( 'Feature Description Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-feature p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'feature_item_btn', [
                'label' => __( 'Feature Description Color', 'lagoonlogistics' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-feature p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
        

	}

	protected function render() {

    $settings = $this->get_settings();
    $features = $settings['features_content'];
    $featureDesc = !empty( $settings['features_desc'] ) ? $settings['features_desc'] : '';
    $fBtnLabel = !empty( $settings['features_des_btn_label'] ) ? $settings['features_des_btn_label'] : '';
    $fBtnUrl  = !empty( $settings['features_des_btn_url']['url'] ) ? $settings['features_des_btn_url']['url'] : '';

    ?>
        <section class="feature-area section_gap_top">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-7">
                        <div class="row">
                            <?php
                            if( is_array( $features ) && count( $features ) > 0 ){
                                foreach ( $features as $feature ){
                                    $imgIcon  = !empty( $feature['imgicon']['id'] ) ? wp_get_attachment_image( $feature['imgicon']['id'], 'lagoonlogistics_60x60' ) : '';
                                    $title    = !empty( $feature['label'] ) ? $feature['label'] : '';
                                    $desc     = !empty( $feature['desc'] ) ? $feature['desc'] : '';
                                    $btnLabel = !empty( $feature['btn_label'] ) ? $feature['btn_label'] : '';
                                    $btn_url  = !empty( $feature['btn_url']['url'] ) ? $feature['btn_url']['url'] : '';

                                    ?>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-feature">
                                            <?php
                                            // Image Icon
                                            if( $feature['icontype'] == 'img_icon' ){
                                                echo wp_kses_post( $imgIcon );
                                            }elseif ( $feature['icontype'] == 'font_icon' ){
                                                echo '<i class="'. esc_attr( $feature['icon'] ) .'"></i>';
                                            }

                                            // Title --------------------
                                            if( $title ){
                                                echo '<h4>'. esc_html( $title ) .'</h4>';
                                            }

                                            // Description --------------------
                                            if( $desc ){
                                                echo '<p>'. esc_html( $desc ) .'</p>';
                                            }

                                            // Button --------------------
                                            if( $btnLabel ){
                                                echo '<a href="'. esc_url( $btn_url ) .'">'. esc_html( $btnLabel ) .'</a>';
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

                    <div class="col-lg-5 offset-md-0 col-md-12 text-left section-title-wrap mt-4 mt-lg-0">
                        <?php
                        if( $featureDesc ){
                            echo wp_kses_post( nl2br( $featureDesc ) );
                        }

                        //Button ---------------
                        if( $fBtnLabel ){
                            echo '<a href="'. esc_url( $fBtnUrl ) .'" class="main_btn">'. esc_html( $fBtnLabel ) .'</a>';
                        }
                        ?>


                    </div>
                </div>
            </div>
        </section>
    <?php
    }
}
