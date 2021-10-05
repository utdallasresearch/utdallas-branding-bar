<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://github.com/utdallasresearch/utdallas-branding-bar
 * @package           UTDallas_Branding_Bar
 *
 * @wordpress-plugin
 * Plugin Name:       UT Dallas Branding Bar
 * Plugin URI:        https://github.com/utdallasresearch/utdallas-branding-bar
 * Description:       Prepend the UT Dallas Branding Bar to a site.
 * Version:           1.1.1
 * Author:            UT Dallas Research Information Systems
 * Author URI:        https://research.utdallas.edu
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       utdallas-branding-bar
 * Domain Path:       /languages
 */

define('UTDallasBrandingBar\VERSION', '1.1.1');
define('UTDallasBrandingBar\PLUGIN_PATH', plugin_dir_path(__FILE__));
define('UTDallasBrandingBar\PLUGIN_URL', plugin_dir_url(__FILE__));

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

//////////////////////////////
// Autoload plugin classes  //
//////////////////////////////

spl_autoload_register(function ($class_name) {
    $namespace = 'UTDallasBrandingBar\\';
    $namespace_length = strlen($namespace);

    // Only load UTDallasBrandingBar classes
    if (strncmp($namespace, $class_name, $namespace_length) !== 0) {
        return;
    }

    $relative_class = substr($class_name, $namespace_length);
    $filename = plugin_dir_path(__FILE__) . 'src/' . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($filename)) {
        include_once $filename;
    }
});

(new \UTDallasBrandingBar\BrandingBarPlugin())->load();
