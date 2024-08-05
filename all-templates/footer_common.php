<?php

/**
 *  Template Name: Footer Common Pages
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


    <section class="foot_cmn">
        <div class="container">
            <div class="row">
                <?php the_content(); ?>
            </div>
        </div>
    </section>





<?php
get_footer();?>