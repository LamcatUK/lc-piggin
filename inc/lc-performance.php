<?php
// performance - move to separate file once tested

// Remove unwanted SVG filter injection WP
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );


/**
 * Disable the emojis
 */
function disable_emojis()
{
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
    add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array( 'wpemoji' ));
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
    if ('dns-prefetch' == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

        $urls = array_diff($urls, array( $emoji_svg_url ));
    }

    return $urls;
}

//Remove JQuery migrate
function remove_jquery_migrate($scripts)
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        
        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');

// Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    // wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);

// Remove Gutenberg Duotone filters
function rankya_remove_global_styles() {
    remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
    remove_action( 'in_admin_header', 'wp_global_styles_render_svg_filters' );
}
add_action('after_setup_theme', 'rankya_remove_global_styles', 10, 0);

// Remove comment-reply.min.js from footer
function remove_comment_reply_header_hook(){
	wp_deregister_script( 'comment-reply' );
}
add_action('init','remove_comment_reply_header_hook');

function remove_comments(){
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'remove_comments' );

function prefix_remove_comments_tl() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'prefix_remove_comments_tl' );

// Remove wp-embed.min.js
function deregister_wp_embed(){
    wp_deregister_script( 'wp-embed' );
  }
  add_action( 'wp_footer', 'deregister_wp_embed' );

// end performance tweaks
function child_theme_remove_page_template( $page_templates ) {
    unset( $page_templates['page-templates/blank.php'] ); 
    unset( $page_templates['page-templates/empty.php'] ); 
    // unset( $page_templates['page-templates/fullwidthpage.php'] ); 
    unset( $page_templates['page-templates/left-sidebarpage.php'] ); 
    unset( $page_templates['page-templates/right-sidebarpage.php'] ); 
    unset( $page_templates['page-templates/both-sidebarspage.php'] ); 
    
    return $page_templates;
}
add_filter( 'theme_page_templates', 'child_theme_remove_page_template' );


add_action( 'after_setup_theme', 'remove_understrap_post_formats', 11 );
function remove_understrap_post_formats() {
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video' , 'quote' , 'link' ) );
}