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


    // 06 Custom Posttypes for projects
    function projects_posttype() {

        $labels = array(
            'name'                  => _x( 'Projecten', 'Post type general name', 'textdomain' ),
            'singular_name'         => _x( 'Project', 'Post type singular name', 'textdomain' ),
            'menu_name'             => _x( 'Projecten', 'Admin Menu text', 'textdomain' ),
            'name_admin_bar'        => _x( 'Project', 'Add New on Toolbar', 'textdomain' ),
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Project', 'textdomain' ),
            'new_item'              => __( 'New Project', 'textdomain' ),
            'edit_item'             => __( 'Edit project', 'textdomain' ),
            'view_item'             => __( 'View project', 'textdomain' ),
            'all_items'             => __( 'All projects', 'textdomain' ),
            'search_items'          => __( 'Search projects', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent projects:', 'textdomain' ),
            'not_found'             => __( 'No projects found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No projects found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'project' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        );

        register_post_type( 'projects', $args );
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

    // 06 hook for custom posttypes
    add_action( 'init', 'projects_posttype' );


    // Remove Actions
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
    remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action( 'wp_head', 'rel_canonical' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

?>
