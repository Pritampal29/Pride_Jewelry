<?php

/**
 * 
 * This is The Default Template for Home Page
 * 
 */

 get_header();
 global $post;
 ?>
<main>

    <!-- banner Start-->
    <section class="banner-area">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php 
				if(have_rows('banner_repeater')) { 
                    $i=1;
					while(have_rows('banner_repeater')) {
						the_row(); ?>
                <div class="swiper-slide <?php echo ($i == 3) ? 'bnr_third_splsh' : ($i == 1 ? 'bnr_first_splsh' : ''); ?>">
                    <div class="ban-wrap common-bg"
                        style="background-image: url(<?php echo get_sub_field('banner_bg_image',$post->ID);?>);">
                        <div class="container">
                            <div class="ban-slogan" data-aos="fade-down" data-aos-duration="2000">
                                <div class="ban-logo">
                                    <h4><?php echo get_sub_field('welcome_text',$post->ID);?></h4>
                                    <a href="#"><img class="mw-100"
                                            src="<?php echo get_sub_field('welcome_image',$post->ID);?>" alt=""></a>
                                </div>
                                <h1><?php echo get_sub_field('banner_description',$post->ID);?></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++;} } ?>
                <!-- <div class="swiper-slide">

					<div class="ban-wrap common-bg" style="background-image: url(<?php echo get_template_directory_uri();?>/images/ban_2.jpg);">

						<div class="container">

							<div class="ban-slogan" data-aos="fade-down"data-aos-duration="2000">

								<div class="ban-logo">

									<h4>Welcome To</h4>

									<a href="#"><img class="mw-100" src="<?php echo get_template_directory_uri();?>/images/pride_blck_logo.png" alt=""></a>

								</div>

								<h1>LGBTQ Wedding Bands and

									Everyday Jewelry

									Collection</h1>

							</div>

						</div>

					</div>

				</div>

				<div class="swiper-slide">

					<div class="ban-wrap common-bg" style="background-image: url(<?php echo get_template_directory_uri();?>/images/ban_3.jpg);">

						<div class="container">

							<div class="ban-slogan" data-aos="fade-down"data-aos-duration="2000">

								<div class="ban-logo">

									<h4>Welcome To</h4>

									<a href="#"><img class="mw-100" src="<?php echo get_template_directory_uri();?>/images/pride_blck_logo.png" alt=""></a>

								</div>

								<h1>LGBTQ Pendants and

									Everyday Jewelry

									Collection</h1>

							</div>

						</div>

					</div>

				</div> -->
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </section>

    <!-- banner End-->





    <!-- banner Bottom sec Starts-->

    <section class="banner-bottom-sec" data-aos="fade-down" data-aos-duration="1000">

        <div class="container">

            <div class="ban-btn-txt">

                <p><?php echo get_field('sec2_content',$post->ID);?></p>

            </div>

            <div class="ban-btm-block">

                <div class="row">

                    <div class="col-md-6">

                        <div class="ban-btm-blk-img" data-aos="fade-up" data-aos-duration="1700">

                            <img class="w-100" src="<?php echo get_field('sec2_image',$post->ID);?>" alt="">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="cmn-block" data-aos="fade-down" data-aos-duration="1800">

                            <h4><?php echo get_field('sec2_left_text',$post->ID);?></h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- banner Bottom sec End-->





    <!-- pro-vid-sec Starts-->

    <section class="pro-vid-sec" data-aos="fade-up" data-aos-duration="500">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-md-6">

                    <div class="cmn-block" data-aos="fade-up" data-aos-duration="1500">

                        <h4><?php echo get_field('sec3_left_content',$post->ID);?></h4>

                    </div>

                </div>

                <div class="col-md-6">

                    <div class="pro-vid-right" data-aos="fade-donw" data-aos-duration="2000">

                        <div class="row">

                            <?php 

                            if(have_rows('sec3_right_repeater')) { 

                                while(have_rows('sec3_right_repeater')) {

                                    the_row(); ?>

                            <div class="col-md-6">

                                <a href="#">

                                    <div class="each-jwe-vid-block" data-aos="fade-up" data-aos-duration="3000">       

                                        <img class="w-100" src="<?php echo get_sub_field('main_image',$post->ID);?>"

                                            alt="">

                                        <!-- <span><img src="<?php echo get_sub_field('play_btn_image',$post->ID);?>"

                                                alt=""></span> -->

                                    </div>

                                </a>

                            </div>

                            <?php } } ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- pro-vid-sec End-->



    <!-- special-offer-sec Starts-->

    <section class="special-offer-sec">

        <div class="container">

            <div class="each-special-box" data-aos="fade-in" data-aos-duration="3000">

                <div class="row align-items-center">

                    <div class="col-md-7">

                        <div class="each-special-slider">

                            <div class="swiper">

                                <div class="swiper-wrapper">

                                    <?php 

								if(have_rows('left_image_repeater')) { 

									while(have_rows('left_image_repeater')) {

										the_row(); ?>

                                    <div class="swiper-slide">

                                        <div class="each-sub-img" data-aos="fade-down" data-aos-duration="2200">

                                            <img class="w-100" src="<?php echo get_sub_field('images',$post->ID);?>"

                                                alt="">

                                        </div>

                                    </div>

                                    <?php } } ?>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-5">

                        <div class="cmn-block" data-aos="fade-up" data-aos-duration="2000">

                            <h4><?php echo get_field('right_content',$post->ID);?></h4>

                        </div>

                    </div>

                </div>

            </div>



            <div class="each-special-box" data-aos="fade-in" data-aos-duration="3000">

                <div class="row align-items-center">

                    <div class="col-md-7">

                        <div class="each-special-img">

                            <div class="each-sub-img" data-aos="fade-down" data-aos-duration="2000">

                                <img class="w-100" src="<?php echo get_field('right_image',$post->ID);?>" alt="">

                            </div>

                        </div>

                    </div>

                    <div class="col-md-5">

                        <div class="cmn-block" data-aos="fade-up" data-aos-duration="1800">

                            <h4><?php echo get_field('left_content',$post->ID);?></h4>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- special-offer-sec End-->



    <!-- pride-display-sec starts-->

    <section class="pride-display-sec">

        <div class="container">

            <div class="row">

                <?php

				if(have_rows('sec6_repeater')) {

					while(have_rows('sec6_repeater')) {

						the_row(); ?>

                <div class="col-md-6">

                    <div class="each-pride-display-block" data-aos="fade-up" data-aos-duration="2100">

                        <div class="each-pride-display-img text-center">

                            <img class="w-100" src="<?php echo get_sub_field('images',$post->ID);?>" alt="">

                        </div>

                        <div class="cmn-block">

                            <h4><?php echo get_sub_field('text_content',$post->ID);?></h4>

                        </div>

                    </div>

                </div>

                <?php } } ?>

                <!-- <div class="col-md-6">

					<div class="each-pride-display-block" data-aos="fade-down"data-aos-duration="2000">

						<div class="each-pride-display-img text-center">

							<img class="w-100" src="images/pride_display_2.png" alt="">

						</div>

						<div class="cmn-block">

							<h4>collections of pride

								diamonds available for

								retail shops</h4>

						</div>

					</div>

				</div> -->

            </div>

        </div>

    </section>

    <!-- pride-display-sec End-->





    <!-- collection-sec Starts-->

    <section class="collection-sec" data-aos="fade-up" data-aos-duration="1600">

        <div class="container">

            <div class="common-head text-center">

                <h3 class="text-uppercase"><?php echo get_field('sec7_title',$post->ID);?></h3>

            </div>

            <div class="collectie-slider">

                <div class="swiper">

                    <div class="swiper-wrapper">

                    <?php

						$args = array(

							'post_type' => 'product',

							'posts_per_page' => -1, 

							'orderby' => 'date',

							'order' => 'DESC',

						);

						$products = new WP_Query($args);



						if ($products->have_posts()) :

							while ($products->have_posts()) :

								$products->the_post();

								global $product; ?>

								

                        <div class="swiper-slide">

                            <div class="each-collectie-box">

                                <div class="each-collect-img">

                                    <div class="show-img">

                                    <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

                                        <img class="w-100" src="<?php echo $featured_image; ?>" alt="">

                                    </div>

                                    <?php 

                                    $gallery_images = $product->get_gallery_image_ids();

                                    if ( $gallery_images ) {

                                        $first_image_id = $gallery_images[0];

                                        $image_url = wp_get_attachment_image_url( $first_image_id, 'full' );                                          

                                    } ?>

                                    <div class="hov-img">

                                        <img src="<?php echo $image_url;?>" alt="">

                                    </div>

                                </div>

                                <div class="each-collect-txt">

                                    <h5><?php the_title(); ?></h5>

                                    <?php if ( is_user_logged_in() ) { ?>

                                    <h6><?php echo $product->get_price_html(); ?></h6>

                                    <?php } ?>

                                    <a class="common-btn" href="<?php the_permalink(); ?>">View Details</a>

                                </div>

                            </div>

                        </div>

						<?php

						endwhile;

						wp_reset_postdata();

					else :

						echo __('No products found');

					endif;

					?>

                        <!-- <div class="swiper-slide">

							<div class="each-collectie-box">

								<div class="each-collect-img">

									<div class="show-img">

										<img class="w-100" src="images/collec-img_2.png" alt="">

									</div>

									<div class="hov-img">

										<img src="images/collec-img_3.png" alt="">

									</div>

								</div>

								<div class="each-collect-txt">

									<h5>PRIDE Prong Set

										Ring  </h5>

									<h6>$1,250.00</h6>

									<a class="common-btn" href="#">View Details</a>

								</div>

							</div>

						</div> -->

                    </div>

                </div>

                <div class="swiper-button-next common-arrow">

                    <i class="fas fa-chevron-right"></i>

                </div>

                <div class="swiper-button-prev common-arrow">

                    <i class="fas fa-chevron-left"></i>

                </div>

            </div>

        </div>



    </section>

    <!-- collection-sec End-->



</main>





<?php

get_footer();?>