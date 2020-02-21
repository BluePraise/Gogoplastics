<?php

/*  Template Name: Projects Template
*/
get_header();
?>

<main id="site-content" role="main">


    <?php
        $args = array(  'post_type' => 'projects' );
        $projects = new WP_Query( $args );

        if( $projects->have_posts() ) :  ?>

            <h2 class="page-title"><?php the_title(); ?></h2>

        <?php while( $projects->have_posts() ) : $projects->the_post(); ?>

        <div class="grid">


        <?php
            endwhile;
        endif;
        wp_reset_postdata();?>

        </div> <!-- end of .grid -->

</main>
<?php get_footer(); ?>