document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('saveButton').addEventListener('click', function() {
        let selectedValues = [];
        document.querySelectorAll('.name-dropdown').forEach(function(dropdown) {
            let selectedOption = dropdown.options[dropdown.selectedIndex];
            if (selectedOption.value !== 'default') {
                selectedValues.push(selectedOption.value.split('|'));
            }
        });

        // Add hidden input fields to the form for each selected value
        selectedValues.forEach(function(value) {
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'selectedValues[]'; // Use an array for multiple values
            input.value = value.join('|'); // Join the array values with '|'
            document.getElementById('taskDetailsForm').appendChild(input);
        });

        // Now submit the form
        document.getElementById('taskDetailsForm').submit();

        alert('Data has been saved successfully!');
    });

    // Get all select elements with the 'name-dropdown' class
    const selectElements = document.querySelectorAll('.name-dropdown');

    // Attach change event listener to each select element
    selectElements.forEach(select => {
        select.addEventListener('change', function() {
            // Get the selected option
            const selectedOption = this.options[this.selectedIndex];
            
            // Get the data-color attribute value
            const color = selectedOption.getAttribute('data-color');

            // Change the background color of the parent cell
            this.parentElement.style.backgroundColor = color;
        });
    });
});

function randomizeDropdownOptions() {
    // Get all dropdowns with the class 'name-dropdown'
    var dropdowns = document.querySelectorAll('.name-dropdown');

    // Object to keep track of selected personIds for each weekId
    var weekPersonMap = {};

    dropdowns.forEach(function(dropdown) {
        // Get all options of the current dropdown except the default option
        var options = Array.from(dropdown.options).filter(option => option.value !== 'default');

        // Parse options and group them by weekId
        var optionsByWeekId = {};
        options.forEach(option => {
            var [weekId, workId, personId] = option.value.split('|');
            if (!optionsByWeekId[weekId]) {
                optionsByWeekId[weekId] = [];
            }
            optionsByWeekId[weekId].push({ workId, personId, option });
        });

        // Randomly select an option ensuring no duplicate personId in the same weekId
        var selectedOption = null;
        var weekId, workId, personId;
        var startTime = Date.now(); // Time when the loop started

        while (!selectedOption && (Date.now() - startTime) < 1000) { // Timeout after 1 second
            // Randomly select an option index
            var randomIndex = Math.floor(Math.random() * options.length);
            var selectedValue = options[randomIndex].value;

            [weekId, workId, personId] = selectedValue.split('|');

            // Initialize weekId entry in weekPersonMap if it doesn't exist
            if (!weekPersonMap[weekId]) {
                weekPersonMap[weekId] = new Set();
            }

            // Check if personId has already been selected for the current weekId
            if (!weekPersonMap[weekId].has(personId)) {
                selectedOption = options[randomIndex];
                weekPersonMap[weekId].add(personId);  // Mark personId as selected for this weekId
            }
        }

        // Set the selected option in the dropdown
        if (selectedOption) {
            dropdown.value = selectedOption.value;
            console.log('Selected Option:', selectedOption.value);
        } else {
            console.log('Timeout occurred while selecting option for dropdown:', dropdown);
        }
    });
}







