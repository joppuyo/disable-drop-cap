<?php

/*
 * Plugin name: Disable Drop Cap
 * Description: Plugin to disable drop cap in Gutenberg editor paragraph block
 * Plugin URI: https://github.com/joppuyo/remove-drop-cap
 * Version: 1.3.1
 * Author: Johannes Siipola
 * Author URI: https://siipo.la
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

require __DIR__ . '/vendor/autoload.php';

$plugin_update_checker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/joppuyo/disable-drop-cap',
    __FILE__,
    'remove-drop-cap'
);

add_action('init', 'disable_drop_cap_init');

function disable_drop_cap_init() {
    global $wp_version;

    if (version_compare($wp_version, '5.8', '>=')) {
        add_filter('block_editor_settings_all', 'disable_drop_cap_editor_settings_5_8');
    }

    if (
        version_compare($wp_version, '5.7', '>=') &&
        version_compare($wp_version, '5.8', '<')
    ) {
        add_filter('block_editor_settings', 'disable_drop_cap_editor_settings_5_7');
    }

    if (
        version_compare($wp_version, '5.6', '>=') &&
        version_compare($wp_version, '5.7', '<')
    ) {
        add_filter('block_editor_settings', 'disable_drop_cap_editor_settings_5_6');
    }

    if (
        version_compare($wp_version, '5.5', '>=') &&
        version_compare($wp_version, '5.6', '<'))
    {
        add_action('admin_footer', 'disable_drop_cap_admin_footer');
    }
}

function disable_drop_cap_editor_settings_5_8(array $editor_settings): array {
    $editor_settings['__experimentalFeatures']['typography']['dropCap'] = false;
    return $editor_settings;
}

function disable_drop_cap_editor_settings_5_7(array $editor_settings): array {
    $editor_settings['__experimentalFeatures']['defaults']['typography']['dropCap'] = false;
    return $editor_settings;
}

function disable_drop_cap_editor_settings_5_6(array $editor_settings): array {
    $editor_settings['__experimentalFeatures']['global']['typography']['dropCap'] = false;
    return $editor_settings;
}

function disable_drop_cap_admin_footer() {
        echo <<<HTML
<script>
document.addEventListener("DOMContentLoaded", function () {
  var removeDropCap = function(settings, name) {
      
    if (name !== "core/paragraph") {
      return settings;
    }
    var newSettings = Object.assign({}, settings);
    if (
      newSettings.supports &&
      newSettings.supports.__experimentalFeatures &&
      newSettings.supports.__experimentalFeatures.typography &&
      newSettings.supports.__experimentalFeatures.typography.dropCap
    ) {
      newSettings.supports.__experimentalFeatures.typography.dropCap = false;
    }
    return newSettings;
  };
  wp.hooks.addFilter(
    "blocks.registerBlockType",
    "sc/gb/remove-drop-cap",
    removeDropCap,
  );
});
</script>
HTML;
}
