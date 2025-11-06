

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


 
  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog" style="z-index: 9999;">
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
        <a href="offers.php" target="_blank;"><img src="assets/img/hero/raining-offer.jpg"></a> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
       
    </div>
  </div>
 
<!--popup script-->
<script>
 $( document ).ready(function(){
   setTimeout(function(){$('#myModal1').modal('show');}, 3000);
    
   setTimeout(function() {$('#myModal1').modal('hide');}, 6000);
});
  </script>
         

