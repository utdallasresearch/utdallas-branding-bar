<?php

namespace UTDallasBrandingBar;

use UTDallasBrandingBar\BrandingBarCustomizer;

class BrandingBarPlugin
{
    /** @var string The current version of the plugin. */
    protected $version = VERSION;

    /** @var string The url of the assets folder. */
    protected $asset_url = PLUGIN_URL . 'public';

    /** @var string The filesystem path of the plugin */
    protected $plugin_path = PLUGIN_PATH;

    /** @var \UTDallasBrandingBar\BrandingBarCustomizer the customizer instance */
    protected $customizer;

    /**
     * Register the filters and actions with WordPress.
     * 
     * @return void
     */
    public function load()
    {
        // Register the customizer
        $this->customizer = new BrandingBarCustomizer();
        add_action('customize_register', [$this->customizer, 'defineCustomizations']);

        // Register CSS and JS
        add_action('wp_enqueue_scripts', [$this, 'registerScripts']);

        // Show the branding bar
        add_action('wp_footer', [$this, 'show']);

        // Add a class to the <body>
        add_filter('body_class', [$this, 'addBodyClass']);
    }

    /**
     * Register CSS and JS scripts with WordPress
     *
     * @return void
     */
    public function registerScripts()
    {
        /** @var string the handle/name of the main CSS for the plugin */
        $main_css_handle = 'utdallas_branding_bar_plugin_css';

        wp_enqueue_style('font_din_2014', 'https://use.typekit.net/roc5fuc.css', [], $this->version);
        wp_enqueue_style($main_css_handle, $this->asset_url . '/css/utdallas-branding-bar.css', ['font_din_2014'], $this->version);
        wp_enqueue_script('utdallas_branding_bar_plugin_js', $this->asset_url . '/js/utdallas-branding-bar.js', [], $this->version, false);

        $this->customizer->registerScripts($main_css_handle);
    }

    public function show()
    {
        include($this->plugin_path . '/views/branding-bar-show.php');
    }

    public function addBodyClass($classes)
    {
        $classes[] = 'has-utdallas-branding-bar';

        return $classes;
    }

}