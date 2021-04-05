<?php
	require_once('entities/user.class.php');
	require_once('config/db.class.php');


if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 
   
   $username = mysqli_real_escape_string($db,$_POST['adminUser']);
   $password = mysqli_real_escape_string($db,$_POST['adminPass']); 
   
   $sql = "SELECT * FROM `user` WHERE `UserName` = '$username' and `PassWord` = '$password'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];
   
   $count = mysqli_num_rows($result);
   
   // If result matched $myusername and $mypassword, table row must be 1 row
	 
   if($count == 1) {
	 // session_register("myusername");
	  $_SESSION['login_user'] = $username;
	  echo"hello";
	  header("location: index.php");
   }else {
	  $error = "Your Login Name or Password is invalid";
   }
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span style="color:red">
				<?php
				if(isset($login_check)){
					echo $login_check;
				}
				?>
			</span>
			<div>
				<input type="text" placeholder="Username" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Login" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>