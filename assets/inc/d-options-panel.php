<?php 
/*
*
*	***** Daystatus *****
*
*	Plugin Settings Page
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
class DSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Daystatus Settings', 
            'manage_options', 
            'my-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>My Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  

        add_settings_field(
            'token', // ID
            'Token', // Title 
            array( $this, 'token_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section           
        );      

        // add_settings_field(
        //     'title', 
        //     'Title', 
        //     array( $this, 'title_callback' ), 
        //     'my-setting-admin', 
        //     'setting_section_id'
        // );      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['token'] ) )
            $new_input['token'] = sanitize_text_field( $input['token'] );

        // if( isset( $input['title'] ) )
        //     $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function token_callback()
    {
        printf(
            '<input type="text" id="token" name="my_option_name[token]" value="%s" />',
            isset( $this->options['token'] ) ? esc_attr( $this->options['token']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    // public function title_callback()
    // {
    //     printf(
    //         '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
    //         isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
    //     );
    // }
}

if( is_admin() )
$my_settings_page = new DSettingsPage();