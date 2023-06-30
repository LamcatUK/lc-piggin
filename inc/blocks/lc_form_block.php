<?php
$whatsappURL = 'whatsapp://send?text='.$sb_title . ' ' . $sb_url;
$bg = get_field('background') == 'Grey' ? 'bg-grey' : '';
if (get_field('id')) {
    ?>
<a class="anchor" id="<?=get_field('id')?>"></a>
    <?php
}
?>
<section class="form_block py-5 <?=$bg?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-4"><?=get_field('content')?></div>
                <div class="row g-5 mb-4">
                    <div class="col-6">
                        <ul class="fa-ul">
                            <li class="mb-2"><span class="fa-li"><i class="fa fa-phone"></i></span><a href="tel:<?=parse_phone(get_field('contact_phone','options'))?>"><?=get_field('contact_phone','options')?></a></li>
                            <li class="mb-2"><span class="fa-li"><i class="fa fa-mobile"></i></span><a href="tel:<?=parse_phone(get_field('contact_mobile','options'))?>"><?=get_field('contact_mobile','options')?></a></li>
                            <li class="mb-2"><span class="fa-li"><i class="fa fa-envelope"></i></span><a href="mailto:<?=get_field('contact_email','options')?>"><?=get_field('contact_email','options')?></a></li>
                            <li><span class="fa-li"><i class="fa fa-whatsapp"></i></span><a href="https://api.whatsapp.com/send?phone=<?=parse_phone(get_field('contact_mobile','options'))?>&text=Hi,%20I%27m%20contacting%20you%20from%20the%20Piggin%27%20Good%20website.">WhatsApp</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa fa-map-marker"></i></span><?=get_field('address','options')?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?=do_shortcode('[contact-form-7 id="' . get_field('form_id') . '"]')?>
            </div>
        </div>
    </div>
</section>