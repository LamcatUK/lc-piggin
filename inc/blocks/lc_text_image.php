<?php
$order_image = (get_field('order') == 'text_left') ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
$order_text = (get_field('order') == 'text_left') ? 'order-2 order-lg-1' : 'order-2 order-lg-2';

$cols_text = (get_field('split') == '5050') ? 'col-lg-6' : 'col-lg-8';
$cols_image = (get_field('split') == '5050') ? 'col-lg-6' : 'col-lg-4';

$bg = (get_field('colour') == 'dark') ? 'bg--grey' : '';
$pad = (get_field('colour') == 'dark') ? 'py-5' : 'py-5';

if (get_field('id')) {
    ?>
<a class="anchor" id="<?=get_field('id')?>"></a>
    <?php
}
?>    
<!-- text_image -->
<section class="text_image <?=$pad?> <?=$bg?>">
    <div class="container">
        <div class="row g-5">
            <div class="<?=$cols_text?> <?=$order_text?>">
                <div class="text_image__content">
                    <div class="text_image__inner">
                        <?php
                        if (get_field('title')) {
                            echo '<h2>' . get_field('title') . '</h2>';
                        }
                        ?>
                        <?=get_field('content')?>
                        <?php
                        if (get_field('cta')) {
                            $cta = get_field('cta');
                            ?>
                        <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-primary"><?=$cta['title']?></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="<?=$cols_image?> text_image__image text-center <?=$order_image?>">
                <?=wp_get_attachment_image(get_field('image'),'full',false,array('class'=>'img-fluid'))?>
            </div>
        </div>
    </div>
</section>