<?php
/**
 * The Primary Category Taxonomy class.
 *
 * @package SelectPrimaryCategory
 */

namespace SelectPrimaryCategory;

/**
 * Class Primary_Category
 *
 * @package SelectPrimaryCategory
 */
class Primary_Category {
	/**
	 * Initializes the Primary_Category methods.
	 */
	public function init() {
		add_action( 'init', array( $this, 'register_primary_category_taxonomy' ) );
	}

	/**
	 * Registers a new 'primary_category' taxonomy.
	 */
	public function register_primary_category_taxonomy() {
		register_taxonomy(
			'primary_category',
			null,
			array(
				'label'   => __( 'Primary Category', 'select-primary-category' ),
				'rewrite' => array( 'slug' => 'primary' ),
			)
		);
	}
}
