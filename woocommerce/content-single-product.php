<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<section class="main_pr_single">
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'container main_pr', $product ); ?>>
        <div class="product_details_pr">

            <?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>

            <div class="summary entry-summary">
                <?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>

                <!---------------------------------- With Button Functionality with Radio---------------------------------->
                <?php $color_variations = get_field('color_variations', $post->ID); 
                if($color_variations) {?>
                <div class="product-var">
                    <?php 
                        $actual_color = get_field('gold_color', $post->ID); 
                        $actual_size = get_field('size', $post->ID); 
                        

                        $unique_colors = [];
                        $unique_sizes = [];

                        if ($color_variations) {
                            foreach ($color_variations as $variation) {
                                $color_name = $variation['color_name'];
                                $color_link = $variation['color_link'];
                                $size_name = $variation['pro_size'];
                                $size_link = $variation['color_link'];

                                if (!isset($unique_colors[$color_name])) {
                                    $unique_colors[$color_name] = $color_link;
                                }

                                if (!isset($unique_sizes[$size_name])) {
                                    $unique_sizes[$size_name] = $size_link;
                                }
                            }
                    ?>

                    <label>Choose Gold Color:</label>
                    <div class="color-options">
                        <?php foreach ($unique_colors as $color_name => $color_link): ?>
                            <label>
                                <input type="radio" name="color-option" value="<?php echo esc_url($color_link); ?>" 
                                    onclick="window.location.href=this.value;"
                                    <?php echo ($color_name == $actual_color) ? 'checked' : ''; ?>>
                                <?php echo esc_html($color_name); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <?php } ?>
                </div>
                <?php } ?>
                


                <!---------------------------------- With OnChange Functionality ---------------------------------->

                <!-- <div class="product-var">
                    <?php 
                        $actual_color = get_field('gold_color', $post->ID); 
                        $actual_size = get_field('size', $post->ID); 
                        $color_variations = get_field('color_variations', $post->ID); 

                        $unique_colors = [];
                        $unique_sizes = [];

                        if ($color_variations) {
                            foreach ($color_variations as $variation) {
                                $color_name = $variation['color_name'];
                                $color_link = $variation['color_link'];
                                $size_name = $variation['pro_size'];
                                $size_link = $variation['color_link'];

                                if (!isset($unique_colors[$color_name])) {
                                    $unique_colors[$color_name] = $color_link;
                                }

                                if (!isset($unique_sizes[$size_name])) {
                                    $unique_sizes[$size_name] = $size_link;
                                }
                            }
                            ?>

                            <label for="color-select">Choose a Color:</label>
                            <select id="color-select" onchange="if(this.value) window.location.href=this.value;">
                                <?php foreach ($unique_colors as $color_name => $color_link): ?>
                                    <option value="<?php echo esc_url($color_link); ?>" <?php echo ($color_name == $actual_color) ? 'selected' : ''; ?>>
                                        <?php echo esc_html($color_name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <label for="size-select">Choose a Size:</label>
                            <select id="size-select" onchange="if(this.value) window.location.href=this.value;">
                                <?php foreach ($unique_sizes as $size_name => $size_link): ?>
                                    <option value="<?php echo esc_url($size_link); ?>" <?php echo ($size_name == $actual_size) ? 'selected' : ''; ?>>
                                        <?php echo esc_html($size_name); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        <?php } ?>
                </div> -->

                <!---------------------------------- With Button Functionality ---------------------------------->
                <!-- <div class="product-var">
                    <?php 
                        $actual_color = get_field('gold_color', $post->ID); 
                        $actual_size = get_field('size', $post->ID); 
                        $color_variations = get_field('color_variations', $post->ID); 

                        $unique_colors = [];
                        $unique_sizes = [];
                        $valid_combinations = []; // Array to hold valid color-size combinations

                        if ($color_variations) {
                            foreach ($color_variations as $variation) {
                                $color_name = $variation['color_name'];
                                $color_link = $variation['color_link'];
                                $size_name = $variation['pro_size'];
                                $size_link = $variation['color_link'];

                                // Store unique colors and sizes with links
                                if (!isset($unique_colors[$color_name])) {
                                    $unique_colors[$color_name] = $color_link;
                                }

                                if (!isset($unique_sizes[$size_name])) {
                                    $unique_sizes[$size_name] = $size_link;
                                }

                                // Store each color-size combination
                                $valid_combinations["$color_name|$size_name"] = $color_link;
                            }
                    ?>

                    <label for="color-select">Choose a Color:</label>
                    <select id="color-select">
                        <?php foreach ($unique_colors as $color_name => $color_link): ?>
                            <option value="<?php echo esc_attr($color_name); ?>" <?php echo ($color_name == $actual_color) ? 'selected' : ''; ?>>
                                <?php echo esc_html($color_name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label for="size-select">Choose a Size:</label>
                    <select id="size-select">
                        <?php foreach ($unique_sizes as $size_name => $size_link): ?>
                            <option value="<?php echo esc_attr($size_name); ?>" <?php echo ($size_name == $actual_size) ? 'selected' : ''; ?>>
                                <?php echo esc_html($size_name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button id="redirect-button">Go</button>

                    <script>
                        // Store valid combinations in JavaScript
                        const validCombinations = <?php echo json_encode($valid_combinations); ?>;

                        document.getElementById('redirect-button').addEventListener('click', function () {
                            const selectedColor = document.getElementById('color-select').value;
                            const selectedSize = document.getElementById('size-select').value;

                            // Check if selected combination exists in validCombinations
                            const combinationKey = `${selectedColor}|${selectedSize}`;
                            const redirectUrl = validCombinations[combinationKey];

                            if (redirectUrl) {
                                // Redirect if combination exists
                                window.location.href = redirectUrl;
                            } else {
                                // Show alert if no combination found
                                alert("No Product Found");
                            }
                        });
                    </script>

                    <?php } ?>
                </div> -->




                <div class="product_xtra_dtls">
                    <ul>
                        <?php if(get_field('gold_color',$post->ID)) { ?>
                        <li>
                            <span>Gold Color</span>
                            <span><?php echo get_field('gold_color',$post->ID);?></span>
                        </li>
                        <?php } ?>

                        <?php if(get_field('size',$post->ID)) { ?>
                        <li>
                            <span>Size</span>
                            <span><?php echo get_field('size',$post->ID);?></span>
                        </li>
                        <?php } ?>

                        <?php if(get_field('clarity_of_diamonds',$post->ID)) { ?>
                        <li>
                            <span>Clarity of Diamonds</span>
                            <span><?php echo get_field('clarity_of_diamonds',$post->ID);?></span>
                        </li>
                        <?php } ?>

                        <?php if(get_field('metal_grade',$post->ID)) { ?>
                        <li>
                            <span>Metal Grade</span>
                            <span><?php echo get_field('metal_grade',$post->ID);?></span>
                        </li>
                        <?php } ?>

                        <?php if(get_field('metal_weight_in_grams',$post->ID)) { ?>
                        <li>
                            <span>Metal Weight(in grams)</span>
                            <span><?php echo get_field('metal_weight_in_grams',$post->ID);?></span>
                        </li>
                        <?php } ?>

                        <?php $metal_wt = get_field('total_diamond_wt',$post->ID);
							if($metal_wt['white_diamond_wt']) { ?>
                        <li>
                            <span>White Diamond Wt.</span>
                            <span><?php echo $metal_wt['white_diamond_wt'];?></span>
                        </li>
                        <?php } ?>

                        <?php if($metal_wt['colored_diamond_wt']) { ?>
                        <li>
                            <span>Colored Diamond Wt</span>
                            <span><?php echo $metal_wt['colored_diamond_wt'];?></span>
                        </li>
                        <?php } ?>

                        <?php if($metal_wt['total_diamond_wt']) { ?>
                        <li>
                            <span>Total Diamond Wt</span>
                            <span><?php echo $metal_wt['total_diamond_wt'];?></span>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- Product Description -->
                <?php if ( ! empty( $product->get_short_description() ) ) { ?>
                <div class="short_description_pr">
                    <h3>Description</h3>
                    <p><?php echo $product->get_short_description(); ?></p>
                </div>
                <?php } ?>

            </div>
        </div>


        <div class="product_summery_pr">
            <?php
			/**
			 * Hook: woocommerce_after_single_product_summary.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
			?>
        </div>
</section>


<?php do_action( 'woocommerce_after_single_product' ); ?>