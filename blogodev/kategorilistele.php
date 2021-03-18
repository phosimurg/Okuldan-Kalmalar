<?php 
include 'masterpage.php';
$kategorino=$_GET["kategoriid"];

$kategori=$db->prepare("SELECT * FROM kategoriler WHERE kategoriid=?");
$kategori->execute(array($kategorino)); 
$kategorial=$kategori->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
	<style> 

		body{
			margin:0;
			padding: 0;
			font-family:sans-serif;
			background: url("https://i.hizliresim.com/JUtfHO.jpg")no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			object-fit: cover;

		}
	</style>

</head>
<body style="" background="https://i.hizliresim.com/JUtfHO.jpg">

	<!-- MASTERPAGE(NAVBARI ÇEKELİM) -->
	<?php ?>



	
	
	<div class="container-fluid" style="align-items: center;margin: auto;">


		<div class="container-fluid" style="align-items: center;margin: auto;">
			<br>
			<h1 align="center" class="display-4 card-header" style="font-family: 'Raleway';"><?php echo $kategorial["kategoriad"] ?></h1>
			<br>



			<!-- ANA SAYFA İÇERİĞİ BÖLÜMÜ -->




			<div class="row" style="width: 100%; margin: auto;" align="center">
				<div class="container " style="width: 100%; margin: auto;"  align="center">
					<div class="row" align="center" style="">

						<?php 

						$yazi = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler
							ON kategoriler.kategoriid=yazilar.yazikategoriid WHERE yazikategoriid=? ORDER BY yaziid DESC");
						$yazi->execute(array($kategorino)); 

						$yazicek=$yazi->fetchALL(PDO::FETCH_ASSOC);


						foreach ($yazicek as $row) { ?>



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
						<?php  } ?>

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

