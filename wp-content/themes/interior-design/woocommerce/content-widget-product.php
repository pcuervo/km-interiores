<?php 
/**
 * @package 	WordPress
 * @subpackage 	Interior Design
 * @version 	1.0.0
 */


global $product;

?>
<li>
	<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
		<?php echo $product->get_image(); ?>
		<span class="product-title"><?php echo $product->get_title(); ?></span>
	</a>
	<?php 
	cmsmasters_woocommerce_rating('cmsms_theme_icon_star_empty', 'cmsms_theme_icon_star_full');
	
	echo $product->get_price_html(); 
	?>
</li>