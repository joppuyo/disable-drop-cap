# Disable Drop Cap

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

## Requirements

* WordPress 5.5, 5.6 or 5.7
* PHP 7.0 or later
