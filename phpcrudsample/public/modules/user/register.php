<?php
require_once '../../includes/autoload.php';
include '../../includes/header.php';
use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$formerror="";

$firstName="";
$lastName="";
$email="";
$password="";
$cpassword="";
$subscribe="";

if(isset($_REQUEST["submitted"])){
    $firstName=$_REQUEST["firstName"];
    $lastName=$_REQUEST["lastName"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    $cpassword=$_REQUEST["cpassword"];
    $subscribe=$_REQUEST["subscribe"];
    
    if($firstName!='' && $lastName!='' && $email!='' && $password!='' && $password==$cpassword){
        $UM=new UserManager();
        $user=new User();
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=md5($password);
        $user->role="user";
        $user->subscribe=$subscribe;
        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            #header("Location:registerthankyou.php");
			echo '<meta http-equiv="Refresh" content="1; url=./registerthankyou.php">';
        }
        else {
           $formerror="<p style='color:RED'>User already exists</p>";
        }
    } else {
        $formerror="<p style='color:RED'>The 2 passwords do not match! </p>";
    }
}
?>
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<style>
	p { padding-left: 50px;}
</style>
<h1><p>Registration Form</p></h1>
<div><?=$formerror?></div>
<table width="900">
  <tr>
    <td><p>First Name</p></td>
    <td><input type="text" name="firstName" value="<?=$firstName?>" size="50" required></td>
  </tr>
  <tr>
    <td><p>Last Name</p></td>
    <td><input type="text" name="lastName" value="<?=$lastName?>" size="50" required></td>
  </tr>
  <tr>    
    <td><p>Email</p></td>
    <td><input type="email" name="email" value="<?=$email?>" size="50" required></td>
  </tr>
  <tr>    
    <td><p>Password</p></td>
    <td><input type="password" name="password" value="<?=$password?>" size="50" required maxlength="30"></td>
  </tr>  
  <tr>    
    <td><p>Confirm Password</p></td>
    <td><input type="password" name="cpassword" value="<?=$cpassword?>" size="50" required maxlength="30"></td>
  </tr>  
    <tr>    
      <td><p style="padding-top:10px">Subscribe to Newsletter?</p></td>
      <td><input type="radio" name="subscribe" value="1"> Yes &nbsp; &nbsp;
      <input type="radio" name="subscribe" value="0"> No</td>
  </tr> 
   <br><tr><td></td><td><br>
       <input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
       <input type="reset" name="reset" value="Reset" class="pure-button pure-button-primary">
   </td>
  </tr>
</table>
</form>

<?php
include '../../includes/footer.php';
?>