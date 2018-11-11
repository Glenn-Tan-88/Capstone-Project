<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
?>

<?php

$formerror="";
$firstName="";
$lastName="";
$email="";
$password="";
$cpassword="";
$subscribe="";

if(!isset($_POST["submitted"])){
  $UM=new UserManager();
  $existuser=$UM->getUserByEmail($_SESSION["email"]);
  $firstName=$existuser->firstName;
  $lastName=$existuser->lastName;
  $email=$existuser->email;
  $password=$existuser->password;
  $cpassword=$existuser->password;
  $subscribe=$existuser->subscribe;
  } else {
  $firstName=$_POST["firstName"];
  $lastName=$_POST["lastName"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $subscribe=$_POST["subscribe"];

  if($firstName!='' && $lastName!='' && $email!='' && $password!='' && $password==$cpassword){
       $update=true;
       $UM=new UserManager();
       if($email!=$_SESSION["email"]){
           $existuser=$UM->getUserByEmail($email);
           if(is_null($existuser)==false){
               $formerror="User's email already in use, unable to update email";
               $update=false;
           }
       }
       if($update){
           $existuser=$UM->getUserByEmail($_SESSION["email"]);
           $existuser->firstName=$firstName;
           $existuser->lastName=$lastName;
           $existuser->email=$email;
           if (strlen($password) < "32") {
           	$existuser->password=md5($password);
           }
           $existuser->subscribe=$subscribe;
           $UM->saveUser($existuser);
           $_SESSION["email"]=$email;
           header("Location:../../home.php");
       }
  } else {
      $formerror="<p style='color:RED'>Please provide required values </p>";
      if ($password != $cpassword) {
      	$formerror="<p style='color:RED'>Your password and confirmation password are not the same </p>";
      }
  }
}
?>
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<style>
	h1,p {
		padding-left : 50px;
	}
</style>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<h1>Update Profile</h1>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td><p>First Name</p></td>
    <td><input type="text" name="firstName" value="<?=$firstName?>" size="50"></td>
  </tr>
  <tr>
    <td><p>Last Name</p></td>
    <td><input type="text" name="lastName" value="<?=$lastName?>" size="50"></td>
  </tr>
  <tr>
    <td><p>Email</p></td>
    <td><input type="text" name="email" value="<?=$email?>" size="50"></td>
  </tr>
  <tr>
    <td><p>Password</p></td>
    <td><input type="password" name="password" value="<?=$password?>" size="50" maxlength="30"></td>
  </tr>
  <tr>
    <td><p>Confirm Password</p></td>
    <td><input type="password" name="cpassword" value="<?=$cpassword?>" size="50" maxlength="30"></td>
  </tr>
      <tr>    
        <td><p style="padding-top:10px">Subscribe to Newsletter?</p></td>
     	<td>
	      <input type="hidden" name="subscribe" value="0">
	      <input type="checkbox" name="subscribe" value="1" <?php echo ($subscribe==1 ? 'checked' : ''); ?>>
    </td>
  </tr> 
  <tr>
	<td></td>
    <td><br><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary"></td>
    </td>
  </tr>
</table>
</form>


<?php
include '../../includes/footer.php';
?>