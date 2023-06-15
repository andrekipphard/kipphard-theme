// Wait for the document to be ready
document.addEventListener('DOMContentLoaded', function() {
    // Get all the portfolio filter checkboxes
    const filterCheckboxesDesktop = document.querySelectorAll('.portfolio-filter-desktop');
  
    // Add event listener to each checkbox
    filterCheckboxesDesktop.forEach(function(checkbox) {
      checkbox.addEventListener('change', handleFilterChangeDesktop);
    });
  
    // Get all the portfolio filter type checkboxes
    const filterTypeCheckboxesDesktop = document.querySelectorAll('.portfolio-filter-type-desktop');
  
    // Add event listener to each type checkbox
    filterTypeCheckboxesDesktop.forEach(function(checkbox) {
      checkbox.addEventListener('change', handleTypeFilterChangeDesktop);
    });
  
    // Get the category dropdown
    const categoryDropdownDesktop = document.getElementById('categories-desktop');
  
    // Add event listener to the category dropdown
    categoryDropdownDesktop.addEventListener('change', handleCategoryFilterChangeDesktop);
  
    // Get the "Reset Filter" button
    const resetButtonDesktop = document.querySelector('.reset-desktop');
  
    // Add event listener to the "Reset Filter" button
    resetButtonDesktop.addEventListener('click', resetFiltersDesktop);
  
    // Function to handle filter change
    function handleFilterChangeDesktop() {
      // Uncheck all other checkboxes in the same group
      filterCheckboxesDesktop.forEach(function(checkbox) {
        if (checkbox !== this) {
          checkbox.checked = false;
        }
      }, this);
  
      // Get the selected filter values
      const selectedFiltersDesktop = getSelectedFilterValuesDesktop();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItemsDesktop(selectedFiltersDesktop);
  
      // Update category dropdown options based on selected filters
      updateCategoryOptionsDesktop(selectedFiltersDesktop);
    }
  
    // Function to handle type filter change
    function handleTypeFilterChangeDesktop() {
      // Uncheck all other checkboxes in the same group
      filterTypeCheckboxesDesktop.forEach(function(checkbox) {
        if (checkbox !== this) {
          checkbox.checked = false;
        }
      }, this);
  
      // Get the selected filter values
      const selectedFiltersDesktop = getSelectedFilterValuesDesktop();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItemsDesktop(selectedFiltersDesktop);
  
      // Update category dropdown options based on selected filters
      updateCategoryOptionsDesktop(selectedFiltersDesktop);
    }
  
    // Function to handle category filter change
    function handleCategoryFilterChangeDesktop() {
      // Get the selected filter values
      const selectedFiltersDesktop = getSelectedFilterValuesDesktop();
  
      // Show/hide portfolio items based on selected filters
      filterPortfolioItemsDesktop(selectedFiltersDesktop);
    }
  
    // Function to get the selected filter values
    function getSelectedFilterValuesDesktop() {
      const selectedFiltersDesktop = {
        builtWith: [],
        types: [],
        category: ''
      };
  
      // Get the selected built with filter
      selectedFiltersDesktop.builtWith = Array.from(filterCheckboxesDesktop)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
  
      // Get the selected type filter
      selectedFiltersDesktop.types = Array.from(filterTypeCheckboxesDesktop)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
  
      // Get the selected category filter
      selectedFiltersDesktop.category = categoryDropdownDesktop.value;
  
      return selectedFiltersDesktop;
    }
  
    // Function to show/hide portfolio items based on selected filters
    function filterPortfolioItemsDesktop(selectedFiltersDesktop) {
      const portfolioItems = document.querySelectorAll('.portfolio-item');
      portfolioItems.forEach(function(item) {
        const builtWith = item.getAttribute('data-built-with').split(',');
        const types = item.getAttribute('data-types').split(',');
        const categories = item.getAttribute('data-categories').split(',');
  
        const builtWithMatch = selectedFiltersDesktop.builtWith.length === 0 || selectedFiltersDesktop.builtWith.some(filter => builtWith.includes(filter));
        const typesMatch = selectedFiltersDesktop.types.length === 0 || selectedFiltersDesktop.types.some(filter => types.includes(filter));
        const categoryMatch = selectedFiltersDesktop.category === 'all' || categories.includes(selectedFiltersDesktop.category);
  
        if (builtWithMatch && typesMatch && categoryMatch) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    }
  
    // Function to update category dropdown options based on selected filters
    function updateCategoryOptionsDesktop(selectedFiltersDesktop) {
      const categoryOptions = Array.from(categoryDropdownDesktop.options);
  
      categoryOptions.forEach(function(option) {
        const category = option.value;
  
        // Check if the category is compatible with the selected filters
        const isCompatible = checkCategoryCompatibilityDesktop(category, selectedFiltersDesktop);
  
        // Disable incompatible options and enable compatible options
        if (isCompatible) {
          option.disabled = false;
        } else {
          option.disabled = true;
          // Deselect disabled options
          if (category === selectedFiltersDesktop.category) {
            categoryDropdownDesktop.value = 'all';
          }
        }
      });
    }
  
    // Function to check if a category is compatible with the selected filters
    function checkCategoryCompatibilityDesktop(category, selectedFiltersDesktop) {
      const portfolioItems = document.querySelectorAll('.portfolio-item');
  
      for (let i = 0; i < portfolioItems.length; i++) {
        const item = portfolioItems[i];
        const builtWith = item.getAttribute('data-built-with').split(',');
        const types = item.getAttribute('data-types').split(',');
  
        const builtWithMatch = selectedFiltersDesktop.builtWith.length === 0 || selectedFiltersDesktop.builtWith.every(filter => builtWith.includes(filter));
        const typesMatch = selectedFiltersDesktop.types.length === 0 || selectedFiltersDesktop.types.every(filter => types.includes(filter));
        const categoryMatch = category === 'all' || item.getAttribute('data-categories').split(',').includes(category);
  
        if (builtWithMatch && typesMatch && categoryMatch) {
          return true;
        }
      }
  
      return false;
    }
  
    // Function to reset the filters
    function resetFiltersDesktop() {
      // Uncheck all filter checkboxes
      filterCheckboxesDesktop.forEach(function(checkbox) {
        checkbox.checked = false;
      });
  
      // Uncheck all type checkboxes
      filterTypeCheckboxesDesktop.forEach(function(checkbox) {
        checkbox.checked = false;
      });
  
      // Reset the category dropdown to the default value
      categoryDropdownDesktop.value = 'all';
  
      // Reset the selected filters
      const selectedFiltersDesktop = getSelectedFilterValuesDesktop();
  
      // Show all portfolio items
      const portfolioItems = document.querySelectorAll('.portfolio-item');
      portfolioItems.forEach(function(item) {
        item.style.display = 'block';
      });
  
      // Update category dropdown options based on selected filters
      updateCategoryOptionsDesktop(selectedFiltersDesktop);
    }
  });  