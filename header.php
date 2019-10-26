<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header_area">
    <?php
    if( lagoonlogistics_opt( 'lagoonlogistics_social_profile_toggle' ) == 1 || lagoonlogistics_opt( 'lagoonlogistics_phoneemail_toggle' ) == 1 ) {
	    ?>
        <div class="top_menu d-lg-block d-none">
            <div class="container">
			    <?php
			    if ( lagoonlogistics_opt( 'lagoonlogistics_social_profile_toggle' ) == 1 ) {
				    lagoonlogistics_social_profile();
			    }

			    if ( lagoonlogistics_opt( 'lagoonlogistics_phoneemail_toggle' ) == 1 ) {
				    ?>
                    <div class="float-right">
                        <ul class="right_side">
						    <?php
						    $topPhone = lagoonlogistics_opt( 'lagoonlogistics_top_phone' );
						    $topEmail = lagoonlogistics_opt( 'lagoonlogistics_top_email' );

						    if ( ! empty( $topPhone ) ) {
							    echo '<li><a href="tel:' . absint( $topPhone ) . '"><i class="lnr lnr-phone-handset"></i>' . esc_html( $topPhone ) . '</a></li>';
						    }

						    if ( $topEmail ) {
							    echo '<li><a href="mailto:' . esc_url( $topEmail ) . '"><i class="lnr lnr-envelope"></i>' . esc_html( $topEmail ) . '</a></li>';
						    }
						    ?>
                        </ul>
                    </div>
				    <?php
			    } ?>
            </div>
        </div>
	    <?php
    } ?>
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg w-100">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
				<?php
				echo lagoonlogistics_theme_logo( 'navbar-brand logo_h' );
				?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <div class="row w-100">
						<?php
						if(has_nav_menu('primary-menu')) {
							wp_nav_menu(array(
								'menu'           => 'primary-menu',
								'theme_location' => 'primary-menu',
								'menu_id'        => 'menu-main-menu',
								'container_class'=> 'col-lg-12 pr-lg-0',
								'container_id'   => 'navbarSupportedContent',
								'menu_class'     => 'nav navbar-nav ml-auto justify-content-end',
								'walker'         => new lagoonlogistics_bootstrap_navwalker,
								'depth'          => 3
							));
						} ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>

<?php
//Page Title Bar
if( function_exists( 'lagoonlogistics_page_titlebar' ) ){
	lagoonlogistics_page_titlebar();

}

