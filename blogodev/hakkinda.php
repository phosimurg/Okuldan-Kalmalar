
<?php include 'masterpage.php';

$hakkimdaid=1;
$hakkimda=$db->prepare("SELECT * FROM hakkimda WHERE hakkimdaid=?");
$hakkimda->execute(array($hakkimdaid));
$hakkimdacek=$hakkimda->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="tr" dir="ltr">
<head>
  <meta charset="utf-8">


  <style> 

    body{
      margin:0;
      padding: 0;

      background: url("https://www.pixel4k.com/wp-content/uploads/2018/10/minimalist-landscape-4k_1540749774.jpg")no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      object-fit: cover;

    }
  </style>


</head>
<body>


  <div class="container">
    <br>
    <div class="card" align="center">
      <h1 align="center" class="display-4 card-footer">Hakkında</h1>

        <div class="container">
           <div class="col-md-2"></div>
           
           <div class="col-md-8">
             <img class="img-thumbnail" style="width: 100%; height: 300px;" src="img/<?php echo $hakkimdacek["hakkimdafoto"] ?>">
           </div>

           <div class="col-md-2"></div>
        </div>
       
        <br>
      <p class="card-header"><?php echo $hakkimdacek["hakkimdaicerik"] ?></p>

    </div>

  </div>


  <?php include 'footer.php'; ?>
</body>
</html>
