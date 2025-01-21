<?php
/**
 * Pride_jewellery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pride_jewellery
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pride_jewellery_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Pride_jewellery, use a find and replace
		* to change 'pride_jewellery' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pride_jewellery', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'pride_jewellery' ),
			'footer' => esc_html__( 'Footer Main', 'pride_jewellery' ),
			'footer-2' => esc_html__( 'Footer Quick', 'pride_jewellery' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'pride_jewellery_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'pride_jewellery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pride_jewellery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pride_jewellery_content_width', 640 );
}
add_action( 'after_setup_theme', 'pride_jewellery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pride_jewellery_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'pride_jewellery' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'pride_jewellery' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'pride_jewellery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pride_jewellery_scripts() {
	wp_enqueue_style( 'pride_jewellery-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'pride_jewellery-style', 'rtl', 'replace' );

	wp_enqueue_script( 'pride_jewellery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pride_jewellery_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * 
 *  <!--====================================================-->
 *	<!--------------+    Pritam Custom Code     +------------->
 *	<!--====================================================-->
 *
 */


/**
* Support Theme for Woo-Commerce
*/
	add_action( 'after_setup_theme', 'setup_woocommerce_support' );

	function setup_woocommerce_support(){
		add_theme_support('woocommerce');
	}

/**
 * Add Extra Option Page For Header & Footer
 */
	if( function_exists('acf_add_options_page') ) {  

		acf_add_options_page(array(
			'page_title'    => 'Options',
			'menu_title'    => 'Options',
			'menu_slug'     => 'Options',
			'capability'    => 'edit_posts',
			'redirect'      => false,
			'position' => 2
		));
	}


/**
 * Code for Header Menu Active 
 */

 class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Add "active" class to the current menu item
        if ($item->current || $item->current_item_ancestor) {
            $item->classes[] = 'active';
        }

        // Call the parent method to generate the menu item
        parent::start_el($output, $item, $depth, $args);
    }
}

/** 
 *  Add Extra class for Menu collaps.
 */

 function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
    if ($args->walker->has_children && $depth === 0) {
        $item_output .= '<span><i class="fas fa-chevron-down"></i></span>';
    }
    return $item_output;
 }
 add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);




 include get_template_directory() . "/inc/woocommerce.php";


    /**
    *
    *
    * <!--==========================================================-->
	*
    * <!----------+    Woo-Commerce all functions Here     +---------->
	*
    * <!--==========================================================-->
    *
    */

    global $product;
    global $post;

    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
	// remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
	




   /**
	* Add Extra Fields into Database during Registration Process
	*
	* @param int $customer_id User ID.
	*/

	function save_extra_customer_fields( $customer_id ) {
		if ( isset( $_POST['first_name'] ) && ! empty( $_POST['first_name'] ) ) {
			update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
		}
		if ( isset( $_POST['last_name'] ) && ! empty( $_POST['last_name'] ) ) {
			update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
		}
		if ( isset( $_POST['phone'] ) && ! empty( $_POST['phone'] ) ) {
			update_user_meta( $customer_id, 'phone', sanitize_text_field( $_POST['phone'] ) );
		}
		if ( isset( $_POST['company_name'] ) && ! empty( $_POST['company_name'] ) ) {
			update_user_meta( $customer_id, 'company_name', sanitize_text_field( $_POST['company_name'] ) );
		}
		if ( isset( $_POST['contact_name'] ) && ! empty( $_POST['contact_name'] ) ) {
			update_user_meta( $customer_id, 'contact_name', sanitize_text_field( $_POST['contact_name'] ) );
		}
		if ( isset( $_POST['address'] ) && ! empty( $_POST['address'] ) ) {
			update_user_meta( $customer_id, 'address', sanitize_text_field( $_POST['address'] ) );
		}
	}

	add_action( 'woocommerce_created_customer', 'save_extra_customer_fields' );




	/**
	 * Disable Product Description Box From Woo-Commerce Product
	 */

	function disable_editor_support() {
		remove_post_type_support('product', 'editor');
	}

	add_action('init', 'disable_editor_support');



	/**
	 * Add new columns to the user list table
	 *  
	 */ 
		function custom_user_columns( $columns ) {
			$columns['company_name'] = __( 'Company Name', 'your_text_domain' );
			$columns['contact_name'] = __( 'Contact Name', 'your_text_domain' );
			$columns['address'] = __( 'Address', 'your_text_domain' );
			$columns['phone'] = __( 'Phone', 'your_text_domain' );
			return $columns;
		}
		add_filter( 'manage_users_columns', 'custom_user_columns' );

		// Populate the new columns with data
		function custom_user_columns_data( $value, $column_name, $user_id ) {
			if ( 'company_name' == $column_name ) {
				return get_user_meta( $user_id, 'company_name', true );
			}
			if ( 'contact_name' == $column_name ) {
				return get_user_meta( $user_id, 'contact_name', true );
			}
			if ( 'address' == $column_name ) {
				return get_user_meta( $user_id, 'address', true );
			}
			if ( 'phone' == $column_name ) {
				return get_user_meta( $user_id, 'phone', true );
			}
			return $value;
		}
		add_action( 'manage_users_custom_column', 'custom_user_columns_data', 10, 3 );





	/**
	 * Add extra fields to the user profile page in User Menu Dashboard
	 * 
	 */
		function custom_user_profile_fields( $user ) {
			?>
			<h3><?php _e('Extra Profile Information', 'your_text_domain'); ?></h3>

			<table class="form-table">
				<tr>
					<th><label for="company_name"><?php _e('Company Name'); ?></label></th>
					<td>
						<input type="text" name="company_name" id="company_name" value="<?php echo esc_attr( get_the_author_meta( 'company_name', $user->ID ) ); ?>" class="regular-text" /><br />
						<span class="description"><?php _e('Please enter your company name.'); ?></span>
					</td>
				</tr>
				<tr>
					<th><label for="contact_name"><?php _e('Contact Name'); ?></label></th>
					<td>
						<input type="text" name="contact_name" id="contact_name" value="<?php echo esc_attr( get_the_author_meta( 'contact_name', $user->ID ) ); ?>" class="regular-text" /><br />
						<span class="description"><?php _e('Please enter your contact name.'); ?></span>
					</td>
				</tr>
				<tr>
					<th><label for="address"><?php _e('Address'); ?></label></th>
					<td>
						<input type="text" name="address" id="address" value="<?php echo esc_attr( get_the_author_meta( 'address', $user->ID ) ); ?>" class="regular-text" /><br />
						<span class="description"><?php _e('Please enter your address.'); ?></span>
					</td>
				</tr>
				<tr>
					<th><label for="phone"><?php _e('Phone'); ?></label></th>
					<td>
						<input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" /><br />
						<span class="description"><?php _e('Please enter your phone number.'); ?></span>
					</td>
				</tr>
			</table>
			<?php
		}
		add_action( 'show_user_profile', 'custom_user_profile_fields' );
		add_action( 'edit_user_profile', 'custom_user_profile_fields' );


