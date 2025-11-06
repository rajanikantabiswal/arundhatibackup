<?php

session_start();
$servername = "localhost"; 
$username = "vczfhphf_form_submission"; 
$password = "Submit@24"; 
$dbname = "vczfhphf_form_submission"; 

$ipAddress = $_SERVER['REMOTE_ADDR'];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

   
    $sql = "INSERT INTO submissions (name, address, mobile) VALUES ('$name', '$address', '$mobile')";
    if ($conn->query($sql) === TRUE) {
        
      $sql_ip_check = "SELECT form_submitted FROM ip_submissions WHERE ip_address = '$ipAddress'";
        $result = $conn->query($sql_ip_check);
        
        if ($result->num_rows > 0) {
            // If the IP address exists, update the form submission status to 1
            $update_sql = "UPDATE ip_submissions SET form_submitted = 1 WHERE ip_address = '$ipAddress'";
            $conn->query($update_sql);
        } else {
            // If the IP address doesn't exist, insert a new record
            $insert_sql = "INSERT INTO ip_submissions (ip_address, form_submitted) 
                           VALUES ('$ipAddress', 1)";
            $conn->query($insert_sql);
        }

        // Set session variable to track that the form has been submitted
        $_SESSION['submitted'] = true;
    } else {
        // If there is an error, set session error message
        $_SESSION['error'] = "Error submitting the form. Please try again.";
    }
}

$sql_ip_check = "SELECT form_submitted FROM ip_submissions WHERE ip_address = '$ipAddress'";
$result = $conn->query($sql_ip_check);
$ipSubmitted = false;
if ($result && $row = $result->fetch_assoc()) {
    $ipSubmitted = $row['form_submitted'] == 1;
}

$conn->close();

$formSubmitted = isset($_SESSION['submitted']) && $_SESSION['submitted'] === true || $ipSubmitted;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Popup Form</title>
    <style>
    body.locked {
    overflow: hidden; /* Disables scrolling */
}

        .modal {
    display: flex; /* Flexbox to center the content */
    justify-content: center;
    align-items: center;
    position: fixed;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7); /* Dark overlay */
    z-index: 1000;
}

/* Modal content (form box) */
.modal-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 400px;
    max-width: 90%;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Title Styling */
h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Input and Textarea styling */
input, textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0 10px 0; /* Add margin between fields */
    border: 2px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
}

/* Input focus styling */
input:focus, textarea:focus {
    border-color: #4CAF50;
    outline: none;
}

/* Placeholder styling */
input::placeholder, textarea::placeholder {
    color: #888;
    font-style: italic;
}

/* Button Styling */
button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    width: 100%;
}

button:hover {
    background-color: #45a049;
}

/* Error message styling */
#errorMessage {
    color: red;
    font-size: 14px;
    margin-top: 10px;
}

/* Success message styling */
#thankyouMessage {
    display: none; /* Hidden by default */
    text-align: center;
    font-size: 18px;
    color: green;
    padding: 20px;
    border-radius: 10px;
    background-color: #fff;
    width: 400px;
    max-width: 90%;
    margin-top: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

#thankyouMessage h3 {
    margin: 0;
    font-size: 20px;
    color: #4CAF50;
}

/* Hide modal after form submission */
#modal.hidden {
    display: none;
}
.dismiss-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    font-weight: bold;
    color: #333;
    cursor: pointer;
    transition: color 0.3s;
}

.dismiss-btn:hover {
    color: #ff0000; /* Change color on hover */
}

    </style>
</head>
<body>
    <?php if (!$formSubmitted): ?>
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="dismiss-btn">&times;</span>
            <h2>Please Fill Out the Form</h2>
            <form action="index.php" method="POST" id="form" onsubmit="return validateForm()">
                <input type="text" id="name" name="name" placeholder="Enter your full name" required><br>
                <textarea id="address" name="address" placeholder="Enter your City" required style="min-height:60px!important;"></textarea><br>
                <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number" required><br>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <!-- Display error if something went wrong -->
    <?php if (isset($_SESSION['error'])): ?>
        <div style="color: red; text-align: center;">
            <?php echo $_SESSION['error']; ?>
        </div>
        <?php unset($_SESSION['error']); // Clear the error message ?>
    <?php endif; ?>

    <!-- Success (Form submitted) -->
    <?php if ($formSubmitted): ?>
        <script>
            // Hide the modal after form submission
            document.getElementById("modal").style.display = "none";

            // Optionally display a success message
            alert('Thank you for your submission!');
        </script>
    <?php endif; ?>
    
    
    
    <script>
    
  
   document.querySelector('.dismiss-btn').addEventListener('click', function() {
            document.querySelector('#modal').style.display = 'none'; // Hide modal
        });

        function validateForm() {
    // Get form values
    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var mobile = document.getElementById("mobile").value;
    var errorMessage = document.getElementById("errorMessage");


    errorMessage.innerHTML = '';


    if (name === "" || address === "" || mobile === "") {
        errorMessage.innerHTML = "All fields are mandatory!";
        return false; 
    }

    var phoneRegex = /^[0-9]{10}$/; 
    if (!phoneRegex.test(mobile)) {
        errorMessage.innerHTML = "Please enter a valid 10-digit mobile number.";
        return false;
    }
    
    document.getElementById("modal").classList.add("hidden");

    document.getElementById("thankyouMessage").style.display = "block";

    return true;
    
    
}

    </script>
</body>
</html>
