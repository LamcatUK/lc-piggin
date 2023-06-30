<?php

require_once LC_THEME_DIR . '/inc/lc-performance.php';
require_once LC_THEME_DIR . '/inc/lc-utility.php';
require_once LC_THEME_DIR . '/inc/lc-blocks.php';

function widgets_init()
{
    register_nav_menus(array(
        'primary_nav' => __('Primary Nav', 'lc-dcs'),
    ));

    register_nav_menus(array(
        'footer_menu1' => __('Footer Home', 'lc-dcs'),
        'footer_menu2' => __('Footer About', 'lc-dcs'),
    ));

    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');

}
add_action('widgets_init', 'widgets_init', 11);


// Remove unwanted SVG filter injection WP
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

