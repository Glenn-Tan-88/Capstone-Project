<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
require_once '../phpmailer/PHPMailerAutoload.php';
include 'includes/header.php';
$formerror="";

$email="";
$password="";
$error_auth="";
$error_name="";
$error_passwd="";
$error_email="";
$validate=new Validation();

if(isset($_POST["submitted"])){
   	$email=$_POST["email"];
	$UM=new UserManager();
	$existuser=$UM->getUserByEmail($email);

	if(isset($existuser)){
			//generate new password
			$newpassword=$UM->randomPassword(8,1,"lower_case,upper_case,numbers");
			//update database with new password
			$UM->updatePassword($email,md5($newpassword[0]));  
			//$formerror="Valid email user. password: ".$newpassword[0];
			//coding for sending email
			$mail = new PHPMailer();
			$mail->setFrom('abcjobs88@gmail.com', 'Admin');
			$mail->addAddress($email, $email);
			$mail->Subject = 'Password Reset for ABC Jobs Portal';
			$mail->isHTML(TRUE);
			$mail->Body = '<html>Your Password Has Been Reset</html>';
			$mail->AltBody = 'Your Password Has Been Reset';
			
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->SMTPSecure = 'ssl';
			$mail->SMTPAuth = TRUE;
			$mail->Username = 'abcjobs88@gmail.com';
			$mail->Password = 'Yfoog666';
			
			/* Send the message */
			if (!$mail->send())
			{
			    echo "Error: " . $mail->ErrorInfo;
			}
			else
			{
			    echo "Message sent.";
}

			$formerror="New password have been sent to ".$email;
			//header("Location:home.php");
	}else{
			$formerror="Invalid email user";
	}
}

?>
<html>
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
	p, h1 { padding-left : 50px }
</style>
<body>

<h1>Forget Password</h1><br>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<table border='0' width="600px">
  <tr>    
    <td><p>Email</td>
    <td><input type="email" name="email" value="<?=$email?>" pattern=".{1,}"   required title="Cannot be empty field" size="30"></td>
	<td><?php echo $error_name?></p>
  </tr> 
  <tr>
    <td></td>
    <td><br><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    </td>
  </tr>
  <tr><p style="color:red;"> <?php echo $formerror?></p></tr>
</table>
</form>
<?php
include 'includes/footer.php';
?>