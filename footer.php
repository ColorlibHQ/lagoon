<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package
 */

    $url = 'https://colorlib.com/';
    $copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'lagoonlogistics' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
    $copyRight = !empty( lagoonlogistics_opt( 'lagoonlogistics_footer_copyright_text' ) ) ? lagoonlogistics_opt( 'lagoonlogistics_footer_copyright_text' ) : $copyText;
    $footer_class = lagoonlogistics_opt( 'lagoonlogistics_footer_widget_toggle' ) == 1 ? 'footer-area section_gap' : 'no_widget';


        if( lagoonlogistics_opt( 'lagoonlogistics_footer_cta_toggle' ) == 1 ) {
            $title      = !empty( lagoonlogistics_opt( 'lagoonlogistics_cta_title' ) ) ? lagoonlogistics_opt( 'lagoonlogistics_cta_title' ) : '';
            $subTitle   = !empty( lagoonlogistics_opt( 'lagoonlogistics_cta_subtitle' ) ) ? lagoonlogistics_opt( 'lagoonlogistics_cta_subtitle' ) : '';
            $btnLable   = !empty( lagoonlogistics_opt( 'lagoonlogistics_cta_btn_label' ) ) ? lagoonlogistics_opt( 'lagoonlogistics_cta_btn_label' ) : '';
            $btnUrl     = !empty( lagoonlogistics_opt( 'lagoonlogistics_cta_btn_url' ) ) ? lagoonlogistics_opt( 'lagoonlogistics_cta_btn_url' ) : '';
	        ?>
            <section class="cta_area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cta_inner d-flex flex-md-row flex-column justify-content-between align-items-center">
                                <div class="mb-md-0 mb-4 text-sm-left text-center">
                                    <?php
                                    if( $subTitle ){
                                        echo '<p>'. esc_html( $subTitle ) .'</p>';
                                    }
                                    if( $title ){
                                        echo '<h1>'. esc_html( $title ) .'</h1>';
                                    }

                                    ?>
                                </div>
                                <div class="">
                                    <?php
                                    if( $btnLable ){
                                        echo '<a href="'. esc_url( $btnUrl ) .'" class="main_btn">'. esc_html( $btnLable ) .'</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
	        <?php
        } ?>

        <footer class="<?php echo esc_attr( $footer_class ) ?>">
            <div class="container">
                <?php
                if( lagoonlogistics_opt( 'lagoonlogistics_footer_widget_toggle' ) == 1 ) {
                    ?>
                    <div class="row">
                        <?php
                        // Footer Widget 1
                        if ( is_active_sidebar( 'footer-1' ) ) {
                            echo '<div class="col-lg-5 col-md-6 col-sm-6">';
                            dynamic_sidebar( 'footer-1' );
                            echo '</div>';
                        }

                        // Footer Widget 2
                        if ( is_active_sidebar( 'footer-2' ) ) {
                            echo '<div class="col-lg-5 col-md-6 col-sm-6">';
                            dynamic_sidebar( 'footer-2' );
                            echo '</div>';
                        }

                        // Footer Widget 1
                        if ( is_active_sidebar( 'footer-3' ) ) {
                            echo '<div class="col-lg-2 col-md-6 col-sm-6 social-widget">';
                            dynamic_sidebar( 'footer-3' );
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <?php
                } ?>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="footer-text"><?php echo wp_kses_post( $copyRight ); ?></p>
                    </div>
                </div>
            </div>
        </footer>

    <?php wp_footer(); ?>
    </body>
</html>