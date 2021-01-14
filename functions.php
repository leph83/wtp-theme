<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// SETTINGS
require_once('inc/setting_setup.php');
require_once('inc/setting_customizer.php');
require_once('inc/setting_widgets.php');

require_once('inc/setting_block-styles.php');
require_once('inc/setting_load-css.php');
require_once('inc/setting_load-js.php');

require_once('inc/setting_color.php');
require_once('inc/setting_fontsize.php');
require_once('inc/setting_layout_width.php');


// ADD
require_once('inc/add_nav-classes.php');
require_once('inc/add_pagination-markup.php');
// require_once('inc/add_gutenberg-admin-styles.php');


// ENABLE
require_once('inc/enable/enable_increase-security.php');
require_once('inc/enable/enable_css_defer.php');

// DISABLES
require_once('inc/disables.php');