<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pride_jewellery
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="error-404 not-found">
        <div class="container text-center">
            <div class="row img_class">
                <img class="w-100" src="<?php echo site_url('/wp-content/uploads/2024/05/image_processing20200225-18111-1qx52hb.png');?>"
                    alt="">
            </div>
            <div class="row content_class">
                <h4>SORRY! PAGE NOT FOUND</h4>
                <p>The Page you Requested does not Exist.</p>
                <div class="common-btn">
                    <a href="<?php echo site_url('/shop/');?>">Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();