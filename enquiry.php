<?php
    if(isset($_POST['submit'])){
        $name = $_POST['your-name'];
        $email = $_POST['email'];
        $phone = $_POST['your-phone'];
        $sub   = $_POST['subject'];
        $msg  = $_POST['message'];
        $to = "guddy.limeli8@gmail.com , singhswagatika23@gmail.com , pranatipriyambadamohanty@gmail.com";
        $subject = "AJPL";
        $headers = "from:$name<$email>";
        $message = "name:$name \n\n Email:$email \n\n phone:$phone \n\n subject:$sub \n\n Message:$msg";
        if(mail($to,$subject,$message,$headers))
        {
         echo   "mail sent"; 
        }else{
          echo  "error";
        }
    }
?>
<form id="ttm-contactform" class="ttm-contactform wrap-form clearfix" method="post" action="">
                                <input type="hidden">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="your-name" type="text" value="" placeholder="Name" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="your-phone" type="text" value="" placeholder="Phone" required="required"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="email" type="email" value="" placeholder="Email" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                <span class="text-input"><input name="subject" type="text" value="" placeholder="Subject" required="required"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <label>
                                        <span class="text-input"><textarea name="message" rows="5" cols="40" placeholder="Tell us about your Problem" required="required"></textarea></span>
                                    </label>
                                    <input name="submit" type="submit" id="submit" class="submit ttm-btn ttm-btn-size-md ttm-btn-shape-round  ttm-btn-style-fill ttm-btn-bgcolor-skincolor mb-5" value="Submit">
                                </form>