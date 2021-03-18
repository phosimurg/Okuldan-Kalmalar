<?php 
include("masterpage.php");

$yaziid=$_GET["yaziid"];

$yazi = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler
	ON kategoriler.kategoriid=yazilar.yazikategoriid WHERE yaziid=?");
$yazi->execute(array($yaziid)); 

$yazicek=$yazi->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>


	<style> 

		body{
			margin:0;
			padding: 0;
			font-family:sans-serif;
			background: url("img/deneme3.jpg")no-repeat center center fixed;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			object-fit: cover;

		}
	</style>

</head>

<body>

	<br>
	<div class="container" align="center">


		<div class="card"  align="center">
			<br><br>
			
			<!-- başlığımızı bura alalım -->

			<h1 class="card-footer" style="font-size: 32px; font-family: 'Montserrat'"><?php echo $yazicek["yazibaslik"] ?></h1>

			<br><br>


			<!-- yazı tarihini, okunma sayısını ve kategori adını böyle çekelim -->
			<div class="row">
				<div class="col-md-3"><?php echo $yazicek["kategoriad"] ?></div>
				<div class="col-md-6"><?php echo $yazicek["yaziokunma"] ?>&nbspOkunma</div> 
				<div class="col-md-3"><?php echo $yazicek["yazitarih"] ?></div>
			</div>
			
			<!-- Buraya da yazı fotomuzu çekelim -->

			<div class="card-header">
				
				<div class="col-md-1"></div>
				<div class="col-md-10"><img style="height: 350px; width: 100%;" class="img-thumbnail" src="img/<?php echo $yazicek["yazifoto"] ?>"></div>
				<div class="col-md-1"></div>
			</div>

			<!-- yazı içeriğini de bura çekelim -->
			<div class="card-header"><p class="" style="font-family: 'Montserrat'; font-weight: bold;"> <?php echo $yazicek["yaziicerik"] ?></p></div>





		</div>

		<div class="row">
			


		</div>
		&nbsp&nbsp
	</div>

	<?php include("footer.php"); ?>
</body>
</html>