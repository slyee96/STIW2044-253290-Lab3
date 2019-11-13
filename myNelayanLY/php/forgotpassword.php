<?php
error_reporting(0);
include_once("dbconnect.php");
$email = $_POST['Email'];
$verify = '1';
$sql = "SELECT * FROM User WHERE Email = '$email' AND Verify = '$verify'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     sendEmail($email, $password);
     echo "Reset password email sent";
}else{
    echo "Reset password email not sent";
    
}


function sendEmail($useremail,$userpassword) {
    $to      = $useremail; 
    $subject = 'Verification for Reset Password'; 
    $message = 'http://myondb.com/myNelayanLY/php/resetverify.php?email='.$useremail.'&password='.$userpassword; 
    $headers = 'From: noreply@myNelayanLY.com.my' . "\r\n" . 
    'Reply-To: '.$useremail . "\r\n" . 
    'X-Mailer: PHP/' . phpversion(); 
    mail($to, $subject, $message, $headers); 
}
?>