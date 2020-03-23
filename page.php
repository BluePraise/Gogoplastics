<?php
    get_header();
?>

<main id="site-content" class="container" role="main">

    <?php if( have_posts() ) :  ?>

            <h2 class="page-title animated fadeInUp"><?php the_title(); ?></h2>

            <figure><?php the_post_thumbnail();?></figure>

            <?php while( have_posts() ) : the_post();
            // Check value exists.
            if ( have_rows('flex_content') ):
                // Loop through rows.
                while ( have_rows('flex_content') ) : the_row(); ?>
                <div class="grid">
                <?php
                    if ( get_row_layout() == 'two_column_images_with_captions' ):
                        $page_images        = get_sub_field('top_images');
                        $page_col_left      = $page_images["page_column_left"];
                        $page_col_right     = $page_images["page_column_right"];
                        $image_left         = $page_col_left['top_image_left'];
                        $caption_left       = $page_col_left['top_image_left_caption'];
                        $image_right        = $page_col_right['top_image_right'];
                        $caption_right      = $page_col_right['top_image_right_caption'];
            ?>

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
                    elseif ( get_row_layout() == 'two_column_text' ):
                    $content_columns    = get_sub_field('content_columns');
                    $content_col_left   = $content_columns["content_column_left"];
                    $content_col_right  = $content_columns ["content_column_right"];
                ?>

                <div class="content col__left">
                    <?php echo $content_col_left;?>
                </div>
                <div class="content col__right">
                    <?php echo $content_col_right; ?>
                </div>
                <?php endif; ?>
            </div> <!-- /.grid -->
        <?php endwhile; endif; ?>
        <?php endwhile; endif; ?>


</main>

<?php
get_footer();
