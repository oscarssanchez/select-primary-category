<?php
/**
 * Current Primary category the submit meta box.
 *
 * @package SelectPrimaryCategory
 */

namespace SelectPrimaryCategory;

// Check referrer.
if ( ! ( $this instanceof Category_Meta_Box ) ) {
	return;
}

/**
 * Inherited template vars.
 *
 * @var object  $primary_cat The Primary Category taxonomy object.
 */
?>
<div class="misc-pub-section">
	<span class="dashicons dashicons-networking"></span><?php esc_html_e( ' Primary Category: ', 'select-primary-category' ); ?>
	<strong>
		<?php
		if ( isset( $primary_cat[0]->name ) ) {
			echo esc_html( $primary_cat[0]->name );
		} else {
			esc_html_e( 'Not set', 'select-primary-category' );
		}
		?>
	</strong>
	<select id="primary_category_name" name="primary_category_name">';
		<?php
		echo '<option>--' . esc_html__( 'Select Category', 'select-primary-category' ) . '--</option>>';
		foreach ( get_categories() as $category ) {
			echo '<option value="' . esc_attr( $category->name ) . '" ' . selected( $primary_cat[0]->name, $category->name ) . '>' . esc_html( $category->name ) . '</option>';
		}
		?>
	</select>
	<?php wp_nonce_field( self::NONCE_ACTION, self::NONCE_NAME ); ?>
</div>
