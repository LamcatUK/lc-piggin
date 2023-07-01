<?php
// $bg = (get_field('colour') == 'dark') ? 'bg--grey' : '';
// $pad = (get_field('colour') == 'dark') ? 'py-5' : 'py-5';
/*  <?=$pad?> <?=$bg?>"> */
?>
<!-- quotes -->
<section class="quotes py-5">
    <div class="container">
        <?php
        if (get_field('title')) {
            echo '<h2 class="text-center">' . get_field('title') . '</h2>';
        }
?>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                <div class="testimonials">
                    <?php
        while (have_rows('quotes')) {
            the_row();
            ?>
                    <div class="testimonial mx-4">
                        <div class="testimonial__content pb-3">
                            <?=get_sub_field('quote')?>
                        </div>
                        <div class="testimonial__title pb-3">
                            <?=get_sub_field('attribution')?>
                        </div>
                    </div>
                    <?php
        }
?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script src="<?=get_stylesheet_directory_uri()?>/js/slick.min.js"></script>
<script type="text/javascript">
    (function($) {
        $('.testimonials').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 6000,
            speed: 1000,
            arrows: false,
            fade: true
        });
    })(jQuery);
</script>
<?php
}, 9999);
?>