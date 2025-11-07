
jQuery.noConflict();
jQuery(document).ready(function ($) {
	// Your jQuery code here, using $ to refer to jQuery.
	var ajaxurl = its_jp_ajax_object.ajaxurl;

    let tabValue = new URLSearchParams(window.location.search).get('tab')
    if (tabValue == 'discount') {
        
        
    
// Saving data from Discount settings form


    let itsSettingsDiscountForm = document.getElementById('its-settings-discount-form')
    itsSettingsDiscountForm.addEventListener('submit',function(e){
        e.preventDefault()
        let postdata = $(itsSettingsDiscountForm).serialize() + '&action=admin_ajax_request'
        
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: postdata,
            beforeSend: function () {
                $('<span class="spinner"></span>').insertAfter("#discountSave");
                $(".spinner").addClass('is-active');
            },
            complete: function () {
                $(".spinner").hide();

            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status) {
                    showAlert('success',data.message);
                    
                } else {
                    showAlert('notice',data.message);
                }

                

            }
        });
    });
}
    // Saving data from General Tab Form
    if (tabValue == 'general') {
   $('#its-settings-general-form').submit(function(e){
        e.preventDefault();
        let postdata = $('#its-settings-general-form').serialize() + '&action=admin_ajax_request'
        // console.log(postdata);
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: postdata,
            beforeSend: function () {
                $('<span class="spinner"></span>').insertAfter("#generalSave");
                $(".spinner").addClass('is-active');
            },
            complete: function () {
                $(".spinner").hide();

            },
            success: function (response) {
                var data = JSON.parse(response);
                if (data.status) {
                    showAlert('success',data.message);
                    
                } else {
                    showAlert('notice',data.message);
                }

                

            }
        });

    });
}
  
}); // end of jquery
