<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link href="https://fonts.googleapis.com/css?family=Space+Mono:400,400i,700,700i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono&display=swap" rel="stylesheet">
        <link href="https://use.typekit.net/glz1kqk.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
        <div class="wrapper">
        <!-- nav -->
        <div class="h-wrapper">
            <div id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <?php gogo_nav(); ?>

