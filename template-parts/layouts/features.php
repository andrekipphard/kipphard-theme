<?php
$headline = get_sub_field('headline');
$subline = get_sub_field('subline');
?>
<div class="row pb-5 pt-5 border-bottom features" id="features">

    <div class="col-12 col-lg-12 pt-5 pb-5">
    
        <div class="row pt-1 pb-1 h6 text-primary text-uppercase">

            <div class="col">

                <?=$subline;?>

            </div>

        </div>

        <div class="row pt-1 pb-1 h2">

            <div class="col">

                 <?=$headline;?> 

            </div>

        </div>

        <div class="row pt-1 pb-1">
    
            <?php if( have_rows('features')):
                while( have_rows('features')): the_row();
                    $feature_image = get_sub_field('feature_image');
                    $feature_headline = get_sub_field('feature_headline');
                    $feature_text = get_sub_field('feature_text');
                    $feature_url = get_sub_field('url');
            ?>

            <div class="col-12 col-md-6 col-lg-4 pt-5">

                <a href="<?= $feature_url; ?>">

                    <div class="card text-bg-dark p-5" style="width: 95%;">

                        <div class="card-body text-white  ps-0">

                            <img src="<?= wp_get_attachment_image_url($feature_image, 'large');?>" class="card-img-top pb-4" alt="...">
                            <h5 class="card-title pt-2 pb-2"><?= $feature_headline; ?></h5>
                            <p class="card-text pb-2"><?= $feature_text; ?></p>
                            <i class="bi bi-arrow-right icon" style="color:#fff; font-size:2rem;"></i>

                        </div>

                    </div>

                </a>

            </div>

            <?php endwhile; ?>

            <?php endif; ?>

        </div>
    
    </div>

</div>
