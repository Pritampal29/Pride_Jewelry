<?php
// Get the product ID and the selected gold color from the passed arguments.
$product_id = isset($args['product_id']) ? $args['product_id'] : get_the_ID();
$selected_color = isset($args['selected_gold_color']) ? $args['selected_gold_color'] : get_field('gold_color', $product_id);

// Fetch product details based on the selected color.
$product = wc_get_product($product_id);

// Display only the relevant product details for the selected color
?>

<div class="product_details_pr">
    <!-- Update Product Images Based on Selected Color -->
    <div class="product_images">
        <?php 
        // Assuming you have images linked to each color in ACF
        $color_image = get_field('color_image_' . $selected_color, $product_id);
        if ($color_image) {
            echo '<img src="' . esc_url($color_image) . '" alt="Product Image for ' . esc_attr($selected_color) . '">';
        } else {
            echo get_the_post_thumbnail($product_id, 'full');
        }
        ?>
    </div>

    <!-- Update Color-Specific Fields -->
    <div class="product_xtra_dtls">
        <ul>
            <li>
                <span>Gold Color</span>
                <span><?php echo esc_html($selected_color); ?></span>
            </li>

            <?php if(get_field('size',$product_id)) { ?>
            <li>
                <span>Size</span>
                <span><?php echo get_field('size',$product_id); ?></span>
            </li>
            <?php } ?>

            <?php if(get_field('clarity_of_diamonds',$product_id)) { ?>
            <li>
                <span>Clarity of Diamonds</span>
                <span><?php echo get_field('clarity_of_diamonds',$product_id); ?></span>
            </li>
            <?php } ?>

            <?php if(get_field('metal_grade',$product_id)) { ?>
            <li>
                <span>Metal Grade</span>
                <span><?php echo get_field('metal_grade',$product_id); ?></span>
            </li>
            <?php } ?>

            <?php if(get_field('metal_weight_in_grams',$product_id)) { ?>
            <li>
                <span>Metal Weight (in grams)</span>
                <span><?php echo get_field('metal_weight_in_grams',$product_id); ?></span>
            </li>
            <?php } ?>

            <?php $metal_wt = get_field('total_diamond_wt', $product_id); ?>
            <?php if ($metal_wt['white_diamond_wt']) { ?>
            <li>
                <span>White Diamond Wt</span>
                <span><?php echo $metal_wt['white_diamond_wt']; ?></span>
            </li>
            <?php } ?>

            <?php if ($metal_wt['colored_diamond_wt']) { ?>
            <li>
                <span>Colored Diamond Wt</span>
                <span><?php echo $metal_wt['colored_diamond_wt']; ?></span>
            </li>
            <?php } ?>

            <?php if ($metal_wt['total_diamond_wt']) { ?>
            <li>
                <span>Total Diamond Wt</span>
                <span><?php echo $metal_wt['total_diamond_wt']; ?></span>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
