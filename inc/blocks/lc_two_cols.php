<?php
$bg = get_field('background') == 'Blue' ? 'bg-blue' : '';
$text = get_field('background') == 'Blue' ? 'text-white' : '';
?> 
<section class="two_cols py-5 <?=$bg?> <?=$text?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 my-auto">
                <?=get_field('left')?>
            </div>
            <div class="col-lg-6 my-auto">
                <?=get_field('right')?>
            </div>
        </div>
    </div>
</section>