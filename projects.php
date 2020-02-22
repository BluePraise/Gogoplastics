<?php

/*  Template Name: Projects Template
*/
get_header();
?>

<main id="site-content" class="container projects" role="main">

    <?php
        $args = array(  'post_type' => 'projects' );
        $projects = new WP_Query( $args );

        if( $projects->have_posts() ) :  ?>

            <h2 class="page-title"><?php the_title(); ?></h2>
            <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/projects.css">

        <ul class="projects-list">

        <?php while( $projects->have_posts() ) : $projects->the_post(); ?>
        <li>

                <!-- thumbnail en summary-->
                <?php if ( has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>

                    <p class="project-summary"><?php the_field('project_summary'); ?></p>

                <?php endif; ?>

            </li>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();?>
        </ul> <!-- end of .grid -->

        <div class="page-content"><?php the_content(); ?></div>


</main>
<?php get_footer(); ?>