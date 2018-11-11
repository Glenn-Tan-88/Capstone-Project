<!-- Navigation Bar -->
<?php 
   if(isset($_SESSION["email"]))
   {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="w3-bar w3-indigo w3-large">
		<div style="text-align: center; background: WHITE">
                <img class="img-fluid" src="http://localhost/phpcrudsample/public/images/logo.jpg" alt="ABC Logo">
                <div class="text-right" style="float:right; font-size:16px; margin:38px 40px 0 0">
                    <a href="/phpcrudsample/public/login.php">Member's Login</a>
                </div>
   </div>
  <a href="/phpcrudsample/public/logout.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Logout</a>
  <a href="/phpcrudsample/public/home.php" class="w3-bar-item w3-button w3-mobile w3-right">Home</a>
  <a href="/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile w3-right">Contact Us</a>
  <a href="/phpcrudsample/public/modules/user/searchusers.php" class="w3-bar-item w3-button w3-mobile w3-right">Search Users</a>
  <a href="/phpcrudsample/public/modules/user/updateprofile.php" class="w3-bar-item w3-button w3-mobile w3-right">Update Profile</a>
 
<?php
	if ($_SESSION["role"]=="admin")	//add for role
  	{
  	?>
  	 <a href="/phpcrudsample/public/sendemails.php" class="w3-bar-item w3-button w3-mobile w3-right">Send Emails</a>
  	 <a href="/phpcrudsample/public/modules/user/userlist.php" class="w3-bar-item w3-button w3-mobile w3-right">View Users</a>
  <?php
  	}
 ?>
</div>
<?php 
   } else
   {
?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="w3-bar w3-indigo w3-large">
            <div style="text-align: center; background: WHITE">
                <img class="img-fluid" src="http://localhost/phpcrudsample/public/images/logo.jpg" alt="ABC Logo">
                <div class="text-right" style="float:right; font-size:16px; margin:38px 40px 0 0">
                    <a href="/phpcrudsample/public/login.php"><span style="color: BLUE">Member's Login</span></a>
                </div>
             </div>
  <!-- <a href="/phpcrudsample/public/login.php" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Login</a> -->
  <a href="/phpcrudsample/public/index.php" class="w3-bar-item w3-button w3-mobile w3-right">Home</a>  
  <a href="/phpcrudsample/public/contactus.php" class="w3-bar-item w3-button w3-mobile w3-right">Contact Us</a>
  <a href="/phpcrudsample/public/aboutus.php" class="w3-bar-item w3-button w3-mobile w3-right">About Us</a>
</div>
<?php 
   } 
?>