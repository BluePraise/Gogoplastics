<?php get_header(); ?>

<main id="site-content" class="container projects" role="main">


<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/projects.css">
    <?php

        if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <h2 class="page-title animated fadeInUp"><?php the_title(); ?></h2>

            <figure class="featured-image__full">
                <?php the_post_thumbnail( $size = 'full', $attr = '' ); ?>
                <figcaption class="project-summary"> <?php the_field('project_summary'); ?> </figcaption>
            </figure>

            <?php
                $project_images    = get_field('project_images');
                $col_left          = $project_images["project_column_left"];
                $col_left_photo    = $col_left['additional_project_photo_left'];
                $col_left_summary  = $col_left['summary_additional_project_photo_left'];

                $col_right         = $project_images["project_column_right"];
                $col_right_photo   = $col_right['additional_project_photo_right'];
                $col_right_summary = $col_right['summary_additional_project_photo_right'];
            ?>

            <div class="col__left">
                <figure>
                    <img src="<?php echo esc_url( $col_left_photo ); ?>" alt="<?php //echo esc_attr( $col_left_photo['alt'] ); ?>" />
                    <figcaption class="project-summary"><?php echo $col_left_summary; ?></figcaption>
                </figure>
            </div>

            <div class="col__right">
                <figure>
                    <img src="<?php echo esc_url( $col_right_photo ); ?>" alt="<?php //echo esc_attr( $col_left_photo['alt'] ); ?>" />
                    <figcaption class="project-summary"><?php echo $col_right_summary; ?></figcaption>
                </figure>
            </div>

            <?php // Check value exists.
            // Check value exists.
            if ( have_rows('flex_content') ):
                // Loop through rows.
                while ( have_rows('flex_content') ) : the_row();
                    if ( get_row_layout() == 'two_column_images_with_captions' ):
                        $page_images = get_sub_field('two_col_images');
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

            <?php else: ?>
                <div class="content">
                <?php if ( get_row_layout() == 'text_box' ): ?>
                    <div class="material_attribute">
                        <?php the_sub_field('text_box'); ?>
                    </div>
                <?php elseif ( get_row_layout() == 'gallery_with_three_images' ):
                        $gallery_three_images    = get_sub_field('gallery_with_three_images');
                        $image_one               = $gallery_three_images['image_one'];
                        $image_one_caption       = $gallery_three_images['image_one_caption'];
                        $image_two               = $gallery_three_images['image_two'];
                        $image_two_caption       = $gallery_three_images['image_two_caption'];
                        $image_three             = $gallery_three_images['image_three'];
                        $image_three_caption     = $gallery_three_images['image_three_caption'];
                ?>
                    <div class="gallery_three_images">
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
                <?php elseif (get_row_layout() == 'one_image_with_caption'):
                    $one_image    = get_sub_field('one_image_with_caption');
                    $property_image         = $one_image['image'];
                    $property_image_caption = $one_image['caption'];
                ?>
                        <div class="material_attribute">
                            <figure class="image--center">
                                <img src="<?php echo esc_url( $property_image ); ?>" alt="">
                                <figcaption class="image-caption"><?php echo $property_image_caption; ?></figcaption>
                            </figure>
                        </div>
                    </div>
            <?php endif; endif; endwhile; endif; ?>
            <div class="page-content"><?php the_content(); ?></div>

        <?php
            // ENDS FOR THE LOOP
            endwhile;
        endif; ?>

</main>

<?php get_footer();
