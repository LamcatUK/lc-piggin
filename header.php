<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-piggin
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/antic-v19-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/antic-v19-latin-regular.woff"
        as="font" type="font/woff" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/bangers-v20-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/bangers-v20-latin-regular.woff"
        as="font" type="font/woff" crossorigin="anonymous">
    <?php
    if (get_field('ga_property', 'options')) {
        ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property', 'options')?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?=get_field('ga_property', 'options')?>'
        );
    </script>
    <?php
    }
    if (get_field('gtm_property', 'options')) {
        ?>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer',
            '<?=get_field('gtm_property', 'options')?>'
        );
    </script>
    <!-- End Google Tag Manager -->
    <?php
    }
    if (get_field('google_site_verification', 'options')) {
        echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
    }
    if (get_field('bing_site_verification', 'options')) {
        echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
    }
?>

    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Piggin' Good",
            "url": "https://www.piggingood.co.uk/",
            "logo": "https://www.piggingood.co.uk/wp-content/theme/lc-piggin/img/piggin-good-logo.jpg",
            "description": "Quality Hog, Lamb and Chicken Roasts in West Sussex",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Beggars Roost, Bashurst Hill, Itchingfield",
                "addressLocality": "Horsham",
                "addressRegion": "West Sussex",
                "postalCode": "RH13 0NY",
                "addressCountry": "UK"
            },
            "telephone": "+44 (0) 7889 006501",
            "email": "roasts@piggingood.co.uk",
            "sameAs": [
                "https://www.facebook.com/Piggin-Good-690947907702373",
                "https://uk.linkedin.com/in/julian-taylor-5748645b"
            ]
        }
    </script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
do_action('wp_body_open');
?>
    <div class="site" id="page">
        <nav id="main-nav" class="navbar navbar-expand-lg fixed-top d-block py-2" aria-labelledby="main-nav-label">
            <div class="container-xl d-flex">
                <a href="/" class="navbar-brand" rel="home"></a>
                <div class="nav-right me-2">
                    <!-- <a href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>"
                    class="d-none d-md-inline nav-phone
                    me-4"><?=get_field('contact_phone', 'options')?></a>
                    -->
                    <a href="tel:<?=parse_phone(get_field('contact_mobile', 'options'))?>"
                        class="d-none d-md-inline nav-phone me-4"><?=get_field('contact_mobile', 'options')?></a>
                    <a href="#form" class="btn btn-primary">Contact</a>
                </div>
            </div>
        </nav>