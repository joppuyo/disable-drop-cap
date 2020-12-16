<?php

/*
 * Plugin name: Disable Drop Cap
 * Description: Plugin to disable drop cap in Gutenberg editor paragraph block
 * Plugin URI: https://github.com/joppuyo/remove-drop-cap
 * Version: 1.1.0
 * Author: Johannes Siipola
 * Author URI: https://siipo.la
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

require __DIR__ . '/vendor/autoload.php';

$plugin_update_checker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/joppuyo/remove-drop-cap',
    __FILE__,
    'remove-drop-cap'
);

add_filter(
    'block_editor_settings',
    function ($editor_settings) {
        $editor_settings['__experimentalFeatures']['global']['typography']['dropCap'] = false;
        return $editor_settings;
    }
);
