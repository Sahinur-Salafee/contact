<?php

class CPT
{

    /**
     * Constructor for the contact class
     * 
     * @param void
     */
    public function __construct()
    {
        add_action('init', [$this, 'register_custom_cpt']);
        add_action('add_meta_boxes', [$this, 'add_contact_meta_boxes']);
        add_action('save_post', [$this, 'save_contact_meta']);
    }

    /**
     * Register the custom post type
     * 
     * @param void
     * @return void
     */
    public function register_custom_cpt()
    {
        $labels = [
            'name' => __('Contacts', 'contact'),
            'singular_name' => __('Contact', 'contact'),
            'menu_name' => __('Contact List', 'contact'),
            'name_admin_bar' => __('Contact List', 'contact'),
            'add_new' => __('Add New', 'contact'),
            'add_new_item' => __('Add New Contact', 'contact'),
            'new_item' => __('New Contact', 'contact'),
            'edit_item' => __('Edit Contact', 'contact'),
            'view_item' => __('View Contact', 'contact'),
            'all_items' => __('All Contacts', 'contact'),
            'search_items' => __('Search Contacts', 'contact'),
            'parent_item_colon' => __('Parent Contacts:', 'contact'),
            'not_found' => __('No Contacts found.', 'contact'),
            'not_found_in_trash' => __('No Contacts found in Trash.', 'contact')
        ];

        $args = [
            'labels' => $labels,
            'description' => __('Description.', 'contact'),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => 'contacts',
            'query_var' => true,
            'rewrite' => ['slug' => 'Contact'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 5,
            'supports' => ['title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'],
            'menu_icon' => 'dashicons-buddicons-pm'

        ];

        register_post_type('Contact', $args);
    }

    /**
     * Add the contact meta boxes
     * 
     * @param void
     * @return void
     */
    public function add_contact_meta_boxes()
    {
        add_meta_box(
            'contact_meta_box',
            __('Contact Details', 'contact'),
            [$this, 'contact_meta_box'],
            'Contact',
            'normal',
            'default'
        );
    }

    /**
     * Display the contact meta box
     * 
     * @param object $post
     * @return void
     */
    public function contact_meta_box($post)
    {
        $name = get_post_meta($post->ID, 'contact_name', true);
        $email = get_post_meta($post->ID, 'contact_email', true);
        $phone = get_post_meta($post->ID, 'contact_phone', true);
        $address = get_post_meta($post->ID, 'contact_address', true);
        $image = get_post_meta($post->ID, 'contact_image', true);
?>
        <p>
            <label for="contact_name"><?php _e('Name:', 'contact'); ?></label>
            <input type="text" name="contact_name" id="contact_name" value="<?php echo esc_attr($name); ?>" />
        </p>
        <p>
            <label for="contact_email"><?php _e('Email:', 'contact'); ?></label>
            <input type="email" name="contact_email" id="contact_email" value="<?php echo esc_attr($email); ?>" />
        </p>
        <p>
            <label for="contact_phone"><?php _e('Phone:', 'contact'); ?></label>
            <input type="text" name="contact_phone" id="contact_phone" value="<?php echo esc_attr($phone); ?>" />
        </p>
        <p>
            <label for="contact_address"><?php _e('Address:', 'contact'); ?></label>
            <input type="text" name="contact_address" id="contact_address" value="<?php echo esc_attr($address); ?>" />
        </p>
        <p>
            <label for="contact_image"><?php _e('Image URL:', 'contact'); ?></label>
            <input type="text" name="contact_image" id="contact_image" value="<?php echo esc_attr($image); ?>" />
        </p>
<?php
    }

    /**
     * Save the contact meta
     * 
     * @param int $post_id
     * @return void
     */
    public function save_contact_meta($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // If the meta box's are set
        if (array_key_exists('contact_name', $_POST)) {
            update_post_meta(
                $post_id,
                'contact_name',
                $_POST['contact_name']
            );
        }

        if (array_key_exists('contact_email', $_POST)) {
            update_post_meta(
                $post_id,
                'contact_email',
                $_POST['contact_email']
            );
        }

        if (array_key_exists('contact_phone', $_POST)) {
            update_post_meta(
                $post_id,
                'contact_phone',
                $_POST['contact_phone']
            );
        }

        if (array_key_exists('contact_address', $_POST)) {
            update_post_meta(
                $post_id,
                'contact_address',
                $_POST['contact_address']
            );
        }

        if (array_key_exists('contact_image', $_POST)) {
            update_post_meta(
                $post_id,
                'contact_image',
                $_POST['contact_image']
            );
        }
    }
}
