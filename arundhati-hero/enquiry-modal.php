 <div class="modal fade" id="ebooknow" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icofont icofont-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                
                    <div class="modal-content">
                    <h3 class="text-center mt-5">E-Book Now</h3>
                        <div class="modal-body">
                        <form>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="EBName" id="ebname" value="" class="form-control" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="VName" id="vname" value="" class="form-control" placeholder="Vehicle Name you want to Book" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="EBMobile" id="ebmobile" value="" class="form-control" placeholder="Mobile" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="EBCity" id="ebcity" value="" class="form-control" placeholder="City" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <textarea class="form-control" name="EBMsg" id="ebmsg" value="ebookservice" placeholder="Meaasage"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="EBSrvc" id="ebsrvc" value="ebookservice" class="form-control" placeholder="Enquiry For E-Book Service" readonly>
                                </div>
                            </div>
                            <input type="submit" value="submit"  onclick="bookwhatsapp()" name="submit" 
                            class="btn btn-danger">
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="bookservice" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icofont icofont-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                
                    <div class="modal-content">
                    <h3 class="text-center mt-5">Book Service</h3>
                        <div class="modal-body">
                        <form>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="BName" id="bname" class="form-control" value="" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="BEmail" id="bemail" class="form-control" placeholder="Email" value="" >
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="BMobile" id="bmobile" class="form-control" value="" placeholder="Mobile" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="BCity" id="bcity" value="" class="form-control" placeholder="City">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="BReason"  id="breason" value="" placeholder="Service Details"></textarea>
                                </div>
                            </div>
                            <input type="submit" value="submit"  onclick="bswhatsapp()" name="submit" 
                            class="btn btn-danger">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- <div class="modal fade" id="bookservice" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icofont icofont-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                
                    <div class="modal-content">
                    <h3 class="text-center mt-5">Book Service</h3>
                        <div class="modal-body">
                        <form>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="RName" id="rname" class="form-control" value="" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="REmail" id="remail" class="form-control" placeholder="Email" value="" required>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="RMobile" id="rmobile" class="form-control" value="" placeholder="Mobile" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="RCity" id="rcity" value="" class="form-control" placeholder="City" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="RReason"  id="rreason" value="" placeholder="Describe your request reason"></textarea>
                                </div>
                            </div>
                            <input type="submit" value="submit"  onclick="bksrvcwhatsapp()" name="submit" 
                            class="btn btn-danger">
                        </form>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="modal fade" id="requestcallback" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icofont icofont-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                
                    <div class="modal-content">
                    <h3 class="text-center mt-5">Request Callback</h3>
                        <div class="modal-body">
                        <form>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="RName" id="rname" class="form-control" value="" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="REmail" id="remail" class="form-control" placeholder="Email" value="" required>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="RMobile" id="rmobile" class="form-control" value="" placeholder="Mobile" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="RCity" id="rcity" value="" class="form-control" placeholder="City" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="RReason"  id="rreason" value="" placeholder="Describe your request reason"></textarea>
                                </div>
                            </div>
                            <input type="submit" value="submit"  onclick="requestwhatsapp()" name="submit" 
                            class="btn btn-danger">
                        </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="testdrive" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="icofont icofont-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog" role="document">
                    
                    <div class="modal-content">
                    <h3 class="text-center mt-5">Test Drive</h3>
                        <div class="modal-body">
                        <form>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" name="Name" id="name" class="form-control" placeholder="Name" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="Email" id="email" value="" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" placeholder="mobile no" name="Phone"
                                        id="phone" value="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Vehicle</label>
                                        <select id="service" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Test Drive</option>
                                        </select>
                                </div>
                            </div>
                            <input type="submit" value="submit"  onclick="gotowhatsapp()" name="submit" 
                            class="btn btn-danger">
                        </form>
                        </div>
                    </div>
                </div>

            </div>

                <script>
                    function gotowhatsapp() {
                    var name = document.getElementById("name").value;
                    var phone = document.getElementById("phone").value;
                    var email = document.getElementById("email").value;
                    var service = document.getElementById("service").value;

                    var url =
                        "https://wa.me/917978629134?text=" +
                        "Name: " +
                        name +
                        "%0a" +
                        "Phone: " +
                        phone +
                        "%0a" +
                        "Email: " +
                        email +
                        "%0a" +
                        "Service: " +
                        service;
                    window.open(url, "_blank").focus();
                    }
                </script>

                <script>
                    function requestwhatsapp() {
                    var name = document.getElementById("rname").value;
                    var email = document.getElementById("remail").value;
                    var phone = document.getElementById("rmobile").value;
                    var city = document.getElementById("rcity").value;
                    var reason = document.getElementById("rreason").value;

                    var url =
                        "https://wa.me/917978629134?text=" +
                        "Name: " +
                        name +
                        "%0a" +
                        "Email: " +
                        email +
                        "%0a" +
                        "Phone: " +
                        phone +
                        "%0a" +
                        "City: " +
                        city +
                        "%0a" +
                        "Reason: " +
                        reason;
                    window.open(url, "_blank").focus();
                    }
                </script>

                <script>
                    function bswhatsapp() {
                    var name = document.getElementById("bname").value;
                    var email = document.getElementById("bemail").value;
                    var phone = document.getElementById("bmobile").value;
                    var city = document.getElementById("bcity").value;
                    var details = document.getElementById("breason").value;


                    var url =
                        "https://wa.me/917978629134?text=" +
                        "Name: " +
                        name +
                        "%0a" +
                        "Email: " +
                        email +
                        "%0a" +
                        "Phone: " +
                        phone +
                        "%0a" +
                        "City: " +
                        city +
                        "%0a" +
                        "Service Details: " +
                        details;
                    window.open(url, "_blank").focus();
                    }
                </script>

                <script>
                    function bookwhatsapp() {
                    var name = document.getElementById("ebname").value;
                    var vhname = document.getElementById("vname").value;
                    var phone = document.getElementById("ebmobile").value;
                    var city = document.getElementById("ebcity").value;
                    var message = document.getElementById("ebmsg").value;
                    var enquiryfor = document.getElementById("ebsrvc").value;


                    var url =
                        "https://wa.me/917978629134?text=" +
                        "Name: " +
                        name +
                        "%0a" +
                        "Enquiry For: " +
                        enquiryfor +
                        "%0a" +
                        "Vehicle Name: " +
                        vhname +
                        "%0a" +
                        "Phone: " +
                        phone +
                        "%0a" +
                        "City: " +
                        city +
                        "%0a" +
                        "Message: " +
                        message;
                    window.open(url, "_blank").focus();
                    }
                </script>