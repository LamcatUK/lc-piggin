<?php
/**
 * The main template file
 *
 * @package cb-mvp
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main">
    <!-- hero -->
    <section class="hero">
        <div id="carousel" class="carousel">
            <div class="carousel-inner single">
                <div class="carousel-item h-100 active">
                    <div class="row h-100">
                        <div class="col-md-5">
                            <div class="carousel_overlay carousel_overlay--beige">
                                <div class="carousel__title">
                                    Sheldrake NEWS
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 carousel__image" style="background-image:url(<?=wp_get_attachment_image_url( get_field('news_hero_image','options'), 'full' )?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-5">
        <div id="blogs">
            <div class="row g-5">
            <?php
            while (have_posts()) {
                the_post();
                $cats = get_the_category();
                $cat = $cats[0]->slug;
                ?>
                <div class="col-lg-6 blog-item">
                    <a href="<?=get_the_permalink()?>" class="news__inner">
                        <div class="news__title news__title--<?=$cat?>"><?=get_the_title()?></div>
                        <div class="news__date"><strong>Date:</strong> <?=get_the_date('j M, Y')?></div>
                        <div class="news__intro"><?=wp_trim_words(get_the_content(),30)?></div>
                        <div class="news__link">Read more</div>
                    </a>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
        <!-- <div class="scroller-status">
            <div class="loader-ellips infinite-scroll-request">
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
            </div>
        </div> -->
        <?=numeric_posts_nav()?>

        <!-- <nav class="pagination">
            <div class="prev-posts-link alignright"><?php echo get_next_posts_link('Older Entries', $posts->max_num_pages); ?></div>
            <div class="next-posts-link alignleft"><?php echo get_previous_posts_link('Newer Entries'); ?></div>
        </nav> -->
    </div>
</section>
</main>
<?php

get_footer();
