<?php get_header(); ?>

<main id="site-content" class="container single-project" role="main">


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
                $col_right         = $project_images["project_column_right"];
                $col_left_photo    = $col_left['additional_project_photo_left'];
                $col_left_summary  = $col_left['summary_additional_project_photo_left'];
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

           <?php get_template_part('flex-content') ?>

            <div class="page-content"><?php the_content(); ?></div>

        <?php
            // ENDS FOR THE LOOP
            endwhile;
        endif; ?>

</main>

<?php get_footer();
