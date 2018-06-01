<?php
/**
 * Plugin Name: Select Primary Category
 * Description: Choose a Primary Category for your posts.
 * Text Domain: select-primary-category
 * Plugin URI:
 * Version: 1.0
 * Author: Oscar Sańchez
 * Author URI: http://oscarssanchez.com
 * License: GPL2
 *
 * Copyright (c) 2018 Oscar Sánchez (https://oscarssanchez.com/)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package SelectPrimaryCategory;
 */

namespace SelectPrimaryCategory;

/** Prevent direct access to the file */
defined( 'ABSPATH' ) or die( 'Access denied' );

require_once dirname( __FILE__ ) . '/php/class-plugin.php';
$plugin = Plugin::get_instance();
$plugin->init();
