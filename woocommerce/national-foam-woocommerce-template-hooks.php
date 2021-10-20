<?php
/**
 * national_foam WooCommerce hooks
 *
 * @package national_foam
 */

/**
 * Header
 * @see national_foam_header_cart()
 */
add_action( 'national_foam_header', 'national_foam_header_cart', 40 );


/**
 * Cart fragment
 *
 * @see national_foam_cart_link_fragment()
 */
if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
	add_filter( 'woocommerce_add_to_cart_fragments', 'national_foam_cart_link_fragment' );
} else {
	add_filter( 'add_to_cart_fragments', 'national_foam_cart_link_fragment' );
}
