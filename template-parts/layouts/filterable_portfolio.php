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
        <!-- Add checkboxes for the filters -->

        <div class="row py-3">
            <div class="co text-center">
                <span class="d-inline me-2">Build with:</span>
                <label class="checkbox-inline me-3">
                    <input type="checkbox" class="form-check-input portfolio-filter" value="Custom Code"> Custom Code
                </label>
                <label class="checkbox-inline me-5">
                    <input type="checkbox" class="form-check-input portfolio-filter" value="Elementor"> Elementor
                </label>
                <span class="d-inline me-2">Type:</span>
                <label class="checkbox-inline me-3">
                    <input type="checkbox" class="form-check-input portfolio-filter" value="Website"> Website
                </label>
                <label class="checkbox-inline me-5">
                    <input type="checkbox" class="form-check-input portfolio-filter" value="Webshop"> Webshop
                </label>
                <span class="d-inline me-2">Category:</span>
                <label class="checkbox-inline">
                    <select name="categories" id="categories" form="categoriesform">
                        <option value="all">All</option>
                        <option value="coffee">Coffee</option>
                        <option value="beauty">Beauty</option>
                        <option value="storage">Storage</option>
                        <option value="cyber-security">Cyber Security</option>
                        <option value="real-estate">Real Estate</option>
                        <option value="lawyer">Lawyer</option>
                        <option value="craftsman">Craftsman</option>
                        <option value="car-service">Car Service</option>
                        <option value="dental">Dental</option>
                        <option value="pets">Pets</option>
                        <option value="handmade">Handmade</option>
                        <option value="industrial">Industrial</option>
                    </select>

                </label>
            </div>
        </div>

        <!-- Modify the portfolio items to include data attributes for filtering -->
        <div class="row pb-1 pt-1">
            <?php
            if (have_rows('portfolio')):
                while (have_rows('portfolio')):
                    the_row();
                    $portfolio_category = get_sub_field('portfolio_category');
                    $portfolio_headline = get_sub_field('portfolio_headline');
                    $portfolio_image = get_sub_field('portfolio_image');
                    $portfolio_popup = get_sub_field('portfolio_popup');
                    $portfolio_background_image = get_sub_field('portfolio_background_image');
            ?>
                    <div class="col-12 col-md-6 col-lg-4 pt-3 mb-3 pb-3 portfolio-item" data-categories="<?= $portfolio_category; ?>">
                        <a href="<?= $portfolio_popup; ?>">
                            <div class="card h-100 text-bg-dark p-5" style="width:95%; background-size: contain; background-repeat: no-repeat; background-position: center; background-image: url('<?= wp_get_attachment_image_url($portfolio_background_image, 'large');?>');">
                                <div class="card-body pb-0 pe-0 text-white ps-0">
                                    <img src="<?= wp_get_attachment_image_url($portfolio_image, 'large');?>" class="card-img-top pb-4" alt="...">
                                    <h6 class="card-title pt-2 text-primary text-uppercase fs-6"><?= $portfolio_category; ?></h6>
                                    <h4 class="card-title pt-2"><?= $portfolio_headline; ?><i class="bi bi-arrow-up-right features-icon ms-2 icon" style="color:#fff; font-size:1.25rem;"></i></h4>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>
<!-- JavaScript code to handle the filtering -->
<script>
    // Wait for the document to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Get all the portfolio filter checkboxes
        const filterCheckboxes = document.querySelectorAll('.portfolio-filter');

        // Add event listener to each checkbox
        filterCheckboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', handleFilterChange);
        });

        // Function to handle filter change
        function handleFilterChange() {
            // Get the selected filter values
            const selectedFilters = Array.from(filterCheckboxes)
                .filter(function(checkbox) {
                    return checkbox.checked;
                })
                .map(function(checkbox) {
                    return checkbox.value;
                });

            // Show/hide portfolio items based on selected filters
            const portfolioItems = document.querySelectorAll('.portfolio-item');
            portfolioItems.forEach(function(item) {
                const categories = item.getAttribute('data-categories').split(',');

                if (selectedFilters.length === 0 || selectedFilters.every(function(filter) {
                        return categories.some(function(category) {
                            return category.trim() === filter;
                        });
                    })) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }

    });
</script>
