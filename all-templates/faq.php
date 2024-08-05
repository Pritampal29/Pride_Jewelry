<?php

/**
 *  Template Name: FAQ Page
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


    <section class="faq">
        <h3><?php echo get_field('page_heading',$post->ID);?></h3>
        <div class="faq-container">
            <?php 
           if(have_rows('faq_section')) {
                $i=1;
                while(have_rows('faq_section')) { 
                    the_row(); ?>
            <div class="faq-item">
                <div class="question <?php echo ($i==1)? "active":"";?>"><?php echo $i;?>. <?php echo get_sub_field('questions',$post->ID);?></div>
                <div class="answer">
                    <p><?php echo get_sub_field('answers',$post->ID);?></p>
                </div>
            </div>
            <?php $i++;
        } } ?>
        </div>
    </section>


    <?php
get_footer();?>


    <script>
    $(document).ready(function() {
        $('.question').click(function() {
            $('.answer').slideUp();
            $('.question').removeClass('active');

            if (!$(this).siblings().is(':visible')) {
                $(this).siblings().slideDown();
                $(this).addClass('active');
            }
        });
    });
    </script>
    