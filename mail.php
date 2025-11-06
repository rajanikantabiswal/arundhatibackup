<?php

$message = '';


if (isset($_POST["submit"])) {
    $skills = '';
    foreach ($_POST["skills"] as $row) {
        $skills .= $row . ', ';
    }
    $skills = substr($skills, 0, -2);
    $path = 'upload/' . $_FILES["resume"]["name"];
    move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
    $message = '
		<h3 align="center">Applicant Details</h3>
		<table border="1" width="100%" cellpadding="5" cellspacing="5">
			<tr>
				<td width="30%">Name</td>
				<td width="70%">' . $_POST["name"] . '</td>
			</tr>
			<tr>
				<td width="30%">Address</td>
				<td width="70%">' . $_POST["address"] . '</td>
			</tr>
			<tr>
				<td width="30%">Email Address</td>
				<td width="70%">' . $_POST["email"] . '</td>
			</tr>
			<tr>
				<td width="30%">Area of Interest</td>
				<td width="70%">' . $skills . '</td>
			</tr>
			<tr>
				<td width="30%">Experience Year</td>
				<td width="70%">' . $_POST["experience"] . '</td>
			</tr>
			<tr>
				<td width="30%">Phone Number</td>
				<td width="70%">' . $_POST["mobile"] . '</td>
			</tr>
			<tr>
				<td width="30%">Additional Information</td>
				<td width="70%">' . $_POST["additional_information"] . '</td>
			</tr>
		</table>
	';
}
    require 'class/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();   
    
    ?>
    