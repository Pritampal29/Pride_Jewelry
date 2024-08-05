<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pride_jewellery
 */

?>


<!-- Footer Start-->
<footer class="footer-area">
        <div class="container">
			<div class="foot-wrap">
				<div class="row align-items-center">
					<div class="col-md-5">
						<div class="logo">
							<a href="<?php echo site_url(); ?>"><img class="mw-100" src="<?php echo get_field('footer_logo','option');?>" alt=""></a>
						</div>
					</div>
					<div class="col-md-7">
						<div class="foot-right">
							<div class="row">
								<div class="col-md-6">
									<div class="each-foot-info">
										<h5>Main Links</h5>
										<div class="nav-bar">
											<ul>
												<?php
												wp_nav_menu(
													array(
														'container'  => '',
														'items_wrap' => '%3$s',
														'theme_location' => 'footer',
														'menu'   => 'Footer Main Menu',
													)
												);
												?>
												<!-- <li><a href="index.html">Home</a></li>-->
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="each-foot-info">
										<h5>Quick Links</h5>
										<div class="nav-bar">
											<ul>
											<?php
											wp_nav_menu(
												array(
													'container'  => '',
													'items_wrap' => '%3$s',
													'theme_location' => 'footer-2',
													'menu'   => 'Footer Quick Menu',
												)
											);
											?>
												<!-- <li><a href="#">Privacy Policy</a></li> -->
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="foot-btm text-center">
			<div class="container">
				<div class="foot-social">
					<p>Copyright © <?php echo date('Y');?> <?php echo get_field('copyright_text','option');?></p>
					<ul>
					<?php
					if(have_rows('information_repeater','options')) {
						while(have_rows('information_repeater','options')) { 
							the_row();?>
						<li><a href="<?php echo get_sub_field('field_links','options');?>"><span><img src="<?php echo get_sub_field('field_icons','options');?>" alt=""></span> <?php echo get_sub_field('field_value','options');?></a></li>
					<?php } } ?>
					</ul>
				</div>
			</div>
		</div>
    </footer>
	<!--Footer End -->

	<!--Back to top Start-->
    <div id="back-to-top">
        <a class="top" id="#top" href="#"> <i class="fas fa-angle-up"></i> </a>
    </div>
    <!--Back to top End-->


	<!--===========================-->
			<!-- js Starts -->
	<!--===========================-->

	<!--jquery js-->
	<script src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
	<!--Bootstrap js-->
	<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
	<!--Swiper-slider js-->
	<script src="<?php echo get_template_directory_uri();?>/js/swiper-bundle.min.js"></script>
	<!-- Aos animation js -->
	<script src="<?php echo get_template_directory_uri();?>/js/aos.js"></script>
	<!-- Custom js -->
	<script src="<?php echo get_template_directory_uri();?>/js/custom.js"></script>

	<!--===========================-->
			<!-- js End -->
	<!--===========================-->

	<?php wp_footer(); ?>
</body>
</html>
