jQuery.noConflict();
jQuery(document).ready(function ($) {
  var bulk_price_url = itsjp_bulk_price_object.ajaxurl;
  // Bulk Price Update Form Processing
	$('#bulk-price-update-save').click(function (e) {
		e.preventDefault();
		var bulk_price_form = $('#itsjp-bulk-price-update-form');
		var bulk_price_form_data = bulk_price_form.serialize();
		bulk_price_form_data += '&action=bulk_price_update&manual_update=true';
		//console.log(bulk_price_form_data);
		$.ajax({
			type: "POST",
			url: bulk_price_url,
			data: bulk_price_form_data,
			beforeSend: function () {

				$('<span class="spinner"></span>').insertAfter('#bulk-price-update-save');
				$(".spinner").addClass('is-active');
				$('#bulk-price-update-notice').html('<p>Processing ....</p>');
			},
			complete: function () {
				$(".spinner").hide();
				
			},
			success: function (response) {
				let taskId = response.data.task_id;
				let pids = response.data.pids;
				let totalJobs = response.data.total_jobs;
				if (response.success) {
          $('#bulk-price-update-notice').html('<p>' + response.data.message + '</p>'); 
          // $('#updated-products-table').html(`${response.updated_products}`);
				} else {
					$('#bulk-price-update-notice').html('<div class="alert alert-danger alert-dismissible" role="alert"><p>' + response.data.message + '</p> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>')/*.fadeIn()*/;
				}
				showProgress(taskId, totalJobs);


			}

		});
	});

	function showProgress(taskId, totalJobs) {
        $.ajax({
            type: "POST",
			url: bulk_price_url,
            data: { action: 'bulk_price_update', task_id: taskId, show_progress: true, total_jobs: totalJobs },
            success: function(response) {
                if (response.success) {
                    var progress = response.data.progress;
					$('#progress-bar-container').show();
                    $('#progress-bar').css('width', progress + '%');
					$('#progress-text').html('<p>' + response.data.message + '</p>'); 

                    if (progress < 100) {
                        // Continue updating prices until 100% progress
                        setTimeout(showProgress, 5000, taskId, totalJobs);
                    } else {
                        // Update complete, handle any additional actions
                        console.log('Price update complete!');
                    }
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }


}); // jquery end