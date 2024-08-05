<?php



  /**
    *
    * <!--==========================================================-->
	*
    * <!----------+    Woo-Commerce all functions Here     +---------->
	*
    * <!--==========================================================-->
    *
    */







    /**

    * Woo-Commerce Default Sorting Option Customization

    *

    */



    /**

    * For Remove Sorting Options from Select Box:

    */

    function fa_remove_default_sorting_options( $options ) {



    unset( $options[ 'popularity' ] );

    unset( $options[ 'menu_order' ] );

    unset( $options[ 'rating' ] );

    // unset( $options[ 'date' ] );

    // unset( $options[ 'price' ] );

    // unset( $options[ 'price-desc' ] );



    return $options;

    }

    add_filter( 'woocommerce_catalog_orderby', 'fa_remove_default_sorting_options' );



    /**

    * For Rename Sorting Options name in Select Box:

    */

    function fa_rename_default_sorting_options( $options ) {



    // $options[ 'menu_order' ] = 'Default Sorting';

    $options[ 'date' ] = 'Newest';

    $options[ 'price' ] = 'Price Low to High';

    $options[ 'price-desc' ] = 'Price High to Low';



    return $options;

    }

    add_filter( 'woocommerce_catalog_orderby', 'fa_rename_default_sorting_options' );



    /**
    * For Add Extra Sorting Options in Select Box:
    */

    function fa_add_custom_sorting_options( $options ) {
		$options['date-asc'] = 'Oldest';

		return $options;
		}
    add_filter( 'woocommerce_catalog_orderby', 'fa_add_custom_sorting_options' );


    function fa_custom_product_sorting( $args ) {
		if ( isset( $_GET['orderby'] ) && 'date-asc' === $_GET['orderby'] ) {
		$args['orderby'] = 'date';
		$args['order'] = 'asc';
		}
		return $args;
		}

    add_filter( 'woocommerce_get_catalog_ordering_args', 'fa_custom_product_sorting' );



    function fa_change_sorting_options_order( $options ){

		$options = array(
		// 'menu_order' => __( 'Default sorting', 'woocommerce' ),
		'date' => __( 'Sort by latest', 'woocommerce' ),
		'date-asc' => __( 'Sort by oldest', 'woocommerce' ),
		'price' => __( 'Sort by price: low to high', 'woocommerce' ),
		'price-desc' => __( 'Sort by price-desc: high to low', 'woocommerce' ),
		);

		return $options;
    }
    add_filter( 'woocommerce_catalog_orderby', 'fa_change_sorting_options_order', 5 );




    /**
    * Woo-Customization
    */

    // function star_rating() {
    // echo '<div class="custom_class">';
        // }
        // add_action('woocommerce_after_shop_loop_item_title','star_rating', 5);


        // add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


        // function star_rating_end() {
        // echo '</div>';
    // }
    // add_action('woocommerce_after_shop_loop_item_title','star_rating_end', 5);



    function shop_woocommerce_output_content_wrapper(){

    if(!is_product()){

    echo '<section class="banner-area inner-ban">';

        }

        }

        add_action("woocommerce_before_main_content", "shop_woocommerce_output_content_wrapper", 10);





        function shop_woocommerce_output_content_wrapper_end(){

        echo '</section>';

    }

    add_action("woocommerce_archive_description", "shop_woocommerce_output_content_wrapper_end", 10);





	/**
	 * Add Banner Image on Shop page.
	 */

    function shop_woocommerce_show_page_title_filter(){ ?>
		<div class="ban-wrap common-bg"
			style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id(129));?>')">
			<div class="container">
				<div class="ban-slogan" data-aos="fade-up" data-aos-duration="3000">
					<h2><?php woocommerce_page_title();?></h2>
				</div>
			</div>
		</div>
	<?php }

	add_filter("woocommerce_show_page_title", "shop_woocommerce_show_page_title_filter");



	/**
	 * Add Related Product In Single Product Details Page
	 */

	function related_product_start() {
		echo '<section class="related_prodct_pr">';
	}

	add_action('woocommerce_after_single_product_summary', 'related_product_start', 20);

	
	function custom_related_product_output() {
		global $product;
		$related_products = wc_get_related_products($product->get_id(), 4); 
		if (!empty($related_products)) {
			echo '<div class="row">';
			$related_product = get_field('related_product_text',129);
			echo '<div class="col-12"><h3>'.$related_product.'</h3></div>';
			foreach ($related_products as $related_product_id) {
				$related_product = wc_get_product($related_product_id);
				$cat_classes = '';
				echo '<div class="col-lg-3 col-md-6">';
				echo '<a href="' . esc_url(get_permalink($related_product_id)) . '">';
				echo '<div class="each-collectie-box">';
				echo '<div class="each-collect-img">';
				$featured_image = wp_get_attachment_url($related_product->get_image_id());
				echo '<div class="show-img">';
				echo '<img class="w-100" src="' . esc_url($featured_image) . '" alt="">';
				echo '</div>';
				echo '<div class="hov-img">';
				$gallery_images = $related_product->get_gallery_image_ids();
				if ($gallery_images) {
					$first_image_id = $gallery_images[0];
					$image_url = wp_get_attachment_image_url($first_image_id, 'full');
					echo '<img class="w-100" src="' . esc_url($image_url) . '" alt="">';
				}
				echo '</div>';
				echo '</div>';
				echo '<div class="each-collect-txt">';
				echo '<h5>' . esc_html($related_product->get_name()) . '</h5>';
				echo '<h6>' . $related_product->get_price_html() . '</h6>';
				do_action('woocommerce_after_shop_loop_item_title');
				echo '<a class="common-btn" href="' . esc_url(get_permalink($related_product_id)) . '">View Details</a>';
				do_action('woocommerce_after_shop_loop_item');
				echo '</div>';
				echo '</div>';
				echo '</a>';
				echo '</div>';
			}
			echo '</div>';
		}
	}

	add_action('woocommerce_after_single_product_summary', 'custom_related_product_output', 20);


	function related_product_end() {
		echo '</section>';
	}

	add_action('woocommerce_after_single_product_summary', 'related_product_end', 20);

	





	/**
	 * Add Increase/Decrease Button on Product Details Page Cart Option
	 */

	function show_quantity_plus_sign() {
		echo '<button type="button" class="plus" >+</button>';
	}

	add_action("woocommerce_before_add_to_cart_quantity", "show_quantity_plus_sign");


	function show_quantity_minus_sign() {
		echo '<button type="button" class="minus" >-</button>';
	}

	add_action("woocommerce_before_add_to_cart_quantity", "show_quantity_minus_sign");

	// Add Plus/Minus Functionality
	add_action("wp_footer", "show_quantity_plus_minus");
	function show_quantity_plus_minus() {
		if (!is_product()) {
			return;
		} ?>

<script>
	jQuery(document).ready(function($) {
		$('form.cart').on('click', 'button.plus, button.minus', function() {
			var qty = $(this).closest('form.cart').find('.qty');
			var val = parseFloat(qty.val());
			var max = parseFloat(qty.attr('max'));
			var min = parseFloat(qty.attr('min'));
			var step = parseFloat(qty.attr('step'));

			if ($(this).is('.plus')) {
				if (max && (max <= val)) {
					qty.val(max);
				} else {
					qty.val(val + step);
				}
			} else {
				if (min && (min >= val)) {
					qty.val(min);
				} else if (val > 1) {
					qty.val(val - step);
				}
			}
		});
	});
</script>
<?php
	}



	/**
	 * Add A Buy-Now Button After Add to Cart button in SingleProduct Page.
	 */

	// function buy_now_btn() {
	// 	$product_id = get_the_ID();
	// 	$product = wc_get_product($product_id);
	// 	$checkout_url = wc_get_checkout_url();
	// 	if($product->is_type('simple')) {
	// 		echo '<a href="'.$checkout_url.'?add_to_cart='.$product_id.'" class="buy_now_pr common-btn">Buy Now</a>';
	// 	}
	// }
	// add_action('woocommerce_after_add_to_cart_button','buy_now_btn');




	/**
	 * Add Pagination functionality In Shop page : 'Show No of Product Per Page'
	 */

	function custom_shop_per_page( $cols ) {
		$cols = 20; 
		return $cols;
	}

	add_filter( 'loop_shop_per_page', 'custom_shop_per_page', 20 );



	

	/**
	 * Checking if user Loggedin or not before Checkout Page
	 */

	function check_if_logged_in() {
		$pageid = 131; 
		if ( ! is_user_logged_in() && is_page( $pageid ) ) {
			$url = add_query_arg(
				'redirect_to',
				get_permalink( $pageid ),
				site_url( '/my-account' )
			);

			wp_safe_redirect( $url );
			exit;
		}
	}

	add_action( 'template_redirect', 'check_if_logged_in' );


/**
 * 
 * Show Price only LoggedIn User / Hide Price for Normal Users
 * 
 */
	function hide_price_for_guests($price, $product) {
		if (!is_user_logged_in()) {
			return '';
		}
		return $price;
	}
	add_filter('woocommerce_get_price_html', 'hide_price_for_guests', 10, 2);
	add_filter('woocommerce_get_price', 'hide_price_for_guests', 10, 2);

	function hide_add_to_cart_for_all() {
		remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
		remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
	}
	add_action('wp', 'hide_add_to_cart_for_all');

	
