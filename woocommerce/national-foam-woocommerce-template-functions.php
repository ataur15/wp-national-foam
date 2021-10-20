<?php

/* Minicart area */
if ( ! function_exists( 'national_foam_header_cart' ) ) {
	/**
	 * Display Header Cart
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function national_foam_header_cart() {
		national_foam_cart_link();
		?>
		<div class="minicart">
			<?php //the_widget( 'WC_Widget_Cart', 'title=' ); ?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'national_foam_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments
	 * Ensure cart contents update when products are added to the cart via AJAX
	 *
	 * @param  array $fragments Fragments to refresh via AJAX.
	 * @return array            Fragments to refresh via AJAX
	 */
	function national_foam_cart_link_fragment( $fragments ) {
		global $woocommerce;

		ob_start();
		national_foam_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();
		return $fragments;
	}
}

if ( ! function_exists( 'national_foam_cart_link' ) ) {
	/**
	 * Cart Link
	 * Displayed a link to the cart including the number of items present and the cart total
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function national_foam_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
			<?php /* translators: %d: number of items in cart */ ?>
			<span class="cart-icon"><i class="uil uil-shopping-cart"></i> Cart </span>
			<?php //echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?><span class="count"><?php echo wp_kses_data( sprintf( _n( ' ( %d )', ' ( %d )' , WC()->cart->get_cart_contents_count(), 'national-foam' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
		</a>
		<?php
	}
}