// Save extra fields from the user profile page
function save_custom_user_profile_fields( $user_id ) {
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }

    if ( isset( $_POST['company_name'] ) ) {
        update_user_meta( $user_id, 'company_name', sanitize_text_field( $_POST['company_name'] ) );
    }

    if ( isset( $_POST['contact_name'] ) ) {
        update_user_meta( $user_id, 'contact_name', sanitize_text_field( $_POST['contact_name'] ) );
    }

    if ( isset( $_POST['address'] ) ) {
        update_user_meta( $user_id, 'address', sanitize_text_field( $_POST['address'] ) );
    }

    if ( isset( $_POST['phone'] ) ) {
        update_user_meta( $user_id, 'phone', sanitize_text_field( $_POST['phone'] ) );
    }
}
add_action( 'personal_options_update', 'save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_custom_user_profile_fields' );





// Send email to admin on new user registration
function send_admin_email_on_registration( $user_id ) {
    $user_info = get_userdata( $user_id );
    $admin_email = get_option( 'admin_email' );
    $subject = 'New User Registration (Pride Jewelry)';
    $message = 'A new user has registered on your site. Please Approve from Backend(Approve New Users) to Give Access to your site' . "\n";
    $message .= 'Or Click the Link: https://pridejewelry.com/wp-admin/admin.php?page=new-user-approve-admin' . "\n\n";
    $message .= 'Username: ' . $user_info->user_login . "\n";
    $message .= 'Email: ' . $user_info->user_email . "\n";
    $message .= 'First Name: ' . get_user_meta( $user_id, 'first_name', true ) . "\n";
    $message .= 'Last Name: ' . get_user_meta( $user_id, 'last_name', true ) . "\n";
    $message .= 'Company Name: ' . get_user_meta( $user_id, 'company_name', true ) . "\n";
    $message .= 'Contact Name: ' . get_user_meta( $user_id, 'contact_name', true ) . "\n";
    $message .= 'Address: ' . get_user_meta( $user_id, 'address', true ) . "\n";
    $message .= 'Phone: ' . get_user_meta( $user_id, 'phone', true ) . "\n";

    wp_mail( $admin_email, $subject, $message );

}
add_action( 'user_register', 'send_admin_email_on_registration' );


// Send email to user on approval
function send_user_email_on_approval( $user_id ) {
    $user_info = get_userdata( $user_id );
    $subject = 'Your Registration is Approved (Pride Jewelry)';
    $message = 'Hello ' . $user_info->first_name . ",\n\n";
    $message .= 'Your registration on our site has been approved. You can now log in using the following details:' . "\n\n";
    $message .= 'Username: ' . $user_info->user_login . "\n";
    $message .= 'Login URL: ' . wc_get_page_permalink( 'myaccount' ) . "\n\n";
    $message .= 'Thank you!,' . "\n";
    $message .= 'Pride Jewelry' . "\n";

    wp_mail( $user_info->user_email, $subject, $message );
}
add_action( 'new_user_approve_approve_user', 'send_user_email_on_approval' );




