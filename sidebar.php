<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package national-foam
 */

if (is_shop() || is_product_category() || is_product() || is_product_tag() ) {
	$nationalFoam_sidebar = ('shop-sidebar');
}
else {
	$nationalFoam_sidebar = ('blog-sidebar');
}

if ( ! is_active_sidebar( $nationalFoam_sidebar ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( $nationalFoam_sidebar ); ?>
</aside><!-- #secondary -->
