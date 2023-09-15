<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

if ( ! $post->post_excerpt ) {
	return;
}


?>
<div class="woocommerce-product-details__short-description 1">
	<div class="sale-2" style="font-size: 1.25em; color: #77a464;margin-bottom: 20px;">参考処方価格  : <?php $sale_2 = get_field('sale_2');if($sale_2){ ?>
<?php echo number_format($sale_2); ?>
<?php } ?>  円（税抜）</div>
    <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ); ?>
</div>
