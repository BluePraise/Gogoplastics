<?php

/*  Template Name: What we do Template
*/
get_header();
?>

<main id="site-content" class="container what-we-do" role="main">

    <?php

        if( have_posts() ) :  ?>

            <h2 class="page-title"><?php the_title(); ?></h2>

            <?php while( have_posts() ) : the_post(); ?>
            <?php
                $page_images        = get_field('top_images');
                $page_col_left      = $page_images["page_column_left"];
                $page_col_right     = $page_images["page_column_right"];
                $image_left         = $page_col_left['top_image_left'];
                $caption_left       = $page_col_left['top_image_left_caption'];
                $image_right        = $page_col_right['top_image_right'];
                $caption_right      = $page_col_right['top_image_right_caption'];
            ?>
        <div class="grid">

            <div class="top col__left">
                <figure>
                    <img src="<?php echo esc_url( $image_left['url'] ); ?>" alt="<?php //echo esc_attr( $col_left_photo['alt'] ); ?>" />
                    <figcaption class="image-caption"><?php echo $caption_left; ?></figcaption>
                </figure>
            </div>

            <div class="top col__right">
                <figure>
                    <img src="<?php echo esc_url( $image_right['url'] ); ?>" alt="<?php //echo esc_attr( $col_left_photo['alt'] ); ?>" />
                    <figcaption class="image-caption"><?php echo $caption_right; ?></figcaption>
                </figure>
            </div>

            <?php
                $content_columns    = get_field('content_columns');
                $content_col_left   = $content_columns["content_column_left"];
                $content_col_right  = $content_columns ["content_column_right"];
            ?>

            <div class="content col__left">
                <?php echo $content_col_left;?>
            </div>
            <div class="content col__right">
                <?php echo $content_col_right; ?>
            </div>
        </div>
        <?php
                endwhile;
            endif;
        ?>




</main>
<?php get_footer(); ?>