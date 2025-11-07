jQuery.noConflict();
function showAlert(type, message) {
	var typeClass = 'itsjp-' + type;
	var alertContainer = jQuery('#itsjp-alert-container');
	var iconClass = getIconClass(typeClass);
	
	var alert = jQuery('<div></div>', {
			class: 'itsjp-alert ' + typeClass + ' itsjp-show',
			html: '<div class="itsjp-icon-message"><i class="material-icons">' + iconClass + '</i><span>' + "  " + message + '</span></div><span class="itsjp-close-btn">&times;</span>'
	});

	alertContainer.append(alert);

	alert.find('.itsjp-close-btn').on('click', function() {
			closeAlert(alert);
	});

	setTimeout(function() {
			closeAlert(alert);
	}, 5000);
}

function closeAlert(element) {
	var alert = jQuery(element).hasClass('itsjp-alert') ? jQuery(element) : jQuery(element).parent();
	alert.removeClass('itsjp-show');
	setTimeout(function() {
			alert.remove();
	}, 500);
}

function getIconClass(type) {
	switch (type) {
			case 'itsjp-success':
					return 'check_circle';
			case 'itsjp-error':
					return 'error';
			case 'itsjp-notice':
					return 'info';
			default:
					return '';
	}
}

jQuery(document).ready(function ($) {

	
	
	  //To hide wp footer message
$('#wpfooter').hide()
	// Your jQuery code here, using $ to refer to jQuery.
	var ajaxurl = its_jp_ajax_object.ajaxurl;
	$(document).on("click", ".its-jp-edit-btn", function () {

		var editButtonId = jQuery(this).attr("data-id");

		if ($(this).val() === 'Edit') {
			$(this).val('Update');
			$(this).removeClass('btn-primary');
			$(this).addClass('btn-success');

			$("#its-jp-metal-price-" + editButtonId).prop("disabled", false);

		} else if ($(this).val() === 'Update') {
			$(this).val('Edit');
			$(this).removeClass('btn-success');
			$(this).addClass('btn-primary');
			$("#its-jp-metal-price-" + editButtonId).prop("disabled", true);
			var metalPrice = $("#its-jp-metal-price-" + editButtonId).val();
			var metalName = $("#its-jp-metal-name-" + editButtonId).text();

			//	var postdata = "action=admin_ajax_request&param=update_price&metal_id="+editButtonId+"&metal_price="+metalPrice+"&metal_name="+metalName;
			var postdata = {
				action: 'admin_ajax_request',
				param: 'update_price',
				metal_id: editButtonId,
				metal_price: metalPrice,
				metal_name: metalName
			};
			// 			jQuery.post(ajaxurl, postdata, function (response) {
			// 				console.log(response);
			// 			});
			$.ajax({
				url: ajaxurl,
				data: postdata,
				beforeSend: function () {
					$('#its-jp-metal-edit-btn-' + editButtonId).val('Updating...')
					$('#its-jp-metal-edit-btn-' + editButtonId).prop('disabled', true);
					$('<span class="spinner"></span>').insertAfter('#its-jp-metal-edit-btn-' + editButtonId);
					$(".spinner").addClass('is-active');
				},
				complete: function () {
					$(".spinner").hide();
					$('#its-jp-metal-edit-btn-' + editButtonId).prop('disabled', false);
					$('#its-jp-metal-edit-btn-' + editButtonId).val('Edit')
				},
				success: function (response) {
					let taskId = response.data.task_id;
					let pids = response.data.pids;
					let totalJobs = response.data.total_jobs;
					if (response.success) {
						showAlert('success',response.data.message);
			  // $('#single-price-update-notice').html('<p>' + response.data.message + '</p>'); 
			  showSingleProgress(taskId, totalJobs);
					} else {
						showAlert('error',response.data.message);
						// $('#single-price-update-notice').html('<p>' + response.data.message + '</p>');
					}
					
	
	
				}


			});
			function showSingleProgress(taskId, totalJobs) {
				$.ajax({
					type: "POST",
					url: ajaxurl,
					data: { action: 'admin_ajax_request', task_id: taskId, show_single_progress: true, total_jobs: totalJobs },
					success: function(response) {
						if (response.success) {
							var progress = response.data.progress;
							$('#single-progress-bar-container').show();
							$('#single-progress-bar').css('width', progress + '%');
							$('#single-progress-text').html('<p>' + response.data.message + '</p>'); 
		
							if (progress < 100) {
								// Continue updating prices until 100% progress
								setTimeout(showSingleProgress,5000,taskId, totalJobs);
							} else {
								// Update complete, handle any additional actions
								showAlert('success','Price update complete!');
							}
						}
					},
					error: function(error) {
						console.log(error);
					}
				});
			}


		}





	});

	$(document).on('submit','#license_frm',function(e){
		e.preventDefault()
		var licenseForm = $('#license_frm')
		var data = licenseForm.serialize()
		data += '&action=admin_ajax_request'
		//console.log(data)
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: data,
			beforeSend: function () {
				$('<div class="col-md-1"><span class="spinner"></span></div>').insertAfter("#activate_btn_div");
				$(".spinner").addClass('is-active');
			},
			complete: function () {
				$(".spinner").hide();
				

			},
			success: function (response) {
				var data = JSON.parse(response);
				if (data.status == 'Active') {
					showAlert('success',data.message)
					
					location.reload();
					
				} else {
					showAlert('error',data.message)

				}

				

			}
		});
		

	})
	

	$(document).on("click", ".its-jp-metal-delete", function (e) {
		e.preventDefault();
		var delConfirm = confirm('Are you sure to delete this record?');
		if (delConfirm) {

			var deleteButtonId = jQuery(this).attr("data-id");

			var metalName = $("#its-jp-metal-name-" + deleteButtonId).text().trim();
			var postdata = "action=admin_ajax_request&param=delete_metal_name&metal_id=" + deleteButtonId + "&metal_name=" + metalName;
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: postdata,
				beforeSend: function () {
					$('<span class="spinner"></span>').insertAfter("#its-jp-metal-delete-" + deleteButtonId);
					$(".spinner").addClass('is-active');
				},
				complete: function () {
					$(".spinner").hide();

				},
				success: function (response) {
					var data = JSON.parse(response);
					if (data.termdelete) {

						alert(data.termdelete);
						$("#its-jp-metal-name-" + deleteButtonId).closest("tr").remove();
						removeRowCount('#metal_table');
						addRowCount('#metal_table');
					} else {

						var confirmDelete = confirm('This term linked with ' + data.termCount + ' Products. Still do you want to delete it?');
						if (confirmDelete) {
							var postdata = 'action=admin_ajax_request&param=delete_metal_name&param1=delete_confirmed&metal_id=' + data.metalId + '&term_id=' + data.termId + '&taxonomy=' + data.taxonomy;
							$.ajax({
								type: 'POST',
								url: ajaxurl,
								data: postdata,
								beforeSend: function () {
									$(".spinner").show();
								},
								complete: function () {
									$(".spinner").hide();
				
								},
								success: function (response) {
									var data = JSON.parse(response);
									showAlert('success',data.termdelete);
									$("#its-jp-metal-name-" + deleteButtonId).closest("tr").remove();
							removeRowCount('#metal_table');
							addRowCount('#metal_table');
	
								}
							});
	
						}
					}


				}
			});

		}
	});




	$('#its_jp_metal_price_log').DataTable({
		"scrollY": "400px",
		"scrollCollapse": true,
		"paging": true,
		"ordering": false

	});

	$('#its_jp_product_price_log').DataTable({
		"scrollY": "400px",
		"scrollCollapse": true,
		"paging": true,
		"ordering": false

	});

	// Metal Group Form Processing
	
		$('input#enableMakingCharge').click(function(){
			if($(this).is(':checked')){
				$('#makingRadioBtn').show()
			} else {
				$('#makingRadioBtn').hide()
			}

		});
		$('input#enableWastageCharge').click(function(){
			if($(this).is(':checked')){
				$('#wastageRadioBtn').show()
			} else {
				$('#wastageRadioBtn').hide()
			}

		});
	
	// Add Metal Group
	$('#metalGroupSubmit').click(function (e) {
		e.preventDefault();
		var rowCount = $("#metal_group_table tr").length;
		// console.log(rowCount);
		var form = $('#metal_group_frm');
		var formData = form.serialize();
		formData += '&action=admin_ajax_request';
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: formData,
			beforeSend: function () {

				$('<span class="spinner"></span>').insertAfter('#metalGroupSubmit');
				$(".spinner").addClass('is-active');
			},
			complete: function () {
				$(".spinner").hide();
				form.find('input[type=text]').val('');
				form.find('input[type=checkbox], input[type=radio]').prop('checked',false)
				$('#makingRadioBtn').hide()
				$('#wastageRadioBtn').hide()
			},
			success: function (data) {
				var response = JSON.parse(data);

		var metalGroupTableRow = `
		<tr>
                                                       
		<td id="its-jp-metal-group-${response.metal_group_id}">
			${response.metal_group}
		</td>
		<td id="its-jp-weight-unit-${response.metal_group_id}">
			${response.weight_unit}
		</td>
		<td id="its-jp-metal-tax-exempt-${response.metal_group_id}">
			${response.isMetalTaxExempt}
		</td>
		<td id="its-jp-making-charge-field-${response.metal_group_id}">
			${response.making_charge_field}
		</td>
		<td id="its-jp-making-charge-type-${response.metal_group_id}">
			${response.making_charge_type}
		</td>
		<td id="its-jp-wastage-charge-field-${response.metal_group_id}">
			${response.wastage_charge_field}
		</td>
		<td id="its-jp-wastage-charge-type-${response.metal_group_id}">
			${response.wastage_charge_type}
		</td>
		<td>
			<button class="btn btn-primary btn-sm rounded-circle its-jp-metal-group-edit" id="its-jp-metal-group-edit-${response.metal_group_id}" data-id="${response.metal_group_id}"  data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><i class="material-icons" style="font-size:medium;">edit</i></button>&nbsp;<button class="btn btn-danger btn-sm rounded-circle its-jp-metal-group-delete" id="its-jp-metal-group-delete-${response.metal_group_id}" data-id="${response.metal_group_id}" ><i class="material-icons" style="font-size:medium;">delete</i></button>

		</td>
	</tr>
		`
				if (response.status) {
					removeRowCount('#metal_group_table')
					
					$('#metal_group_table_body').append(metalGroupTableRow);
					addRowCount('#metal_group_table');
					showAlert('success',response.message);
					
				
				} else {
					showAlert('error',response.message);

				
				}

			}


		});

	});
	// Metal Group Form Edit Process
	$('body').on('click','.its-jp-metal-group-edit',function(){
		// var editBtnId = $(this).attr('data-id');
		// Get the data-id attribute value
		var editBtnId = $(this).data('id');
		var postdata = "action=admin_ajax_request&fetch_metal_group_data="+editBtnId;

		// Make an AJAX request to send the data-id value
		$.ajax({
			type: 'POST',
			url: ajaxurl, // Replace with your server-side script
			data: postdata,
			dataType: 'json', // Assuming the response will be in JSON format
			success: function (response) {
				$('#staticBackdrop1').modal('show');
				// [{"id":"1","metal_group":"Gold","weight_unit":"gm","making_charge_field":"1","making_charge_type":"percentage","wastage_charge_field":"1","wastage_charge_type":"percentage","created_at":"2024-01-10 13:22:53"}]

				// Handle the response data here
				// console.log(response[0].metal_group);

				// Example: Update a modal with the response data
				$('#metal_group_modal').val(response[0].metal_group);
				$('#weight_unit_modal').val(response[0].weight_unit);
				if(response[0].isMetalTaxExempt==1){

					$('#isMetalTaxExemptModal').prop('checked',true);
				}
				
				// Add similar lines for other fields
				// var metalGroup = $('#its-jp-metal-group-'+editBtnId).text().trim();
		var makingChargeField = response[0].making_charge_field;
		var makingChargeType = response[0].making_charge_type.toLowerCase();
		var wastageChargeField = response[0].wastage_charge_field;
		var wastageChargeType = response[0].wastage_charge_type.toLowerCase();
		// console.log(makingChargeField,makingChargeType,wastageChargeField,wastageChargeType)
		if (makingChargeField ==1){
			$('#enableMakingChargeGD').prop('checked',true)
			// console.log('true part')
		} else {
			$('#enableMakingChargeGD').prop('checked',false)
			$('#MakingChargeGramGD').prop('checked', false);
			$('#MakingChargePercentageGD').prop('checked', false);
			// console.log('false part')
		}
		
		if (wastageChargeField == 1){
			$('#enableWastageChargeGD').prop('checked',true)
		} else {
			$('#enableWastageChargeGD').prop('checked',false)
			$('#WastageChargePercentageGD').prop('checked', false);
			$('#WastageChargeGramGD').prop('checked', false);

		}

		$('#MakingChargeGramGD').prop('checked', false);
		$('#MakingChargePercentageGD').prop('checked', false);
		$('#MakingChargeFixedGD').prop('checked', false);
		switch (makingChargeType) {
			case "amount":
				$('#MakingChargeGramGD').prop('checked', true);				
				break;
		case "percentage":
			$('#MakingChargePercentageGD').prop('checked', true);				
				break;
		case "fixed":
			$('#MakingChargeFixedGD').prop('checked', true);				
				break;
		
			default:
				break;
		}

		$('#WastageChargeGramGD').prop('checked', false);
		$('#WastageChargePercentageGD').prop('checked', false);
		$('#WastageChargeFixedGD').prop('checked', false);
		switch (wastageChargeType) {
			case "amount":
				$('#WastageChargeGramGD').prop('checked', true);				
				break;
		case "percentage":
			$('#WastageChargePercentageGD').prop('checked', true);				
				break;
		case "fixed":
			$('#WastageChargeFixedGD').prop('checked', true);				
				break;
		
			default:
				break;
		}

		
		
	
		

				// Open the modal if not already open
				// $('#staticBackdrop1').modal('show');
			},
			error: function (xhr, status, error) {
				console.error(xhr.responseText);
			}
		});
		
		
		
		$('input#metalGroupIdEdit').val(editBtnId);
		
	});

	// Updating values in the metal edit form
	$('#editMetalGroup').click(function(e){
		e.preventDefault();
		var form = $('#metal_group_edit_frm');
		var formData = form.serialize();
		formData += '&action=admin_ajax_request';
		// console.log(formData);
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: formData,
			beforeSend: function () {

				$('<span class="spinner"></span>').insertAfter('#editMetalGroup');
				$(".spinner").addClass('is-active');
			},
			complete: function () {
				$(".spinner").hide();
				form.find('input[type=text],input[type=number]').val('');
				
				  $('#staticBackdrop1').hide();
				  $('.modal-backdrop').hide();
					document.body.classList.remove('modal-open');
					document.body.style.overflow = "auto";
					document.body.style.paddingRight= "0px";
				  
			},
			success: function (data) {
				var response = JSON.parse(data);

				if (response.status) {
					$('#its-jp-metal-group-'+response.metal_group_id).text(response.metal_group)
					$('#its-jp-weight-unit-'+response.metal_group_id).text(response.weight_unit)
					$('#its-jp-metal-tax-exempt-'+response.metal_group_id).text(response.isMetalTaxExemptModal)
					$('#its-jp-making-charge-field-'+response.metal_group_id).text(response.making_charge_field)
					$('#its-jp-making-charge-type-'+response.metal_group_id).text(response.making_charge_type)
					$('#its-jp-wastage-charge-field-'+response.metal_group_id).text(response.wastage_charge_field)
					$('#its-jp-wastage-charge-type-'+response.metal_group_id).text(response.wastage_charge_type)
					showAlert('success',response.message);
					
				} else {
					showAlert('error',response.message);
					
				}

			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		});
		
	});

	// Metal Group Form Delete Process
	$(document).on("click", ".its-jp-metal-group-delete", function (e) {
		e.preventDefault();
		var delConfirm = confirm('Are you sure to delete this metal group?');
		if (delConfirm) {

			var deleteButtonId = jQuery(this).attr("data-id");

			var metalGroup = $("#its-jp-metal-group-" + deleteButtonId).text().trim();
			var postdata = "action=admin_ajax_request&metalGroupDeleteParam=delete_metal_group&metal_id=" + deleteButtonId + "&metal_group=" + metalGroup;
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: postdata,
				beforeSend: function () {
					$('<span class="spinner"></span>').insertAfter("#its-jp-metal-group-delete-" + deleteButtonId);
					$(".spinner").addClass('is-active');
				},
				complete: function () {
					$(".spinner").hide();

				},
				success: function (response) {
					var data = JSON.parse(response);
					if (data.status) {

						showAlert('success',data.message);
						$("#its-jp-metal-group-" + deleteButtonId).closest("tr").remove();
						removeRowCount('#metal_group_table')
						addRowCount('#metal_group_table')
					} else {
						showAlert('error',data.message);
					}

					

				}
			});

		}
	});

	// Metal Form Processing
	$('#submitMetalName').click(function (e) {
		e.preventDefault();
		var form = $('#metal_frm');
		var formData = form.serialize();
		formData += '&action=admin_ajax_request';
		//console.log(formData);
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: formData,
			beforeSend: function () {

				$('<span class="spinner"></span>').insertAfter('#submitMetalName');
				$(".spinner").addClass('is-active');
			},
			complete: function () {
				$(".spinner").hide();
				form.find('input[type=text],input[type=number]').val('');
			},
			success: function (data) {
				var response = JSON.parse(data);

				if (response.status) {
					$('#metal_table').append('<tr><td>' + response.serial_no + '</td><td id="its-jp-metal-name-' + response.metal_id + '">' + response.metal_name + '</td><td id="its-jp-metal-display-name-' + response.metal_id + '">' + response.metal_display_name + '</td><td id="its-jp-metal-name-group-' + response.metal_id + '">' + response.metal_group + '</td><td>' + response.currency + '&nbsp;<span id="its-jp-metal-price-'+response.metal_id+'">' + response.amount + '</span></td><td> <button class="btn btn-primary btn-sm rounded-circle its-jp-metal-edit" id="its-jp-metal-edit-'+response.metal_id+'" data-id="' + response.metal_id + '" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons" style="font-size:medium;">edit</i></button>&nbsp;<button class="btn btn-danger btn-sm rounded-circle its-jp-metal-delete" id="its-jp-metal-delete-'+response.metal_id+'" data-id="' + response.metal_id + '"><i class="material-icons" style="font-size:medium;">delete</i></button></td></tr>');
					showAlert('success',response.message);
					
				} else {
					showAlert('error',response.message);
					
				}

			}

		});
	});

	// Getting values for Edit Metal Form
	$('body').on('click','.its-jp-metal-edit',function(){
		var editBtnId = $(this).attr('data-id');
		
		 //console.log('METAL ID',editBtnId);

		var metalName = $('#its-jp-metal-name-'+editBtnId).text().trim();
		$('input#metal_name_edit').val(metalName);
		var metalDisplayName = $('#its-jp-metal-display-name-'+editBtnId).text().trim();
		$('input#metal_display_name_edit').val(metalDisplayName);
		var metalGroup = $('#its-jp-metal-name-group-'+editBtnId).text().trim();
		// console.log(metalGroup)
		$('#metal_group_edit').val(metalGroup);
		var metalPrice = $('#its-jp-metal-price-'+editBtnId).text().trim();
		$('input#metal_price_per_gram_edit').val(metalPrice);
		$('input#metalIdEdit').val(editBtnId);
		
	});

	// Updating values in the metal edit form
	$('#editMetalName').click(function(e){
		e.preventDefault();
		var form = $('#metal_edit_frm');
		var formData = form.serialize();
		formData += '&action=admin_ajax_request';
		//console.log(formData);
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: formData,
			beforeSend: function () {

				$('<span class="spinner"></span>').insertAfter('#editMetalName');
				$(".spinner").addClass('is-active');
			},
			complete: function () {
				$(".spinner").hide();
				form.find('input[type=text],input[type=number]').val('');
				$('#staticBackdrop').hide();
				  $('.modal-backdrop').hide();
					// document.body.classList.remove('modal-open');
					// document.body.style.overflow = "auto";
					// document.body.style.paddingRight= "0px";
			},
			success: function (data) {
				var response = JSON.parse(data);

				if (response.status) {
					$('#its-jp-metal-name-'+response.metal_id).text(response.metal_name)
					$('#its-jp-metal-display-name-'+response.metal_id).text(response.metal_display_name)
					$('#its-jp-metal-group-'+response.metal_id).text(response.metal_group)
					$('#its-jp-metal-price-'+response.metal_id).text(response.amount);
					showAlert('success',response.message);
					
				} else {
					showAlert('error',response.message);
				}

			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}

		});
		
	});

