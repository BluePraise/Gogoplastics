<?php

    /* template name: Questions Template */
    get_header();
?>

<main id="site-content" role="main">

    <?php
        if ( have_posts() ) : ?>
            <h2 class="page-title"><?php the_title();?></h2>

            <?php while ( have_posts() ) :
                the_post();

                the_content();

            endwhile;
        endif;

        ?>

</main>

<?php get_footer(); ?>