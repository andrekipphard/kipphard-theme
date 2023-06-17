<?php
$headline = get_sub_field('headline');
$subline = get_sub_field('subline');
$text = get_sub_field('text');
?>
<div class="row py-3 py-lg-5 border-bottom features" id="services">

    <div class="col-12 col-lg-12 py-3 py-lg-5">
    
        <div class="row pt-1 pb-1 text-primary text-uppercase">

            <div class="col">

                <h3 class="h6 text-primary text-uppercase"><?=$subline;?></h3>

            </div>

        </div>

        <div class="row pt-1 pb-1">

            <div class="col">

                <h2 class="h2"><?=$headline;?></h2>

            </div>

        </div>
        <div class="row py-lg-0">

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

            <div class="col-12 col-md-6 col-lg-4 pt-lg-5 pt-3 mb-3 mb-md-2 mb-lg-0">

                <a href="#contact" aria-label="Go to contact section">

                    <div class="card h-100 text-bg-dark p-lg-5 p-4">

                        <div class="card-body d-flex flex-column ps-0">
                            <i class="bi text-primary fs-1 bi-<?=$feature_icon;?>"></i>
                            <div class="h-100 d-flex justify-content-between flex-column">
                                <h4 class="card-title pt-2 pb-2 h5"><?= $feature_headline; ?></h4>
                                <div class="d-flex justify-content-between flex-column">
                                    <p class="card-text pb-2"><?= $feature_text; ?></p>
                                    <i class="bi bi-arrow-right icon d-flex align-items-center text-primary mb-3 mb-lg-0" style="font-size:1.5rem;"><span class="ms-1 text-primary" style="font-size:1rem; font-style:normal;">Contact me now</span></i>
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
