<?php

    /* Template Name: Home */
    get_header();
?>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/flexslider.css">

<div class="intro flex-slider">
    <ul class="slides">

    </ul>
    <figure class="logo">
        <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

        if ( has_custom_logo() ) {
            echo '<img src="' . $logo[0] . '" alt="' . get_bloginfo( 'name' ) . '">';
        }
        else {
            echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
        }

        ?>


    </figure>
    <h1 class="intro--title">
        <?php the_field('intro_text') ?>
    </h1>
</div>


<?php
get_footer();
