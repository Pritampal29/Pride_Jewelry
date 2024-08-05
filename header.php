<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pride_jewellery
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <title>Home</title> -->
    <?php wp_head(); ?>
    <!--===========================-->
    <!-- Css Starts -->
    <!--===========================-->

    <!--Bootstrap css-->
    <link href="<?php echo get_template_directory_uri();?>/css/bootstrap.min.css" rel="stylesheet">
    <!--Swiper-slider css-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/swiper-bundle.min.css">
    <!--Fonts css-->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:wght@100;300;400;500;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">
    <!--Animation css-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/animations.min.css">
    <!--Font-awesome-icon css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <!-- Aos animation css -->
    <link href="<?php echo get_template_directory_uri();?>/css/aos.css" rel="stylesheet">
    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/scss/style.css">
    <!-- Custom responsive -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/responsive.css">
    

    <!--===========================-->
    <!-- Css End -->
    <!--===========================-->


</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Loading Start-->
    <div id="pq-loading">
        <div id="pq-loading-center">
            <img src="<?php echo get_field('main_entry_loader','option');?>" alt="loading">
        </div>
    </div>
    <!--Loading End -->

    <!-- header Start-->
    <header class="header-area pq-header-style-1 pq-has-sticky">
        <span class="nv-open-bg"></span>
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="logo" data-aos="fade-in" data-aos-duration="3000">
                        <a href="<?php echo site_url();?>"><img class="mw-100"
                                src="<?php echo get_field('site_logo','option');?>" alt=""></a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="nav-bar">
                        <div class="cls-menu d-lg-none">
                            <img src="<?php echo get_template_directory_uri();?>/images/cls.png" alt="">
                        </div>
                        <ul class="d-flex" data-aos="fade-in" data-aos-duration="3000">
                            <?php
							if ( has_nav_menu( 'menu-1' ) ) {

								wp_nav_menu(
									array(
										'container'  => '',
										'items_wrap' => '%3$s',
										'theme_location' => 'menu-1',
										'menu'   => 'Main Menu',
										'walker' => new Custom_Walker_Nav_Menu(), 
									)
								);

							}
							?>
                        </ul>
                    </div>
                </div>
                <div class="col-auto d-lg-none">
                    <div class="humburger">
                        <img src="<?php echo get_template_directory_uri();?>/images/menu.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header End-->