<?php
    get_header();
?>

<main id="site-content" role="main">

    <?php
        if ( have_posts() ) : ?>
            <h2 class="page-title"><?php the_title();?></h2>
            <div class="container">
            <?php
            while ( have_posts() ) : the_post(); ?>
            <figure><?php the_post_thumbnail();?></figure>

            <div class="page-content"><?php the_content(); ?></div>

            <?php endwhile; endif;?>

        </div>

</main>

<?php
get_footer();
