<?php
$headline = get_sub_field('headline');
$subline = get_sub_field('subline');
?>
<div class="row py-3 py-lg-5 border-bottom portfolio" id="portfolio">
    <div class="col-12 col-lg-12 py-3 py-lg-5">
        <div class="row pb-1 pt-1">
            <div class="col">
                <h3 class="h6 text-primary text-center text-uppercase"><?= $subline; ?></h3>
            </div>
        </div>
        <div class="row pb-1 pt-1">
            <div class="col">
                <h2 class="h2 text-center"><?= $headline; ?></h2>
            </div>
        </div>
        <!-- Add checkboxes for the filters -->

        <div class="row py-3 desktop-filter">
            <div class="col text-center">
                <span class="d-inline me-2 ms-5 text-white">Build with:</span>
                <?php $built_with_list = []; // Create an empty array to store the existing values
                if (have_rows('portfolio')):
                    while (have_rows('portfolio')):
                        the_row();
                        $portfolio_built_with = get_sub_field('portfolio_built_with');
                        if (!in_array($portfolio_built_with, $built_with_list)) {
                            // Check if the value does not exist in the array
                            $built_with_list[] = $portfolio_built_with; // Add the value to the array
                            ?>
                            <label class="checkbox-inline me-3 text-white">
                                <input type="checkbox" class="form-check-input portfolio-filter-desktop" value="<?= $portfolio_built_with; ?>"><?= $portfolio_built_with; ?>
                            </label>
                            <?php
                        }
                    endwhile;
                endif;
                ?>
                <span class="d-inline me-2 ms-5 text-white">Type:</span>
                <?php $type_list = []; // Create an empty array to store the existing values
                if (have_rows('portfolio')):
                    while (have_rows('portfolio')):
                        the_row();
                        $portfolio_type = get_sub_field('portfolio_type');
                        if (!in_array($portfolio_type, $type_list)) {
                            // Check if the value does not exist in the array
                            $type_list[] = $portfolio_type; // Add the value to the array
                            ?>
                            <label class="checkbox-inline me-3 text-white">
                                <input type="checkbox" class="form-check-input portfolio-filter-type-desktop" value="<?= $portfolio_type; ?>"><?= $portfolio_type; ?>
                            </label>
                            <?php
                        }
                    endwhile;
                endif;
                ?>
                <span class="d-inline me-2 ms-5 text-white">Category:</span>
                <label class="checkbox-inline text-white">
                    <select name="categories" id="categories-desktop" form="categoriesform">
                        <option value="all">All</option>
                        <?php $category_list = []; // Create an empty array to store the existing values
                        if (have_rows('portfolio')):
                            while (have_rows('portfolio')):
                                the_row();
                                $portfolio_category = get_sub_field('portfolio_category');
                                
                                if (!in_array($portfolio_category, $category_list)) {
                                    // Check if the value does not exist in the array
                                    $category_list[] = $portfolio_category; // Add the value to the array
                                }
                            endwhile;
                        endif;
                        sort($category_list); // Sort the array alphabetically
                        foreach ($category_list as $category) {
                            ?>
                            <option value="<?= $category; ?>"><?= $category; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </label>
                <button class="btn btn-outline ms-5 text-primary reset-desktop">Reset Filter</button>
            </div>
        </div>
        <div class="row py-3 mobile-filter">
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sidebarModal">
                    Filter
                </button>
            </div>
            <div class="col-6 text-end">
                <button class="btn btn-outline ms-5 text-primary reset-mobile">Reset Filter</button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="sidebarModal" tabindex="-1" aria-labelledby="sidebarModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="sidebarModalLabel">Filter</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row py-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <span class="d-inline me-2 text-white">Build with:</span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <?php $built_with_list = []; // Create an empty array to store the existing values
                                            if (have_rows('portfolio')):
                                                while (have_rows('portfolio')):
                                                    the_row();
                                                    $portfolio_built_with = get_sub_field('portfolio_built_with');
                                                    if (!in_array($portfolio_built_with, $built_with_list)) {
                                                        // Check if the value does not exist in the array
                                                        $built_with_list[] = $portfolio_built_with; // Add the value to the array
                                                        ?>
                                                        <label class="checkbox-inline me-3 text-white">
                                                            <input type="checkbox" class="form-check-input portfolio-filter-mobile" value="<?= $portfolio_built_with; ?>"><?= $portfolio_built_with; ?>
                                                        </label>
                                                        <?php
                                                    }
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <span class="d-inline me-2 text-white">Type:</span>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <?php $type_list = []; // Create an empty array to store the existing values
                                            if (have_rows('portfolio')):
                                                while (have_rows('portfolio')):
                                                    the_row();
                                                    $portfolio_type = get_sub_field('portfolio_type');
                                                    if (!in_array($portfolio_type, $type_list)) {
                                                        // Check if the value does not exist in the array
                                                        $type_list[] = $portfolio_type; // Add the value to the array
                                                        ?>
                                                        <label class="checkbox-inline me-3 text-white">
                                                            <input type="checkbox" class="form-check-input portfolio-filter-type-mobile" value="<?= $portfolio_type; ?>"><?= $portfolio_type; ?>
                                                        </label>
                                                        <?php
                                                    }
                                                endwhile;
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="row py-3">
                                <div class="col">
                                    <span class="d-inline me-2 text-white">Category:</span>
                                    <label class="checkbox-inline text-white">
                                        <select name="categories" id="categories-mobile" form="categoriesform">
                                            <option value="all">All</option>
                                            <?php $category_list = []; // Create an empty array to store the existing values
                                            if (have_rows('portfolio')):
                                                while (have_rows('portfolio')):
                                                    the_row();
                                                    $portfolio_category = get_sub_field('portfolio_category');
                                                    
                                                    if (!in_array($portfolio_category, $category_list)) {
                                                        // Check if the value does not exist in the array
                                                        $category_list[] = $portfolio_category; // Add the value to the array
                                                    }
                                                endwhile;
                                            endif;
                                            sort($category_list); // Sort the array alphabetically
                                            foreach ($category_list as $category) {
                                                ?>
                                                <option value="<?= $category; ?>"><?= $category; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modify the portfolio items to include data attributes for filtering -->
        <div class="row pb-1 pt-1">
            <?php
            if (have_rows('portfolio')):
                while (have_rows('portfolio')):
                    the_row();
                    $portfolio_built_with = get_sub_field('portfolio_built_with');
                    $portfolio_type = get_sub_field('portfolio_type');
                    $portfolio_category = get_sub_field('portfolio_category');
                    $portfolio_headline = get_sub_field('portfolio_headline');
                    $portfolio_image = get_sub_field('portfolio_image');
                    $alt_text = get_post_meta($portfolio_image , '_wp_attachment_image_alt', true);
                    $portfolio_popup = get_sub_field('portfolio_popup');
                    $portfolio_background_image = get_sub_field('portfolio_background_image');
                    $portfolio_url = get_sub_field('portfolio_url');
            ?>
                    <div class="col-12 col-md-6 col-lg-4 pt-3 pb-3 portfolio-item" data-built-with="<?= $portfolio_built_with; ?>" data-types="<?= $portfolio_type; ?>" data-categories="<?= $portfolio_category; ?>">
                        <?php if($portfolio_popup):?><a target="_blank" href="<?= $portfolio_popup; ?>"><?php endif;?>

                            <div class="card h-100 text-bg-dark p-lg-5 p-4" style="background-size: contain; background-repeat: no-repeat; background-position: center; background-image: url('<?= wp_get_attachment_image_url($portfolio_background_image, 'large');?>');">
                                <div class="card-body pb-0 pe-0 text-white ps-0">
                                    <img src="<?= wp_get_attachment_image_url($portfolio_image, 'large');?>" class="card-img-top pb-4" alt="<?= $alt_text;?>">
                                    <h5 class="card-title h6 pt-2 text-primary text-uppercase fs-6"><?= $portfolio_built_with; ?>, <?= $portfolio_type; ?>, <?= $portfolio_category; ?></h5>
                                    <a target="_blank"<?php if($portfolio_url):?> href="<?= $portfolio_url;?>"<?php endif;?> <?php if(!$portfolio_url):?> href="#portfolioComingSoonModal" data-bs-toggle="modal" data-bs-target="#portfolioComingSoonModal"<?php endif;?>><h4 class="card-title pt-2"><?= $portfolio_headline; ?><i class="bi bi-arrow-up-right features-icon ms-2 icon" style="color:#fff; font-size:1.25rem;"></i></h4></a>
                                </div>
                            </div>
                            <?php if($portfolio_popup):?></a><?php endif;?>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
            <?php get_template_part('template-parts/modals/coming_soon');?>
        </div>
    </div>
</div>