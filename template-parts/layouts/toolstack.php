<?php
    $headline = get_sub_field('headline');
    $subline = get_sub_field('subline');
    $text = get_sub_field('text');
?>
<div class="row py-3 py-lg-5 border-bottom toolstack" id="toolstack">
    <div class="col-12 col-lg-12 py-3 py-lg-5">
        <div class="row pb-1 pt-2">

            <div class="col">

                <h3 class="h6 text-primary text-center text-uppercase"><?= $subline;?></h3>

            </div>

        </div>
        <div class="row pb-1 pt-1">

            <div class="col">

                <h2 class="h2 text-center"><?= $headline;?></h2>
            
            </div>

        </div>
        <div class="row py-lg-0">

            <div class="col text-center">
                <p class="text-light"><?= $text;?></p>
            </div>

        </div>
        <?php if(have_rows('toolstack')):?>
            <div class="row pt-4 pb-lg-4 d-flex justify-content-center">
                
                <?php while(have_rows('toolstack')):the_row();
                    $image = get_sub_field('tool');
                    $alt_text = get_post_meta($image , '_wp_attachment_image_alt', true);?>
                    <div class="col-6 col-lg-2 d-flex align-items-center justify-content-center">
                        <div class="card text-bg-dark p-5 mb-4">
                            <img src="<?= wp_get_attachment_image_url($image, 'large');?>" class="img-fluid" alt="<?= $alt_text;?>">
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        <?php endif;?>
    </div>
</div>