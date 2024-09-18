<?php

/*
 * Plugin Name:       Contacts
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Salafee
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       contact
 * Domain Path:       /languages
 */

if (! defined('ABSPATH')) {
    exit;
}

class Contacts
{

    /**
     * Constructor for the Contact class
     * 
     * @param void
     */
    public function __construct()
    {
        $this->include_files();
        $this->init_classes();
    }

    /**
     * Return an instance of this class.
     * 
     * @param void
     * @return object A single instance of this class.
     */
    public static function instance()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new Contacts();
        }

        return $instance;
    }

    public function include_files()
    {
        require_once __DIR__ . '/menu.php';
        require_once __DIR__ . '/cpt.php';
    }

    /**
     * Initialize the plugin classes
     * 
     * @param void
     * @return void
     */
    public function init_classes()
    {
        $menu = new Menu();
        $cpt = new CPT();
    }
}

/**
 * Initialize the Plugin
 *
 * @return void
 */
function contacts()
{
    return Contacts::instance();
}

contacts();
