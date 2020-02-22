<?php get_header(); ?>

<main id="site-content" class="container" role="main">

    <?php

        if( have_posts() ) : while( have_posts() ) : the_post(); ?>
            <h2 class="page-title"><?php the_title(); ?></h2>

            <figure class="featured-image__full"><?php the_post_thumbnail( $size = 'full', $attr = '' ); ?>
                <figcaption class="project-summary"> <?php the_field('project_summary'); ?> </figcaption>
            </figure>

        <?php
            endwhile;
        endif; ?>

</main>

<?php get_footer();
