<?php
$headline = get_sub_field('headline');
$subline = get_sub_field('subline');
$text = get_sub_field('text');
?>
<div class="row pt-5 pb-5 border-bottom">

    <div class="col-12 col-lg-6 pt-5 pb-5 pe-5">

        <div class="row pt-1 pb-1 h6 text-primary text-uppercase">

            <div class="col">
                <?= $subline;?>
            </div>

        </div>

        <div class="row pt-1 pb-1 h1">

            <div class="col">
                <?= $headline;?>
            </div>

        </div>

        <div class="row pt-4 pb-4">

            <div class="col">
                <p class="text-light"><?= $text;?></p>
            </div>

        </div>

        <div class="row">

            <div class="col">

                    <p class="text-light fw-light social-media-hero text-white">Social Media</p>
                    <?php if( have_rows('social_media')): ?>
                    <ul class="list-group list-group-horizontal list-hero">
                        <?php while( have_rows('social_media') ): the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                        ?>
                        <a href="<?= $url; ?>"> <li class="list-group-item bg-black rounded me-2 shadow">
                            <i class="bi bi-<?= $icon; ?> rounded-circle bg-dark text-primary"></i>
                        </li></a>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>

            </div>

            <div class="col">

                <?php if( have_rows('skills')): ?>
                    <p class="text-light fw-light best-skills-hero">Best Skills</p>
                    
                        <ul class="list-group list-group-horizontal list-hero">
                        <?php while( have_rows('skills') ): the_row();
                            $icon = get_sub_field('icon');
                        ?>
                        <li class="list-group-item bg-black rounded me-2 shadow">
                            <i class="bi bi-<?= $icon; ?> rounded-circle bg-dark text-primary"></i>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

            </div>

        </div>

    </div>

    <div class="col-12 col-lg-6">
        <div id="heroSliderIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php if(have_rows('slider')):?>
                    <?php while(have_rows('slider')): the_row();?>
                        <button type="button" data-bs-target="#heroSliderIndicators" data-bs-slide-to="<?php $rowIndex = get_row_index() - 1; echo $rowIndex;?>" <?php if(get_row_index()==1):?>class="active" <?php endif;?>aria-current="true" aria-label="Slide <?php echo get_row_index();?>"></button>
                    <?php endwhile;?>
                <?php endif;?>
            </div>
            <div class="carousel-inner">
                <?php if(have_rows('slider')):?>
                    <?php while(have_rows('slider')): the_row();
                        $mobile_image = get_sub_field('mobile_image');
                        $laptop_image = get_sub_field('laptop_image');?>
                        <div class="carousel-item<?php if(get_row_index()==1):?> active<?php endif;?> text-end" style="background-image:url('<?= wp_get_attachment_image_url($laptop_image, 'large');?>'); background-size:contain; background-repeat:no-repeat; background-position:center;">
                            <img src="<?= wp_get_attachment_image_url($mobile_image, 'large');?>" style="width:300px">
                        </div>
                    <?php endwhile;?>
                <?php endif;?>
            </div>
        </div>
    </div>

</div>
