# Disable Drop Cap

| :warning: | Important notice: This repository is no longer updated. I've released version 2.0 of this plugin, which is [available in the WordPress.org plugin repository](https://wordpress.org/plugins/disable-drop-cap/). Since I've changed the plugin slug from remove-drop-cap to disable-drop-cap, you will need to update to the new version manually. Source code for the new version is available [in a separate GitHub repository.](https://github.com/joppuyo/disable-drop-cap-v2) |
|---|:---|

Plugin to disable drop cap in Gutenberg editor paragraph block.

### Note for WordPress 5.8

With WordPress 5.8, you can use the new `theme.json` feature to disable drop caps in your theme. Add a `theme.json` with the following content in the root of your theme.

```json
{
    "version": 1,
    "settings": {
        "typography": {
            "dropCap": false
        }
    }
}
```

This plugin does continue working in WordPress 5.8 but be aware of this alternative solution.

## Requirements

* WordPress 5.5, 5.6, 5.7 or 5.8
* PHP 7.0 or later
