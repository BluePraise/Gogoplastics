<?php

/*  Template Name: Projects Template
*/
get_header();
?>

<main id="site-content" role="main">


    <?php while ( have_posts() ) : the_post(); ?>

        <h2 class="page-title"><?php the_title(); ?></h2>

        <?php // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

        endwhile; // End of the loop.?>



</main>
<?php get_footer(); ?>