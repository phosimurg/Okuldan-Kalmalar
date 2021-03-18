<?php 
include 'masterpage.php';
$arama=strip_tags($_GET["ara"]);


?>

<!DOCTYPE html>
<html>
<head>
	<style> 

		body{
			margin:0;
			padding: 0;
			font-family:sans-serif;
			background: url("https://i.redd.it/iw7g13qmktx11.png")no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			object-fit: cover;

		}
	</style>

</head>
<body style="" background="https://i.redd.it/iw7g13qmktx11.png">

	<!-- MASTERPAGE(NAVBARI ÇEKELİM) -->
	<?php ?>



	
	
	<div class="container-fluid" style="align-items: center;margin: auto;">


		<div class="container-fluid" style="align-items: center;margin: auto;">
			<h1 align="center" class="card-header" style="font-family: 'Raleway';"><?php echo $arama ?>&nbsp ile ilgili sonuçlar..</h1> 
			<br>



			<!-- ANA SAYFA İÇERİĞİ BÖLÜMÜ -->




			<div class="row" style="width: 100%; margin: auto;" align="center">
				<div class="container " style="width: 100%; margin: auto;"  align="center">
					<div class="row" align="center" style="">

						<?php 

						$yazim = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler
							ON kategoriler.kategoriid=yazilar.yazikategoriid WHERE yazibaslik LIKE ? ORDER BY yaziid DESC");
						$yazim->execute(array('%' .$arama. '%')); 

						$yazihuplet=$yazim->fetchALL(PDO::FETCH_ASSOC);
						$yazisay=$yazim->rowCount();

						if ($yazisay) {
							
							

							foreach ($yazihuplet as $row) { ?>



								<!-- yazı kartlarımız -->

								<div class="card" style="width: 16rem;  " align="center">

									<!-- detay sayfasına yönlendirelim -->
									<a href="yazidetay.php?yaziid=<?php echo $row["yaziid"] ?>"> <img class="card-img-top" src="img/<?php echo $row["yazifoto"] ?>" alt="Yazı Fotosu"></a>


									<div class="card-body" >

										<!-- başlık ve kategori adını çekelim -->
										<h5 class="card-title"><?php echo $row["yazibaslik"] ?></h5>
										<h6 class="card-title"><?php echo $row["kategoriad"] ?></h6>

										<!-- detay sayfasına yönlendirelim -->
										<a href="yazidetay.php?yaziid=<?php echo $row["yaziid"] ?>" class="btn btn-dark">Devamını Oku..</a>


										<br><br>
										<!-- tarihi burda çekelim -->
										<h6 class="card-title"><?php echo $row["yazitarih"] ?></h6>
									</div>
								</div>
								<!-- kart aralarında boşluk bırakalım -->

								&nbsp&nbsp
							<?php  } } else { 

								echo "<h6><b>Sonuç Bulunamadı..</b></h6>";

							}?>

							
						</div>

					</div>




				</div>
				<br>

			</div>



		</div>



<!--   
  <div class="card-header" align="center">
    <h1 class="display-3">Ahmet YILDIZ</h1>
    <h4 class="font-weight-light" >Developer & Hobby Photographer</h4>
  </div>
-->
<!-- footer kısmını burada çekelim  -->

<?php include 'footer.php';?>

</body>

</html>

