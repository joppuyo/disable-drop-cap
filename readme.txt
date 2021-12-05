# Disable Drop Cap
Requires at least: 5.5
Tested up to: 5.8
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin to disable drop cap in Gutenberg editor paragraph block

## Description

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

## Changelog

### 1.4.0 (2021-12-05)
* Feature: Add a notice to encourage people to update to the new version in the plugin directory

### 1.3.1 (2021-09-20)
* Fix: Fix deprecation error in WordPress 5.8

### 1.3.0 (2021-07-24)
* Feature: WordPress 5.8 support (thanks @adriantoll)

### 1.2.1 (2021-03-12)
* Fix: Bump tested up to 5.7
* Fix: Re-organize plugin code to be cleaner
* Fix: Change plugin name to "Disable Drop Cap" everywhere. "Remove Drop Cap" is still used as the plugin slug to ensure backwards compatibility

### 1.2.0 (2021-03-11)
* Feature: WordPress 5.7 support
* Fix: Regression in WordPress 5.5

### 1.1.0 (2020-12-16)
* Change: Use server side feature registration to disable dropCap instead of JavaScript
* Fix: WordPress 5.6 support

### 1.0.0 (2020-09-20)
* Initial release
