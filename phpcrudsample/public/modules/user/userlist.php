<?php
session_start();
require_once '../../includes/autoload.php';

use classes\business\UserManager;
use classes\entity\User;

ob_start();
include '../../includes/security.php';
include '../../includes/header.php';

$UM=new UserManager();
$users=$UM->getAllUsers();

if(isset($users)){
    ?>
	<link rel="stylesheet" href="..\..\css\pure-release-1.0.0\pure-min.css">
    <br><p style="padding-left:50px; font-size:18px">Below is the list of developers registered in community portal
    <table class="pure-table pure-table-bordered" width="800">
            <tr>
			<thead>
               <p><th><b>Id</b></th></p>
               <th><b>First Name</b></th>
               <th><b>Last Name</b></th>
               <th><b>Email</b></th>
               <th><b>Subscribe</b></th>
			   <th><b>Operation</b></th>
			   </thead>
            </tr>    
    <?php 
    foreach ($users as $user) {
        if($user!=null){
            ?>
            <tr>
              <p> <td><?=$user->id?></td></p>
               <td><?=$user->firstName?></td>
               <td><?=$user->lastName?></td>
               <td><?=$user->email?></td>
               <td><?=$user->subscribe?></td>
			   <td>
			   <a href='edituser.php?id=<?php echo $user->id ?>' style="color:RED">Edit, </a>
			   <a href='deleteuser.php?id=<?php echo $user->id ?>' style="color:RED">Delete</a>		
			   </td>
            </tr>
            <?php 
        }
    }
    ?>
    </table><br/><br/></p>
    <?php 
}
?>

<?php
include '../../includes/footer.php';
?>