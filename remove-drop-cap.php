<?php

/*
 * Plugin name: Disable Drop Cap
 * Description: Plugin to disable drop cap in Gutenberg editor paragraph block
 * Plugin URI: https://github.com/joppuyo/remove-drop-cap
 * Version: 1.2.0
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
        global $wp_version;

        if (version_compare($wp_version, '5.7', '>=')) {
            $editor_settings['__experimentalFeatures']['defaults']['typography']['dropCap'] = false;
        }

        if (
            version_compare($wp_version, '5.6', '>=') &&
            version_compare($wp_version, '5.7', '<')
        ) {
            $editor_settings['__experimentalFeatures']['global']['typography']['dropCap'] = false;
        }

        return $editor_settings;
    }
);


add_action('admin_footer', function () {
    global $wp_version;

    if (
        version_compare($wp_version, '5.5', '>=') &&
        version_compare($wp_version, '5.6', '<'))
    {

        echo <<<HTML
<script>
document.addEventListener("DOMContentLoaded", function () {
  var removeDropCap = function(settings, name) {
      
      console.log(settings)
      
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
});