<?php

    // 01 custom logo functionality
    function gogo_custom_logo_setup() {
         $defaults = array(
         'height'      => 443,
         'width'       => 294,
         'flex-height' => true,
         'flex-width'  => true,
         'header-text' => array( 'site-title', 'site-description' ),
    );

        add_theme_support( 'custom-logo', $defaults );
    }

    // 02 Widget Theme Support (mainly in footer)
    add_theme_support( 'customize-selective-refresh-widgets' );

    //02 Widget Initialisation
    function gogo_widgets_init() {

        register_sidebar(
            array(
                'name'          => __( 'Footer 1', 'gogoplastics' ),
                'id'            => 'sidebar-col-1',
                'description'   => __( 'Add widgets here to appear in the first footer column.', 'gogoplastics' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name'          => __( 'Footer 2', 'gogoplastics' ),
                'id'            => 'sidebar-col-2',
                'description'   => __( 'Add widgets here to appear in the second footer column.', 'gogoplastics' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );

        register_sidebar(
            array(
                'name'          => __( 'Footer 3', 'gogoplastics' ),
                'id'            => 'sidebar-col-3',
                'description'   => __( 'Add widgets here to appear in the third footer column.', 'gogoplastics' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            )
        );
    }


    // 03 Load styles
    function gogo_styles() {

            // Custom CSS
            wp_register_style( 'gogo', get_template_directory_uri() . '/style.css' );

            // Register CSS
            wp_enqueue_style( 'gogo' );

    }

    // 04 Load scripts
    function gogo_scripts() {

        //wp_register_script( $handle, $src, $deps, $ver, $in_footer );
        // Goes in header
        wp_register_script( 'feather_icons', 'https://unpkg.com/feather-icons', array(), '4.26.0', false);


        // Goes in footer

        wp_register_script( 'gogo_jquery', 'https://code.jquery.com/jquery-3.4.1.js', array(), '3.4.1', true);
        wp_register_script( 'gogo_scripts', get_template_directory_uri() .  '/js/script.js', array('jquery'), '0.0', true);

        // wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
        wp_enqueue_script( 'feather_icons' );
        wp_enqueue_script( 'gogo_jquery' );
        wp_enqueue_script( 'gogo_scripts' );

    }

    // 05 Register Menu
    function register_gogo_menu() {
        register_nav_menus( array( // Using array to specify more menus if needed
            'header-menu'  => esc_html( 'Header Menu', 'gogoplastics' ), // Main Navigation
            'extra-menu'   => esc_html( 'Extra Menu', 'gogoplastics' ) //
        ) );
    }


    // Add Actions

    // 01 custom logo functionality
    add_action( 'after_setup_theme', 'gogo_custom_logo_setup' );

    // 04 Scripts
    add_action( 'wp_enqueue_scripts', 'gogo_scripts' );

    // 03 Scripts
    add_action( 'wp_enqueue_scripts', 'gogo_styles' );

    // 02 Widgets
    add_action( 'widgets_init', 'gogo_widgets_init' );

    // 05 Add Menu
    add_action( 'init', 'register_gogo_menu' );


    // Remove Actions
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
    remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action( 'wp_head', 'rel_canonical' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

?>
