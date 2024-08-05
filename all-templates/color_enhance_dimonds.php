<?php

/**
 *  Template Name: Color Dimonds
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-files
 * 
 * @package Pride_jewellery
 * 
 */

get_header();
global $post;

?>


<main>

    <!-- banner Start-->

    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
    <section class="banner-area inner-ban">
        <div class="ban-wrap common-bg" style="background-image: url(<?php echo $featured_image; ?>)">
            <div class="container">
                <div class="ban-slogan" data-aos="fade-up" data-aos-duration="3000">
                    <h2><?php the_title();?></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- banner End-->


    <section class="clor_enhnce_dimnd">
        <div class="container">
            <div class="row">
                <div class="text-center mb-5">
                    <h2><?php echo get_field('section2_text',$post->ID);?></h2>
                    <?php the_content();?>
                </div>
            </div>

            <?php
            if(have_rows('section2_repeater')) {
                while(have_rows('section2_repeater')) { 
                    the_row(); ?>
            <div class="each-special-box" data-aos="fade-in" data-aos-duration="3000">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="each-special-img">
                            <div class="each-sub-img" data-aos="fade-down" data-aos-duration="2000">
                                <img class="w-100" src="<?php echo get_sub_field('images',$post->ID);?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="cmn-block" data-aos="fade-up" data-aos-duration="1800">
                            <h4><?php echo get_sub_field('descriptions',$post->ID);?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </section>


    <?php
    get_footer(); ?>