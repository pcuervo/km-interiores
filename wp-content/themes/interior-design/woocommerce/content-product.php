<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.4.0
 * 
 * @cmsms_package 	Interior Design
 * @cmsms_version 	1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

?>
<li <?php post_class(); ?>>
	<div class="product_outer">
	<?php 
		woocommerce_show_product_loop_sale_flash();
		
		$availability = $product->get_availability();

		if (esc_attr($availability['class']) == 'out-of-stock') {
			echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
		}
	?>
		<article class="product_inner">
			<figure class="cmsms_product_img preloader">
				<a>
					<?php 
					if (has_post_thumbnail()) {
						woocommerce_template_loop_product_thumbnail();
					}
					
					
					if ($attachment_ids) {
						$attachment_id = $attachment_ids[0];
						
						$image = wp_get_attachment_image($attachment_id, apply_filters('single_product_small_thumbnail_size', 'shop_catalog'));
						
						echo apply_filters('woocommerce_single_product_image_thumbnail_html', sprintf($image));
					}
					
					
					if (!has_post_thumbnail() && !$attachment_ids) {
						echo '<span class="cmsms_product_placeholder"></span>';
					}
					?>
				</a>
				<div class="cmsms_add_to_cart_wrap">
				<?php 
					cmsmasters_woocommerce_add_to_cart_button();
				?>
				</div>
			</figure>
			<div class="cmsms_product_head">
				<header class="entry-header cmsms_product_header">
					<h5 class="entry-title cmsms_product_title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h5>
				</header>
				<?php
					woocommerce_template_loop_price();
				?>
			</div>
			<div class="cmsms_product_info">
			<?php
				cmsmasters_woocommerce_rating('cmsms_theme_icon_star_empty', 'cmsms_theme_icon_star_full');
				
				echo $product->get_categories(' / ', '<div class="entry-meta cmsms_product_cat">', '</div>');
			?>
			</div>
		</article>
	</div>
</li>