// Wait for the document to be ready
document.addEventListener('DOMContentLoaded', function() {
    // Get all the portfolio filter checkboxes
    const filterCheckboxesMobile = document.querySelectorAll('.portfolio-filter-mobile');
  
    // Add event listener to each checkbox
    filterCheckboxesMobile.forEach(function(checkbox) {
      checkbox.addEventListener('change', handleFilterChangeMobile);
    });
  
    // Get all the portfolio filter type checkboxes
    const filterTypeCheckboxesMobile = document.querySelectorAll('.portfolio-filter-type-mobile');
  
    // Add event listener to each type checkbox
    filterTypeCheckboxesMobile.forEach(function(checkbox) {
      checkbox.addEventListener('change', handleTypeFilterChangeMobile);
    });
  
    // Get the category dropdown
    const categoryDropdownMobile = document.getElementById('categories-mobile');
  
    // Add event listener to the category dropdown
    categoryDropdownMobile.addEventListener('change', handleCategoryFilterChangeMobile);
  
    // Get the "Reset Filter" button
    const resetButtonMobile = document.querySelector('.reset-mobile');
  
    // Add event listener to the "Reset Filter" button
    resetButtonMobile.addEventListener('click', resetFiltersMobile);
  
    // Function to handle filter change
    function handleFilterChangeMobile() {
      // Uncheck all other checkboxes in the same group
      filterCheckboxesMobile.forEach(function(checkbox) {
        if (checkbox !== this) {
          checkbox.checked = false;
        }
      }, this);
  
      // Get the selected filter values
      const selectedFiltersMobile = getSelectedFilterValuesMobile();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItemsMobile(selectedFiltersMobile);
  
      // Update category dropdown options based on selected filters
      updateCategoryOptionsMobile(selectedFiltersMobile);
    }
  
    // Function to handle type filter change
    function handleTypeFilterChangeMobile() {
      // Uncheck all other checkboxes in the same group
      filterTypeCheckboxesMobile.forEach(function(checkbox) {
        if (checkbox !== this) {
          checkbox.checked = false;
        }
      }, this);
  
      // Get the selected filter values
      const selectedFiltersMobile = getSelectedFilterValuesMobile();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItemsMobile(selectedFiltersMobile);
  
      // Update category dropdown options based on selected filters
      updateCategoryOptionsMobile(selectedFiltersMobile);
    }
  
    // Function to handle category filter change
    function handleCategoryFilterChangeMobile() {
      // Get the selected filter values
      const selectedFiltersMobile = getSelectedFilterValuesMobile();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItemsMobile(selectedFiltersMobile);
    }
  
    // Function to get the selected filter values
    function getSelectedFilterValuesMobile() {
      const selectedFiltersMobile = {
        builtWith: [],
        types: [],
        category: ''
      };
  
      // Get the selected built with filter
      selectedFiltersMobile.builtWith = Array.from(filterCheckboxesMobile)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
  
      // Get the selected type filter
      selectedFiltersMobile.types = Array.from(filterTypeCheckboxesMobile)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
  
      // Get the selected category filter
      selectedFiltersMobile.category = categoryDropdownMobile.value;
  
      return selectedFiltersMobile;
    }
  
    // Function to show/hide portfolio items based on selected filters
    function filterPortfolioItemsMobile(selectedFiltersMobile) {
      const portfolioItems = document.querySelectorAll('.portfolio-item');
      portfolioItems.forEach(function(item) {
        const builtWith = item.getAttribute('data-built-with').split(',');
        const types = item.getAttribute('data-types').split(',');
        const categories = item.getAttribute('data-categories').split(',');
  
        const builtWithMatch = selectedFiltersMobile.builtWith.length === 0 || selectedFiltersMobile.builtWith.some(filter => builtWith.includes(filter));
        const typesMatch = selectedFiltersMobile.types.length === 0 || selectedFiltersMobile.types.some(filter => types.includes(filter));
        const categoryMatch = selectedFiltersMobile.category === 'all' || categories.includes(selectedFiltersMobile.category);
  
        if (builtWithMatch && typesMatch && categoryMatch) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    }
  
    // Function to update category dropdown options based on selected filters
    function updateCategoryOptionsMobile(selectedFiltersMobile) {
      const categoryOptions = Array.from(categoryDropdownMobile.options);
  
      categoryOptions.forEach(function(option) {
        const category = option.value;
  
        // Check if the category is compatible with the selected filters
        const isCompatible = checkCategoryCompatibilityMobile(category, selectedFiltersMobile);
  
        // Disable incompatible options and enable compatible options
        if (isCompatible) {
          option.disabled = false;
        } else {
          option.disabled = true;
          // Deselect disabled options
          if (category === selectedFiltersMobile.category) {
            categoryDropdownMobile.value = 'all';
          }
        }
      });
    }
  
    // Function to check if a category is compatible with the selected filters
    function checkCategoryCompatibilityMobile(category, selectedFiltersMobile) {
      const portfolioItems = document.querySelectorAll('.portfolio-item');
  
      for (let i = 0; i < portfolioItems.length; i++) {
        const item = portfolioItems[i];
        const builtWith = item.getAttribute('data-built-with').split(',');
        const types = item.getAttribute('data-types').split(',');
  
        const builtWithMatch = selectedFiltersMobile.builtWith.length === 0 || selectedFiltersMobile.builtWith.every(filter => builtWith.includes(filter));
        const typesMatch = selectedFiltersMobile.types.length === 0 || selectedFiltersMobile.types.every(filter => types.includes(filter));
        const categoryMatch = category === 'all' || item.getAttribute('data-categories').split(',').includes(category);
  
        if (builtWithMatch && typesMatch && categoryMatch) {
          return true;
        }
      }
  
      return false;
    }
  
    // Function to reset the filters
    function resetFiltersMobile() {
      // Uncheck all filter checkboxes
      filterCheckboxesMobile.forEach(function(checkbox) {
        checkbox.checked = false;
      });
  
      // Uncheck all type checkboxes
      filterTypeCheckboxesMobile.forEach(function(checkbox) {
        checkbox.checked = false;
      });
  
      // Reset the category dropdown to the default value
      categoryDropdownMobile.value = 'all';
  
      // Reset the selected filters
      const selectedFiltersMobile = getSelectedFilterValuesMobile();
  
      // Show all portfolio items
      const portfolioItems = document.querySelectorAll('.portfolio-item');
      portfolioItems.forEach(function(item) {
        item.style.display = 'block';
      });
  
      // Update category dropdown options based on selected filters
      updateCategoryOptionsMobile(selectedFiltersMobile);
    }
  });  