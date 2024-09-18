<?php

/**
 * Register admin menu class
 */
class Menu
{

    /**
     * Contructor for the Menu class
     * @param void
     */
    public function __construct()
    {
        add_action('admin_menu', [$this, 'register_admin_menu']);
    }

    /**
     * Register the admin menu
     * @param void
     * @return void
     */
    public function register_admin_menu()
    {
        add_menu_page(
            __('Contacts', 'contact'),
            __('Contacts', 'contact'),
            'manage_options',
            'contacts',
            [$this, 'contact_page'],
            'dashicons-buddicons-pm',
            2
        );

        add_submenu_page(
            'contacts',
            __('Contact Lists', 'contact'),
            __('Contact Lists', 'contact'),
            'manage_options',
            'contact-list',
            [$this, 'contact_lists']
        );
    }

    /**
     * Display the contact page
     * @param void
     * @return void
     */
    public function contact_page()
    {
        include_once __DIR__ . '/templates/contact-lists.php';
    }

    /**
     * Display the contact lists page
     * @param void
     * @return void
     */

    function contact_lists()
    {
        echo '<h1>Contact Lists Page</h1>';
    }
}
