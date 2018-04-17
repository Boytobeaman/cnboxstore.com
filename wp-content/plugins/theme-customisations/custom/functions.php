<?php
/**
 * Functions.php
 *
 * @package  Theme_Customisations
 * @author   WooThemes
 * @since    1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * functions.php
 * Add PHP snippets here
 */

//make description text of each catogory appear after products loop

if ( ! function_exists( 'woocommerce_content' ) ) {

	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template.
	 * which people can add to their themes to add basic woocommerce support.
	 * without hooks or modifying core templates.
	 *
	 */
	function woocommerce_content() {

		if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else { ?>

			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

			<?php endif; ?>

			

			<?php if ( have_posts() ) : ?>

				<?php do_action( 'woocommerce_before_shop_loop' ); ?>

				<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

				<?php woocommerce_product_loop_end(); ?>

				<?php do_action( 'woocommerce_after_shop_loop' ); ?>

			<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

				<?php do_action( 'woocommerce_no_products_found' ); ?>

			<?php endif; ?>
			
			<?php do_action( 'woocommerce_archive_description' ); 

		}
	}
}

//去掉loop 产品的title  得到用 get_the_title()
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
//去掉loop 产品的购物车
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
//去掉loop 产品的价格
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'woocommerce_shop_loop_product_attr', 'woocommerce_template_loop_product_attr', 10 );


//加上 single product pag custom attr
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_custom_attr', 6 );
if ( ! function_exists( 'woocommerce_template_custom_attr' ) ) {

	/**
	 * Output the product title.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_template_custom_attr() {
		wc_get_template( 'single-product/custom-attr.php' );
	}
}

if ( ! function_exists( 'woocommerce_template_single_title' ) ) {

	/**
	 * Output the product title.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_template_single_title() {
		wc_get_template( 'single-product/title.php' );
	}
}



if ( ! function_exists( 'woocommerce_template_loop_product_attr' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_attr() {
		$productlenght = get_field('productlenght');
		$productwidth = get_field('productwidth');
		$productheight = get_field('productheight');
		$productinnerlength = get_field('productinnerlength');
		$productinnerwidth = get_field('productinnerwidth');
		$productinnerheight = get_field('productinnerheight');
		$productweight = get_field('productweight');
		$productvolumn = get_field('productvolumn');
		$productmodel = get_field('productmodel');
		$mmtoinch = 0.03937;
		$kgtolbs = 2.20462262;
		$ltogal = 0.26417;
		
		if (!$productmodel) {
		    $productmodel = "N/A";
		}
		if (!$productlenght) {
		    $productlenght = 0;
		}
		if (!$productinnerlength) {
		    $productinnerlength = 0;
		}
		if (!$productinnerwidth) {
		    $productinnerwidth = 0;
		}
		if (!$productinnerheight) {
		    $productinnerheight = 0;
		}
		if (!$productweight) {
		    $productweight = 0;
		}
		if (!$productvolumn) {
		    $productvolumn = 0;
		}

		

		echo '	<div class="product-right"> 
					<div class="row no-gutters"> 
						<div class="product-name">
							<div class="col-sm-12">
								<h2 class="product-title pl-1">'. get_the_title() .'</h2>
								<span class="btn btn-danger pull-right product-cat-inquiry">Inquiry</span>
								<span class="btn btn-info pull-right product-model mr-1">'. $productmodel .'</span>
							</div>
						</div>
						<div class="product-attributes">
							<div class="col-sm-3 col-xs-6 br-2-white external-dimension">
								<div class="table-head bb-2-white">External Dimensions</div>
								<div class="product-val-mm"><span class="value">' .$productlenght .'X'. $productwidth  .'X'. $productheight . '</span> <span class="pull-right">mm</span></div>
								<div class="product-val-inch"><span class="value"> '. round($productlenght*$mmtoinch,2) .'X'.round($productwidth*$mmtoinch,2) .'X'. round($productheight*$mmtoinch,2) .'</span> <span class="pull-right">in</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 br-2-white internal-dimension hidden-xs">
								<div class="table-head bb-2-white">Internal Dimensions</div>
								<div class="product-val-mm"><span class="value">'. $productinnerlength .'X'. $productinnerwidth .'X'. $productinnerheight .'</span> <span class="pull-right">mm</span></div>
								<div class="product-val-inch"><span class="value">'. round($productinnerlength*$mmtoinch,2) .'X'. round($productinnerwidth*$mmtoinch,2) .'X'. round($productinnerheight*$mmtoinch,2) .'</span> <span class="pull-right">in</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 br-2-white weight hidden-xs">
								<div class="table-head bb-2-white">Weight</div>
								<div class="product-val-mm"><span class="value">'. $productweight . '</span> <span class="pull-right">kg</span></div>
								<div class="product-val-inch"><span class="value">'. round($productweight*$kgtolbs,2) .'</span> <span class="pull-right">lbs</span></div>
							</div>
							<div class="col-sm-3 col-xs-6 volumn">
								<div class="table-head bb-2-white">Volume</div>
								<div class="product-val-mm"><span class="value">'. $productvolumn . '</span> <span class="pull-right">Liters</span></div>
								<div class="product-val-inch"><span class="value">'. round($productvolumn*$ltogal,2) .'</span> <span class="pull-right">Us gallon</span></div>
							</div>
						</div>
					</div>
				</div>';
	}
}

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open_custom', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close_custom', 5 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail_custom', 10 );


if ( ! function_exists( 'woocommerce_template_loop_product_link_open_custom' ) ) {

	/**
	 * Insert the opening anchor tag for products in the loop.
	 *
	 * @subpackage	Archives
	 */
	function woocommerce_template_loop_product_link_open_custom() {
		echo '<a href="' . get_the_permalink() . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link"><div class="product-wrap">';
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_link_close_custom' ) ) {

	/**
	 * Insert the opening anchor tag for products in the loop.
	 *
	 * @subpackage	Archives
	 */
	function woocommerce_template_loop_product_link_close_custom() {
		echo '</div></a>';
	}
}


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail_custom' ) ) {

	/**
	 * Get the product thumbnail for the loop.
	 *
	 * @subpackage	Loop
	 */
	function woocommerce_template_loop_product_thumbnail_custom() {
		echo '<div class="product-img-wrap br-2-white">'. woocommerce_get_product_thumbnail() .'</div>';
	}
}