// metal table serial number
function addRowCount(tableAttr) {
	$(tableAttr).each(function(){
		$('th:first-child, thead td:first-child', this).each(function(){
			var tag = $(this).prop('tagName');
			$(this).before('<'+tag+'>#</'+tag+'>');
		  });
	  $('td:first-child', this).each(function(i){
		$(this).before('<td>'+(i+1)+'</td>');
	  });
	});
  }
  function removeRowCount(tableAttr) {
	$(tableAttr).each(function(){
		$('th:first-child, thead td:first-child', this).each(function(){
			
			$(this).remove();
		  });
		
	  $('td:first-child', this).each(function(){
		$(this).remove();
	  });
	});
  }
  
  // Call the function with table attr on which you want automatic serial number
  addRowCount('#metal_table');
  addRowCount('#metal_group_table');

  // Price Breakup settings page
$('#priceBreakupSubmit').click(function (e) {
		e.preventDefault();
		var form = $('#priceBreakupForm');
		var formData = form.serialize();
		formData += '&action=admin_ajax_request';
		//console.log(formData);
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: formData,
			beforeSend: function () {
	
				$('<span class="spinner"></span>').insertAfter('#priceBreakupSubmit');
				$(".spinner").addClass('is-active');
			},
			complete: function () {
				$(".spinner").hide();
				
			},
			success: function (data) {
				var response = JSON.parse(data);
	
				if (response.status) {
					showAlert('success',response.message);
				} else {
					showAlert('notice',response.message);
				}
	 
			}
	
		});
	});
