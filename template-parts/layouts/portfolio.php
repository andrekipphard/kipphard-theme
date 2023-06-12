<?php
$headline = get_sub_field('headline');
$subline = get_sub_field('subline');
?>
<div class="row pb-5 pt-5 border-bottom portfolio" id="portfolio">

    <div class="col-12 col-lg-12 pt-5 pb-5">

        <div class="row pb-1 pt-1 h6 text-primary text-center text-uppercase">

            <div class="col">

                <?= $subline; ?>

            </div>

        </div>

        <div class="row pb-1 pt-1 h2 text-center">

            <div class="col">

                <?= $headline; ?>

            </div>

        </div>

        <div class="row pb-1 pt-1">

            <?php if( have_rows('portfolio')):
                while( have_rows('portfolio')): the_row();
                $portfolio_category = get_sub_field('portfolio_category');
                $portfolio_headline = get_sub_field('portfolio_headline');
                $portfolio_image = get_sub_field('portfolio_image');
                $portfolio_popup = get_sub_field('portfolio_popup');
            ?>

            <div class="col-12 col-md-6 col-lg-4 pt-5">

                <a href="<?= $portfolio_popup; ?>">

                    <div class="card text-bg-dark p-5" style="width:95%;">

                        <div class="card-body text-white ps-0">
                            <img src="<?= wp_get_attachment_image_url($portfolio_image, 'large');?>" class="card-img-top pb-4" alt="...">
                            <h6 class="card-title pt-2 text-primary text-uppercase fs-6"><?=$portfolio_category;?></h5>
                            <h4 class="card-title pt-2 pb-2"><?= $portfolio_headline; ?><i class="bi bi-arrow-up-right features-icon ms-2 icon" style="color:#fff; font-size:1.25rem;"></i></h4>

                        </div>

                    </div>

                </a>

            </div>

            <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </div>

</div>
