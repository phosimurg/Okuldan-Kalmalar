 	<?php 
 	include '../sistem/baglan.php';
 	include 'kontrol.php';
 	

 	?>

 	<!DOCTYPE html>
 	<html>
 	<head>
 		<title>Admin Panel</title>
 		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" /> <meta charset="utf-8">
 		<title>Admin Panel</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
 		<!-- Bootstrap -->
 		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
 		<!-- styles -->




 	</head>
 	<body>
 		<div class="header">
 			<div class="container">
 				<div class="row">
 					<div class="col-md-5">
 						<!-- Logo -->
 						<div class="logo">
 							<h1><a href="adminindex.php">Ahmet YILDIZ</a></h1>
 						</div>
 					</div>
 					<div class="col-md-5">
 						<div class="row">
 							
 						</div>
 					</div>

 					<div class="col-md-2">
 						<div class="row">



 							<div class="navbar navbar-inverse" role="banner">
 								<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
 									<ul class="nav navbar-nav">

 										<li class="dropdown">
 											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fas fa-users-cog"></i>Hesabım<b class="caret"></b></a>
 											<ul class="dropdown-menu animated fadeInUp">
 												<li><a href="adminprofil.php"><i class="fas fa-user"></i>Profil</a></li>
 												<li><a href="admincikis.php"><i class="fas fa-sign-out-alt"></i>Çıkış Yap</a></li>

 												<li>												
 													<a style="color:#428BCA;" href="../index.php"><i class="fas fa-rocket"></i>Siteye Yönlendir</a>

 												</li>

 											</ul>
 										</li>
 									</ul>
 								</nav>
 							</div>
 						</div>
 					</div>

 				</div>
 			</div>
 		</div>

 		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 		<script src="https://code.jquery.com/jquery.js"></script>
 		<!-- Include all compiled plugins (below), or include individual files as needed -->
 		<script src="bootstrap/js/bootstrap.min.js"></script>
 		<script src="js/custom.js"></script>
 		<script src="ckeditor/ckeditor.js"></script>



 	</body>
 	</html>
