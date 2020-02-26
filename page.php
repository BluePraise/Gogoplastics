<?php
    get_header();
?>

<main id="site-content" role="main">

    <?php
        if ( have_posts() ) : ?>
            <h2 class="page-title"><?php the_title();?></h2>
            <div class="content-container">
            <?php
            while ( have_posts() ) :

                the_post();



            endwhile;
        endif;?>

        </div>

</main>

<?php
get_footer();
