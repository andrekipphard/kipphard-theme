<?php
    $headline = get_sub_field('headline');
    $subline = get_sub_field('subline');
    $text = get_sub_field('text');
?>
<div class="row pb-5 pt-5 border-bottom toolstack" id="toolstack">
    <div class="col-12 col-lg-12 pt-5 pb-5">
        <div class="row pb-1 pt-2 h6 text-primary text-center text-uppercase">

            <div class="col">

                <?= $subline;?>

            </div>

        </div>
        <div class="row pb-1 pt-1 h2 text-center">

            <div class="col">

                <?= $headline;?>
            
            </div>

        </div>
        <div class="row pt-4 pb-4">

            <div class="col text-center">
                <p class="text-light"><?= $text;?></p>
            </div>

        </div>
        <?php if(have_rows('toolstack')):?>
            <div class="row pt-4 pb-4 d-flex justify-content-center">
                
                <?php while(have_rows('toolstack')):the_row();
                    $image = get_sub_field('tool');?>
                    <div class="col-2 d-flex align-items-center justify-content-center">
                        <div class="card text-bg-dark p-5 mb-4">
                            <img src="<?= wp_get_attachment_image_url($image, 'large');?>" class="img-fluid">
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        <?php endif;?>
    </div>
</div>