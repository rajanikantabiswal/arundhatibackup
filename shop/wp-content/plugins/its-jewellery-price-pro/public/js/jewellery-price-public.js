jQuery.noConflict();
jQuery(document).ready(function ($) {
    var ajaxurl = its_jp_ajax_public.ajaxurl;
    var var_id = '';


    $('input.variation_id').change(function () {
        if ('' != $(this).val()) {

            var_id = $(this).val();
            $.ajax({
                url: ajaxurl,
                data: {
                    'action': 'its_jp_public_ajax_request',
                    'var_id': var_id
                },
                success: function (data) {
                    var response = JSON.parse(data);
                    if (response) {
                        $('.woocommerce-product-attributes.shop_attributes').html(response.ai_tab);

                    }

                    // alert(data);
                },

                error: function (errorThrown) {
                    // window.alert(errorThrown);
                }

            });


        }
    });//


});//jquery end