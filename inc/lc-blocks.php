<?php

function acf_blocks()
{
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'				=> 'lc_hero_carousel',
            'title'				=> __('LC Hero Carousel'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_hero_carousel.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'image', 'hero', 'carousel' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_contact_details',
            'title'				=> __('LC Contact Details'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_contact_details.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'contact', 'details' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_text_image',
            'title'				=> __('LC Text Image'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_text_image.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'text', 'image' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_two_cols',
            'title'				=> __('LC Two Columns'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_two_cols.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'two', 'cols' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_features',
            'title'				=> __('LC Features'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_features.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'features' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_quote',
            'title'				=> __('LC Quotes'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_quote.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'quotes' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_about_panel',
            'title'				=> __('LC About Panel'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_about_panel.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'about', 'panel' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_form_block',
            'title'				=> __('LC Form Block'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_form_block.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'form' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
        acf_register_block(array(
            'name'				=> 'lc_gallery',
            'title'				=> __('LC Gallery'),
            'description'		=> __(''),
            'render_template'	=> 'inc/blocks/lc_gallery.php',
            'category'			=> 'layout',
            'icon'				=> 'excerpt-view',
            'keywords'			=> array( 'form' ),
            'mode'	=> 'edit',
            'supports' => array('mode' => false),
        ));
    }
}
add_action('acf/init', 'acf_blocks');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site-Wide Settings',
            'menu_title'	=> 'Site-Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}
