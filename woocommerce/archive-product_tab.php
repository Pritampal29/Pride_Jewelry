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

<!-- collection-sec Starts-->
<section class="collection-inn-sec">
    <div class="container">
        <div class="cmn-tab">
            <!-- Category Tabs -->
            <div class="row align-items-center" data-aos="fade-down" data-aos-duration="2000">
                <div class="col-md-9">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php
							$categories = get_terms( 'product_cat' );
							foreach ( $categories as $index => $category ) { ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link common-btn <?php if($index == 1) echo 'active'; ?>"
                                id="tab_<?php echo $index; ?>" data-bs-toggle="tab"
                                data-bs-target="#tab_id_<?php echo $index; ?>" type="button" role="tab"
                                aria-controls="profile"
                                aria-selected="false"><?php echo esc_html( $category->name ); ?></button>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="product-sort">
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" class="orderby form-control" id="product-sorting"
                                aria-label="Shop order">
                                <option value="date">Newest</option>
                                <option value="date-desc">Oldest</option>
                                <option value="price">Price Low to High</option>
                                <option value="price-desc">Price High to Low</option>
                            </select>
                        </form>
						
                        <!-- <select class="form-control" id="product-sorting">
								<option value="newest">Newest</option>
								<option value="oldest">Oldest</option>
								<option value="price-low-to-high">Price Low to High</option>
								<option value="price-high-to-low">Price High to Low</option>
							</select> -->
                    </div>
                </div>
            </div>


            <!-- Tab Content -->
            <div class="tab-content" id="myTabContent" data-aos="fade-up" data-aos-duration="2000">
                <?php foreach ( $categories as $index => $category ) { ?>
                <div class="tab-pane fade <?php if($index == 1) echo 'show active'; ?>"
                    id="tab_id_<?php echo $index; ?>" role="tabpanel" aria-labelledby="tab_<?php echo $index; ?>">
                    <div class="colletion-wrap">
                        <div class="row">
                            <?php
								$args = array(
									'post_type'      => 'product',
									'posts_per_page' => 20,
									'product_cat'    => $category->slug,
								);

								$products = new WP_Query( $args );
								if ( $products->have_posts() ) {
									while ( $products->have_posts() ) {
										$products->the_post();
										global $product;
										?>
                            <div class="col-lg-3 col-md-6">
                                <div class="each-collectie-box">
                                    <div class="each-collect-img">
                                        <?php $featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>
                                        <div class="show-img">
                                            <img class="w-100" src="<?php echo esc_url( $featured_image ); ?>" alt="">
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
                            </div>
                            <?php } } 
								wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- <div class="pagination">
						<ul>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
						</ul>
					</div> -->
    </div>
</section>
<!-- collection-sec End-->


<!-- woocommerce_product_loop_start();
	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}
	woocommerce_product_loop_end(); -->
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