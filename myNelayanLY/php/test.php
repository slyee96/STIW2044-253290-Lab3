<?php
include_once ("dbconnect.php");
$email = $_POST['email'];
$password = sha1($_POST['password']);
$name = $_POST['name'];
$ppic = $_POST["profilepic"];
$sqlinsert = "INSERT INTO USER(NAME,EMAIL,PASSWORD,PPIC,VERIFY) VALUES ('$name','$email','$password','$ppic','0')";
 
if ($conn->query($sqlinsert) === TRUE) {
    sendEmail($name,$email);
    echo "success";
} else {
    echo "failed";
}
 
function sendEmail($name,$email) {
    $to      = $email;
    $subject = 'Welcome to MyBarber! Verify your Email address.';
    $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>Welcome to MyBarber! Verify your Email address.</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
<p>&nbsp;</p>
<table style="width: 100%; max-width: 960px; position: relative; left: 0; right: 0; margin: 0 auto; border-collapse: collapse; border-spacing: 0; font-size: 14px; line-height: 24px; color: #333; font-family: Microsoft YaHei;">
<tbody>
<tr style="height: 117px;">
<td style="padding: 20px 7.5% 0px; display: block; height: 117px;"><img src="https://sharpns.net/mybarber3/images/EmailLogo.png" width="228" height="110" /></td>
</tr>
<tr style="height: 24px;">
<td style="padding: 20px 7.5% 0px; height: 24px;">Dear '.$name.',</td>
</tr>
<tr style="height: 48px;">
<td style="padding: 20px 7.5% 0px; height: 48px;">You have chosen <a style="color: #2b2b2b; text-decoration: none; cursor: text;" href="#"><strong>'.$email.'</strong></a> as your Email adress for MyBarber. To verify that this is your email address, click the link below.</td>
</tr>
<tr style="height: 77px;">
<td style="padding: 20px 7.5% 0px; height: 77px;">
<p><a href="http://sharpns.net/mybarber3/php/verify.php?email='.$email.'">Click here to Verify your Email.</a></p>
<p>&nbsp;</p>
</td>
</tr>
<tr style="height: 96px;">
<td style="padding: 20px 7.5% 0px; height: 96px;"><strong style="margin: 0; text-decoration: none;">Wondering why you have received this email?</strong><br />When you choose an email address for your account, MyBarber will ask you for verification. Your email address needs to be verified before it can be used as your password restoration method.</td>
</tr>
<tr style="height: 24px;">
<td style="padding: 20px 7.5% 0px; height: 24px;">If this was not you, please do not verify.</td>
</tr>
<tr style="height: 48px;">
<td style="padding: 20px 7.5% 117px; height: 48px;">Sincerely,<br />MyBarber.</td>
</tr>
</tbody>
</table>
<table style="width: 100%; max-width: 960px; position: relative; left: 0; right: 0; margin: 0 auto; text-align: center; border-collapse: collapse; border-spacing: 0; font-size: 12px; line-height: 24px; font-family: Microsoft YaHei;">
<tbody>
<tr>
<td style="display: block; height: 16px; border-top: #efefef solid 1px; background: radial-gradient(top, ellipse farthest-side, rgba(251,251,251,1), rgba(255,255,255,0));">&nbsp;</td>
</tr>
<tr>
<td style="padding-bottom: 2px;">&nbsp;</td>
</tr>
</tbody>
</table>
</body>
</html>
';
    $headers = 'From: noreply@sharpns.net' . "\r\n" .
    $headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    'Reply-To: '.$email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers);
}
?>