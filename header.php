<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
<meta charset="<?php bloginfo( 'charset' );?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>


<body <?php body_class();?>>
<?php wp_body_open();?>
	<header>
		<div class="header-top hidden md:block">
			<?php dynamic_sidebar( 'header-top' ) ?>
		</div>
		<div class="mobile-menu"></div>
		<div class="myContainer">
			<div class="header-middle pt-16 md:pt-0 sm:flex justify-between mb-4">
				<div class="logo">
					<?php the_custom_logo();?>
				</div>
				<div class="middle-right">
					<div class="middle-nav">
						<ul>
							<li class="wishlist-sm">
								<a href="#">
									<span class="middle-nav-icon">
										<i class="uil uil-heart"></i>
									</span>
									<span>Wishlist</span>
								</a>
							</li>
							<li>
								<?php if ( is_user_logged_in() ) {
									?>
									<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','national-foam'); ?>">
										<span class="middle-nav-icon"><i class="uil uil-user"></i></span>
										<span><?php _e('My Account','national-foam'); ?></span>
									</a>
									<?php }
									else {
										?>
										<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Sign In','national-foam'); ?>">
											<span class="middle-nav-icon"><i class="uil uil-signin"></i></span>
											<span><?php _e('Sign In','national-foam'); ?></span>
										</a>
									<?php
								} ?>
							</li>
							<li>
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','national-foam'); ?>">
									<span class="middle-nav-icon">
										<i class="uil uil-signout"></i>
									</span>
									<span>Sign Up</span>
								</a>
							</li>
						</ul>
					</div>
					<div class="search-bar">
						<?php //the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
						<?php get_product_search_form();?>
						<div class="shopping-cart">
							<?php do_action('national_foam_header', 'national-foam');?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="menubar">
			<div class="myContainer">
				<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'header-menu',
							'menu_id'         => '',
							'menu_class'      => '',
							'container'       => 'nav',
							'container_id'    => 'mobile-menu',
							'container_class' => 'menu-header-menu-container',
						)
					);
                ?>
			</div>
		</div>
	</header>
	<div>

	</div>
	<?php
		$sidebar_class = "";
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() || is_product_category() || is_product_tag() ) {
				if ( is_active_sidebar('shop-sidebar') ) {
					$sidebar_class = "left-sidebar";
				}
			}
			else if(is_product() || is_cart() || is_checkout() || is_account_page()) {
				if ( is_active_sidebar('shop-sidebar') ) {
					$sidebar_class = "";
				}
			}
		}

		$myContainer = "";
		if (is_front_page() || is_home()) {
			$myContainer = "";
			$sidebar_class = "";
		}
		else {
			$myContainer = "myContainer";
		}

	?>
	<div class="<?php echo esc_attr($myContainer);?> <?php echo esc_attr( $sidebar_class );?>">