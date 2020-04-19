<?php

    /* template name: Samples Template */
    get_header();
?>

<main id="site-content" role="main">

    <?php
        if ( have_posts() ) : ?>
            <div class="content-container container">
            <h2 class="page-title animated fadeInUp"><?php the_title();?></h2>


            <?php while ( have_posts() ) :
                the_post();

                the_content();

            endwhile;
        endif;

        ?>
    </div>
</main>

<?php get_footer(); ?>