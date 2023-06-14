// Wait for the document to be ready
document.addEventListener('DOMContentLoaded', function() {
    // Get all the portfolio filter checkboxes
    const filterCheckboxes = document.querySelectorAll('.portfolio-filter');
  
    // Add event listener to each checkbox
    filterCheckboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', handleFilterChange);
    });
  
    // Get all the portfolio filter type checkboxes
    const filterTypeCheckboxes = document.querySelectorAll('.portfolio-filter-type');
  
    // Add event listener to each type checkbox
    filterTypeCheckboxes.forEach(function(checkbox) {
      checkbox.addEventListener('change', handleTypeFilterChange);
    });
  
    // Get the category dropdown
    const categoryDropdown = document.getElementById('categories');
  
    // Add event listener to the category dropdown
    categoryDropdown.addEventListener('change', handleCategoryFilterChange);
  
    // Get the "Reset Filter" button
    const resetButton = document.querySelector('.btn-outline');
  
    // Add event listener to the "Reset Filter" button
    resetButton.addEventListener('click', resetFilters);
  
    // Function to handle filter change
    function handleFilterChange() {
      // Uncheck all other checkboxes in the same group
      filterCheckboxes.forEach(function(checkbox) {
        if (checkbox !== this) {
          checkbox.checked = false;
        }
      }, this);
  
      // Get the selected filter values
      const selectedFilters = getSelectedFilterValues();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItems(selectedFilters);
  
      // Update category dropdown options based on selected filters
      updateCategoryOptions(selectedFilters);
    }
  
    // Function to handle type filter change
    function handleTypeFilterChange() {
      // Uncheck all other checkboxes in the same group
      filterTypeCheckboxes.forEach(function(checkbox) {
        if (checkbox !== this) {
          checkbox.checked = false;
        }
      }, this);
  
      // Get the selected filter values
      const selectedFilters = getSelectedFilterValues();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItems(selectedFilters);
  
      // Update category dropdown options based on selected filters
      updateCategoryOptions(selectedFilters);
    }
  
    // Function to handle category filter change
    function handleCategoryFilterChange() {
      // Get the selected filter values
      const selectedFilters = getSelectedFilterValues();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItems(selectedFilters);
    }
  
    // Function to get the selected filter values
    function getSelectedFilterValues() {
      const selectedFilters = {
        builtWith: [],
        types: [],
        category: ''
      };
  
      // Get the selected built with filter
      selectedFilters.builtWith = Array.from(filterCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
  
      // Get the selected type filter
      selectedFilters.types = Array.from(filterTypeCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
  
      // Get the selected category filter
      selectedFilters.category = categoryDropdown.value;
  
      return selectedFilters;
    }
  
    // Function to show/hide portfolio items based on selected filters
    function filterPortfolioItems(selectedFilters) {
      const portfolioItems = document.querySelectorAll('.portfolio-item');
      portfolioItems.forEach(function(item) {
        const builtWith = item.getAttribute('data-built-with').split(',');
        const types = item.getAttribute('data-types').split(',');
        const categories = item.getAttribute('data-categories').split(',');
  
        const builtWithMatch = selectedFilters.builtWith.length === 0 || selectedFilters.builtWith.some(filter => builtWith.includes(filter));
        const typesMatch = selectedFilters.types.length === 0 || selectedFilters.types.some(filter => types.includes(filter));
        const categoryMatch = selectedFilters.category === 'all' || categories.includes(selectedFilters.category);
  
        if (builtWithMatch && typesMatch && categoryMatch) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    }
  
    // Function to update category dropdown options based on selected filters
    function updateCategoryOptions(selectedFilters) {
      const categoryOptions = Array.from(categoryDropdown.options);
  
      categoryOptions.forEach(function(option) {
        const category = option.value;
  
        // Check if the category is compatible with the selected filters
        const isCompatible = checkCategoryCompatibility(category, selectedFilters);
  
        // Disable incompatible options and enable compatible options
        if (isCompatible) {
          option.disabled = false;
        } else {
          option.disabled = true;
          // Deselect disabled options
          if (category === selectedFilters.category) {
            categoryDropdown.value = 'all';
          }
        }
      });
    }
  
    // Function to check if a category is compatible with the selected filters
    function checkCategoryCompatibility(category, selectedFilters) {
      const portfolioItems = document.querySelectorAll('.portfolio-item');
  
      for (let i = 0; i < portfolioItems.length; i++) {
        const item = portfolioItems[i];
        const builtWith = item.getAttribute('data-built-with').split(',');
        const types = item.getAttribute('data-types').split(',');
  
        const builtWithMatch = selectedFilters.builtWith.length === 0 || selectedFilters.builtWith.every(filter => builtWith.includes(filter));
        const typesMatch = selectedFilters.types.length === 0 || selectedFilters.types.every(filter => types.includes(filter));
        const categoryMatch = category === 'all' || item.getAttribute('data-categories').split(',').includes(category);
  
        if (builtWithMatch && typesMatch && categoryMatch) {
          return true;
        }
      }
  
      return false;
    }
  
    // Function to reset the filters
    function resetFilters() {
      // Uncheck all filter checkboxes
      filterCheckboxes.forEach(function(checkbox) {
        checkbox.checked = false;
      });
  
      // Uncheck all type checkboxes
      filterTypeCheckboxes.forEach(function(checkbox) {
        checkbox.checked = false;
      });
  
      // Reset the category dropdown to the default value
      categoryDropdown.value = 'all';
  
      // Reset the selected filters
      const selectedFilters = getSelectedFilterValues();
  
      // Show all portfolio items
      const portfolioItems = document.querySelectorAll('.portfolio-item');
      portfolioItems.forEach(function(item) {
        item.style.display = 'block';
      });
  
      // Update category dropdown options based on selected filters
      updateCategoryOptions(selectedFilters);
    }
  });  