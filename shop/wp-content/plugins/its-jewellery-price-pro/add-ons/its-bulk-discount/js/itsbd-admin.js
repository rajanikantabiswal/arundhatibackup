document.addEventListener("DOMContentLoaded", function() {
  var errors = [];
  var startDateInput = document.getElementById('itsbd-md-start-date');
    var endDateInput = document.getElementById('itsbd-md-end-date');
    var resetButton = document.getElementById('itsbd-reset');
    var submit = document.getElementById('itsbd-submit');

  function parseDate(dateString) {
    var parts = dateString.split('-');
    var year = parseInt(parts[0]);
    return new Date(year, parseInt(parts[1]) - 1, parseInt(parts[2])); // Months are zero-based
  }

  function appendErrors() {
    var errorsDiv = document.getElementById('itsbd-date-input-errors');
    // Clear existing content in the div
    errorsDiv.innerHTML = '';
    
     // Create an unordered list to contain the errors
     var ul = document.createElement('ul');
     ul.classList.add('list-unstyled'); // Add Bootstrap's list-unstyled class
     ul.classList.add('small');
     ul.style.listStyleType = "disc";
     ul.style.margin = "10px 20px";
    
    
     // Iterate over the errors array and append each error message to the list
     errors.forEach(function(error) {
       var li = document.createElement('li');
       li.style.color = "red";
       li.textContent = error;
       ul.appendChild(li);
     });
 
     // Append the unordered list to the errors div
     errorsDiv.appendChild(ul);
    
    // Set errors as value of hidden input
    var errorsInput = document.getElementById('itsbd-errors-input');
    errorsInput.value = JSON.stringify(errors);
    
    
    submit.disabled = (errors.length) ? true : false;
       
    
  }

  // Function to validate date range
  function validateDateRange() {
    
    var startDate = parseDate(startDateInput.value);
    var endDate = parseDate(endDateInput.value);
    var currentDate = new Date();
    
    // Set time parts to midnight
    startDate.setHours(0, 0, 0, 0);
    currentDate.setHours(0, 0, 0, 0);
    
    errors = []; // Clear previous errors
    
    if (startDate.getTime() < currentDate.getTime()) {
      errors.push("Start Date cannot be in the past.");
    }

    if (startDate > endDate) {
      errors.push("The end date must be after the start date.");          
    }
    
    
      appendErrors();
      
    
  }

  // Attach event handlers
  document.getElementById('itsbd-md-start-date').addEventListener('blur', function() {
    validateDateRange();
  });
  
  document.getElementById('itsbd-md-end-date').addEventListener('blur', function() {
    validateDateRange();
  });

  

  // Function to trigger the reset button
  function triggerResetButton() {
    resetButton.click();
  }

  // Function to check the end date and trigger actions
   // Function to check the end date and trigger actions
   function checkEndDate() {
    var endDate = new Date(endDateInput.value);
    var currentDate = new Date();
    endDate.setHours(0, 0, 0, 0);
    currentDate.setHours(0, 0, 0, 0);
    
    // Check if the end date is reached
    if (endDate < currentDate) {
      // Check if the user has already made a choice and if it has expired
      var choiceData = JSON.parse(localStorage.getItem('itsbdFormResetChoice'));
      if (choiceData !== null && new Date(choiceData.expires) > currentDate) {
        // If the choice has not expired, do nothing
        return;
      }
      
      // If the end date is reached and the choice has expired or the user hasn't made a choice yet, show a confirmation dialog
      var confirmation = confirm('The End date for metal discount has been reached! Do you want to reset the form?');
      
      // If the user confirms, trigger the reset button and set the choice with expiration date
      if (confirmation) {
        triggerResetButton();
        var expirationDate = new Date();
        expirationDate.setDate(currentDate.getDate() + 1); // Set expiration date to next day
        localStorage.setItem('itsbdFormResetChoice', JSON.stringify({ choice: 'reset', expires: expirationDate }));
      } else {
        // If the user cancels, set the choice with expiration date
        var expirationDate = new Date();
        expirationDate.setDate(currentDate.getDate() + 1); // Set expiration date to next day
        localStorage.setItem('itsbdFormResetChoice', JSON.stringify({ choice: 'cancel', expires: expirationDate }));
      }
    }
  }

  
  checkEndDate();
});
