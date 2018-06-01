<?php
/**
 * The Custom category meta box class.
 *
 * @package SelectPrimaryCategory
 */

namespace SelectPrimaryCategory;

/**
 * Class Category_Meta_Box
 *
 * @package SelectPrimaryCategory
 */
class Category_Meta_Box {
	/**
	 * The nonce name.
	 *
	 * @var string
	 */
	const NONCE_NAME = 'primary-cat-nonce';

	/**
	 * The nonce action.
	 *
	 * @var string
	 */
	const NONCE_ACTION = 'primary-cat-update';

	/**
	 * Initiallizes The category meta box rendering and saving functionality.
	 */
	public function init() {
		add_action( 'post_submitbox_misc_actions', array( $this, 'render_primary_category_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_primary_category' ) );
	}

	/**
	 * Render the Primary Category Meta Box.
	 *
	 * Uses logic from AMP for WordPress plugin: AMP_Post_Meta_Box::render_status().
	 *
	 * @param object $post post.
	 */
	public function render_primary_category_meta_box( $post ) {
		$verify = (
			isset( $post->ID )
			&&
			is_post_type_viewable( $post->post_type )
			&&
			current_user_can( 'edit_post', $post->ID )
		);

		if ( true !== $verify ) {
			return;
		}

		$primary_cat = get_the_terms( get_the_ID(), 'primary_category' );
		include_once dirname( __DIR__ ) . '/templates/admin/primary-category-meta-box.php';
	}

	/**
	 * Saves the data sent through the Primary category Meta Box to the primary_category taxonomy.
	 *
	 * @param int $post_id The current post ID.
	 */
	public function save_primary_category( $post_id ) {
		$verify = (
			isset( $_POST['primary_category_name'], $_POST[ self::NONCE_NAME ], $_POST[ self::NONCE_ACTION ] )
			&&
			wp_verify_nonce( sanitize_key( wp_unslash( $_POST[ self::NONCE_NAME ], self::NONCE_ACTION ) ) )
			&&
			current_user_can( 'edit_post', $post_id )
		);

		if ( true === $verify ) {
			wp_set_post_terms(
				$post_id,
				sanitize_text_field( wp_unslash( $_POST['primary_category_name'] ) ),
				'primary_category'
			);
		}
	}
}
