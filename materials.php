<?php

/*  Template Name: Materials Template
*/
get_header();
?>

<main id="site-content" class="container materials" role="main">

    <?php

        if( have_posts() ) :  ?>

            <h2 class="page-title"><?php the_title(); ?></h2>

            <?php while( have_posts() ) : the_post(); ?>
            <?php
                $page_images        = get_field('top_images');
                $page_col_left      = $page_images["page_column_left"];
                $page_col_right     = $page_images["page_column_right"];
                $image_left         = $page_col_left['top_image_left'];
                $caption_left       = $page_col_left['top_image_left_caption'];
                $image_right        = $page_col_right['top_image_right'];
                $caption_right      = $page_col_right['top_image_right_caption'];
            ?>
        <div class="grid">

            <div class="top col__left">
                <figure>
                    <img src="<?php echo esc_url( $image_left['url'] ); ?>" alt="<?php //echo esc_attr( $col_left_photo['alt'] ); ?>" />
                    <figcaption class="image-caption"><?php echo $caption_left; ?></figcaption>
                </figure>
            </div>

            <div class="top col__right">
                <figure>
                    <img src="<?php echo esc_url( $image_right['url'] ); ?>" alt="<?php //echo esc_attr( $col_left_photo['alt'] ); ?>" />
                    <figcaption class="image-caption"><?php echo $caption_right; ?></figcaption>
                </figure>
            </div>
        </div>

            <div class="content">
                <div class="material_attribute">
                    <?php the_field('text_box_one'); ?>
                </div>
                <div class="gallery_three_images">
                    <?php
                        $gallery_three_images    = get_field('gallery_three_images');
                        $image_one               = $gallery_three_images['image_one'];
                        $image_one_caption       = $gallery_three_images['image_one_caption'];
                        $image_two               = $gallery_three_images['image_two'];
                        $image_two_caption       = $gallery_three_images['image_two_caption'];
                        $image_three             = $gallery_three_images['image_three'];
                        $image_three_caption     = $gallery_three_images['image_three_caption'];
                    ?>

                    <figure class="image--one">
                        <img src="<?php echo esc_url( $image_one ); ?>" alt="">
                        <figcaption class="image-caption"><?php echo $image_one_caption; ?></figcaption>
                    </figure>
                    <figure class="image--two">
                        <img src="<?php echo esc_url( $image_two ); ?>" alt="">
                        <figcaption class="image-caption"><?php echo $image_two_caption; ?></figcaption>
                    </figure>
                    <figure class="image--three">
                        <img src="<?php echo esc_url( $image_three ); ?>" alt="">
                        <figcaption class="image-caption"><?php echo $image_three_caption; ?></figcaption>
                    </figure>
                </div>
                <div class="material_attribute">
                    <?php
                        $property_image         = get_field('property_image');
                        $property_image_caption = get_field('property_image_caption');
                    ?>
                    <?php the_field('text_box_two'); ?>

                    <figure class="image--center">
                        <img src="<?php echo esc_url( $property_image ); ?>" alt="">
                        <figcaption class="image-caption"><?php echo $property_image_caption; ?></figcaption>
                    </figure>
                </div>


                <div class="material_attribute">
                    <?php the_field('text_box_three'); ?>
                </div>

            </div>

        <?php
                endwhile;
            endif;
        ?>




</main>
<?php get_footer(); ?>