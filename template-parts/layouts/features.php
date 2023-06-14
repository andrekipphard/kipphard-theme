<?php
$headline = get_sub_field('headline');
$subline = get_sub_field('subline');
$text = get_sub_field('text');
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
        <div class="row pt-4 pb-4">

            <div class="col">
                <p class="text-light"><?= $text;?></p>
            </div>

        </div>

        <div class="row pt-1 pb-1">
    
            <?php if( have_rows('features')):
                while( have_rows('features')): the_row();
                    $feature_icon = get_sub_field('feature_icon');
                    $feature_headline = get_sub_field('feature_headline');
                    $feature_text = get_sub_field('feature_text');
                    $feature_url = get_sub_field('url');
            ?>

            <div class="col-12 col-md-6 col-lg-4 pt-5">

                <a href="#contact">

                    <div class="card h-100 text-bg-dark p-5" style="width: 95%;">

                        <div class="card-body d-flex flex-column ps-0">
                            <i class="bi text-primary fs-1 bi-<?=$feature_icon;?>"></i>
                            <div class="h-100 d-flex justify-content-between flex-column">
                                <h5 class="card-title pt-2 pb-2"><?= $feature_headline; ?></h5>
                                <div class="d-flex justify-content-between flex-column">
                                    <p class="card-text pb-2"><?= $feature_text; ?></p>
                                    <i class="bi bi-arrow-right icon d-flex align-items-center text-primary" style="font-size:1.5rem;"><span class="ms-1 text-primary" style="font-size:1rem; font-style:normal;">Contact me now</span></i>
                                </div>
                            </div>
                            

                        </div>

                    </div>

                </a>

            </div>

            <?php endwhile; ?>

            <?php endif; ?>

        </div>
    
    </div>

</div>
