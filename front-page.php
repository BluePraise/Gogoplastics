<?php

    /* Template Name: Home */
    get_header();
?>


    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/flexslider.css">
    <div class="slider-container">
        <div class="flexslider">
            <?php if( have_rows('slider') ): ?>
                <ul class="slides">

                    <?php while( have_rows('slider') ): the_row();
                        $image = get_sub_field('slide');
                    ?>

                    <li class="slide"><img src="<?php echo $image; ?>" alt=""></li>


                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
         <figure class="logo animated fadeInDown">

                <?php

                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

                    if ( has_custom_logo() ) {
                        echo '<img src="' . $logo[0] . '" alt="' . get_bloginfo( 'name' ) . '">';
                    }
                    else {
                        echo '<img src="' . get_stylesheet_directory_uri() .'/img/logo.svg" alt="' . get_bloginfo( 'name' ) . '">';
                    }

                ?>

        </figure>
    </div>

    <div class="intro">

        <h1 class="intro--title"><?php the_field('intro_text') ?></h1>

    </div>

<?php
get_footer();
