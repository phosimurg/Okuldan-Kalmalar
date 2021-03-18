<?php 

include_once "sistem/baglan.php";



?>

<!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" />  
  <title>Ahmet YILDIZ</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300&family=Montserrat:wght@300&family=Raleway:wght@200&display=swap');

    li{
      transition: 0.2s ease-in;
    }

    li:hover{


    }

  </style>
</head>
<body>

  <nav class="navbar navbar-dark bg-dark navbar-expand-lg text-white">
    <div class="container-fluid col-md-4" style="align-items:center;">

      <div class=""> <a class="navbar-brand" href="index.php">

        <a href="index.php" class="text-light" style="text-decoration:none; font-size:25px;">Ahmet YILDIZ</a>

      </div>

      

      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-fastfood" aria-controls="navbar-fastfood">
       <span class="navbar-toggler-icon"></span>
     </button>


   </div>

   <div class="collapse navbar-collapse  justify-content-end"  id="navbar-fastfood">

    <ul class="nav navbar-nav " style="font-family:'Raleway';">

      <li class="nav-item px-3 "><a href="index.php" class="nav-link">ANA SAYFA</a></li>


      <li class="nav-item px-3"><a href="hakkinda.php" class="nav-link">HAKKINDA</a></li>
      <li class="nav-item px-3"><a href="iletisim.php" class="nav-link">İLETİŞİM</a></li>

        <li class="dropdown nav-item">
        <a class="dropdown-toggle nav-link px-3" data-toggle="dropdown" >KATEGORİLER</a>
        <ul class="dropdown-menu bg-dark px-3">

          <?php 

          $kategori = $db->prepare("SELECT * FROM kategoriler");
          $kategori->execute();

          $kategoricek=$kategori->fetchALL(PDO::FETCH_ASSOC);

          foreach ($kategoricek as $row) { ?>

            <?php 

            # Burası Kategorilerde kaç tane yazı olduğunu yazdırmak için#
            
            $yazilar = $db->prepare("SELECT * FROM yazilar  WHERE yazikategoriid=?");
            $yazilar->execute(array($row["kategoriid"])); 
            $yazilistele=$yazilar->fetchALL(PDO::FETCH_ASSOC);
            $yazisay=$yazilar->rowCount();
            ?>

            <li class=" bg-dark text-white"><a  href="kategorilistele.php?kategoriid=<?php echo $row["kategoriid"] ?>" class="nav-link "><?php echo $row["kategoriad"] ?> (<?php echo $yazisay ?>)</a></li>


          <?php  } ?>
          


        </ul>
      </li>




    </ul>



    <form class="form-inline my-2 my-lg-0" action="arama.php" method="GET">
      <input class="form-control mr-sm-2" type="search" name="ara" placeholder="Ara" aria-label="Ara">
      
    </form>

    <a href="admin/adminlogin.php" class="nav-item nav-link"><i class="fas fa-rocket"></i>ADMİN</a>

  </div>
</nav>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>

</body>
</html>
