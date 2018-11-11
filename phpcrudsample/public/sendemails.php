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
	$message=$_POST["message"];
	$subject=$_POST["subject"];
	
	$con=mysqli_connect("localhost","root","test123","phpcrudsample");			
	$sql ="SELECT id, email, firstname FROM tb_user WHERE subscribe = 1";
	$result = $con->query($sql);
	
	//coding for sending email
	foreach($result as $row){
		$mail = new PHPMailer();
		$mail->setFrom('abcjobs88@gmail.com', 'ABC Jobs Pte Ltd');
		$mail->Subject = $subject;
		$mail->isHTML(TRUE);
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->SMTPSecure = 'ssl';
		$mail->SMTPAuth = TRUE;
		$mail->Username = 'abcjobs88@gmail.com';
		$mail->Password = 'Yfoog666';
		
		$id1 = $row["id"];
		$message1 = $message."<br><br>Regards, <br>Administrator<br>ABC Jobs Pte Ltd
							<br>_____________________________________________________________________
							<br>If you do not wish to receive our newsletter updates, please click on the below link :-<br>
						         <a href='http://localhost/phpcrudsample/public/modules/user/unsubscribe.php?id=".$id1."'>Click here to unsubscribe</a>";  
						        
		$mail->addAddress($row["email"],$row["firstname"]);
		$mail->Body = $message1;
		
		// Send the message
		if (!$mail->send()) {
			echo "Error: " . $mail->ErrorInfo;
		}
		
	}
	echo "<p><br>Message sent.</p>";
	$formerror="New password have been sent to ".$email;
	header("Location:home.php");
} else {
	$formerror="Invalid email user";
}

?>
<html>
<link rel="stylesheet" href=".\css\pure-release-1.0.0\pure-min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
	p, h2, h4 { padding-left : 50px }
</style>
<body>

<h2>Send Bulk Email</h2><br>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<table border='0' width="600px">
<h4>Subject <br></h4>
<tr><p><input type="text" name="subject" size="78"></p></tr>
<h4>Message <br></h4>
 <p><textarea name="message" rows="7" cols="80"></textarea></p>
 
  <tr>
    <td><br><p><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary"></p>
    </td>
  </tr>
</table>
</form>
<?php
include 'includes/footer.php';
?>