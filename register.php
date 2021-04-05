<?php include_once("header.php"); ?>
<?php
if(isset($_SESSION['user'])!=""){
	header("Location: index.php");
}
require_once('entities/user.class.php');

if(isset($_POST['btn-signup'])){
	$u_name = $_POST['txtname'];
	$u_email = $_POST['txtemail'];
	$u_pass = $_POST['txtpass'];
	$account = new User($u_name, $u_email, $u_pass);
	$result = $account->save();
	if(!$result){
		?>
		<script type="text/javascript">alert('Có lỗi xảy ra, vui lòng kiểm tra dữ liệu');</script>
		<?php
	}
	else{
		$_SESSION['user'] = $u_name;
		header("Location: index.php");
	}
}
?>

<form method="post">
	<div class="form-group">
		<td>
			<label for="txtname" class="col-sm-2 form-control-label">UserName</label>
			<input type="text" name="txtname" class="form-control" placeholder="UserName" />
		</td>
		
		<td>
			<label for="txtemail" class="col-sm-2 form-control-label">Email</label>	
			<input type="email" name="txtemail" class="form-control" placeholder="Email" />
		</td>
		
		<td>
			<label for="txtpass" class="col-sm-2 form-control-label">Password</label>
			<input type="password" name="txtpass" class="form-control" placeholder="Password" />
		</td>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input class="btn btn-danger" type="submit" name="btn-signup" value="Sign Up" />
		</div>
	</div>
	
</form>

<?php include_once("footer.php"); ?>