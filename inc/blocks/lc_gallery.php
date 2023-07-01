<!-- <link rel="stylesheet" href="<?=get_stylesheet_directory_uri()?>/css/jquery.fancybox.min.css"
/> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.min.css" />

<a class="anchor" id="gallery"></a>
<section class="gallery py-5">
    <div class="container-xl">
        <h2>Piggin' Good Photo Gallery</h2>
        <div class="gallery__grid">
            <?php
        $d = 0;
foreach (get_field('images') as $i) {
    the_row();
    ?>
            <div data-thumb="<?=wp_get_attachment_image_url($i, 'large')?>"
                class="gallery__image" data-aos="fade"
                data-aos-delay="<?=$d?>"
                data-aos-anchor=".gallery__grid">
                <a href="<?=wp_get_attachment_image_url($i, 'full')?>"
                    data-fancybox="gallery">
                    <img
                        src="<?=wp_get_attachment_image_url($i, 'full')?>">
                </a>
            </div>
            <?php
    $d += 50;
}
?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer', function () {
    ?>
<script src="https://unpkg.com/imagesloaded@5.0.0/imagesloaded.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind('[data-fancybox="gallery"]', {
        caption: function(_fancybox, slide) {
            const figurecaption = slide.triggerEl?.querySelector("figcaption");
            return figurecaption ? figurecaption.innerHTML : slide.caption || "";
        },
    });

    (function($) {

        var $grid = $('.gallery__grid').imagesLoaded(function() {
            // init Masonry after all images have loaded
            $grid.masonry({
                itemSelector: '.gallery__image',
                percentPosition: true
            });
        });
    })(jQuery);

    // var elem = document.querySelector('.gallery__grid');
    // var msnry = new Masonry(elem, {
    //     itemSelector: '.gallery__image',
    //     percentPosition: true
    // });
</script>
<?php
});
?>