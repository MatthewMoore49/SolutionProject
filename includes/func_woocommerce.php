<?php

// Enable WC support
add_action( 'after_setup_theme', 'bigcity_woocommerce_support' );
function bigcity_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// make woocommerce load faster
// keep this at the top so we know what we're disabling
// https://wordpress.org/plugins/wc-speed-drain-repair


add_action( 'wp_enqueue_scripts', 'child_manage_woocommerce_styles', 99 );
function child_manage_woocommerce_styles() {
	
    //first check that woo exists to prevent fatal errors
    if ( function_exists( 'is_woocommerce' ) ) {
	    //remove generator meta tag
	    remove_action( 'wp_head', array( $GLOBALS['woocommerce'], 'generator' ) );
  
        //dequeue scripts and styles
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }
 }

// hide notices like add to cart so we can display them where we want
remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 ); /*Archive Product*/
remove_action( 'woocommerce_before_single_product', 'wc_print_notices', 120 ); /*Single Product*/

/*
 * Big City Wrappers
 */

add_action('woocommerce_before_main_content', 'bigcity_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'bigcity_wrapper_end', 10);

function bigcity_wrapper_start() { echo ''; }
function bigcity_wrapper_end() { echo ''; }

// add continue shopping button on the add to cart notice
add_filter('wc_add_to_cart_message_html', 'handler_function_name', 10, 2);
function handler_function_name($message, $product_id) {
    return '<a href="/shop/" class="button wc-forward" style="margin-left: 20px;">Continue Shopping</a>'. $message;
}

/*
 * Common WooCommerce Hooks
 */

/**
 * Customize Breadcrumbs
 *
 * @since 1.0.0
 *
 * @param Array $crumbs Array of breadcrumb links that we will filter
 *              0 - Link Title
 *              1 - Link URL
 * @param WC_Breadcrumb $breadcrumb WC_Breadcrumb Instance, usually not used
 * @return Array returns the modified $crumbs array
 */
function custom_breadcrumb( $crumbs, $breadcrumb ){

    // remove duplicate products link
    // array_shift($crumbs);

    // $crumbs[0][0] = 'All Products';
    // $crumbs[0][1] = home_url( '/shop/' );

    return $crumbs;
}
add_filter( 'woocommerce_get_breadcrumb', 'custom_breadcrumb', 10, 2 );

/**
 * Customize Item Name in Cart
 *
 * @since 1.0.0
 *
 * @param string $item_name 
 * @param Array $cart_item use this to detect any parameters to output in the name
 * @param int $cart_item_key
 * @return string returns the modified $item_name
 */
function showing_sku_in_cart_items( $item_name, $cart_item, $cart_item_key  ) {
    // The WC_Product object
    $product = $cart_item['data'];
    // Get the  SKU
    $sku = $product->get_sku();

    // When sku doesn't exist
    if(empty($sku)) return $item_name;

    // Add the sku to the item title
    // $item_name .= '<br><small class="product-sku">' . __( "SKU: ", "woocommerce") . $sku . '</small>';

    return $item_name;
}
add_filter( 'woocommerce_cart_item_name', 'showing_sku_in_cart_items', 99, 3 );

/**
 * Perform an action once an order is processed (payment returns success but order is still under Processing not Complete)
 *
 * @since 1.0.0
 *
 * @param string $order_id Order ID of the processed Order
 */
function sol_payment_processed( $order_id  ) {
    // Do stuff with the order object below
    $order = new WC_Order( $order_id );

}
// You can actually use other statuses to hook here as well, but the most common is this, as this is
// usually when the user finishes a payment we know is authorized successfully
add_action( 'woocommerce_checkout_order_processed', 'sol_payment_processed', 1, 1);

/**
 * Executes right before the cart is rendered on the /cart/ page. Useful for removing items before checkout
 *
 * @since 1.0.0
 */
function sol_before_cart() {
   foreach( WC()->cart->get_cart() as $cart_item ) {
      $product_in_cart = $cart_item['product_id'];
      if ( $product_in_cart === 1234){
          // Do Something Here
      }
   }
}
add_action( 'woocommerce_before_cart', 'sol_before_cart', 10);


//
// These 5 hooks work in combination to modify the menu links in the My Account Page
//

/**
 * Add links to My Account Menu
 *
 * @since 1.0.0
 *
 * @param Array $menu_links
 * 
 * @return Array returns the modified $menu_links
 */
function account_menu_links( $menu_links ){
    $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2', 'link3' => 'Link 3');
 
    // array_slice() is good when you want to add an element between the other ones
    $menu_links = array_slice( $menu_links, 0, 2, true ) + $new + array_slice( $menu_links, 2, NULL, true );
 
    return $menu_links;
}
add_filter ( 'woocommerce_account_menu_items', 'account_menu_links', 10, 1);

/**
 * Add links to My Account Menu
 *
 * @since 1.0.0
 *
 * @param string $url the url we are filtering
 * @param string $endpoint endpoint slug
 * @param string $value
 * @param string $permalink
 * 
 * @return Array returns the modified $url
 */
function account_menu_endpoints( $url, $endpoint, $value, $permalink ){
    if( $endpoint === 'link1' ) {
        $url = site_url() . '/link1';
    }
    if( $endpoint === 'link2' ) {
        $url = site_url() . '/link1';
    }
    return $url;
}
add_filter( 'woocommerce_get_endpoint_url', 'account_menu_endpoints', 10, 4 );

/**
 * Register a new rewrite endpoint with Wordpress
 * REQUIRES custom_flush_rewrite_rules be enabled as well 
 *
 * @since 1.0.0
 */
function custom_new_wc_endpoint() {
    add_rewrite_endpoint( 'link3', EP_ROOT | EP_PAGES );
}
add_action( 'init', 'custom_new_wc_endpoint' );

/**
 * Add custom query variable to Wordpress
 *
 * @since 1.0.0
 *
 * @param string $vars
 * 
 * @return Array returns the modified $vars
 */
function custom_query_vars( $vars ) {
    $vars[] = 'link3';
    return $vars;
}
add_filter( 'query_vars', 'custom_query_vars', 10, 1 );

/**
 * Includes the template we want for the new tab page
 * We are placing this template file in the same place as all the default
 * WooCommerce Templates for ease of organization.
 *
 * @since 1.0.0
 */
add_action( 'woocommerce_account_link3_endpoint', 'custom_endpoint_content' );
function custom_endpoint_content() {
    include get_template_directory() . '/woocommerce/myaccount/link3.php'; 
}

/**
 * We can use this to modify shipping methods names/availability/etc
 *
 * @since 1.0.0
 * 
 * @param Array $available_shipping_methods
 * @param Object $package
 * 
 * @return Array modified $available_shipping_methods
 */
function sol_set_shipping_method_name( $available_shipping_methods, $package ) {
	foreach ( $available_shipping_methods as $key => $value ) {
        if ($available_shipping_methods[$key]->label == 'Something'){
            $available_shipping_methods[$key]->label = "Something Else";
            // unset($available_shipping_methods[$key]);
        }
	}
	return $available_shipping_methods;
}
add_filter( 'woocommerce_package_rates', 'sol_set_shipping_method_name', 10, 2 );

/**
 * Good to set if clients have products with too many variations for the AJAX on the variation pages
 * to work correctly.
 *
 * @since 1.0.0
 * 
 * @param int $default is set to 20
 * @param WC_Product $product
 * 
 * @return Array modified $available_shipping_methods
 */
function sol_ajax_variation_threshold( $default, $product ) {
    return 500; // increase this number if needed
}
add_filter( 'woocommerce_ajax_variation_threshold', 'sol_ajax_variation_threshold', 10, 2 );


/**
 * Create Custom Meta Fields inside variation products
 *
 * @param int $loop the variation loop that we're in, needed to print the field
 * @param Array $variation_data
 * @param WC_Variation $variation
 * 
 * @since 1.0.0
 */
function sol_create_variation_fields( $loop, $variation_data, $variation ) {
   woocommerce_wp_text_input( array(
    'id' => '_manufacturer_part[' . $loop . ']',
    'class' => 'short',
    'label' => __( 'Manufacturer Part', 'woocommerce' ),
    'value' => get_post_meta( $variation->ID, 'manufacturer_part', true )
   ) );
}
add_action( 'woocommerce_variation_options_pricing', 'sol_create_variation_fields', 10, 3);

/**
 * Save variation meta
 *
 * @since 1.0.0
 * 
 * @param int $variation_id the post id of the product field we're saving
 * @param int $loop the loop we're on, as we're looping through variations to save them
 * 
 */
function sol_save_variation_fields( $variation_id, $loop ) {
    $custom_field = $_POST['_manufacturer_part'][$loop];
    update_post_meta( $variation_id, 'manufacturer_part', $custom_field );
 }
add_action( 'woocommerce_save_product_variation', 'sol_save_variation_fields', 10, 2);


/*
 * Admin Panel / Email / Order Additions
 */

 // remove crowded columns from product list in admin
function bigcity_remove_columns() {
	add_filter( 'manage_product_posts_columns' , function($columns){
		unset($columns['product_tag']);
		unset($columns['featured']);
		unset($columns['product_type']);
		return $columns;
	} );
}
add_action( 'admin_init' , 'bigcity_remove_columns' );

// edit the subject line of the new order emails that are sent to the admin
add_filter('woocommerce_email_subject_new_order', 'change_admin_email_subject', 1, 2);
function change_admin_email_subject( $subject, $order ) {
	global $woocommerce;
	$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
	$subject = sprintf('New Customer Order (#%s) from %s %s', $order->id, $order->billing_first_name, $order->billing_last_name);
	return $subject;
}
 
 // edit woocommerce admin orders - add purchase products column
add_filter('manage_edit-shop_order_columns', 'bigcity_order_items_column' );
function bigcity_order_items_column( $order_columns ) {
    $order_columns['order_products'] = "Purchased products";
    return $order_columns;
}

// edit woocommerce admin orders - show products that the user ordered
add_action( 'manage_shop_order_posts_custom_column' , 'bigcity_order_items_column_cnt' );
function bigcity_order_items_column_cnt( $colname ) {
	global $the_order; // the global order object
 	if( $colname == 'order_products' ) {
		// get items from the order global object
		$order_items = $the_order->get_items();
		if ( !is_wp_error( $order_items ) ) {
			foreach( $order_items as $order_item ) {
 				echo $order_item['quantity'] .' × <a href="' . admin_url('post.php?post=' . $order_item['product_id'] . '&action=edit' ) . '">'. $order_item['name'] .'</a><br />';
				// you can also use $order_item->variation_id parameter
				// by the way, $order_item['name'] will display variation name too
			}
		}
	}
}


// edit woocommerce admin orders list view - add new column for purchased products
add_filter('manage_edit-shop_order_columns', 'add_order_items_column' );
function add_order_items_column( $order_columns ) {
    $order_columns['order_products'] = "Purchased products";
    return $order_columns;
}

// edit woocommerce admin orders list view - show product data
add_action( 'manage_shop_order_posts_custom_column' , 'add_order_items_column_cnt' );
function add_order_items_column_cnt( $colname ) {
	global $the_order;
 	if( $colname == 'order_products' ) {
		$order_items = $the_order->get_items();
		if ( !is_wp_error( $order_items ) ) {
			foreach( $order_items as $order_item ) {
 				echo $order_item['quantity'] .' × <a href="' . admin_url('post.php?post=' . $order_item['product_id'] . '&action=edit' ) . '">'. $order_item['name'] .'</a><br />';
				// you can also use $order_item->variation_id parameter
				// by the way, $order_item['name'] will display variation name too
			}
		}
	}
}