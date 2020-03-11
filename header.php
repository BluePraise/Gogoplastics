<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <link href="https://fonts.googleapis.com/css?family=Space+Mono:400,400i,700,700i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Mono&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>
        <header class="site-header">
            <div class="wrapper">
                <!-- nav -->
                <div class="h-wrapper">
                    <button class="hamburger js-hamburger">
                        <span class="hamburger__box"><span class="hamburger__inner"></span></span>
                    </button>
                    <a class="site-header__logo" href="/">
                        <img src="<?php echo get_template_directory_uri() ?>/img/logo-small-black.png" alt="">
                    </a>
                </div>
                <div class="menu-wrap">
                    <div class="menu-wrap__top">
                        <button class="hamburger is-active">
                            <span class="hamburger__box"><span class="hamburger__inner"></span></span>
                        </button>
                        <a class="menu-wrap__logo" href="/">
                            <img src="<?php echo get_template_directory_uri() ?>/img/logo-small-black.png" alt="">
                        </a>
                    </div>
                    <?php gogo_nav(); ?>
                </div>
            </div>
        </header>

        <div class="wrapper">
