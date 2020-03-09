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
    add_image_size( 'slider-fullwidth', 1440, 600 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'default-page', 2400, 300, array( 'center', 'center' ) );
    add_image_size( 'project-thumb', 324, 231 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'project-thumb-medium', 500, 350 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'project-thumb-small', 400, 300 ); // 300 pixels wide (and unlimited height)


    // 03 Widget Theme Support (mainly in footer)
    add_theme_support( 'post-thumbnails' );

    //04 Widget Initialisation
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

        // Custom CSS // This thing doesn't work anymore, after I added flexslider.
        wp_register_style( 'gogo', get_template_directory_uri() . '/style.css' );
    }

    // 04 Load scripts
    function gogo_scripts() {

        //wp_register_script( $handle, $src, $deps, $ver, $in_footer );
        // Goes in header
        wp_register_script( 'feather_icons', 'https://unpkg.com/feather-icons', array(), '4.26.0', false);


        // Goes in footer
        wp_register_script( 'gogo_jquery', 'https://code.jquery.com/jquery-3.4.1.js', array(), '3.4.1', true);
        wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery'), '', true);
        wp_register_script( 'gogo_scripts', get_template_directory_uri() . '/js/script.js', array('jquery'), '0.0', true);

        // wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
        wp_enqueue_script( 'feather_icons' );
        wp_enqueue_script( 'gogo_jquery' );
        wp_enqueue_script( 'flexslider' );
        wp_enqueue_script( 'gogo_scripts' );

    }

    // 05 Navigation

    // Navigation
    function gogo_nav() {
        wp_nav_menu(
        array(
            'theme_location'  => 'header-menu',
            'menu'            => '',
            'container'       => 'nav',
            'container_class' => 'masthead',
            'container_id'    => '',
            'menu_class'      => 'menu',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul class="reset-list-style">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
            )
        );
    }

    function register_gogo_menu() {
        register_nav_menus( array( // Using array to specify more menus if needed
            'header-menu'  => esc_html( 'Header Menu', 'gogoplastics' ), // Main Navigation
            'extra-menu'   => esc_html( 'Extra Menu', 'gogoplastics' ) //
        ) );
    }


    // 06 Custom Posttypes for projects
    function projects_posttype() {

        $labels = array(
            'name'               => _x( 'Projects', 'post type general name' ),
            'singular_name'      => _x( 'Project', 'post type singular name' ),
            'add_new'            => _x( 'Add New', 'project' ),
            'add_new_item'       => __( 'Add New Project' ),
            'edit_item'          => __( 'Edit Project' ),
            'new_item'           => __( 'New Project' ),
            'all_items'          => __( 'All Projects' ),
            'view_item'          => __( 'View Project' ),
            'search_items'       => __( 'Search Projects' ),
            'not_found'          => __( 'No projects found' ),
            'not_found_in_trash' => __( 'No projects found in the Trash' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Projects'
        );

        $args = array(
            'labels'             => $labels,
            'description'        => 'An overview of gogoplastics projects',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        );

        register_post_type( 'projects', $args );
    }

    // 06 Custom Posttypes for projects
    function product_posttype() {

        $labels = array(
            'name'               => _x( 'Products', 'post type general name' ),
            'singular_name'      => _x( 'Product', 'post type singular name' ),
            'add_new'            => _x( 'Add New', 'product' ),
            'add_new_item'       => __( 'Add New Product' ),
            'edit_item'          => __( 'Edit Product' ),
            'new_item'           => __( 'New Product' ),
            'all_items'          => __( 'All Products' ),
            'view_item'          => __( 'View Product' ),
            'search_items'       => __( 'Search Products' ),
            'not_found'          => __( 'No products found' ),
            'not_found_in_trash' => __( 'No products found in the Trash' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Products'
        );

        $args = array(
            'labels'             => $labels,
            'description'        => 'An overview of gogoplastics products',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        );

        register_post_type( 'products', $args );
    }

    function gogo_updated_messages( $messages ) {
      global $post, $post_ID;
      $messages['project'] = array(
        0 => '',
        1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
        2 => __('Custom field updated.'),
        3 => __('Custom field deleted.'),
        4 => __('Project updated.'),
        5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
        7 => __('Project saved.'),
        8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
        9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
        10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
      );
      return $messages;
    }
    add_filter( 'post_updated_messages', 'gogo_updated_messages' );


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
    add_action( 'init', 'product_posttype' );
    add_action( 'wp', 'deregister_contact_form');

    function deregister_contact_form() {

        if ( ! is_page( 'contact' ) ) {
          remove_action('wp_enqueue_scripts', 'wpcf7_enqueue_scripts');
        }
    }



    // Remove Actions
    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
    remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
    remove_action( 'wp_head', 'rel_canonical' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

?>
