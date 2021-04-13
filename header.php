<!DOCTYPE html>
<html>
<head>
<title>HƯỚNG ĐỐI TƯỢNG PHP</title>
<!-- Unicode Tiếng Việt -->
<meta charset="utf-8"> 
<!-- Tập tin định nghĩa css -->
<!-- <link href="site.css" rel="stylesheet" /> -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
   <meta charset="utf8">
     
	<script scr="./asset/jquery-3.6.0.min.js"></script>
	<script scr="./assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script scr="./assets/js/bootstrap.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="./assets/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="./assets/css/bootstrap.min.css">

	<style>
		#loading {
			text-align: center;
			background: url('loader.gif') no-repeat center;
			height: 150px;
		}
	</style>
</head>
<body>
<div class="container">
	<h2>Project training - Xây dựng website bán hàng</h2>
	<?php
	session_start();
	if(isset($_SESSION['user'])!="")
	{
		echo "<h2>Xin chào: ".$_SESSION['user']."<a href='/Lab4/logout.php'> Logout</a></h2>";
	}
	else{
		echo "<h2>Bạn chưa đăng nhập <a href='/Lab4/login.php'>Login</a> - <a href='/Lab4/register.php'>Register</a></h2>";
	}
	?>
	<div class="navbar navbar-dark bg-primary navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a href="product-list.php" class="navbar-brand">Danh sách sản phẩm</a>
				<a href="product-add.php" class="navbar-brand">Thêm sản phẩm</a>
				<a href="product-show.php" class="navbar-brand">Chinh sua sản phẩm</a>
			</div>
			<form class="form-inline">
			    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</div>