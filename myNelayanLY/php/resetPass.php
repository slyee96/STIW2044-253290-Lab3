<?php
error_reporting(0);
include_once("dbconnect.php");

$password = $_POST['reset_password'];
$password2 = $_POST['Confirm_Rest_password'];
if ($password != $password2) {
    echo "Different Confirmation password";
} else {
    $sql = "UPDATE Register SET password = sha1('$password')";
    echo "successful changes";
    }
    
if ($conn->query($sql) === TRUE) {
    //echo "success";
} else {
    echo "error";
}



$conn->close();
?>


<style>
 .box {
    width:500px;
    height:230px;
    background-color:#d9d9d9;
    position:fixed;
    border: none;
    margin-left:-150px; /* half of width */
    margin-top:-150px;  /* half of height */
    top:60%;
    left:40%;
 }
 
 .box2 {
    width:20%;
    height:40%;
    position:fixed;
    border: none;
    margin-left:-150px; /* half of width */
    margin-top:-150px;  /* half of height */
    top:20%;
    left:43%;

     
 }
 
 .button {
  background-color: #4CAF50; /* Green */
  border: none;
  border-radius: 4px;
  color: white;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>

<html>
<body>
    
    <table class="box" align="center">
         <img src="/myNelayanWJ/image/icon3.png" class="box2" alt="logo" height="40%" width="20%">
        <tr>
           
    <form method="post" name="resetPass" id="resetPass"></tr>
    
        <tr><td align="center"><p>Reset Password</p></td></tr>
        <tr><td align="center"><input  name="reset_password"  value="" type="password" required /></td></tr>
        <tr><td align="center"><p>Confirm Password</p></td></tr>
        <tr><td align="center"><input id="confirm_password" name="Confirm_Rest_password"  value="" type="password"  /></td></tr>
    
        <tr><td align="center" height="60px">
            <input type="submit" class="button" name="submit_reset" value="Reset Password" />
            <input type="reset" class="button" value="Clear" /></td></tr>

    </form>
    </table>
</body>
</html>

