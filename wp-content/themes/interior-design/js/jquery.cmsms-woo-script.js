/**
 * @package 	WordPress
 * @subpackage 	Interior Design
 * @version		1.0.0
 * 
 * Woocommerce Scripts
 * Created by CMSMasters
 * 
 */


"use strict";

jQuery(document).ready(function () { 
	setTimeout(function () { 
		if ( 
			jQuery('.cmsms_dynamic_cart .widget_shopping_cart_content > ul li').length != 0 && 
			jQuery('.cmsms_dynamic_cart .widget_shopping_cart_content > ul li').hasClass('empty') != true 
		) {
			jQuery('.cmsms_dynamic_cart').css( { 
				opacity : 		'1', 
				visibility : 	'visible' 
			} );
		}
	}, 2000);
	
	
	cmsms_ajax_add_to_cart();
	
	
	jQuery('.cmsms_add_to_cart_button').on('click', function () { 
		jQuery('.cmsms_dynamic_cart').css( { 
			opacity : 		'1', 
			visibility : 	'visible' 
		} );
	} );
	
	
	jQuery('body').on('added_to_cart', update_dynamic_cart);
} );


var cmsms_added_product = {};


function cmsms_ajax_add_to_cart() {
	jQuery('.cmsms_add_to_cart_button').on('click', function() {	
		var productInfo = jQuery(this).parents('.product_inner'), 
			productAmount = productInfo.find('.price > .amount, .price > ins > .amount').text(), 
			addedToCart = jQuery(this).parents('.cmsms_add_to_cart_wrap').find('.added_to_cart'), 
			product = {};
		
		
		product.name = productInfo.find('.cmsms_product_title a').text();
		
		product.price = productAmount.replace(cmsms_woo_script.currency_symbol, '');
		
		product.image = productInfo.find('figure img');
		
		
		addedToCart.addClass('cmsms_to_show');
		
		
		if (product.image.length) {
			/* Dynamic Cart Update Img Src */
			var str = product.image.get(0).src, 
				ext = /(\..{3,4})$/i.exec(str), 
				extLength = ext[1].length, 
				url = str.slice(0, -extLength), 
				newURL = /(-\d{2,}x\d{2,})$/i.exec(url), 
				newSize = '-' + cmsms_woo_script.thumbnail_image_width + 'x' + cmsms_woo_script.thumbnail_image_height, 
				buildURL = '';
			
			
			if (newURL !== null) {
				buildURL += url.slice(0, -newURL[1].length) + newSize + ext[1];
			} else {
				buildURL += url + newSize + ext[1];
			}
			
			
			product.image = '<img class="cmsms_added_product_info_img" src="' + buildURL + '" />';
		}
		
		
		cmsms_added_product = product;
	} );
}


function update_dynamic_cart(event) { 
	var product = jQuery.extend( { 
		name : 		'', 
		price : 		'', 
		image : 	'' 
	}, cmsms_added_product);
	
	
	if (typeof event != 'undefined') {
		var cart_button = jQuery('.cmsms_dynamic_cart .cmsms_dynamic_cart_button'), 
			count = cart_button.find('.count').text();
			
			cart_button.find('.count').text(Number(count) + 1).fadeOut(200).fadeIn(1000);
			
			jQuery(event.currentTarget).find('a.cmsms_to_show').removeClass('cmsms_to_show').addClass('cmsms_visible');
			
			setTimeout(function () { 
				cart_button.find('.count').addClass('cmsms_added_to_cart');
			}, 200);
			
			setTimeout(function () { 
				cart_button.find('.count').removeClass('cmsms_added_to_cart');
			}, 1000);
			
	}
}


jQuery(document).ready(function() {
	(function ($) {
		$('.touch .product .product_inner figure').on('click', function() { 
			$('*:not(this)').removeClass('cmsms_mobile_hover');
			
			
			$(this).addClass('cmsms_mobile_hover');
		} );
		
		
		$('.cmsms_woo_tabs .description_tab').addClass('current_tab');
		
		$('.cmsms_woo_tabs #tab-description').addClass('active_tab');
	} )(jQuery);
} );

