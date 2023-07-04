<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes();?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes();?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes();?>>
<!--<![endif]-->

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Digital Sugar">
    <meta name="format-detection" content="telephone=no">
    <title>
        <?php wp_title('&raquo;','true','right'); ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/dist/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/img/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dist/img/safari-pinned-tab.svg"
        color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/dist/img/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/dist/css/main.css'>
    <!-- <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/fonts/Moderat-Light.woff2" as="font"
        crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/fonts/Moderat-Medium.woff2" as="font"
        crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/fonts/Audrey-Bold.woff2" as="font"
        crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/fonts/Audrey-Medium.woff2" as="font"
        crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/fonts/Audrey-Normal.woff2" as="font"
        crossorigin="anonymous"> -->

    <?php if(get_sub_field('tracking', 'option')) :?>
    <?php the_field( 'tracking', 'option' ); ?>
    <?php endif;?>

    <?php wp_head();?>
</head>

<body <?php body_class(); ?>>
    <?php if(get_sub_field('body_scripts', 'option')) :?>
    <?php the_field( 'body_scripts', 'option' ); ?>
    <?php endif;?>
    <section class="fixed top-0 left-0 w-full z-[999] my-4 lg:my-4">
        <div class="bg-gray-100 w-[95%] mx-auto rounded-full">
            <?php get_template_part( 'template-parts/navigation/top-bar' ) ?>
        <!-- ?php get_template_part( 'template-parts/navigation/logo-strip' ) ?-->
        <?php get_template_part( 'template-parts/navigation/menu' ) ?>
    </div>
    <div class="container">
        <?php get_template_part( 'template-parts/navigation/bottom-bar' ) ?>
    </div>
        
    </section>
    <!--/header -->