<?php
$image = get_sub_field('background_image');
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

                    <p class="text-light fw-light social-media-hero">Social Media</p>
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

                    <p class="text-light fw-light best-skills-hero">Best Skills</p>
                    <?php if( have_rows('skills')): ?>
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
        <?= wp_get_attachment_image( $image, 'large'); ?>
    </div>

</div>
