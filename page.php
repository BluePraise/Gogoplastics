<?php
    get_header();
?>

<main id="site-content" role="main">

    <?php
        if ( have_posts() ) }?>
            <h2 class="page-title"><?php the_title();?></h2>

            <?php // Load posts loop.
            while ( have_posts() ) {
                the_post();
            }

        } else {



        }
        ?>

</main>

<?php
get_footer();
