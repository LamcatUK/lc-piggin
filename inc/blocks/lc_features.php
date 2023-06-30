<?php
if (get_field('id')) {
    ?>
<a class="anchor" id="<?=get_field('id')?>"></a>
    <?php
}
?>
<section class="features py-5">
    <div class="container">
        <h2 class="text-center mb-4"><?=get_field('title')?></h2>
        <div class="row justify-content-center g-4">
            <div class="col-md-6 col-lg-4 text-center">
                <?=wp_get_attachment_image(get_field('image_1'),'large')?>
                <h3><?=get_field('title_1')?></h3>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <?=wp_get_attachment_image(get_field('image_2'),'large')?>
                <h3><?=get_field('title_2')?></h3>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <?=wp_get_attachment_image(get_field('image_3'),'large')?>
                <h3><?=get_field('title_3')?></h3>
            </div>
        </div>
    </div>
</section>