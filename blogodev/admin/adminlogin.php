<?php 

include '../sistem/baglan.php';


?>


<html>
<head>
	<title>Giriş Yap</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- styles -->
	<link href="css/styles.css" rel="stylesheet">

</head>

<body class="login-bg">




	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- Logo -->
					<div class="logo">
						<h1><a href="">Ahmet YILDIZ</a></h1>
					</div>
				</div>
			</div>
		</div>
	</div>




	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
					<div class="box">
						<div class="content-wrap">
							<h6>Giriş Yap</h6>
							<form action="adminislem.php" method="POST">
								<input class="form-control" type="text" name="adminkadi" placeholder="Kullanıcı Adı">
								<input class="form-control" type="password" name="adminpass" placeholder="Şifre">

								
									<button name="giris" type="submit" class="btn btn-primary signup">Giriş Yap</button>
								 
							</form>
						</div>
					</div>




					<?php 
					extract($_GET);
					if (isset($giris)) {
						

					if ($giris=="bos") {?>

						<div class="alert alert-warning">Lütfen Tüm Alanları Doldurun..</div>

					<?php } elseif($giris=="no") { ?>

						<div class="alert alert-danger">İşlem Başarısız. Bir Hata Meydana Geldi..</div>


					

					
					<?php }} ?>



					
				</div>
			</div>
		</div>
	</div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>