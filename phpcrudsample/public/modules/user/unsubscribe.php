<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;
use classes\util\DBUtil;

ob_start();
/* include '../../includes/security.php'; */
include '../../includes/header.php';
?>

<?php
  $UM=new UserManager();
  $existuser=$UM->getUserById($_GET["id"]);
  $id=$existuser->id;
  $firstName=$existuser->firstName;
  $lastName=$existuser->lastName;
  $email=$existuser->email;
  $subscribe=$existuser->subscribe;
  
if(isset($_POST["submitted"])){
	$subscribe=$_POST["subscribe"];
	$conn=DBUtil::getConnection();
        $sql = "UPDATE tb_user SET subscribe = " .$subscribe. " WHERE id = " .$id;
	$conn->query($sql);
	$conn->close();
        header("Location:unsubscribethankyou.php");
}

?>
<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<style>
	h2,p {
		padding-left : 50px;
	}
</style>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<h2>Unsubscribe From Mailing List</h2><br>
<div><?=$formerror?></div>
<table width="800">
  <tr>
    <td><p>Your Name : <?=$firstName?> <?=$lastName?></p></td>
  </tr>
  <tr>
    <td><br><p>Email : <?=$email?></p></td>
        <tr>    
          <td><br><p>Subscribe to Newsletter? &nbsp; &nbsp;
  	      <input type="hidden" name="subscribe" value="0" >
  	      <input type="checkbox" name="subscribe" value="1" <?php echo ($subscribe==0 ? 'checked' : ''); ?>>
      </td></p>
  </tr> 
  <tr>
    <td><br><p><input type="submit" name="submitted" value="Submit" class="pure-button pure-button-primary">
    </td></p>
  </tr>
</table>
</form>

<?php
include '../../includes/footer.php';
?>