<?php

/*
 * Plugin name: Disable Drop Cap
 */

add_action( 'admin_footer', function() {
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
    removeDropCap
  );
});
</script>
HTML;
});