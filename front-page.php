<?php

    /* Template Name: Home */
    get_header();
?>

<div class="intro">
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


<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
