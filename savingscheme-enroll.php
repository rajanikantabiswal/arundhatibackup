<?php
if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['mail']);
    $phone = trim($_POST['phone']);
    $location = trim($_POST['city']);
    $msg  = trim($_POST['message']);

    $to = "digitalhead@arundhatigroup.com, arundhatidigitalmarketing@gmail.com, rajanikanta.od@gmail.com";
    $subject = "Arundhati Jewellers Gold Saving Scheme Enrollment";

    // Always use \r\n for mail headers
    $headers = "From: Gold Saving Scheme <email@arundhatijewellers.com>\r\n";
    $headers .= "Reply-To: $email\r\n"; // So replies go to the user
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $message = "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Location: $location\n";
    $message .= "Message:\n$msg\n";

    if (mail($to, $subject, $message, $headers)) {
        echo "<h4>Thank you for enrolling. We will contact you soon.</h4>";
    } else {
        echo "<h4>Error: Message could not be sent.</h4>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Arundhati Jewellers | Trusted Jewellery Store in Odisha</title>
    <meta name="author" content="Arundhati Jewellers">
    <meta name="description" content="Arundhati jewellers is a Top rated Gold & Diamond Jewellery Store in Bhubaneswar , Odisha. We are Odisha's Largest Jewellery Brand Presence In Nine Cities across Odisha.">

    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <link rel="icon" href="assets/img/hero/arundhati-favicon.png" type="image/x-icon">
    <!-- font-awesome -->
    <link rel="stylesheet" href="../../../../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Bootstrap-5 -->
    <link rel="stylesheet" href="assets-career/css/bootstrap.min.css">
    <!-- custom-styles -->
    <link rel="stylesheet" href="assets-career/css/style.css">
    <link rel="stylesheet" href="assets-career/css/responsive.css">
    <link rel="stylesheet" href="assets-career/css/animation.css">
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="canonical" href="https://www.arundhatijewellers.com/" />

</head>

<body>
    <?php include 'header.php'; ?>

    <main style="background-image:url('assets-career/BACKGROUND.jpg');" class="py-5">
        <div class="logo">
            <div class="logo-icon">
                <a href="https://www.arundhatijewellers.com"><img src="assets-career/SS-LOGO.png" alt="BeRifma" style="height:100px;"></a>
            </div>
            <div class="logo-text">
            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="c-order tab-sm-100 col-md-6">

                        <!-- side -->
                        <div class="left">
                            <article class="side-text" style="background:rgba(255, 255, 255, .1); box-shadow:0 25px 45px rgba(0,0,0,.2);border:2 px solid rgba(255,255,255,.5);backdrop-filter:blur;padding:15px;border-radius:20px;">
                                <h2>Swarna Samriddhi</h2>
                                <h6>Arundhati Jewellers Swarna Saving Plan</h6>
                                <p><span>Swarna Samriddhi Calculator</span></p>
                                <form id="steps" method="post">
                                    <div class="input-field">
                                        <label>I want to do a monthly deposit in my saving scheme account :</label>

                                        <input type="number" id="user_input" oninput="calculate(this.value)" value="" min="1000" max="200000" step="1000" required style="background-color:#fff; border:1 px solid pink;padding-top:10px;padding-bottom:7px;font-weight:bold; color:#e61e61 !important;">
                                        <p id="error_message" style="color: red; font-size:15px;"></p>
                                        <label for="user_input"></label>
                                        <p id="multiply_result" style="font-size:20px;"></p>
                                        <p id="eighty_percent" style="font-size:20px;"></p>
                                        <p id="total_value" style="font-size:20px;"></p>
                                    </div>
                                    <h6>For any other queries please fill up the form & share with us.</h6>
                                </form>

                            </article>
                            <div class="left-img">
                                <!-- <img src="money.png" alt="BeRifma" style="height:540px; width:500px;" class="img-fluid"> -->
                            </div>

                        </div>
                    </div>
                    <div class="tab-sm-100 offset-md-1 col-md-5">
                        <div class="right">

                            <!-- form -->
                            <form id="steps" method="post" enctype="multipart/form-data">
                                <input type="hidden">
                                <!-- step 1 -->
                                <div id="step1" class="form-inner lightSpeedIn">
                                    <div class="input-field">
                                        <label><i class="fa-regular fa-user"></i>Name <span>*</span></label>
                                        <input required type="text" name="name" id="mail-name" placeholder="Type Name">
                                        <span></span>
                                    </div>
                                    <div class="input-field">
                                        <label for="phone"><i class="fa-solid fa-phone"></i>Phone <span>*</span></label>
                                        <input type="text" name="phone" id="phone" placeholder="Type Phone Number">
                                        <span></span>
                                    </div>
                                    <div class="input-field">
                                        <label><i class="fa-regular fa-envelope"></i>Email Address <span>*</span></label>
                                        <input required type="text" name="mail" id="mail-email" placeholder="Type email address">
                                        <span></span>
                                    </div>
                                    <div class="input-field">
                                        <label><i class="fa-regular fa-envelope"></i>Nearest Arundhati store to you <span>*</span></label>
                                        <select class="form-control" name="city">
                                            <option value="Bhubaneswar">Bhubaneswar</option>
                                            <option value="Cuttack">Cuttack</option>
                                            <option value="Puri">Puri</option>

                                            <option value="Bolangir">Bolangir</option>
                                            <option value="Bhawanipatna">Bhawanipatna</option>
                                            <option value="Rourkela">Rourkela</option>
                                            <option value="Berhampur">Berhampur</option>
                                            <option value="Sambalpur">Sambalpur</option>
                                            <option value="Bargarh">Bargarh</option>
                                            <option value="Angul">Angul</option>
                                        </select>
                                        <span></span>
                                    </div>
                                    <div class="input-field">
                                        <label for="message"><i class="fa-solid fa-message"></i>How can we help </label>
                                        <input type="text" name="message" id="message" placeholder="A brief Description here">
                                        <span></span>
                                    </div>
                                </div>

                                <!-- step Button -->
                                <input type="submit" name="submit" value="Submit Your Enquiry" class="submit" style="background-color:#000; Color:#fff;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <?php include 'footer.php'; ?>


    <script>
        // Function to calculate and display results
        function calculate(userInput) {
            // Check if the input is not empty, greater than or equal to 1000, and a multiple of 1000
            if (userInput !== "" && !isNaN(userInput) && userInput >= 1000 && userInput % 1000 === 0 && userInput <= 200000) {
                // Constant
                var constantNumber = 11;

                // Calculate values
                var multiplyResult = userInput * constantNumber;
                var eightyPercent = userInput * 0.8;
                var totalValue = multiplyResult + eightyPercent;

                // Display results
                document.getElementById('multiply_result').innerHTML = 'Your Total Amount for 11 Months (₹)' + ' = ' + multiplyResult;
                document.getElementById('eighty_percent').innerHTML = 'Bonus Value From Arundhati Jewellers (₹) ' + '= ' + eightyPercent;
                document.getElementById('total_value').innerHTML = 'Total value of redemption after 11th month(₹) :  ' + totalValue;

                // Clear error message
                document.getElementById('error_message').innerHTML = '';
            } else {
                // If the input is invalid, show an error message and clear the results
                document.getElementById('error_message').innerHTML = 'Amount Should be minimum of 1K and above and amount should be multiply of 1000';
                document.getElementById('multiply_result').innerHTML = '';
                document.getElementById('eighty_percent').innerHTML = '';
                document.getElementById('total_value').innerHTML = '';
            }
        }

        // Call the calculate function with the initial value on page load
        window.onload = function() {
            calculate("");
        };
    </script>

    <!-- Bootstrap-5 -->
    <script src="assets-career/js/bootstrap.min.js"></script>

    <!-- Jquery -->
    <script src="assets-career/js/jquery-3.6.1.min.js"></script>

    <!-- My js -->
    <script src="assets-career/js/custom.js"></script>
</body>

</html>