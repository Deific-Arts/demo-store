<?php
/**
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form class="woocommerce-ordering" method="get">
  <!--
	<select name="orderby" class="orderby" aria-label="<?php // esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
		<?php // foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php // echo esc_attr( $id ); ?>" <?php // selected( $orderby, $id ); ?>><?php // echo esc_html( $name ); ?></option>
		<?php // endforeach; ?>
	</select>
  -->

  <kemet-select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
    <?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<kemet-option label="<?php echo esc_html( $name ); ?>" value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>></kemet-option>
		<?php endforeach; ?>
  </kemet-select>
  <input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
