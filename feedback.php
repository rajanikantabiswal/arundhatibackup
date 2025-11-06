<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $location = $_POST['city'];
        
        $date = $_POST['date'];
        $msg  = $_POST['message'];
        $to = "singhswagatika23@gmail.com , operationhead@arundhatijewellers.com , saleshead.arundhatijewellers@gmail.com";
        $subject = "Feedback Form From Arundhati Jewellers";
        $headers = "from:$name<$email>";
        $message = "Name:$name \n\n Email:$email \n\n Phone:$phone \n\n Location:$location \n\n  Visiting Date:$date \n\n Message:$msg";
        if(mail($to,$subject,$message,$headers))
        {
         echo   "<h4>Thank You For Your Feedback. Please keep visiting your nearest Arundhati Jewellers.</h4>"; 
        }else{
          echo  "error";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback Form | Arundhati Jewellers</title>
    <meta name="description" content="Arundhati Jewellers"/>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
	<link rel="icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container">
      <span class="big-circle"></span>
      <img src="img/shape.png" class="square" alt="shape" />
      <div class="form">
        <div class="contact-info">
          <a href="https://arundhatijewellers.com/"><img src="assets/img/hero/Logo.png" style="height:100px;"></a>
          
          <p class="text">
            ARUNDHATI One of the most preferred and trusted brands of Odisha, architected and designed in the year 2000 by a technocrat Mr Brahmananda Meher (BE, Mechanical). He idealises to provide best crafted jewellery with unparallel brilliance in superior quality at best affordable prices. 
          </p>

          <div class="info">
            <div class="information">
              <img src="https://www.iconarchive.com/download/i103443/paomedia/small-n-flat/map-marker.1024.png" class="icon" alt="location" />
              <p style="color:#000;">11/A, Janpath Rd, Satya Nagar, Bhubaneswar, Odisha 751014</p>
            </div>
            <div class="information">
              <img src="https://cdn-icons-png.flaticon.com/512/6806/6806987.png" class="icon" alt="email" />
              <p><a href = "mailto: info@arundhatijewellers.com" style="text-decoration:none;color:#000;">info@arundhatijewellers.com</a></p>
            </div>
            <div class="information">
              <img src="https://img.freepik.com/free-icon/call_318-350612.jpg?w=360" class="icon" alt="phone" />
              <p><a href="tel:1800 345 0018 " style="color:#000;text-decoration:none;">1800 345 0018 </a></p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with Us :</p>
            <div class="social-icons">
              <a href="https://www.facebook.com/arundhatijewellersofficial/"><i class="fa fa-facebook"></i></a>
              <a href="https://twitter.com/ArundhatiJewel?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><i class="fa fa-twitter"></i></a>
              <a href="https://www.instagram.com/arundhatijewellersofficial/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <!--<a href="https://www.youtube.com/channel/UCNJmw17OpEawvfsOMYqphqg"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>-->
            </div>
          </div><br/><br/>
          <a href="index.php" style="width:50px; height:50px; border-radius:7px; background-color: #e72463; padding:10px;text-decoration: none; color:#fff;">Go Home</a>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" autocomplete="off" method="post">
            <input type="hidden">
            <h3 class="title">Share Your Thoughts With Us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" required="" />
              <label for="">Your Name</label>
              <span>Your Name</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" required=""/>
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" required=""/>
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container">
              <select id="country" class="input" required="" style="background-color: #f06292;" name="city">
                <option value="cname">Store Location</option>
                <option value="Bhubaneswar">Bhubaneswar</option>
                <option value="Balangir">Bolangir</option>
                <option value="Berhampur">Berhampur</option>
                <option value="Rourkela">Rourkela</option>
                <option value="Bhawanipatna">Bhawanipatna</option>
                <option value="Bargarh">Bargarh</option>
                <option value="Sambalpur">Sambalpur</option>
              </select>
            </div>
            
            <div class="input-container">
                <h6>Visiting Date</h6>
              <input type="date" name="date" class="input" required=""/>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="submit" class="btn" name="submit"/>
          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
</body>
</html>

  </body>
</html>
