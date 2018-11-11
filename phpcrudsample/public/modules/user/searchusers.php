<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once '../../includes/autoload.php';
include '../../includes/header.php';
$formerror="";

$email="";
$error_name="";
$userflag=0;
$validate=new Validation();
?>

<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
	p, h2, h3 {
		padding: 0 50px 0 50px;
	}
</style>
<h2>Search Users</h2><br>
<form name="myForm" method="post" class="pure-form pure-form-stacked">
<?php $email=$_POST["email"]; ?>
<p><table border='0' width="700">
    <tr>    
      <td>Email</td>
      <td><input type="text" name="email" value="<?=$email?>" pattern=".{1,}" size="50" REQUIRED></td>
  	<td><?php echo $error_name?>
  </tr>
  <tr><td></td>    
    <td><br><input type="submit" name="submitted" value="Search" class="pure-button pure-button-primary">
    </td>
  </tr>
  <tr> <?php echo $formerror?></tr>
</table>
</form>

<?php
if(isset($_POST["submitted"])){
    $email=$_POST["email"];
	{
		$UM=new UserManager();
	        $users=$UM->searchUsers($email);
		if(isset($users)){
		    ?>
		    <br><h2>Search Result</h2><p>
		    <table class="pure-table pure-table-bordered" width="800">
		            <p><tr><thead>
		               <th><b>Id</b></th>
		               <th><b>First Name</b></th>
		               <th><b>Last Name</b></th>
		               <th><b>Email</b></th>
		               <?php
		    		   if ($_SESSION["role"] == "admin") { ?>
				   			       		<th><b>Operation</b></th>
				   					</tr></p>
				   			       		<?php
		    		   } ?> </thead>
		    		
		    <?php
		    foreach ($users as $user) {
		    if($user!=null){  
		            $userflag=1;
		            ?>
		            <tr>
		              <p> <td><?=$user->id?></td></p>
		               <td><?=$user->firstName?></td>
		               <td><?=$user->lastName?></td>
		               <td><?=$user->email?></td>
				<?php
				if ($_SESSION["role"] == "admin") { ?>
					<td>
					   <a href='edituser.php?id=<?php echo $user->id ?>' style="color:RED">Edit, </a>
					   <a href='deleteuser.php?id=<?php echo $user->id ?>' style="color:RED">Delete</a>		
					   </td> </tr>
					   <?php
		    		}
		   }
	           }
		  }
		  }
	 
    ?>
        </table><br/><br/>
        
 <?php
 if ($userflag==0) {
 echo "<h3 style='color:RED'>No such users found!</h3>";
 }
 }
include '../../includes/footer.php';
?>