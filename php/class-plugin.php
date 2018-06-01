<?php
/**
 * The main plugin class.
 *
 * @package SelectPrimaryCategory;
 */

namespace SelectPrimaryCategory;

/**
 * Instantiates and initializes the plugin classes.
 *
 * @package SelectPrimaryCategory;
 */
class Plugin {
	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0';

	/**
	 * The plugin instance.
	 *
	 * @var object
	 */
	public static $instance;

	/**
	 * Instantiated plugin classes.
	 *
	 * @var object
	 */
	public $components;

	/**
	 * Plugin initializer.
	 */
	public function init() {
		$this->load_files();
		$this->load_classes();
	}

	/**
	 * Initialize the main plugin class.
	 *
	 * @return Plugin
	 */
	public static function get_instance() {
		if ( ! self::$instance instanceof Plugin ) {
			self::$instance = new Plugin();
		}
		return self::$instance;
	}

	/**
	 * Loads and instantiates the plugin classes
	 */
	public function load_classes() {
		$this->components              = new \stdClass();
		$this->components->primary_cat = new Primary_Category();
		$this->components->primary_cat->init();
		$this->components->meta_box = new Category_Meta_Box();
		$this->components->meta_box->init();
	}

	/**
	 * Loads the plugin files.
	 */
	public function load_files() {
		require_once dirname( __FILE__ ) . '/class-category-meta-box.php';
		require_once dirname( __FILE__ ) . '/class-primary-category.php';
	}
}
