<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );



/**

 * Hook: woocommerce_before_main_content.

 *

 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)

 * @hooked woocommerce_breadcrumb - 20

 * @hooked WC_Structured_Data::generate_website_data() - 30

 */

do_action( 'woocommerce_before_main_content' );


?>



<!-- <header class="woocommerce-products-header"> -->

<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>

<?php endif; ?>


<?php

        /**

         * Hook: woocommerce_archive_description.

         *

         * @hooked woocommerce_taxonomy_archive_description - 10

         * @hooked woocommerce_product_archive_description - 10

         */

        do_action( 'woocommerce_archive_description' ); 

    ?>

<!-- </header> -->



<?php

if ( woocommerce_product_loop() ) {



	/**

	 * Hook: woocommerce_before_shop_loop.

	 *

	 * @hooked woocommerce_output_all_notices - 10

	 * @hooked woocommerce_result_count - 20

	 * @hooked woocommerce_catalog_ordering - 30

	 */

	do_action( 'woocommerce_before_shop_loop' ); ?>



<section class="collection-inn-sec">

    <div class="container">

        <div class="cmn-tab">

            <?php if(is_shop()) { ?>

            <div class="menu_iso text-center" id="custom-filter">

                <div class="row align-items-center" data-aos="fade-down" data-aos-duration="2000">

                    <div class="col-md-9">

                        <!-- Show all Categories -->

                        <ul class="nav nav-tabs">

                            <li class="nav-item" role="presentation">

                                <button class="nav-link common-btn active text-uppercase" data-filter="*">All

                                    Collections</button>

                            </li>

                            <?php

                            $categories = get_terms( 'product_cat' );

                            foreach ( $categories as $index => $category ) : ?>

                            <li class="nav-item" role="presentation">

                                <button class="nav-link common-btn text-uppercase"

                                    data-filter=".<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></button>

                            </li>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                    <div class="col-md-3">

                        <div class="product-sort">

                            <?php get_sidebar();?>

                        </div>

                    </div>

                </div>

            </div>

            <?php } elseif(is_product_category()) { ?>

            <div class="col-md-3">

                <div class="product-sort">

                    <?php get_sidebar();?>

                </div>

            </div>

            <?php } ?>



            <div class="tab-content" id="myTabContent" data-aos="fade-up" data-aos-duration="2000">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="container port_gallery colletion-wrap">

                        <div class="row" id="portfolio-items">

                            <?php

                            if ( have_posts() ) :

                                while ( have_posts() ) :

                                    the_post();

                                    global $product;

                                    // Add product category classes

                                    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat', array( 'fields' => 'slugs' ) );

                                    $cat_classes = implode( ' ', $product_cats );

                            ?>

                            <!-- Show all Products -->

                            <div

                                class="col-lg-3 col-md-6 filterDiv gallery-item <?php echo esc_attr( $cat_classes ); ?>">

                                <a href="<?php the_permalink(); ?>">

                                    <div class="each-collectie-box">

                                        <div class="each-collect-img">

                                            <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>

                                            <div class="show-img">

                                                <img class="w-100" src="<?php echo esc_url( $featured_image ); ?>"

                                                    alt="">

                                            </div>

                                            <div class="hov-img">

                                                <?php 

                                        $gallery_images = $product->get_gallery_image_ids();

                                        if ( $gallery_images ) {

                                            $first_image_id = $gallery_images[0];

                                            $image_url = wp_get_attachment_image_url( $first_image_id, 'full' );                                          

                                        } ?>

                                                <img class="w-100" src="<?php echo $image_url; ?>" alt="">

                                            </div>

                                        </div>

                                        <div class="each-collect-txt">

                                            <h5><?php the_title(); ?></h5>

                                            <h6><?php echo $product->get_price_html(); ?></h6>

                                            <?php

                                    /**

                                     * Hook: woocommerce_after_shop_loop_item_title.

                                     *

                                     * @hooked woocommerce_template_loop_rating - 5

                                     * @hooked woocommerce_template_loop_price - 10

                                     */

                                        do_action( 'woocommerce_after_shop_loop_item_title' );

                                    ?>

                                            <a class="common-btn" href="<?php the_permalink(); ?>">View Details</a>

                                            <?php

                                    /**

                                     * Hook: woocommerce_after_shop_loop_item.

                                     *

                                     * @hooked woocommerce_template_loop_product_link_close - 5

                                     * @hooked woocommerce_template_loop_add_to_cart - 10

                                     */

                                        do_action( 'woocommerce_after_shop_loop_item' );

                                    ?>

                                        </div>

                                    </div>

                                </a>

                            </div>

                            <?php endwhile;

                                endif;

                                ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>





<!-- Script for Isotope Gallery Product Filter -->

<script src="https://isotope.metafizzy.co/isotope.pkgd.js"></script>

<script>

jQuery(document).ready(function($) {

    var customContainer = $("#portfolio-items");

    customContainer.isotope({

        itemSelector: '.gallery-item',

        layoutMode: 'fitRows',

        transitionDuration: '0.8s'

    });



    $("#custom-filter button").on('click', function() {

        var filterValue = $(this).attr('data-filter');

        customContainer.isotope({

            filter: filterValue

        });

    });



    // Add active class to the current button

    $("#custom-filter button").on('click', function() {

        $("#custom-filter button").removeClass('active');

        $(this).addClass('active');

    });

});

</script>

<?php

	/**

	 * Hook: woocommerce_after_shop_loop.

	 *

	 * @hooked woocommerce_pagination - 10

	 */

	do_action( 'woocommerce_after_shop_loop' );

} else {

	/**

	 * Hook: woocommerce_no_products_found.

	 *

	 * @hooked wc_no_products_found - 10

	 */

	do_action( 'woocommerce_no_products_found' );

}



/**

 * Hook: woocommerce_after_main_content.

 *

 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)

 */

do_action( 'woocommerce_after_main_content' );



/**

 * Hook: woocommerce_sidebar.

 *

 * @hooked woocommerce_get_sidebar - 10

 */

do_action( 'woocommerce_sidebar' );



get_footer( 'shop' );

?>