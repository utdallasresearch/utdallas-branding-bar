<?php

namespace UTDallasBrandingBar;

/**
 * UT Design Theme Customizer
 *
 * @package UTDesign Theme
 */
class BrandingBarCustomizer
{
    /** @var string The filesystem path of the plugin */
    protected $plugin_path = PLUGIN_PATH;

    /** @var array checkbox toggles to register */
    public $toggles = [
        'monogram_wordmark' => 'Monogram Wordmark',
        'show_links' => 'Show right side link/search container',
        'apply_link' => 'Apply link',
        'give_link' => 'Give link',
        'galaxy_link' => 'Galaxy link',
        'elearning_link' => 'eLearning link',
        'directory_link' => 'Directory link',
        'maps_link' => 'Maps link',
        'search_box' => 'Search UTD box',
        'site_search_box' => 'Search this site box',
        'gradient' => 'Background color gradient',
    ];

    public $toggle_defaults = [
        'monogram_wordmark' => false,
        'show_links' => true,
        'apply_link' => true,
        'give_link' => true,
        'galaxy_link' => true,
        'elearning_link' => true,
        'directory_link' => true,
        'maps_link' => true,
        'search_box' => true,
        'site_search_box' => false,
        'gradient' => true,
    ];

    /**
     * The default max width of the barnding bar.
     * 
     * If you change it here, also change it in the CSS.
     *
     * @var int
     */
    public $default_max_width = 1170;

    /**
     * Define Theme Customizizations.
     *
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function defineCustomizations($wp_customize)
    {
        $wp_customize->add_section('utdallas_branding_bar_section', array(
            'priority' => 65, // after default header
            'theme_supports' => '',
            'capability' => 'edit_theme_options',
            'title' => __('UT Dallas Branding Bar', 'utdallas-branding-bar'),
            'description' => __('Customize the UT Dallas Top Branding Bar. These settings are stored on a per-theme basis, i.e. you can have different branding bar settings for different site themes. In addition to the standard links below, you can add your own custom links by creating a menu and assigning it to the branding bar location.', 'utdallas-branding-bar'),
        ));

        foreach ($this->toggles as $toggle_key => $label) {
            $wp_customize->add_setting("utd_branding_bar_{$toggle_key}", [
                'capability' => 'edit_theme_options',
                'default' => $this->toggle_defaults[$toggle_key] ?? true,
                'sanitize_callback' => [$this, 'sanitizeBoolean'],
            ]);
            $wp_customize->add_control("utd_branding_bar_{$toggle_key}_checkbox", [
                'type' => 'checkbox',
                'settings'  => "utd_branding_bar_{$toggle_key}",
                'section'   => 'utdallas_branding_bar_section',
                'label' => __($label, 'utdallas-branding-bar'),
            ]);
        }

        $wp_customize->add_setting('utd_branding_bar_max_width', [
            'capability' => 'edit_theme_options',
            'default' => $this->default_max_width,
            'sanitize_callback' => [$this, 'sanitizeMaxWidth'],
        ]);
        $wp_customize->add_control('utd_branding_bar_max_width_input', [
            'type' => 'number',
            'input_attrs' => [
                'min' => $this->default_max_width,
                'step' => 1,
            ],
            'settings'  => 'utd_branding_bar_max_width',
            'section'   => 'utdallas_branding_bar_section',
            'label' => __("The max width (in px) of the branding bar. Must be at least {$this->default_max_width}.", 'utdallas-branding-bar'),
            'description' => __("Adjust this to match the site theme. Must be at least {$this->default_max_width}.", 'utdallas-branding-bar'),
        ]);

    }

    /**
     * Sanitize an input to boolean
     *
     * @param mixed $input
     * @return bool
     */
    public function sanitizeBoolean($input = false)
    {
        return filter_var($input, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Sanitize the max_width setting.
     *
     * @param mixed $input
     * @return int
     */
    public function sanitizeMaxWidth($input = 0)
    {
        $filtered = filter_var($input, FILTER_VALIDATE_INT);

        // The setting can't be smaller than the default
        if (!is_int($filtered) || ($filtered < $this->default_max_width)) {
            return $this->default_max_width;
        }

        return $filtered;
    }

    public function registerScripts($css_handle)
    {
        $max_width_setting = get_theme_mod('utd_branding_bar_max_width', $this->default_max_width);

        if ($max_width_setting != $this->default_max_width) {
            wp_add_inline_style($css_handle, ".topbar .wrapper { max-width: ${max_width_setting}px; }");
        }
    }

}
