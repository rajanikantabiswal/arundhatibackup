jQuery(document).ready(function($) {
	$('#wpfooter').hide()
    // Your code goes here
		var ajaxurl = itsapu_ajax_object.ajaxurl;
  // Find the form element and add a change event listener to it
  var form = $('#itsapu-metal-mapping-form');
    // Disable select fields on page load
  $('.itsapu-input-price-api').each(function() {
    if ($(this).val() === 'none') {
      $(this).closest('tr').find('select').not(this).prop('disabled', true);
    }
    
  });
  
  // working code begin
  
   $('.itsapu-input-price-api').change(function() {
       const ps1 = [
  { value: 'XAU', label: 'Gold' },
  { value: 'LBXAUAM', label: 'LBMA Gold Am' },
  { value: 'LBXAUPM', label: 'LBMA Gold Pm' },
  { value: 'XAU-AHME', label: 'Ahmedabad Gold' },
  { value: 'XAU-BANG', label: 'Bangalore Gold' },
  { value: 'XAU-CHEN', label: 'Chennai Gold' },
  { value: 'XAU-COIM', label: 'Coimbatore Gold' },
  { value: 'XAU-DELH', label: 'Delhi Gold' },
  { value: 'XAU-HYDE', label: 'Hyderabad Gold' },
  { value: 'XAU-KOCH', label: 'Kochi Gold' },
  { value: 'XAU-KOLK', label: 'Kolkata Gold' },
  { value: 'XAU-MUMB', label: 'Mumbai Gold' },
  { value: 'XAU-SURA', label: 'Surat Gold' },
  { value: 'XAG', label: 'Silver' },
  { value: 'LBXAG', label: 'LBMA Silver' },
  { value: 'XPT', label: 'Platinum' },
  { value: 'LBXPTAM', label: 'LBMA Platinum Am' },
  { value: 'XPD', label: 'Palladium' },
  { value: 'LBXPDAM', label: 'LBMA Palladium Am' }
  
];

const ps2 = [
  { value: 'AHME-22k', label: 'Ahmedabad Gold 22k' },
  { value: 'BANG-22k', label: 'Bangalore Gold 22k' },
  { value: 'BHOP-22k', label: 'Bhopal Gold 22k' },
  { value: 'CHAN-22k', label: 'Chandigarh Gold 22k' },
  { value: 'CHEN-22k', label: 'Chennai Gold 22k' },
  { value: 'COIM-22k', label: 'Coimbatore Gold 22k' },
  { value: 'DEHR-22k', label: 'Dehradun Gold 22k' },
  { value: 'FARI-22k', label: 'Faridabad Gold 22k' },
  { value: 'GUWA-22k', label: 'Guwahati Gold 22k' },
  { value: 'GURG-22k', label: 'Gurgaon Gold 22k' },
  { value: 'HYDE-22k', label: 'Hyderabad Gold 22k' },
  { value: 'INDO-22k', label: 'Indore Gold 22k' },
  { value: 'JAIP-22k', label: 'Jaipur Gold 22k' },
  { value: 'KANP-22k', label: 'Kanpur Gold 22k' },
  { value: 'KOCH-22k', label: 'Kochi Gold 22k' },
  { value: 'KOLH-22k', label: 'Kolhapur Gold 22k' },
  { value: 'KOLK-22k', label: 'Kolkata Gold 22k' },
  { value: 'LUCK-22k', label: 'Lucknow Gold 22k' },
  { value: 'LUDH-22k', label: 'Ludhiana Gold 22k' },
  { value: 'MADU-22k', label: 'Madurai Gold 22k' },
  { value: 'MALA-22k', label: 'Malappuram Gold 22k' },
  { value: 'MANG-22k', label: 'Mangalore Gold 22k' },
  { value: 'MEER-22k', label: 'Meerut Gold 22k' },
  { value: 'MUMB-22k', label: 'Mumbai Gold 22k' },
  { value: 'MYSO-22k', label: 'Mysore Gold 22k' },
  { value: 'NAGP-22k', label: 'Nagpur Gold 22k' },
  { value: 'NOID-22k', label: 'Noida Gold 22k' },
  { value: 'PATN-22k', label: 'Patna Gold 22k' },
  { value: 'POND-22k', label: 'Pondicherry Gold 22k' },
  { value: 'PUNE-22k', label: 'Pune Gold 22k' },
  { value: 'RAIP-22k', label: 'Raipur Gold 22k' },
  { value: 'SALE-22k', label: 'Salem Gold 22k' },
  { value: 'VIJA-22k', label: 'Vijayawada Gold 22k' },
  { value: 'VISA-22k', label: 'Visakhapatnam Gold 22k' }
];
var select = "";
  if ($(this).val() == 1) {
    //   $(this).closest('tr').find('.itsapu-input-mapping').empty();
      select = $(this).closest('tr').find('.itsapu-input-mapping');
      console.log(select)
      select.empty();
     $.each(ps1, function(index, option) {
         
        select.append($('<option>', { 
            value: option.value,
            text: option.label
        }));
    });
    }
    
    if ($(this).val() == 2) {
    //   $(this).closest('tr').find('.itsapu-input-mapping').empty();
      select = $(this).closest('tr').find('.itsapu-input-mapping');
      console.log(select)
      select.empty();
     $.each(ps2, function(index, option) {
         
        select.append($('<option>', { 
            value: option.value,
            text: option.label
        }));
    });
    }
});
 
 // working code end

  form.on('change', '.itsapu-input-mapping, .itsapu-input-purity, .itsapu-input-price-api', runAjax);
  form.on('change', '.itsapu-input-plusorminus, .itsapu-input-adjustment', updateFinalRate);
	function updateFinalRate(){
		let metalId = $(this).closest('tr').find('.itsapu-metal-id').val();
		let apiRate = $('#itsapu_api_rate_'+metalId).val()	;
					let operator = $('#itsapu_metal_plusorminus_'+metalId).val();
					let adjustment = $('#itsapu_metal_adjustment_'+metalId).val();
					if(!adjustment) adjustment = 0;
					let finalRate = calculateFinalRate(operator, apiRate, adjustment);		
					if(!isNaN(finalRate))	$('#itsapu_metal_final_rate_'+metalId).val(finalRate);
	}
	function calculateFinalRate(operator, rate, adjustment){
		let finalRate;
if(operator && rate ){
	switch(operator){
		case "none":							
			finalRate = parseFloat(rate);
			break;
		case "plus":							
			finalRate = parseFloat(rate) + parseFloat(adjustment);
			break;
		case "minus":
			finalRate =  parseFloat(rate) - parseFloat(adjustment);
			break;
		default:
			break;
	}
	return finalRate;

}
	}

	
  // Function to run the AJAX request
  function runAjax() {
    // Get the current values of the input fields
    var standardMetal = $(this).closest('tr').find('.itsapu-input-mapping').val();
    var goldPurity = $(this).closest('tr').find('.itsapu-input-purity').val();
    var metalPriceAPIs = $(this).closest('tr').find('.itsapu-input-price-api').val();
		var metalId = $(this).closest('tr').find('.itsapu-metal-id').val();
	  // Enable/disable select fields on change
	
		if (metalPriceAPIs === 'none') {
		  $(this).closest('tr').find('select').not(this).prop('disabled', true);
		} else {
		  $(this).closest('tr').find('select').not(this).prop('disabled', false);
		}
	
	
		
console.log(standardMetal,goldPurity,metalPriceAPIs,metalId)
    // Make an AJAX request to the server
		

			$.ajax({
				url: ajaxurl,
				method: 'POST',
				data: {
					action: 'itsapu_update_api_rate',
					standard_metal: standardMetal,
					gold_purity: goldPurity,
					metal_price_apis: metalPriceAPIs,
					metal_id: metalId
				},
				beforeSend: function(){	
					if(!$('#itsapu_api_rate_'+metalId).next().hasClass('spinner')){

						$('#itsapu_api_rate_'+metalId).after('<span class="spinner is-active"></span>');				
					}				
				},
				complete: function () {
					if($('#itsapu_api_rate_'+metalId).next().hasClass('spinner')){

						$('#itsapu_api_rate_'+metalId).next().remove();				
					}	
					// $(".spinner").remove();
				},
				success: function(data) {
					// Handle the server's response
					var response = JSON.parse(data);
					if(response.status){
						if (metalPriceAPIs !== 'none') {
					$('#itsapu_api_rate_'+response.metal_id).val(response.api_rate)	;
						}
					var operator = $('#itsapu_metal_plusorminus_'+response.metal_id).val();
					var adjustment = $('#itsapu_metal_adjustment_'+response.metal_id).val();
					if(!adjustment) adjustment = 0;
					var finalRate = calculateFinalRate(operator, response.api_rate,adjustment);				

					$('#itsapu_metal_final_rate_'+response.metal_id).val(finalRate);
					 
					console.log(finalRate);
					}
					console.log(response);
				},
				error: function(xhr, status, error) {
					// Handle errors
					console.log(error);
				}
			});
		
  }


});
