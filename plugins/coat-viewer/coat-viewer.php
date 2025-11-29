<?php
/**
 * Plugin Name: Spoiled Paws – Coat Viewer
 * Description: 3-view virtual coat try-on for dog silhouettes. Integrates as a block.
 * Version: 1.0.0
 * Author: You
 */

if (!defined('ABSPATH')) exit;

define('SP_CV_DIR', plugin_dir_path(__FILE__));
define('SP_CV_URL', plugin_dir_url(__FILE__));
define('SP_CV_SVG_DIR', SP_CV_DIR . 'assets/images/silhouettes/svg/');
define('SP_CV_SVG_URL', SP_CV_URL . 'assets/images/silhouettes/svg/');
define('SP_CV_MANIFEST', SP_CV_SVG_DIR . 'manifest.json');
define('SP_CV_SVG_DIR', SP_CV_DIR . 'assets/images/silhouettes/svg/');
define('SP_CV_SVG_URL', SP_CV_URL . 'assets/images/silhouettes/svg/');
define('SP_CV_MANIFEST', SP_CV_SVG_DIR . 'manifest.json');

require_once SP_CV_DIR . 'inc/cpt.php';
require_once SP_CV_DIR . 'inc/meta.php';
require_once SP_CV_DIR . 'inc/rest.php';
require_once SP_CV_DIR . 'inc/assets.php';
require_once SP_CV_DIR . 'inc/admin.php';

// Register block
function sp_cv_register_blocks() {
    register_block_type(SP_CV_DIR . 'blocks/coat-viewer-block');
}
add_action('init', 'sp_cv_register_blocks');
