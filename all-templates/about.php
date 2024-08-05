<?php

/**
 *  Template Name: About Us
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



    <section class="about_us">
        <div class="container">
            
            <div class="abt_us_pr">
                <?php
                if(have_rows('about_repeater')) { 
                    while(have_rows('about_repeater')) {
                        the_row(); ?>
                <div class="row align-items-center">
                <h3 class="text-center mb-4"><?php echo get_field('about_heading',$post->ID);?></h3>
                    <div class="col-md-5 desc_pr">
                        <!-- <h3><?php echo get_sub_field('heading',$post->ID);?></h3> -->
                        <p><?php echo get_sub_field('content',$post->ID);?></p>
                    </div>
                    <div class="col-md-7 img_pr">
                        <img src="<?php echo get_sub_field('images',$post->ID);?>" alt="" class="w-100 sec_img_pr">
                    </div>
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>

</main>



<?php

get_footer(); ?>