<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cb-mvp
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
</main>
<!-- pre_footer -->
<section class="pre_footer py-5">
    <div class="container-fluid py-2">
        <div class="text-center fs-3 mb-4">Follow us on Social Media</div>
        <div class="social-icons text-center">
            <?=do_shortcode( '[social_icons]' )?>
        </div>
        
        <nav id='thumbs'></nav>
    <img id='viewer'>

    </div>
</section>
<div class="footer pb-3">
    <div class="colophon">
        <div class="container d-flex justify-content-between flex-wrap pb-2 pt-4">
            <div class="text-center mx-auto ms-lg-0">&copy; <?=date('Y')?> Piggin' Good</div>
            <div class="text-center mx-auto me-lg-0">
                <a href="/privacy-policy/">Privacy Policy</a> |
                <a href="https://www.lamcat.co.uk/">Site by Lamcat</a>
            </div>
        </div>
    </div>
</div>
</div><!-- #page -->
<?php wp_footer();
if (get_field('gtm_property', 'options')) {
    ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?=get_field('gtm_property', 'options')?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <?php
}
?>
</body>

</html>

