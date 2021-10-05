# UT Dallas Branding Bar

A WordPress plugin to add the UT Dallas branding bar to the top of sites.

## Installation

Manual: Put the plugin in the site's plugin folder, and activate.

Composer: Add the following to the relevant sections in your `composer.json` file, replacing "dev-master" with the desired specific version if needed. Then run `composer update`:

```JSON
{
    "repositories": [
        {
        "url": "git@github.com:utdallasresearch/utdallas-branding-bar.git",
        "type": "github"
        }
    ],
    "require": {
        "utdallasresearch/updraftplus": "dev-master"
    }
}
```

## Customizer settings

These settings are stored as theme_mods, so they are set on a per-theme basis.

- Checkboxes for showing each of the links (default: show all)
- Checkboxes for showing the UTD search or site search boxes
- Styling options
- Max width of the branding bar: adjust to match the theme (default: 1170px)

## Custom links

To add your own custom links to the branding bar, create a menu and assign it to the branding bar location.

## Contributing

Please submit a Pull Request for review.