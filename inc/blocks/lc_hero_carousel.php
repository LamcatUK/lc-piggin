<!-- hero -->
<section class="hero">
    <div id="carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-indicators">
                <?php
                if (count(get_field('slides')) > 1) {
                    $active = 'active';
                    for ($i = 0; $i < count(get_field('slides')); $i++) {
                        ?>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="<?=$i?>" class="<?=$active?>"></button>
                        <?php
                        $active = '';
                    }
                }
                ?>
            </div>
            <?php
            $active = 'active';
            while (have_rows('slides')) {
                the_row();
                ?>
            <div class="carousel-item h-100 <?=$active?>">
                <div class="carousel__image" style="background-image:url(<?=wp_get_attachment_image_url( get_sub_field('slidebg'), 'full' )?>">
                <div class="carousel__overlay"></div>
                    <div class="container">
                        <div class="row h-100">
                            <div class="col-lg-6 my-auto">
                                <div class="carousel__content">
                                    <h1 class="carousel__title"><?=get_sub_field('title')?></h1>
                                    <div class="carousel__subtitle mb-2"><?=get_sub_field('content')?></div>
                                    <?php
                                    if (get_sub_field('cta')) {
                                        $cta = get_sub_field('cta');
                                        ?>
                                    <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-primary"><?=$cta['title']?></a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php
                $active = '';
            }
            ?>
        </div>
    </div>
</section>