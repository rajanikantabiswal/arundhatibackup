jQuery.noConflict();
jQuery(document).ready(function($) {
    var ajaxurl = its_price_breakup_ajax_public.ajaxurl;
	var var_id='';
    var varlength = $('.woocommerce-variation-price').length;
    //console.log(varlength);
    if(varlength == 0){
        $('#pleasewait').text('');
    }
	
    
       $( 'input.variation_id' ).change( function(){
          if( '' != $(this).val() ) {
               
               $('#pleasewait').text('Please wait ...');
               $('#show-breakup-below-tab').text('Please wait ...');
               $('#pleasewait').attr('data-bs-toggle','');
             var_id = $(this).val();
             $.ajax({
           url:ajaxurl,
           
           data:{
               'action':'its_variable_product_price_breakup_ajax_request',
               'var_id': var_id
           },
          
           complete: function(xhr){
            $('#pleasewait').text('Show');
            
            $('#show-breakup-below-tab').text('Hide');
            $('#simple-breakup-below-tab').css('display','');

            $('#pleasewait').attr('data-bs-toggle','modal');
           },
           success:function(data){
               var response = JSON.parse(data);
               $('#breakupresult').html(response.breakup);
               $('#simple-breakup-below-tab').html(response.breakup);
               
            // alert(data);
           },
        
           error: function(errorThrown){
            window.alert(errorThrown);
        }
           
       });
          
             
          }
       });//
       
      //Price breakup for variable product start
      $('#variableBreakup').click(function(){
      var cond = $('#variableBreakup').text();
      
      if(cond=='Show'){
          $('#variableBreakup').text('Hide');
          $('#breakupresult').css('display','');
          
      }else{
          $('#variableBreakup').text('Show');
          $('#breakupresult').css('display','none');
      }
          
      });
      //end
// Price breakup for single product start
      $('#simpleBreakup').click(function(){
        var cond = $('#simpleBreakup').text();
        
        if(cond=='Show'){
            $('#simpleBreakup').text('Hide');
            $('#simplebreakupresult').css('display','');
            
        }else{
            $('#simpleBreakup').text('Show');
            $('#simplebreakupresult').css('display','none');
        }
            
        }); 
            // end  
        // Price breakup for simple product below product tab
        $('#show-breakup-below-tab').click(function(){
            var cond1 = $('#show-breakup-below-tab').text();
            if(cond1 == 'Show' || cond1 == 'SHOW'){
                $('#show-breakup-below-tab').text('Hide');
                $('#simple-breakup-below-tab').css('display','');
            } else {
                $('#show-breakup-below-tab').text('Show');
                $('#simple-breakup-below-tab').css('display','none');
            }
        })
        // end
        $('.reset_variations').click(function(){
            $('#show-breakup-below-tab').text('');
                $('#simple-breakup-below-tab').text('');

        })
             
    });//jquery end