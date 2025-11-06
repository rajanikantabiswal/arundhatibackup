<?php
    if(isset($_POST['submit'])){
        $name = $_POST['your-name'];
        $email = $_POST['email'];
        $phone = $_POST['your-phone'];
        $city = $_POST['area'];
        $date   = $_POST['date'];
        $msg  = $_POST['message'];
        $to = "singhswagatika23@gmail.com";
        $subject = "Feedback Form From AJPL";
        $headers = "from:$name<$email>";
        $message = "Name:$name \n\n Email:$email \n\n Phone:$phone \n\n Location:$city \n\n Date:$date \n\n Message:$msg";
        if(mail($to,$subject,$message,$headers))
        {
         echo   "mail sent"; 
        }else{
          echo  "error";
        }
    }
?>

<!doctype html><html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Feedback Form</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="Arundhati Jewellers">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW"><meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
	<link rel="icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Marcellus&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   
    <svg viewBox="0 0 150 150" class="svg-hidden">
        <path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
    </svg>
    <?php include 'header.php';?>
                            <section class="space">
                                <div class="container">
                                    <div class="row gx-70">
                                        <div class="col-lg-6 mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                                            <div class="text-center text-lg-start">
                                                <span class="sec-subtitle">Experience</span>
                                                <h2 class="sec-title3 h1 text-uppercase mb-xxl-2 pb-xxl-1">Share Your <span class="text-theme">Thoughts</span> with us</h2>
                                                <div class="col-xxl-10 pb-xl-3">
                                                    <p class="pe-xxl-4">Arudhanti Jewellers welcomes you. After visiting our store what's in your mind Please share here.</p>
                                                </div>
                                            </div>
                                            <form method="post" action="" class="ajax-contact form-style6">
                                                 <input type="hidden">
                                                <div class="form-group">
                                                    <input name="your-name" type="text" value="" placeholder="Your Name*" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <input name="email" type="email" value="" placeholder="Your Email*" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <input name="your-phone" type="text" value="" placeholder="Your Phone" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <select name="area" id="subject">
                                                        <option value="" selected="selected" disabled="disabled" hidden>Store Location</option>
                                                        <option value="Bhubaneswar">Bhubaneswar</option>
                                                        <option value="Bolangir">Bolangir</option>
                                                        <option value="Bargarh">Bargarh</option>
                                                        <option value="Bhawanipatna">Bhawanipatna</option>
                                                        <option value="Berhampur">Berhampur</option>
                                                        <option value="Sambalpur">Sambalpur</option>
                                                        <option value="Rourkela">Rourkela</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <span>Visiting Date</span>
                                                    <input name="date" type="date" value="" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" id="message" placeholder="Your Thoughts*"></textarea>
                                                </div>
                                                
                                                <input name="submit" type="submit" id="submit" value="Send Message" >
                                            </form>
                                        </div>
                                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="contact-map">
                                            </div>
                                            
                                        </div>
                                    </div>
                                </section>
                            
                            
                            <?php include 'footer.php';?>