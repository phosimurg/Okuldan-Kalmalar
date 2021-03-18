
<!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
	<meta charset="utf-8">


	<link href="css/styles.css" rel="stylesheet">

</head>
<body>

	<?php include 'adminheader.php'; ?>


	<?php 



	// toplam yazı sayısı
	$yazilar=$db->prepare("SELECT * FROM yazilar");
	$yazilar-> execute();
	$yazilar->fetchALL(PDO::FETCH_ASSOC);
	$yazisay = $yazilar->rowCount();


	// toplam kategori sayısı
	$kategoriler=$db->prepare("SELECT * FROM kategoriler");
	$kategoriler-> execute();
	$kategoriler->fetchALL(PDO::FETCH_ASSOC);
	$kategorisay = $kategoriler->rowCount();


	?>




	<div class="page-content">
		<div class="row">
			<div class="col-md-2">
				<?php include 'adminsolmenu.php'; ?>
			</div>

			<!-- İçerik Kısmı Bura -->
			<div class="col-md-10">
				
				

				<div class=" panel-danger">					
					<div class="content-box-header  panel-heading">

						<div class="row">


							<!-- toplam yazı sayısı -->
							<div class="col-md-3 panel-success">
								<div class="content-box-header  panel-heading">
									<div class="panel-title">Toplam Yazı Sayısı</div>

									<div class="panel-options">
										<!-- panel ayarları -->
									</div>
								</div>
								<div class="content-box-large box-with-header" align="center">

									<h1 align="center" style="font-family: 'Ubuntu'; font-size: 80px;"><?php echo $yazisay ?></h1>

									<a class="btn btn-success" style="width: 100%;"  href="adminyazilar.php">Tüm Yazılara Git >></a>
								</div>
							</div>



							<!-- toplam kategori sayısı -->


							<div class="col-md-3 panel-primary">
								<div class="content-box-header  panel-heading">
									<div class="panel-title">Toplam Kategori Sayısı</div>

									<div class="panel-options">
										<!-- panel ayarları -->
									</div>
								</div>
								<div class="content-box-large box-with-header" align="center">

									<h1 align="center" style="font-family: 'Ubuntu'; font-size: 80px;"><?php echo $kategorisay ?></h1>

									<a class="btn btn-primary" style="width: 100%;" href="adminkategoriler.php">Tüm Kategorilere Git >></a>

								</div>
							</div>



						</div>
					</div>
				</div>




			</div>


			

		</div>
	</div>


	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<footer>
		<div class="container">

			<div class="copy text-center">
				Tüm Hakları Saklıdır 2020 <a href=''>Ahmet YILDIZ</a>
			</div>

		</div>
	</footer>


</body>
</html>