// Clear logs
$(document).on('submit','#itsjp-clear-logs',function(e){
		e.preventDefault();
		var form = $('#itsjp-clear-logs');
		var formData = form.serialize();
		formData += '&action=admin_ajax_request';
		console.log(formData);
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: formData,
			beforeSend: function () {
	
				$('<span class="spinner"></span>').insertAfter('#itsjp-clear-log-btn');
				$(".spinner").addClass('is-active');
				$('#itsjp-clear-log-btn').prop('disabled', true);
				showAlert('notice','This process will take some time, so please wait...');
			},
			complete: function () {
				$(".spinner").hide();
				$('#itsjp-clear-log-btn').prop('disabled', false);
				
			},
			success: function (response) {	
			console.log(response,"test");			
				if (response.data.success) {

					showAlert('success',response.data.data.message);					
						location.reload();				
				} else {
					showAlert('notice',data.data[0].message);
				}
	 
			}
	
		});
	});
	
	// Log Settings
$(document).on('submit','#itsjp-log-settings-form',function(e){
		e.preventDefault();
		var form = $('#itsjp-log-settings-form');
		var formData = form.serialize();
		formData += '&action=admin_ajax_request';
		console.log(formData);
		$.ajax({
			type: "POST",
			url: ajaxurl,
			data: formData,
			beforeSend: function () {
	
				$('<span class="spinner"></span>').insertAfter('#itsjp_log_settings_form_save');
				$(".spinner").addClass('is-active');
				$('#itsjp_log_settings_form_save').prop('disabled', true);
				showAlert('notice','This process will take some time, so please wait...');
			},
			complete: function () {
				$(".spinner").hide();
				$('#itsjp_log_settings_form_save').prop('disabled', false);
				
			},
			success: function (data) {				
				if (data.success) {
					showAlert('success',data.data);	
					location.reload();				
									
				} else {
					showAlert('notice',data.data);
				}
	 
			}
	
		});
	});


}); // main closing