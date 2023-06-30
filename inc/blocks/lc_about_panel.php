<?php
if (get_field('id')) {
    ?>
<a class="anchor" id="<?=get_field('id')?>"></a>
    <?php
}
?>
<section class="about_panel">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="about_panel__card">
                    <div class="mb-2 p-4">
                        <h2><?=get_field('left_title')?></h2>
                        <div><?=get_field('left_content')?></div>
                    </div>
                    <?=wp_get_attachment_image(get_field('left_image'),'large')?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about_panel__card">
                    <div class="mb-2 p-4">
                        <h2><?=get_field('right_title')?></h2>
                        <div><?=get_field('right_content')?></div>
                    </div>
                    <?=wp_get_attachment_image(get_field('right_image'),'large')?>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center pb-5">
        <a href="#form" class="btn btn-primary">Get in touch</a>
    </div>
</section>