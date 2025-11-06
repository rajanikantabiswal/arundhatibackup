<?php
$statusMsg='';
if(isset($_FILES["file"]["name"])){
   $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mbl'];
    $qualification = $_POST['qual'];
  $jobrole = $_POST['jobrole'];
    $message = $_POST['message'];
$fromemail =  $email;
$subject="Uploaded file attachment";
$email_message = '<h2>Career Request Submitted</h2>
                    <p><b>Name:</b> '.$name.'</p>
                    <p><b>Email:</b> '.$email.'</p>
                    <p><b>Mobile:</b> '.$mobile.'</p>
                    <p><b>Qualification:</b> '.$qualification.'</p>
                    <p><b>Jobrole:</b> '.$jobrole.'</p>
                    <p><b>Message:</b><br/>'.$message.'</p>';
$email_message.="Please find the attachment";
$semi_rand = md5(uniqid(time()));
$headers = "From: ".$fromemail;
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
 
    $headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
 
if($_FILES["file"]["name"]!= ""){  
	$strFilesName = $_FILES["file"]["name"];  
	$strContent = chunk_split(base64_encode(file_get_contents($_FILES["file"]["tmp_name"])));  
	
	
    $email_message .= "This is a multi-part message in MIME format.\n\n" .
    "--{$mime_boundary}\n" .
    "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .
    $email_message .= "\n\n";
 
 
    $email_message .= "--{$mime_boundary}\n" .
    "Content-Type: application/octet-stream;\n" .
    " name=\"{$strFilesName}\"\n" .
    //"Content-Disposition: attachment;\n" .
    //" filename=\"{$fileatt_name}\"\n" .
    "Content-Transfer-Encoding: base64\n\n" .
    $strContent  .= "\n\n" .
    "--{$mime_boundary}--\n";
}
$toemail="singhswagatika23@gmail.com , singhswagatika3@gmail.com ,pranatipriyambadamohanty@gmail.com";	
 
if(mail($toemail, $subject, $email_message, $headers)){
         echo   "mail sent"; 
        }else{
          echo  "error";
        }
}
   ?>


<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Career - Arundhati Jewellers</title>
    <meta name="author" content="Arundhati Jewellers Career Page">
    <meta name="description" content="Arundhati Jewellers Career Page">
    <meta name="keywords" content="Arundhati Jewellers">
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
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 mb-40 mb-lg-0 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="text-center text-lg-start">
                            <span class="sec-subtitle">Career</span>
                            <h2 class="sec-title3 h1 text-uppercase mb-xxl-2 pb-xxl-1">Share Your 
                                <span class="text-theme">Profile</span> with us
                            </h2>
                            <div class="col-xxl-10 pb-xl-3">
                                <p class="pe-xxl-4"> 
                                    we continuously require filling up creative posts as well as other posts.
                                    That is why we expect the suitable candidates to apply to the posts. 
                                </p>
                            </div>
                        </div>
                        <form action="" name="contact_form" method="post" class="ajax-contact form-style6" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" name="name" value="" placeholder="Your Name*" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" value="" placeholder="Your Mail*" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="mbl" value="" placeholder="Phone" maxlength="10">
                            </div>
                            <div class="form-group">
                                <input type="text" name="qual" value="" placeholder="Qualification">
                            </div>
                            <div class="form-group">
                                <select class="selectmenu" name="jobrole">
                                        <option >Experience/Fresher</option>
                                        <option value="fresher">Fresher</option>
                                        <option value="experience">Experience</option>
                                        
                                    </select>  
                            </div>
                            <div class="form-group">
                                <input type="file" name="file" value="" placeholder="Subject"><span>Upload Your latest Resume</span>
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="Your Message.." required=""></textarea>
                            </div>
                            
                                <input id="form_botcheck" type="submit" name="submit" class="thm-btn bgclr-1 form-control"  value="send message">
                        </form>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
            </div>
        </section>
                            
        <?php include 'footer.php';?>