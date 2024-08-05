<?php
/**
 *  Template Name: Contact Us
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


    <section class="inner_cntnt_pr">
        <div class="container">
            <div class="contat-wrap">
               <div class="row">
                <div class="col-md-6">
                        <div class="contact-frm-lft">
                            <h3 class="text-center heding_pr"><?php echo get_field('right_form_heading',$post->ID);?></h3>
                            <?php echo do_shortcode('[contact-form-7 id="ecf31a5" title="Contact Us Page"]');?>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="contact-frm-rght">
                    <h3 class="text-center heding_pr"><?php echo get_field('left_contact_heading',$post->ID);?></h3>
                        <ul>
                            <?php 
                            if(have_rows('contact_details')) {
                                while(have_rows('contact_details')) {
                                    the_row(); ?>
                            <li>
                                <span class="cntct_icon"><?php echo get_sub_field('icon',$post->ID);?></span><a
                                    href="<?php echo get_sub_field('links',$post->ID);?>">
                                    <?php echo get_sub_field('values',$post->ID);?></a>
                            </li>
                            <?php } } ?>
                            <!-- <li><i class="fa-solid fa-phone-volume"></i><a href="tel:2127304323"> (212) 730-4323</a></li>
                            <li><i class="fa-solid fa-envelope"></i><a href="#"> </a></li>
                            <li><i class="fa-brands fa-square-instagram"></i><a
                                    href="https://www.instagram.com/pridejewelryusa"> @pridejewelryusa</a></li> -->
                        </ul>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php
get_footer(); ?>